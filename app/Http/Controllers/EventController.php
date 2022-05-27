<?php

namespace App\Http\Controllers;

use App\AccessSpecifiers;
use App\Api;
use App\Booth;
use App\BoothInterest;
use App\Form;
use App\Loader;
use App\CometChat;
use App\Section;
use App\Event;
use App\LandingPage;
use App\LandingSpeaker;
use App\EventSession;
use App\LoginLog;
use App\Notification;
use App\Points;
use App\Mail\swagbagMail;
use App\Prize;
use App\ProvisionalGroup;
use App\Report;
use App\User;
use App\UserConnection;
use App\UserLookingTagLinks;
use App\UserTag;
use App\UserTagLinks;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\FAQ;
use App\Modal;
use App\NetworkingTable;
use App\Page;
use App\Resource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use App\Swagbag;
use App\Room;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;
use Sichikawa\LaravelSendgridDriver\Transport\SendgridTransport;
use App\sessionRooms;
use Dotenv\Result\Success;
use App\Image;
use App\Leaderboard;
use File;
use Illuminate\Support\Facades\Storage as Storage;
use App\Onboard;

use Carbon\CarbonTimeZone;

class EventController extends Controller
{
    public function index($event_name)
    {

        $event = Event::where("slug", $event_name)->first();
        $loader = Loader::findOrFail($event->def_loader);
        $event_id = $event->id;
        $leaderboard = Leaderboard::where('event_id', $event_id)->first();
        $chat_app = CometChat::where("event_id", $event->id)->first();
        $posts = $event->posts()->with("comments")->get();
        $booths = Booth::where("event_id", $event_id)->orderBy("name")->with([
            "images",
            "videos",
            "resources",
        ])->get([
            "id",
            "name",
            "calendly_link",
            "url",
            "type",
            "boothurl",
            "vidbg_url"
        ]);
        $tables = NetworkingTable::where("event_id", $event_id)->orderBy('seats', 'asc')->get();
        $FAQs = FAQ::where("event_id", $event_id)->get();
        $schedule = getSchedule($event_id);
        // return $schedule;
        $user = Auth::user();
        $pages = Page::where("event_id", $event_id)->with(["links.flyin", "images"])->get();
        $sessionrooms = sessionRooms::where("event_id", $event_id)->get()->groupBy("master_room");


        $access_specifiers = AccessSpecifiers::where("event_id", $event_id)->get()->groupBy("page_id");

        foreach ($access_specifiers as $id => $access) {
            $arr = [];
            foreach ($access as $accessTo) {
                array_push($arr, $accessTo->user_type);
            }
            $access_specifiers[$id] = $arr;
        }


        // dd($sessionroomids);
        $sessions = EventSession::where("event_id", $event_id)->get()->load(["parentroom"]);

        // $user->load("subscriptions");
        // dd($user);
        $subscriptions = [];
        foreach ($user->subscriptions as $subscription) {
            $subscriptions[] = $subscription->session_id;
        }
        // dd($subscriptions);
        $modals = Modal::where("event_id", $event_id)->get();
        $modals->load(["items"]);
        // return ($modals);
        // $event_id = $id;
        return view("event.index")
            ->with(
                compact([
                    "booths",
                    "chat_app",
                    "modals",
                    "FAQs",
                    "posts",
                    "pages",
                    // "reports",
                    //"provisionals",
                    // "boothrooms",
                    "schedule",
                    "subscriptions",
                    // "prizes",
                    "sessions",
                    "sessionrooms",
                    // "sessionroomnames",
                    "event_id",
                    "loader",
                    "tables",
                    "event_name",
                    "access_specifiers",
                    "event"
                ])
            );
    }

    public function leaderBoardReports($id)
    {   
        $event = Event::where("id", $id)->first();
        $users = User::where("event_id",$id)->where("points",">",0)->orderBy("points","desc")->get(["id","name","last_name","email","points"])->load("points_details");
        // return $users;
        return view("eventee.user_report.leaderboard")->with(compact(["users","id"]));
        
    }

    public function createRoomGroup(Request $request)
    {

        $room = $request->get("room");
        $id = $request->get("id");
        $group = (object)[
            "id" => str_replace(" ", "_", $room),
            "name" => ucfirst(str_replace("_", " ", $room))
        ];
        $chat_app = CometChat::where("event_id", $id)->first();
        if ($chat_app) {
            createGroup($chat_app, $group);
        }
        // Http::withHeaders([
        //     "apiKey" => env("COMET_CHAT_API_KEY"),
        //     "appId" => env("COMET_CHAT_APP_ID"),
        //     "accept" => "application/json"
        // ])
        //     ->post(env('COMET_CHAT_BASE_URL') . "/v2.0/groups", [
        //         "guid" => $room,
        //         "name" =>  str_replace("Inc","Inc.",ucfirst(str_replace("_"," ",$room))) ,
        //         "type" => "public"
        //     ]);
        return true;
    }

    public function getIcons()
    {
        // $files = File::allFiles("./icons/");
        // dd($files);
    }

    public function integrations($id)
    {
        $apis = Api::where("event_id", $id)->get();
        $envs = [];
        foreach ($apis as $api) {
            $envs[$api->variable] = $api->key;
        }
        // dd($envs);
        return view("eventee.integrations.list")->with(compact("id", "envs"));
    }
    public function settings($id)
    {
        $event = Event::where("id", $id)->first();
        $loaders = Loader::where('event_id', 0)->orWhere('event_id', $id)->get();
        $pages = Page::where("event_id", $id)->get();
        $session_rooms = sessionRooms::where("event_id", $id)->get();
        return view("eventee.settings.default")->with(compact("id", "pages", "session_rooms", "event", 'loaders'));
    }
    public function settingsUpdate(Request $request, $id)
    {
        // dd($request->all());
        $event = Event::where("id", $id)->first();
        if ($request->tos) {
            $event->privacypolicy = $request->tos;
            $event->save();
            return redirect(route("eventee.settings", $id));
        }
        if ($request->login_disc) {
            $event->login_disc = $request->login_disc;
            $event->save();
            return redirect(route("eventee.settings", $id));
        }

        $type = "exterior";
        $page = "exterior";
        switch ($request->type) {
            case "page":
                $type = "page";
                $page = "page/" . $request->pages;
                break;
            case "sessionroom":
                $type = "sessionroom";
                $page = "sessionroom/" . $request->rooms;
                break;
            case "lobby":
                $type = "lobby";
                $page = "lobby";
                break;
            case "exterior":
                $type = "exterior";
                $page = "exterior";
                break;
        }
        $event->home_page = $page;
        $event->home_type = $type;
        $event->save();
        return redirect(route("eventee.settings", $id));
    }
    public function integrationsUpdate(Request $request, $id)
    {
        // if($request->RECAPTCHA_SITE_KEY || $request->RECAPTCHA_SECRET_KEY){
        foreach ($request->except("_token") as $var => $key) {
            Api::updateOrCreate(
                [
                    "variable" => $var,
                    "event_id" => $id
                ],
                [
                    "key" => $key
                ]
            );
        }
        return redirect(route("eventee.integrations", $id));
        // dd($request->except("_token"));
    }

    public function addToBag(Request $request)
    {
        $user = Auth::user();
        $details = [
            "resources_id" => $request->get("resource"),
            "user_id" => $user->id
        ];
        Swagbag::firstOrCreate($details);
        $userSwagbag = Swagbag::where("user_id", $user->id)
            ->with([
                "resource.booth",
                "report.video",
                "report.resources",
                //                "provision.resource",
                //                "provision.video"
            ])->get()->toArray();
        return [
            "success" => true,
            "bag" => array_merge(
                $userSwagbag,
                PERMANANT_SWAGS
            ),
        ];
    }
    public function deleteFromBag(Request $request)
    {
        $user = Auth::user();
        $items = $request->get("resource");
        if (is_array($items)) {
            Swagbag::where("user_id", $user->id)->whereIn('resources_id', $items)->delete();
        } else {
            Swagbag::where([
                ["user_id", $user->id],
                ["resources_id", $request->get("resource")],
            ])->delete();
        }
        $userSwagbag = Swagbag::where("user_id", $user->id)
            ->with([
                "resource.booth",
                "report.video",
                "report.resources",
                //                "provision.resource",
                //                "provision.video"
            ])->get()->toArray();
        return [
            "success" => true,
            "bag" => array_merge(
                $userSwagbag,
                PERMANANT_SWAGS
            ),
        ];
    }
    public function getSwagBag()
    {
        $user = Auth::user();
        $userSwagbag = Swagbag::where("user_id", $user->id)
            ->with([
                "resource.booth",
                "report.video",
                "report.resources",
                //                "provision.resource",
                //                "provision.video"
            ])->get()->toArray();
        return [
            "success" => true,
            "bag" => array_merge(
                $userSwagbag,
                PERMANANT_SWAGS
            ),
        ];
    }

    /**
     * View for Admin Leaderboard
     */
    public function leaderboardView()
    {
        return view("dashboard.reports.leader");
    }

    public function leaderboard($subdomain, $id)
    {
        // return $id;
        return User::orderBy("points", "desc")
            ->where("event_id", $id)
            ->where("points", ">", 0)
            ->limit(env("LEADERBOARD_LIMIT", 50))
            ->get(["name", "points", "last_name"])
            ->map(function ($user) {
                return [
                    $user->name . " " . $user->last_name,
                    $user->points
                ];
            });
    }

    public function saveprofile(Request $request)
    {
        $currentUser = Auth::user();
        $url = $request->get("url");
        if (isset($url)) {
            $user = User::where("id", $currentUser->id)->update(["profileImage" => $url]);
        } else {
            return [
                "success" => false,
                "message" => "Null URL"
            ];
        }
        // $pointsDetails = [
        //     "points_to" => $currentUser->id,
        //     "points_for" => "Profile-Picture-Update",
        //     "points" => PROFILE_PICTURE_UPDATE
        // ];
        // if (!Points::where($pointsDetails)->count()) {
        //     Points::create($pointsDetails);
        //     User::where("id", $currentUser->id)->update([
        //         "points" => DB::raw('points+' . $pointsDetails["points"]),
        //     ]);
        // }
        return [
            "success" => true,
        ];
    }
    public function saveTags(Request $request)
    {
        $data = $request->except("_token");
        $taglist =  $data["data"];
        $email = '';
        foreach ($taglist as $tags) {
            foreach ($tags as $index => $tag) {
                if ($index === "email") {
                    continue;
                } else {
                    $email = $tags['email'];
                    $user = User::where('email', $email)->first();
                    // return ["success"=>true ,"index"=>$index];
                    if (isset($user->id)) {
                        if (strpos($index, "*")) {
                            // $multipletags = explode(",", $tag);
                            $multipletags = explode(",", $tag);
                            foreach ($multipletags as $innertag) {
                                if ($innertag && $innertag !== "" && $innertag !== " ") {

                                    $existingTag = UserTag::where("tag", "like", str_replace(".", ",", $innertag))->first();
                                    if (!$existingTag) {
                                        $user->tags()->create([
                                            "tag" =>  str_replace(".", ",", $innertag),
                                            "tag_group" => str_replace("*", "", $index)
                                        ]);
                                    } else {
                                        if (!UserTagLinks::where([
                                            'tag_id' => $existingTag->id,
                                            'user_id' => $user->id
                                        ])->first()) {
                                            UserTagLinks::create([
                                                'tag_id' => $existingTag->id,
                                                'user_id' => $user->id
                                            ]);
                                        }
                                    }
                                }
                            }
                        } else {
                            if ($tag && $tag !== "" && $tag !== " ") {

                                $existingTag = UserTag::where("tag", "like", str_replace(".", ",", $tag))->first();
                                if (!$existingTag) {
                                    $user->tags()->create([
                                        "tag" =>  str_replace(".", ",", $tag),
                                        "tag_group" => str_replace("*", "", $index)
                                    ]);
                                } else {
                                    if (!UserTagLinks::where([
                                        'tag_id' => $existingTag->id,
                                        'user_id' => $user->id
                                    ])->first()) {
                                        UserTagLinks::create([
                                            'tag_id' => $existingTag->id,
                                            'user_id' => $user->id
                                        ]);
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        return ['success' => True];
    }
    public function saveLookingfor(Request $request)
    {
        $data = $request->except("_token");
        $taglist =  $data["data"];
        $email = '';
        foreach ($taglist as $tags) {
            foreach ($tags as $index => $tag) {
                if ($index === "email") {
                    continue;
                } else {
                    $email = $tags['email'];
                    $user = User::where('email', $email)->first();
                    if ($tag && $tag !== "" && $tag !== " ") {

                        // return ["success"=>true ,"index"=>$index];
                        if (isset($user->id)) {
                            if (strpos($index, "*")) {
                                // $multipletags = explode(",", $tag);
                                $multipletags = explode(",", $tag);
                                foreach ($multipletags as $innertag) {
                                    $existingTag = UserTag::where("tag", "like", str_replace(".", ",", $innertag))->first();
                                    if (!$existingTag) {
                                        $user->looking_for_tags()->create([
                                            "tag" =>  str_replace(".", ",", $innertag),
                                            "tag_group" => str_replace("*", "", $index)
                                        ]);
                                    } else {
                                        if (!UserLookingTagLinks::where([
                                            'tag_id' => $existingTag->id,
                                            'user_id' => $user->id
                                        ])->first()) {
                                            UserLookingTagLinks::create([
                                                'tag_id' => $existingTag->id,
                                                'user_id' => $user->id
                                            ]);
                                        }
                                    }
                                }
                            } else {
                                $existingTag = UserTag::where("tag", "like", $tag)->first();
                                $existingTag = UserTag::where("tag", "like", str_replace(".", ",", $tag))->first();
                                if (!$existingTag) {
                                    $user->looking_for_tags()->create([
                                        "tag" =>  str_replace(".", ",", $tag),
                                        "tag_group" => str_replace("*", "", $index)
                                    ]);
                                } else {
                                    if (!UserLookingTagLinks::where([
                                        'tag_id' => $existingTag->id,
                                        'user_id' => $user->id
                                    ])->first()) {
                                        UserLookingTagLinks::create([
                                            'tag_id' => $existingTag->id,
                                            'user_id' => $user->id
                                        ]);
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        return ['success' => True];
    }


    public function updateProfile(Request $request)
    {
        $currentUser = Auth::user();
        $currentUser->update($request->except(["email", "tags"]));
        $chat_app = CometChat::where("event_id", $currentUser->event_id)->first();
        updateChatProfile($chat_app, $currentUser);
        $tags = $request->get("tags", false);
        $looking_for_tags = $request->get("looking_for_tags", false);
        $interests = $request->get("interests", false);
        if (is_array($tags)) {
            $currentUser->tagLinks()->delete();
            foreach ($tags as $tag) {
                $existingTag = UserTag::where("tag", "like", $tag)->first();
                if (!$existingTag) {
                    $currentUser->tags()->create([
                        "tag" => $tag
                    ]);
                } else {
                    UserTagLinks::create([
                        'tag_id' => $existingTag->id,
                        'user_id' => $currentUser->id
                    ]);
                }
            }
        }
        if (is_array($looking_for_tags)) {
            $currentUser->tagLookingLinks()->delete();
            foreach ($looking_for_tags as $tag) {
                $existingTag = UserTag::where("tag", "like", $tag)->first();
                if (!$existingTag) {
                    $currentUser->looking_for_tags()->create([
                        "tag" => $tag
                    ]);
                } else {
                    UserLookingTagLinks::create([
                        'tag_id' => $existingTag->id,
                        'user_id' => $currentUser->id
                    ]);
                }
            }
        }
        if (is_array($interests)) {
            $currentUser->interests()->delete();
            foreach ($interests as $interest) {
                $currentUser->interests()->create([
                    "interest" => $interest,
                ]);
            }
        }
        return [
            "success" => true,
        ];
    }

    public function trackEvent(Request $request)
    {
        $type = $request->get("type", "login");
        $userId = Auth::user()->id;
        if(! strpos(Auth::user()->email, 'eventstub.co') ){
            $pointsDetails = [
                "points_to" => $userId,
                "points_for" => $type,
                "details" => $request->get("details", ""),
            ];
            switch ($type) {
                case "scavengerHunt":
                    $page = $request->get("page");
                    $index = $request->get("index");
                    $name = $request->get("name");
                    // if (
                    //     isset(SCAVENGER_HUNT[$page]) &&
                    //     isset(SCAVENGER_HUNT[$page][$index]) &&
                    //     isset(SCAVENGER_HUNT[$page][$index]['name']) &&
                    //     SCAVENGER_HUNT[$page][$index]['name'] == $name
                    // ) {
                    //Verified item, now saving to database
                    $pointsDetails["points"] = SCAVENGER_HUNT_POINTS;
                    $pointsDetails["details"] = $page . "|" . $index . "|" . $name;
                    if (!Points::where($pointsDetails)->count()) {
                        Points::create($pointsDetails);
                        User::where("id", $userId)->update([
                            "points" => DB::raw('points+' . $pointsDetails["points"]),
                        ]);
                    }
                    // }
                    break;

                case "boothVisit":
                    $id = $request->get("id");
                    $booth = Booth::find($id);
                    if ($booth) {
                        //Verified booth, now saving to database
                        $pointsDetails["points"] = BOOTH_VISIT_POINTS;
                        $pointsDetails["details"] = $id;

                        if (!Points::where($pointsDetails)->count()) {
                            Points::create($pointsDetails);
                            User::where("id", $userId)->update([
                                "points" => DB::raw('points+' . $pointsDetails["points"]),
                            ]);
                        }
                    }
                    break;
                case "boothVisit":
                    $id = $request->get("id");
                        //Verified booth, now saving to database
                        $pointsDetails["points"] = PHOTOBOOTH_VISIT;
                        $pointsDetails["details"] = $id;

                        if (!Points::where($pointsDetails)->count()) {
                            Points::create($pointsDetails);
                            User::where("id", $userId)->update([
                                "points" => DB::raw('points+' . $pointsDetails["points"]),
                            ]);
                        }
                    break;

                case "BoothChat":
                    $id = $request->get("id");
                    $booth = Booth::find($id);
                    if ($booth) {
                        //Verified booth, now saving to database
                        $pointsDetails["points"] = BOOTH_CHAT_POINTS;
                        $pointsDetails["details"] = $id;
                        if (!Points::where($pointsDetails)->count()) {
                            Points::create($pointsDetails);
                            User::where("id", $userId)->update([
                                "points" => DB::raw('points+' . $pointsDetails["points"]),
                            ]);
                        }
                    }
                    break;

                case "boothContentTab":
                    $id = $request->get("id");
                    $tab = $request->get("tab", false);
                    $validTabs = ["description-modal-" . $id, "videolist-modal-" . $id, "resourcelist-modal-" . $id];
                    $booth = Booth::find($id);
                    if (
                        $booth && $tab && in_array($tab, $validTabs)
                    ) {
                        //Verified booth and tab, now saving to database
                        $pointsDetails["points"] = BOOTH_RESOURCES_VIEW_POINTS;
                        $pointsDetails["details"] = $id . "|" . $tab;

                        if (!Points::where($pointsDetails)->count()) {
                            Points::create($pointsDetails);
                            User::where("id", $userId)->update([
                                "points" => DB::raw('points+' . $pointsDetails["points"]),
                            ]);
                        }
                    }
                    break;

                case "resourceView":
                    $pointsDetails["points"] = RESOURCE_VIEW_POINTS;
                    $pointsDetails["details"] = request()->get("url", false);
                    if ($pointsDetails["details"] && !Points::where($pointsDetails)->count()) {
                        Points::create($pointsDetails);
                        User::where("id", $userId)->update([
                            "points" => DB::raw('points+' . $pointsDetails["points"]),
                        ]);
                    }
                    break;
                case "museumVisit":
                    $pointsDetails["points"] = MUSEUM_VISIT_POINTS;
                    $pointsDetails["details"] = request()->get("id", false);
                    if ($pointsDetails["details"] && !Points::where($pointsDetails)->count()) {
                        Points::create($pointsDetails);
                        User::where("id", $userId)->update([
                            "points" => DB::raw('points+' . $pointsDetails["points"]),
                        ]);
                    }
                    break;
                case "workshopVisit":
                    $pointsDetails["points"] = MUSEUM_VISIT_POINTS;
                    $pointsDetails["details"] = request()->get("id", false);
                    if ($pointsDetails["details"] && !Points::where($pointsDetails)->count()) {
                        Points::create($pointsDetails);
                        User::where("id", $userId)->update([
                            "points" => DB::raw('points+' . $pointsDetails["points"]),
                        ]);
                    }
                    break;

                case "sessionView":
                    $pointsDetails["points"] = SESSION_ATTENDING_POINTS;
                    $pointsDetails["details"] = request()->get("id", false);
                    if ($pointsDetails["details"] && !Points::where($pointsDetails)->count()) {
                        Points::create($pointsDetails);
                        User::where("id", $userId)->update([
                            "points" => DB::raw('points+' . $pointsDetails["points"]),
                        ]);
                    }
                    break;

                case "videoView":
                    $pointsDetails["points"] = VIDEO_VIEWING_POINTS;
                    $pointsDetails["details"] = request()->get("video", false);
                    if ($pointsDetails["details"] && !Points::where($pointsDetails)->count()) {
                        Points::create($pointsDetails);
                        User::where("id", $userId)->update([
                            "points" => DB::raw('points+' . $pointsDetails["points"]),
                        ]);
                    }
                    break;

                case "boothBookingModalOpened":
                case "boothBookingSlotSelected":
                case "boothBookingCallScheduled":
                case "boothShowInterestButtonClicked":
                    //This it is just for analytics - keep on recording without giving points
                    $pointsDetails["points"] = 0;
                    $pointsDetails["details"] = $request->get("id");
                    Points::create($pointsDetails);
                    break;
                case "zoom_video_view":
                    $pointsDetails["points"] = EXTERIOR_ZOOM_POINTS;
                    $pointsDetails["details"] = $request->get("name");
                    if ($pointsDetails["details"] && !Points::where($pointsDetails)->count()) {
                        Points::create($pointsDetails);
                        User::where("id", $userId)->update([
                            "points" => DB::raw('points+' . $pointsDetails["points"]),
                        ]);
                    }
                    break;


                default:
                    //By Default it is just for analytics - keep on recording without giving points
                    $pointsDetails["points"] = 0;
                    Points::create($pointsDetails);
            }
        }
        return "OK";
    }

    public function sendSwagsToEmail()
    {
        $user = Auth::user();
        $event = Event::findOrFail($user->event_id);
        $swags = Swagbag::where("user_id", $user->id)->with([
            "resource.booth",
            "report.resources",
        ])->get();
        $resources = [];
        foreach ($swags as $swag) {
            if ($swag->resource) {
                $title = $swag->resource->title;
                if (isset($swag->resource->booth) && isset($swag->resource->booth->name)) {
                    $title .= " (" . $swag->resource->booth->name . ")";
                }
                array_push($resources, ["title" => $title, "link" => assetUrl($swag->resource->url)]);
            }
            if (isset($swag->report) && isset($swag->report->resources)) {
                foreach ($swag->report->resources as $resource) {
                    array_push($resources, ["title" => $resource->title, "link" => assetUrl($resource->url)]);
                }
            }
        }
        // dd($resources);
        Mail::to($user->email)->send(new swagbagMail($event, $resources, $user));

        return ["success" => TRUE];
    }

    public function generateMeetingSignature($id)
    {
        return response([
            "signature" => generateSignature($id)
        ], 200)
            ->withHeaders(["Access-Control-Allow-Origin" => "*"]);
    }

    public function auditoriumEmbed(Request $request)
    {
        try {
            $user = Auth::user();
            $videoId = $request->get("id", false);
            //room name
            $type = $request->get("type", EVENT_ROOM_AUDI);
            $event_id = $request->get("event_id");

            //Fetch Current Session
            $session = $this->getCurrentRunningSession($type);


            if (!$session) {
                //No Session Going On 
                return view("event.noSession");
            }
            if ($session->type == "BBB") {
                return redirect(getBBBJoinURL($session->name,$user));
            }

            if ($session->type === "VIDEO_SDK") {
                // dd($session);
                return redirect(route("videosdk", ["meetingId" => $session->zoom_webinar_id, "containerId" => $type]));
            }
            if ($session->type === "WHERE") {
                if($user->type === USER_TYPE_SPEAKER){
                    return redirect(route("where", ["roomUrl" => $session->zoom_webinar_id ]));
                }else{
                    return redirect(route("where", ["roomUrl" => $session->zoom_url ]));
                    // dd($session);

                }
            }

            //Direct Zoom Redirect
            if ($session->type == "ZOOM_EXTERNAL" && strlen($session->zoom_url)) {
                return redirect($session->zoom_url);
            }
            if ($session->type == "VIMEO_ZOOM_EX" && strlen($session->zoom_url)) {
                if ($user->type === USER_TYPE_DELEGATE) {
                    return redirect($session->zoom_url);
                }
            }

            //Setup for normal days
            //To make it visible only for delegates add && $user->type === USER_TYPE_DELEGATE
            if ($session->type == "ZOOM_SDK" && strlen($session->zoom_webinar_id)) {
                return redirect(route("webinar", getZoomParameters($session->zoom_webinar_id, $session->zoom_password && strlen($session->zoom_password) ? $session->zoom_password : "")));
            }

            if ($session->type == "VIMEO_VIDEO_SDK" && strlen($session->zoom_webinar_id)) {
                if ($user->type === USER_TYPE_DELEGATE)
                    return redirect(route("videosdk", ["meetingId" => $session->zoom_webinar_id, "containerId" => $type]));
            }
            if ($session->type == "VIMEO_ZOOM_SDK" && strlen($session->zoom_webinar_id)) {
                if ($user->type === USER_TYPE_DELEGATE)
                    return redirect(route("webinar", getZoomParameters($session->zoom_webinar_id, $session->zoom_password && strlen($session->zoom_password) ? $session->zoom_password : "")));
            }
            //Get Vimeo Video ID
            $videoId = false;
            if ($session && $session->vimeo_url) {
                $videoId = $session->vimeo_url;
            }
            //Vimeo Embed
            if ($videoId) {
                return view("event.vimeoEmbed")->with(compact("videoId"));
            }
            return view("event.noSession");
        } catch (\Exception $e) {
            dd($e);
            return view("event.noSession");
        }
    }

    //    public function meetEmbed(Request $request){
    //        $index = $request->get("id", 0);
    //        if(isset(MEET_AND_GREET[$index])){
    //            return redirect(
    //                route(
    //                    "webinar",
    //                    getZoomParameters(
    //                        MEET_AND_GREET[$index]['zoom_meet_id'],
    //                    MEET_AND_GREET[$index]['zoom_password'] && strlen(MEET_AND_GREET[$index]['zoom_password']) ? MEET_AND_GREET[$index]['zoom_password'] : ""
    //                    )
    //                )
    //            );
    //        }
    //        return view("event.noSession");
    //    }

    public function webinar()
    {
        return view("event.webinar");
    }

    public function videosdk(Request $request, $meetingId, $containerId)
    {
        // dd($meetingId);
        return view("event.videosdk")->with(compact(["meetingId", "containerId"]));
    }

    public function where(Request $request)
    {
        $roomUrl = $request->roomUrl;
        // dd($request->all());   
        return view("event.where")->with(compact(["roomUrl"]));
    }


    public function webinarEnded()
    {
        return view("event.webinarEnded");
    }

    public function onlineDelegates()
    {
        $delegates = User::where("type", USER_TYPE_DELEGATE)->get([
            "name",
            "online_status"
        ]);
        return $delegates;
    }

    private function getCurrentRunningSession($room)
    {
        $user = Auth::user();
        $session = getCurrentSession(strtoupper($room), $user->event_id);
        if ($session && $session->id) {
            return $session;
        }
        return false;
    }

    public function getCurrentSession(Request $request)
    {
        $room = $request->get("room", EVENT_ROOM_AUDI);
        $session = $this->getCurrentRunningSession($room);
        if ($session) {
            return [
                "id" => $session->id
            ];
        }
        return [
            "id" => false
        ];
    }

    public function getBoothDetails(Booth $booth)
    {
        return [$booth->description, $booth->description_two];
    }

    public function getDelegatesList()
    {
        $onlineDelegates = User::where("type", USER_TYPE_DELEGATE)->where("updated_at", ">", Carbon::now("UTC")->subtract("mins", 1))->get(["id"]);
        $onlineIds = [];
        foreach ($onlineDelegates as $delegate) {
            $onlineIds[] = $delegate->id;
        }
        User::where("type", USER_TYPE_DELEGATE)->whereNotIn("id", $onlineIds)->update(["online_status" => 0]);
        return User::where("type", USER_TYPE_DELEGATE)->orderBy("online_status")->get(["name", "last_name", "online_status"]);
    }

    public function profileInfo()
    {
        return getProfileDetails();
    }

    public function contentTicker()
    {
        $updates = [];
        $user = Auth::user();
        $user->load([
            //            "unread_notifications",
            "unsent_notifications",
        ])
            ->loadCount("contacts")
            ->touch(); //Updating timestamps of user table to show online status

        //Check Users last Connection Requests
        $connectionRequests = UserConnection::where("connection_id", $user->id)->where("status", 0)->orderBy("created_at", "DESC")->select("created_at")->first();
        $updates['lastRequestTime'] = $connectionRequests ? $connectionRequests->created_at : false;

        //Check Users last Sent Connection Requests Status
        $connectionRequests = UserConnection::where("user_id", $user->id)->orderBy("updated_at", "DESC")->select("updated_at")->first();
        $updates['lastSentRequestTime'] = $connectionRequests ? $connectionRequests->updated_at : false;

        //Notifications
        $updates['notifications'] = $user->unsent_notifications;
        $updates['contacts_count'] = $user->contacts_count;
        //        $updates['all_notifications'] = $user->unread_notifications; //Not loading or sending unread notifications since we dont have actually managed it anywhere - nor do we have a space to show the list or archive of notifications
        $user->markNotificationsAsSent();

        return [
            "updates" => $updates,
        ];
    }

    public function showInterestInBooth($booth)
    {
        BoothInterest::firstOrCreate([
            "user_id" => \Auth::user()->id,
            "booth_id" => $booth,
        ]);
        return ["success" => true];
    }

    public function landingPage($subdomain)
    {
        $event = Event::where('slug', $subdomain)->first();
        if ($landing = LandingPage::where('event_id', $event->id)->count() < 1) {
            LandPage($event->id);
        }
        $landing = LandingPage::where('event_id', $event->id)->first();
        $speakers = LandingSpeaker::where('page_id', $landing->id)->get();
        $form = Form::where('event_id', $event->id)->where('user_type', 'attendee')->first();
        $schedule =  getSchedule($event->id);
        $sections = Section::where('landing_id', $landing->id)->get()->load("images");
        // dd($landing->cta);

        // return ($event);
        if (isset($form)) {
            $form->load("fields.formStruct");
            return view("landing.index", compact(['event', 'landing', 'speakers', 'form', 'schedule', "sections"]));
        } else {
            $form = null;
            return view("landing.index", compact(['event', 'landing', 'speakers', 'form', 'schedule', "sections"]));
        }
    }
    public function sendSessionNotifications()
    {
        $sessions = EventSession::where("start_time", "<=", Carbon::now("UTC")->add(10, "minutes"))->where("start_time", ">=", Carbon::now("UTC"))->with("subscriptions.user_min")->get();
        $loginLastTime = Carbon::now("UTC")->subtract(ONLINE_KEEPING_TIME, "seconds");
        $sent = 0;
        foreach ($sessions as $session) {
            foreach ($session->subscriptions as $subscription) {
                $isOnline = $subscription->user_min->updated_at->isAfter($loginLastTime);
                $roomRoute = getRoomRoute($session->room);
                if ($roomRoute) {
                    if ($isOnline) {
                        //Sent in-app notification
                        $sent++;
                        Notification::firstOrCreate(
                            [
                                "type" => "info",
                                "action_type" => "session_reminder",
                                "user_id" => $subscription->user_id,
                                "action_id" => $session->id,
                            ],
                            [
                                "title" => "Session named '" . $session->name . "' is about to start. Join now",
                                "details" => $roomRoute,
                            ]
                        );
                    }
                    $subscription->user_min->sendPushNotification(
                        "Session named '" . $session->name . "' is about to start. Join now",
                        route("event") . "#" . strtolower($roomRoute)
                    );
                }
            }
        }
        return $sent;
    }

    public function generalReports()
    {
        return view("dashboard.reports.general");
    }
    public function loginReports($id)
    {
        return view("dashboard.reports.login")->with(compact(['id']));
    }

    public function generalReportsData($id)
    {
        $loginIdList = \App\LoginLog::where("event_id", $id)->orderBy("created_at", "DESC")->where("created_at", ">=", Carbon::now("UTC")->startOf("day"))->distinct("user_id")->get(["user_id", "created_at"]);
        $ids = [];
        foreach ($loginIdList as $loginLog) {
            $ids[] = $loginLog->user_id;
        }
        $lastLoginList = \App\User::whereIn("id", $ids)->limit(50)->get(["name", "email"]);
        return [
            'login_total' => \App\LoginLog::where("event_id", $id)->distinct("user_id")->count(),
            'login_last_1h' => \App\LoginLog::where("event_id", $id)->where("created_at", ">=", Carbon::now("UTC")->subtract("hour", 1))->distinct("user_id")->count(),
            'unique_login_count' => \App\LoginLog::where("event_id", $id)->where("created_at", ">=", Carbon::now("UTC")->startOf("day"))->distinct("user_id")->count(),
            'last_login_list' => $lastLoginList,
        ];
    }

    public function auditoriumReports()
    {
        $apiRoute = route("reports.auditorium.api");
        $logsRoute = route("reports.export.audiLogs");
        $logName = "Auditorium ";
        return view("dashboard.reports.auditorium")->with(compact([
            'apiRoute',
            'logsRoute',
            'logName',
        ]));
    }
    public function workshopReports($name)
    {
        $apiRoute = route("reports.workshop.api", ['name' => $name]);
        $logsRoute = route("reports.export.workshopLogs", ['name' => $name]);
        $logName = $name;
        return view("dashboard.reports.auditorium")->with(compact([
            'apiRoute',
            'logsRoute',
            'logName',
        ]));
    }

    public function boothReports(Booth $id, $event_id, Request $req)
    {
        $req->session()->put('MangeEvent', 1);
        $apiRoute = route("reports.booth.api", ['id' => $id->id]);
        $logsRoute = route("reports.export.boothLogs", ['id' => $id->id]);
        $logName = $id->name;
        $id = $event_id;
        return view("dashboard.reports.auditorium")->with(compact([
            'apiRoute',
            'logsRoute',
            'logName',
            'id'
        ]));
    }

    public function auditoriumReportsData()
    {
        $eventName = "audi_visit";
        $loginIdList = \App\Points::where("points_for", $eventName)->orderBy("created_at", "DESC")->where("created_at", ">=", Carbon::now("UTC")->startOf("day"))->distinct("points_to")->get(["points_to", "created_at"]);
        $ids = [];
        foreach ($loginIdList as $loginLog) {
            $ids[] = $loginLog->points_to;
        }
        $lastLoginList = \App\User::whereIn("id", $ids)->limit(50)->get(["name", "email"]);
        return [
            'login_total' => \App\Points::where("points_for", $eventName)->distinct("points_to")->count(),
            'login_last_1h' => \App\Points::where("points_for", $eventName)->where("created_at", ">=", Carbon::now("UTC")->subtract("hour", 1))->distinct("points_to")->count(),
            'unique_login_count' => \App\Points::where("points_for", $eventName)->where("created_at", ">=", Carbon::now("UTC")->startOf("day"))->distinct("points_to")->count(),
            'last_login_list' => $lastLoginList,
        ];
    }
    public function workshopReportsData($name)
    {
        $eventName = $name . "_visit";
        $loginIdList = \App\Points::where("points_for", $eventName)->orderBy("created_at", "DESC")->where("created_at", ">=", Carbon::now("UTC")->startOf("day"))->distinct("points_to")->get(["points_to", "created_at"]);
        $ids = [];
        foreach ($loginIdList as $loginLog) {
            $ids[] = $loginLog->points_to;
        }
        $lastLoginList = \App\User::whereIn("id", $ids)->limit(50)->get(["name", "email"]);
        return [
            'login_total' => \App\Points::where("points_for", $eventName)->distinct("points_to")->count(),
            'login_last_1h' => \App\Points::where("points_for", $eventName)->where("created_at", ">=", Carbon::now("UTC")->subtract("hour", 1))->distinct("points_to")->count(),
            'unique_login_count' => \App\Points::where("points_for", $eventName)->where("created_at", ">=", Carbon::now("UTC")->startOf("day"))->distinct("points_to")->count(),
            'last_login_list' => $lastLoginList,
        ];
    }
    public function boothReportsData($id)
    {
        $eventName = "boothVisit";
        $loginIdList = \App\Points::where("points_for", $eventName)->where("details", $id)->orderBy("created_at", "DESC")->where("created_at", ">=", Carbon::now("UTC")->startOf("day"))->distinct("points_to")->get(["points_to", "created_at"]);
        $ids = [];
        foreach ($loginIdList as $loginLog) {
            $ids[] = $loginLog->points_to;
        }
        $lastLoginList = \App\User::whereIn("id", $ids)->limit(50)->get(["name", "email"]);
        return [
            'login_total' => \App\Points::where("points_for", $eventName)->where("details", $id)->distinct("points_to")->count(),
            'login_last_1h' => \App\Points::where("points_for", $eventName)->where("details", $id)->where("created_at", ">=", Carbon::now("UTC")->subtract("hour", 1))->distinct("points_to")->count(),
            'unique_login_count' => \App\Points::where("points_for", $eventName)->where("details", $id)->where("created_at", ">=", Carbon::now("UTC")->startOf("day"))->distinct("points_to")->count(),
            'last_login_list' => $lastLoginList,
        ];
    }

    public function exportLoginLogs($id)
    {
        $log = LoginLog::where("event_id", $id)->orderBy("created_at", "DESC")->distinct("user_id")->with("user")->get([
            "user_id",
            "created_at",
        ]);
        $toSend = [];
        $uniqIds = [];
        $tz = Event::findorfail($id)->timezone;
           
        foreach ($log as $item) {
            if (!in_array($item->user_id, $uniqIds)) {
                $uniqIds[] = $item->user_id;
                if ($item->user) {
                    $u = $item->user->toArray();
                    $time = (new Carbon($item->created_at, "UTC"))->setTimezone(new CarbonTimeZone($tz))->format('j M Y H:i:s A');
                    array_push($u,  $time);
                    unset($u['id']);
                    $toSend[] = $u;
                }
            }
        }
        return $toSend;
    }

    public function exportAuditoriumLogs()
    {
        $loginIdList = \App\Points::where("points_for", "audi_visit")->orderBy("created_at", "DESC")->distinct("points_to")->with("User")->get();
        $ids = [];
        foreach ($loginIdList as $loginLog) {
            if ($loginLog->user) {
                $ids[] = [
                    "Email" => $loginLog->user->email,
                    "Name" => $loginLog->user->name,
                    "Last Name" => $loginLog->user->last_name,
                    "Visited At" => $loginLog->created_at->format('j M Y H:i:s A'),
                ];
            }
        }
        return $ids;
    }

    public function exportWorkshopLogs($name)
    {
        $eventName = $name . "_visit";
        $loginIdList = \App\Points::where("points_for", $eventName)->orderBy("created_at", "DESC")->distinct("points_to")->with("User")->get();
        $ids = [];
        foreach ($loginIdList as $loginLog) {
            if ($loginLog->user) {
                $ids[] = [
                    "Email" => $loginLog->user->email,
                    "Name" => $loginLog->user->name,
                    "Last Name" => $loginLog->user->last_name,
                    "Visited At" => $loginLog->created_at->format('j M Y H:i:s A'),
                ];
            }
        }
        return $ids;
    }

    public function exportBoothLogs($id)
    {
        $eventName = "boothVisit";
        $loginIdList = \App\Points::where("points_for", $eventName)->where("details", $id)->orderBy("created_at", "DESC")->distinct("points_to")->with("User")->get();
        $ids = [];
        foreach ($loginIdList as $loginLog) {
            if ($loginLog->user) {
                $ids[] = [
                    "Email" => $loginLog->user->email,
                    "Name" => $loginLog->user->name,
                    "Last Name" => $loginLog->user->last_name,
                    "Visited At" => $loginLog->created_at->format('Y-m-d\TH:i'),
                    "Company Name" => $loginLog->user->company_name,

                ];
            }
        }
        return $ids;
    }

    public function settingsColorUpdate($id, Request $req)
    {
        $event = Event::findOrFail($id);
        $event->primary_color = $req->primary_color;
        $event->secondary_color = $req->secondary_color;
        if ($event->save()) {
            flash("Color Save Successfully")->success();
            return redirect()->back();
        } else {
            flash("Couldnot Save The Color Try Again")->error();
            return redirect()->back();
        }
    }


    public function LoaderUpdate(Request $req)
    {
        $loader = $req->loader_id;
        $id = $req->event_id;
        $event = Event::findOrFail($id);
        $event->def_loader = $loader;
        if ($event->save()) {
            return response()->json(['code' => 200, 'message' => "Loader Changed Successfully"]);
        } else {
            return response()->json(['code' => 500, 'message' => "Something Went Wrong"]);
        }
    }
}

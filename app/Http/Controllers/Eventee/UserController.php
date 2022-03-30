<?php

namespace App\Http\Controllers\Eventee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Booth;
use App\User;
use App\UserConnection;
use App\Contact;
use App\UserTag;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use Mail;
use App\Event;
use App\UserData;
use App\UserSubtype;
use App\Imports\UserImport;
use Sichikawa\LaravelSendgridDriver\Transport\SendgridTransport;
use App\Http\Requests\UserFormRequest;
use App\Http\Requests\SubTypeFormRequest;
use stdClass;
use App\CometChat;

class UserController extends Controller
{
    //
    public function index($id)
    {

        try{
            $users = User::orderBy("created_at", "DESC")->where('event_id', ($id))->get();
        // return $users;
            return view("eventee.users.list", compact("id", "users"));
        }
        catch(\Exception $e){
            if(Auth::user()->type === 'admin'){
                dd($e->getMessage());
            }
            else{
                Log::error($e->getMessage());
            }
          } 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        try{
            $subtypes = UserSubtype::where('event_id',$id)->get();

            return view("eventee.users.create", compact('id',"subtypes"));
        }
        catch(\Exception $e){
            if(Auth::user()->type === 'admin'){
                dd($e->getMessage());
            }
            else{
                Log::error($e->getMessage());
            }
          } 
    }
    
    public function subTypesList($id)
    {
       try{
        $subtypes = UserSubtype::where('event_id',$id)->get();
        return view("eventee.subtype.list",compact("id","subtypes"));
       }
       catch(\Exception $e){
        if(Auth::user()->type === 'admin'){
            dd($e->getMessage());
        }
        else{
            Log::error($e->getMessage());
        }
      } 
    }
   
    public function subTypecreate($id)
    {
        try{
            return view("eventee.subtype.create", compact('id'));
        }
        catch(\Exception $e){
            if(Auth::user()->type === 'admin'){
                dd($e->getMessage());
            }
            else{
                Log::error($e->getMessage());
            }
          } 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function subTypestore(SubTypeFormRequest $request, $id)
    {
        try{
            // if(empty($request->name)){
        //     flash('Name Cannot Be Blank')->error();
        //     return redirect()->back();
            // }
            $check = UserSubtype::where('name',$request->name)->where('event_id',$id)->count();
            if($check < 1){
                $usertype = UserSubtype::create([
                    'name'=>$request->name,
                    'event_id'=>$id
                ]);
                flash("Subtype is created")->success();
                return redirect(route("eventee.subtypes",$id));
            }
            else{
                flash("Cannot Create Same Sub Types")->error();
                return redirect()->back();
            }
        }
        catch(\Exception $e){
            if(Auth::user()->type === 'admin'){
                dd($e->getMessage());
            }
            else{
                Log::error($e->getMessage());
            }
          } 
        
    }
    public function subTypedelete(Request $request, UserSubtype $id)
    {
        // dd($id);
        try{
            $id->delete();
            return true;
        }
        catch(\Exception $e){
            if(Auth::user()->type === 'admin'){
                dd($e->getMessage());
            }
            else{
                Log::error($e->getMessage());
            }
          } 
    }




    public function store(UserFormRequest $request, $id)
    {
       try{
            // if(empty($request->name)){
            //     flash("Name Field Cannot Be Blank")->error();
            //     return redirect()->back();
            // }
            // elseif(empty($request->last_name)){
            //     flash("Last Name Field Cannot Be Blank")->error();
            //     return redirect()->back();
            // }
            // elseif(empty($request->email)){
            //     flash("Email Field Cannot Be Blank")->error();
            //     return redirect()->back();
            // }
            // elseif(empty($request->type)){
            //     flash("Type Muse Be Selected")->error();
            //     return redirect()->back();
            // }
            
            // $userData = $request->except("_token");
            // $userData["password"] = Hash::make($userData["password"]);
            // $userData["isCometChatAccountExist"] = TRUE;
            
            // $userCount = User::where('event_id', ($id))->count();
            // if ($userCount < 5) {
                $userEmail = User::where('email','like','%'.$request->email.'%')->where('event_id',$id)->count();
                if($userEmail > 0){
                    flash("Same Email ID Already Exist For The Current Event")->error();
                    return redirect()->back();
                }
                $userDEmail = User::onlyTrashed()->where('email','like','%'.$request->email.'%')->where('event_id',$id)->count();
                if($userDEmail > 0){
                    flash("Same Email ID Already Exist In the Trash Please Restore")->error();
                    return redirect()->back();
                }
                $event = Event::find($id);
                $totalusersCount = User::where('event_id',$id)->count();
                if($totalusersCount >= $event->total_attendees){
                    flash("Total Number Of User Creation Exceeded! Please Contact Admin To Upgrade");
                    return redirect()->back();
                }
                $user = new User;
                $user->name = $request->name;
                $user->last_name = $request->last_name;
                $user->event_id = $id;
                $user->type = $request->type;
                if($request->has('password')){
                    $user->password = password_hash($request->password, PASSWORD_DEFAULT);
                }
                $user->email = $request->email;
                // $user->isCometChatAccountExist = TRUE;
                $user->subtype = $request->subtype;
                


                // $user->sendEmailVerificationNotification();
                // create user in comet chat
                // Http::withHeaders(
                //     [
                //         'appId' => env('COMET_CHAT_APP_ID'),
                //         'apiKey' => env('COMET_CHAT_API_KEY'),
                //         "Accept-Encoding" => "deflate, gzip",
                //         "Content-Encoding" => "gzip"
                //     ]
                // )
                //     ->post(env('COMET_CHAT_BASE_URL') . '/v2.0/users', [
                //         'uid' => $user->id,
                //         'name' => $user->name
                //     ]);
                if ($user->save()) {
                    flash("New User Added")->success();
                    $chat_app = CometChat::where("event_id",$id)->first();
                    if($chat_app){
                        createUser($chat_app,$user);    
                    }
                    return redirect()->route('eventee.user', $id);
                } else {
                    flash("Something went wrong")->error();
                    return redirect()->back();
                }
            // } else{
                // $url = route('eventee.license',$id);
                // $message = "Cant Add More Users ,Please Contact Admin To Add More User and upgrade your account.<br />". "<a href='".$url."'>Send Message To Admin For Licence Upgrade</a>";
                // flash($message)->info();
                // return redirect()->back();
            // }
       }
       catch(\Exception $e){
        if(Auth::user()->type === 'admin'){
            dd($e->getMessage());
        }
        else{
            Log::error($e->getMessage());
        }
      } 
    }

    public function bulk_create(Request $request)
    {
        $data = $request->except("_token");
        if (isset($data["users"]) && count($data["users"]) > 0) {
            $users = $data["users"];
            foreach ($users as $user) {
                $existingUser = User::where(env('ATTENDEE_LOGIN_FIELD'), $user[env('ATTENDEE_LOGIN_FIELD')])->first();
                if (!$existingUser) {
                    $user = User::create($user);
                    $user->markEmailAsVerified();

                    Http::withHeaders(
                        [
                            "appId" => env("COMET_CHAT_APP_ID"),
                            "apiKey" => env("COMET_CHAT_API_KEY"),
                            "Accept-Encoding" => "deflate, gzip",
                            "Content-Encoding" => "gzip"
                        ]
                    )
                        ->post(
                            env('COMET_CHAT_BASE_URL') . "/v2.0/users",
                            [
                                "uid" => $user->id,
                                "name" => $user->name
                            ]
                        );

                    //     $resp  = Mail::send([], [], function (Message $message) use ($user) {
                    //        $message
                    //            ->to($user->email)
                    //            ->from(env("MAIL_FROM_ADDRESS"), env("MAIL_FROM_NAME"))
                    //            ->replyTo(env('MAIL_TO_ADDRESS'), env('MAIL_TO_NAME'))
                    //            ->embedData([
                    //                'personalizations' => [
                    //                    [
                    //                        'dynamic_template_data' => [
                    //                            'user' => "{$user->name} {$user->last_name}",
                    //                            'email'  => strtolower($user->email),
                    //                        ],
                    //                    ],
                    //                ],
                    //                'template_id' => config("services.sendgrid.templates.register"),
                    //            ], SendgridTransport::SMTP_API_NAME);
                    //    });

                } else {
                    $existingUser->update($user);
                }
            }
            return ["success" => TRUE];
        }
        return ["success" => FALSE, "message" => "Please upload some file containing user details"];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id, $user_id)
    {
        try{
            $user = User::findOrFail($user_id);
            $subtypes = UserSubtype::where('event_id',$id)->get();

            // return $user;
            return view("eventee.users.edit", compact("id", "user_id", "user","subtypes"));
        }
        catch(\Exception $e){
            if(Auth::user()->type === 'admin'){
                dd($e->getMessage());
            }
            else{
                Log::error($e->getMessage());
            }
          } 
    }
    
    public function subTypeedit(Request $request, $id, UserSubtype $subtype)
    {
        try{
            return view("eventee.subtype.edit", compact("id", "subtype"));
        }
        catch(\Exception $e){
            if(Auth::user()->type === 'admin'){
                dd($e->getMessage());
            }
            else{
                Log::error($e->getMessage());
            }
          } 

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function subTypeupdate(Request $request, $id, UserSubtype $subtype)
    {
       try{
            $subtype->update([
                "name"=>$request->name
            ]);
            return redirect(route("eventee.subtypes",$id));
            // dd($subtype);
       }
       catch(\Exception $e){
        if(Auth::user()->type === 'admin'){
            dd($e->getMessage());
        }
        else{
            Log::error($e->getMessage());
        }
      } 
    }
    public function update(Request $request, $id, $user_id)
    {
        try{
            // dd($request->all());
            $user = User::findOrFail($user_id);
            $cometChat = isset($userData["enable_chat"]) ? 'enable' : null;
            $cometChat =  isset($userData["disable_chat"]) ? 'disable' : $cometChat;

            // switch ($cometChat) {
            //     case 'enable':
            //         // attempt creating account
            //         $response = Http::withHeaders([
            //             'appId' => env('COMET_CHAT_APP_ID'),
            //             'apiKey' => env('COMET_CHAT_API_KEY'),
            //             "Accept-Encoding" => "deflate, gzip",
            //             "Content-Encoding" => "gzip"
            //         ])
            //             ->post(env('COMET_CHAT_BASE_URL') . '/v2.0/users', [
            //                 'uid' => $user->id,
            //                 'name' => $user->name
            //             ]);

            //         // account created, reactivate it
            //         if ($response->clientError()) {
            //             Http::withHeaders([
            //                 'appId' => env('COMET_CHAT_APP_ID'),
            //                 'apiKey' => env('COMET_CHAT_API_KEY'),
            //                 "Accept-Encoding" => "deflate, gzip",
            //                 "Content-Encoding" => "gzip"
            //             ])
            //                 ->put(env('COMET_CHAT_BASE_URL') . '/v2.0/users',  ['uidsToActivate' => [$user->id]]);
            //             $user->isCometChatAccountExist = TRUE;
            //         }
            //         break;
            //     case 'disable':
            //         Http::withHeaders([
            //             'appId' => env('COMET_CHAT_APP_ID'),
            //             'apiKey' => env('COMET_CHAT_API_KEY'),
            //             "Accept-Encoding" => "deflate, gzip",
            //             "Content-Encoding" => "gzip"
            //         ])
            //             ->delete(env('COMET_CHAT_BASE_URL') . '/v2.0/users/' . $user->id, ["permanent" => FALSE]);
            //         $user->isCometChatAccountExist = FALSE;
            //         break;
            // }

            // update name in comet chat as well
            if ($user->name != $request->name && $user->isCometChatAccountExist) {
                Http::withHeaders([
                    'appId' => env('COMET_CHAT_APP_ID'),
                    'apiKey' => env('COMET_CHAT_API_KEY'),
                    "Accept-Encoding" => "deflate, gzip",
                    "Content-Encoding" => "gzip"
                ])
                    ->put(env('COMET_CHAT_BASE_URL') . '/v2.0/users/' . $user->id, ["name" => $request->name]);
            }

            $user->name = $request->name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->type = $request->type;
            if($request->has('subtype')){
                $user->subtype = $request->subtype;
            }
            
            if($request->passsword){
                $user->password = Hash::make($request->pasword);
            }
            $user->save();
            // dd($user);

            return redirect()->route('eventee.user', $id);
        }
        catch(\Exception $e){
            if(Auth::user()->type === 'admin'){
                dd($e->getMessage());
            }
            else{
                Log::error($e->getMessage());
            }
          } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req)
    {
        
        $user = User::findOrFail($req->id);
        $chat_app = CometChat::where("event_id",$user->event_id)->first();
        deleteUser($chat_app,$user);
        
        $user->delete();
        return response()->json(['message'=>"User Deleted Succesfully"]);
    }

    public function changePassword(Request $request)
    {
        return view("user.changePassword");
    }
    public function updatepassword(Request $request)
    {
        $request->validate([
            "oldpassword" => "required",
            "newpassword" => "required|min:8"
        ]);
        $credentials = [
            "email" => Auth::user()->email,
            "password" => $request->oldpassword
        ];
        if (Auth::attempt($credentials)) {
            //successfully update password
            if ($request->newpassword == $request->confirmnew) {
                User::find(Auth::user()->id)->update(["password" => Hash::make($request->newpassword)]);

                return redirect()
                    ->back()
                    ->withErrors([
                        "success" => "Successfully Updated Password"
                    ]);;
            } else {
                return redirect()
                    ->back()
                    ->withErrors([
                        "passmismatch" => "The New Password And Confirm Password Dont match"
                    ]);
            }
        } else {
            return redirect()
                ->back()
                ->withErrors([
                    "oldpassword" => "The Old Password is Wrong"
                ]);;
        }
    }
    public function syncUserChat($id)
    {
        // return $id;
        $users = User::where("event_id",$id)->get(["id", "name"]);
        $chat_app = CometChat::where("event_id",$id)->first();
        if(!$chat_app){
            return ["success" => FALSE];
        }

        if (count($users) == 0) {
            return ["success" => TRUE];
        }

        $users->each(function ($user) use($chat_app) {
            createUser($chat_app,$user);
            // $user->isCometChatAccountExist = TRUE;
            // $user->save();
        });

        // $left = User::where("isCometChatAccountExist", FALSE)->where("event_id",$id)->count();
        // $total = User::where("event_id",$id)->count();
        return ["success" => TRUE];
    }

   

    public function syncGroupChat($id)
    {
        $booths = Booth::where("event_id",$id)->get(["id", "name"]);
        $chat_app = CometChat::where("event_id",$id)->first();

        $booths->each(function ($booth) use($chat_app) {
            createGroup($chat_app,$booth);
            // Http::withHeaders([
            //     "apiKey" => env("COMET_CHAT_API_KEY"),
            //     "appId" => env("COMET_CHAT_APP_ID"),
            //     "accept" => "application/json",
            //     "Accept-Encoding"=> "deflate, gzip",
            //     "Content-Encoding"=> "gzip"
            // ])
            //     ->post(env('COMET_CHAT_BASE_URL') . "/v2.0/groups", [
            //         "guid" => $booth->id,
            //         "name" => $booth->name,
            //         "type" => "public"
            //     ]);
        });
        return ["success" => TRUE];
    }

    public function sendConnectionRequest(Request $request)
    {
        $user = $request->get("user", false);
        if ($user) {
            $connection = getConnection($user, Auth::user()->id);
            if ($connection) {
                $connection['success'] = true;
                return $connection;
            }
            $user = User::find($user);
            if ($user) {
                $user->requestConnection();
                $connection = getConnection($user->id, Auth::user()->id);
                if ($connection) {
                    $connection['success'] = true;
                    return $connection;
                }
            }
        }
        return [
            "success" => false,
            "message" => "Please select a user"
        ];
    }

    public function updateConnectionRequest(Request $request)
    {
        $connection = $request->get("connection", false);
        $status = (int) $request->get("status", 0);
        if ($status == 0) {
            return ["message" => "Can only accept or reject connections. Cannot make them pending again!", "success" => false];
        }
        if ($connection && ($status == 1 || $status == -1)) {
            $connection = UserConnection::find($connection);
            if (Auth::user()->id === $connection->connection_id) {
                $connection->setStatus($status);
                return [
                    "success" => true,
                    'connection_status' => $connection->status,
                    'connection_id' => $connection->id,
                    'connection_type' => "received"
                ];
            }
        }
        return ["success" => false, "message" => "No actionable request found!"];
    }

    public function suggestedContacts(Request $request)
    {
        $user = Auth::user();
        $user->load("looking_for_tags.user_id");
        $suggestedIds = [];
        foreach ($user->looking_for_tags as $tag) {
            foreach ($tag->users as $userSingle) {
                if (!in_array($userSingle->user_id, $suggestedIds) && $userSingle->user_id !== $user->id) {
                    $suggestedIds[] = $userSingle->user_id;
                    $userSingle['id'] = $userSingle->user_id;
                }
            }
        }
        $page = (int) $request->get("page", 1);
        $offset = NUMBER_OF_CONTACTS_TO_SHOW * ($page - 1);
        $users = User::whereIn("id", $suggestedIds)->limit(NUMBER_OF_CONTACTS_TO_SHOW)->offset($offset)->with("tags")->select(USER_COLUMNS_TO_GET_SAFE)->get();
        $usersNew = [];
        foreach ($users as $user) {
            $user->is_online = $user->isOnline();
            $usersNew[] = $user->toArray();
        }
        $users = $usersNew;
        $totalCount = count($suggestedIds);
        return [
            "users" => setUserConnectionStatus($users),
            "total" => $totalCount,
            "page" => $page,
            "per_page" => NUMBER_OF_CONTACTS_TO_SHOW,
            "total_pages" => ceil($totalCount / NUMBER_OF_CONTACTS_TO_SHOW),
        ];
    }

    public function allEventAttendees(Request $request)
    {
        $page = (int) $request->get("page", 1);
        $offset = NUMBER_OF_CONTACTS_TO_SHOW * ($page - 1);
        $userQuery = User::whereNotIn("type", NOT_ATTENDEE_USER_TYPES)->whereNotIn("id", [Auth::user()->id]);
        if ($request->has("search") && strlen($request->get("search")) > 0) {
            $userQuery->where("name", "like", "%" . $request->get("search") . "%");
            $userQuery->orWhere("email", "like", "%" . $request->get("search") . "%");
            $userQuery->orWhere("company_name", "like", "%" . $request->get("search") . "%");
            //            $userQuery->orWhere("job_title", "like", "%" . $request->get("search") . "%");
        }
        if ($request->has("tags") && is_iterable($request->get("tags")) && count($request->get("tags")) > 0) {
            $ids = [];
            foreach ($request->get("tags") as $tagname) {
                if ($tagname) {
                    $tag = UserTag::where("tag", "like", $tagname)->with("user_id")->first();
                    if (isset($tag->user_id)) {
                        foreach ($tag->user_id as $user) {
                            $ids[] = $user->user_id;
                        }
                    }
                }
            }
            $userQuery->whereIn("id", $ids);
        }
        if ($request->has("tag") && strlen($request->get("tag")) > 0) {
            $tag = UserTag::where("tag", $request->get("tag"))->with("user_id")->first();
            $ids = [];
            foreach ($tag->user_id as $user) {
                $ids[] = $user->user_id;
            }
            $userQuery->whereIn("id", $ids);
        }
        if ($request->has("industry") && strlen($request->get("industry")) > 0) {
            $userQuery->where("industry", $request->get("industry"));
        }
        if ($request->has("company_size") && strlen($request->get("company_size")) > 0) {
            $userQuery->where("company_size", $request->get("company_size"));
        }
        if ($request->has("role") && strlen($request->get("role")) > 0) {
            $userQuery->where("job_title", $request->get("role"));
        }
        $totalCount = $userQuery->count();
        $users = $userQuery->with("tags")->orderBy("points")->limit(NUMBER_OF_CONTACTS_TO_SHOW)->offset($offset)->select(USER_COLUMNS_TO_GET)->get();
        $usersNew = [];
        foreach ($users as $user) {
            $user->is_online = $user->isOnline();
            $usersNew[] = $user->toArray();
        }
        $users = $usersNew;
        return [
            "users" => setUserConnectionStatus($users),
            "total" => $totalCount,
            "page" => $page,
            "per_page" => NUMBER_OF_CONTACTS_TO_SHOW,
            "total_pages" => ceil($totalCount / NUMBER_OF_CONTACTS_TO_SHOW),
            "tags" => $request->get("tags")
        ];
    }

    public function myConnectionRequests(Request $request)
    {
        $user = Auth::user();
        $page = (int) $request->get("page", 1);
        $offset = NUMBER_OF_CONTACTS_TO_SHOW * ($page - 1);
        $connectionRequests = UserConnection::where("connection_id", $user->id)->where("status", 0)->limit(NUMBER_OF_CONTACTS_TO_SHOW)->offset($offset)->with("sender.tags")->get();
        $users = [];
        foreach ($connectionRequests as $connectionRequest) {
            if ($connectionRequest->sender) {
                $connectionRequest->sender->is_online = $connectionRequest->sender->isOnline();
                $users[] = $connectionRequest->sender->toArray();
            }
        }
        $totalCount = UserConnection::where("connection_id", $user->id)->where("status", 0)->count();
        return [
            "users" => setUserConnectionStatus($users),
            "total" => $totalCount,
            "page" => $page,
            "per_page" => NUMBER_OF_CONTACTS_TO_SHOW,
            "total_pages" => ceil($totalCount / NUMBER_OF_CONTACTS_TO_SHOW),
        ];
    }

    public function mySavedContacts(Request $request)
    {
        $user = Auth::user();
        $page = (int) $request->get("page", 1);
        $offset = NUMBER_OF_CONTACTS_TO_SHOW * ($page - 1);
        $users = [];
        //        $contacts = Contact::where("user_id", $user->id)->with("user.tags")->offset($offset)->limit(NUMBER_OF_CONTACTS_TO_SHOW)->get("contact_id");
        $userQuery = Contact::where("user_id", $user->id)->with("user.tags");
        if ($request->has("search") && strlen($request->get("search")) > 0) {
            $subQuery = User::where("name", "like", "%" . $request->get("search") . "%");
            $subQuery->orWhere("email", "like", "%" . $request->get("search") . "%");
            $subQuery->orWhere("company_name", "like", "%" . $request->get("search") . "%");
            //            $subQuery->orWhere("job_title", "like", "%" . $request->get("search") . "%");
            $searchedIds = $subQuery->get("id");
            $contactIds = [];
            foreach ($searchedIds as $user) {
                $contactIds[] = $user->id;
            }
            $userQuery->whereIn("contact_id", $contactIds);
        }
        if ($request->has("tag") && strlen($request->get("tag")) > 0) {
            $tag = UserTag::where("tag", $request->get("tag"))->with("user_id")->first();
            $ids = [];
            foreach ($tag->user_id as $user) {
                $ids[] = $user->user_id;
            }
            $userQuery->whereIn("contact_id", $ids);
        }
        if ($request->has("industry") && strlen($request->get("industry")) > 0) {
            $userQuery->where("industry", $request->get("industry"));
        }
        if ($request->has("company_size") && strlen($request->get("company_size")) > 0) {
            $userQuery->where("company_size", $request->get("company_size"));
        }
        if ($request->has("role") && strlen($request->get("role")) > 0) {
            $userQuery->where("job_title", $request->get("role"));
        }

        $totalCount = $userQuery->count();
        $contacts = $userQuery->offset($offset)->limit(NUMBER_OF_CONTACTS_TO_SHOW)->get("contact_id");
        foreach ($contacts as $contact) {
            if ($contact->user) {
                $contact->user->is_online = $contact->user->isOnline();
                $users[] = $contact->user->toArray();
            }
        }
        return [
            "users" => setUserConnectionStatus($users),
            "total" => $totalCount,
            "page" => $page,
            "per_page" => NUMBER_OF_CONTACTS_TO_SHOW,
            "total_pages" => ceil($totalCount / NUMBER_OF_CONTACTS_TO_SHOW),
        ];
    }


    public function addToContacts(Request $request)
    {
        $user = $request->get("user");
        $currentUser = Auth::user()->id;
        $contact = Contact::firstOrCreate([
            "user_id" => $currentUser,
            "contact_id" => $user,
        ]);
        return [
            "success" => (bool) $contact
        ];
    }

    public function removeContact(Request $request)
    {
        $currentUser = Auth::user()->id;
        $user = $request->get("user");
        if ($user && User::find($user)) {
            Contact::where("user_id", $currentUser)->where("contact_id", $user)->delete();
        }
        return [
            "success" => true
        ];
    }

    public function exportContacts()
    {
        $user = Auth::user();
        $users = [];
        $contacts = Contact::where("user_id", $user->id)->with("user")->get("contact_id");
        foreach ($contacts as $contact) {
            $users[] = $contact->user->toArray();
        }
        $users = setUserConnectionStatus($users, $user, true);
        return [
            "users" => $users,
        ];
    }

    public function sendContactsOnMail()
    {
        $user = Auth::user();
        $users = [];
        $contacts = Contact::where("user_id", $user->id)->with("user")->get("contact_id");
        foreach ($contacts as $contact) {
            $_ = $contact->user->toArray();
            $_["hasAnySocial"] = $_["facebook_link"] || $_["twitter_link"]  || $_["linkedin_link"];
            $users[] = $_;
        }
        // $users = setUserConnectionStatus($users, $user, true); // emails are mandatory for mail template

        Mail::send([], [], function (Message $message) use ($user, $users) {
            $message
                ->to($user->email, $user->name . ' ' . $user->last_name)
                ->from(env("MAIL_FROM_ADDRESS"), env("MAIL_FROM_NAME"))
                ->embedData([
                    'personalizations' => [
                        [
                            'dynamic_template_data' => [
                                'user' => "{$user->name} {$user->last_name}",
                                'users'  => $users,
                            ],
                        ],
                    ],
                    'template_id' => config("services.sendgrid.templates.contacts"),
                ], SendgridTransport::SMTP_API_NAME);
        });

        return ["success" => TRUE];
    }

    public function fetchUserDetails()
    {
        $user = User::where("id", \request()->get("user"))->select(USER_COLUMNS_TO_GET_SAFE)->with("tags")->first();
        if ($user) {
            $user->isOnline = $user->isOnline();
            $user = setUserConnectionStatus([$user->toArray()])[0];
            return [
                "success" => true,
                "user" => $user,
            ];
        }
        return [
            "success" => false,
            "error" => "User not found",
        ];
    }

    public function registerDevice(Request $request)
    {
        $request->validate(["device_id" => "required"]);
        $device_id = $request->input("device_id");
        $user = Auth::user();
        $user->devices()->create(["device_id" => $device_id]);
        return ["success" => true];
    }

	 public function information($id,$user_id){
        $user = User::findOrFail($user_id);
        $user_data = UserData::where('user_id',$user->id)->get();
        return view('eventee.users.info',compact('id','user_data','user'));           
    }

    public function ShowPage($id){
        return view('eventee.users.showpage',compact('id'));
    }

    public function Import($id,Request $req){
        if($req->hasFile('excel_file')){
            $file = $req->file('excel_file');
            // $file->event_id = $id;
            // Excel::import(new UserImport($id),$file);
            $eventCap = Event::find($id);
            $userCap = User::where('event_id',$id)->count();
            $import = Excel::toArray(new UserImport($id),$file);
            $count = count($import) + $userCap;
            if($count < $eventCap->total_attendee){
                Excel::import(new UserImport($id),$file);
            }
            else{
                flash("User Limit Exceeded")->error();
                return redirect()->back();
            }
            // $import = Excel::toArray(new UserImport($id),$file);
            // $count = count($import);
            // dd($import);
            
            $this->syncUserChat($id);
            flash("Data Updated Successfully")->success();
            return redirect()->route('eventee.user',$id);
        }
        else{
            flash("Please Upload The File Properly")->error();
            return redirect()->back();
        }
        
    }
    public function BulkDelete(Request $req){
        $ids = $req->ids;
        $totalcount = 0;
        for($i = 0 ; $i < count($ids); $i++){
            $user = User::findOrFail($ids[$i]);
            $user->delete();
            $userCount = User::where('id',$ids[$i])->count();
            if($userCount > 0){
                $totalcount++;
            }

        }
        if(($totalcount)>0){
        return response()->json(['code'=>500,"Message"=>"Something Went Wrong"]);
        }
        else{
        return response()->json(['code'=>200,"Message"=>"Deleted SuccessFully"]);
        }
    }

    public function DeleteAll(Request $req){
        $users = User::where('event_id',$req->id)->get();
        foreach($users as $user){
            $user->delete();
        }
        return response()->json(['code'=>200,"Message"=>"Deleted SuccessFully"]);
    }
}

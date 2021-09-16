<?php


namespace App\Http\Controllers\Eventee;

use App\Http\Controllers\Controller;

use App\SessionModerator;
use App\User;
use App\Poll;
use App\SessionPoll;
use Illuminate\Http\Request;
use App\sessionRooms;
use App\EventSession;
use App\Vote;
use App\VoteOption;
use App\ArchiveVideos;
use App\Resource;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Auth;


class SessionController extends Controller
{
    public function index($id)
    {
        // $rooms = sessionRooms::all();
        $sessions = EventSession::where('event_id',decrypt($id))->get()->load(["parentroom"]);
        // $sessions.map($session =>{$session->isLive = isSessionActive($session))
        foreach ($sessions as $session) {
            $session->isLive =  isSessionActive($session);
        }
        // dd($id);
        return view("eventee.sessions.list")
            ->with(
                compact([
                    "sessions",
                    "id"
                ])
            );
    }
    public function create($id)
    {
        $rooms = sessionRooms::where('event_id',$id)->get();

        $speakers = User::where("type", USER_TYPE_SPEAKER)->get([
            "id",
            "name",
            "email"
        ]);
        return view("eventee.sessions.createForm")
            ->with(
                compact([
                    "speakers",
                    "rooms",
                    "id"
                ])
            );
    }

    public function store(Request $request)
    {
        $speakers = $request->speakers;
        $request->speakers = null;
        $room = sessionRooms::where("id", $request->room_id)->first();
        // $request->room = $room->name;
        $session = EventSession::create($request->all());
        $session->room = $room->name;
        $session->master_room = $room->master_room;
        $session->save();

        //Old Resoiu
        $oldResources = Resource::where("booth_id", $session->id)->get();
        foreach ($oldResources as $id => $resource) {
            $resource->swagbag()->delete();
            $resource->delete();
        }

        //updating resources
        $requesturls = $request->resources; //Recieved from form
        if ($requesturls) {
            foreach ($requesturls as $id => $requrl) {
                if (!empty(trim($requrl))) {
                    Resource::create([
                        "booth_id" => $session->id,
                        "url" => $requrl,
                        "title" => $request->resourcetitles[$id],
                    ]);
                }
            }
        }





        if ($speakers) {
            foreach ($speakers as $speaker) {
                $session->speakers()->create([
                    "speaker_id" => $speaker,
                ]);
            }
        }
        return redirect()->to(route("sessions.index"));
    }
    public function edit(EventSession $session)
    {
        $session->load(["speakers", "parentroom","resources"]);
        $newspeakers = [];
        foreach ($session->speakers as $speaker) {
            array_push($newspeakers, $speaker->speaker_id);
        }
        $session->speakers = $newspeakers;
        try {
            $st = $session->start_time ? $session->start_time->format('Y-m-d\TH:i') : "";
            unset($session->start_time);
            $session->start_times = $st;
            $et = $session->end_time ? $session->end_time->format('Y-m-d\TH:i') : "";
            unset($session->end_time);
            $session->end_times = $et;
        } catch (\Exception $e) {
            //Do Nothing for now
        }

        // dd($session);        


        $rooms = sessionRooms::all();
        $speakers = User::where("type", USER_TYPE_SPEAKER)->get([
            "id",
            "name",
            "email"
        ]);

        return view('sessions.edit')->with(compact(["session", "rooms", "speakers"]));
    }


    public function update(Request $request, EventSession $session)
    {
        $speakers = $request->speakers;
        $request->speakers = null;
        $session->load("speakers");
        $room = sessionRooms::where("id", $request->room_id)->first();
        $session->update($request->all());
        $session->room = $room->name;
        $session->master_room = $room->master_room;
        $session->save();


        //updating resources

        $requesturls = $request->resources; //Recieved from form
        if ($requesturls) {
            foreach ($requesturls as $id => $requrl) {
                if (!empty(trim($requrl))) {
                    Resource::create([
                        "booth_id" => $session->id,
                        "url" => $requrl,
                        "title" => $request->resourcetitles[$id],
                    ]);
                }
            }
        }

        $newspeakers = [];
        foreach ($session->speakers as $speaker) {
            array_push($newspeakers, $speaker->id);
        }
        $session->speakers = $newspeakers;
        $session->speakers()->delete();
        // $request->room = $room->name;
        if ($speakers) {
            foreach ($speakers as $speaker) {
                $session->speakers()->create([
                    "speaker_id" => $speaker,
                ]);
            }
        }
        return redirect()->to(route("sessions.index"));
    }







    public function moderatorDashboard(Request $request, $session)
    {
        $sessions = getModeratorSessions();
        foreach ($sessions as $sessionSingle) {
            if ($sessionSingle->session->id === $session) {
                return view("sessionManager.pollResult")
                    ->with([
                        'session' => $sessionSingle->session
                    ]);
            }
        }
        abort(403);
    }


    public function destroy(EventSession $session)
    {
        $session->delete();
        // return true;
        return redirect()->to(route("sessions.index"));
    }

    public function save(Request $request)
    {
        $sessions = $request->get("sessions", false);
        if ($sessions && is_array($sessions)) {
            $sessionsStored = [];
            foreach ($sessions as $session) {
                if ($session['id'] == 'false' || $session['id'] == false) {
                    unset($session['id']);
                    $eventSession = EventSession::create($session);
                    $sessionsStored[] = $eventSession->id;
                } else {
                    $eventSession = EventSession::find($session['id']);
                    if (!$eventSession) {
                        unset($session['id']);
                        $eventSession = EventSession::create($session);
                        $sessionsStored[] = $eventSession->id;
                    } else {
                        $eventSession->update($session);
                        $sessionsStored[] = $eventSession->id;
                    }
                }
                //Delete old moderator Records
                $eventSession->speakers()->delete();
                if (isset($session['speakers']) && is_array($session['speakers'])) {
                    foreach ($session['speakers'] as $speaker) {
                        $eventSession->speakers()->create([
                            "speaker_id" => $speaker,
                        ]);
                    }
                }
            }
            $sessions = EventSession::get("id");
            foreach ($sessions as $session) {
                if (!in_array($session->id, $sessionsStored)) {
                    $session->speakers()->delete();
                    $session->delete();
                }
            }
            return [
                "success" => true,
                "message" => "Sessions updated successfully!",
            ];
        }
        return [
            "success" => false,
            "error" => "Data formatted badly"
        ];
    }

    public function createPoll(Request $request, EventSession $session)
    {
        $user = Auth::user();
        if (
            $request->has("questions") &&
            is_array($request->get("questions")) &&
            count($request->get("questions")) >= 1
        ) {
            //Check if session is active - only then allow creation
            if (!isSessionActive($session)) {
                return [
                    "success" => false,
                    "message" => "Session is not active. You can create polls only on active session."
                ];
            }
            //Check if any other poll is running live before publishing another one.
            if (getSessionPoll($session, false)) {
                return [
                    "success" => false,
                    "message" => "Another poll is already running for this session. Please wait until the poll completes to create a new one."
                ];
            }
            $poll = Poll::create([
                "name" => (count($request->questions) == 1 ? "Motion" : "Ballot") . " - " . $session->name,
                "start_date" => Date::now(),
                "end_date" => Date::now()->add(SESSION_POLL_TIME, "minutes"),
                "status" => 1
            ]);
            foreach ($request->questions as $key => $question) {
                $q = $poll->questions()->create([
                    "sort_order" => $key,
                    "text" => $question["question"]
                ]);
                foreach ($question["options"] as $key => $option) {
                    $q->options()->create(["sort_order" => $key, "text" => $option]);
                }
            }
            SessionPoll::create([
                "poll_id" => $poll->id,
                "session_id" => $session->id,
                "timer" => $request->get("time", "2"),
                "status" => 1,
                "creator" => $user->id,
            ]);
            $poll->load("questions.options");
            return [
                "success" => TRUE,
                "poll" => $poll,
            ];
        }
        return [
            "success" => FALSE,
            "message" => "Invalid details provided"
        ];
    }

    public function managePolls(Request $request, EventSession $session)
    {
        return [
            getSessionPoll($session)
        ];
    }

    private function checkIfUserHasVotedForPoll($poll, $user)
    {
        $vote = Vote::where("poll_id", $poll)->where("user_id", $user)->first();
        return $vote ? $vote->isSubmitted() : false; //If vote exists and has been submitted then user has already voted
    }

    public function getPolls()
    {
        $timezone = env("APP_TIMEZONE", "GST");
        $session = getCurrentSession(EVENT_ROOM_AUDI);
        $toReturn = [
            "poll" => false,
        ];
        $user = Auth::user();
        if ($user->type !== USER_TYPE_DELEGATE) {
            $toReturn = [
                "onlineUsers" => User::where("online_status", ">", "0")->where("type", USER_TYPE_DELEGATE)->count(),
                "activeUsers" => User::where("online_status", "2")->where("type", USER_TYPE_DELEGATE)->where("current_page", "auditorium")->count(),
                "poll" => false
            ];
        } else {
            User::where("id", $user->id)->update([
                "online_status" => 2,
                "current_page" => "auditorium",
            ]);
        }

        if ($session) {
            $sessinoPoll = getSessionPoll($session, true);
            if ($sessinoPoll && $sessinoPoll->poll) {
                $activePoll = $sessinoPoll->poll;
                $toReturn['poll'] = [
                    "id" => $activePoll->id,
                    "timer" => $sessinoPoll->timer,
                    "isActive" => $sessinoPoll->status == 1,
                    "status" => $sessinoPoll->status,
                    "hasVoted" => $this->checkIfUserHasVotedForPoll($activePoll->id, Auth::user()->id),
                    "questions" => $activePoll->questions,
                    "startTime" => $activePoll->start_date->timezone($timezone),
                    "endTime" => $activePoll->end_date->timezone($timezone),
                ];
            }
        }
        return $toReturn;
    }

    public function submitPoll(Request $request)
    {
        $user = Auth::user();
        if ($user->type !== USER_TYPE_DELEGATE) {
            abort(403);
        }
        $pollId = $request->get("poll", false);
        if ($pollId) {
            $poll = Poll::with([
                "questions.options",
                "session_poll"
            ])->where("id", $pollId)->first();
            if ($poll->session_poll && $poll->session_poll->status == 1) {
                $vote = Vote::where("poll_id", $poll->id)->where("user_id", $user->id)->first(); //Fetch user vote
                if (!$vote) { //Create new instance if it does not exist
                    $vote = $user->votes()->create([
                        "poll_id" => $poll->id,
                    ]);
                }
                if ($vote && !$vote->isSubmitted()) {
                    $response = $request->get("response", false);
                    if (is_array($response) && count($response)) {
                        foreach ($response as $questionId => $optionId) {
                            $voteOption = VoteOption::where("vote_id", $vote->id)->where("question_id", $questionId)->first();
                            if ($voteOption) {
                                $voteOption->update([
                                    'option_id' => $optionId,
                                ]);
                            } else {
                                $vote->vote_options()->create([
                                    'question_id' => $questionId,
                                    'option_id' => $optionId,
                                ]);
                            }
                        }
                    } else {
                        return [
                            "error" => true,
                            'message' => "Please select a response before submitting your poll!"
                        ];
                    }
                    $vote->submit();
                    return [
                        "error" => false,
                        'message' => "Your vote has been registered. Thank you for voting!",
                        "vote" => $vote
                    ];
                }
                return [
                    "error" => true,
                    'message' => "You have already voted for the poll"
                ];
            }
        }
        return [
            "error" => true,
            "message" => "Poll has ended, You cannot submit your vote now."
        ];
    }
    public function getPollResultsView(Request $request, Poll $poll)
    {
        $poll->load("questions.options")->loadCount("votes");
        return view("sessionManager.pollResultView")
            ->with([
                'poll' => $poll
            ]);
    }

    public function getPollResults(Request $request)
    {
        $user = Auth::user();
        $poll = $request->get("poll", false);
        if (!$poll) {
            return [
                "success" => false,
                "message" => "Poll not found",
            ];
        }
        $poll = Poll::where("id", $poll)
            ->with([
                "questions.options"
            ])
            ->withCount([
                "votes",
            ])
            ->first();
        if (!$poll) {
            return [
                "success" => false,
                "message" => "Poll not found"
            ];
        }
        //Found poll and it is valid
        $result = [
            "votesCount" => $poll->votes_count,
            "results" => [],
            "delegatesCount" => User::where("type", USER_TYPE_DELEGATE)->count(),
        ];
        foreach ($poll->questions as $question) {
            foreach ($question->options as $option) {
                $result["results"][$option->id] = $option->loadCount("vote_options")->vote_options_count;
                //                $result['votesCount'] += $result["results"][$option->id];
            }
        }
        if ($user->type == "admin" || $user->type == "moderator") {
            $result['votersList'] = User::where("type", USER_TYPE_DELEGATE)->get([
                "name",
                "last_name",
                "region_name",
                "online_status",
                "current_page",
            ]);
        }

        $result['nonVotersList'] = $user->type === "admin" ? getPollNonVoters($poll->id, USER_TYPE_DELEGATE) : [];

        return [
            "result" => $result,
            "success" => true,
            "status" => $poll->status,
        ];
    }
    public function stopPoll(Request $request)
    {
        $poll = $request->get("poll", false);
        if (!$poll) {
            return [
                "success" => false,
                "message" => "Poll not found",
            ];
        }
        $poll = Poll::where("id", $poll)
            ->with([
                "session_poll",
            ])
            ->first();
        if (!$poll) {
            return [
                "success" => false,
                "message" => "Poll not found"
            ];
        }
        $poll->update([
            "status" => 2
        ]);
        if ($poll->session_poll) {
            $poll->session_poll->update([
                "status" => 2,
            ]);
        }
        return [
            "success" => true,
            "status" => $poll->status,
        ];
    }
    public function adminSessionPollArchive()
    {
        $sessions = EventSession::withCount("polls")->get();
        return view("sessionManager.adminSessionList")->with(compact("sessions"));
    }

    public function tellerSessionPollArchive()
    {
        $polls = getTellerPolls();
        return view("sessionManager.archiveTeller")->with(compact("polls"));
    }

    public function moderatorSessionPollArchive(EventSession $session)
    {
        $sessionPolls = SessionPoll::where("session_id", $session->id)->get("poll_id");
        $pollIds = [];
        foreach ($sessionPolls as $poll) {
            $pollIds[] = $poll->poll_id;
        }
        $polls = Poll::with("questions")->whereIn("id", $pollIds)->orderBy("created_at", "desc")->get();
        return view("sessionManager.archive")->with(compact("polls"));
    }

    public function pastSessionVideosArchive()
    {
        $videos = ArchiveVideos::all();
        return view("sessionManager.videosArchive")->with(compact("videos"));
    }

    public function savePastSessionVideosArchive(Request $request)
    {
        $titles = $request->title;
        $videoIds = $request->video_id;
        if (
            is_array($titles) &&
            is_array($videoIds) &&
            count($videoIds) === count($titles)
        ) {
            ArchiveVideos::whereNotNull("id")->delete();
            foreach ($titles as $index => $title) {
                ArchiveVideos::create([
                    "title" => $title,
                    "video_id" => $videoIds[$index],
                ]);
            }
        }
        $videos = ArchiveVideos::all();
        return view("sessionManager.videosArchive")->with(compact("videos"));
    }

    public function schedule()
    {
        $schedule = getSchedule();
        return view("event.schedule")->with(compact("schedule"));
    }

    public function subscribe(EventSession $event)
    {
        $event->subscribe();
        return ['success' => true];
    }

    public function unsubscribe(EventSession $event)
    {
        $event->unsubscribe();
        return ['success' => true];
    }
}

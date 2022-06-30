<?php

namespace App\Http\Controllers\Eventee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\EventQuestion;
use App\Poll;
use App\EventAnswer;
use App\UserAnswer;
use Illuminate\Support\Facades\Log;
use DB;
use App\Page;
use App\Event;
use App\UserSubtype;

use App\sessionRooms;
use App\Events\PollEvent;
use App\Events\pollResult;
use Illuminate\Support\Facades\Auth;




class PollController extends Controller
{
    public function index($id)
    {
       $polls = Poll::where("event_id",$id)->get();
    //    dd($polls);
        return view("eventee.polls.list")->with(compact("polls","id"));
    }
    public function create($id)
    {
        $pages = Page::where("event_id",$id)->get();
        $session_rooms = sessionRooms::where("event_id",$id)->get();
        return view("eventee.polls.create")->with(compact("id","pages","session_rooms"));
        
    }
    public function store(Request $request,$id) 
    {
        // dd($request->all());
        // Create Poll 
        $poll = new Poll;
        $poll->name=$request->name;
        $poll->location_type = $request->location;
        $poll->event_id = $id;
        switch($request->location){
            case "page":
                $poll->location = $request->pages;
                break;
            case "sessionroom":
                $poll->location = $request->rooms;
                break;
            default :
                $poll->location = null;
        }
        $poll->status = 0;
        $poll->save();
        // Create Questions 
        foreach ($request->question as $ids => $question) {
            if($question!==null && (count($request->ans[$ids])>=2) ){
                $question = $poll->questions()->create([
                    "question"=>$request->question[$ids],
                    "pos"=>$ids
                ]);
                // dd($question);
                // Create Options For Each Question 
                foreach ($request->ans[$ids] as $n => $ans) {
                    if(isset($request->ans[$ids][$n])){
                        $question->options()->create([
                            "answer"=>$request->ans[$ids][$n],
                            "pos"=>$n
                        ]);
                    }
                }
            }
        }
        return redirect(route("polls.manage",$id));

    }
    public function poll(Request $request,$id,Poll $poll)
    {
        
        $poll->load(['questions' => function ($q){

            $q->orderBy('pos');

        }]);
        // dd($poll);
        return view("eventee.polls.poll")->with(compact("poll","id"));
    }
    public function userAnalytics(Request $request,$id,Poll $poll)
    {
        
        $poll->load(['questions' => function ($q){

            $q->orderBy('pos');

        }]);
        // dd($poll);
        return view("eventee.polls.userAnalytics")->with(compact("poll","id"));
    }
    public function analytics(Request $request,$id,Poll $poll)
    {
        
        $poll->load(['questions' => function ($q){
            $q->orderBy('pos');
        }]);
        return view("eventee.polls.analytics")->with(compact("poll","id"));
    }
    public function publishPoll(Request $request,$id,Poll $poll)
    {
        $subtypes = UserSubtype::where('event_id',$id)->get();

        return view("eventee.polls.publish")->with(compact("poll","id","subtypes"));
    }
    public function publishPollResults(Request $request,$id,Poll $poll)
    {
        $subtypes = UserSubtype::where('event_id',$id)->get();

        return view("eventee.polls.publishResult")->with(compact("poll","id","subtypes"));
    }
    public function unpublishPoll(Request $request,$id,Poll $poll)
    {
        $poll->status =0;
        $poll->save();
        return redirect(route("polls.manage",["id"=>$id]));


    }
    public function publish(Request $request,$id,Poll $poll)
    {
        $types = $request->type;
        $subtypes = $request->subtype;
        // dd($types);
        if(isset($subtypes)){

            $poll->for = implode(",",$types).implode(",",$subtypes);
        }else{

            $poll->for = implode(",",$types);
        }
        $poll->status = 1;
        $poll->save();
        $slug = Event::find($id)->slug;
        event(new PollEvent($poll->id,$slug,$poll->location,$poll->location_type,$poll->for));
        $poll->load(['questions' => function ($q){
            $q->orderBy('pos');
        }]);
        flash("Poll Published Successfully");
        return redirect(route("eventee.polls.analytics",["poll"=>$poll,"id"=>$id]));
        // return view("eventee.polls.analytics")->with(compact("poll","id"));
    }
    public function publishResults(Request $request,$id,Poll $poll)
    {
        $types = $request->type;
        $subtypes = $request->subtype;
        // dd($types);
        if(isset($subtypes)){

            $poll->for = implode(",",$types).implode(",",$subtypes);
        }else{

            $poll->for = implode(",",$types);
        }
        $poll->status = -1;
        $poll->save();
        $slug = Event::find($id)->slug;
        event(new pollResult($poll->id,$slug));
        $poll->load(['questions' => function ($q){
            $q->orderBy('pos');
        }]);
        flash("Poll Results Published Successfully");
        return redirect(route("eventee.polls.analytics",["poll"=>$poll,"id"=>$id]));
        // return view("eventee.polls.analytics")->with(compact("poll","id"));
    }
    public function getPollQuestionResults($poll,$questionId)
    {
        $question = EventQuestion::find($questionId);
        $options = EventAnswer::where("question_id",$questionId)->get();
        $totalVotes = $options->sum("voteCount");
        // dd($totalVotes);
        $answerResults = [];

        foreach ($options as $n => $option) {
            $percent = ($option->voteCount/$totalVotes) * 100;
            $option->percent = $percent;
            $option->save();
            $answerResults["$option->id"] = ["percent"=>$percent,"voteCount"=>$option->voteCount];
        }
        // dd($answerResults);
        return $answerResults;
        // dd($question->load("options"));
        
    }
    public function vote(Request $request,$id,Poll $poll)
    {
        // dd($request->all());

        $user = Auth::user();
        $question =  EventQuestion::find($request->question);
        $answer= EventAnswer::find($request->option);
        $existingVote = UserAnswer::where("user_id",$user->id)->where("question_id",$request->question)->first();
        if($existingVote){
            $results = $this->getPollQuestionResults($poll,$request->question);
            return json_encode([
                "success"=>false,
                "message"=>"Already Voted",
                "results"=>$results,
                "yourVote"=>$existingVote->answer_id
            ]);
        } 
        $question->userAnswer()->create([
            "user_id"=>$user->id,
            "answer_id"=>$request->option
        ]);
        
        $answer->voteCount = $answer->voteCount + 1;
        $answer->save();
        $results = $this->getPollQuestionResults($poll,$request->question);
        return json_encode([
            "success"=>true,
            "message"=>"Voted SuccessFully",
            "results"=>$results,
            "yourVote"=>$request->option
        ]);
        // return view("eventee.polls.poll")->with(compact("poll","id"));
    }
    public function edit(Request $request,$id,$poll)
    {
        dd("hello");
        // $pages = Page::where("event_id",$id)->get();
        // $session_rooms = sessionRooms::where("event_id",$id)->get();
        // return view("eventee.polls.create")->with(compact("id","pages","session_rooms"));
        
    }
    public function destroy(Request $request)
    {
        $poll = Poll::find($request->id);
        if($poll){
            $poll->delete();
            
        }
        return true;
        // dd($request->all());
        
    }
}

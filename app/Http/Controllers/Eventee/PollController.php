<?php

namespace App\Http\Controllers\Eventee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Question;
use App\Poll;
use App\Answer;
use Illuminate\Support\Facades\Log;
use DB;


class PollController extends Controller
{
    //
    public function index($id){
        $poll  = Poll::where('id', '039f3918-e5b1-4189-82b1-3d3aa737ff7f')->first();
        $questions = Question::where('event_id', decrypt($id))->orderBy('status', 'DESC')->paginate(8);
        $answers = [];
        return view('eventee.poll.question', compact('poll', 'questions','id'));
        // return $questions;

    }

    public function createMcq(Poll $poll,Request $request)
    {
        try {
            $data = (request()->all());
            $alphabety = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K');
            // dd($data);
            $question = new Question;
            $question->poll_id = request()->poll_id;
            $question->type = request()->type;
            $question->event_id = request()->event_id;
            $question->question = request()->question;
            
            // return "error";
            $answer = $data['answers'];
            $correct = request()->correct;
            if ($question->save()) {
                for ($i = 0; $i < count($answer); $i++) {


                    if ($i == $correct) {
                        $answers = new Answer;
                        $answers->question_id = $question->id;
                        $answers->answer = $answer[$i];
                        $answers->correct = 1;
                        $answers->alpha = $alphabety[$i];
                        $answers->save();
                    } else {
                        $answers = new Answer;
                        $answers->question_id = $question->id;
                        $answers->answer = $answer[$i];
                        $answers->alpha = $alphabety[$i];
                        $answers->save();
                    }
                }
            }
            flash('Poll Added Successfully')->success();
            return redirect()->back();
        } catch (\Exception $e) {
            Log::info($e->getMessage());
        }
    }
    public function wordCloud(Request $request,$id)
    {
        try {
            $poll_id = $request->poll_id;
            $questions = $request->question;
            
            $type = $request->type;
            $question = new Question;
            $question->poll_id = $poll_id;
            
            $question->question = $questions;
            $question->type = $type;
            $question->event_id = $request->wc_event_id;
            if ($question->save()) {
                \DB::UPDATE("UPDATE questions SET event_id = ? Where id = ?",[decrypt($id),$question->id]);
                flash('Poll Added Successfully')->success();
                return redirect()->back();
            } else {
                flash('Oops!Something Went Wrong')->error();
                return redirect()->back();
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }

    public function rating(Request $request,$id)
    {
        try {
            $poll_id = $request->poll_id;
            $questions = $request->question;
            $type = $request->type;
            $rating = 4;

            $question = new Question;
            $question->poll_id = $poll_id;
            $question->type = $type;
            // $question->event_id = decrypt($id);
            $question->question = $questions;
            $question->rate = $rating;
            $question->event_id = $request->rate_event_id;
            if ($question->save()) {
                \DB::UPDATE("UPDATE questions SET event_id = ? Where id = ?",[decrypt($id),$question->id]);
                flash('Poll Added Successfully')->success();
                return redirect()->back();
            }
            else{
                flash('Oops!Something Went Wrong')->error();
                return redirect()->back();
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }

    public function Survey(Request $request,$id)
    {
        try {
            
            $type = $request->type;
            $poll_id = $request->poll_id;
            $questions = $request->question;
            $answer = $request->answers;

            $question = new Question;
            $question->poll_id = request()->poll_id;
            $question->type = request()->type;
            $question->question = request()->question;
            $question->event_id = request()->surv_event_id;
            // return "error";
            if ($question->save()) {
                \DB::UPDATE("UPDATE questions SET event_id = ? Where id = ?",[decrypt($id),$question->id]);
                for ($i = 0; $i < count($answer); $i++) {
                    $answers = new Answer;
                    $answers->question_id = $question->id;
                    $answers->answer = $answer[$i];
                    $answers->save();
                }
            }
            flash('Poll Added Successfully')->success();
            return redirect()->back();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            flash('Oops!Something Went Wrong')->error();
            return redirect()->back();
        }
    }
}

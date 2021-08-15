<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LiveAnswer;
use App\LiveQuestion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\User;

class AdminQnaController extends Controller
{
    //
    public function Index(){
        $questions = LiveQuestion::orderBy('id','desc')->paginate(8);
        return view('admin_qna.qna',compact('questions'));
    }

    public function View(Request $req){
        $question = LiveQuestion::findOrFail($req->id);
        $question->view = $req->view;
        if($question->save()){
            return response()->json(['message'=>'View Status Updated Successfully','status'=>200]);
        }
        else{
            return response()->json(['message'=>'Something Went Wrong','status'=>500]);
        }
    }

    public function Discussion(Request $req){
        $question = LiveQuestion::findOrFail($req->id);
        $question->discussion = $req->discussion;
        if($question->save()){
            return response()->json(['message'=>'Discussion Status Updated Successfully','status'=>200]);
        }
        else{
            return response()->json(['message'=>'Something Went Wrong','status'=>500]);
        }
    }

    public function Answer(Request $req){
        $answer = new LiveAnswer;
        $answer->question_id = $req->id;
        $answer->answer = $req->answer;
        $answer->answer_by = Auth::id();
        if($answer->save()){
            return response()->json(['message'=>'Answer Saved Successfully','status'=>200]);
        }
        else{
            return response()->json(['message'=>'Something Went Wrong','status'=>500]);
        }
    }

    public function GetAnswer(Request $req){
        $answers = LiveAnswer::where('question_id', $req->id)->orderBy('best_answer','desc')->get();
        $answer = [];
        if (count($answers) > 0) {
            foreach ($answers as $answerq) {
                $ans = new \stdClass();
                $ans->id = $answerq->id;
                $ans->answer = $answerq->answer;
                $ans->user = User::findOrFail(LiveQuestion::findOrFail($req->id)->user_id)->name;
                $ans->author = User::findOrFail($answerq->answer_by)->name;
                $ans->question = LiveQuestion::findOrFail($req->id)->question;
                $ans->best = $answerq->best_answer;
                array_push($answer, $ans);
            }
        } else {
            $ans = new \stdClass();
            $ans->answer = null;
            $ans->id = null;
            $ans->user = User::findOrFail(LiveQuestion::findOrFail($req->id)->user_id)->name;
            $ans->author = 'None';
            $ans->question = LiveQuestion::findOrFail($req->id)->question;
            $ans->best = 0;
            array_push($answer, $ans);
        }
        return response()->json($answer);
    }

    public function BestAnswer(Request $req){
        \DB::update('update live_answers set best_answer = 0 where id != ?', [$req->id]);
        $answer = LiveAnswer::findOrFail($req->id);
        $answer->best_answer = 1;
        if($answer->save()){
            return response()->json(['message'=>'Answer Is Set As Best Answer','status'=>200]);
        }else{
            return response()->json(['message'=>'Something Went Wrong','status'=>500]);
        }

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LiveQuestion;
use App\LiveAnswer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use stdClass;
use App\User;

class LiveQuestionController extends Controller
{
    //
    public function ShowAnswer(Request $req)
    {
        $answers = LiveAnswer::where('question_id', $req->id)->orderBy('best_answer','desc')->get();
        $answer = [];
        if (count($answers) > 0) {
            foreach ($answers as $answerq) {
                $ans = new \stdClass();
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
            $ans->user = User::findOrFail(LiveQuestion::findOrFail($req->id)->user_id)->name;
            $ans->author = 'None';
            $ans->question = LiveQuestion::findOrFail($req->id)->question;
            $ans->best = 0;
            array_push($answer, $ans);
        }
        return response()->json($answer);
    }

    public function Save(Request $req)
    {
        $question = new LiveQuestion;
        $question->user_id = Auth::id();
        $question->view = 0;
        $question->event_id = decrypt($req->event_id);
        $question->question = $req->question;
        if ($question->save()) {
            return response()->json(['message' => 'Your Question Has Been Submitted Successfully', 'status' => 200]);
        } else {
            return response()->json(['message' => 'Something Went Wrong', 'status' => 500]);
        }
    }

    public function Edit(Request $req)
    {
        $question = LiveQuestion::findOrFail($req->id);
        return response()->json($question);
    }

    public function Update(Request $req)
    {
        $question = LiveQuestion::findOrFail($req->id);
        $question->question = $req->question;
        if ($question->save()) {
            return response()->json(['message' => 'Your Question Has Been Updated Successfully', 'status' => 200]);
        } else {
            return response()->json(['message' => 'Something Went Wrong', 'status' => 500]);
        }
    }

    public function Delete(Request $req)
    {
        $question = LiveQuestion::findOrFail($req->id);
        $answer = LiveAnswer::where('question_id',$req->id)->count();
        if($answer > 0){
            return response()->json(['message' => 'This Question is already been answer,hence can not be deleted', 'status' => 404]);
        }
        elseif ($question->delete()) {
            return response()->json(['message' => 'Your Question Has Been Deleted Successfully', 'status' => 200]);
        } else {
            return response()->json(['message' => 'Something Went Wrong', 'status' => 500]);
        }
    }

    public function SaveAnswer(Request $req)
    {
        $answer = new LiveAnswer;
        $answer->question_id = $req->id;
        $answer->answer = $req->answer;
        $answer->answer_by = Auth::id();
        if ($answer->save()) {
            return response()->json(['message' => 'Your Question Has Been Deleted Successfully', 'status' => 200]);
        } else {
            return response()->json(['message' => 'Something Went Wrong', 'status' => 500]);
        }
    }
}

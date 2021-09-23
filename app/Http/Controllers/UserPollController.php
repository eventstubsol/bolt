<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Poll;
use App\Answer;
use App\Question;
use App\UserAnswer;

class UserPollController extends Controller
{
    //
    public function index(Request $req,$id)
    {
        $question = Question::where('event_id', decrypt($id))->where('status', 1)->get();
        return response()->json($question);
    }

    public function update(Request $req)
    {
        $question = Question::findOrFail($req->id);
        $answer = Answer::where('question_id', $req->id)->get();
        return response()->json(['question' => $question, 'answer' => $answer]);
    }

    public function Save(Request $req)
    {
        try {
            $id = $req->id;
            $rate = $req->rate;
            $count = UserAnswer::where('question_id', $id)->where('user_id', Auth::id())->count();
            if ($count < 1) {
                $answer = new UserAnswer;
                $answer->question_id = $id;
                $answer->answer = $rate;
                $answer->user_id = Auth::id();

                if ($answer->save()) {
                    $avgrate = UserAnswer::where('question_id', $id)->avg('answer');
                    return response()->json(['message' => "Saved Successfully", 'rate' => $avgrate]);
                }
            } else if ($count > 0) {
                $avgrate = UserAnswer::where('question_id', $id)->avg('answer');
                UserAnswer::where('question_id', $id)->where('user_id', Auth::id())->update(['answer' => $rate]);
                $avgrate = UserAnswer::where('question_id', $id)->avg('answer');
                return response()->json(['message' => "Saved Successfully", 'rate' => $avgrate]);
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }

    public function Answer(Request $req)
    {
        $question = $req->questionId;
        $answerId = $req->answerId;
        $count = UserAnswer::where('question_id', $question)->where('user_id', Auth::id())->count();
        if ($count < 1) {
            $answer = new UserAnswer;
            $answer->question_id = $question;
            $answer->answer_id = $answerId;
            $answer->user_id = Auth::id();
            try {
                if ($answer->save()) {
                    $anse = Answer::where('question_id', $question)->get();
                    $fin = [];
                    foreach ($anse as $ans) {
                        $temp = new \StdClass();
                        $temp->correct = $ans->correct;
                        $temp->alpha = $ans->alpha;
                        $total = UserAnswer::wherE('question_id', $question)->count();
                        $half = UserAnswer::wherE('question_id', $question)->where('answer_id', $ans->id)->count();
                        $main = number_format(($half / $total) * 100, 2);
                        $temp->per = $main;
                        array_push($fin, $temp);
                    }
                    return response()->json($fin);
                }
            } catch (\Exception $e) {
                Log::error($e->getMessage());
            }
        } elseif ($count > 0) {
            UserAnswer::where('question_id', $question)->where('user_id', Auth::id())->update(['answer_id' => $answerId]);
            $anse = Answer::where('question_id', $question)->get();
            $fin = [];
            foreach ($anse as $ans) {
                $temp = new \StdClass();
                $temp->correct = $ans->correct;
                $temp->alpha = $ans->alpha;
                $total = UserAnswer::wherE('question_id', $question)->count();
                $half = UserAnswer::wherE('question_id', $question)->where('answer_id', $ans->id)->count();
                $main = number_format(($half / $total) * 100, 2);
                $temp->per = $main;
                array_push($fin, $temp);
            }
            return response()->json($fin);
        }
    }

    public function WcSubmit(Request $req)
    {
        try {
            $questionId = $req->questionId;
            $answerD = $req->answer;
            $count = UserAnswer::where('question_id', $questionId)->where('answer', $answerD)->count();
            if ($count < 1) {
                $answer = new UserAnswer;
                $answer->question_id = $questionId;
                $answer->answer = $answerD;
                $answer->user_id = Auth::id();
                if ($answer->save()) {
                    $data = UserAnswer::where('question_id', $req->questionId)->get();
                    $fiArr = [];
                    foreach ($data as $useData) {
                        $ty = new \stdClass();
                        $ty->answer = $useData->answer;
                        $ty->same = $useData->sameCount;

                        array_push($fiArr, $ty);
                    }
                    return response()->json($fiArr);
                }
            } else {
                $same = UserAnswer::where('question_id', $questionId)->where('answer', $answerD)->first();
                UserAnswer::where('question_id', $questionId)->where('answer', $answerD)->update(['sameCount' => ((int)$same->sameCount + 1)]);
                $data = UserAnswer::where('question_id', $req->questionId)->get();
                $fiArr = [];
                foreach ($data as $useData) {
                    $ty = new \stdClass();
                    $ty->answer = $useData->answer;
                    $ty->same = $useData->sameCount;

                    array_push($fiArr, $ty);
                }
                return response()->json($fiArr);
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }
}

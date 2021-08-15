<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Poll;
use App\Answer;
use App\UserAnswer;
use App\User;
use Illuminate\Support\Facades\Log;

class QuestionController extends Controller
{
    //
    public function Edit()
    {
        // return request()->id;
        $question = Question::findOrFail(request()->id);
        $answers = $question->answer;

        return response()->json(['question' => $question, 'answer' => $answers]);
    }

    public function createMcq(Poll $poll)
    {
        try {
            $data = (request()->all());
            $alphabety = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K');
            // dd($data);
            $question = new Question;
            $question->poll_id = request()->poll_id;
            $question->type = request()->type;
            $question->question = request()->question;
            
            $question->event_id = request()->mcq_event_id;
            
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
            // flash('MCQ Question Added')->success();
            return redirect()->back();
        } catch (\Exception $e) {
            Log::info($e->getMessage());
        }
    }


    public function wordCloud(Request $request)
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
                return redirect()->back();
            } else {
                return "Something Went Wrong";
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }

    public function rating(Request $request)
    {
        try {
            $poll_id = $request->poll_id;
            $questions = $request->question;
            $type = $request->type;
            $rating = 4;

            $question = new Question;
            $question->poll_id = $poll_id;
            $question->type = $type;
            $question->question = $questions;
            $question->rate = $rating;
            $question->event_id = $request->rate_event_id;
            if ($question->save()) {
                return redirect()->back();
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }

    public function Survey(Request $request)
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
                for ($i = 0; $i < count($answer); $i++) {
                    $answers = new Answer;
                    $answers->question_id = $question->id;
                    $answers->answer = $answer[$i];
                    $answers->save();
                }
            }
            return redirect()->back();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }

    public function Delete(Request $request)
    {
        try {
            $id = $request->id;
            $question = Question::findOrFail($id);
            if ($question->type == 'mcq' || $question->type == 'quiz' || $question->type == 'surv') {
                $answer = Answer::where('question_id', $question->id);
                if ($answer->delete()) {
                    if ($question->delete()) {
                        return redirect()->back();
                    }
                }
            } else {
                if ($question->delete()) {
                    return redirect()->back();
                }
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }

    public function MCQEdit(Request $request)
    {
        try {
            $data = (request()->all());
            // dd($data);
            $question =  Question::findOrFail($request->id);


            $question->question = request()->question;
            // return "error";
            $answer = $request->answers;
            $correct = request()->correct;
            if ($question->save()) {
                for ($i = 0; $i < count($answer); $i++) {


                    if ($i == $correct) {
                        $answers = Answer::findOrFail($request->answerid[$i]);

                        $answers->question_id = $question->id;
                        $answers->answer = $answer[$i];
                        $answers->correct = 1;
                        $answers->save();
                    } else {
                        $answers = Answer::findOrFail($request->answerid[$i]);

                        $answers->question_id = $question->id;
                        $answers->answer = $answer[$i];
                        $answers->correct = 0;
                        $answers->save();
                    }
                }
            }
            return redirect()->back();
        } catch (\Exception $e) {
            Log::info($e->getMessage());
        }
    }

    public function SURVEdit(Request $request)
    {
        try {

            $questions = $request->question;
            $answer = $request->answers;

            $question =  Question::findOrFail($request->id);
            $question->question = request()->question;
            // return "error";
            if ($question->save()) {
                for ($i = 0; $i < count($answer); $i++) {
                    $answers = Answer::findOrfail($request->answerid[$i]);
                    $answers->question_id = $question->id;
                    $answers->answer = $answer[$i];
                    $answers->save();
                }
            }
            return redirect()->back();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }
    public function WCEdit(Request $req)
    {
        try {

            $questions = $req->question;

            $question =  Question::findOrFail($req->id);

            $question->question = $questions;

            if ($question->save()) {
                return redirect()->back();
            } else {
                return "Something Went Wrong";
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }

    public function Status(Request $request)
    {
        try {
            Question::where('id', '!=', $request->id)->update(['status' => 0]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }

        $id = $request->id;

        $status = $request->status;
        $question = Question::findOrFail($id);
        $question->status = $status;
        if ($question->save()) {
            return response()->json(['message' => 'Status Has Been Updated']);
        } else {
            return response()->json(['message' => 'Something Went Wrong']);
        }
    }

    public function UserData(Request $req)
    {
        $answers = Answer::where('question_id', $req->id)->get();
        $fin = [];
        foreach ($answers as $ans) {
            $temp = new \StdClass();
            $temp->alpha = $ans->alpha;
            $temp->correct = $ans->correct;
            $total = UserAnswer::wherE('question_id', $req->id)->count();
            $half = UserAnswer::wherE('question_id', $req->id)->where('answer_id', $ans->id)->count();
            $main = ($half / $total) * 100;
            $temp->per = $main;
            array_push($fin, $temp);
        }

        return response()->json($fin);
    }

    public function UserRateData(Request $req)
    {
        $data = UserAnswer::where('question_id', $req->id)->get();
        $fiArr = [];
        foreach ($data as $useData) {
            $ty = new \stdClass();
            $ty->rate = $useData->answer;

            $users = User::where('id', $useData->user_id)->get();
            foreach ($users as $user) {
                $ty->name = $user->name;
            }
            array_push($fiArr, $ty);
        }

        return response()->json($fiArr);
    }

    public function UserWcData(Request $req)
    {
        $data = UserAnswer::where('question_id', $req->id)->get();
        $fiArr = [];
        foreach ($data as $useData) {
            $ty = new \stdClass();
            $ty->answer = $useData->answer;
            $ty->same = $useData->sameCount;

            array_push($fiArr, $ty);
        }
        return response()->json($fiArr);
    }

    public function ShowMCq($id)
    {
        $question = Question::findOrFail($id);
        $answers = Answer::where('question_id', $id)->get();
        $fin = [];
        foreach ($answers as $ans) {
            $temp = new \StdClass();
            $temp->alpha = $ans->alpha;
            $total = UserAnswer::wherE('question_id', $question->id)->count();
            $half = UserAnswer::wherE('question_id', $question->id)->where('answer_id', $ans->id)->count();
            $main = ($half / $total) * 100;
            $temp->per = $main;
            array_push($fin, $temp);
        }
        return view('extras.mcq', compact('question', 'fin'));
    }
}

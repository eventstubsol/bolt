<?php

namespace App\Http\Controllers\Eventee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Question;
use App\Poll;


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
}

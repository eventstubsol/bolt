<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
class AdminEventController extends Controller
{
    //
    public function eventList(){
        $events = Event::orderBy('created_at','desc')->get();
       
        return view('admin_events.index',compact('events'));
    }
}

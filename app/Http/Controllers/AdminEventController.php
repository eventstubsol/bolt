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

    public function  edit($id){
        $event = Event::findOrfail($id);
        return view('admin_events.edit',compact('id','event'));
    }

    public function update($id,Request $req){
        $event = Event::findOrfail($id);
        if($req->total_attendees < 10){
            flash("Attendess cannot be less than 10")->error();
            return redirect()->back();
        }
        $event->total_attendees = (int)$req->total_attendees;
        if($event->save()){
            flash("Event Changes made successfully")->success();
            return redirect()->route('admin.event.list');
        }
        else{
            flash("Something Went Wrong")->error();
            return redirect()->back();
        }
    }
}

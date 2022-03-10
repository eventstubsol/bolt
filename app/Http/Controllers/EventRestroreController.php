<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

class EventRestroreController extends Controller
{
    //
    public function index(){
        $events = Event::onlyTrashed()->get();
        return view("event_restore.index",compact('events'));
    }

    public function Restore($id){
        $event = Event::where('id',$id)->restore();
        if($event){
            flash("Event Restored Successfully")->success();
            return redirect()->back();
        }
        else{
            flash("Something Went Wrong")->error();
            return redirect()->back();
        }
    }
}

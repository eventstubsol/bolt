<?php

namespace App\Http\Controllers\Eventee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ScheduleNotification;
use App\Http\Requests\ScheduleFormRequest;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
{
    //
    public function index($id){
        $notifications = ScheduleNotification::where('event_id',$id)->orderBy(DB::raw("date(created_at"),'desc')->get();
        return view('eventee.schedule.index',compact('id','notifications'));
    }

    public function create($id){
        return view('eventee.schedule.create',compact('id'));
    }

    public function store(ScheduleFormRequest $request,$id){
        $title = $request->post("title");
        $message = $request->post("message");
        $url = $request->post("url", NULL);
        $role = $request->post("roles");
        $sending_date = $request->sending_date;
        $sending_time = $request->sending_at;
        $schedule = new ScheduleNotification;
        $schedule->title = $title;
        $schedule->message = $message;
        $schedule->event_id = $id;
        $schedule->url = $url;
        $schedule->role = $role;
        $schedule->sending_date = $sending_date;
        $schedule->sending_time = $sending_time;
        if($schedule->save()){
            flash("Notification Scheduled Successfully")->success();
            return redirect()->route('eventee.schedule',$id);
        }
        else{
            flash("Something Went Wrong")->error();
            return redirect()->route('eventee.schedule',$id);
        }

    }

}

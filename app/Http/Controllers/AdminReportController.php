<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Event;
use App\User;
use Carbon\Carbon;
class AdminReportController extends Controller
{
    //

    public function Dashboard(){
        $events = Event::count();
        $users = User::where('type','eventee')->count();
        $liveEvent = Event::where('end_date','>=',Carbon::now()->format('Y-m-d'))->count();
        $attendees = User::where('type','attendee')->where('online_status',1)->count();
        $recent = Event::whereBetween('start_date',[Carbon::now()->subDays(5)->format('Y-m-d'),Carbon::now()->format('Y-m-d')])->where('end_date','>=',Carbon::today())->orderBy('start_date','desc')->limit(5)->get();
        $last_activity = User::where('updated_at','<=',Carbon::now()->subDays(5)->format('Y-m-d H:i:s'))->where('type','eventee')->LIMIT(5)->get();
        $latest_users = User::whereBetween('created_at',[Carbon::now()->subDays(5)->format('Y-m-d H:i:s'),Carbon::now()->format('Y-m-d H:i:s')])->where('type','eventee')->limit(5)->get();
        $ending_event  =Event::whereBetween('end_date',[Carbon::now()->format('Y-m-d'),Carbon::now()->addDays(5)->format('Y-m-d')])->limit(5)->get();
        
        return view('dashboard.admin.dashboard',compact('events','users','liveEvent','attendees','recent','last_activity','latest_users','ending_event')); 
    }



    public function RecentEvent(){
        $recents = DB::table('events')
                ->join('users','events.user_id','=','users.id')
                ->whereBetween('events.start_date',[Carbon::now()->subDays(10)->format('Y-m-d'),Carbon::now()->format('Y-m-d')])
                ->where('events.end_date','>=',Carbon::today())
                ->select(DB::raw("events.name as event_name , users.name as first_name,users.last_name as last_name,users.email,users.phone,events.created_at"))
                ->orderBy('events.start_date','desc')
                ->get();
        return view('dashboard.admin.recent',compact('recents'));
    }

    public function LeastActiveUser(){
        $leastActive = User::where('updated_at','<=',Carbon::now()->subDays(5)->format('Y-m-d H:i:s'))->where('type','eventee')->get();
        return view('dashboard.admin.leastactive',compact('leastActive'));
    }

    public function RecentActiveUser(){
        $recentJoined = User::whereBetween('created_at',[Carbon::now()->subDays(5)->format('Y-m-d H:i:s'),Carbon::now()->format('Y-m-d H:i:s')])->where('type','eventee')->get();
        return view('dashboard.admin.recentUser',compact('recentJoined'));
    }

    public function EventEnding(){
        $ending_event  =  DB::table('events')
                        ->join('users','events.user_id','=','users.id')
                        ->whereBetween('end_date',[Carbon::now()->format('Y-m-d'),Carbon::now()->addDays(5)->format('Y-m-d')])
                        ->select(DB::raw("events.name as event_name , users.name as first_name,users.last_name as last_name,users.email,users.phone,events.end_date"))
                        ->get();
                    
        return view('dashboard.admin.eventEnd',compact('ending_event'));
    }

    public function EventLogs(){
        $logs = User::where('type','eventee')->paginate(5);
        return view('dashboard.admin.logs',compact('logs'));
    }
}

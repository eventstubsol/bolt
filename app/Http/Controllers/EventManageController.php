<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;
use App\Event;

class EventManageController extends Controller
{
    //
    public function Dashboard($id,Request $req){
        $req->session()->put('MangeEvent',1);
        return view("dashboard.reports.general",compact('id'));
    }
    public function leaderboardView($id){
        return view("eventee.Manage.lead",compact('id'));
    }
    public function leaderboard(Request $req)
    {
        return User::orderBy("points", "desc")
            ->where("points", ">", 0)
            ->where('event_id',$req->id)
            ->limit(env("LEADERBOARD_LIMIT", 50))
            ->get(["name", "points", "last_name"])
            ->map(function ($user) {
                return [
                    $user->name . " " . $user->last_name,
                    $user->points
                ];
            });
    }

    public function workshopReports($name,$id){
       
        
        $apiRoute = route("event.workshop.api", ['name' => $name]);
        $logsRoute = route("event.export.workshopLogs",['name' => $name]);
        $logName = $name;
        return view("dashboard.reports.auditorium")->with(compact([
            'apiRoute',
            'logsRoute',
            'logName',
            'id',
        ]));
    }

    public function exportWorkshopLogs($name){
        $eventName = $name."_visit";
        $loginIdList = \App\Points::where("points_for", $eventName)->orderBy("created_at", "DESC")->distinct("points_to")->with("User")->get();
        $ids = [];
        foreach ($loginIdList as $loginLog){
            if($loginLog->user){
                $ids[] = [
                    "Email" => $loginLog->user->email,
                    "Name" => $loginLog->user->name,
                    "Last Name" => $loginLog->user->last_name,
                    "Visited At" => $loginLog->created_at->format('j M Y H:i:s A'),
                ];
            }
        }
        return $ids;
    }

    public function workshopReportsData($name){
        $eventName = $name."_visit";
        $loginIdList = \App\Points::where("points_for", $eventName)->orderBy("created_at", "DESC")->where("created_at", ">=", Carbon::now()->startOf("day"))->distinct("points_to")->get(["points_to", "created_at"]);
        $ids = [];
        foreach ($loginIdList as $loginLog){
            $ids[] = $loginLog->points_to;
        }
        $lastLoginList = \App\User::whereIn("id",$ids)->limit(50)->get(["name", "email"]);
        return [
            'login_total' => \App\Points::where("points_for", $eventName)->distinct("points_to")->count(),
            'login_last_1h' => \App\Points::where("points_for", $eventName)->where("created_at", ">=", Carbon::now()->subtract("hour", 1))->distinct("points_to")->count(),
            'unique_login_count' => \App\Points::where("points_for", $eventName)->where("created_at", ">=", Carbon::now()->startOf("day"))->distinct("points_to")->count(),
            'last_login_list' => $lastLoginList,
        ];
    }

    public function edit($id){
        $event = Event::findOrFail(decrypt($id));
        return view('eventee.events.edit',compact('id','event'));
    }

    public function update($id,Request $req){
        $event = Event::findOrFail(decrypt($id));
        $event->name = $req->name;
        $event->start_date = $req->start_date;
        $event->end_date = $req->end_date;
        if($event->save()){
            flash("Event Updated Succesfully")->success();
            return redirect()->route('event.index',$id);
        }
        else{
            flash("Something Went Wrong")->error();
            return redirect()->route('event.index',$id);
        }
    }

    public function destroy(Request $req){
        $event = Event::findOrFail($req->id);
        
        $event->delete();
        return response()->json(['message'=>"Event Deleted Succesfully"]);
    }
}

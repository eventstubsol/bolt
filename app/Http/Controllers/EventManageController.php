<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;
use App\Event;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use App\UserLocation;
use stdClass;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LeaderboardExport;

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
        $loginIdList = \App\Points::where("points_for", $eventName)->orderBy("created_at", "DESC")->where("created_at", ">=", Carbon::now("UTC")->startOf("day"))->distinct("points_to")->get(["points_to", "created_at"]);
        $ids = [];
        foreach ($loginIdList as $loginLog){
            $ids[] = $loginLog->points_to;
        }
        $lastLoginList = \App\User::whereIn("id",$ids)->limit(50)->get(["name", "email"]);
        return [
            'login_total' => \App\Points::where("points_for", $eventName)->distinct("points_to")->count(),
            'login_last_1h' => \App\Points::where("points_for", $eventName)->where("created_at", ">=", Carbon::now("UTC")->subtract("hour", 1))->distinct("points_to")->count(),
            'unique_login_count' => \App\Points::where("points_for", $eventName)->where("created_at", ">=", Carbon::now("UTC")->startOf("day"))->distinct("points_to")->count(),
            'last_login_list' => $lastLoginList,
        ];
    }

    public function edit($event_id){
        $event = Event::findOrFail( ($event_id));
        try {
            $st = $event->start_date ? Carbon::parse($event->start_date)->format('Y-m-d\TH:i') : "";
            unset($event->start_date);
            $event->start_dates = $st;
            $et = $event->end_date ? Carbon::parse($event->end_date)->format('Y-m-d\TH:i') : "";
            unset($event->end_date);
            $event->end_dates = $et;
        } catch (\Exception $e) {
            //Do Nothing for now
        }
        return view('eventee.events.edit',compact('event_id','event'));
    }
    public function verifyDomain(){
        $currDomain = \Request::getHost();
        $event = Event::where('domain',$currDomain)->first();
        if($event->domainverified){
            return view("eventee.domain.verified");
        }
        if($event && !$event->domainverified){
            if(env("APP_ENV")!=='staging'){
                $event->domainverified = true;
                $event->save(); 
                addSSL($currDomain);
            }
            return view("eventee.domain.verified");
        }
        return ["success"=>false];
        // dd($event);
    }

    public function update($event_id,Request $req){
        $baseurl = URL::to('/');
        if(strpos($baseurl,'https')){
           $baseurl =  str_replace('https://','',$baseurl);
        }else{
          $baseurl=  str_replace('http://','',$baseurl);
        }
        $event = Event::findOrFail( ($event_id));
        $event->name = trim($req->name);
        $slug =str_replace(" ","-",strtolower($req->event_slug));
        // return  $slug.'.'.str_replace('https://','',$baseurl).'';
        // $event->slug = str_replace(" ","-",strtolower($req->event_slug));
        // $event->link = $slug.'.'.str_replace('https://','',$baseurl).'';
        $event->start_date = $req->start_date;
        $event->end_date = $req->end_date;
        $event->timezone = $req->timezone;
        if($req->domain && env('APP_ENV') != 'stagging'){
            $domain = $req->domain;
            if(strpos($domain,'https')){
                $domain =  str_replace('https://','',$domain);
             }else{
               $domain=  str_replace('http://','',$domain);
             }
            $event->domain = $domain;
            if(env("APP_ENV")!=='staging'){
                whitelistDomain($domain);
            }
        }
        if($event->save()){
            flash("Event Updated Succesfully")->success();
            if(isset($domain)){
                return redirect(route("verifyDomain",['domain'=>$domain]));
            }else{
                return redirect()->route('event.index',$event_id);
            }
        }
        else{
            flash("Something Went Wrong")->error();
            return redirect()->route('event.index',$event_id);
        }
    }

    public function destroy(Request $req){
        $event = Event::findOrFail($req->id);
        
       if($event->delete()){
        return response()->json(['code'=>200,'message'=>"Event Deleted Succesfully"]);
       }
       else{
        return response()->json(['code'=>500,'message'=>"Something Went Wrong"]);
       }
        
    }

    public function updateUsers($event_id){
        $users = User::where('event_id',$event_id)->get();
        foreach($users as $user){
            $user_location =  UserLocation::where("user_id",$user->id)->where("current_status",1)->first();
            if($user->online_status === 1 && $user->updated_at < Carbon::now("UTC")->subMinutes(1)->toDateTimeString()){
                $user->online_status = 0;
                $user_location->current_status = 0;
                $user_location->save();
                $user->save();
            }
        }
    }

    public function ChartJs(Request $req){

        $event = Event::findOrFail($req->id); 
        $this->updateUsers($event->id);
        $total = User::where('event_id',$event->id)->count();
        $isOnline = User::where('event_id',$event->id)->where('online_status' ,1)->count();
        $isOffline = User::where('event_id',$event->id)->where('online_status' ,0)->count();
        $userobj = new \stdClass();
        if($isOnline > 0){
            $userobj->online =$isOnline;
        }
        else{
            $userobj->online = 0;
        }
        if($isOffline > 0){
            $userobj->offline = $isOffline;
        }
        else{
            $userobj->offline = 0;
        }
        return response()->json(['userobj'=>$userobj,'total'=>$total]);
    }

    public function SessionChartJs(Request $req){
        $event = Event::findOrFail($req->id);
        
        $mainCount = UserLocation::where('event_id',$event->id)->where('type',"Sessionroom")->where('current_status',1)->count();
        if($mainCount > 0){
            $locations = DB::SELECT("SELECT DISTINCT(type_location),type,count(type_location) as user_count FROM `user_locations` where type = 'Sessionroom' and current_status = 1 and event_id='".$event->id."' group by type_location");
            $locArr = [];
            if(count($locations) > 0){
                foreach($locations as $location){
                    $locobj = new \stdClass();
                    $locobj->room_name = $location->type_location;
                    $locobj->room_count = $location->user_count;
                    array_push($locArr,$locobj);
                }
            }
            else{
                $locArr = null;
            }
            $location1 = UserLocation::where('event_id',$event->id)->where('type',"Sessionroom")->where('current_status',1)->first();
            $roomCount = UserLocation::where('type_location',$location1->type_location)->where('current_status',1)->count();
            $locationObj = new \stdClass();
            $locationObj->room_name = $location1->type_location;
            $locationObj->room_count = $roomCount;
            $location2 = DB::SELECT("SELECT DISTINCT(type_location) FROM user_locations where event_id = ? and type = ? and current_status = ? and type_location != ?",[$event->id,'Sessionroom',1,$location1->type_location]);
        // return $location2;
            $locationArr = [];
            $countData = count($location2);
            if(count($location2) > 0){
                foreach($location2 as $loaction){
                    $locObj =new \stdClass();
                    $counts = UserLocation::where('type_location',$loaction->type_location)->where('current_status',1)->count();
                    $locObj->room_name = $loaction->type_location;
                    $locObj->room_count = $counts;
                    array_push($locationArr,$locObj);
                }
            }
            
            return response()->json(['locationObj'=>$locationObj,'locationArr'=>$locationArr,'countData'=>$countData,'locations'=>$locArr]);
        }
        else{
            return response()->json(0);
        }
        
        
    }

    public function PageChartJs(Request $req){
        $event = Event::findOrFail($req->id);
        $mainCount = $location1 = UserLocation::where('event_id',$event->id)->where('type',"page")->where('current_status',1)->count();
        
        if($mainCount > 0){
            $locations = DB::SELECT("SELECT DISTINCT(type_location),type,count(type_location) as user_count FROM `user_locations` where type = 'page' and current_status = 1 and event_id='".$event->id."' group by type_location");
            $locArr = [];
            if(count($locations) > 0){
                foreach($locations as $location){
                    $locobj = new \stdClass();
                    $locobj->room_name = $location->type_location;
                    $locobj->room_count = $location->user_count;
                    array_push($locArr,$locobj);
                }
            }
            else{
                $locArr = null;
            }
            $location1 = UserLocation::where('event_id',$event->id)->where('type',"page")->where('current_status',1)->first();
            $roomCount = UserLocation::where('type_location',$location1->type_location)->where('current_status',1)->count();
            $locationObj = new \stdClass();
            $locationObj->room_name = $location1->type_location;
            $locationObj->room_count = $roomCount;
            $location2 = DB::SELECT("SELECT DISTINCT(type_location) FROM user_locations where event_id = ? and type = ? and current_status = ? and type_location != ?",[$event->id,'page',1,$location1->type_location]);
            $locationArr = [];
            $countData = empty($location2);
            if($countData == 0){
                foreach($location2 as $loaction){
                    $locObj =new \stdClass();
                    $counts = UserLocation::where('type_location',$loaction->type_location)->where('current_status',1)->count();
                    $locObj->room_name = $loaction->type_location;
                    $locObj->room_count = $counts;
                    array_push($locationArr,$locObj);
                }
            }
            return response()->json(['locationObj'=>$locationObj,'locationArr'=>$locationArr,'countData'=>$countData,'locations'=>$locArr]);
        }
        else{
            return response()->json(0);
        }
        // return empty($locationObj);    
        
        // return $location2;
        
        
        
    }

    public function BoothChartJs(Request $req){
        $event = Event::findOrFail($req->id);
        $mainCount = $location1 = UserLocation::where('event_id',$event->id)->where('type',"Booth")->where('current_status',1)->count();
    
        if($mainCount > 0){
            $locations = DB::SELECT("SELECT DISTINCT(type_location),type,count(type_location) as user_count FROM `user_locations` where type = 'Booth' and current_status = 1 and event_id='".$event->id."' group by type_location");
            $locArr = [];
            if(count($locations) > 0){
                foreach($locations as $location){
                    $locobj = new \stdClass();
                    $locobj->room_name = $location->type_location;
                    $locobj->room_count = $location->user_count;
                    array_push($locArr,$locobj);
                }
            }
            else{
                $locArr = null;
            }
            $location1 = UserLocation::where('event_id',$event->id)->where('type',"Booth")->where('current_status',1)->first();
            $roomCount = UserLocation::where('type_location',$location1->type_location)->where('current_status',1)->count();
            $locationObj = new \stdClass();
            $locationObj->room_name = $location1->type_location;
            $locationObj->room_count = $roomCount;
            $location2 = DB::SELECT("SELECT DISTINCT(type_location) FROM user_locations where event_id = ? and type = ? and current_status = ? and type_location != ?",[$event->id,'Booth',1,$location1->type_location]);
            // return $location2;
            $locationArr = [];
            $countData = count($location2);
            if(count($location2) > 0){
                foreach($location2 as $loaction){
                    $locObj =new \stdClass();
                    $counts = UserLocation::where('type_location',$loaction->type_location)->where('current_status',1)->count();
                    $locObj->room_name = $loaction->type_location;
                    $locObj->room_count = $counts;
                    array_push($locationArr,$locObj);
                }
            }
            
            return response()->json(['locationObj'=>$locationObj,'locationArr'=>$locationArr,'countData'=>$countData,'locations'=>$locArr]);
        }
        else{
            return response()->json(0);
        }
        
       
    }

    public function LobbyUser(Request $req){
        $event = Event::findOrFail($req->id);
        $locations = UserLocation::where('event_id',$event->id)->where('type',"Lobby")->where('current_status',1)->get();
        $finalArr = [];
        foreach($locations as $location){
            $locObj = new \stdClass();
            $locObj->name = User::findOrFail($location->user_id)->name;
            $locObj->time = Carbon::parse($location->created_at)->format('d-m-Y'). " At " .Carbon::parse($location->created_at)->format('H:i:s');
            array_push($finalArr,$locObj);
        }
        return response()->json($finalArr);
    }

    public function LoungeUser(Request $req){
        $event = Event::findOrFail($req->id);
        $locations = UserLocation::where('event_id',$event->id)->where('type',"Lounge")->where('current_status',1)->get();
        $finalArr = [];
        foreach($locations as $location){
            $locObj = new \stdClass();
            $locObj->name = User::findOrFail($location->user_id)->name;
            $locObj->time = Carbon::parse($location->created_at)->format('d-m-Y'). " At " .Carbon::parse($location->created_at)->format('H:i:s');
            array_push($finalArr,$locObj);
        }
        return response()->json($finalArr);
    }

    public function EventAvailable(Request $req){
        $event_name = $req->event_name;
        if(strlen($event_name)< 5){
            return response()->json(['code'=>203,'message'=>"Event Name Must Be Greater Than 3 Characters"]);
        }
        $event = Event::where('name',$event_name)->count();
        if($event > 0){
            return response()->json(['code'=>202,'message'=>"Event Already Exists"]);
        }
        else{
            return response()->json(['code'=>200,'message'=>"Event Name Is Available"]);
        }
    }

    
}

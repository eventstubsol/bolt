<?php

namespace App\Http\Controllers;

use App\ContentMaster;
use App\Content;
use Illuminate\Http\Request;
use App\User;
use App\EventSession;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;
use App\Event;
// use Illuminate\Support\Facades\Http;
// use Maatwebsite\Excel\Facades\Excel;
// use App\Menu;
use Browser;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class eventeeController extends Controller
{
    //
    public function Regiter(){
        $id = null;
        return view('eventee.register')->with(compact("id"));
    }

    public function ConfirmRegister(Request $request){
        
        if(empty($request->name)){
            flash("Name Field Cannot Be blank")->error();
            return redirect()->back();
        }
        elseif(empty($request->last_name)){
            flash("Last Name Field Cannot Be blank")->error();
            return redirect()->back();
        }
        elseif(empty($request->email)){
            flash("Email Address Field Cannot Be blank")->error();
            return redirect()->back();
        }
        elseif(empty($request->phone)){
            flash("Phone Number Field Cannot Be blank")->error();
            return redirect()->back();
        }
        elseif(empty($request->password)){
            flash("Password Field Cannot Be blank")->error();
            return redirect()->back();
        }
        elseif(empty($request->job_title)){
            flash("Job Title Field Cannot Be blank")->error();
            return redirect()->back();
        }
        
        $userEmail = User::where('email',$request->email)->where('event_id',null)->count();
        if($userEmail > 0){
            flash("User Already Exist")->error();
            return redirect()->back();
        }
        $user = new User;
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = password_hash($request->password,PASSWORD_DEFAULT);
        $user->job_title = $request->job_title;
        $user->type = 'eventee';
        $user->country = $request->country;
        if($user->save()){
            $request->Session()->put('eventee-register', 'Registration Successful');
            return redirect()->route('Eventee.login');
        }
        else{
            $request->Session()->put('eventee-register', 'Oops! Something Went Wrong');
            return redirect()->route('Eventee.login');
        }   
    }

    public function Login(){
        $id=null;
        // dd("test");
        return view('eventee.login')->with(compact("id"));
    }

    public function ConfirmLogin(Request $req){
        try{
            
            if(empty($req->password) && empty($req->email)){
                flash("Both Fields Are Required")->error();
                return redirect()->back();
            }
            elseif(empty($req->email)){
                flash("Please Fill Email Field")->error();
                return redirect()->back();
            }
            else if(empty($req->password)){
                flash("Please Fill Password Field")->error();
                return redirect()->back();
            }
            

            $user = User::where('email',$req->email)->where("type","eventee")->first();
            if($user){
                $user->online_status = 1;
                $user->ip_address =  $req->ip();
                if(Browser::isMobile()){
                $user->device = "mobile";
                }
                if(Browser::isDesktop()){
                    $user->device =  "Desktop";
                }
                $user->save();
                
                // dd($user);
                $pass = password_verify($req->password,$user->password);
                if($pass && $user->type == 'eventee'){
                    Auth::login($user);
                    return redirect(route('teacher.dashboard'));
                }
                else{
                    flash("Please Check Your Email And Password")->error();
                    return redirect()->route('Eventee.login');
                }
            }
            else{
                flash("Please Check Your Email And Password")->error();
                return redirect()->route('Eventee.login');
            }
            
            
        }
        catch(\Exception $e){
            Log::error($e->getMessage());
        }
    }

    public function Dashboard(Request $req){
        try{
            $req->session()->put('MangeEvent',0);
            $events = Event::where('user_id',Auth::id())->orderBy('id','desc')->limit(5)->count();
           
            $liveEvent = Event::where('end_date','>=',Carbon::now()->format('Y-m-d'))->where('user_id',Auth::id())->count();
            $recent = Event::where('user_id',Auth::id())->orderBy('start_date','desc')->limit(5)->get();
            // $latest_users = User::whereBetween('created_at',[Carbon::now()->subDays(5)->format('Y-m-d H:i:s'),Carbon::now()->format('Y-m-d H:i:s')])->where('type','eventee')->limit(5)->get();
            $ending_event  =Event::whereBetween('end_date',[Carbon::now()->format('Y-m-d'),Carbon::now()->addDays(5)->format('Y-m-d')])->where('user_id',Auth::id())->limit(5)->get();
            $eventUser = Event::where('user_id',Auth::id())->get();
            $totaluser = [];
            $totaluserLive = [];
            $alluser = 0;
            $liveUser = 0;
            foreach($eventUser as $event){
                $userCount = User::where('event_id',$event->id);
                if($userCount->count() > 0){
                    array_push($totaluser,$userCount->count());
                }
                $userCountLive = $userCount->where('online_status',1)->count();
                if($userCountLive > 0){
                    array_push($totaluserLive,$userCountLive);
                }
            }

            for($i = 0 ; $i < count($totaluser) ; $i++){
                $alluser += $totaluser[$i];
            }

           
            return view('eventee.dashboard',compact('events','liveEvent','alluser','liveUser','recent','ending_event')); 
        }
        catch(\Exception $e){
            Log::error($e->getMessage());
        }
    }

    public function Event(Request $req){
        $req->session()->put('MangeEvent',0);
        $events = Event::where('user_id',Auth::id())->orderBy('id','desc')->get();
        return view('eventee.events.index',compact('events'));
    }

    public function confirmDomain(Request $req){
        // $domain = $req->domain;
        // $domain = 'localhost:8000';  
        // $response = Http::get('http://217f-103-104-94-243.ngrok.io/verifydomain');
        return [true];
        // $r =  Http::get('http://'.$domain.'/verifydomain');
        // dd("564");
    }
    public function verifyDomain(Request $req){
        $domain = $req->domain;
        // Event::where('domain',$domain)
        return view("eventee.domain.verify")->with(compact("domain"));
    }
    public function Save(Request $req){
        $slug = str_replace(" ","-",strtolower($req->event_slug));
        $eve = Event::where('slug',$slug)->count();
        if($eve > 0){
            flash("An Event With The Same Name Already Exist")->error();
            return redirect()->back();
        }
        $baseurl = URL::to('/');
        if(strpos($baseurl,'https')){
           $baseurl =  str_replace('https://app.','',$baseurl);
        }else{
          $baseurl=  str_replace('http://app.','',$baseurl);
        }
        // $response = Http::withHeaders([
        //     'key' => '53530868315e72004e53efaff6ecbfb728e308f2',
        //     'secret' => 'efcb34c45cf67af3a828fb5886687a9b658c6cdf'
        // ])->post(env('COMET_CHAT_CREATE_APP'), [
        //     'name' => trim($req->name),
        //     'region' => 'us'
        // ]);
        // return $response;
        $event = new Event;
        $event->name = trim($req->name);
        $event->slug = str_replace(" ","-",strtolower($req->event_slug));
        $event->user_id = Auth::id();
        $event->start_date = $req->start_date;
        $event->end_date = $req->end_date;
        if($req->domain){
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
            EventAttendee($event->id);
            if(env('APP_ENV') !== 'staging'){
                createApp($event);
            }
            
            createMenus($event->id);
            createLeaderboard($event->id);
            $contents = ContentMaster::all();
            foreach($contents as $content){
                Content::create([
                    "name"=> $content->name,
                    "type"=>$content->type,
                    "section"=>$content->section,
                    "event_id"=>$event->id
               ]);
            }
            //Creating Menus
            // $menusNames = array('Polls','Q&A','Announcements');
            // $manuPos = array(1,2,3);
            // $menuLink = array('#poll-modal','#qna-modal','#announcement-modal');
            // $menuClass = array('fas fa-poll','fa fa-question-circle','fa fa-bullhorn');
            
            // for($i = 0; $i<count($menusNames); $i++){
            //     Menu::create(['name'=>$menusNames[$i],'position'=>$manuPos[$i],'link'=>$menuLink[$i],'iClass'=>$menuClass[$i],'event_id'=>$event->id,'type'=>'footer','parent_id'=>0]);
            // }
            flash("Event Saved Successfully")->success();
            Event::where('id',$event->id)->update(['link'=> $event->slug.'.'.str_replace('https://app.','',$baseurl).'']);
            if(isset($domain)){
                return redirect(route("verifyDomain",['domain'=>$domain]));
            }else{
                return redirect()->back();
            }
        
        }
        else{
            flash("Something Went Wrong")->error();
            return redirect()->back();
        }

    }
}

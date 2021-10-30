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
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Facades\Excel;
use App\Menu;
class eventeeController extends Controller
{
    //
    public function Regiter(){
        $id = null;
        return view('eventee.register')->with(compact("id"));
    }

    public function ConfirmRegister(Request $request){
        $request->validate([
            'name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'password' => 'required',
            'job_title' => 'required',
            'country' => 'required',
            'industry' => 'required',
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = password_hash($request->password,PASSWORD_DEFAULT);
        $user->job_title = $request->job_title;
        $user->type = 'eventee';
        $user->country = $request->country;
        $user->industry = $request->industry;
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
        return view('eventee.login')->with(compact("id"));
    }

    public function ConfirmLogin(Request $req){
        try{
            $user = User::where('email',$req->email)->first();
            $pass = password_verify($req->password,$user->password);
            if($pass && $user->type == 'eventee'){
                Auth::login($user);
                return redirect(route('teacher.dashboard'));
            }
            else{
                return $user->type;
            }
        }
        catch(\Exception $e){
            Log::error($e->getMessage());
        }
    }

    public function Dashboard(Request $req){
        try{
            $req->session()->put('MangeEvent',0);
            $events = Event::where('user_id',Auth::id())->get();
            return view('eventee.dashboard',compact('events')); 
        }
        catch(\Exception $e){
            Log::error($e->getMessage());
        }
    }

    public function Event(Request $req){
        $req->session()->put('MangeEvent',0);
        $events = Event::where('user_id',Auth::id())->orderBy('id','desc')->paginate(5);
        return view('eventee.events.index',compact('events'));
    }

    public function Save(Request $req){
        $baseurl = URL::to('/');
        if(strpos($baseurl,'https')){
           $baseurl =  str_replace('https://','',$baseurl);
        }else{
          $baseurl=  str_replace('http://','',$baseurl);
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
        if($event->save()){
            
            createMenus($event->id);

            $contents = ContentMaster::all();
            foreach($contents as $content){
                Content::create([
                    "name"=> $content->name,
                    "type"=>$content->type,
                    "section"=>$content->section,
                    "event_id"=>$event->id
               ]);
            }
            $menusNames = array('Polls','Q&A','Announcements');
            $manuPos = array(1,2,3);
            $menuLink = array('#poll-modal','#qna-modal','#announcement-modal');
            $menuClass = array('fas fa-poll','fa fa-question-circle','fa fa-bullhorn');
            
            for($i = 0; $i<count($menusNames); $i++){
                Menu::create(['name'=>$menusNames[$i],'position'=>$manuPos[$i],'link'=>$menuLink[$i],'iClass'=>$menuClass[$i],'event_id'=>$event->id,'type'=>'footer','parent_id'=>0]);
            }
            flash("Event Saved Successfully")->success();
            Event::where('id',$event->id)->update(['link'=> $event->slug.'.'.str_replace('https://','',$baseurl).'']);
            return redirect()->back();
        }
        else{
            flash("Something Went Wrong")->error();
            return redirect()->back();
        }

    }
}

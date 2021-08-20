<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\EventSession;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;
use App\Event;
class eventeeController extends Controller
{
    //
    public function Regiter(){
        return view('eventee.register');
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
        return view('eventee.login');
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
                return 2;
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
        $event = new Event;
        $event->name = $req->name;
        $event->user_id = Auth::id();
        $event->start_date = $req->start_date;
        $event->end_date = $req->end_date;
        if($event->save()){
            $req->session()->put('eve-sucess', 1);
            Event::where('id',$event->id)->update(['link'=>$baseurl . '/Event'.'/'.encrypt($event->id)]);
            return redirect()->back();
        }
        else{
            $req->session()->put('eve-sucess', 2);
            return redirect()->back();
        }

    }
}

<?php

namespace App\Http\Controllers\EventUser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Event;
use Carbon\Carbon;
use App\User;
use Illuminate\Support\Facades\Auth;

use App\UserLocation;
class LoginController extends Controller
{
    //

    public function __construct()
    {
        $this->loginT = getLoginVars();
    }
    public function login($sudomain){

        // return  ($id);
        $event = Event::where("slug",$sudomain)->first();
        if($event->end_date < Carbon::today()){
            return view('errors.custom');
        }
        else{
            return view("eventUser.login")->with([
                "login" => $this->loginT,
                "notFound" => FALSE,
                "captchaError" => FALSE,
                "id"=>$event->id,
                "subdomain"=>$event->slug
            ]);
        }
        
    }
    public function exhibitorLogin($sudomain,$email){

        // return  ($email);
        $event = Event::where("slug",$sudomain)->first();
        if($event->end_date < Carbon::today()){
            return view('errors.custom');
        }
        else{
            return view("auth.exhibiter")->with([
                "email" => $email,
                "login" => $this->loginT,
                "notFound" => FALSE,
                "captchaError" => FALSE,
                "id"=>$event->id,
                "subdomain"=>$event->slug
            ]);
        }
        
    }

    public function logout($subdomain){
        // return Auth::user()->type;
        // return $subdomain;
        // return Auth::check();
        if(Auth::check() == 1){
            // return $subdomain;
            if(Auth::user()->type =='attendee'){
                $user = User::findOrFail(Auth::id());
                $user->online_status=0;
                if(UserLocation::where('user_id',Auth::id())->where('current_status',1)->count() > 0){
                    $location = UserLocation::where('user_id',Auth::id())->where('current_status',1)->first();
                    $location->current_status = 0;
                    $location->save();
                }
                
                if($user->save()){
                    // return $user;
                    Auth::logout();
                    return redirect(route('attendeeLogin',$subdomain));
                }
        }
        elseif(Auth::user()->type =='exhibiter'){
            // return 1;
            // return Auth::user();
            Auth::logout(); 
            return redirect(route('attendeeLogin',$subdomain));
        }

        else{
            // return Auth::user()->type;
            return redirect()->back();
        }
            
        }        
    }
}

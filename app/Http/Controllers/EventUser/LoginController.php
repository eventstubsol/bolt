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
        // return Auth::id();
        if(Auth::check()){
            $user = User::findOrFail(Auth::id());
            $user->online_status=0;
            // $userlocation = UserLocation::where('user_id',Auth::id())->where('deleted_at',null)->first();
            // $userlocation->delete();

            if($user->save()){
                // return $user;
                Auth::logout();
                return redirect(route('attendeeLogin',$subdomain));
            }
            
        }        
    }
}

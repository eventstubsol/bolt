<?php

namespace App\Http\Controllers\EventUser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Event;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
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

    public function logout($subdomain){
        if(Auth::check()){
            Auth::logout();
            return redirect()->route('attendeeLogin',$subdomain);
        }        
    }
}

<?php

namespace App\Http\Controllers\EventUser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Event;
use Carbon\Carbon;
class LoginController extends Controller
{
    //
    public function __construct()
    {
        $this->loginT = getLoginVars();
    }
    public function login($sudomain){

        // return decrypt($id);
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
                "subdomain"=>$event->name
            ]);
        }
        
    }

    public function confirmLogin(Request $req,$id){
        
    }
}

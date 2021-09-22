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
    public function login($id){

        // return decrypt($id);
        $event = Event::findOrFail(decrypt($id));
        if($event->end_date < Carbon::today()){
            return view('errors.custom');
        }
        else{
            return view("eventUser.login")->with([
                "login" => $this->loginT,
                "notFound" => FALSE,
                "captchaError" => FALSE,
                "id"=>$id
            ]);
        }
        
    }

    public function confirmLogin(Request $req,$id){
        
    }
}

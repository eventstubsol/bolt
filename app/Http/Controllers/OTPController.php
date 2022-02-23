<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
class OTPController extends Controller
{
    //
    public function updateStatus(Request $req){
        $id = $req->id;
        
        $event = Event::findOrFail($id);
        $event->otp_option = $req->status;
        if($event->save()){
            if($req->status == 1){
                
                return response()->json(["code"=>200,"message"=>"OTP System is turned On"]);
            }
            else{
               
                return response()->json(["code"=>200,"message"=>"OTP System is turned Off"]);
            }
        }
       
    }
}

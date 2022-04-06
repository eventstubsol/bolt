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
        $event->active_option = $req->status;
        if($event->save()){
            if($req->status == 1){
                
                return response()->json(["code"=>200,"message"=>"Activation System is turned On"]);
            }
            else{
               
                return response()->json(["code"=>200,"message"=>"Activation System is turned Off"]);
            }
        }
       
    }
    public function updateManualStatus(Request $req){
        $id = $req->id;
        
        $event = Event::findOrFail($id);
        $event->m_active_option = $req->status;
        if($event->save()){
            if($req->status == 1){
                
                return response()->json(["code"=>200,"message"=>"Manual Activation System is turned On"]);
            }
            else{
               
                return response()->json(["code"=>200,"message"=>"Manual Activation System is turned Off"]);
            }
        }
       
    }
    public function cLogin(Request $req){
        $id = $req->id;
        
        $event = Event::findOrFail($id);
        $event->confirm_login = $req->status;
        if($event->save()){
            if($req->status == 1){
                
                return response()->json(["code"=>200,"message"=>"Confirm Login System is turned On"]);
            }
            else{
               
                return response()->json(["code"=>200,"message"=>"Confirm Login System is turned Off"]);
            }
        }
       
    }
}

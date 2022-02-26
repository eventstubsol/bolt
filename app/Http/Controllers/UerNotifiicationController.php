<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\SeenNotification;
use App\PushNotification;
class UerNotifiicationController extends Controller
{
    //

    public function seen(Request $req){
        $id = $req->id;
        $user_id = Auth::id();
        $seenNote = SeenNotification::updateOrCreate(['notification_id'=>$req->id,'user_id'=>Auth::id()],['notification_id'=>$req->id,'user_id'=>Auth::id(),'seen'=>1]);
        if($seenNote){
            return response()->json(['code'=>200]);

        }
        else{
            return response()->json(['code'=>500]);
        }
    }
    public function seenAll(Request $req){
        $event_id = $req->id;
        $notes = PushNotification::where('event_id',$event_id)->get();
        foreach($notes as $note){
            SeenNotification::updateOrCreate(['notification_id'=>$note->id,'user_id'=>Auth::id()],['notification_id'=>$note->id,'user_id'=>Auth::id(),'seen'=>1]);
        }
        return response()->json(['code'=>200]);
    }
            
}

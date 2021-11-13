<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\SeenNotification;
class UerNotifiicationController extends Controller
{
    //

    public function seen(Request $req){
        $id = $req->id;
        $user_id = Auth::id();
        $note = new SeenNotification;
        $note->notification_id = $id;
        $note->user_id = $user_id;
        $note->seen = 1;
        if($note->save()){
            return response()->json(['code'=>200]);

        }
        else{
            return response()->json(['code'=>500]);
        }
    }
}

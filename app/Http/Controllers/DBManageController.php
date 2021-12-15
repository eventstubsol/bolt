<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PushNotification;
use Illuminate\Support\Facades\DB;

class DBManageController extends Controller
{
    //
    public function NotificationDelete(){
       $notification = DB::DELETE("DELETE FROM push_notification Where 1");
       if($notification){
           return response()->json(['code'=>200,'message'=>"All Notifications Have Been Deleted"]);
       }
       else{
        return response()->json(['code'=>500,'message'=>"Couldnot Delete Data From The Database"]);
       }
    }

    public function ScheduleNotificationDelete(){
        $notification = DB::DELETE("DELETE FROM schedule_notifications Where `status` = 1");
        if($notification){
            return response()->json(['code'=>200,'message'=>"All Sent Scheduled Notifications Have Been Deleted"]);
        }
        else{
         return response()->json(['code'=>500,'message'=>"Couldnot Delete Data From The Database"]);
        }
    }
    public function MailsnDelete(){
        $mails = DB::DELETE("DELETE FROM mails Where 1");
        if($mails){
            return response()->json(['code'=>200,'message'=>"All Sent Mails Have Been Deleted"]);
        }
        else{
         return response()->json(['code'=>500,'message'=>"Couldnot Delete Data From The Database"]);
        }
    }
}

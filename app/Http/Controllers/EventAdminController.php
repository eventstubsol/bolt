<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\LoginLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Points;
use App\Event;

use App\Leaderboard;
use App\LeadPoint;
class EventAdminController extends Controller
{
    //
    public function OtpView($user_id){
        $user=User::findOrFail($user_id);
        return view("eventAdmin.showOtp",compact("user_id",'user'));
    }
    public function VerifyOtp(Request $req,$user_id){
        $otp = $req->otp;
        $user = User::findOrFail($user_id);
        $check = VerifyOTP($user_id = $user_id, $otp= $otp);
            
        if($check){    
                    // return 2;
                    flash("Your Account Is Verified")->success();
                    return redirect()->route('Eventee.login');
                
            }
            else{
                
                flash("Your Account Cannot Be Verified, Please Try Again!")->error();
                return redirect()->back();
                
            }
    }

    public function OtpViewAttendee($subdomain =null,$user_id){
        // return $user_id;
        $user=User::findOrFail($user_id);
        return view("eventAdmin.showOtp",compact("user_id",'user'));
    }

    public function VerifyOtpAttendee($subdomain =null,$user_id,Request $req){
        $otp = $req->otp;
        $user = User::findOrFail($user_id);
        $check = VerifyOTP($user_id = $user_id, $otp= $otp);
        if($check){
           
            // return 1;
            $event = Event::findOrfail($user->event_id);
            $user->online_status = 1;
            $user->save();
            DB::table("sessions")->where("user_id", $user->id)->whereNotIn("id", [session()->getId()])->delete();
            Auth::login($user);
            LoginLog::create(["ip" => $req->ip(), "user_id" => $user->id]);
            // UserLocation::create(['user_id'=>$user->id,'event_id'=>$user->event_id,'type'=>"exterior"]);
                // UserLocation::create(['user_id'=>$user->id,'event_id'=>$user->event_id,'type'=>"exterior"]);
                $pointsDetails = [
                    "points_to" => $user->id,
                    "points_for" => "login",
                    "details" => "",
                ];
                $leaderBoard = Leaderboard::where('event_id',$event_id)->first();


                $leadPoints = LeadPoint::where("owner",$leaderBoard->id)->where("status",1)->get()->groupBy("point_label");
                if(isset($leadPoints["LOGIN_POINTS"])){
                $pointsDetails["points"] = $leadPoints["LOGIN_POINTS"][0]->user_points; //SCAVENGER_HUNT_POINTS;
                
                if (!Points::where($pointsDetails)->count()) {
                    Points::create($pointsDetails);
                    $user->update([
                        "points" => DB::raw('points+' .  $leadPoints["LOGIN_POINTS"][0]->user_points),
                    ]);
                }
            }
            // $pointsDetails = [
            //     "points_to" => $user->id,
            //     "points_for" => "login",
            //     "details" => "",
            //     "points" => LOGIN_POINTS,
            // ];
            // if (!Points::where($pointsDetails)->count()) {
            //     Points::create($pointsDetails);
            //     $user->update([
            //         "points" => DB::raw('points+' . LOGIN_POINTS),
            //     ]);
            // }
            //Users to whoom we have to notify about the recent login of current user
            foreach ($user->tags as $tag) {
                foreach ($tag->looking_users as $looking_user) {
                    $looking_user->sendNotification("suggested_user_login", "One of your suggested users just logged in. Visit attendees section to grow your network.", "info", $user->id);
                }
            }
            $user->touch();
            // dd("test");

            return redirect(route("eventee.event",['subdomain'=>$event->slug]));
        }
        else{
            flash("OTP didnot Match")->error();
            return redirect()->back();   
        }  
    }
}

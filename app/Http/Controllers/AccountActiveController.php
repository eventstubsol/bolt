<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Mail\RegistrationMail;
use App\Event;
use App\LoginLog;
use App\Points;
use App\Template;
use Illuminate\Support\Facades\Mail as Mailing;
use Carbon\Carbon;

class AccountActiveController extends Controller
{
    //
    public function active($user_id){
        $user = User::findOrFail($user_id);
        $user->email_status = 1;
        $user->save();
        flash("Account Verification Is Successful")->success();
        return redirect()->route('Eventee.login');
    }

    public function activeAttendee($subdomain,$user_id,Request $req){
        $user = User::findOrFail($user_id);
        $user->email_status = 1;
        $user->online_status = 1;
        $user->save();
            // dd("test");
        $event = Event::where("slug",$subdomain)->first();
        $template = Template::where('event_id',$event->id)->first();
        $template->message = str_replace('{user.name}',$user->name,$template->message);
        $template->message = str_replace('{user.email}',$user->email,$template->message);
        $event= Event::where('slug',$subdomain)->first();
        Mailing::to($user->email)->send(new RegistrationMail($user,$template,$event));
        if(Carbon::now()->setTimezone($event->timezone) < Carbon::parse($event->start_date)->setTimezone($event->timezone)){
            flash("Registration Successful")->success();
            return redirect()->route('thank.page',$subdomain);
        }
        else{
            $user->online_status = 1;
                $user->save();
                DB::table("sessions")->where("user_id", $user->id)->whereNotIn("id", [session()->getId()])->delete();
                Auth::login($user);
                LoginLog::create(["ip" => $req->ip(), "user_id" => $user->id]);
                // UserLocation::create(['user_id'=>$user->id,'event_id'=>$user->event_id,'type'=>"exterior"]);
                $pointsDetails = [
                    "points_to" => $user->id,
                    "points_for" => "login",
                    "details" => "",
                    "points" => LOGIN_POINTS,
                ];
                if (!Points::where($pointsDetails)->count()) {
                    Points::create($pointsDetails);
                    $user->update([
                        "points" => DB::raw('points+' . LOGIN_POINTS),
                    ]);
                }
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
    }
}

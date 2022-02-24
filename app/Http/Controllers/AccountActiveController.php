<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Mail\RegistrationMail;
use App\Event;
use App\Template;
use Illuminate\Support\Facades\Mail as Mailing;

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

        Mailing::to($user->email)->send(new RegistrationMail($user,$template,$event));
        flash("Registration Successful")->success();
        return redirect()->route('thank.page',$subdomain);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Event;
use App\UserData;


class EventRegController extends Controller
{
    //
    public function CustomFormSave(Request $req,$subdomain){
        $event = Event::where("slug",$subdomain)->first();
        $checkuser = User::where("email",$req->email)->where("event_id",$event->id)->get();
        if($checkuser->count()){
            return back()->with(["email"=>"Email Already Taken"]);
        }
        $user = new User($req->all());
        $user->save();
        $userdatas = $req->except("name","email","phone","country","job_title","event_id","_token","type","subtype","profileImage");
        foreach($userdatas as $feild => $userdata){
            $userData = new UserData;
            $userData->user_id = $user->id;
            $userData->user_field = $feild;
            $userData->field_value = $userdata;
            $userData->save();
        }
        flash("Registered Successfully")->success();
        return redirect()->route('event.landpage',$subdomain)->with('message',"User Generated");
    }

    public function BasicForm(Request $req,$subdomain){
        $event = Event::where('slug',$subdomain)->first();
        $user = new User;
        $user->name = $req->name;
        $user->event_id = $event->id;
        $user->email = $req->email;
        $user->phone = $req->phone;
        $user->save();
        flash("Registered Successfully")->success();
        return redirect()->route('event.landpage',$subdomain)->with('message',"User Generated");

    }
}

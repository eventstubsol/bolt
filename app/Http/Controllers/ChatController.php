<?php

namespace App\Http\Controllers;

use App\CometChat;
use App\Event;
use Illuminate\Http\Request;

use App\User;

class ChatController extends Controller
{
    public function ChatSettings($id){
       $event  =  Event::where("id",$id)->first();
       $chat_app = CometChat::where("event_id",$event->id)->first();
       if(!$chat_app){
            createApp($event);
            $chat_app = CometChat::where("event_id",$event->id)->first();
       }
       $settings = ((object)json_decode($chat_app->settings))->settings;

    //    dd($settings);
       return view("eventee.chat.index")->with(compact("id","chat_app","settings"));
    }
    public function testPoll($id){
       $event  =  Event::where("id",$id)->first();
       $chat_app = CometChat::where("event_id",$event->id)->first();
       if(!$chat_app){
            createApp($event);
            $chat_app = CometChat::where("event_id",$event->id)->first();
       }
       $user_id = "a5eadd46-93d0-488d-a418-2d9d4fe88dbc";
       $res = createPoll($chat_app,"question 1",["option 1 ","otp 2"],"general","group",$user_id);
       return $res;
    }
    public function createpoll($id){
           $event  =  Event::where("id",$id)->first();
            $chat_app = CometChat::where("event_id",$event->id)->first();
            if(!$chat_app){
                createApp($event);
                $chat_app = CometChat::where("event_id",$event->id)->first();
            }
            $groups = getGroups($chat_app);
            $users = User::orderBy("created_at", "DESC")->where('event_id', ($id))->get();
            
            return view('polls.create')->with(compact(["id","chat_app","groups","users"]));
     
    }
    public function storePoll(Request $request,$id){
        
        // $event  =  Event::where("id",$id)->first();
        $chat_app = CometChat::where("event_id",$id)->first();
        $res = createPoll($chat_app,$request->title, explode(",", $request->options),$request->group,"group",$request->user_id);
        if(json_decode($res)->data->success){
            flash("Poll Sent")->success();
        }else{
            flash("Poll Creation Failed")->error();
        }
        return redirect()->back();
        // return $res;
        // dd($request->all());
        // if(!$chat_app){
        //     createApp($event);
        //     $chat_app = CometChat::where("event_id",$event->id)->first();
        // }
        // return view('polls.create')->with(compact(["id","chat_app"]));
    }
    public function SaveChatSettings(Request $request ,$id){
        $event  =  Event::where("id",$id)->first();
        $chat_app = CometChat::where("event_id",$event->id)->first();
        $cicon = isset($request->docked_layout_icon_close) ? $request->docked_layout_icon_close :'';
        if(isset($request->docked_layout_icon_close)){
            if(substr( $cicon, 0, 7 ) === "uploads"){
                $cicon = env("AWS_URL").$cicon;
            }
        }else{
            $cicon = "https://widget-js.cometchat.io/v2/resources/chat_close.svg";
        }
        $oicon = isset($request->docked_layout_icon_open) ? $request->docked_layout_icon_open :'';
        if(isset($request->docked_layout_icon_open)){
            $oicon = $request->docked_layout_icon_open;
            if(substr( $oicon, 0, 7 ) === "uploads"){
                $oicon = env("AWS_URL").$oicon;
            }
        }else{
            $oicon = "https://widget-js.cometchat.io/v2/resources/chat_bubble.svg";
        }
        $newsettings = (object)[
            "enable_video_calling"=>$request->enable_video_calling,
            "enable_voice_calling"=>$request->enable_voice_calling,
            "docked_layout_icon_background"=>$request->docked_layout_icon_background,
            "docked_layout_icon_close"=>$cicon,
            "docked_layout_icon_open"=>$oicon,
        ];
        updateWidget($chat_app,$newsettings);
        return redirect(route("settings.chat",$id));
        // $settings = ((object)json_decode($chat_app->settings))->settings;
        // dd($settings);
        // return view("eventee.chat.index")->with(compact("id","chat_app","settings"));
        
    }
}

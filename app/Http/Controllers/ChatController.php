<?php

namespace App\Http\Controllers;

use App\CometChat;
use App\Event;
use Illuminate\Http\Request;

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

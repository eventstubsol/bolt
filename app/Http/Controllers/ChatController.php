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
        $newsettings = (object)$request->all();
        updateWidget($chat_app,$newsettings);
        return redirect(route("settings.chat",$id));
        // $settings = ((object)json_decode($chat_app->settings))->settings;
        // dd($settings);
        // return view("eventee.chat.index")->with(compact("id","chat_app","settings"));
        
    }
}

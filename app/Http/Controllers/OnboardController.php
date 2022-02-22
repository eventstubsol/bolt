<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Illuminate\Support\Facades\Log;
use App\Onboard;
use App\Page;
use App\sessionRooms;
use App\Booth;
use App\Link;

class OnboardController extends Controller
{
    //
    public function index($id){
        $event = Event::findOrFail($id);
        $onboards = Onboard::where("event_id",$id)->get();
        $pages = Page::where('event_id',$id)->get();
        $rooms = sessionRooms::where('event_id',$id)->get();
        $booths = Booth::where('event_id',$id)->get();
        // return env("APP_DEBUG");
        // return $event;
        try{
            return view("eventee.settings.onbloard",compact("id","event","onboards",'pages','booths','rooms'));
        }
        catch(\Exception $e){
            Log::error($e->getMessage());
        }   
    }

    public function setCharacter(Request $req,$id){
        $event = Event::findOrFail($id);
        if($req->has("url")){
            $event->character_url = $req->url;
        }
        if($event->save()){
            flash("Character Saved Successfully")->success();
            return redirect()->back();
        }
        else{
            flash("Something Went Wrong")->error();
            return redirect()->back();
        }
    }

    public function SearchLink(Request $req){
        $links = Link::where("page",$req->id)->get();
        return response()->json($links);
    }

    public function SaveSetting($id,Request $req){
        $text = $req->text;
        $location_type = $req->location_type;
        $location = null;
        $link = null;
        switch($location_type){
            case 'lobby':
                $location =  'lobby';
                break;
            case 'session_room':
                $location = $req->sessionRoom;
                break;
            case 'page':
                $location = $req->pages;
                break;
            case 'booth':
                $locaiton = $req->booths;
        }
        if($req->has("link")){
            $link =  $req->link;
        }
        $priority = $req->priority;
        $boardCount = Onboard::where("event_id",$id)->where("location_type",$location)->count();
        // return $boardCount;
        if($boardCount > 3){
            flash("Each Location Can Have Only 4 Details")->error();
            return redirect()->back();
        }
        else{
            $onboard = new Onboard;
            $onboard->event_id = $id;
            $onboard->text = $text;
            $onboard->location_type = $location_type;
            $onboard->location = $location;
            $onboard->link_id = $link;
            $onboard->priority = $priority;
            if($onboard->save()){
                flash("Setting Updated Successfully")->success();
                return redirect()->back();
            }
            else{
                flash("Something Went Wrong")->error();
                return redirect()->back();
            }

        }

    }
}

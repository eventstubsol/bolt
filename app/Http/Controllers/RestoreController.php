<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Page;
use App\sessionRooms;
use App\Booth;
use App\EventSession;

class RestoreController extends Controller
{
    //
    public function index($id){
        $users = User::where('event_id',$id)->onlyTrashed()->get();
        $pages = Page::where('event_id',$id)->onlyTrashed()->get();
        $sessionRooms =  sessionRooms::where('event_id',$id)->onlyTrashed()->get();
        $booths = Booth::where('event_id',$id)->onlyTrashed()->get();
        $eventSessions = EventSession::where('event_id',$id)->onlyTrashed()->get();
        return view("eventee.restore.index",compact("id","users","pages",'sessionRooms','booths','eventSessions'));
    }

    public function restore(Request $req){
        $id = $req->id;
        $type = $req->type;
        switch($type){
            case "user":
                $user = User::where("id",$id)->restore();
                if($user){
                    return response()->json(['code'=>200,"message"=>"User Restored Successfully"]);
                }
                else{
                    return response()->json(['code'=>500,"message"=>"Could Not Restore The User"]);
                }
                break;
            case "page":
                $page = Page::where("id",$id)->restore();
                if($page){
                    return response()->json(['code'=>200,"message"=>"Page Restored Successfully"]);
                }
                else{
                    return response()->json(['code'=>500,"message"=>"Could Not Restore The Page"]);
                }
                break;
            case "room":
                $room = sessionRooms::where("id",$id)->restore();
                if($room){
                    return response()->json(['code'=>200,"message"=>"Room Restored Successfully"]);
                }
                else{
                    return response()->json(['code'=>500,"message"=>"Could Not Restore The Room"]);
                }
                break;
            case "booth":
                $booth = Booth::where("id",$id)->restore();
                if($booth){
                    return response()->json(['code'=>200,"message"=>"Booth Restored Successfully"]);
                }
                else{
                    return response()->json(['code'=>500,"message"=>"Could Not Restore The Booth"]);
                }
                break;
            default:
                $session = EventSession::where("id",$id)->restore();
                if($session){
                    return response()->json(['code'=>200,"message"=>"Session Restored Successfully"]);
                }
                else{
                    return response()->json(['code'=>500,"message"=>"Could Not Restore The Session"]);
                }
                break;
            
                
        }
    }
}

<?php

namespace App\Http\Controllers\Eventee;

use App\AccessSpecifiers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\sessionRooms;
use App\Image;
use App\Http\Requests\RoomFormRequest;
use Illuminate\Support\Facades\Log;

use App\Booth;
use App\Link;
use App\Page;

use App\Event;
use App\Modal;
use App\Treasure;

class SessionRoomController extends Controller
{
    public function index($id){
        try{
            $sessionrooms = sessionRooms::where('event_id',$id)->get();
            // dd($sessionrooms);
            return view("eventee.sessionrooms.list")
                ->with(compact("sessionrooms","id"));
        }
        catch(\Exception $e){
            if(Auth::user()->type === 'admin'){
                dd($e->getMessage());
            }
            else{
                Log::error($e->getMessage());
            }
        }
    }


    public function create($id){
        try{
            return view("eventee.sessionrooms.createForm")->with(compact('id'));
        }
        catch(\Exception $e){
            if(Auth::user()->type === 'admin'){
                dd($e->getMessage());
            }
            else{
                Log::error($e->getMessage());
            }
        }
    }

    public function store(RoomFormRequest $request,$id){
        try{

            //creating new room
            // if(empty($request->name)){
            //     flash("Name Field Cannot Be Left Blank")->error();
            //     return redirect()->back();
            // }
            $name = str_replace(" ","_",$request->name);
            $count = sessionRooms::where("name",$name)->where('event_id',$id)->count();
            if($count > 0){
                flash("Same Session Room Already Exist")->error();
                return redirect()->back();
            } 
            if(empty($request->background)){
                flash("Background Image Cannot Be Left Blank")->error();
                return redirect()->back();
            }
            $room = new sessionRooms([
                "name"=>$name,
                // "master_room"=>isset($request->master_room)?$request->master_room:"",
                "event_id"=>$id,
                // "bg_type"=>$request->bg_type,
            ]);
            $room->save();
            // dd($room);
            foreach(USER_TYPES as $user_type){
                AccessSpecifiers::create([
                    "page_id"=>$room->id,
                    "user_type"=>$user_type,
                    "event_id"=>$id
                ]);
            }
    
    
            //adding background image
            if (!empty($request->background)) {
                Image::create([
                    "owner" => $room->id,
                    "title" => $request->name,
                    "url" => $request->background,
                    "event_id"=>$id,
                ]);
            }
            else{
                flash("Background Image Cannot Be Left Blank")->error();
                return redirect()->back();
            }
            if($request->has("video_url")  && $request->video_url != null){
        
                $room->videoBg()->create([
                    "url"=>$request->video_url,
                    "title"=>$room->name,
                    "event_id"=>$id,
                ]);
            }
    
            
            return redirect()->to(route("eventee.sessionrooms.index",['id'=>$id]));
        }
        catch(\Exception $e){
            if(Auth::user()->type === 'admin'){
                dd($e->getMessage());
            }
            else{
                Log::error($e->getMessage());
            }
        }
       
    }

    public function edit(sessionRooms $sessionroom,$id){
       try{
           $event_id = $id;
            
        $pages = Page::where("event_id",$event_id)->get();

        $booths = Booth::where("event_id",$event_id)->get();

        $session_rooms = sessionRooms::where("event_id",$event_id)->get();
       
        $event = Event::findOrFail($id);
        $posts = $event->posts()->get();;
        $modals =  Modal::where("event_id",$id)->get();
        // dd($id);
        $sessionroom->load(["background","links.flyin"]);
            return view("eventee.sessionrooms.edit")
            ->with(compact(["modals","sessionroom","session_rooms","pages","booths","id","posts"]));
        }
       catch(\Exception $e){
            if(Auth::user()->type === 'admin'){
                dd($e->getMessage());
            }
            else{
                Log::error($e->getMessage());
            }
        }
    }

    public function update(Request $request, sessionRooms $sessionroom,$id){
        // $request->validate(["name"=>"required","background"=>"required"]);
        // dd($sessionroom->load("background")->background);
        $event_id = $id;
        try{
            $name = str_replace(" ","_",$request->name);
            $sessionroom->update([
                "name"=>$name,
                "master_room"=>isset($request->master_room)?$request->master_room:"",
                "top"=> $request->stop,
                "left"=> $request->sleft,
                "width"=> $request->swidth,
                "height"=> $request->sheight,
            ]);       
            if(isset($request->background)){
                Image::where("owner",$sessionroom->id)->update([
                    "title" => $request->name,
                    "url" => $request->background,  
                ]);
            }
            $sessionroom->videoBg()->delete();
            if($request->has("video_url")  && $request->video_url != null){
                $sessionroom->videoBg()->create([
                    "url"=>$request->video_url,
                    "title"=>$sessionroom->name
                ]);
            }
            $sessionroom->links()->delete();
            if($request->has("linknames")){
                foreach($request->linknames as $id => $linkname){

                    $to = "";
                    $url = "";
                    // dd($request->type);
                    switch($request->type[$id]){
                        case "session_room": 
                            $to = $request->rooms[$id];
                            break;
                        case "page":
                            $to = $request->pages[$id];
                            break;
                        case "zoom":
                            $to = $request->zoom[$id];
                            break;
                        case "booth":
                            $to = $request->booths[$id];
                            break;
                        case "post":
                            $to = $request->posts[$id];
                            break;
                        case "vimeo":
                            $to = $request->vimeo[$id];
                            break;
                        case "pdf":
                            $to = $request->pdf[$id];
                            break;
                        case "chat_user":
                            $to = $request->chatuser[$id];
                            break;
                        case "chat_group":
                            $to = $request->chatgroup[$id];
                            break;
                        case "custom_page":
                            $to = $request->custom_page[$id];
                            break;
                        case "lobby":
                            $to = "lobby";
                            break;
                        case "faq":
                            $to = "FAQ";
                            break;
                        case "photobooth":
                            $to = $request->capture_link[$id];
                            $url = $request->gallery_link[$id];
                            break;
                        case "videosdk":
                            $to = uniqid();
                            break;
                        case "modal":
                            $to = $request->modals[$id];
                            break;
                        case "lounge":
                            $to = "lounge";
                            break;
                    }
                    
                    $link = Link::create([
                        "page"=>$sessionroom->id,
                        "name"=> $linkname,
                        "type"=>$request->type[$id],
                        "to"=> $to,
                        "url"=> $url,
                        "top"=> $request->top[$id],
                        "left"=> $request->left[$id],
                        "width"=> $request->width[$id],
                        "height"=> $request->height[$id],
                        "perspective"=>isset($request->perspective[$id])?$request->perspective[$id]:'',
                        "rotationtype"=>isset($request->rotationtype[$id])?$request->rotationtype[$id]:'',
                        "rotation"=>isset($request->rotation[$id])?$request->rotation[$id]:'',
                        "location_status"=>$request->set_location[$id]
                    ]);
                    // dd($link);
                    if($request->has("bgimages") && isset($request->bgimages[$id]) ){
                        if(count($request->bgimages[$id])>0 ){
                        foreach($request->bgimages[$id] as $bgimage){
                            if($bgimage){ //check if not null
                            $link->background()->create([
                                "owner"=>$link->id,
                                "url" => $bgimage,
                                "title" => "link",
                                "event_id" => $id,
                            ]);
                            }
            
                        }
                        }
                    }
                    if($request->has("flyin") && isset($request->flyin[$id])){
                        $link->flyin()->create([
                            "url"=>$request->flyin[$id],
                            "title"=>$link->name
                        ]);
                    }

                }
            }
            $id = $event_id;
            return redirect()->to(route("eventee.sessionrooms.edit", [
                                        "sessionroom" => $sessionroom->id,'id'=>$id
                                    ]));
        }
        catch(\Exception $e){
            if(Auth::user()->type === 'admin'){
                dd($e->getMessage());
            }
            else{
                Log::error($e->getMessage());
            }
        }
    }

    public function destroy(Request $req){
        $sessionroom = sessionRooms::findOrFail($req->id);
        $sessionroom->delete();
        return response()->json(['message'=>"Done"]);
    }

    public function BulkDelete(Request $req){
        try{
            $ids = $req->ids;
            $totalcount = 0;
            for($i = 0 ; $i < count($ids); $i++){
                $page = sessionRooms::findOrFail($ids[$i]);
                $page->delete();
                $pageCount = sessionRooms::where('id',$ids[$i])->count();
                if($pageCount > 0){
                    $totalcount++;
                }

            }
            if(($totalcount)>0){
            return response()->json(['code'=>500,"Message"=>"Something Went Wrong"]);
            }
            else{
            return response()->json(['code'=>200,"Message"=>"Deleted SuccessFully"]);
            }
        }
        catch(\Exception $e){
            if(Auth::user()->type === 'admin'){
                dd($e->getMessage());
            }
            else{
                Log::error($e->getMessage());
            }
        }
    }

    public function DeleteAll(Request $req){
        try{
            $sessionrooms = sessionRooms::where('event_id',$req->id)->get();
            foreach($sessionrooms as $sessionroom){
                $sessionroom->delete();
            }
            return response()->json(['code'=>200,"Message"=>"Deleted SuccessFully"]);
        }
        catch(\Exception $e){
            if(Auth::user()->type === 'admin'){
                dd($e->getMessage());
            }
            else{
                Log::error($e->getMessage());
            }
        }
    }
}

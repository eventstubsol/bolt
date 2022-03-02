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
        $sessionroom->load("background");
            return view("eventee.sessionrooms.edit")
            ->with(compact("sessionroom","id"));
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
        try{
            $name = str_replace(" ","_",$request->name);
            $sessionroom->update([
                "name"=>$name,
                "master_room"=>isset($request->master_room)?$request->master_room:"",
                "top"=> $request->top,
                "left"=> $request->left,
                "width"=> $request->width,
                "height"=> $request->height,
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

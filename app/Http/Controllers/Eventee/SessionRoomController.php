<?php

namespace App\Http\Controllers\Eventee;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\sessionRooms;
use App\Image;


class SessionRoomController extends Controller
{
    public function index($id){
        $sessionrooms = sessionRooms::where('event_id',decrypt($id))->get();
        // dd($sessionrooms);
        return view("eventee.sessionrooms.list")
            ->with(compact("sessionrooms","id"));
    }


    public function create($id){
        return view("eventee.sessionrooms.createForm")->with(compact('id'));
    }

    public function store(Request $request,$id){
        $request->validate(["name"=>"required","background"=>"required"]);

        //creating new room
        $room = new sessionRooms([
            "name"=>$request->name,
            "master_room"=>isset($request->master_room)?$request->master_room:"",
            "event_id"=>decrypt($id)
        ]);
        $room->save();
        // dd($room);


        //adding background image
        if (!empty($request->background)) {
            Image::create([
                "owner" => $room->id,
                "title" => $request->name,
                "url" => $request->background,
            ]);
        }

        
        return redirect()->to(route("eventee.sessionrooms.index",['id'=>$id]));
    }

    public function edit(sessionRooms $sessionroom,$id){
        $sessionroom->load("background");
        return view("eventee.sessionrooms.edit")
            ->with(compact("sessionroom","id"));
    }

    public function update(Request $request, sessionRooms $sessionroom,$id){
        $request->validate(["name"=>"required","background"=>"required"]);
        // dd($sessionroom->load("background")->background);
        $sessionroom->update([
            "name"=>$request->name,
            "master_room"=>isset($request->master_room)?$request->master_room:""
        ]);       
        if(isset($request->background)){
            Image::where("owner",$sessionroom->id)->update([
                "title" => $request->name,
                "url" => $request->background,  
            ]);
        }
        return redirect()->to(route("eventee.sessionrooms.index",['id'=>$id]));
    }

    public function destroy(sessionRooms $sessionroom){
        $sessionroom->delete();
        return redirect()->to(route("sessionrooms.index"));
    }
}

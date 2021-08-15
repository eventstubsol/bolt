<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sessionRooms;
use App\Image;


class SessionRoomController extends Controller
{
    public function index(){
        $sessionrooms = sessionRooms::all();
        return view("sessionrooms.list")
            ->with(compact("sessionrooms"));
    }


    public function create(){
        return view("sessionrooms.createForm");
    }

    public function store(Request $request){
        $request->validate(["name"=>"required","background"=>"required"]);

        //creating new room
        $room = new sessionRooms([
            "name"=>$request->name,
            "master_room"=>isset($request->master_room)?$request->master_room:""
        ]);
        $room->save();


        //adding background image
        if (!empty($request->background)) {
            Image::create([
                "owner" => $room->id,
                "title" => $request->name,
                "url" => $request->background,
            ]);
        }

        
        return redirect()->to(route("sessionrooms.index"));
    }

    public function edit(sessionRooms $sessionroom){
        $sessionroom->load("background");
        return view("sessionrooms.edit")
            ->with(compact("sessionroom"));
    }

    public function update(Request $request, sessionRooms $sessionroom){
        $request->validate(["name"=>"required","background"=>"required"]);
        // dd($sessionroom->id);
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
        return redirect()->to(route("sessionrooms.index"));
    }

    public function destroy(sessionRooms $sessionroom){
        $sessionroom->delete();
        return redirect()->to(route("sessionrooms.index"));
    }
}

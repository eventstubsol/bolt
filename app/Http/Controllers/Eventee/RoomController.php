<?php

namespace App\Http\Controllers\Eventee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Room;
class RoomController extends Controller
{
    //
    public function index($id){
        $rooms = Room::orderBy("position")->where("event_id",decrypt($id))->get();;
        return view("eventee.room.list")
            ->with(compact("rooms","id"));
    }
  
  
    //room create form
    public function create($id){
        return view("eventee.room.create",compact("id"));
    }
  
    //Create new room instance
    public function store(Request $request,$id){
        $request->validate(["name"=>"required","type"=>"required"]);
        $roomsCount = Room::count();
        $room = Room::create([
          "name" => $request->name,
          "type" => $request->type,
          "position"=>$roomsCount,
          "event_id"=>decrypt($id),
        ]);
        flash("Room Saved Successfully")->success();
        return redirect()->to(route("eventee.room",$id));
    }
  
    //Show edit form
    public function edit($id,$room_id){
        $room = Room::findOrFail($room_id);
        return view("eventee.room.edit")
            ->with(compact("room","id"));
    }
  
    //Update room Instance
    public function update(Request $request,$id, $room_id){
        $room = Room::findOrFail($room_id);
        $request->validate(["name"=>"required","type"=>"required"]);
        $room->update($request->all());
        flash("Room Updated Successfully")->success();
        return redirect()->to(route("eventee.room",$id));
    }
  
    //Delete room
    public function destroy(ROOM $room){
        $room->delete();
        return redirect()->to(route("room.index"));
    }
  
    public function sort($id)
    {
       $rooms = Room::orderBy("position")->where("event_id",decrypt($id))->get();
        return view("eventee.room.sort")
            ->with(compact("rooms","id"));
    }
  
  
    public function storesort(Request $request)
    {
      $array = $request->get("rooms");
      foreach ($array as $position => $room_id) {
        Room::where("id",$room_id)->update(["position" => $position]);
      }
       return [
        "success"=>true
      ];
    }
}

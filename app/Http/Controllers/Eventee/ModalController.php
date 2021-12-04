<?php

namespace App\Http\Controllers\Eventee;

use App\Booth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\FAQ;
use App\Event;
use App\Modal;
use App\ModalItem;
use App\Page;
use App\sessionRooms;

class ModalController extends Controller
{
    //
    public function index($id){
       $modals =  Modal::where("event_id",$id)->get();
       return view("eventee.modals.index")->with(compact("id","modals"));
    }

    public function create($id){
        
        $pages = Page::where('event_id',$id)->get();

        $booths = Booth::where('event_id',$id)->get();

        $session_rooms = sessionRooms::where('event_id',$id)->get();

        // return $page;
        return view("eventee.modals.create")->with(compact(["session_rooms","pages","booths","id"]));
   
    }
    public function store($id,Request $request){
        // dd($req->all());
        if(empty($request->name)){
            flash("Name Field Cannot Be Left Blank")->error();
            return redirect()->back();
        }
        $event_id = $id;
        $name = $request->name;
        $modal = new Modal([
            "name" => $name,
            'event_id'=>$id,
            // "bg_type" =>$request->bg_type,
        ]);
        $modal->save();
        // dd($modal->id);
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
                    case "booth":
                        $to = $request->booths[$id];
                        break;
                    case "vimeo":
                        $to = $request->vimeo[$id];
                        break;
                    case "pdf":
                        $to = $request->pdf[$id];
                        break;
                }
                ModalItem::create([
                    "modal_id"=>$modal->id,
                    "name"=> $linkname,
                    "type"=>$request->type[$id],
                    "to"=> $to,
                    "url"=> $url,
                    "button_text"=>isset($request->button_text[$id])?$request->button_text[$id]:'OPEN NOW'          
                ]);
            }
        }
        return redirect(route("eventee.modal",$event_id));
    }

    public function edit($id,Modal $modal){
         
        $pages = Page::where('event_id',$id)->get();

        $booths = Booth::where('event_id',$id)->get();

        $session_rooms = sessionRooms::where('event_id',$id)->get();
        $modal->load(["items"]);

        // return $page;
        return view("eventee.modals.edit")->with(compact(["modal","session_rooms","pages","booths","id"]));
  
    }

    public function update($id,Request $request,Modal $modal){
        // dd($modal->id);
        $event_id = $id;
        $name = $request->name;
        // $modal = new Modal([
        //     "name" => $name,
        //     'event_id'=>$id,
        //     // "bg_type" =>$request->bg_type,
        // ]);
        $modal->name = $name;
        $modal->save();
        $modal->items()->delete();
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
                    case "booth":
                        $to = $request->booths[$id];
                        break;
                    case "vimeo":
                        $to = $request->vimeo[$id];
                        break;
                    case "pdf":
                        $to = $request->pdf[$id];
                        break;
                }
                ModalItem::create([
                    "modal_id"=>$modal->id,
                    "name"=> $linkname,
                    "type"=>$request->type[$id],
                    "to"=> $to,
                    "url"=> $url,
                    "button_text"=>isset($request->button_text[$id])?$request->button_text[$id]:'OPEN NOW'          
                ]);
            }
        }
        return redirect(route("eventee.modal",$event_id));
    }
    public function delete(Modal $modal){
        // dd($modal);
        $modal->delete();
        return ["success"=>true];
    }
}

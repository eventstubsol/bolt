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
use App\Http\Requests\ModalFormRequest;

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
    public function store($id,ModalFormRequest $request){
        // dd($req->all());
        // if(empty($request->name)){
        //     flash("Name Field Cannot Be Left Blank")->error();
        //     return redirect()->back();
        // }
        $count = Modal::where("name",$request->name)->where('event_id',$id)->count();
        if($count > 0){
            flash("Same Modal Already Exist")->error();
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
    public function BulkDelete(Request $req){
        $ids = $req->ids;
        $totalcount = 0;
        for($i = 0 ; $i < count($ids); $i++){
            $page = Modal::findOrFail($ids[$i]);
            $modalItem = ModalItem::where('modal_id',$page->id);
            if($modalItem->count() > 0){
                $modalItem->delete();
            }
            $page->delete();
            $pageCount = Modal::where('id',$ids[$i])->count();
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
    public function DeleteAll(Request $req){
        $modals = Modal::where('event_id',$req->id)->get();
        foreach($modals as $modal){
            $modalItem = ModalItem::where('modal_id',$modal->id);
            if($modalItem->count() > 0){
                $modalItem->delete();
            }
            $modal->delete();
        }
        return response()->json(['code'=>200,"Message"=>"Deleted SuccessFully"]);
    }

    
}

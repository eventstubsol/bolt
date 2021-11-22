<?php

namespace App\Http\Controllers\Eventee;

use App\Booth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\FAQ;
use App\Event;
use App\Modal;
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
    public function store($id,Request $req){
    }

    public function edit($id){
    }

    public function update($id,Request $req){
    }
    public function delete($id,Request $req){
    }
}

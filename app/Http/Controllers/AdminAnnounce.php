<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Announcement;

class AdminAnnounce extends Controller
{
    //
    public function index(){
        $announcements = Announcement::orderBy('id','desc')->paginate(5);
        return view('admin_annouce.index',compact('announcements'));
    }

    public function create(Request $req){
        $announce = new Announcement;
        $announce->annoucement = $req->announce;
        $announce->subject = $req->subject;
        if($req->has('event_id')){
            $announce->event_id = $req->event_id;
        }
        $announce->user_id = $req->send;
        if($announce->save()){
            return response()->json(['message'=>'Announcement Saved Successfully','status'=>200]);
        }else{
            return response()->json(['message'=>'Something Went Wrong','status'=>500]);
        }
    }

    public function Edit($id){
        $announce = Announcement::findOrFail($id);
        return view('admin_annouce.edit',compact('announce'));
    }

    public function Update(Request $req){
        $announce = Announcement::findOrFail($req->id);
        $announce->annoucement = $req->anncounce;
        $announce->user_id = $req->user_id;
        if($announce->save()){
            session(['success-edit' => 'Updated Successfully']);
            return redirect()->route('admin.announce');

        }
        else{
            session(['error-edit' => 'Something Went Wrong']);
            return redirect()->back();
        }
    }

    public function Delete(Request $req){
        $announce = Announcement::findOrFail($req->id);
        if($announce->delete()){
            return response()->json(['message'=>'Announcement Deleted Successfully','status'=>200]);
        }else{
            return response()->json(['message'=>'Something Went Wrong','status'=>500]);
        }
    }
}

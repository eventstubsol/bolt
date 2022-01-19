<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LandingPage;
use App\LandingSpeaker;
use App\User;

class LandingController extends Controller
{
    //

    public function index($id){
        $landOnPage = LandingPage::where('event_id',$id)->count();
        if($landOnPage < 1){
            LandPage($id);
        }
        $landingPage = LandingPage::where('event_id',$id)->first();
        $speakers = LandingSpeaker::where('page_id',$landingPage->id)->get();
        $users = User::where('type','speaker')->where('event_id',$id)->get();
        return view('eventee.landing.index',compact('id','landingPage','users','speakers'));
    }

    public function LandingStore($id,Request $req){
        $landing =  LandingPage::findOrFail($req->landId);
       
        $landing->banner_image = $req->bannerImage[0];
    
        
        $landing->first_logo = $req->first_logo[0];
        
        
        $landing->second_logo = $req->second_logo[0];
        
       
        $landing->tagline = $req->tagline;
        
        if($landing->save()){
            flash("Landing Page Details Updated Successfully")->success();
            return redirect()->back();
        }
    }

    public function SpeakerStore($id,$page_id,Request $req){
        $speaker = LandingSpeaker::where('page_id',$page_id);
        if(($speaker->count())> 0){
            $speaker->delete();
        }
        for($i=0 ; $i<count($req->speaker) ; $i++){
            $speak = new LandingSpeaker;
            $speak->page_id = $page_id;
            $speak->speaker_id = $req->speaker[$i];
            $speak->image = $req->speaker_img[$i];
            $speak->designation = $req->designation[$i];
            $speak->save();
        }
        flash("Landing Page Details Updated Successfully")->success();
        return redirect()->back();
    }

    public function setStatus(Request $req){
        $id = $req->id;
        $landPage = LandingPage::findOrFail($id);
        $landPage->speaker_status = $req->status;
        $landPage->save();
    }
}

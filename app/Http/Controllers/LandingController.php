<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LandingPage;
use App\LandingSpeaker;
use App\User;
use App\Event;
use App\Section;
use App\Image;

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
        $sections = Section::where('landing_id',$landingPage->id)->get();
        return view('eventee.landing.index',compact('id','landingPage','users','speakers','sections'));
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

    public function updateStatus(Request $req){
        $id = $req->id;
        $status = $req->status;
        $event = Event::findOrFail($id);
        $event->land_page = $status;
        if($event->save()){
            return response()->json(['code'=>200]);
        }
    }
    public function deleteSpeaker(Request $req){
        $land = LandingSpeaker::findOrFail($req->id);
        if($land->delete()){
            return response()->json(['code'=>200,'message'=>"Speaker Deleted Successfully"]);
        }
        else{
            return response()->json(['code'=>500,'message'=>"Something Went Wrong"]);
        }
    }

    public function schduleStatus(Request $req){
        $id = $req->id;
        $landPage = LandingPage::findOrFail($id);
        $landPage->schedule_status = $req->status;
        $landPage->save();
    }

    public function regStatus(Request $req){
        $id = $req->id;
        $landPage = LandingPage::findOrFail($id);
        $landPage->registration_status = $req->status;
        $landPage->save();
    }

    public function sectionStatus(Request $req){
        $id = $req->id;
        $landPage = LandingPage::findOrFail($id);
        $landPage->section_status = $req->status;
        $landPage->save();
    }

    public function SponsorStore($id,Request $req){
        // dd($req->all());
        $section1 = Section::where('landing_id',$id)->get();
        if(count($section1) > 0){
            foreach($section1 as $sections){
                if($sections->images()->count() > 0){
                    $sections->images()->delete();
                }
                $sections->delete();
            }
        }
        for($i = 0; $i < count($req->title) ; $i++){
            $section = new Section;
            $section->section = $req->title[$i];
            $section->landing_id = $id;
            $section->save();
            if(isset($req->url[$i])){
                foreach($req->url[$i] as $image){
               
                    // foreach($images as $image){
                       if($image){
                        $section->images()->create([
                            'url' => $image,
                            'title' => $req->title[$i]
                        ]);
                       }
                    // }
                }
            }
        }
        flash("Sponsor Updated Successfully");
        return redirect()->back();
    }
}

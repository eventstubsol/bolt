<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EventFeature;
class FeatureController extends Controller
{
    //
    public function index($id){
        $featureCount = EventFeature::where("event_id",$id)->count();
        if($featureCount < 1){
            CreateFeature($id);
        }
        $features = EventFeature::where("event_id",$id)->get();
        return view("admin_events.feature",compact("id","features"));
    }

    public function options(Request $req){
        $id = $req->id;
        $status = $req->status;
        $feat = EventFeature::findOrFail($id);
        $feat->status = $status;
        if($feat->save()){
            return response()->json(['code'=>200,'message'=>"Feature Updated"]);
        }
        else{
            return response()->json(['code'=>500,'message'=>"Oops! Something Went Wrong"]);
        }
    }
}

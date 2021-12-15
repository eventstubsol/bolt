<?php

namespace App\Http\Controllers\Eventee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Leaderboard;
use App\LeadPoint;
use App\Image;
use App\Exports\LeaderboardExport;
use Maatwebsite\Excel\Excel;

class LeaderboardController extends Controller
{
    //
    public function index($id){
        $leaderSettings = Leaderboard::where('event_id',$id)->first();
        return view('eventee.leaderboard.index',compact('id','leaderSettings'));
    }

    public function store(Request $request,$id){
        $color = $request->color;
        $img = $request->leaderboardUrl;
        $points = $request->points;
        $leaderBoard =new Leaderboard;
        $leaderBoard->color = $color;
        $leaderBoard->event_id = $id;
        if($leaderBoard->save()){
            for($i = 0; $i < count($img) ;$i++){
                Image::create(['owner'=>$leaderBoard->id,'title'=>"lead_setting",'url'=>$img[$i]]);
            }
            for($j = 0; $j < count($points) ; $j++){
                LeadPoint::create(['owner'=>$leaderBoard->id,'point'=>$points[$j]]);
            }
            flash("Data Uploaded Successfully")->success();
            return redirect()->route('eventee.leaderSetting',$id);
        }
        else{
            flash("Something Went Wrong")->success();
            return redirect()->back();
        }
    }

    public function update($id,$lead_id,Request $request){
        $color = $request->color;
        $img = $request->leaderboardUrl;
        $points = $request->points;
        // return $img;
        $leaderBoard = Leaderboard::findOrFail($lead_id);
       
        $leaderBoard->color = $color;
        
        if($leaderBoard->save()){
            $images = Image::where('owner',$leaderBoard->id)->delete();
           
            $pointCount = LeadPoint::where('owner',$leaderBoard->id)->delete();
            for($i = 0; $i < count($img) ;$i++){
               if($i == 0 ){
                Image::create(['owner'=>$leaderBoard->id,'title'=>"lead_setting",'url'=>$img[$i]]);
               }
               else{
                Image::create(['owner'=>$leaderBoard->id,'title'=>"lead_setting",'url'=>$img[$i]]);
               }
                
            }
            for($j = 0; $j < count($points) ; $j++){
                LeadPoint::create(['owner'=>$leaderBoard->id,'point'=>$points[$j]]);
            }
            flash("Data Updated Successfully")->success();
            return redirect()->route('eventee.leaderSetting',$id);
        }

    }

    public function DeletePoint(Request $req){
        $leadpoint = LeadPoint::findOrFail($req->id);
        if($leadpoint->delete()){
            return response()->json(['code'=>200,"message"=>"Point Have Been Deleted"]);
        }
        else{
            return response()->json(['code'=>500,"message"=>"Oops!Something Went Wrong"]);
        }
        
    }
    public function FileExcel($id,Excel $excel){
        
        return $excel->download(new LeaderboardExport($id),'leaderboardList.xlsx');
    }
}

<?php

namespace App\Http\Controllers\Eventee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Leaderboard;
use App\Image;
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
        $leaderBoard =new Leaderboard;
        $leaderBoard->color = $color;
        $leaderBoard->event_id = $id;
        if($leaderBoard->save()){
            for($i = 0; $i < count($img) ;$i++){
                Image::create(['owner'=>$leaderBoard->id,'title'=>"lead_setting",'url'=>$img[$i]]);
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

    }
}

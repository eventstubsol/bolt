<?php

namespace App\Http\Controllers\Eventee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserReportController extends Controller
{
    //
    public function index($id){
        $users = User::where('event_id',$id)->get();
        return view('eventee.user_report.index',compact('id','users'));
    }

    public function graph(Request $req){
        $user_id = $req->user_id;
        
        $start_date = $req->start_date;
        $event_id = $req->event_id;
        $end_date = $req->end_date;
        $user_name = User::findOrFail($user_id)->name;
        $reportData = DB::SELECT("SELECT * FROM `user_locations` where user_id = ? and event_id = ? and date(created_at) BETWEEN ? and ?",[$user_id,$event_id,$start_date,$end_date]);
        $report = [];
        foreach($reportData as $data){
            $fetchData = new \stdClass();
            $fetchData->section = $data->type;
            $fetchData->location = $data->type_location;
            $fetchData->timeScape = Carbon::parse($data->created_at)->format("H:i:s");
            $fetchData->endScape = Carbon::parse($data->updated_at)->format("H:i:s");
            array_push($report,$fetchData);
        }
        if(count($reportData)> 0){
            return response()->json(['code'=>200,'name'=>$user_name,"report"=>$report]);
        }
        else{
            return response()->json(['code'=>201]);
        }
    }
}

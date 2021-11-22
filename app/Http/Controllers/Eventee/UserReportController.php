<?php

namespace App\Http\Controllers\Eventee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\UserLocation;
use Excel;
use App\Exports\UserReport as ExportsUserReport;

class UserReportController extends Controller
{
    //
    public function index($id){
        $users = User::where('event_id',$id)->get();
        return view('eventee.user_report.index',compact('id','users'));
    }

    public function graph(Request $req){
        $user_id = $req->user_id;
        
        $start_date = Carbon::parse($req->start_date);
        $start = $req->start_date;
        $end = $req->end_date;
        $event_id = $req->event_id;
        $end_date = Carbon::parse($req->end_date);
        $user_name = User::findOrFail($user_id)->name;
        // $reportData = DB::table('user_locations')
        //             ->where('user_id',$user_id)
        //             ->where('event_id',$event_id)
        //             ->whereBetween(DB::raw('date(created_at)'),[$start,$end])
        //             ->select(DB::raw('GROUP_CONCAT(type) as type ,GROUP_CONCAT(type_location) as type_location,GROUP_CONCAT(time(created_at)) as created_on,GROUP_CONCAT(time(updated_at)) as updated_at,date(created_at) as created_at'))
        //             ->groupBy(DB::raw('date(created_at)'))
        //             ->get();

        $reportData = UserLocation::where('event_id',$event_id)->where('user_id',$user_id)
        ->whereBetween(DB::raw('date(created_at)'),[$start,$end])
        
        ->get();
        // return $reportData;
        $final = [];
        foreach($reportData as $rep){
            $date = Carbon::parse($rep->created_at)->format('d-m-Y');
            if(!isset($final[$date])){
                $final[$date] = [];
            } 
            array_push($final[$date],$rep); 

        }
        // foreach($reportData as $report){
        //     array_push($created_at,explode (",", $report->created_at));
        //     array_push($type,explode (",", $report->type));
        //     array_push($location,explode (",", $report->type_location)); 
        //     array_push($updated_at,explode (",", $report->updated_at)); 
        //     array_push($created_on,explode (",", $report->created_on));  
        // }
    
     
        $diff = $start_date->diffInDays($end_date);

        if($diff > 7){
            return response()->json(['code'=>202]);
        }
        if(count($reportData)> 0){
            return response()->json(['code'=>200,'report'=>$final]);
        }
        else{
            return response()->json(['code'=>201]);
        }
    }

    public function ExcelReport(Request $req){
       $report = $req->report;
       return new ExportsUserReport($report);
           
    }


}

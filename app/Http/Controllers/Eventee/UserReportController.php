<?php

namespace App\Http\Controllers\Eventee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\UserLocation;
use App\Exports\FromViewReport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UserReport as ExportsUserReport;
use Maatwebsite\Excel\Facades\Excel as FacadesExcel;
use App\Exports\RoomReport;
use App\sessionRooms;
use App\Page;
use App\Booth;

class UserReportController extends Controller
{
    //
    public function index($id){
        $users = User::where('event_id',$id)->get();
        return view('eventee.user_report.index',compact('id','users'));
    }

    public function graph(Request $req){
        if(empty($req->start_date)){
            return response()->json(['code'=>203]);
        }
        elseif(empty($req->end_date)){
            return response()->json(['code'=>203]);
        }
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

    public function ExcelReport(Request $req,$id){
        $user_id = $req->user_id;
        $start = Carbon::parse($req->start)->format('Y-m-d');
        // return $start;
        $end = Carbon::parse($req->end)->format('Y-m-d');
        $event_id = $req->event_id;
        $reportData = UserLocation::where('event_id',$event_id)->where('user_id',$user_id)
        ->whereBetween(DB::raw('date(created_at)'),[$start,$end])
        ->get();  
        $final = [];
        foreach($reportData as $rep){
            $date = Carbon::parse($rep->created_at)->format('d-m-Y');
            if(!isset($final[$date])){
                $final[$date] = [];
            } 
            array_push($final[$date],$rep); 

        }
        // return $final;
        // return view('downloads.excel')->with([
        //     'reports' => $final,
        // ]);
    
        return Excel::download(new FromViewReport($final),'UserReport.xlsx');
    }

    public function RoomReport($id){
        $pages = Page::where('event_id',$id)->get();
        $rooms = sessionRooms::where('event_id',$id)->get();
        $booths = Booth::where('event_id',$id)->get();
        return view('eventee.user_report.locReport',compact('id','booths','pages','rooms'));
    }

    public function RoomReportGet(Request $req){
        $location = $req->location;
        $locationType = $req->locationType;
        $event_id = $req->event_id;
        $start_date = $req->start_date;
        $end_date = $req->end_date;
        $final = [];
        if($location == 'lobby'){
            $reportData = UserLocation::where('user_locations.event_id',$event_id)->where('user_locations.type',$location)
            ->whereBetween(DB::raw('date(user_locations.created_at)'),[$start_date,$end_date])
            ->join('users','users.id', '=','user_locations.user_id')
            ->select(DB::RAW("user_locations.created_at,users.name,users.email,user_locations.updated_at,user_locations.type,user_locations.type_location"))
            ->get(); 
            foreach($reportData as $rep){
                $date = Carbon::parse($rep->created_at)->format('d-m-Y');
                if(!isset($final[$date])){
                    $final[$date] = [];
                } 
                array_push($final[$date],$rep); 
    
            }
        }
        else{
            $reportData = UserLocation::where('user_locations.event_id',$event_id)->where('user_locations.type_location',$locationType)
            ->whereBetween(DB::raw('date(user_locations.created_at)'),[$start_date,$end_date])
            ->join('users','users.id', '=','user_locations.user_id')
            ->select(DB::RAW("user_locations.created_at,users.name,users.email,user_locations.updated_at,user_locations.type,user_locations.type_location"))
            ->get(); 
            foreach($reportData as $rep){
                $date = Carbon::parse($rep->created_at)->format('d-m-Y');
                if(!isset($final[$date])){
                    $final[$date] = [];
                } 
                array_push($final[$date],$rep); 
    
            }
        }
        if(count($final)> 0){
            return response()->json(['code'=>200,'report'=>$final]);
        }
        else{
            return response()->json(['code'=>201,'message'=>"No Data Available"]);
        }
    }

    public function ExcelRoomReport(Request $req,$id){
        $location = $req->location;
        $locationType = $req->locationType;
        $start_date = Carbon::parse($req->start)->format('Y-m-d');
        // return $start;
        $end_date = Carbon::parse($req->end)->format('Y-m-d');
        $event_id = $req->event_id;
        $final = [];
        if($location == 'lobby'){
            $reportData = UserLocation::where('user_locations.event_id',$event_id)->where('user_locations.type',$location)
            ->whereBetween(DB::raw('date(user_locations.created_at)'),[$start_date,$end_date])
            ->join('users','users.id', '=','user_locations.user_id')
            ->select(DB::RAW("user_locations.created_at,users.name,users.email,user_locations.updated_at,user_locations.type,user_locations.type_location"))
            ->get(); 
            foreach($reportData as $rep){
                $date = Carbon::parse($rep->created_at)->format('d-m-Y');
                if(!isset($final[$date])){
                    $final[$date] = [];
                } 
                array_push($final[$date],$rep); 
    
            }
        }
        else{
            $reportData = UserLocation::where('user_locations.event_id',$event_id)->where('user_locations.type_location',$locationType)
            ->whereBetween(DB::raw('date(user_locations.created_at)'),[$start_date,$end_date])
            ->join('users','users.id', '=','user_locations.user_id')
            ->select(DB::RAW("user_locations.created_at,users.name,users.email,user_locations.updated_at,user_locations.type,user_locations.type_location"))
            ->get(); 
            foreach($reportData as $rep){
                $date = Carbon::parse($rep->created_at)->format('d-m-Y');
                if(!isset($final[$date])){
                    $final[$date] = [];
                } 
                array_push($final[$date],$rep); 
    
            }
        }
        if($location == 'lobby'){
            return Excel::download(new RoomReport($final,$location,$locationType),'LobbyReport'.$start_date.' to '.$end_date.'.xlsx');
        }
        else{
            return Excel::download(new RoomReport($final,$location,$locationType),$locationType.$start_date.' to '.$end_date.'.xlsx');
        }
    }
}

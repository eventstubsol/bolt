<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserLocation;
use Illuminate\Support\Facades\DB;
use App\Booth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class LocationController extends Controller
{
    //
    public function setLocation(Request $req){
        $type = $req->type;
        $typeloc = $req->typeloc;
        // return($type);
        switch($type){
            case 'lobby':
                UserLocation::where('user_id',Auth::id())->where('current_status',1)->update(['current_status'=>0]);
                // DB::UPDATE("UPDATE user_locations SET current_status = ? WHERE user_id = ?",[0,Auth::id()]);
                $user = UserLocation::create(['type'=>$type,'type_location'=>null,'user_id'=>Auth::id(),'current_status'=>1,'event_id'=>Auth::user()->event_id]);
                
                return response()->json(['code'=>200]);
                break;
            case 'Leaderboard':
                UserLocation::where('user_id',Auth::id())->where('current_status',1)->update(['current_status'=>0]);
                $user = UserLocation::create(['type'=>$type,'type_location'=>null,'user_id'=>Auth::id(),'current_status'=>1,'event_id'=>Auth::user()->event_id]);
                return response()->json(['code'=>200]);
                break;
            case 'Booth':
                // return $typeloc;
                UserLocation::where('user_id',Auth::id())->where('current_status',1)->update(['current_status'=>0]);
                $booth = Booth::findOrFail($typeloc);
                $user = UserLocation::create(['type'=>$type,'type_location'=>$booth->name,'user_id'=>Auth::id(),'current_status'=>1,'event_id'=>Auth::user()->event_id]);
                return response()->json(['code'=>200]);
                break;
            case 'Sessionroom':
                UserLocation::where('user_id',Auth::id())->where('current_status',1)->update(['current_status'=>0]);
                $user = UserLocation::create(['type'=>$type,'type_location'=>$typeloc,'user_id'=>Auth::id(),'current_status'=>1,'event_id'=>Auth::user()->event_id]);
                return response()->json(['code'=>200]);
                break;
            case 'page':
                UserLocation::where('user_id',Auth::id())->where('current_status',1)->update(['current_status'=>0]);
                $user = UserLocation::create(['type'=>$type,'type_location'=>$typeloc,'user_id'=>Auth::id(),'current_status'=>1,'event_id'=>Auth::user()->event_id]);
                return response()->json(['code'=>200]);
                break;
            case "Lounge":
                UserLocation::where('user_id',Auth::id())->where('current_status',1)->update(['current_status'=>0]);
                $user = UserLocation::create(['type'=>$type,'type_location'=>null,'user_id'=>Auth::id(),'current_status'=>1,'event_id'=>Auth::user()->event_id]);
                return response()->json(['code'=>200]);
                break;
            case "Attendees":
                UserLocation::where('user_id',Auth::id())->where('current_status',1)->update(['current_status'=>0]);
                $user = UserLocation::create(['type'=>$type,'type_location'=>null,'user_id'=>Auth::id(),'current_status'=>1,'event_id'=>Auth::user()->event_id]);
                return response()->json(['code'=>200]);
                break;
        }

    }
}

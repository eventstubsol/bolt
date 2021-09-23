<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Announcement;
use App\AnnouncementSeen;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use stdClass;
use App\User;
use PDO;

class UserAnnounceController extends Controller
{
    //
    public function Seen(Request $req)
    {
        $announce = new AnnouncementSeen;
        $announce->user_id = Auth::id();
        $announce->announcement_id = $req->id;
        if ($announce->save()) {
            return response()->json(['status' => 200, 'message' => 'Notification Seen']);
        } else {
            return response()->json(['status' => 500, 'message' => 'Something Went Wrong']);
        }
    }

    public function PopUp($id)
    {
        $announcements = Announcement::where('user_id', 'all')->orWhere('user_id', Auth::id())
        ->where('event_id',decrypt($id))
        ->orderBy('id', 'desc')
        ->get();
        $announce = [];
        $count = 0;
        foreach ($announcements as $announcement) {
            $seenStat = AnnouncementSeen::where('announcement_id', $announcement->id)->where('user_id', Auth::id())->count();
            if ($seenStat < 1) {
                $ann = new \stdClass();
                $ann->id = $announcement->id;
                $ann->subject = $announcement->subject;
                $ann->announce = $announcement->annoucement;
                $ann->count = $count;
                if ($announcement->user_id == 'all') {
                    $ann->user = 'all';
                } else {
                    $user = User::findOrFail($announcement->user_id);
                    $ann->user = $user->name;
                }
                array_push($announce,$ann);
            }
            else{
                $announce = null;
            }
            $count++;
        }
        return response()->json($announce);
    }

    public function Close(Request $req){
       
        $announce = Announcement::where('user_id','all')->orWhere('user_id',Auth::id())->get();
        $count = $req->id;
        $setCount = 1;
        foreach($announce as $anno){
                $ann = new AnnouncementSeen;
                $ann->user_id = Auth::id();
                $ann->announcement_id = $anno->id;
                if($ann->save()){
                    $setCount++;
                }
            
        }
        if($setCount == $count){
            return response()->json(['status'=>200,'message'=>'success']);
        }
    
        else{
            return response()->json(['status'=>500,'message'=>'Failed']);
        }
        
    }
}

<?php


namespace App\Http\Controllers\Eventee;

use App\Event;
use App\Http\Controllers\Controller;
use App\NetworkingTable;
use App\Participant;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;


class LoungeController extends Controller
{
    public function index($id)
    {
        $tables = NetworkingTable::where("event_id",decrypt($id))->get();
        return view("eventee.lounge.list")->with(compact(["tables","id"]));
    }
    public function create($id)
    {
        return view("eventee.lounge.createForm")->with(compact(["id"]));
    }

    public function store(Request $request,$id)
    {
        NetworkingTable::create([
            "name"=>$request->name,
            "seats"=>$request->seats,
            "meeting_id"=>$request->meetingId,
            "event_id"=>decrypt($id)
        ]);
        // dd("done");
        return redirect(route("eventee.lounge.index",$id));
        // dd($request->all());
    }


    public function edit(NetworkingTable $table,$id)
    {
        return view("eventee.lounge.edit")->with(compact(["table","id"]));
    }


    public function update(Request $request,NetworkingTable $table,$id)
    {
        // dd($request->all());
        $table->update([
            "name"=>$request->name,
            "seats"=>$request->seats
        ]);
        return redirect(route("eventee.lounge.index",$id));
    }
    public function appParticipant(Request $request,$subdomain,NetworkingTable $table, $user)
    {
        $participant = Participant::where("table_id",$table->id)->where("user_id",$user)->first();
        if($participant){
            $participant->update(["user_id"=>$user,"updated_at"=>Carbon::now()]);
        }else{
            $table->participants()->create([
                "user_id"=>$user
            ]);
        }
        return true;
    }
    public function removeParticipant(Request $request,$subdomain,NetworkingTable $table, $user)
    {
        Participant::where(["table_id"=>$table->id,"user_id"=>$user])->delete();
        return true;
    }

    public function updateLounge($subdomain)
    {
        $event = Event::where("slug",$subdomain)->first();
        Participant::where("updated_at", '<=', Carbon::now()->subtract('30','seconds'))->delete();

        $tables =  NetworkingTable::where("event_id",$event->id)->get();
        
        $tables->load(["participants.user"]);

        
        return view("event.modules.loungeTables")->with(compact("tables"));
    }
//     public function updateLounge($subdomain)
//     {
//         $event = Event::where("slug",$subdomain)->first();
//         Participant::where("updated_at", '<=', Carbon::now()->subtract('30','seconds'))->delete();

//         $tables =  NetworkingTable::where("event_id",$event->id)->get();
        
//         $tables->load(["participants.user"]);
//         // dd($tables)

//         // foreach($tables as $i=> $table){
//         //     $participants = [];
//         //     foreach($table->participants as $participant){
//         //         array_push($participants,$participant->user);
//         //     }
//         //     // $tables[$i]->participantss = $participants;
//         //     $tables[$i]->participants = [];
//         // }

//         $html = <<<HTML
//             <div class="lounge_container">
// HTML; 




//         foreach($tables as $i=>$table){

//             $avs = $table->availableSeats();
//             $html = $html . <<<HTML
//                         <div class="table_container">
//                             <a class="lounge_meeting"   data-toggle="modal" data-table="$table->id" data-target="#lounge_modal"  data-meeting="$table->meeting_id">$table->name</a>
//                             <span> Total Seats: $table->seats</span>
//                             <span> Available Seats: $avs</span>
//                             <ul>
//                     HTML;
//             $participants = $table->participants()->get()->load(["user"]);
//             for($i = 0;$i<$table->seats ;$i++){
//                 $participant = isset($participants[$i])?$participants[$i]:null;
//                 $n = $i+1;
//                 if($participant!==null){

//                 $name = $participant->user->name." ".$participant->user->last_name;
//                 $src = $participant->user->profileImage? assetUrl($participant->user->profileImage):null;
//                 $html = $html . <<<HTML
//                             <div>                 
//                         HTML;           
//                 if($src){
//                     $html = $html . <<<HTML
//                         <img width="30" class="profile_image" src="$src">                    
//                     HTML;           
//                 }
//                 $html = $html . <<<HTML
//                                     $name
//                                 </div>     
//                         HTML;           
//                 }else{
//                     $html = $html . <<<HTML
//                     <div> Seat $n  </div>               
//                 HTML;     
//                 }

//             }
//             $html = $html . <<<HTML
//                             </ul>
//                         </div>
//                     HTML;
//         }

//         $html = $html . <<<HTML
//         </div>
// HTML;

    
//     return $html;
//     }






    public function destroy(NetworkingTable $table)
    {
        dd($table);
        $table->delete();
        return true;
    }

}

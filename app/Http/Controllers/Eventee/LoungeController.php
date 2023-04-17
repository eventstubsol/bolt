<?php

namespace App\Http\Controllers\Eventee;

use App\Event;
use App\Http\Controllers\Controller;
use App\NetworkingTable;
use App\Participant;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\LoungeFormRequest;

class LoungeController extends Controller
{
    public function index($id)
    {
        $tables = NetworkingTable::where("event_id", $id)->orderBy('seats', 'asc')->get();
        return view("eventee.lounge.list", compact("tables", "id"));
    }

    public function create($id)
    {
        return view("eventee.lounge.createForm", compact("id"));
    }

    public function store($id, Request $request)
    {
        $network = NetworkingTable::create([
            "name" => $request->name,
            "seats" => $request->seats,
            "meeting_id" => $request->meetingId,
            "event_id" => $id,
            "logo" => $request->logo_url ?? null,
        ]);
        return redirect(route("eventee.lounge.index", $id));
    }

    public function edit(NetworkingTable $table, $id)
    {
        return view("eventee.lounge.edit", compact("table", "id"));
    }

    public function update(Request $request, NetworkingTable $table, $id)
    {
        $table->name = $request->name;
        $table->seats = $request->seats;
        if ($request->has('logo_url')) {
            $table->logo = $request->logo_url;
        }
        $table->save();
        return redirect(route("eventee.lounge.index", $id));
    }

    public function appParticipant(Request $request, $subdomain, NetworkingTable $table, $user)
    {
        $participant = Participant::where("table_id", $table->id)->where("user_id", $user)->first();
        if ($participant) {
            $participant->update(["user_id" => $user, "updated_at" => Carbon::now("UTC")]);
        } else {
            $table->participants()->create([
                "user_id" => $user
            ]);
        }
        return true;
    }

    public function removeParticipant(Request $request, $subdomain, NetworkingTable $table, $user)
    {
        Participant::where(["table_id" => $table->id, "user_id" => $user])->delete();
        return true;
    }

    public function updateLounge($subdomain)
    {
        $event = Event::where("slug", $subdomain)->first();
        Participant::where("updated_at", '<=', Carbon::now("UTC")->subtract('30', 'seconds'))->delete();

        $tables =  NetworkingTable::where("event_id", $event->id)->orderBy('seats', 'asc')->with('participants.user')->get();
        
        return view("event.modules.loungeTables", compact("tables"));
    }
}

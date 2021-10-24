<?php

namespace App\Http\Controllers\Eventee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Prize;
use App\Image;
use Illuminate\Support\Facades\Log;
use App\User;

class PrizeController extends Controller
{
    //
    public function index($id)
    {
        $prizes = Prize::where('event_id', ($id))->get();
        return view("eventee.prize.list")
            ->with(compact("prizes","id"));
    }


    //prize create form
    public function create($id)
    {
        return view("eventee.prize.create",compact("id"));
    }

    //Create new prize instance
    public function store(Request $request,$id)
    {
        $request->validate([
            "title" => "required",
            "description" => "required",
            "criteria_high" => "required",
            "criteria_low" => "required",
        ]);
        if ($request->criteria_high < $request->criteria_low) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors([
                    "criteria" => "Criteria high should always be higher or equal to criteria low."
                ]);
        }
        $prize = Prize::create([
            "title" => $request->title,
            "description" => $request->description,
            "criteria_high" => $request->criteria_high,
            "criteria_low" => $request->criteria_low,
            "event_id" =>  ($id),
        ]);
        Image::where("owner", $prize->id)->delete();
        if (!empty($request->imageurl)) {
            foreach ($request->imageurl as $image) {
                if (!empty(trim($image))) {
                    Image::create([
                        "owner" => $prize->id,
                        "title" => $request->title,
                        "url" => $image,
                    ]);
                }
            }
        }
        flash("Prize Saved Successfully")->success();
        return redirect()->to(route("eventee.prize.list",$id));
    }

    //Show edit form
    public function edit($id,$prize_id)
    {
        try
            { 
                
                $prize = Prize::findOrFail($prize_id);
                $prize->load("images");

                return view("eventee.prize.edit")
                    ->with(compact("prize","id"));
                }
        catch(\Exception $e){
            Log::error($e->getMessage());
        }
    }

    //Update prize Instance
    public function update($id,Request $request, $prize_id)
    {
        $request->validate([
            "title" => "required",
            "description" => "required",
            "criteria_high" => "required",
            "criteria_low" => "required",
        ]);
        if ($request->criteria_high < $request->criteria_low) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors([
                    "criteria" => "Criteria high should always be higher or equal to criteria low."
                ]);
        }
        $prize = Prize::findOrFail($prize_id);
        $prize->update([
            "title" => $request->title,
            "description" => $request->description,
            "criteria_high" => $request->criteria_high,
            "criteria_low" => $request->criteria_low,
        ]);
        Image::where("owner", $prize->id)->delete();
        foreach ($request->imageurl as $image) {
            Image::create([
                "owner" => $prize->id,
                "title" => $request->title,
                "url" => $image,
            ]);
        }
        return redirect()->to(route("eventee.prize.list",$id));
    }

    //Delete prize
    public function destroy(Prize $prize)
    {
        $prize->delete();
        Image::where("owner", $prize->id)->delete();
        flash("Prize Update Successfully")->success();
        return redirect()->to(route("prize.index"));
    }

    public function distributePrize()
    {
        $users = User::orderBy("points", "DESC")
            ->where('email', '!=', NULL)
            ->limit((int)env("LEADERBOARD_LIMIT"))
            ->select(["email", "name", "points"])
            ->get();
        $prizes = Prize::with("images")->get();

        $users->map(function ($user, $idx) use ($prizes) {
            $tmpPrizes = array();
            $user->idx = $idx + 1;

            foreach ($prizes as $prize) {
                if ($user->idx >= $prize->criteria_low && $user->idx <= $prize->criteria_high) {
                    array_push($tmpPrizes, [
                        [
                            "title" => $prize->title,
                            "description" => $prize->description,
                            "image" => $prize->images
                        ]
                    ]);
                }
            }

            $user->prizes = $tmpPrizes;
        });

        foreach ($users as $user) {
            if (count($user->prizes) == 0) {
                sendMail("d-ac6e21f9736142e3ae5a84b663872337", $user->email, [
                    "user" => $user->name,
                    "prizes" => $user->prizes
                ]);
            }
        }
        return redirect()->route("prize.index");
    }
}

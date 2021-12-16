<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\Support\Responsable;

class LeaderboardExport implements FromCollection, Responsable
{
    /**
     * 
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

    private $fileName = 'leaderboardList.xlsx';


    public function __construct($id)
    {
        $this->id = $id;
    }
    public function collection()
    {
        return User::orderBy("points", "desc")
        ->where("points", ">", 0)
        ->where('event_id',$this->id)
        ->limit(10)
        ->get(["name", "points", "last_name"])
        ->map(function ($user) {
            return [
                $user->name . " " . $user->last_name,
                $user->points
            ];
        });
    }
}

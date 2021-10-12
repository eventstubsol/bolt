<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NetworkingTable extends Model
{
    use SoftDeletes;
    public $incrementing = false;


    public function participants(){
        return $this->hasMany("\App\Participant", "table_id");
    }

    public function availableSeats()
    {

        return $this->seats - $this->participants()->count();
    }

    //For mass assignment whitelisting
    protected $guarded = [
        "id",
    ];
}

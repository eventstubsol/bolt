<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\License;
class Event extends Model
{
    //

    protected $guarded = [];

    public function pages(){
        $this->hasMany("\App\Page","event_id");
    }

    public function licese(){
        $this->hasOne(License::class);
    }
}

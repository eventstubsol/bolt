<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventSpeaker extends Model
{
    //
    protected $guarded = [];

    public function session(){
        return $this->belongsTo('App\EventSession');
    }
}

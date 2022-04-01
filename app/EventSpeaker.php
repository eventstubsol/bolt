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
    public function user(){
        return $this->belongsTo("App\User")->select([
            "id",
            "name",
            "last_name"]);
    }
}

<?php

namespace App;


use Carbon\Carbon;
use Carbon\CarbonTimeZone;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    //
    use SoftDeletes;

    protected $guarded = [];
    public function post(){
        return $this->belongsTo("\App\Post");
    }
    public function user(){
        return $this->belongsTo("\App\User");
    }
    public function getCreatedAtAttribute($value){
        $tz = Event::findorfail($this->event_id)->timezone;
        $time = (new Carbon($value,"UTC"))->setTimezone(new CarbonTimeZone($tz))->diffForHumans('UTC');
        return $time;
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeenNotification extends Model
{
    //

    protected $guarded = [];

    public function Notification(){
        $this->belongsTo('App/PushNotification','notification');
    }

    public function user(){
        return $this->belongsTo("\App\User");
    }
}

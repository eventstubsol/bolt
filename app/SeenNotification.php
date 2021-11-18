<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeenNotification extends Model
{
    //
    protected $guarded = [];
    public function notify(){
        $this->belongsTo('App/PushNotification','notification');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeenNotification extends Model
{
    //
<<<<<<< HEAD
    protected $guarded = [];
    public function notify(){
        $this->belongsTo('App/PushNotification','notification');
    }
=======

    protected $guarded = [];

    public function Notification(){
        $this->belongsTo('App/PushNotification','notification');
    }

    public function user(){
        return $this->belongsTo("\App\User");
    }
>>>>>>> master
}

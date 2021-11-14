<?php

namespace App;


use Illuminate\Database\Eloquent\SoftDeletes;
use App\UUID;
use Illuminate\Database\Eloquent\Model;

class PushNotification extends Model
{
<<<<<<< HEAD
    
    use SoftDeletes;
    
    public $table = "push_notification";
    protected $fillable = ["title","url","message","roles",'event_id'];
=======
   
    use SoftDeletes;
    
    public $table = "push_notification";
    protected $fillable = ["title","url","message","roles"];

    public function Seen(){
        $this->hasMany('App/SeenNotification');
    }
>>>>>>> master
}
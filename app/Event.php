<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\License;
use Illuminate\Database\Eloquent\SoftDeletes;
class Event extends Model
{
    //
    use SoftDeletes;

    protected $guarded = [];

    public function pages(){
        return $this->hasMany("\App\Page","event_id");
    }

    public function licese(){
        return $this->hasOne(License::class);
    }

    

    public function loader(){
        return $this->hasOne('App\Loader');
    }

    public function users(){
        return $this->hasMany('\App\User','event_id');
    }
    public function modals(){
        return $this->hasMany('\App\Modal','event_id');
    }
    public function faqs(){
        return $this->hasMany('\App\Faq','event_id');
    }

    public function booths(){
        return $this->hasMany('\App\Booth','event_id');
    }

    public function session(){
        return $this->hasMany('\App\EventSession','event_id');
    }

    public function sessionroom(){
        return $this->hasMany('\App\sessionRooms','event_id');
    }

    public function access(){
        return $this->hasMany('\App\AccessSpecifiers','event_id');
    }

   
}

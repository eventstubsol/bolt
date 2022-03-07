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
        $this->hasMany("\App\Page","event_id");
    }

    public function licese(){
        $this->hasOne(License::class);
    }

    public function user(){
        $this->belongsTo("\App\User");
    }

    public function loader(){
        $this->hasOne('App\Loader','def_loader');
    }
}

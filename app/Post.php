<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $guarded = [];
    public function event(){
        return $this->belongsTo("\App\Event");
    }
    public function comments(){
        return $this->hasMany('\App\Comment','post_id');
    }
}

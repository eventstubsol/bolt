<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LiveQuestion extends Model
{
    //
    protected $guaeded = [];

    public function user(){
        return $this->hasMany(App\User::class);
    }

    public function answer(){
        return $this->hasMany(App\LiveAnswer::class);
    }
}

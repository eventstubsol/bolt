<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAnswer extends Model
{
    //
    protected $guarded = [];

    public function question(){
        return $this->belongsTo('App\Question');
    }
    public function user(){
        return $this->belongsTo(App\User::class);
    }
}

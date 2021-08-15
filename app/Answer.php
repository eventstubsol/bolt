<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    //
    protected $guarded = [];
    protected $fillable = ['alpha'];

    public function question(){
        $this->belongsTo('App\Question');
    }
}

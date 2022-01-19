<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LandingSpeaker extends Model
{
    //
    protected $guarded = [];
    public function Landing(){
        $this->belongsTo("App\LandingPage");
    }
}

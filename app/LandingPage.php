<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LandingPage extends Model
{
    //
    protected $guarted = [];
    public function speaker(){
        $this->hasMany("App\LandingSpeaker",'page_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    //
    public function user(){
        $this->belongsTo("App/User");
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loader extends Model
{
    //
    protected $guarded = [];
    
    public function event(){
        $this->belongsTo('App\Event','def_loader');
    }
}

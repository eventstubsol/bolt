<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AccessSpecifiers extends Model
{
    public $incrementing = false;
   
    protected $guarded = [];

    public function event(){
        $this->belongsTo('\App\Event');
    }
}

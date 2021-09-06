<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Event;


class License extends Model
{
    //
    protected $guarded = [];

    public function event(){
        $this->belongsTo(Event::class);
    }
}

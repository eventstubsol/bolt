<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Event;
use Illuminate\Database\Eloquent\SoftDeletes;


class License extends Model
{
    //
    use SoftDeletes;
    protected $guarded = [];

    public function event(){
        $this->belongsTo(Event::class);
    }
}

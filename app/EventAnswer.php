<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\UUID;
use Illuminate\Database\Eloquent\Model;

class EventAnswer extends Model
{
    use UUID;
    use SoftDeletes;

    //
    protected $guarded = [];

    public function question(){
        $this->belongsTo('App\EventQuestion');
    }
}

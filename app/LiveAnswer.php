<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LiveAnswer extends Model
{
    //
    protected $guarded = [];
    
    public function question(){
        return $this->belongsTo(App\LiveQuestion::class);
    }
}

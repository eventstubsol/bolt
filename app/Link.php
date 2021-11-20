<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Link extends Model
{
    use SoftDeletes;
    // use UUID;
    public $incrementing = false;

    public function background(){
        return $this->hasMany("\App\Image", "owner");
    }

    public function flyin(){
        return $this->hasOne("\App\Video", "owner");
    }

    //For mass assignment whitelisting
    protected $guarded = [
        "id",
    ];
}

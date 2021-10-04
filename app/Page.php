<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use SoftDeletes;
    use UUID;
    public $incrementing = false;

    //For mass assignment whitelisting
    protected $guarded = [
        "id",
    ];

    public function images(){
        return $this->hasMany("\App\Image", "owner");
    }

    public function treasures(){
        return $this->hasMany("\App\Treasure","owner");
    }

    public function links()
    {
        return $this->hasMany("\App\Link","page");
    }

}

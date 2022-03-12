<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\UUID;

class Section extends Model
{
    //
    use UUID;
    protected $guarded = [];

    public function images(){
        return $this->hasMany("\App\Image", "owner");
    }
}

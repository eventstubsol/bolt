<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\UUID;
use Illuminate\Database\Eloquent\SoftDeletes;

class sessionRooms extends Model
{
    use UUID;
    use SoftDeletes;
    public $incrementing = false;

    protected $guarded = ["id"];

    public function background(){
        return $this->hasOne("\App\Image", "owner");
    }


}

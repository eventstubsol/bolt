<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Participant extends Model
{
    use SoftDeletes;

    public $incrementing = false;

    public function user()
    {
        return $this->hasOne("\App\User","id","user_id");
    }
    //For mass assignment whitelisting
    protected $guarded = [
        "id",
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserSubtype extends Model
{
    use SoftDeletes;
    public $incrementing = false;

    protected $guarded = [];

    

}

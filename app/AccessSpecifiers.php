<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AccessSpecifiers extends Model
{
    public $incrementing = false;
    use SoftDeletes;

    protected $guarded = [];
}

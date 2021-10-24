<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AccessSpecifiers extends Model
{
    use UUID;
    public $incrementing = false;
    use SoftDeletes;

    protected $guarded = [];
}

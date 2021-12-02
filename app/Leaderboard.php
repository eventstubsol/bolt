<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\UUID;
class Leaderboard extends Model
{
    //
    use UUID;
    public $incrementing = false;
    protected $guarded = [];
    public function images(){
        $this->hasMany('App\Images','owner');
    }
}

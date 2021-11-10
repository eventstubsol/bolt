<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mails extends Model
{
    //
    protected $table = 'mails';
    protected $guarded = [];
    
    public function user(){
        $this->hasOne('App\User','sender');
    }
}

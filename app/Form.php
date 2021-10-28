<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    //
    protected $guarded = [];
    public function fields(){
       return $this->hasMany("App\FormField","form_id");
    }
}

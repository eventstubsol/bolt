<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormStruct extends Model
{
    protected $guarded = [];

    //
    public function formField(){
        $this->hasMany("App\FormField",'struct');
    }
}

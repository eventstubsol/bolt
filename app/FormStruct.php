<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormStruct extends Model
{
    //
    public function formField(){
        $this->hasMany("App\FormField",'struct');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormField extends Model
{
    //
    protected $guarded = [];
    public function formStruct(){
        $this->belongsTo("App\FormStruct",'struct');
    }
    public function form(){
        $this->belongsTo("App\Form");
    }
}

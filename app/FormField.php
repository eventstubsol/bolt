<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormField extends Model
{
    //
    protected $guarded = [];
    public function formStruct(){
        return $this->hasOne("App\FormStruct","id","struct_id");
    }
    public function form(){
       return $this->belongsTo("App\Form");
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContentMaster;

class AdminCreativeController extends Controller
{
    //
    public function index(){
        return view("creative.options");
    }

    public function store(Request $request){
        $fields = $request->except("_token");
       
        foreach ($fields as $id => $value){
            $field = ContentMaster::find($id);
            if($field){
                $field->update([ "value" => $value]);
            }
        }
        return redirect()->to(route("default.creative"));
    }
}

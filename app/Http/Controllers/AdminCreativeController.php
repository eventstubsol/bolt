<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContentMaster;
use App\Content;    


class AdminCreativeController extends Controller
{
    //
    public function index(){
        return view("creative.options");
    }

    public function store(Request $request){
        $fields = $request->except("_token");
        // dd($fields);
        foreach ($fields as $name => $value){
            // $field = ContentMaster::find($id);
            $field = Content::where('name',$name)->where('event_id',null)->first();

            if($field){
                // dd($field);
                $field->update([ "value" => $value]);
            }
        }
        return redirect()->to(route("default.creative"));
    }
}

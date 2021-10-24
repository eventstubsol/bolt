<?php

namespace App\Http\Controllers\Eventee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Content;    

class CMSController extends Controller
{
    //

    public function optionsList($id){
        return view("eventee.cms.options",compact('id'));
    }

    public function optionsUpdate(Request $request,$id){
        $fields = $request->except("_token");
        $event_id = $id;
        foreach ($fields as $id => $value){
            $field = Content::find($id);
            if($field){
                $field->update([ "value" => $value,"event_id" => $event_id ]);
            }
        }
        return redirect()->to(route("eventee.options",['id'=>$event_id]));
    }
}

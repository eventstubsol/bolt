<?php

namespace App\Http\Controllers\Eventee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Event;
use App\FormStruct;
use App\Form;
use App\FormField;
use Illuminate\Support\Facades\Log;


class FormController extends Controller
{
    //
    public function index($id){
        $forms = Form::where('event_id',decrypt($id))->paginate(5);
        return view('eventee.forms.index',compact('id','forms'));
    }

    public function create($id){
        $structsDefault = FormStruct::Where('event_id',0)
        ->get();
        $structEvent = FormStruct::Where('event_id',decrypt($id))
        ->get();
        return view('eventee.forms.create',compact('id','structsDefault','structEvent'));
    }
    public function SaveForm(Request $req){
        $form_fields = $req->fields;
        $event_id = decrypt($req->event_id);
        $event = Event::findOrFail($event_id);
        $form = new Form;
        $form->name = $event->name ." registration";
        $form->event_id = $event->id;
        if($form->save()){
            for($i = 0 ; $i < count($form_fields) ; $i++){
                $formFields = new FormField;
                $formFields->form_id = $form->id;
                $formFields->struct_id = $form_fields[$i];
                $formFields->save();
            }
            return response()->json(["message"=>"Form Saved Successfully","code"=>200]);
        }
        else{
            return response()->json(["message"=>"Oops! Something Went Wrong","code"=>500]);
        }
    }

    public function ShowPreview($id,Request $req){
       try{
        $fieldsFinal = [];
        $event_id = decrypt($id);
        $form = Form::where('event_id',$event_id)->first();
        $fields = FormField::where('form_id',$form->id)->get();
        foreach($fields as $field){
            $fieldset = new \stdClass();
            $struct = FormStruct::findOrFail($field->struct_id); 
            $fieldset->label = $struct->label;
            $fieldset->fieldName = $struct->field;
            $fieldset->type = $struct->type;
            array_push($fieldsFinal,$fieldset);
        }
        // return $fieldsFinal;
        return view('eventee.forms.preview',compact('fieldsFinal','id'));
       }
       catch(\Exception $e){
           Log::error($e->getMessage());
       }
    }

    public function Edit($id,$form_id){
        $form = Form::findOrFail($form_id);
        $form_fields = FormField::where('form_id',$form->id)->get();
        $structsDefault = FormStruct::Where('event_id',0)
        ->get();
        $structEvent = FormStruct::Where('event_id',decrypt($id))
        ->get();
        return view('eventee.forms.edit',compact('id','form_id','form','form_fields','structsDefault','structEvent'));
    }

    public function SaveField($id,Request $req){
        $field_name = str_replace(" ","_",strtolower($req->label));
        $form = new FormStruct;
        $form->label = $req->label;
        $form->type = $req->type;
        $form->event_id = decrypt($id);
        $form->field = $field_name;
        if($form->save()){
            flash("New Field Has Been Added Successfully")->success();
            return redirect()->back();
        }
        else{
            flash("Something Went Wrong")->error();
            return redirect()->back();
        }
       
    }
}

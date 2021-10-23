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
        $forms = Form::where('event_id',$id)->paginate(5);
        return view('eventee.forms.index',compact('id','forms'));
    }

    public function create($id){
        $structsDefault = FormStruct::Where('event_id',0)
        ->orWhere('event_id',-1)
        ->get();
        
        return view('eventee.forms.create',compact('id','structsDefault'));
    }
    public function SaveForm(Request $req){
        $form_fields = $req->fields;
        $event_id = decrypt($req->event_id);
        $placeholder = $req->placeholder;
        $required = $req->required;
        if(count($required) < count($placeholder)){
            while(count($required) < count($placeholder)){
                array_push($required,'0');
            }
        }
        $formDet = Form::where('event_id',$event_id)->count();
        if($formDet > 0){
            return response()->json(["message"=>"You can generate only one form at a time please the previous one to create a new Form","code"=>403]);
            // return redirect()->back();
        }
        $event = Event::findOrFail($event_id);
        $form = new Form;
        $form->name = $event->name ." registration";
        $form->event_id = $event->id;
        if($form->save()){
            for($i = 0 ; $i < count($form_fields) ; $i++){
                $formFields = new FormField;
                $formFields->form_id = $form->id;
                $formFields->required = $required[$i];
                $formFields->placeholder = $placeholder[$i];
                $formFields->struct_id = $form_fields[$i];
                $formFields->save();
            }
            return response()->json(["message"=>"Form Saved Successfully","code"=>200,"form_id"=>$form->id]);
        }
        else{
            return response()->json(["message"=>"Oops! Something Went Wrong","code"=>500]);
        }
    }

    public function ShowPreview(Request $req){
       try{
        $fieldsFinal = [];
        $event_id = decrypt($req->event_id);
        $form = Form::where('event_id',$event_id)->first();
        $fields = FormField::where('form_id',$form->id)->get();
        foreach($fields as $field){
            $fieldset = new \stdClass();
            $struct = FormStruct::findOrFail($field->struct_id); 
            $fieldset->label = $struct->label;
            $fieldset->fieldName = $struct->field;
            $fieldset->placeholder = $field->placeholder;
            $fieldset->required = $field->required;
            $fieldset->type = $struct->type;
            array_push($fieldsFinal,$fieldset);
        }
        if(count($fieldsFinal)> 0){
            return response()->json(['code'=>200,'fields'=>$fieldsFinal]);  
        }
        else{
            return response()->json(['code'=>500,'fields'=>'Something Went Wrong']);  
        }
        // return view('eventee.forms.preview',compact('fieldsFinal','id'));
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
        $structEvent = FormStruct::Where('event_id',$id)
        ->get();
        return view('eventee.forms.edit',compact('id','form_id','form','form_fields','structsDefault','structEvent'));
    }

    public function SaveField(Request $req){
        $field_name = str_replace(" ","_",strtolower($req->label));
        $form = new FormStruct;
        $form->label = $req->label;
        $form->type = $req->type;
        $form->event_id = decrypt($req->event_id);
        $form->field = $field_name;
        if($form->save()){
            return response()->json(['code'=>200]);
        }
        else{
            return response()->json(['code'=>500]);
        }
       
    }

    public function CustomField(Request $req){
        $event_id = decrypt($req->event_id);
        $structsEvent = FormStruct::Where('event_id',$event_id)
        ->get();
        if(count($structsEvent)>0){
            return response()->json(['code'=>200,'field'=>$structsEvent]);
        }
        else{
            return response()->json(['code'=>200]);
        }
    }

    public function CustomFieldSave(Request $req){
        $form_fields = $req->fields;
        // $event_id = decrypt($req->event_id);
        $form_id = $req->form_id;
        $placeholder = $req->placeholder;
        $required = $req->required;
        if(count($required) < count($placeholder)){
            while(count($required) < count($placeholder)){
                array_push($required,'0');
            }
        }
        for($i = 0 ; $i < count($form_fields) ; $i++){
            $formFields = new FormField;
            $formFields->form_id = $form_id;
            $formFields->required = $required[$i];
            $formFields->placeholder = $placeholder[$i];
            $formFields->struct_id = $form_fields[$i];
            $formFields->save();
        }
        return response()->json(['message'=>"New Fields Are Added","code"=>200]);

    }   


    public function Destroy(Request $req){
        $form = Form::findOrFail($req->form_id);
        $formFields = FormField::where('form_id',$req->form_id);
        if($formFields->delete()){
            if($form->delete()){
                return response()->json(['code'=>200]);
            }
            else{
                return response()->json(['code'=>500]);
            }

        }
    }
}

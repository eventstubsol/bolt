<?php

namespace App\Http\Controllers\Eventee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Event;
use App\FormStruct;
use App\Form;
use App\FormField;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\FormControlRequest;

class FormController extends Controller
{
    public function index($id)
    {
        $subdomain = Event::where("id",$id)->first()->slug;
        $forms = Form::where('event_id',$id)->get();
        return view('eventee.form.index',compact('id','forms',"subdomain"));
    }
    public function getForm($id,Form $form)
    {
        $form->load("fields.formStruct");
        return view("eventee.form.registration")->with(compact("id","form"));
    }
    public function create($id){
        $subdomain = Event::where("id",$id)->first()->slug;
        $structsDefault = FormStruct::Where('event_id',0)->orWhere('event_id',-1)->get();
        $form_slug = Form::where('event_id',$id)->get();
        $slugs = [];
        foreach($form_slug as $slug){
            array_push($slugs,$slug->slug);
        }
        // $structsMandats = FormStruct::Where('event_id',-1)->get();
            // dd($structsDefault);
        return view("eventee.form.createForm")->with(compact("id","structsDefault","subdomain",'slugs'));
    }
    public function edit($id,Form $form){
        $structsDefault = FormStruct::Where('event_id',0)
        ->orWhere('event_id',-1)->orWhere('event_id',$form->id)
            ->get();
            // dd($structsDefault);
        return view("eventee.form.editForm")->with(compact("id","structsDefault","form"));
    }
    public function store(FormControlRequest $request,$id){
        // dd($request->all());
        // if(empty($request->name)){
        //     flash("Name Field Cannot Be Blank")->error();
        //     return redirect()->back();
        // }
        $except = ["'" , '"' ,"/","'\'","."," "];
        $slug = str_ireplace($except,"-",strtolower($request->slug));
        $form = Form::create([
            "name"=>$request->name,
            "event_id"=>$id,
            "user_type"=>$request->usertype,
            "slug"=>$slug,
            "description"=>$request->desc,
            "disclaimer"=>$request->disclaimer
        ]);

        //Create Form Field for Enabled Default Fields
        foreach($request->defaults_enabled as $dindex){
            $form->fields()->create([
                "required"=>in_array($dindex,$request->defaults_required),
                "placeholder"=>isset($request->defaults_placeholder[$dindex])?$request->defaults_placeholder[$dindex]:$request->defaults_labels[$dindex],
                "struct_id"=>$request->defaults_struct[$dindex],
            ]);
        }


        //Create Structures for custom fields 
        if(isset($request->label)&&count($request->label)){
            foreach($request->label as $i => $label){
                if(isset($label)&& $label!=null && isset($request->type[$i]) || ($request->type[$i] === "select" && isset($request->options[$i])) ){
                    
                    $struct =  FormStruct::create([
                        "label"=>$label,
                        "field"=> strtolower(str_replace(" ","_",$label)),
                        "type"=> $request->type[$i],
                        "options"=>isset($request->options[$i])?$request->options[$i]:null,
                        "event_id"=>$id,
                        "form_id"=>$form->id
                    ]);
                    if(isset($request->enabled[$i])){
                        $form->fields()->create([
                            "required"=>isset($request->required[$i])?1:0,
                            "placeholder"=>$request->placeholder[$i],
                            "struct_id"=>$struct->id
                        ]);
                    }
                }
            }
        }
        // dd("done");
        return redirect(route("forms",$id));



        // return view("")->with(compact("id"));
    }
    public function Destroy(Request $req,Form $form){
        // $form = Form::findOrFail($req->form_id);
        $formFields = FormField::where('form_id',$form->id);
        $form->delete();
    }

    public function CheckUrl(Request $req){
        $slug =  $req->event_name;
        $id = $req->id;
        $count = Form::where('slug',$slug)->where('event_id',$id)->count();
        if($count > 0){
            return response()->json(['code'=>203,'message'=>"Link Is not Available","count"=>$count]);
        }
        else{
            return response()->json(['code'=>200,'message'=>"Link Is Available","count"=>$count]);
        }

    }
}

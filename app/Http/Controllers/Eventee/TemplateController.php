<?php

namespace App\Http\Controllers\Eventee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Template;
use App\Http\Requests\TemplateRequest;
class TemplateController extends Controller
{
    //

    public function index($id){
        $template = Template::where('event_id',$id);
        if($template->count() < 1){
            CreateTemplate($id);
        }
        return view('eventee.template.index')->with([
            'template'=>$template->first(),
            'id'=>$id
        ]);
    }

    public function store(TemplateRequest $req,$id){
        $template = Template::where('event_id',$id)->first();
        $template->subject =  $req->subject;
        $template->message = $req->message;
        if($template->save()){
            flash("Template Updated Successfully")->success();
            return redirect()->back();
        }
        else{
            flash("Data Couldnot Be Update")->error();
            return redirect()->back();
        }
    }
}

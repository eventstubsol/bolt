<?php

namespace App\Http\Controllers\Eventee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\FAQ;
use App\Event;
use App\Http\Requests\FaqFormRequest;


class FaqController extends Controller
{
    //
    public function index($id){

        $faqs = FAQ::where('event_id',$id)->orderBy('id','desc')->paginate(5);
        return view('eventee.faq.index',compact('faqs','id'));
    }
    public function create($id){
        return view('eventee.faq.create',compact('id'));
    }
    public function store($id,FaqFormRequest $req){
        // if(empty($req->question)){
        //     flash("Question Field Cannot Be Blank")->error();
        //     return redirect()->back();
        // }
        // elseif(empty($req->answer)){
        //     flash("Answer Field Cannot Be Blank")->error();
        //     return redirect()->back();
        // }
        $faq = new FAQ;
        $faq->event_id = $id;
        $faq->question = $req->question;
        $faq->answer = $req->answer;
        if($faq->save()){
            flash("NEW FAQ ADDED")->success();
            return redirect()->route('eventee.faq',$id);

        }
        else{
            flash("SOMETHING WENT WRONG")->error();
            return redirect()->back();
        }
    }

    public function edit($id,$faq_id){
        $faq = FAQ::findOrFail($faq_id);
        return view('eventee.faq.edit',compact('faq','id'));
    }

    public function delete(Request $req){
        $faq = FAQ::findOrFail($req->id);
        $faq->delete();
        return response()->json(['code'=>200,'message'=>"Done"]);
    }

    public function update($id,$faq_id,FaqFormRequest $req){
        $faq = FAQ::findOrFail($faq_id);
        $faq->event_id = $id;
        $faq->question = $req->question;
        $faq->answer = $req->answer;
        if($faq->save()){
            flash("FAQ HAS BEEN UPDATED")->success();
            return redirect()->route('eventee.faq',$id);

        }
        else{
            flash("SOMETHING WENT WRONG")->error();
            return redirect()->back();
        }
    }
}

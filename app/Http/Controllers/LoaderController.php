<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Loader;
use App\Http\Requests\LoaderRequest;

class LoaderController extends Controller
{
    //
    public function create($id){
        return view('loader.create',compact('id'));
    }

    public function store(Request $req,$id){
        $loaderUrl = $req->loader;
        $loader = new Loader;
        $loader->load_class = $loaderUrl;
        $loader->event_id = $id;
        if($loader->save()){
            flash("New Loader Has Been Added")->success();
            return redirect()->route('eventee.settings',$id);
        }
        else{
            flash("Something Went Wrong")->error();
            return redirect()->back();
        }
    }
}

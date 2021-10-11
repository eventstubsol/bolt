<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\License;

class LicenseController extends Controller
{
    //
    public function index(){
        $licenses = License::all();
        return view('license.index',compact('licenses'));
    }
    public function edit($id){
        $lincense = License::findOrFail($id);
        return view('license.edit',compact('lincense'));
    }
    public function update($id,Request $req){
        $license = License::findOrFail($id);
        $license->status = $req->status;
        if($license->save()){
            flash("Status Updated")->success();
            return redirect()->route('license.index');
        }
        else{
            flash("Something Went Wrong")->error();
            return redirect()->back();
        }
    }

}

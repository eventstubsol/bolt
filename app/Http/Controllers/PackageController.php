<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Package;


class PackageController extends Controller
{
    //
    public function index(){
        $packages = Package::all();
        return view('package.index',compact('packages'));
    }

    public function create(){
        return view('package.create');
    }

    public function store(Request $req){
        $package = new Package;
        $package->name = $req->name;
        $package->price = $req->price;
        $package->period = $req->period;
        if($package->save()){
            flash("New Package Have Been Created")->success();
            return redirect()->route('package.index');
        }
        else{
            flash("Something Went Wrong")->error();
            return redirect()->back();
        }
    }

    public function edit($id){
        $package = Package::findOrFail($id);
        return view('package.edit',compact('package'));
    }

    public function update($id,Request $req){
        $package = Package::findOrFail($id);
        $package->name = $req->name;
        $package->price = $req->price;
        $package->period = $req->period;
        if($package->save()){
            flash("Package Have Been Update")->success();
            return redirect()->route('package.index');
        }
        else{
           
        }
    }

    public function destroy($id){
        $package = Package::findOrFail($id);
        if($package->delete()){
            flash("Package Have Been Deleted Successfully")->success();
            return redirect()->route('package.index');
        }
        else{
            flash("Something Went Wrong")->error();
            return redirect()->back();
        }
    }
}

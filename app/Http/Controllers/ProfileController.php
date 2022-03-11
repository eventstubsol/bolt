<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Auth;
use App\User;


class ProfileController extends Controller
{
    public function view(){
        return view('eventee.profile.index');
    }

    public function save (Request $request){
        $id = Auth::user()->id;
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        // $user->email = $req->email;
        if($request->has('password')){
            $user->password = password_hash($request->password,PASSWORD_DEFAULT);
        }
        if($user->save()){
            flash("Profile Updated Successfully")->success();
            return redirect()->back();
        }
        else{
            flash("Something Went Wrong")->error();
            return redirect()->back();
        }
    }
}

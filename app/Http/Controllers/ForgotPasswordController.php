<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\ForgotPassword;
use App\Http\Requests\ForgotRequest;
use App\User;

class ForgotPasswordController extends Controller
{
    //

    public function view(){
        return view('eventee.forgot.index');
    }
    public function SendPasword(ForgotRequest $req){
        $email = $req->email;
        $user = User::where('email',$email)->first();
        $password = mt_rand(111111,999999);
        Mail::to($user->email)->send(new ForgotPassword($password,$user));
       
        $user->password = password_hash($password,PASSWORD_DEFAULT);
        if($user->save()){
            flash("Password is generated and sent to registered email")->success();
            return redirect()->route('Eventee.login');
        }
        
        
    }
}

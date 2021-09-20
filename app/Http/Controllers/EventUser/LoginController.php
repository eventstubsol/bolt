<?php

namespace App\Http\Controllers\EventUser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function __construct()
    {
        $this->loginT = getLoginVars();
    }
    public function login($id){
        // return decrypt($id);
        return view("eventUser.login")->with([
            "login" => $this->loginT,
            "notFound" => FALSE,
            "captchaError" => FALSE,
            "id"=>$id
        ]);
    }
}

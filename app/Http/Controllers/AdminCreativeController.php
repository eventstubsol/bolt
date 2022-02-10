<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminCreativeController extends Controller
{
    //
    public function index(){
        return view("creative.options");
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

class testController extends Controller
{
    //
    public function index(){
        return view('new-test.test');
    }

    public function test($id){
        $event = Event::findOrFail($id);

        return $event->loader()->get();
    }

}

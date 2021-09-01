<?php

namespace App\Http\Controllers\Eventee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataEntryController extends Controller
{
    //
    public function index($id){
        return view('eventee.dataEntry.index',compact("id"));
    }
}

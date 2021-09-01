<?php

namespace App\Http\Controllers\Eventee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\License;
use Illuminate\Support\Facades\Mail;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Mail\testMail;
class LicenseController extends Controller
{
    //
    public function index($id){
        $licenses = License::where('event_id',decrypt($id))->paginate(5);
        return view('eventee.license.index',compact('id','licenses'));
    }

    public function create($id){
        return view('eventee.license.create',compact('id'));
    }

    public function store($id,Request $req){
        $license = new License;
        $license->type = 'User License';
        $license->message = $req->message;
        $license->event_id = decrypt($id);
        $license->issue_date = date('Y-m-d');
        if($license->save()){
            flash("Message Sent Successfully")->success();
            return redirect()->route('eventee.license',$id);
        }
        else{
            flash("Oops! Something went wrong")->error();
            return redirect()->route('eventee.license.create',$id);
        }
    }

    public function edit($id){
        
        try{
            $user = User::findOrFail(Auth::id());
            Mail::to('swarnadeeppramanick2@gmail.com')->send(new testMail);
        }
        catch(\Exception $e){
            Log::error($e->getMessage());
            return back();
        }
        
        
    }
}

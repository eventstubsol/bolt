<?php

namespace App\Http\Controllers\Eventee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Background;
use Google\Service\BigtableAdmin\Backup;

class BackgroundController extends Controller
{
    //
    public function index($id){
        $backgrounds = Background::where('event_id', ($id))->paginate(5);
        return view('eventee.background.index',compact('id','backgrounds'));
    }

    public function create($id){
        return view('eventee.background.create',compact('id'));
    }

    public function store($id,Request $req){
        $valid = $req->validate([
            'menu' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if($valid){
            $image = $req->file('image');
            $imageName = $image->getClientOriginalName();
            $location = public_path('backgrounds');
            $image->move($location,$imageName);
            $background = new Background;
            $background->menu_id = $req->menu;
            $background->event_id =  ($id);
            $background->location = 'backgrounds'.'/'.$imageName;
            if($background->save()){
                flash('Background Image Uploaded Succesfully')->success();
                return redirect()->route('eventee.background',$id);
            }
            else{
                flash('Oops! Something Went Wrong')->error();
                return redirect()->route('eventee.background',$id);
            }
            
            
        }
    }

    public function edit($id,$back_id){
        $background = Background::findOrFail( ($back_id));
        return view('eventee.background.edit',compact('background','id','back_id'));
    }

    public function update($id,$back_id,Request $req){
        $valid = $req->validate([
            'menu' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if($valid){
            $image = $req->file('image');
            $imageName = $image->getClientOriginalName();
            $location = public_path('backgrounds');
            $image->move($location,$imageName);
            $background = Background::findOrFail( ($back_id));
            $background->menu_id = $req->menu;
            $background->event_id =  ($id);
            $background->location = 'backgrounds'.'/'.$imageName;
            if($background->save()){
                flash('Background Image Updated Succesfully')->success();
                return redirect()->route('eventee.background',$id);
            }
            else{
                flash('Oops! Something Went Wrong')->error();
                return redirect()->route('eventee.background',$id);
            }
            
            
        }
    }
}

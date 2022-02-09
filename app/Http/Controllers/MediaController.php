<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use App\Video;
use App\Http\Requests\BulkMediaRequest;

class MediaController extends Controller
{
    //
    public function index($id){
        $images = Image::where('event_id',$id)->get();
        $videoes = Video::where('event_id',$id)->get();
        // return $videoes;
        return view('eventee.media.index',compact('id','images','videoes'));
    }

    public function create($id){
        return view('eventee.media.create',compact('id'));
    }

    public function store(Request $req,$id){
        $file = $req->file("media");
        for($i = 0 ; $i < count($file) ; $i++){
            $mainFile = $file[$i];
           $path = $mainFile->store('/uploads',env("UPLOADS_FILE_DRIVER", "public"));
           $image = new Image;
           $image->title = "gallery";
           $image->owner = "gallery";
           $image->event_id = $id;
           $image->url = $path;
           $image->save();
        }
        flash("Bulk Upload Is Done Successfully")->success();
        return redirect()->route('eventee.media',$id);
    }
    public function createVideo($id){
        return view('eventee.media.videoes',compact('id'));
    }
    public function storeVideo(Request $req,$id){
        $file = $req->file("media");
        for($i = 0 ; $i < count($file) ; $i++){
            $mainFile = $file[$i];
           $path = $mainFile->store('/uploads',env("UPLOADS_FILE_DRIVER", "public"));
           $video = new Video;
           $video->title = "gallery";
           $video->owner = "gallery";
           $video->event_id = $id;
           $video->url = $path;
           $video->save();
        }
        flash("Bulk Upload Is Done Successfully")->success();
        return redirect()->route('eventee.media',$id);
    }
}

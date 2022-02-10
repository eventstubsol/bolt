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
        $fileTypes = ['jpg','jpeg','png'];
        for($i = 0 ; $i < count($file) ; $i++){
           $mainFile = $file[$i];
           if(!in_array($mainFile->getClientOriginalExtension(),$fileTypes)){
               flash("Available File Types 'jpg','jpeg','png'")->error();
               return redirect()->back();
            }
            if($mainFile->getSize() > 12288){
                flash("Max File Size Is 12 MB")->error();
                return redirect()->back();
            }
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
        $fileTypes = ['mp4','avi','webp','mkv'];
        for($i = 0 ; $i < count($file) ; $i++){
            $mainFile = $file[$i];
            $mainFile = $file[$i];
           if(!in_array($mainFile->getClientOriginalExtension(),$fileTypes)){
               flash("Available File Types 'mp4','avi','webp','mkv'")->error();
               return redirect()->back();
            }
            if($mainFile->getSize() > 12288){
                flash("Max File Size Is 12 MB")->error();
                return redirect()->back();
            }
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

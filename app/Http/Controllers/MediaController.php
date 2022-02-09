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
        $urls = array();
        
        foreach($images as $image){
            $ima = new \stdClass();
            $ima->url = $image->url;
            $ima->type = 'image';
            array_push($urls,$ima);
        }
        foreach($videoes as $video){
            // return  $video->url;
            $vid = new \stdClass();
            $vid->url = $video->url;
            $vid->type = 'video';
            array_push($urls,$vid);
        }
        // return $videoes;
        return view('eventee.media.index',compact('id','urls'));
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
}

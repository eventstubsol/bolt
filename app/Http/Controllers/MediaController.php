<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use App\Video;
use App\Booth;
use Illuminate\Support\Facades\DB;
use App\Content;
use App\Http\Requests\BulkMediaRequest;

class MediaController extends Controller
{
    //
    public function index($id){
        $images = Image::where('event_id',$id)->get("url");
        $boothUrl = DB::table("booths")->Select(DB::raw("boothurl as url"))->where('event_id',$id)->get() ;
        $contents = DB::table("contents")->Select(DB::raw("value as url"))->where('event_id',$id)->where('type','image')->get() ;
        $imageUrl = [];

        foreach($images as $image){
            $imageMain = new \stdClass();
            $imageMain->url = $image->url;
            array_push($imageUrl,$imageMain);
        }
        foreach($boothUrl as $image){
            $imageMain = new \stdClass();
            $imageMain->url = $image->url;
            array_push($imageUrl,$imageMain);
        }
        foreach($contents as $image){
            $imageMain = new \stdClass();
            $imageMain->url = $image->url;
            array_push($imageUrl,$imageMain);
        }
        $videoes = Video::where('event_id',$id)->get("url") ;
        
        $boothVid = DB::table("booths")->Select(DB::raw("vidbg_url as url"))->where('event_id',$id)->get() ;
        $contentVid =  DB::table("contents")->Select(DB::raw("value as url"))->where('event_id',$id)->where('type','video')->get() ;
        $vidUrl = [];
        foreach($videoes as $image){
            $imageMain = new \stdClass();
            $imageMain->url = $image->url;
            array_push($vidUrl,$imageMain);
        }
        foreach($boothVid as $image){
            $imageMain = new \stdClass();
            $imageMain->url = $image->url;
            array_push($vidUrl,$imageMain);
        }
        foreach($contentVid as $image){
            $imageMain = new \stdClass();
            $imageMain->url = $image->url;
            array_push($vidUrl,$imageMain);
        }
        // return $imageUrl;
        // dd($imageUrl);
        // return $videoes;
        return view('eventee.media.index',compact('id','imageUrl','vidUrl'));
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
            // if($mainFile->getSize() > 12288){
            //     flash("Max File Size Is 12 MB")->error();
            //     return redirect()->back();
            // }
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
            // if($mainFile->getSize() > 12288){
            //     flash("Max File Size Is 12 MB")->error();
            //     return redirect()->back();
            // }
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Post;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    //
    public function index($id){
        $event = Event::findOrFail($id);;
        return view('eventee.posts.index',compact('id','event'));
    }
    
    public function create($id){
        return view('eventee.posts.create',compact('id'));
    }

    public function store($id,PostRequest $req){
        $post = new Post;
        $post->title = $req->title;
        $post->event_id = $id;
        $post->body = $req->body;
        $post->vimeo_link = $req->url;
        if($post->save()){
            flash("New Post Created")->success();
            return redirect()->route('eventee.post',$id);
        }
        else{
            flash("Something Went Wrong")->error();
            return redirect()->route('eventee.post.create',$id);
        }
    }

    public function updateStatus(Request $req){
        $id= $req->id;
        $char = $req->char;
        $status = $req->status;
        $post = Post::findOrFail($id);
        switch ($char) {
            case 'vote':
             $post->vote_status = $status;
             break;
            case 'like':
                $post->like_status = $status;
                break;
            case 'rate':
                $post->rate_stat = $status;
              break;
          }
        if($post->save()){
            return response()->json(['code'=>200,'message'=>"Change Updated Successfully"]);
        }
        else{
            return response()->json(['code'=>500,'message'=>"Something Went Wrong"]);
        }
    }

    public function edit($id,$post_id){
        $post= Post::findOrFail($post_id);
        return view("eventee.posts.edit",compact('id','post'));
    }

    public function update($id,$post_id, Request $req){
        $post = Post::findOrFail($post_id);
        $post->title = $req->title;
        $post->event_id = $id;
        $post->body = $req->body;
        $post->vimeo_link = $req->url;
        if($post->save()){
            flash("Post Updated Successfully")->success();
            return redirect()->route('eventee.post',$id);
        }
        else{
            flash("Something Went Wrong")->error();
            return redirect()->route('eventee.post.edit',[
                "post_id" => $post->id,"id"=>$id
            ]);
        }

    }

    public function delete(Request $req){
        $post = Post::findOrFail($req->id);
        if($post->delete()){
            return response()->json(['code'=>200,'message'=>"Post Deleted Successfully"]);
        }
        else{
            return response()->json(['code'=>500,'message'=>"Something Went Wrong"]);
        }
    }
}

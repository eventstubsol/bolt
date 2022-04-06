<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Post;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use App\PostEmote;

use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    //
    public function index($id){
        $event = Event::findOrFail($id);
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
        $post->image_url = $req->image_url;
        switch($req->type){
            case 'vote':
                $post->vote_status = true;
                $post->like_status = false;
                $post->rate_stat = false;
                break;
            case 'like':
                $post->vote_status = false;
                $post->like_status = true;
                $post->rate_stat = false;
                break;
            case 'rate':
                $post->vote_status = false;
                $post->like_status = false;
                $post->rate_stat = true;
                break;
        }
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

    public function update($id,$post_id, PostRequest $req){
        $post = Post::findOrFail($post_id);
        $post->title = $req->title;
        $post->event_id = $id;
        $post->body = $req->body;
        $post->vimeo_link = $req->url;
        $post->image_url = $req->image_url;
        switch($req->type){
            case 'vote':
                $post->vote_status = true;
                $post->like_status = false;
                $post->rate_stat = false;
                break;
            case 'like':
                $post->vote_status = false;
                $post->like_status = true;
                $post->rate_stat = false;
                break;
            case 'rate':
                $post->vote_status = false;
                $post->like_status = false;
                $post->rate_stat = true;
                break;
        }
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

    public function addComment($id,Post $post, Request $req){
        $user_id = Auth::user()->id;
        // return $post->id;
        $post->comments()->create([
            // "post_id"=>$post->id,
            "comment"=>$req->message,
            "user_id"=>$user_id,
            "event_id"=>$id
        ]);
        return true;
    }
    public function approveComment($id,Comment $comment,Request $req){
        if( Auth::user()->type === 'eventee')
        {
            $comment->approved = 1;
            $comment->save();
            flash("Comment Approved")->success();
            return redirect()->back(); 
        }else{
            return ["success"=>false,"message"=>"Unauthorized"];
        }
    }
    public function rejectComment($id,Comment $comment,Request $req){
        if( Auth::user()->type === 'eventee')
        {
            $comment->approved = -1;
            $comment->save();
            flash("Comment Rejected")->success();
            return redirect()->back(); 
        }else{
            return ["success"=>false,"message"=>"Unauthorized"];
        }
    }

    public function allComments($id){
       $comments =  Comment::where("event_id",$id)->where("approved",0)->with(["post","user"])->get();
       return view("eventee.posts.comments",compact('id','comments'));
    }
    public function approvedComments($id){
       $comments =  Comment::where("event_id",$id)->where("approved",1)->with(["post","user"])->get();
       return view("eventee.posts.approved",compact('id','comments'));
    }
    public function rejectedComments($id){
       $comments =  Comment::where("event_id",$id)->where("approved",-1)->with(["post","user"])->get();
       return view("eventee.posts.rejected",compact('id','comments'));
    }
    public function analytics($id,Post $post){
       $comments =  Comment::where("event_id",$id)->where("approved",0)->with(["post","user"])->get();
       $postEmotes = PostEmote::where('post_id',$post->id)->get()->load("user");
       $totalLikes = PostEmote::where('emote','like')->where('post_id',$post->id)->count();
       $totalhearts = PostEmote::where('emote','love')->where('post_id',$post->id)->count();
       $totalUpvotes = PostEmote::where('vote','upvote')->where('post_id',$post->id)->count();
       $totalDvotes = PostEmote::where('vote','downvote')->where('post_id',$post->id)->count();
       
       return view("eventee.posts.analytics",compact('id','comments','post','postEmotes','totalLikes','totalhearts','totalUpvotes','totalDvotes'));
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

    public function addEmote(Request $req){
        $id = $req->id;
        $emote = $req->emote;
        $user_id = Auth::id();
        if($emote == 'unlike' || $emote == 'unlove'){
            if(PostEmote::where('post_id',$id)->where('user_id',$user_id)->delete()){
                $postLikes = PostEmote::where('emote','like')->where('post_id',$id)->count();
                $postLoves = PostEmote::where('emote','love')->where('post_id',$id)->count();
                return response()->json(['code'=>200,"message"=> "Your Emote is Saved",'likes'=>$postLikes,'loves'=>$postLoves]);
            }
            else{
                return response()->json(['code'=>500,"message"=> "Something Went wrong"]);
            }
        }
        else{
            $post = PostEmote::updateOrCreate(['post_id'=>$id,'user_id'=>$user_id],['emote'=>$emote,'rate'=>null]);
            if($post->save()){
                $postLikes = PostEmote::where('emote','like')->where('post_id',$id)->count();
                $postLoves = PostEmote::where('emote','love')->where('post_id',$id)->count();
                return response()->json(['code'=>200,"message"=> "Your Emote is Saved",'likes'=>$postLikes,'loves'=>$postLoves]);
            }
            else{
                return response()->json(['code'=>500,"message"=> "Something Went wrong"]);
            }
        }
        // $post = new PostEmote;
        // $post->post_id = $id;
        // $post->user_id = $user_id;
        // $post->emote = $emote;
        // $post->rate = null;
       
    }

    public function addVote(Request $req){
        $id = $req->id;
        $vote = $req->vote;
        $user_id = Auth::id();
        $post = PostEmote::updateOrCreate(['post_id'=>$id,'user_id'=>$user_id],['vote'=>$vote,'rate'=>null]);
        if($post->save()){
            $postup = PostEmote::where('vote','upvote')->where('post_id',$id)->count();
            $postdown = PostEmote::where('vote','downvote')->where('post_id',$id)->count();
            return response()->json(['code'=>200,"message"=> "Your Emote is Saved",'upvote'=>$postup,'downvote'=>$postdown]);
        }
        else{
            return response()->json(['code'=>500,"message"=> "Something Went wrong"]);
        }
    }

    public function addRate(Request $req){
        $post_id = $req->post_id;
        $rate = $req->rate;
        $user_id = Auth::id();
        $saveRate = PostEmote::updateOrCreate(['post_id'=>$post_id,'user_id'=>$user_id],['rate'=>$rate]);
        if($saveRate->save()){
            $post = Post::find($post_id);
            $avg = PostEmote::where('post_id',$post_id)->avg('rate');
            $post->rating = $avg;
            $post->save();
            return response()->json(['code'=>200,'avg'=>$avg]);
        }
        else{
            return response()->json(['code'=>500]);
        }
    }
}

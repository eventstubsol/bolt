@extends("layouts.admin")

@section('title')
    Edit Post
@endsection

@section("styles")
@include("includes.styles.select")
    @include("includes.styles.datatables")
    @include("includes.styles.wyswyg")
    @include("includes.styles.fileUploader")
@endsection

@section("page_title")
    Edit Post
@endsection

@section("breadcrumbs")
    <li class="breadcrumb-item active"><a href="{{ route("eventee.post",$id) }}">Post</a></li>
    <li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route("eventee.post.update",[
                    "post_id" => $post->id,"id"=>$id
                ]) }}" method="post">
                    @csrf
                    
                    <div class="form-group mb-3">
                        <label for="title">Title
                            <span style="color:red">*</span>
                        </label>
                        <input autofocus maxlength="255"  value="{{ $post->title }}" type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" required/>
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="message">Description
                            <span style="color:red">*</span>
                        </label>
                        <textarea  id="summernote-basic" required name="body" class="form-control @error('message') is-invalid @enderror" maxlength="255">{{ $post->body }}</textarea>
                        @error('message')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="image-uploader" id="imgBg" >
                        <label class="mb-3" for="images">Post Image
                          <span style="color:red">*</span>
                        </label>
                        <input type="hidden" name="image_url" class="upload_input" value="{{ $post->image_url }}">
                        <input type="file" data-name="image_url" data-plugins="dropify" data-type="image" data-default-file="{{assetUrl($post->image_url)}}"  />
                    </div>
                    <div class="form-group mb-3">
                        <label for="url">Vimeo Link (<em>Optional</em> )</label>
                        <input id="url" name="url" type="url" value="{{ $post->vimeo_link }}" class="form-control @error('url') is-invalid @enderror" />
                        @error('url')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="room form-group mb-3 col-md-4">
                        <label for="to">Post Reaction Type
                            <span style="color:red">*</span>
                        </label>
                        <select class="form-control" name="type">
                            <option @if($post->like_status)  selected @endif value="like">Likes/Emojis</option>
                            <option @if($post->vote_status)  selected @endif value="vote">Votes</option>
                            <option @if($post->rate_stat)  selected @endif value="rate">Ratings</option>
                           
                        </select>
                    </div>
                    
                    <div>
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
@include("includes.scripts.select")
@include("includes.scripts.wyswyg")
@include("includes.scripts.fileUploader")


@endsection
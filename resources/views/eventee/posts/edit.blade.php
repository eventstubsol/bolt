@extends("layouts.admin")

@section('title')
    Edit Post
@endsection

@section("styles")
@include("includes.styles.select")
    @include("includes.styles.datatables")
    @include("includes.styles.wyswyg")
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
                        <label for="message">Body
                            <span style="color:red">*</span>
                        </label>
                        <textarea  id="summernote-basic" required name="body" class="form-control @error('message') is-invalid @enderror" maxlength="255">{{ $post->body }}</textarea>
                        @error('message')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
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
<script>
    function checkLocation(e){
        var location = e.value;
        switch(location){
            case 'lobby':
                $('#sessionRoom').hide();
                $('#page').hide();
                $('#booth').hide();
                break;
            case 'session_room':
                $('#sessionRoom').show();
                $('#page').hide();
                $('#booth').hide();
                break;
            case 'page':
                $('#sessionRoom').hide();
                $('#page').show();
                $('#booth').hide();
                break;
            case 'booth':
                $('#sessionRoom').hide();
                $('#page').hide();
                $('#booth').show();
                break;
        }
    }
</script>

@endsection
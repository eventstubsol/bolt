@extends("layouts.admin")

@section("page_title")
    Edit Session Room
@endsection

@section("title")
    Edit Session Room
@endsection

@section("styles")
    @include("includes.styles.fileUploader")
@endsection


@section("breadcrumbs")
    <li class="breadcrumb-item"><a href="{{ route("sessionrooms.index",['id'=>$id]) }}">Session Rooms</a></li>
    <li class="breadcrumb-item active">Edit</li>
@endsection

@section("content")

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div id="image_demo" class="im-section" style="position:relative; padding:0" >
                    @if(isset($sessionroom->background->url))
                    <img src="{{$sessionroom->background?assetUrl($sessionroom->background->url):''}}" style="min-width:100%" />
                    @else
                    <video controls autoplay src="{{$sessionroom->videoBg?assetUrl($sessionroom->videoBg->url):''}}" repeat></video>
                    @endif
                </div>
                <form action="{{ route("eventee.sessionrooms.update", [ "sessionroom" => $sessionroom->id,'id'=>$id ]) }}" method="post">
                    {{ csrf_field() }}
                    @method("PUT")
                    <div class="form-group mb-3">
                        <label for="name">Name</label>
                        <input required autofocus type="text"  id="name" value="{{$sessionroom->name}}" name="name" class="form-control   @error('name') is-invalid @enderror">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="master_room">master_room</label>
                        <input required autofocus type="text"  id="master_room" value="{{$sessionroom->master_room}}" name="master_room" class="form-control   @error('master_room') is-invalid @enderror">
                        @error('master_room')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    @if($sessionroom->bg_type == 'image' )
                        <div class="image-uploader mb-3">
                            <input type="hidden" class="upload_input" name="background"  value="{{$sessionroom->background->url??''}}">
                            <input accept="images/*"
                                type="file"
                                data-name="background"
                                data-plugins="dropify"
                                data-default-file={{assetUrl($sessionroom->background->url??"")}}
                                data-type="image"/>
                        </div>
                    @else
                        <div class="image-uploader" id="vidBg">
                            <label class="mb-3" for="images">Background Video</label>
                            <input type="hidden" name="video_url" class="upload_input" value="{{$sessionroom->videoBg?$sessionroom->videoBg->url:''}}">
                            <input type="file" data-name="video_url" data-plugins="dropify" data-type="video" data-default-file="{{$sessionroom->videoBg?assetUrl($sessionroom->videoBg->url):''}}" />
                        </div>
                    @endif

                    <div>
                        <input class="btn btn-primary" type="submit" value="Save" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section("scripts")
@include("includes.scripts.fileUploader")
@endsection
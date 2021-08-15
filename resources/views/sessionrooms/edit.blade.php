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
    <li class="breadcrumb-item"><a href="{{ route("sessionrooms.index") }}">Session Rooms</a></li>
    <li class="breadcrumb-item active">Edit</li>
@endsection

@section("content")

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route("sessionrooms.update", [ "sessionroom" => $sessionroom->id ]) }}" method="post">
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

                    <div class="image-uploader mb-3">
                        <input type="hidden" class="upload_input" name="background"  value="{{$sessionroom->background->url??''}}">
                        <input accept="images/*"
                            type="file"
                            data-name="background"
                            data-plugins="dropify"
                            data-default-file={{assetUrl($sessionroom->background->url??"")}}
                            data-type="image"/>
                    </div>

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
@extends("layouts.admin")

@section("page_title")
    Create Room
@endsection

@section("title")
    Create Room
@endsection

@section("styles")
    @include("includes.styles.fileUploader")
@endsection

@section("breadcrumbs")
    <li class="breadcrumb-item"><a href="{{ route("sessionrooms.index") }}">Rooms</a></li>
    <li class="breadcrumb-item active">Create</li>
@endsection

@section("content")
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route("sessionrooms.store") }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group mb-3">
                        <label for="name">Name</label>
                        <input required autofocus type="text"  id="name" value="{{old('name')}}" name="name" class="form-control   @error('name') is-invalid @enderror">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="master_room">master_room</label>
                       <select name="master_room"  class="form-control @error('master_room') is-invalid @enderror" id="master_room" required>
                            <option value="">Select Room</option>
                            @foreach(MASTER_ROOMS as $room)
                              <option value={{$room}}>{{$room}}</option>
                             @endforeach
                        </select>
                        
                        @error('master_room')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="image-uploader mb-3 ">
                        <input type="hidden" class="upload_input" name="background">
                        <input accept="images/*"
                            type="file"
                            data-name="background"
                            data-plugins="dropify"
                            data-type="image"/>
                    </div>


                    <div>
                        <input class="btn btn-primary" type="submit" value="Create" />
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

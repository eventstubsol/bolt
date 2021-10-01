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
    <li class="breadcrumb-item"><a href="{{ route("eventee.sessionrooms.index",['id'=>$id]) }}">Rooms</a></li>
    <li class="breadcrumb-item active">Create</li>
@endsection

@section("content")
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route("eventee.sessionrooms.store",['id'=>$id]) }}" method="post">
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
                    <div class="form-group mb-3">
                        <label for="name">Content Type</label>
                        <select name="bg_type" id="bg_type" class="form-control">
                            <option value="none" checked>None</option>
                            <option value="image">Image</option>
                            <option value="video">Video</option>
                        </select>
                    </div> 
                    <div class="image-uploader mb-3 " id="imgBg" style="display: none">
                        <label class="mb-3" for="images">Background Image</label>
                        <input type="hidden" class="upload_input" name="background">
                        <input accept="images/*"
                            type="file"
                            data-name="background"
                            data-plugins="dropify"
                            data-type="image"/>
                    </div>
                    <div class="image-uploader mb-3" id="vidBg" style="display: none">
                        <label class="mb-3" for="images">Background Video</label>
                        <input type="hidden" name="video_url" class="upload_input" >
                        <input type="file" data-name="video_url" data-plugins="dropify" data-type="video"  />
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
<script>
    $(document).ready(function(){
        var opt = $('#bg_type').val();
            if(opt == 'none'){
                $('#imgBg').hide();
                $('#vidBg').hide();
            }
            else if(opt == 'image'){
                $('#imgBg').show();
                $('#vidBg').hide();
            }
            else if(opt == 'video'){
                $('#imgBg').hide();
                $('#vidBg').show();
            }
          $('#bg_type').on('change',function(e){
              e.preventDefault();
              var opt = $(this).val();
              if(opt == 'none'){
                $('#imgBg').hide();
                $('#vidBg').hide();
              }
              else if(opt == 'image'){
                $('#imgBg').show();
                $('#vidBg').hide();
              }
              else if(opt == 'video'){
                $('#imgBg').hide();
                $('#vidBg').show();
              }
          });
      });
</script>
@endsection

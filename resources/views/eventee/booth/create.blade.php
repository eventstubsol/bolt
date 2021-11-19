@extends("layouts.admin")


@section("styles")
    @include("includes.styles.select")
@include("includes.styles.fileUploader")

@endsection


@section("page_title")
    Create Booth
@endsection

@section("title")
    Create Booth
@endsection

@section("breadcrumbs")
    <li class="breadcrumb-item"><a href="{{ route("eventee.booth",$id) }}">Booths</a></li>
    <li class="breadcrumb-item active">Create</li>
@endsection

@section("content")
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route("eventee.booth.store",$id) }}" method="post">
                    {{ csrf_field() }}

                    <div class="form-group mb-3">
                        <label for="boothname">Booth Name</label>
                        <input autofocus type="text" value="{{old('name')}}" id="boothname" name="name" class="form-control  @error('name') is-invalid @enderror" required>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <!-- Booth Background Image Uploader -->
                    <div class="image-uploader" id="imgBg" >
                        <label class="mb-3" for="images">Booth Image</label>
                        <input type="hidden" name="boothurl" class="upload_input"  >
                        <input type="file" data-name="boothimages" data-plugins="dropify" data-type="image" />
                     </div>
                     <div class="image-uploader" id="vidBg">
                        <label class="mb-3" for="images">Booth Video (Optional)</label>
                        <input type="hidden" name="video_url" class="upload_input" >
                        <input type="file" data-name="video_url" data-plugins="dropify" data-type="video"  />
                    </div>

                    <div class="form-group mb-3">
                        <label for="calendly_link">Calendly Link</label>
                        <input type="url" name="calendly_link" class="form-control @error('calendly_link') is-invalid @enderror" id="calendly_link" />
                        @error('room_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>

                    

                    <div class="mb-3">
                          <label for="user">Select Exhibitor</label>
                          <select class="form-control select2-multiple @error('userids') is-invalid @enderror" id="user" name="userids[]" data-toggle="select2" multiple="multiple" data-placeholder="Choose ..." required>
                              @foreach($users as $user)
                                <option value={{$user->id}}>{{$user->name}} ({{$user->email}}) </option>
                              @endforeach
                          </select>
                           @error('userids')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                       </div>

                        <div>
                            <button class="btn btn-primary" type="submit">Create</button>
                        </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
  @section("scripts")
    @include("includes.scripts.select")
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

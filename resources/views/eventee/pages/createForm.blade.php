@extends("layouts.admin")

@section("page_title")
    Create Page
@endsection

@section("title")
    Create Page
@endsection


@section("styles")
    @include("includes.styles.fileUploader")
@endsection

@section("breadcrumbs")
    <li class="breadcrumb-item"><a href="{{ route("page.index") }}">FAQs</a></li>
    <li class="breadcrumb-item active">Create</li>
@endsection

@section("content")
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route("eventee.pages.store",['id'=>$id]) }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group mb-3">
                        <label for="name">Name
                            <span style="color:red">*</span>
                        </label>
                        <input  autofocus type="text"  id="name" value="{{old('question')}}" name="name"   class="form-control   @error('name') is-invalid @enderror">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="image-uploader" id="imgBg" >
                      <label class="mb-3" for="images">Background Image
                        <span style="color:red">*</span>
                      </label>
                      <input type="hidden" name="url" class="upload_input" >
                      <input type="file" data-name="url" data-plugins="dropify" data-type="image"  />
                    </div>
                    <div class="image-uploader mt-3" id="vidBg" >
                        <label class="mb-3" for="images">Background Video (Optional)</label>
                        <input type="hidden" name="video_url" class="upload_input" >
                        <input type="file" data-name="video_url" data-plugins="dropify" data-type="video"  />
                    </div>
                   <br>
                    <div>
                        <button class="btn btn-primary" type="submit">Create</button>
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
        // var opt = $('#bg_type').val();
        //     if(opt == 'none'){
        //         $('#imgBg').hide();
        //         $('#vidBg').hide();
        //     }
        //     else if(opt == 'image'){
        //         $('#imgBg').show();
        //         $('#vidBg').hide();
        //     }
        //     else if(opt == 'video'){
        //         $('#imgBg').hide();
        //         $('#vidBg').show();
        //     }
        //   $('#bg_type').on('change',function(e){
        //       e.preventDefault();
        //       var opt = $(this).val();
        //       if(opt == 'none'){
        //         $('#imgBg').hide();
        //         $('#vidBg').hide();
        //       }
        //       else if(opt == 'image'){
        //         $('#imgBg').show();
        //         $('#vidBg').hide();
        //       }
        //       else if(opt == 'video'){
        //         $('#imgBg').hide();
        //         $('#vidBg').show();
        //       }
        //   });
      });
  </script>
@endsection
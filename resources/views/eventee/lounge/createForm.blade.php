@extends("layouts.admin")

@section("page_title")
    Create Lounge Table 
@endsection


@section("styles")
    @include("includes.styles.wyswyg")
    @include("includes.styles.select")
    @include("includes.styles.fileUploader")
@endsection


@section("title")
    Create Lounge Table
@endsection

@section("breadcrumbs")
    <li class="breadcrumb-item"><a href="{{ route("eventee.lounge.index",["id"=>$id]) }}">Sessions</a></li>
    <li class="breadcrumb-item active">Create</li>
@endsection

@section("content")
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
            <form action="{{ route("eventee.lounge.store",['id'=>$id]) }}" method="post">
                    {{ csrf_field() }}
                    <!-- Session Name -->
                    <div class="form-group mb-3">
                        <label for="name">Title
                            <span style="color:red">*</span>
                        </label>
                        <input  autofocus type="text"  id="name" value="{{old('name')}}" name="name" class="form-control   @error('name') is-invalid @enderror">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                   
                    <!-- Number of Participants   -->

                    <div class="form-group mb-3">
                        
                        <label>Number of Seats
                            <span style="color:red">*</span>
                        </label>
                        <input type="text" name="seats" class="form-control @error('seats') is-invalid @enderror" value="{{old('seats')}}">
                        @error('seats')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <input type="text" name="meetingId" class="form-control "  id="meetingId" style="display:none"  >
 


                    <div>
                        <input class="btn btn-primary" type="submit" id="create_session" value="Create" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section("scripts")
@include("includes.scripts.wyswyg")
@include("includes.scripts.fileUploader")

@include("includes.scripts.select")

<script>
    function removeresource(e) {
        e.preventDefault();
        confirmDelete("Are you sure you want to delete the Resource", "Confirm Resource deletion!").then(confirmation => {
            if (confirmation) {
                $(this).closest(".row").remove();
            }
        })
    }

    function bindRemoveButton() {
        $(".remove-resource").unbind().on("click", removeresource);
    }

    function addresource(e) {
        e.preventDefault();
        $(".resource-section").append(`
                <div class="row">
                  <div class="image-uploader mb-3 col-md-4">
                    <input type="hidden" name="resources[]" class="upload_input">
                    <input type="file" data-name="resources" data-plugins="dropify" data-type="/" />
                  </div>
                  <div class="form-group mb-3 col-md-8">
                      <label for="resourcetitles">Title</label>
                      <input type="text"  id="resourcetitles" name="resourcetitles[]" class="form-control" >
                        <button class="btn btn-danger remove-resource mt-2">Remove</button>
                  </div>
                </div>
          `);
        bindRemoveButton();
        initializeFileUploads();
    }
    $(document).ready(function() {
        $("#create_session").attr("disabled", true);
        getMeetingId();
        $("#add-resource").on("click", addresource);
        bindRemoveButton();

        $("#session_type").on("change",()=>{
           let value = $("#session_type").val();
            if(value === "VIDEO_SDK"){
               $("#create_session").attr("disabled", true);
               getMeetingId();
            }   
        })
    })

    function uuid(){
        var dt = new Date().getTime();
        var uuid = 'xxxx-4xxx-yxxx'.replace(/[xy]/g, function(c) {
            var r = (dt + Math.random()*16)%16 | 0;
            dt = Math.floor(dt/16);
            return (c=='x' ? r :(r&0x3|0x8)).toString(16);
        });
        return uuid;
    }

    function getMeetingId(){
        $("#meetingId").val(uuid());
        $("#create_session").attr("disabled", false);
        console.log(response.meetingId);
    }
</script>

@endsection

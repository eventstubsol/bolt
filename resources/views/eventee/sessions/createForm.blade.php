@extends("layouts.admin")

@section("page_title")
    Create Session
@endsection


@section("styles")
    @include("includes.styles.wyswyg")
    @include("includes.styles.select")
    @include("includes.styles.fileUploader")
@endsection


@section("title")
    Create Session
@endsection

@section("breadcrumbs")
    <li class="breadcrumb-item"><a href="{{ route("sessions.index") }}">Sessions</a></li>
    <li class="breadcrumb-item active">Create</li>
@endsection

@section("content")
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
            <form action="{{ route("eventee.sessions.store",['id'=>$id]) }}" method="post">
                    {{ csrf_field() }}
                    <!-- Session Name -->
                    <div class="form-group mb-3">
                        <label for="name">Title</label>
                        <input  autofocus type="text"  id="name" value="{{old('name')}}" name="name" class="form-control   @error('name') is-invalid @enderror">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- Session Description -->
                    <div class="form-group mb-3">
                        <label for="summernote-basic">Description</label>
                        <textarea id="summernote-basic"  name="description" class="form-control @error('description') is-invalid @enderror" >{!! old("description") !!}</textarea>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- Session Type -->
                    <div class="form-group mb-3">
                        <label for="example-select-1">Type</label>
                        <select name="type" class="form-control @error('type') is-invalid @enderror" id="session_type" required>
                            @foreach(EVENT_SESSION_TYPES as $type)
                              <option value={{$type}} onselect="{{$selected_type = $type}}" >{{ str_replace('_'," ",$type)}}</option>
                             @endforeach
                        </select>
                         @error('type')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <input type="text" name="meetingId" id="meetingId" style="display:none"  >

                    <!-- Session Rooms -->
                    <div class="form-group mb-3">
                        <label for="example-select">Room</label>
                        <select name="room_id"  class="form-control @error('room_id') is-invalid @enderror" id="example-select" required>
                            <option value="">Select Room</option>
                            @foreach($rooms as $room)
                              <option value={{$room->id}}>{{$room->name}}</option>
                             @endforeach
                        </select>
                         @error('room_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Start Time and End Time -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Start Time</label>
                            <input  name="start_time" type="datetime-local" class="form-control"/>
                        </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">End Time</label>
                                <input  name="end_time" type="datetime-local" class="form-control"/>
                            </div>
                        </div>
                    </div>
                    

                    <!-- Vimeo URL -->
                        <div class="form-group">
                            <label class="form-label">Vimeo URL</label>
                            <input name="vimeo_url" type="number" class="form-control"/>
                        </div>
                 
                    <!-- Zoom Webinar Id -->
                    <div class="form-group">
                        <label class="form-label">Zoom Webinar Id</label>
                        <input type="number"  name="zoom_webinar_id" class="form-control"/>
                    </div>

                    <!-- Zoom Password -->
                    <div class="form-group">
                        <label class="form-label">Zoom Webinar Password</label>
                        <input type="number"  name="zoom_password" class="form-control"/>
                    </div>

                    <!-- Past Video Recording -->
                    <div class="form-group">
                        <label class="form-label">Past Video Recording</label>
                        <input type="number"  name="past_video" class="form-control"/>
                    </div>
                 

                    <!-- Speakers -->
                    <div class="mb-3">
                        <label for="user">Select Speaker</label>
                        <select class="form-control select2-multiple @error('userids') is-invalid @enderror" id="speakers" name="speakers[]" data-toggle="select2" multiple="multiple" data-placeholder="Choose ...">
                            @foreach($speakers as $user)
                            <option value={{$user->id}}>{{$user->name}} ({{$user->email}}) </option>
                            @endforeach
                        </select> 
                    </div>


                     <!-- Zoom Direct URL -->
                     <div class="form-group">
                        <label class="form-label">Zoom Url (In case we want an external link)</label>
                        <input type="string"  name="zoom_url" class="form-control"/>
                    </div>

                         <!-- Card 4 Resources  -->

                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mb-3">Resources</h4>
                            <div class="resource-section">
                            
                            </div>

                            <div>
                                <!-- <button class="btn btn-primary">Save</button> -->
                                <button class="btn btn-primary" id="add-resource">Add Resources</button>

                            </div>
                        </div>
                    </div>

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
@include("includes.scripts.select")
@include("includes.scripts.wyswyg")
@include("includes.scripts.fileUploader")


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
        }
</script>

@endsection

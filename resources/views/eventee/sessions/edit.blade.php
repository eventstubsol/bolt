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
Create Update
@endsection

@section("breadcrumbs")
<li class="breadcrumb-item"><a href="{{ route("eventee.sessions.index",['id'=>$id]) }}">Sessions</a></li>
<li class="breadcrumb-item active">Update</li>
@endsection

@section("content")
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route("eventee.sessions.update",['session'=>$session->id,'id'=>$id]) }}" method="post">
                    {{ csrf_field() }}
                    @method("PUT")

                    <!-- Session Name -->
                    <div class="form-group mb-3">
                        <label for="name">Title
                            <span style="color:red">*</span>
                        </label>
                        <input autofocus type="text" id="name" value="{{$session->name}}" name="name" class="form-control   @error('name') is-invalid @enderror">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- Session Description -->
                    <div class="form-group mb-3">
                        <label for="summernote-basic">Description
                            <span style="color:red">*</span>
                        </label>
                        <textarea id="summernote-basic" name="description" class="form-control @error('description') is-invalid @enderror" required>{!! $session->description !!}</textarea>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- Session Type -->
                    <div class="form-group mb-3">
                        <label for="example-select-1">Type
                            <span style="color:red">*</span>
                        </label>
                        <select id="session_type" name="type" class="form-control @error('type') is-invalid @enderror" id="example-select-1" required>
                            @foreach(EVENT_SESSION_TYPES as $type)
                            <option @if($type===$session->type) selected="true" @endif value={{$type}} onselect="{{$selected_type = $type}}" >{{ str_replace('_'," ",$type)}}</option>
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
                        <label for="example-select">Room
                            <span style="color:red">*</span>
                        </label>
                        <select name="room_id" class="form-control @error('room_id') is-invalid @enderror" id="example-select" required>
                            <option value="">Select Room</option>
                            @foreach($rooms as $room)
                            <option @if($room->id === $session->room_id) selected="true" @endif value={{$room->id}}>{{$room->name}}</option>
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
                                <label class="form-label">Start Time
                                    <span style="color:red">*</span>
                                </label>
                                <input value="{{$session->start_times}}" name="start_time" id="start_time" type="datetime-local" class="event_start form-control @error('start_time') is-invalid @enderror" required />
                                @error('start_time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">End Time
                                    <span style="color:red">*</span>
                                </label>
                                <input value="{{$session->end_times}}" name="end_time" type="datetime-local" class="event_end form-control  @error('end_time') is-invalid @enderror" required/>
                                <span id="erroshowEndDate" style="color:red;display:none">Session end date and time cannot be
                                    before the session start date and time</span>
                                <span id="erroshowEnd" style="color:red;display:none">Session Start Time and End Time
                                    Cannot Be The Same</span>
                                @error('end_time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>


                    <!-- Vimeo URL -->
                    <div class="form-group input_feilds VIMEO_VIDEO_SDK VIMEO_SESSION VIMEO_ZOOM_SDK VIMEO_ZOOM_EX">
                        <label class="form-label">Vimeo URL</label>
                        <input value="{{$session->vimeo_url ??''}}" name="vimeo_url" type="number" class="form-control" />
                    </div>

                    <!-- Zoom URL -->
                    <div class="form-group  input_feilds ZOOM_SDK VIMEO_ZOOM_SDK">
                        <label class="form-label">Zoom Webinar Id / Zoom Url (In case we want an external link)</label>
                        <input value="{{$session->zoom_webinar_id??''}}" type="number" name="zoom_webinar_id" class="form-control" />
                    </div>

                    <!-- Zoom Password -->
                    <div class="form-group input_feilds  ZOOM_SDK VIMEO_ZOOM_SDK">
                        <label class="form-label">Zoom Webinar Password</label>
                        <input value="{{$session->zoom_password??''}}" type="number" name="zoom_password" class="form-control" />
                    </div>

                    <!-- Past Video Recording -->
                    <div class="form-group ">
                        <label class="form-label">Past Video Recording</label>
                        <input value="{{$session->past_video??''}}" type="number" name="past_video" class="form-control" />
                    </div>


                    <!-- Speakers -->
                    <div class="mb-3">
                        <label for="user">Select Speaker</label>
                        <select class="form-control select2-multiple @error('userids') is-invalid @enderror" id="speakers" name="speakers[]" data-toggle="select2" multiple="multiple" data-placeholder="Choose ...">
                            @foreach($speakers as $user)
                            <option @if(in_array($user->id,$session->speakers)) selected="true" @endif value={{$user->id}}>{{$user->name}} ({{$user->email}}) </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Zoom Direct URL -->
                    <div class="form-group input_feilds ZOOM_EXTERNAL VIMEO_ZOOM_EX">
                        <label class="form-label">Zoom Url (In case we want an external link)</label>
                        <input type="string" value="{{$session->zoom_url??''}}" name="zoom_url" class="form-control" />
                    </div>

                    <!-- Card 4 Resources  -->

                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mb-3">Resources</h4>
                            <div class="resource-section">
                                @foreach($session->resources as $resource)
                                <div class="row">
                                    <div class="image-uploader mb-3 col-md-4">
                                        <input type="hidden" name="resources[]" class="upload_input" value="{{ $resource->url }}">
                                        <input type="file" data-name="resources" data-plugins="dropify" data-type="/" data-default-file="{{assetUrl($resource->url)}}" />
                                    </div>
                                    <div class="form-group mb-3 col-md-8">
                                        <label for="resourcetitles">Title</label>
                                        <input type="text" id="resourcetitles" name="resourcetitles[]" class="form-control" value="{{ $resource->title }}">
                                        <button class="btn btn-danger mt-2 remove-resource">Remove</button>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            <div>
                                <button class="btn btn-primary" id="add-resource">Add Resources</button>

                            </div>
                        </div>
                    </div>

                    <div>
                        <input class="sameType btn btn-primary" id="create_session" type="submit" value="Save" />
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
    // $("#start_time").datetimepicker({
    //         defaultDate : "{{$session->start_time}}"
    //     })
    // console.log("{{$session->start_times}}")
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
        // $("#meetingId").show();
        $("#meetingId").val("{{$session->zoom_webinar_id}}");

        $(".input_feilds").hide();
        $("."+$("#session_type").val()).show()
        
        $("#session_type").on("change",(e)=>{
            console.log("hello")
           let value = $("#session_type").val();
            if(value === "VIDEO_SDK" || value === "VIMEO_VIDEO_SDK"){
               $("#create_session").attr("disabled", true);
               getMeetingId();
            }   
            changeType(e);
        })
        // $("#session_type").on("change",changeType);
        $('.event_end').on('input', function() {
                    let start_date = new Date($('.event_start').val());
                    let end_date = new Date($(this).val());
                    if ((start_date.getDate() == end_date.getDate()) && (start_date.getHours() == end_date
                            .getHours()) && (start_date.getMinutes() == end_date.getMinutes())) {
                        $(this).addClass('is-invalid');
                        $('#erroshowEnd').show();
                        $('#erroshowEndDate').hide();
                        $('.sameType').attr('disabled', true);
                    }else if (((start_date.getDate() >= end_date.getDate()) && (start_date.getHours() >= end_date
                            .getHours()) && (start_date.getMinutes() >= end_date.getMinutes()))){
                                $(this).addClass('is-invalid');
                                $('#erroshowEndDate').show();
                                $('#erroshowEnd').hide();
                                $('.sameType').attr('disabled', true);
                        }
                        
                    else {
                        $(this).removeClass('is-invalid');
                        $('#erroshowEndDate').hide();
                        $('#erroshowEnd').hide();
                        $('.sameType').attr('disabled', false);
                    }
                });
    })

    function changeType(e){
        console.log(e.target.value);
        $(".input_feilds").hide();
        $("."+e.target.value).show();
    }

    
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
        console.log("done")
        $("#create_session").attr("disabled", false);
    }
</script>
@endsection
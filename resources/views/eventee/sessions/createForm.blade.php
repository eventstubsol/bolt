@extends("layouts.admin")

@section('page_title')
    Create Session
@endsection


@section('styles')
    @include("includes.styles.wyswyg")
    @include("includes.styles.select")
    @include("includes.styles.fileUploader")
@endsection


@section('title')
    Create Session
@endsection

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route('sessions.index') }}">Sessions</a></li>
    <li class="breadcrumb-item active">Create</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('eventee.sessions.store', ['id' => $id]) }}" method="post">
                        {{ csrf_field() }}
                        <!-- Session Name -->
                        <div class="form-group mb-3">
                            <label for="name">Title
                                <span style="color:red">*</span>
                            </label>
                            <input autofocus type="text" id="name" value="{{ old('name') }}" name="name"
                                class="form-control   @error('name') is-invalid @enderror">
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
                            <textarea id="summernote-basic" name="description"
                                class="form-control @error('description') is-invalid @enderror">{!! old('description') !!}</textarea>
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
                            <select name="type" class="form-control @error('type') is-invalid @enderror" id="session_type">
                                @foreach (EVENT_SESSION_TYPES as $type)
                                    <option value={{ $type }} onselect="{{ $selected_type = $type }}">
                                        {{ str_replace('_', ' ', $type) }}</option>
                                @endforeach
                            </select>
                            @error('type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <input type="text" name="meetingId" id="meetingId" style="display:none">

                        <!-- Session Rooms -->
                        <div class="form-group mb-3">
                            <label for="example-select">Room
                                <span style="color:red">*</span>
                            </label>
                            <select name="room_id" class="form-control @error('room_id') is-invalid @enderror"
                                id="example-select">
                                <option value="">Select Room</option>
                                @foreach ($rooms as $room)
                                    <option value={{ $room->id }}>{{ $room->name }}</option>
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
                                    <input name="start_time" type="datetime-local" id="event_start"
                                        class="event_start form-control @error('start_time') is-invalid @enderror"
                                        value="{{ old('start_time') }}" />
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
                                    <input name="end_time" type="datetime-local" id="event_end"
                                        class="event_end form-control @error('end_time') is-invalid @enderror"
                                        value="{{ old('end_time') }}" />
                                    <span id="erroshowEndDate" style="color:red;display:none">Session end date and time cannot be
                                        before the session start date and time</span>
                                    <span id="erroshowEnd" style="color:red;display:none">Session Start Time and End Time
                                        Cannot Be The Same Nor End Time Can Be Before Start Time</span>
                                    @error('end_time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <!-- Vimeo URL -->
                        <div class="form-group">
                            <label class="form-label">Vimeo URL</label>
                            <input name="vimeo_url" type="number" class="form-control" />
                        </div>

                        <!-- Zoom Webinar Id -->
                        <div class="form-group">
                            <label class="form-label">Zoom Webinar Id</label>
                            <input type="number" name="zoom_webinar_id" class="form-control" />
                        </div>

                        <!-- Zoom Password -->
                        <div class="form-group">
                            <label class="form-label">Zoom Webinar Password</label>
                            <input type="number" name="zoom_password" class="form-control" />
                        </div>

                        <!-- Past Video Recording -->
                        <div class="form-group">
                            <label class="form-label">Past Video Recording</label>
                            <input type="number" name="past_video" class="form-control" />
                        </div>


                        <!-- Speakers -->
                        <div class="mb-3">
                            <label for="user">Select Speaker</label>
                            <select class="form-control select2-multiple @error('userids') is-invalid @enderror"
                                id="speakers" name="speakers[]" data-toggle="select2" multiple="multiple"
                                data-placeholder="Choose ...">
                                @foreach ($speakers as $user)
                                    <option value={{ $user->id }}>{{ $user->name }} ({{ $user->email }}) </option>
                                @endforeach
                            </select>
                        </div>


                        <!-- Zoom Direct URL -->
                        <div class="form-group">
                            <label class="form-label">Zoom Url (In case we want an external link)</label>
                            <input type="string" name="zoom_url" class="form-control" />
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
                            <input class="btn btn-primary sameType" type="submit" id="create_session" value="Create" />
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
    @include("includes.scripts.fileUploader")


    <script>
        function removeresource(e) {
            e.preventDefault();
            confirmDelete("Are you sure you want to delete the Resource", "Confirm Resource deletion!").then(
            confirmation => {
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
                console.log("test")
                $("#add-resource").on("click", addresource);
                bindRemoveButton();

                $("#session_type").on("change", () => {
                    let value = $("#session_type").val();
                    if (value === "VIDEO_SDK" || value === "VIMEO_VIDEO_SDK") {
                        $("#create_session").attr("disabled", true);
                        getMeetingId();
                    }
                });


                $('.event_end').on('input', function() {
                    let start_date = new Date($('.event_start').val());
                    let end_date = new Date($(this).val());
                    let month_start = parseInt(start_date.getMonth())+1;
                    let month_end = parseInt(end_date.getMonth())+1;
                    let start_main_date = new Date(start_date.getFullYear(),month_start , start_date.getDate());
                    let end_main_date = new Date(end_date.getFullYear(),month_end , end_date.getDate());
                    
                    if((start_main_date > end_main_date)){
                        $(this).addClass('is-invalid');
                        $('#erroshowEndDate').show();
                        $('#erroshowEnd').hide();
                        $('.sameType').attr('disabled', true);
                    }
                    
                    else if ((start_main_date >= end_main_date) && (start_date.getHours() >= end_date
                            .getHours()) && (start_date.getMinutes() >= end_date.getMinutes())) {
                        console.log(1);
                        $(this).addClass('is-invalid');
                        $('#erroshowEnd').show();
                        $('#erroshowEndDate').hide();
                        $('.sameType').attr('disabled', true);
                     }
                     //else if (((start_main_date >= end_main_date) && (start_date.getHours() >= end_date
                    //         .getHours()) && (start_date.getMinutes() >= end_date.getMinutes()))){
                    //             console.log(2);
                    //             $(this).addClass('is-invalid');
                    //             $('#erroshowEndDate').show();
                    //             $('#erroshowEnd').hide();
                    //             $('.sameType').attr('disabled', true);
                    //     }
                        
                    else {
                        $(this).removeClass('is-invalid');
                        $('#erroshowEndDate').hide();
                        $('#erroshowEnd').hide();
                        $('.sameType').attr('disabled', false);
                    }
                });

                function uuid() {
                    var dt = new Date().getTime();
                    var uuid = 'xxxx-4xxx-yxxx'.replace(/[xy]/g, function(c) {
                        var r = (dt + Math.random() * 16) % 16 | 0;
                        dt = Math.floor(dt / 16);
                        return (c == 'x' ? r : (r & 0x3 | 0x8)).toString(16);
                    });
                    return uuid;
                }

                function getMeetingId() {
                    $("#meetingId").val(uuid());
                    $("#create_session").attr("disabled", false);
                }

            })
    </script>
@endsection

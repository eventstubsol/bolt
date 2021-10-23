@extends("layouts.admin")

@section("page_title")
    Edit Booth
@endsection
@section("title")
    Edit Booth
@endsection

@section("styles")
    @include("includes.styles.select")
    @include("includes.styles.fileUploader")
@endsection

@section("breadcrumbs")
    <li class="breadcrumb-item"><a href="{{ route("booth.index") }}">Booth</a></li>
    <li class="breadcrumb-item active">Edit</li>
@endsection

@section("content")
@php
  $user_ids = $booth->admins->map(function($user){
      return $user->id;
  })->toArray();
@endphp
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
             
              <form action="{{ route("eventee.booth.update", [ "booth_id" => $booth->id,"id"=>$id ]) }}" method="post">
              {{ csrf_field() }}
                    @method("PUT")
                    <div class="form-group mb-3">
                        <label for="boothname">Booth Name</label>
                        <input autofocus type="text"  id="boothname" name="name" value="{{ $booth->name }}" class="form-control  @error('name') is-invalid @enderror" required>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                      


                      <div class="form-group mb-3">
                        <label for="calendly_link">Calendly Link</label>
                        <input type="url" name="calendly_link" class="form-control @error('calendly_link') is-invalid @enderror" value="{{ $booth->calendly_link }}" id="calendly_link" />
                        @error('room_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>


                    <div class="mb-3">
                          <label for="user">User</label>
                          <select class="form-control select2-multiple @error('userids') is-invalid @enderror" id="user" name="userids[]" data-toggle="select2" multiple="multiple" data-placeholder="Choose ..." value="{{ $booth->userids }}">
                              @foreach($users as $user)
                                <option
                                @if( in_array($user->id ,$user_ids))
                                  selected
                                @endif
                                 value={{$user->id}}>{{$user->name}}({{$user->email}})</option>
                              @endforeach
                          </select>
                          @error('userids')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                       </div>
                    <div class="image-uploader">vidbg_url
                        <label class="mb-3" for="images">Booth Image</label>
                        <input type="hidden" name="boothurl" class="upload_input" value="{{isset($booth->boothurl)?$booth->boothurl:""}}">
                        <input type="file" data-name="boothimages" data-plugins="dropify" data-type="image" data-default-file={{isset($booth->boothurl)?assetUrl($booth->boothurl):""}} />
                    </div>
                    <div class="image-uploader" id="vidBg">
                        <label class="mb-3" for="images">Background Video (Optional)</label>
                        <input type="hidden" name="video_url" class="upload_input" value="{{$booth->vidbg_url?$booth->vidbg_url:''}}">
                        <input type="file" data-name="video_url" data-plugins="dropify" data-type="video" data-default-file="{{$booth->vidbg_url?assetUrl($booth->vidbg_url):''}}" />
                    </div>
                    <div>
                        <button class="btn btn-primary mt-2">Save</button>
                        <button class="btn btn-danger mt-2  {{ $booth->isPublished() ? "" : "hidden" }}" id="unpublish">Unpublish</button>
                        <button class="btn btn-primary mt-2 {{ $booth->isPublished() ? "hidden" : "" }}" id="publish">Publish</button>
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
            let publish = $("#publish");
            let unpublish = $("#unpublish");
            publish.on("click", function(e){
                e.preventDefault();
                confirmDelete("Are you sure you want to publish the booth", "Publish Booth?").then(isConfirmed => {
                    if(isConfirmed){
                        $.ajax({
                            url: "{{ route("booth.publish", [ "booth" => $booth->id ]) }}",
                            method:"POST",
                            data: {
                                _token: "{{ csrf_token() }}"
                            },
                            success:function(response){
                                if(response && response.success){
                                    showMessage("Booth is published and live now.", "success");
                                    publish.hide();
                                    unpublish.show();
                                }else{
                                    showMessage("Some error occurred while Publishing the booth. Please refresh the page and try again!", "error");
                                }
                            },
                            error: function(){
                                showMessage("Some error occurred while Publishing the booth. Please refresh the page and try again!", "error");
                            }
                        });
                    }
                });
            });
            unpublish.on("click", function(e){
                e.preventDefault();
                confirmDelete("Are you sure you want to disable the booth", "Disable Booth?").then(isConfirmed => {
                    if(isConfirmed){
                        $.ajax({
                            url: "{{ route("booth.unpublish", [ "booth" => $booth->id ]) }}",
                            data: {
                                _token: "{{ csrf_token() }}"
                            },
                            method:"POST",
                            success:function(response){
                                if(response && response.success){
                                    showMessage("Booth is now hidden from visitors.", "success");
                                    unpublish.hide();
                                    publish.show();
                                }else{
                                    showMessage("Some error occurred while disabling the booth. Please refresh the page and try again!", "error");
                                }
                            },
                            error: function(){
                                showMessage("Some error occurred while disabling the booth. Please refresh the page and try again!", "error");
                            }
                        });
                    }
                });
            });
      });
  </script>
@endsection

@extends("layouts.admin")

@section("page_title")
    Onboard Settings
@endsection



@section("title")
Onboard Settings
@endsection

@section("styles")
@include("includes.styles.fileUploader")
@include("includes.styles.datatables")
@endsection    

@section("content")
    
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">  Onboard Character    </div>
            <div class="card-body"> 
               <form action="{{ route("onboard.setCharacter",$id) }}" method="POST">
                <div class="image-uploader" id="imgBg" >
                    <label class="mb-3" for="images">Character Image
                      <span style="color:red">*</span>
                    </label>
                    <input type="hidden" name="url" class="upload_input" value="@if($event->character_url != null){{ $event->character_url }}@endif">
                    <input type="file" data-name="url" data-plugins="dropify" data-type="image" data-default-file="@if($event->character_url != null){{ $event->character_url }}@endif" />
                </div>
                <button type="submit" class="btn btn-success float-right">Save</button>
               </form>
            </div>
        </div>
    </div>
</div>

@if($event->character_url != null)
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header"> 
                <div class="card-title">
                    Onboard Character Text & Locations     
                </div> 
                <div class="d-flex">
                    <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary float-right">Create</button>
                </div> 
            </div>
            <div class="card-body"> 
                <table id="datatable-buttons" class="table datatable   dt-responsive nowrap w-100">
                    <thead>
                       <tr>
                            <th>Locaiton Type</th>
                            <th>Location</th>
                            <th>Link Set To</th>
                            <th>Text</th>
                            <th>Priority</th>
                       </tr>
                    </thead>
                    <tbody>
                        @foreach($onboards as $onboard)
                            <tr>
                                <td>{{ $onboard->location_type }}</td>
                                <td>{{ $onboard->location }}</td>
                                <td>{{ ($onboard->link_id != null) ? $onboard->link_id : "No Information Available" }}</td>
                                <td>{{ $onboard->text }}</td>
                                <td>
                                    @switch($onboard->priority)
                                        @case("1")
                                            First
                                            @break
                                        @case("2")
                                            Second
                                            @break
                                        @case("3")
                                            Third
                                            @break
                                        @case("4")
                                            Fourth
                                            @break
                                    @endswitch
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endif


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create Onboard Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route("onboard.save",$id) }}" method="POST">
        <div class="modal-body">
          
              <div class="form-group">
                  <label for="">Text</label>
                  <input type="text" name="text" class="form-control">
              </div>
              <div class="form-group">
                <label for="">Location Type</label>
                <select id="location_type" name="location_type" required class="form-control " onchange="checkLocation(this)">
                    <option value="">Select A Location</option>
                    <option value="lobby">Lobby</option>
                    <option value="session_room">Session Room</option>
                    <option value="page">Page</option>
                    <option value="booth">Booth</option>
{{--                            <option>Active Users</option>--}}
{{--                            <option>Inactive Users</option>--}}
                </select>
            </div>
            <div class="form-group mb-3" id="sessionRoom" style="display: none">
                <label for="user-type">Select Room
                    <span style="color:red">*</span>
                </label>
                <select id="user-location" name="sessionRoom" required class="form-control ">
                    <option value=" ">None</option>
                   @foreach ($rooms as $room)
                        <option value="{{ $room->name }}">{{ __($room->name) }}</option>
                   @endforeach
{{--                            <option>Active Users</option>--}}
{{--                            <option>Inactive Users</option>--}}
                </select>
            </div>
            <div class="form-group mb-3" id="page" style="display: none">
                <label for="user-type">Select Page
                    <span style="color:red">*</span>
                </label>
                <select id="user-location" name="pages" required class="form-control " onclick="PageLinks(this)">
                    <option value=" ">None</option>
                   @foreach ($pages as $page)
                        <option value="{{ $page->id }}">{{ __($page->name) }}</option>
                   @endforeach
{{--                            <option>Active Users</option>--}}
{{--                            <option>Inactive Users</option>--}}
                </select>
            </div>
            <div class="form-group mb-3" id="booth" style="display: none">
                <label for="user-type">Select Booth
                    <span style="color:red">*</span>
                </label>
                <select id="user-location" name="booths" required class="form-control " onchange="BoothLinks(this)">
                    <option value=" ">None</option>
                   @foreach ($booths as $booth)
                        <option value="{{ $booth->id }}">{{ __($booth->name) }}</option>
                   @endforeach
{{--                            <option>Active Users</option>--}}
{{--                            <option>Inactive Users</option>--}}
                </select>
            </div>
            <div id="link-div"  class="form-group" style="display:none">
                <label for="">Select Speicfic Link <small style="color:red"><b>(optional)</b></small></label>
                <select name="link" id="links" class="form-control">
                </select>
            </div>
            <div class="form-group">
                <label for="">Priority</label>
                <select name="priority" class="form-control">
                    <option value="1">First</option>
                    <option value="2">Second</option>
                    <option value="3">Third</option>
                    <option value="4">Fourth</option>
                </select>
            </div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
      </div>
    </div>
  </div>

@endsection

@section("scripts")
  @include("includes.scripts.fileUploader")
  @include("includes.scripts.datatables")
  <script>
      function checkLocation(e){
        var location = e.value;
        var id = "lobby_"+ "{{ $id }} ";
        switch(location){
            case 'lobby':
                $.post("{{ route('onboard.search') }}",{id:id},function(res){
                    if(res.length > 0){
                        $("#links").empty();
                        $("#links").append(new Option("None","null"));
                        $("#links").append(new Option("Top Menu","top_menu"));
                        $("#links").append(new Option("Bottom Menu","bottom_menu"));
                        $.each(res,function(key,value){
                            $("#links").append(new Option(value.name,value.id));
                        });
                        $("#link-div").show();
                    }
                });
                $('#sessionRoom').hide();
                $('#page').hide();
                $('#booth').hide();
                break;
            case 'session_room':
                $('#sessionRoom').show();
                $('#page').hide();
                $('#booth').hide();
                $("#link-div").hide();
                break;
            case 'page':
                $('#sessionRoom').hide();
                $('#page').show();
                $('#booth').hide();
                $("#link-div").hide();
                break;
            case 'booth':
                $('#sessionRoom').hide();
                $('#page').hide();
                $('#booth').show();
                $("#link-div").hide();
                $("#link-div").hide();
                break;
            default:
                $('#sessionRoom').hide();
                $('#page').hide();
                $('#booth').hide();
                $("#link-div").hide();
                break;
        }
    }
    function PageLinks(e){
        var id = e.value;
        $.post("{{ route('onboard.search') }}",{id:id},function(res){
            if(res.length > 0){
                $("#links").empty();
                $("#links").append(new Option("None","null"));
                $.each(res,function(key,value){
                    $("#links").append(new Option(value.name,value.id));
                });
                $("#link-div").show();
            }
        });
    }
    function BoothLinks(e){
        var id = e.value;
        $.post("{{ route('onboard.search') }}",{id:id},function(res){
            if(res.length > 0){
                $("#links").empty();
                $("#links").append(new Option("None","null"));
                $.each(res,function(key,value){
                    $("#links").append(new Option(value.name,value.id));
                });
                $("#link-div").show();
            }
        });
    }
  </script>
@endsection

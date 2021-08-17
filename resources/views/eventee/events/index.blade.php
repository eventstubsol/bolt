@extends("layouts.admin")

@section('styles')
    @include("includes.styles.datatables")
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection

@section('page_title')
    Events  
@endsection

@section('title')
    Events
@endsection

@section('breadcrumbs')
    <li class="breadcrumb-item active">Events</li>
@endsection

@section('content')
@if(Session::get('eve-sucess') == 1)
    <script>
        alert('Event Added');
    </script>
    @php
        Session::put('eve-sucess',0);
    @endphp
@elseif(Session::get('eve-sucess') == 2)
    <script>
        alert('Something Went Wrong!!!');
    </script>
    @php
    Session::put('eve-sucess',0);
    @endphp
@endif
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3 class="card-title"><i class="fas fa-calendar-day"></i>&nbsp;&nbsp;Events</h3>
                <div class="float-right"><button class="btn btn-success" onclick="CreateEvent()">Create Event</button></div>
            </div>
            <div class="card-body">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Event Name</th>
                            <th>Room</th>
                            <th>Type</th>
                            <th>Url</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Webiner Id</th>
                            <th>Passowrd</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(App\EventSession::where('user_id',Auth::id())->count() > 0)
                            @foreach($events as $key => $event)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $event->name }}</td>
                                <td>{{ $event->room }}</td>
                                <td>{{ $event->type }}</td>
                                @if($event->type == 'ZOOM_SESSION' || $event->type == 'ZOOM_SESSION' || $event->type == 'ZOOM_SESSION')
                                    <td>{{ $event->zoom_url }}</td>
                                @else
                                    <td>{{ $event->vimeo_url }}</td>
                                @endif
                                <td>{{ \Carbon\Carbon::parse($event->start_time)->format('Y-m-d H:i:s') }}</td>
                                <td>{{ \Carbon\Carbon::parse($event->end_time)->format('Y-m-d H:i:s') }}</td>
                                @if($event->type == 'ZOOM_SESSION' || $event->type == 'ZOOM_SESSION' || $event->type == 'ZOOM_SESSION')
                                    <td>{{ $event->zoom_webinar_id }}</td>
                                    <td>{{ $event->zoom_password }}</td>
                                @else
                                    <td><center>No Data Available</center></td>
                                    <td><center>No Data Available</center></td>
                                @endif
                                <td>
                                    <a href="#" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                    <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="10"><center>No Data Available</center></td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <p class="float-right">{{ $events->links() }}</p>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade theme-modal" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Create Event</h5>
        </div>
        <form action="{{ route('event.Save') }}" method="POST">
            <div class="modal-body">
                <div class="form-group">
                    <label for="name">Event Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="name">Start Time</label>
                        <input type="time" name="start_time" class="form-control" required>
                    </div>
                    <div class="col">
                        <label for="name">End Time</label>
                        <input type="time" name="end_time" class="form-control" required>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col">
                        <label for="type">Type</label>
                        <select name="type" class="form-control" required> 
                            <option value="ZOOM_SESSION" selected>ZOOM_SESSION</option>
                            <option value="ZOOM_URL">ZOOM_URL</option>
                            <option value="ZOOM_EXTERNAL">ZOOM_EXTERNAL</option>
                            <option value="VIMEO_SESSION">VIMEO_SESSION</option>
                            <option value="VIMEO_ZOOM_EX">VIMEO_ZOOM_EX</option>
                            <option value="VIMEO_ZOOM_SDK">VIMEO_ZOOM_SDK</option>
                        </select>
                    </div><br>
                    <div class="col">
                        @php
                            $rooms = App\sessionRooms::all();
                        @endphp
                        <label for="room">Select Room</label>
                        <select name="room" class="form-control" required> 
                            @foreach($rooms as $room)
                                <option value="{{ $room->id }}">{{ $room->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col">
                        <label for="name">Url</label>
                        <input type="url" name="urlMain" class="form-control" required>
                    </div>
                </div><br>
                <div class="row">
                    <div class="form-group" style="font-size: 17px">
                      &nbsp;&nbsp;&nbsp;<strong>(If Using Zoom Meeting)</strong>
                    </div>
                  </div>
                <div class="row">
                    <div class="col">
                        <label for="name">Zoom Id</label>
                        <input type="text" name="zoom_id" class="form-control" >
                    </div>
                    <div class="col">
                        <label for="name">Zoom Password</label>
                        <input type="text" name="zoom_password" class="form-control" >
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
            </div>
        
      </div>
    </div>
  </div>

@endsection

@section('scripts')
  <script>
      function CreateEvent(){
          $('#createModal').modal('toggle');
      }
  </script>
@endsection
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
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3 class="card-title"><i class="fas fa-calendar-day"></i>&nbsp;&nbsp;Events</h3>
                <div class="float-right"><button class="btn btn-success" onclick="CreateEvent()">Create Event</button></div>
            </div>
            <div id="showAlert" class="alert alert-success" role="alert" style="display: none">
                <center>  Link Copied Successfully </center>
            </div>
            <div id="AlertDelete" class="alert alert-success" role="alert" style="display: none">
                <center>  Event Deleted Successfully </center>
            </div>
            <div class="card-body">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Event Name</th>
                            <th>Url</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(App\Event::where('user_id',Auth::id())->count() > 0)
                            @foreach($events as $key => $event)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $event->name }}</td>
                                <td id="copyTarget" style="cursor: pointer" data-id="{{ $event->link }}" ondblclick="openPage(this)" onclick="copyclip(this)" data-des="{{ $event->link }}">{{ Str::limit($event->link,50) }}</td>
                                <td>{{ \Carbon\Carbon::parse($event->start_date)->format('d-m-Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($event->end_date)->format('d-m-Y') }}</td>
                                <td>
                                    @if ($event->end_date < Carbon\Carbon::today())
                                        <span style="color: red">○ &nbsp;Expired</span>
                                    @else
                                        <span style="color: green">○ &nbsp;Active</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('event.Edit',['id'=>encrypt( $event->id )]) }}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                    <a href="{{ route('event.Dashboard',['id'=>( $event->id )]) }}" class="btn btn-warning"><i class="fas fa-tasks"></i></a>
                                    <button onclick="deleteEvent(this)" data-id="{{ $event->id }}" class="btn btn-danger"><i class="fa fa-trash"></i></button>
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
                        <label for="name">Start Date</label>
                        <input type="date" name="start_date" class="form-control" required>
                    </div>
                    <div class="col">
                        <label for="name">End Date</label>
                        <input type="date" name="end_date" class="form-control" required>
                    </div>
                </div><br>
                
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

      function copyclip(e){

        var link = e.getAttribute('data-des');
        /* Copy the text inside the text field */
        navigator.clipboard.writeText(link);

        /* Alert the copied text */
        // alert("Link Copied To Clipboard");
        $('#showAlert').show();
        setTimeout(
            function() 
            {
                $('#showAlert').hide();
            }, 
        5000);

      }

      function openPage(e){
          var link = e.getAttribute("data-id");
          window.open(link,'_blank');
      }

      function deleteEvent(e){
        var conf = confirm("Do you want to delete this event?");
            if(conf){
                var eventId = e.getAttribute('data-id');
                var data = e.closest('tr');
                $.post('{{ route("event.delete") }}',{'id':eventId},function(response){
                    
                    data.remove();
                    $('#AlertDelete').show();
                    setTimeout(
                        function() 
                        {
                            $('#AlertDelete').hide();
                        }, 
                    5000);
                    });
            }
      }
      
  </script>
@endsection
@extends("layouts.admin")

@section('styles')
    @include("includes.styles.datatables")
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <style>
        /* #eventData .slugInp{
            width: 85%;
            border: 1px solid grey;
            height: calc(1.5rem+ 0.9rem+ 2px);
            padding: 0.45rem 0.9rem;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 0.2rem;
        } */
        #event_link{
            font-weight: 700;
            white-space: nowrap;
        }
    </style>
    <style>

        .form-control::-webkit-input-placeholder {

            color: white;

            }



            .form-control:-ms-input-placeholder {

            color: white;

            }



            .form-control::placeholder {

            color: white;

            }
    </style>
@endsection

{{-- @section('page_title')
    All Events  
@endsection --}}

@section('title')
    Events
@endsection

@section('breadcrumbs')
    <li class="breadcrumb-item active"><a href="{{ route("event.expiring") }}">Events</a></li>
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
                <table id="datatable-buttons" class="table datatable   dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Event Name</th>
                            <th>Url</th>
                            <th>Total Users</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(App\Event::where('user_id',Auth::id())->count() > 0)
                            @foreach($ending_event as $key => $event)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $event->name }}</td>
                                <td id="copyTarget" style="cursor: pointer" data-id="{{ $event->link }}" ondblclick="openPage(this)" onclick="copyclip(this)" data-des="{{ $event->link }}">{{ Str::limit($event->link,50) }}</td>
                                <td>{{ App\User::where("event_id",$event->id)->count() }}</td>
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
                                    <a href="{{ route('event.Edit',['event_id'=>( $event->id )]) }}" class="btn btn-info" data-toggle="tooltip" title="Edit"><i class="fas fa-edit"></i></a>
                                    <a href="{{ route('event.Dashboard',['id'=>( $event->id )]) }}" class="btn btn-warning" data-toggle="tooltip" title="Manage"><i class="fas fa-tasks"></i></a>
                                    <button onclick="deleteEvent(this)" data-id="{{ $event->id }}" class="btn btn-danger" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></button>
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
           
        </div>
    </div>
</div>



@endsection

@section('scripts')
@include("includes.scripts.datatables")
  <script>
    

      function copyclip(e){

        var link = e.getAttribute('data-des');
        /* Copy the text inside the text field */
        navigator.clipboard.writeText(link);

        /* Alert the copied text */
        // alert("Link Copied To Clipboard");
        showMessage("Link Copied To Clipboard",'success');

      }

      function openPage(e){
          var link = e.getAttribute("data-id");
          window.open(link,'_blank');
      }

      function deleteEvent(e){
        confirmDelete("Are you sure you want to DELETE Event?","Confirm Event Delete").then(confirmation=>{
            if(confirmation){
                var eventId = e.getAttribute('data-id');
                var data = e.closest('tr');
                $.post('{{ route("event.delete") }}',{'id':eventId},function(response){
                    if(response.code == 200){
                        data.remove();
                        showMessage(response.message,'success');
                    }
                    else{
                        showMessage(response.message,'error');
                    }
                    
                    
                });
            }
        });
      }
     
  </script>
@endsection
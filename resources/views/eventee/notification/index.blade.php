@extends("layouts.admin")

@section('title')
    Manage Notifications
@endsection

@section("styles")
    @include("includes.styles.datatables")
@endsection

@section("page_title")
    Manage Notifications
@endsection

@section("breadcrumbs")
    <li class="breadcrumb-item active"> <a href="{{ route("eventee.notification",$id) }}">Notifications</a></li>
@endsection

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="datatable-buttons" class="table datatable   dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>Title</th>
                            
                            <th>Roles</th>
                            <th>Created At</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($notifications as $notification)
                        <tr>
                            <td>{{ $notification->title }}</td>
                            <td>{{ $notification->roles }}</td>
                            <td>{{ $notification->created_at }}</td>
                            <td><button class="btn btn-info" data-subject="{{ $notification->title }}" data-message="{{ $notification->message }}" onclick="ShowDetails(this)"><i class="fa fa-eye" d aria-hidden="true" data-toggle="tooltip" data-placement="top" title="View"></i></button><a href="{{ route("eventee.notification.resend",['id'=>$id,"notification_id"=>$notification->id]) }}" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Resend"><i class="fa fa-paper-plane" aria-hidden="true"></i></a> </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
                        <!-- end row-->

<!-- Modal -->
<div class="modal fade" id="DetailsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Notification Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="CloseModal()">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="card">
              <div class="card-header"id="noteSubject">
                  
              </div>
              <div class="card-body" id="noteBody">

              </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="CloseModal()">Close</button>
       
        </div>
      </div>
    </div>
  </div>
@endsection


@section("scripts")
    @include("includes.scripts.datatables")
    <script>
        $(document).ready(function(){
            $("#buttons-container").append('<a class="btn btn-primary" href="{{ route("eventee.notification.create",$id) }}">Create New</a>');
            $('[data-toggle="tooltip"]').tooltip()
        });
        function ShowDetails(e){
            var subject = e.getAttribute("data-subject");
            var message = e.getAttribute("data-message");
            let subBody = $('#noteSubject');
            let mesBody = $('#noteBody');
            let noteModal = $('#DetailsModal'); 
            subBody.empty();
            mesBody.empty();
            subBody.html("<h5>Subject: </h5> <h6>"+ subject +"</h6>");
            mesBody.html("<h5>Message: </h5> <h6>"+ message +"</h6>");
            noteModal.modal("toggle");
        }
        function CloseModal(){
            $('#DetailsModal').modal("toggle");
        }
    </script>
@endsection
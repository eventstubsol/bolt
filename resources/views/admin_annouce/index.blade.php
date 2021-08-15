@extends("layouts.admin")
@section('styles')
    @include("includes.styles.datatables")
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection

@section('page_title')
    Manage Announcements
@endsection
<!-- include libraries(jQuery, bootstrap) -->

<!-- include summernote css/js -->


@section('title')
    Manage Announcements    
@endsection

@section('breadcrumbs')
    <li class="breadcrumb-item active">Announcements</li>
@endsection


@section('content')
@if(session()->has('success-edit'))
    <script>
        alert('Data Updated Succesfully');
        
    </script>
    @php
        Session::forget('success-edit');
    @endphp
@elseif(session()->has('error-edit'))
<script>
    alert('Something Went Wrong');
    
</script>
@php
    Session::forget('error-edit');
@endphp
@endif
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3 class="card-title"><i class="fa fa-bullhorn" aria-hidden="true"></i>&nbsp;Announcements</h3>
                <div class="float-right"><button type="button" class="btn btn-primary" onclick="createAnnouncement()">New Announcement</button></div>
            </div>
            <div class="card-body">
                <table id="datatable-buttons"
                    class="table datatable table-striped table-hover dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Subject</th>
                            <th>Announcement</th>
                            <th>Sent To</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>                        
                        @if(count($announcements) < 1)
                            <tr>
                                <td colspan="4"><center>No Data Available</center></td>
                            </tr>
                        @else
                            @foreach ($announcements as $key => $announcement)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $announcement->subject }}</td>
                                    <td><?php echo "".($announcement->annoucement)."" ?></td>
                                    @if($announcement->user_id == 'all')
                                        <td>All</td>
                                    @else
                                        @php
                                            $user = App\User::findOrFail($announcement->user_id);
                                        @endphp
                                        <td>{{ $user->name }}</td>
                                    @endif
                                    <td><a class="btn btn-info" href="{{ route('admin.announce.edit',$announcement->id) }}" 
                                        >
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger" onclick="DeleteAnnouncement(this)"
                                        data-id="{{ $announcement->id }}">
                                        <i class="fas fa-trash-alt"></i>
                                    </button></td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!--Create Announcement-->
<div class="modal fade theme-modal" id="create-announce-modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="display:flexbox;flex-direction:row;position: relative;">
                <div class="modal-title float-left" style="margin-left: 0">
                    <h3 style="font-weight: 800">Create New Announce</h3>
                </div>
            </div>
            <hr style="width: 100%;border:1px solid black">
            <div class="modal-body">
                <div class="card mt-4">

                    <div class="card-body" id="Answer">
                        <div class="form-group">
                            <label for="question">Subject</label>
                            <input type="text" class="form-control" id="subject" required>
                        </div>
                        <div class="form-group">
                            <label for="question">Announcement</label>
                            <textarea id="announce" class="form-control" style="height: 199.728px;"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="question">Send To</label>
                            <select class="form-control" id="send_to" required>
                                <option value="all">All</option>
                                @foreach(App\User::where('type','attendee')->get() as  $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <hr style="width: 100%;border:1px solid black">
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" onclick="submitAnnouncement()" class="btn btn-success">Save</button>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="DeleteModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><strong>Are You Sure?</strong></p>
                <input type="hidden" id="deleteId">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="hidden" id="id">
                <button type="button" class="btn btn-danger" onclick="confirmDeleteModal()">Delete</button>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        function createAnnouncement(){
            $('#create-announce-modal').modal('toggle');
        }
        function submitAnnouncement(){
            var announce = $('#announce').val();
            var send_to = $('#send_to').val();
            var subject = $('#subject').val();
            if($('#announce').val()){
                $.get("{{ route('admin.announce.create') }}",{'announce':announce,'send':send_to,'subject':subject},function(result){
                    if(result.status == 200){
                        alert(result.message);
                        location.reload();
                    }else{
                        alert(result.message);
                    }
                });
            }
            else{
                alert('Input field can not be left blank');
            }
        }
        //Delete Announcement
        function DeleteAnnouncement(e){
            var id = e.getAttribute('data-id');
            $('#id').val(id);
            $('#DeleteModal').modal('toggle');
        }

        function confirmDeleteModal(){
            var id = $('#id').val();
            $.get("{{ route('admin.announce.delete') }}",{'id':id},function(result){
                if(result.status == 200){
                    alert(result.message);
                    location.reload();
                }else{
                    alert(result.message);
                }
            });
        }
    </script>


<script>
  $(document).ready(function(){
    $('#announce').summernote({
        height: 200,
        toolbar: [
    // [groupName, [list of button]]
    ['style', ['bold', 'italic', 'underline', 'clear']],
    ['insert', ['link']],
  ]
    });
  });
</script>
@endsection
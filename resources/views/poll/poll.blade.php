@extends("layouts.admin")

@section('title')
    Manage Polls
@endsection
<style>
  
</style>
@section("styles")
    @include("includes.styles.datatables") 
@endsection

@section("page_title")
    Manage Polls
@endsection

@section("breadcrumbs")
    <li class="breadcrumb-item active">Polls</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div id="message" style="display: none" role="alert" class="alert alert-info mb-1"></div>
    </div>
</div>
<div class="row">
  <style>
      .switch input {
  display: none;
}

.slider {
  position: relative;
  cursor: all-scroll;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ca2222;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked+.slider {
  background-color: #2ab934;
}

input:focus+.slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked+.slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}


/* Rounded sliders */

.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
  </style>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="datatable-buttons" class="table datatable table-striped dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th class="text-right mr-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($polls as $poll)
                        <tr>
                            <td><a href="{{ route('poll.question',encrypt($poll->id)) }}">{{$poll->name}}</a></td>
                            @if($poll->status == 0)
                                <td>In-Active</td>
                            @else
                                <td>Active</td>
                            @endif
                            <td>{{$poll->created_at}}</td>
                            <td>{{$poll->start_date}}</td>
                            <td>{{$poll->end_date}}</td>
                            <td class="text-right" >
                            
                                @if($poll->status == 1)
                                <input type="checkbox" class="status form-check-input float-left" name="status" value="1" data-id="{{ $poll->id }}" checked >
                              @else
                                <input type="checkbox" class="status form-check-input" name="status" value="0" data-id = "{{ $poll->id }}">
                              @endif
                                <a class="edit btn btn-primary" style="color: white;" id="editData" data-toggle="modal" data-target="#editModalCenter" data-id = "{{ $poll->id }}"><i class="fe-edit-2" style="size: 10px"></i>
                                </a>
                                
                    
                                
                                <a class="btn btn-danger" style="color: white;" id="editData" data-toggle="modal" data-target="#deleteModal" data-id = "{{ $poll->id }}" style="size: 5px"><i class="fas fa-trash-alt"></i>
                                </a>
                                {{-- <form class="d-inline" action="{{ route("poll.delete", ["poll" => $poll->id]) }}" method="POST"> @csrf @method("DELETE") <button  data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button></form> --}}
                            </td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
                        <!-- end row-->


<!--Create New Poll-->

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle"><i class="fas fa-poll" style="size: 14px"></i>&nbsp;Create New Poll</h5>
          
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('poll.create.post') }}" method="post">
            @csrf
              <div class="form-group">
                  <label for="poll-name">Name The Poll: </label>
                  <input type="text" name="name"  class="form-control" placeholder="Give A Suitable Name OF The Poll" required>
              </div>
              <div class="form-group">
                <label for="poll-name">Start Date: </label>
                <input type="date" name="start_date" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="poll-name">End Date: </label>
                <input type="date" name="end_date"  class="form-control" required>
            </div>
          
        </div>
        <div class="modal-footer">
          
          <button type="submit" class="btn btn-primary">Save</button>
        </form>
        </div>
      </div>
    </div>
  </div>

  <!--Edit Poll-->

<!-- Modal -->
<div class="modal fade" id="editModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle"><i class="fas fa-poll" style="size: 14px"></i>&nbsp;Edit Poll</h5>
          
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('poll.update.post') }}" method="post">
            @csrf
            <input type="hidden" name=" " id="poll-id">
              <div class="form-group">
                  <label for="poll-name">Name The Poll: </label>
                  <input type="text" name="name" id="poll-name" class="form-control" placeholder="Give A Suitable Name OF The Poll">
              </div>
              <div class="form-group">
                <label for="poll-name">Start Date: </label>
                <input type="date" name="start_date" id="start_date" class="form-control">
            </div>
            <div class="form-group">
                <label for="poll-name">End Date: </label>
                <input type="date" name="end_date" id="end_date" class="form-control">
            </div>
          
        </div>
        <div class="modal-footer">
          
          <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
        </div>
      </div>
    </div>
  </div>

  <!--delete modal-->
  <div class="modal" id="deleteModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Delete</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h5 id="confirm-message"></h5>
        </div>
        <div class="modal-footer">
          <form action="{{ route('poll.destroy') }}" method="post">
            @csrf
            <input type="hidden" name="poll_id" id="poll_id">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger" id="deletbtn">Delete</button>
        </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@section("scripts")
    @include("includes.scripts.datatables")
    <script>
        function searchToObject() {
            var pairs = window.location.search.substring(1).split("&"),
                obj = {},
                pair,
                i;

            for ( i in pairs ) {
                if ( pairs[i] === "" ) continue;

                pair = pairs[i].split("=");
                obj[ decodeURIComponent( pair[0] ) ] = decodeURIComponent( pair[1] );
            }

            return obj;
        }

    </script>

    <script>
        $(document).ready(function(){
            // $("#buttons-container").append('<div class="dropdown"><button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Create New<span class="caret"></span></button><ul class="dropdown-menu"><li><a href="{{ route('poll.multiple') }}">Multiple Choice</a></li><li><a href="#">Word Cloud</a></li><li><a href="#">Quiz</a></li>    <li><a href="#">Rating</a></li><li><a href="#">Survey</a></li>  </ul></div>')
            $("#buttons-container").append('<a data-toggle="modal" data-target="#exampleModalCenter" style = "color:white" class="btn btn-primary" >Create New Poll</a>');
            let data = searchToObject();
            if(data.message) {
                $("#message").text(data.message)
                $("#message").show()
            }

            $('#editModalCenter').on('show.bs.modal', function (e) {
                var pollId = $(e.relatedTarget).attr('data-id');
                $.ajax({
                    url:"{{ route('poll.edit') }}",
                    method:"Get",
                    data:{'id':pollId},
                    success:function(result){
                        var date = (result.start_date.split("-"));
                        var newStart = (parseInt(date[2][0]+date[2][1]) + 1);
                        var start_date = date[0] + '-' + date[1] +'-' + newStart.toString()  ;

                        var endDate = (result.end_date.split("-"));
                        var end_date =  endDate[0] + '-' + endDate[1] + '-' + (parseInt(endDate[2][0]+endDate[2][1]) + 1).toString();
                        
                        // console.log(end_date);
                        $('#poll-name').val(result.name);
                        $('#start_date').val((start_date));
                        $('#end_date').val((end_date)); 
                        $('#poll-id').val(result.id); 
                    }

                });
            });

            $('#deleteModal').on('show.bs.modal', function (e) {
                var pollId = $(e.relatedTarget).attr('data-id');
                console.log(pollId);
                $.ajax({
                    url:"{{ route('poll.delete.confirm') }}",
                    method:"Get",
                    data:{'id':pollId},
                    success:function(result){
                      // console.log(result.name);
                        if(result.status == 1){
                          $('#confirm-message').html('<b>An Active Poll Cannot Be Deleted</b>');
                          $('#deletbtn').attr('disabled',true);
                          $('#poll_id').val(result.id);
                        }
                        else{
                          $('#confirm-message').html('<b>Are you sure you want to <strong>Delete</strong> ?</b>');
                          $('#poll_id').val(result.id);
                          $('#deletbtn').attr('disabled',false);
                        }
                    }

                });
            });
            $('.status').on('click',function(){
              var poll_id = $(this).attr('data-id');
              var status = 0;
              
              if($(this).is(':checked')){
                status = 1;
              }
              else{
                status = 0
              }
              
              $.ajax({
                url:"{{ route('poll.status') }}",
                method:"get",
                data:{'id':poll_id,'status':status},
                success:function(result){
                  console.log(result.message);
                }
              });
            });
        });
    </script>
@endsection

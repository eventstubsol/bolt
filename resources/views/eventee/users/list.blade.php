@extends("layouts.admin")

@section('title')
Manage Users
@endsection

@section("styles")
@include("includes.styles.datatables")
@endsection

@section("page_title")
Manage Users
@endsection

@section("breadcrumbs")
<li class="breadcrumb-item active">Users</li>
@endsection

@section('content')

@if(Session::get('eventee.user') == 1)
    <script>
        alert("User Added Successfully");
    </script>
    @php
        Session::put('eventee.user',2);
    @endphp
@endif
<div class="row">
    <div class="col-12">
        <div class="card">
            
            <div class="card-header">
                <div id="AlertDelete" class="alert alert-success" role="alert" style="display: none">
                    <center>  User Deleted Successfully </center>
                </div>
                <div class="alert alert-success" role="alert" id="successAlert" style="display: none">
                        Selected Booths Have Deleted Successfully, Please Wait 2 Seconds....
                  </div>
                  <div class="alert alert-danger" role="alert" id="errorAlert" style="display: none">
                    
                </div>
            </div>
            <div class="card-body">
                
                {{--                <div class="float-right d-none d-md-inline-block">--}}
                {{--                    <div class="btn-group mb-2">--}}
                {{--                        <a class="btn btn-primary" href="{{ route("user.create") }}">Create
                New</a>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                <table id="datatable-buttons" class="table datatable table-striped dt-responsive nowrap w-100">
                    <thead>
                        <tr class="head">
                            <th class="checks" style="display: none">#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Type</th>
                            
                            <th>Event</th>
                            <th>Created At</th>
                            <th class="text-right mr-2">Actions</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach($users as $user)
                        @php
                            $event = App\Event::findOrFail($user->event_id);
                        @endphp
                        <tr class="checkedbox" data-id="{{ $user->id }}">
                            <td width="5%" class="incheck" style="display: none" ><input type="checkbox"  onclick="checkedValue(this)"  class="inchecked"></td>
                            <td>{{ $user->name }} {{ $user->last_name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->type }}</td>
                            
                            <td>{{ $event->name }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td class="text-right">
							    <a href="{{ route("eventee.user.information", [
                                    "id" => $id,"user_id"=>$user->id
                                ]) }}" class="btn btn-info" ><i class="fas fa-eye"></i></a>
                                <a href="{{ route("eventee.user.edit", [
                                        "id" => $id,"user_id"=>$user->id
                                    ]) }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title=""
                                    data-original-title="Edit"><i class="fe-edit-2"></i></a>
                                <button onclick="deleteUser(this)" data-id="{{ $user->id }}" class="btn btn-danger"><i class="fa fa-trash"></i></button>

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
@endsection


@section("scripts")
@include("includes.scripts.datatables")
<script>
     var incheck = $('.incheck');
     var checks = $('.checks');
    $(document).ready(function(){
        checks.hide();
        incheck.hide();
    });
    function DeleteData(e){
        let id = e.getAttribute("data-id");
        // alert(id);
        confirmDelete("Are you sure you want to DELETE User?","Confirm User Delete").then(confirmation=>{
            if(confirmation){
                $.ajax({
                    url:'{{route("eventee.user.delete")}}',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id":id
                    },
                    method:"post",
                    success: function(){
                        t.closest("tr").remove();
                        $(".tooltip").removeClass("show");
                    }
                })
            }
        });
    }
    
    $(document).ready(function(){
        
            // $("#buttons-container").append('<button class="btn btn-primary" id="sync-account">Sync with Chat</button>')
            $("#buttons-container").append('<a style="float: right" class="btn btn-primary" href="{{ route("eventee.user.create",$id) }}">Create New / Bulk Upload</a>');
            $("#buttons-container").append('<button type="button" onclick="AddCheckBox(this)" class="addbox btn btn-info" >Bulk Delete</button>');
            $("#buttons-container").append('<button class="deleteBulk btn btn-danger float-right" onclick="BulkDelete()" style="display: none">Delete</button>');
            

        //     $("#sync-account").click(async function(){
        //         $("#sync-account").attr("disabled", "true");
        //         $("#sync-account").addClass("disabled");
        //         $("#sync-account").text("Syncing")

        //         while (true) {
        //             let body = await(await fetch("{{ route('sync-users') }}", {credentials: "include"})).json();
        //             if(body.success) {
        //                 location.reload(true)
        //             } else {
        //                 $("#sync-account").text("Syncing " + body.left + " / " + body.total)
        //             }
        //         }
                
        //     });
        });

        function deleteUser(e){
            // var conf = confirm("Do you want to delete this user?");
            var userId = e.getAttribute('data-id');
            // alert(userId);
            var data = e.closest('tr');
            confirmDelete("Are you sure you want to DELETE User?","Confirm User Delete").then(confirmation=>{
                if(confirmation){
                    
                    var data = e.closest('tr');
                    $.post('{{ route("eventee.user.delete") }}',{'id':userId},function(response){
                        data.remove();
                        
                    });
                }
            });
        }

        var appendcheck = 0;
        var deleteArr = [];
        function AddCheckBox(e){
            var button = $('.addbox');
           
            // var appended = ' ';
            if(appendcheck == 0){
                // $('.head').append('<th class="thead">#</th>');
                // $('.checkedbox').append(appended);
                checks.show();
                incheck.show();
                $('.deleteBulk').show();
                appendcheck = 1;
                button.text("Cancel");
                button.addClass('btn-danger');
                button.removeClass('btn-info');
            }
            else{
                checks.hide();
                incheck.hide();
              
                $('.deleteBulk').hide();
                appendcheck = 0;
                button.text("Bulk Delete");
                button.removeClass('btn-danger');
                button.addClass('btn-info');
            }
        }

        function checkedValue(e){
            var data_id = e.closest('tr').getAttribute('data-id');
            if(deleteArr.indexOf(data_id) == -1){
                deleteArr.push(data_id);
               
            }
            else{
               
                for(var i = 0 ; i < deleteArr.length; i++){
                   if(deleteArr[i] == data_id){
                       deleteArr.splice(i,1);
                   }
               }
            }
            
        }
        function BulkDelete(){
            if(deleteArr.length < 1){
                alert("Please Select The CheckBoxe First");
            }
            else{
               
                $.post("{{ route('eventee.user.bulkDelete')}}",{'ids': deleteArr},function(response){
                    if(response.code == 200){
                        $('#successAlert').show()
                        $('#errorAlert').hide();
                        setTimeout(function(){ location.reload(); }, 2000);
                    }
                    else{
                        $('#errorAlert').show()
                        $('#successAlert').hide()
                        $('#errorAlert').html(response.message);
                    }
                });
            }
        }
</script>
@endsection
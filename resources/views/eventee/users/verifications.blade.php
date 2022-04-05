@extends("layouts.admin")

@section('title')
Verify Users
@endsection

@section("styles")
@include("includes.styles.datatables")
@endsection

@section("page_title")
Verify Users
@endsection

@section("breadcrumbs")
<li class="breadcrumb-item active"><a href="{{ route("eventee.user",['id'=>$id]) }}">Verify Users</a></li>
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
                        Selected Users Have Deleted Successfully, Please Wait 2 Seconds....
                  </div>
                  <div class="alert alert-danger" role="alert" id="errorAlert" style="display: none">
                    
                </div>
                <div class="float-right d-none d-md-inline-block">
                    <div class="btn-group mb-2">
                         <button onclick="verifyAllUser(this)" data-id="{{ $id }}" class="btn btn-primary" id="verifyAll" data-toggle="tooltip" title="VerifyAll"><i class="fe-check-circle"></i> Verify ALL</button>
                     </div>
                </div>
            </div>
            <div class="card-body">
                
                              
                <table id="datatable-buttons" class="table datatable   dt-responsive nowrap w-100">
                    <thead>
                        <tr class="head">
                            <th class="checks" style="display: none"><input type="checkbox" class="checkall"></th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Type</th>
                            <th>Subtype</th>
                            
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
                            <td>{{ $user->subtype ?? '' }}</td>
                            
                            <td>{{ $event->name }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td class="text-right">
							    <button onclick="verifyUser(this)" data-id="{{ $user->id }}" class="btn btn-primary" data-toggle="tooltip" title="Verify"><i class="fe-check-circle"></i></button>
							    <button onclick="deleteUser(this)" data-id="{{ $user->id }}" class="btn btn-danger" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></button>

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
            // $("#buttons-container").append('<a style="float: right" class="btn btn-primary" href="{{ route("eventee.user.create",$id) }}">Create New / Bulk Upload</a>');
            // $("#buttons-container").append('<button type="button" onclick="AddCheckBox(this)" class="addbox btn btn-info" >Bulk Delete</button>');
            // $("#buttons-container").append('<button class="deleteBulk btn btn-danger float-right" onclick="BulkDelete()" style="display: none">Delete</button>');
            

            $("#sync-account").click(async function(){
                $("#sync-account").attr("disabled", "true");
                $("#sync-account").addClass("disabled");
                $("#sync-account").text("Syncing")

                // while (true) {
                    let body = await(await fetch("{{ route('sync-users',['id'=>$id]) }}", {credentials: "include"})).json();
                    if(body.success) {
                        showMessage("Chats Succesfully Synced", "success");
                        // location.reload(true)
                    } else {
                        showMessage("Chats Sync Failed. Please Configure Chat Settings First.", "error");
                        // $("#sync-account").text("Syncing " + body.left + " / " + body.total)
                    }
                // }
                
            });
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
        function verifyUser(e){
            // var conf = confirm("Do you want to delete this user?");
            var userId = e.getAttribute('data-id');
            // alert(userId);
            var data = e.closest('tr');
            $.post('{{ route("eventee.verifyUser") }}',{'id':userId},function(response){
                data.remove();
                showMessage("User Verified", "success");
            });
        }
        function verifyAllUser(e){
            // var conf = confirm("Do you want to delete this user?");
            $("#verifyAll").text("Verifying...");
            $("#verifyAll").prop('disabled', true);;
            var event_id = e.getAttribute('data-id');
            // alert(userId);
            $.post('{{ route("eventee.verifyAllUser") }}',{'id':event_id},function(response){
                window.location.reload();
            });
        }

        var appendcheck = 0;
        var deleteArr = [];
        var deltype = 0;
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
                deltype = 1;
               
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
           if(deltype == 1){
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
           else if(deltype == 2){
               $.post("{{ route('eventee.user.deleteAll') }}",{'id': "{{ $id }}" },function(response){
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
           else{
                alert("Please Select The CheckBoxe First");
           }
        }

        $(document).ready(function(){
            $('.checkall').on('click',function(){
                $("input[type=checkbox]").prop('checked', $(this).prop('checked'));
                deltype = 2; 
            });
        });
</script>
@endsection
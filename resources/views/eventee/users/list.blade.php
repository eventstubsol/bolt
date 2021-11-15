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
            <div id="AlertDelete" class="alert alert-success" role="alert" style="display: none">
                <center>  User Deleted Successfully </center>
            </div>
            
            <div class="card-body">
                <a style="float: right" class="btn btn-primary" href="{{ route("eventee.user.create",$id) }}">Create New / Bulk Upload</a>
                {{--                <div class="float-right d-none d-md-inline-block">--}}
                {{--                    <div class="btn-group mb-2">--}}
                {{--                        <a class="btn btn-primary" href="{{ route("user.create") }}">Create
                New</a>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                <table id="datatable-buttons" class="table datatable table-striped dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Type</th>
                            <th>Member Id</th>
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
                        <tr>
                            <td>{{ $user->name }} {{ $user->last_name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->type }}</td>
                            <td>{{ $user->member_id }}</td>
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
{{-- @include("includes.scripts.datatables") --}}
<script>
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
            $("#buttons-container").append('<button class="btn btn-primary" id="sync-account">Sync with Chat</button>')
            $("#buttons-container").append('')
            

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
        // });

        function deleteUser(e){
            var conf = confirm("Do you want to delete this user?");
            var data = e.closest('tr');
            if(conf){
                var userId = e.getAttribute('data-id');
                var data = e.closest('tr');
                $.post('{{ route("eventee.user.delete") }}',{'id':userId},function(response){
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
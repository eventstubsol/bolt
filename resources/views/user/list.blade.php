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

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                {{--                <div class="float-right d-none d-md-inline-block">--}}
                {{--                    <div class="btn-group mb-2">--}}
                {{--                        <a class="btn btn-primary" href="{{ route("user.create") }}">Create
                New</a>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                <table id="datatable-buttons" class="table datatable   dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th width="30%">Name</th>
                            <th width="30%">Email</th>
                            <th width="20%">Type</th>
                            
                            <th width="15%">Created At</th>
                            {{-- <th width="10%">Package Type</th>
                            <th width="10%">Expiry Date</th> --}}
                            <th width="5%" class="text-right mr-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }} {{ $user->last_name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->type }}</td>
                            
                            <td>{{ $user->created_at }}</td>
                            {{-- @php
                              $package = App\Package::findOrFail($user->package_id);   
                            @endphp
                            <td>{{ $package->name }}</td>
                            @if($user->expiry_date == null)
                                <td>{{ ucfirst('none') }}</td>
                            @else
                                <td>{{ $user->expiry_date }}</td>
                            @endif --}}
                            <td class="text-right">
                                <a href="{{ route("user.edit", [
                                        "user" => $user->id
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
    $(document).ready(function(){
            // $("#buttons-container").append('<button class="btn btn-primary" id="sync-account">Sync with Chat</button>')
            // $("#buttons-container").append('<a class="btn btn-primary" href="{{ route("user.create") }}">Create New / Bulk Upload</a>')
            $("body").on("click",".delete",function(e){
                t = $(this);
                let deleteUrl = '{{route("user.destroy", [ "user" => ":id" ])}}';
                let id = t.data("id");
                confirmDelete("Are you sure you want to DELETE User?","Confirm User Delete").then(confirmation=>{
                    if(confirmation){
                        $.ajax({
                            url:deleteUrl.replace(":id", id),
                            data: {
                                "_token": "{{ csrf_token() }}",
                                "_method": "DELETE"
                            },
                            method:"POST",
                            success: function(){
                                t.closest("tr").remove();
                                $(".tooltip").removeClass("show");
                            }
                        })
                    }
                });
            });

            $("#sync-account").click(async function(){
                $("#sync-account").attr("disabled", "true");
                $("#sync-account").addClass("disabled");
                $("#sync-account").text("Syncing")

                while (true) {
                    let body = await(await fetch, {credentials: "include"})).json();
                    if(body.success) {
                        location.reload(true)
                    } else {
                        $("#sync-account").text("Syncing " + body.left + " / " + body.total)
                    }
                }
                
            });
        });
</script>
<script>
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
</script>
@endsection
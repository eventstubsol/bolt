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
<li class="breadcrumb-item "><a href="{{ route("eventee.user",['id'=>$id]) }}">Users</a></li>
<li class="breadcrumb-item active">Info</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div id="AlertDelete" class="alert alert-success" role="alert" style="display: none">
                <center>  User Deleted Successfully </center>
            </div>
            <div class="card-header">
                <a href="{{ route("eventee.user.edit", [
                    "id" => $id,"user_id"=>$user->id
                ]) }}" class="btn btn-primary" data-toggle="tooltip" title="Edit"><i class="fe-edit-2"></i></a>
            <button onclick="deleteUser(this)" data-id="{{ $user->id }}" class="btn btn-danger" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></button>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    <li class="list-group-item">Name:<b> {{ $user->name }} {{ $user->last_name }} </b></li>
                    <li class="list-group-item">Email:<b> {{ $user->email }}</b></li>
                    <li class="list-group-item">Role:<b> {{ $user->type }}</b></li>
                    <li class="list-group-item">User Type:<b> {{ $user->type }} </b></li>
                    <li class="list-group-item">Job Title:<b> {{ $user->job_title }} </b></li>
                    <li class="list-group-item">Phone:<b> {{ $user->phone }} </b></li>
                    <li class="list-group-item">Country:<b> {{ $user->country }} </b></li>
                    <li class="list-group-item">Company:<b> {{ $user->company_name }} </b></li>
                    @if($user->subtype != null)
                    <li class="list-group-item">User Sub Category:<b> {{ $user->subtype }} </b></li>
                    @endif
                    @foreach ( $user_data as $data)
                     <li class="list-group-item">{{ ($data->user_field) }}: &nbsp;<b>{{ ($data->field_value) }}</b></li>
                    @endforeach
                   
                </ul>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
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
</script>
@endsection
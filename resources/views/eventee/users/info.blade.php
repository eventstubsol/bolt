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
            <div id="AlertDelete" class="alert alert-success" role="alert" style="display: none">
                <center>  User Deleted Successfully </center>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    <li class="list-group-item">Name:<b> {{ $user->name }} {{ $user->last_name }} </b></li>
                    <li class="list-group-item">Email:<b> {{ $user->email }}</b></li>
                    <li class="list-group-item">Role:<b> {{ $user->type }}</b></li>
                    <li class="list-group-item">User Type:<b> {{ $user->type }} </b></li>
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
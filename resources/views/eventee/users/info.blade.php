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
                    @foreach ( $user_data as $data)
                     <li class="list-group-item"><b>{{ ($data->user_field) }}</b>: &nbsp;{{ ($data->field_value) }}</li>
                    @endforeach
                   
                </ul>
            </div>
        </div>
    </div>

@endsection
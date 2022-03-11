@extends("layouts.admin")

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route("event.profile") }}">Profile</a></li>
@endsection
@section('page_title')
   Profile
@endsection

@section('title')
Profile
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('event.profile.post') }}" method="POST">
                    <div class="form-group">
                        <label for="">First Name</label>
                        <input type="text" name="name" class="form-control" value="{{ auth()->user()->name }}">
                    </div>
                    <div class="form-group">
                        <label for="">Last Name</label>
                        <input type="text" name="last_name" class="form-control" value="@if(auth()->user()->last_name != null){{ auth()->user()->last_name }}@endif">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" disabled class="form-control" value="{{ auth()->user()->email }}">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control" >
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@extends("layouts.admin")

@section('title')
    Create Schedule Notification
@endsection

@section("styles")
@include("includes.styles.select")
    @include("includes.styles.datatables")
@endsection

@section("page_title")
Create Schedule Notification
@endsection

@section("breadcrumbs")
    <li class="breadcrumb-item active"><a href="{{ route("eventee.notification",$id) }}">Notifications</a></li>
    <li class="breadcrumb-item active">Create</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route("eventee.schedule.store",$id) }}" method="post">
                    @csrf
                    
                    <div class="form-group mb-3">
                        <label for="title">Title</label>
                        <input autofocus  maxlength="255"  value="{{ old('title') }}" type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" required/>
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="message">Message</label>
                        <textarea id="message" required name="message" class="form-control @error('message') is-invalid @enderror" maxlength="255">{{ old('message') }}</textarea>
                        @error('message')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="url">URL (<em>Optional</em> )</label>
                        <input id="url" name="url" type="url" class="form-control @error('url') is-invalid @enderror" />
                        @error('url')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="user-type">Select Roles</label>
                        <select id="user-type" name="roles" required class="form-control  @error('message') is-invalid @enderror" >
                            <option >All</option>
                            <option>Attendee</option>
                            <option>Delegates</option>
{{--                            <option>Active Users</option>--}}
{{--                            <option>Inactive Users</option>--}}
                        </select>
                        @error('roles')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="title">Sending On</label>
                        <input autofocus required  value="{{ old('sending_date') }}" type="date" id="sending_date" name="sending_date" class="form-control @error('sending_date') is-invalid @enderror" required/>
                        @error('sending_date')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="title">Sending At</label>
                        <input autofocus required  value="{{ old('sending_at') }}" type="time" id="sending_at" name="sending_at" class="form-control @error('sending_date') is-invalid @enderror" required/>
                        @error('sending_date')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div>
                        <button class="btn btn-primary" type="submit">Create</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
@include("includes.scripts.select")
@endsection
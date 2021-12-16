@extends("layouts.admin")

@section('title')
    Create Notification
@endsection

@section("styles")
@include("includes.styles.select")
    @include("includes.styles.datatables")
@endsection

@section("page_title")
    Create Notification
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
                <form action="{{ route("eventee.notification.store",$id) }}" method="post">
                    @csrf
                    
                    <div class="form-group mb-3">
                        <label for="title">Title
                            <span style="color:red">*</span>
                        </label>
                        <input autofocus maxlength="255"  value="{{ old('title') }}" type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" required/>
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="message">Message
                            <span style="color:red">*</span>
                        </label>
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
                        <label for="user-type">Select Roles
                            <span style="color:red">*</span>
                        </label>
                        <select id="user-type" name="roles[]" required multiple="" class="form-control select2-multiple @error('message') is-invalid @enderror" data-toggle="select2" multiple="multiple" data-placeholder="Choose ...">
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
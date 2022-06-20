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
                        <label for="user-type">Select Location
                            <span style="color:red">*</span>
                        </label>
                        <select id="user-location" name="location" required class="form-control " onchange="checkLocation(this)">
                            <option value="page">Page</option>
                            <option value="session_room">Session Room</option>
                            <option value="booth">Booth</option>
{{--                            <option>Active Users</option>--}}
{{--                            <option>Inactive Users</option>--}}
                        </select>
                    </div>
                    <div class="form-group mb-3" id="sessionRoom" style="display: none">
                        <label for="user-type">Select Room
                            <span style="color:red">*</span>
                        </label>
                        <select id="user-location" name="sessionRoom" required class="form-control ">
                            <option value=" ">None</option>
                           @foreach ($rooms as $room)
                                <option value="{{ $room->name }}">{{ __($room->name) }}</option>
                           @endforeach
{{--                            <option>Active Users</option>--}}
{{--                            <option>Inactive Users</option>--}}
                        </select>
                    </div>
                    <div class="form-group mb-3" id="page" >
                        <label for="user-type">Select Page
                            <span style="color:red">*</span>
                        </label>
                        <select id="user-location" name="pages" required class="form-control ">
                            <option value=" ">None</option>
                           @foreach ($pages as $page)
                                <option value="{{ $page->name }}">{{ __($page->name) }}</option>
                           @endforeach
{{--                            <option>Active Users</option>--}}
{{--                            <option>Inactive Users</option>--}}
                        </select>
                    </div>
                    <div class="form-group mb-3" id="booth" style="display: none">
                        <label for="user-type">Select Booth
                            <span style="color:red">*</span>
                        </label>
                        <select id="user-location" name="booths" required class="form-control ">
                            <option value=" ">None</option>
                           @foreach ($booths as $booth)
                                <option value="{{ $booth->name }}">{{ __($booth->name) }}</option>
                           @endforeach
{{--                            <option>Active Users</option>--}}
{{--                            <option>Inactive Users</option>--}}
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="user-type">Select a Role
                            <span style="color:red">*</span>
                        </label>
                        <select id="user-type" name="roles[]" required class="form-control  @error('message') is-invalid @enderror" >
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
<script>
    function checkLocation(e){
        var location = e.value;
        switch(location){
            case 'lobby':
                $('#sessionRoom').hide();
                $('#page').hide();
                $('#booth').hide();
                break;
            case 'session_room':
                $('#sessionRoom').show();
                $('#page').hide();
                $('#booth').hide();
                break;
            case 'page':
                $('#sessionRoom').hide();
                $('#page').show();
                $('#booth').hide();
                break;
            case 'booth':
                $('#sessionRoom').hide();
                $('#page').hide();
                $('#booth').show();
                break;
        }
    }
</script>

@endsection
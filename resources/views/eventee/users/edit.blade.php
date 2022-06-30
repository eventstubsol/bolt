@extends("layouts.admin")

@section('title')
    Edit User 
@endsection

@section("page_title")
    Edit User 
@endsection

@section("breadcrumbs")
    <li class="breadcrumb-item"><a href="{{ route("eventee.user",$id) }}">Users</a></li>
    <li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route("eventee.user.update", ["user_id" => $user->id,"id"=>$id]) }}" method="POST">
                    @csrf
                    
                    <div class="form-group mb-3">
                        <label for="name">First Name
                            <span style="color:red">*</span>
                        </label>
                        <input autofocus required value="{{ $user->name }}" type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" />
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">Last Name
                            <span style="color:red">*</span>
                        </label>
                        <input autofocus required value="{{ $user->last_name}}" type="text" id="last_name" name="last_name"
                            class="form-control @error('last_name') is-invalid @enderror" />
                        @error('last_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="email">Email
                            <span style="color:red">*</span>
                        </label>
                        <input id="email" required value="{{ $user->email }}" type="email" name="email" class="form-control @error('email') is-invalid @enderror" />
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="password">Password (Optional)</label>
                        <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror" />
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="type">Type of User
                            <span style="color:red">*</span>
                        </label>
                        <select class="form-control" id="user-type" name="type">
                            @foreach(USER_TYPES as $type)
                            <option @if($user->type === $type) selected @endif value="{{ $type }}">{{ ucfirst($type) }}</option>
                            @endforeach
                        </select>
                    </div>
                    @if(count($subtypes))
                    <div class="form-group mb-3">
                        <label for="type">Subtype of User</label>
                        <select class="form-control" name="subtype">
                            <option value="">None</option>
                            @foreach($subtypes as $type)
                            <option @if($user->subtype === $type->name) selected @endif value="{{ $type->name }}">{{ ucfirst($type->name) }}</option>
                            @endforeach
                        </select>
                    </div>
                    @endif
                    <div>

                    {{-- @if (!$user->email_verified_at)
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="verify_email" class="custom-control-input" id="customCheck1">
                        <label class="custom-control-label" for="customCheck1">Verify Email</label>
                    </div>
                    @endif --}}

                    {{-- <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="{{ !$user->isCometChatAccountExist ? 'enable_chat' : 'disable_chat' }}" class="custom-control-input" id="customCheck2" >
                        <label class="custom-control-label" for="customCheck2">@if (!$user->isCometChatAccountExist) Enable @else Disable @endif Chat Account (<em>Check this to perform action</em>)</label>
                    </div> --}}
                    
                    <div class="mt-3">
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
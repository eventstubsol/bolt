@extends("layouts.admin")

@section('title')
Create SubType
@endsection

@section("page_title")
Create SubType
@endsection
{{-- 
@section("breadcrumbs")
<li class="breadcrumb-item"><a href="{{ route("eventee.user",$id) }}">Users</a></li>
<li class="breadcrumb-item active">Create</li>
@endsection --}}

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route("eventee.subtype.store",$id) }}" method="post" id="userForm">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="name">Name</label>
                        <input autofocus required value="{{ old('name') }}" type="text" id="name" name="name"
                            class="form-control @error('name') is-invalid @enderror" />
                        @error('name')
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


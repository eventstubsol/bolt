@extends("layouts.admin")

@section('title')
    Edit Subtype 
@endsection

@section("page_title")
    Edit Subtype 
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
                <form action="{{ route("eventee.subtype.update", ["subtype" => $subtype->id,"id"=>$id]) }}" method="POST">
                    {{ csrf_field() }}
                    @method("PUT")

                    <div class="form-group mb-3">
                        <label for="name">Name
                            <span style="color:red">*</span>
                        </label>
                        <input autofocus required value="{{ $subtype->name }}" type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" />
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
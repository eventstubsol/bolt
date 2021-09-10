@extends("layouts.admin")

@section('title')
   Edit Licenses
@endsection

@section("styles")
    @include("includes.styles.datatables")
@endsection

@section("page_title")
Edit Licenses
@endsection

@section("breadcrumbs")
    <li class="breadcrumb-item active"><a href="{{ route("eventee.license",$id) }}">Licenses</a></li>
@endsection

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route("eventee.license.update",['id'=>$id,'license_id'=>$license->id]) }}" method="post">
                    @csrf
                    
                    {{-- <div class="form-group mb-3">
                        <label for="title">Type</label>
                        <select name="type" class="form-control">
                            <option value = "Userlicense">User License</option>
                            <option value = "Userlicense">Total License</option>
                        </select>
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div> --}}
                    <div class="form-group mb-3">
                        <label for="message">Message</label>
                        <textarea id="message" required name="message" class="form-control @error('message') is-invalid @enderror" maxlength="255">{{ $license->message }}</textarea>
                        @error('message')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div>
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@extends("layouts.admin")

@section('title')
Add New Loader
@endsection

@section("styles")
@include("includes.styles.datatables")
@include("includes.styles.fileUploader")
@endsection

@section("page_title")
Manage License
@endsection

@section("breadcrumbs")
<li class="breadcrumb-item">Default Setting</li>
<li class="breadcrumb-item active">Add New Loader</li>
@endsection

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('eventee.loader.store',$id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <div class="image-uploader" id="imgBg" >
                            <label class="mb-3" for="images">Add Loader Gif </label>
                            <input type="hidden" name="loader" class="upload_input @error('loader') is-invalid @enderror">
                            <input type="file" data-name="loadergif" data-plugins="dropify" data-type="gif" />
                            @error('loader')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection


@section("scripts")
@include("includes.scripts.fileUploader")
@endsection
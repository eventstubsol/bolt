@extends("layouts.admin")

@section("styles")
    @include("includes.styles.datatables")
@endsection

@section("page_title")
    Crete Form
@endsection

@section("title")
   Create Form
@endsection

@section("breadcrumbs")
    <li class="breadcrumb-item active">Form Field</li>
@endsection

@section("content")
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                
                <form action="{{ route('eventee.form.saveField',$id) }}" method="POST">
                    <div class="form-group">
                        <label for="">Label Name</label>
                        <input type="text" class="form-control" name="label" placeholder="Enter Label Name">
                    </div>
                    <div class="form-group">
                        <label for="">Field Type</label>
                        <select class="form-control" name="type">
                            <option value="{{ strtolower("Text") }}">Text</option>
                            <option value="{{ strtolower("Date") }}">Date</option>
                            <option value="{{ strtolower("Time") }}">Time</option>
                            <option value="{{ strtolower("Email") }}">Email</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
{{-- <div></div> --}}
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

@endsection
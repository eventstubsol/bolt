@extends("layouts.admin")

@section("styles")
    @include("includes.styles.datatables")
@endsection

@section("page_title")
   Form Preview
@endsection

@section("title")
    Form Preview
@endsection

@section("breadcrumbs")
    <li class="breadcrumb-item active">Form </li>
@endsection

@section("content")
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @foreach ($fieldsFinal as $field)
                    <div class="form-group">
                        <label for="{{ $field->label }}">{{ $field->label }}</label>
                        <input class="form-control" type="{{ $field->type }}" name="{{ $field->fieldName }}">
                    </div>
                @endforeach
               {{-- <div></div> --}}
            
            </div>
        </div>
    </div>
</div>



@endsection

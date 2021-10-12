@extends("layouts.admin")

@section('title')
Manage License
@endsection

@section("styles")
@include("includes.styles.datatables")
@endsection

@section("page_title")
Manage License
@endsection

@section("breadcrumbs")
<li class="breadcrumb-item active">License</li>
@endsection

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('license.update',$lincense->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Status</label>
                        @if ($lincense->status === 0)
                        <select class="form-control" name="status" id="">
                            <option value="1">{{ ucfirst('solved') }}</option>
                        </select>
                        @else 
                        <select class="form-control" name="status" id="">
                            <option value="1">{{ ucfirst('unsolved') }}</option>
                        </select>
                        @endif
                    
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection


@section("scripts")
@endsection
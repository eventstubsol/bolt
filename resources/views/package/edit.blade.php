@extends("layouts.admin")

@section('title')
Edit Pacakge
@endsection

@section("styles")
@include("includes.styles.datatables")
@endsection

@section("page_title")
Edit Pacakge
@endsection

@section("breadcrumbs")
<li class="breadcrumb-item active">Package</li>
<li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('package.update',$package->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Package Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Package Name" value="{{ $package->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Package Price</label>
                        <input type="number" name="price" class="form-control" placeholder="Enter Price Of Package" value="{{ $package->price }}"  required>
                    </div>
                    <div class="form-group">
                        <label for="name">Package Period</label>
                        <input type="number" name="period" class="form-control" placeholder="Enter Number For Months" value="{{ $package->period }}"  required>
                    </div>
                    <div class="float-right"><button class="btn btn-primary">Save</button></div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection 

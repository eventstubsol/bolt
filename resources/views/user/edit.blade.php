@extends("layouts.admin")

@section('title')
    Edit User Package {{ $user->name }}
@endsection

@section("page_title")
    Edit User Package {{ $user->name }}
@endsection

@section("breadcrumbs")
    <li class="breadcrumb-item"><a href="{{ route("user.index") }}">Users</a></li>
    <li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route("user.update", ["user" => $user->id]) }}" method="POST">
                    @csrf
                    @method("PUT")
                    @php
                        $packages = App\Package::all();   
                    @endphp
                    <div class="form-group mb-3">
                        <label for="name">Current Package</label>
                        <select name="package_id" class="form-control">
                            @foreach ($packages as $package)
                                <option value="{{ $package->id }}" <?php if($user->package_id == $package->id){
                                    echo "selected";
                                    } ?>>{{ __($package->name) }}</option>
                            @endforeach
                        </select>
                        
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
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
<li class="breadcrumb-item active">Package</li>
@endsection

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="datatable-buttons" class="table datatable table-striped dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th width="20%">Name</th>
                            <th width="30%">Email</th>
                            <th width="10%">Type</th>
                            <th width="20%">Package Type</th>
                            <th width="15%">Created At</th>
                    
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }} {{ $user->last_name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->type }}</td>
                            @php
                              $package = App\Package::findOrFail($user->package_id);   
                            @endphp
                            <td>{{ $package->name }}</td>
                            <td>{{ $user->created_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection


@section("scripts")
@include("includes.scripts.datatables")
<script>


</script>
@endsection
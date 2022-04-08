@extends("layouts.admin")

@section('title')
Leaderboard
@endsection

@section("styles")
@include("includes.styles.datatables")
@endsection

@section("page_title")
Leaderboard
@endsection

@section("breadcrumbs")
<li class="breadcrumb-item active">Leaderboard</li>
@endsection

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
              <table id="datatable-buttons" class="table datatable   dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th width="30%">Name</th>
                            <th width="30%">Email</th>
                            <th width="20%">Points</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }} {{ $user->last_name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->points }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<!-- end row-->
@endsection


@section("scripts")
@include("includes.scripts.datatables")
@endsection
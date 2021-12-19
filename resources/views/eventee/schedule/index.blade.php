@extends("layouts.admin")

@section('title')
    Manage Scheduled Notifications
@endsection

@section("styles")
    @include("includes.styles.datatables")
@endsection

@section("page_title")
Manage Scheduled Notifications
@endsection

@section("breadcrumbs")
    <li class="breadcrumb-item active">Schedule Notifications</li>
@endsection

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="datatable-buttons" class="table datatable table-striped dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Roles</th>
                            <th>Date OF Sending</th>
                            <th>Time OF Sending</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($notifications) > 0)
                            @foreach($notifications as $notification)
                                <tr>
                                    <td>{{ $notification->title }}</td>
                                    <td>{{ $notification->role }}</td>
                                    <td>{{ Carbon\Carbon::parse($notification->sending_date)->format('d-m-Y') }}</td>
                                    <td>{{ Carbon\Carbon::parse($notification->sending_time)->format('H:i') }}</td>
                                    <td>{{$notification->status ==0 ? 'Not Sent':'Sent' }}</td>
                                </tr>
                            @endforeach
                        @endif
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
    <script>
        $(document).ready(function(){
            $("#buttons-container").append('<a class="btn btn-primary" href="{{ route("eventee.schedule.create",$id) }}">Create New</a>')
        });
    </script>
@endsection
@extends("layouts.admin")

@section("title")
 User Logs
@endsection
@section("page_title")
    User Logs
@endsection

@section("content")
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">Event Admin Logs</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User Name</th>
                                <th>IP Address</th>
                                <th>Device</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($logs) > 0)
                                @foreach ($logs as $key => $log)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $log->name }}  {{ $log->last_name }}</td>
                                        <td>{{ $log->ip_address }}</td>
                                        <td>{{ $log->device }}</td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
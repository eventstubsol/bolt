@extends("layouts.admin")

@section("title")
Recently Joined Users
@endsection
@section("page_title")
Recently Joined Users
@endsection

@section("content")
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">Recent Added Events</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User Name</th>
                                <th>Account Status</th>
                                <th>Plan</th>
                                <th>Admin Email</th>
                                <th>Contact</th>
                                <th>Country</th>
                                <th>Created On</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($recentJoined))
                                @foreach ($recentJoined as $key =>$user)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $user->name }} {{ $user->last_name }}</td>
                                        <td>{{ ('Active') }}</td>
                                        <td>{{ 'Basic' }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>@if ($user->phone !=null)
                                            {{ $user->phone }}
                                            @else
                                                Not Available
                                        @endif</td>
                                        <td>{{ $user->country }}</td>
                                        <td>{{ Carbon\Carbon::parse($user->created_at)->format('d-m-Y') }}</td>
                                    </tr>
                                @endforeach
                            @else
                                    <td colspan="8"><center>No Data Available</center></td>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
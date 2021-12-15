@extends("layouts.admin")

@section("title")
     Event Stats
@endsection
@section("page_title")
     Event Stats
@endsection

@section("content")

<div class="row">
    {{-- Event Count --}}
    <div class="col-md-6 col-xl-3">
        <div class="widget-rounded-circle card" >
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                            <i class="fa fa-calendar font-22 avatar-title text-primary" style="margin-left: 35%;margin-top: 31%;width: 15%;height: 10%;"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-end">
                            <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $events }}</span></h3>
                            <p class="text-muted mb-1 text-truncate">Total Events</p>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div>
        </div>
    </div>
    {{-- Total Eventees --}}
    <div class="col-md-6 col-xl-3">
        <div class="widget-rounded-circle card" >
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                            <i class="fa fa-users font-22 avatar-title text-primary" style="margin-left: 35%;margin-top: 31%;width: 15%;height: 10%;"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-end">
                            <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $users }}</span></h3>
                            <p class="text-muted mb-1 text-truncate">Total Event Admins</p>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div>
        </div>
    </div>
    {{-- Total Live Events --}}
    <div class="col-md-6 col-xl-3">
        <div class="widget-rounded-circle card" >
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                            <i class="fas fa-stream font-22 avatar-title text-primary" style="margin-left: 35%;margin-top: 31%;width: 15%;height: 10%;"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-end">
                            <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $liveEvent }}</span></h3>
                            <p class="text-muted mb-1 text-truncate">Total Live Events</p>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div>
        </div>
    </div>

    {{-- Total Live Events --}}
    <div class="col-md-6 col-xl-3">
        <div class="widget-rounded-circle card" >
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                            <i class="fa fa-clock-o font-22 avatar-title text-primary" style="margin-left: 35%;margin-top: 31%;width: 15%;height: 10%;"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-end">
                            <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $attendees }}</span></h3>
                            <p class="text-muted mb-1 text-truncate">Total Online Attendees</p>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div>
        </div>
    </div>
   
    
</div>
<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                

                <h4 class="header-title mb-3">Last 5 Recent Events</h4>
                
                <div class="table-responsive">
                    <table class="table table-borderless table-hover table-nowrap table-centered m-0">
                        <center>
                        <thead class="table-light">
                            <tr>
                                
                                <th>Event Name</th>
                                <th>Status</th>
                                <th>Created On</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($recent) > 0)
                                @foreach ($recent as $eventCount)
                                @php
                                    $user = App\User::findOrFail($eventCount->user_id);
                                @endphp
                                    <tr>
                                      
                                        <td>{{ $eventCount->name }}</td>
                                        <td>
                                            @if ($eventCount->end_date < Carbon\Carbon::today())
                                                <span style="color: red">○ &nbsp;Expired</span>
                                            @else
                                                <span style="color: green">○ &nbsp;Active</span>
                                            @endif
                                        </td>
                                        <td>{{ Carbon\Carbon::parse($eventCount->start_date)->format('d-m-Y') }}</td>
                                    </tr>
                                @endforeach
                            @else
                                    <tr>
                                        <td colspan="2"><center>No Data Available</center></td>
                                    </tr>
                            @endif
                            

                        </tbody>
                    </center>
                    </table>
                    <div class="dropdown float-right">
                        <a href="{{ route('recent.event') }}" class="btn btn-success" data-bs-toggle="dropdown" aria-expanded="false">
                            View More
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end col -->

    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                

                <h4 class="header-title mb-3">Top 5 Least Active Event Admin</h4>

                <div class="table-responsive">
                    <table class="table table-borderless table-nowrap table-hover table-centered m-0">
                        <center>
                        <thead class="table-light">
                            <tr>
                                <th>User</th>
                                <th>Last Activity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($last_activity) > 0)
                                @foreach($last_activity as $activity)
                                    <tr>
                                        <td>{{ $activity->name }}</td>
                                        <td>{{ Carbon\Carbon::parse($activity->update_at)->format('d-m-Y') }}</td>
                                    </tr>
                                @endforeach
                            @else
                                    <tr>
                                        <td colspan="2"><center>No Data Available</center></td>
                                    </tr>
                            @endif

                        </tbody>
                    </center>
                    </table>
                    <div class="dropdown float-right">
                        <a href="{{ route('Least.user') }}" class="btn btn-success" data-bs-toggle="dropdown" aria-expanded="false">
                            View More
                        </a>
                    </div>
                </div> <!-- end .table-responsive-->
            </div>
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>

<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                

                <h4 class="header-title mb-3">Last 5 Event Admins</h4>
                
                <div class="table-responsive">
                    <table class="table table-borderless table-hover table-nowrap table-centered m-0">
                        <center>
                        <thead class="table-light">
                            <tr>
                                
                                <th>User Name</th>
                                <th>Email ID</th>
                                <th>Joined On</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($latest_users) > 0)
                                @foreach ($latest_users as $user)
                                {{-- @php
                                    $user = App\User::findOrFail($eventCount->user_id);
                                @endphp --}}
                                    <tr>
                                      
                                        <td>{{ $user->name }} @if($user->last_name != null) {{ $user->last_name }}@endif</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ Carbon\Carbon::parse($user->created_at)->format('d-m-Y') }}</td>
                                    </tr>
                                @endforeach
                            @else
                                    <tr>
                                        <td colspan="2"><center>No Data Available</center></td>
                                    </tr>
                            @endif
                            

                        </tbody>
                    </center>
                    </table>
                    <div class="dropdown float-right">
                        <a href="{{ route('recent.user') }}" class="btn btn-success" data-bs-toggle="dropdown" aria-expanded="false">
                            View More
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end col -->

    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                

                <h4 class="header-title mb-3">Event Ending Soon</h4>

                <div class="table-responsive">
                    <table class="table table-borderless table-nowrap table-hover table-centered m-0">
                        <center>
                        <thead class="table-light">
                            <tr>
                                <th>Event Name</th>
                                <th>Ending On</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($ending_event) > 0)
                                @foreach($ending_event as $event)
                                    <tr>
                                        <td>{{ $event->name }}</td>
                                        <td>{{ Carbon\Carbon::parse($event->end_date)->format('d-m-Y') }}</td>
                                    </tr>
                                @endforeach
                            @else
                                    <tr>
                                        <td colspan="2"><center>No Data Available</center></td>
                                    </tr>
                            @endif

                        </tbody>
                    </center>
                    </table>
                    <div class="dropdown float-right">
                        <a href="{{ route('event.ending') }}" class="btn btn-success" data-bs-toggle="dropdown" aria-expanded="false">
                            View More
                        </a>
                    </div>
                </div> <!-- end .table-responsive-->
            </div>
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>

@endsection
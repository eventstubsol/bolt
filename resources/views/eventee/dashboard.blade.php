@extends("layouts.admin")
@section('styles')
    @include("includes.styles.datatables")
   
@endsection

@section('page_title')
    Dashboard  
@endsection
<!-- include libraries(jQuery, bootstrap) -->

<!-- include summernote css/js -->


@section('title')
    Dashboard
@endsection

@section('breadcrumbs')
    <li class="breadcrumb-item active">Dashboard</li>
@endsection

@section('content')
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
                            <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $alluser }}</span></h3>
                            <p class="text-muted mb-1 text-truncate">Total Event Users</p>
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
                            <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $liveUser }}</span></h3>
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
                                
                                <th width="60%">Event Name</th>
                                <th width="20%">Total User</th>
                                <th width="20%">Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($recent) > 0)
                                @foreach ($recent as $event)
                                    @php
                                        $users = App\User::where('event_id',$event->id)->count();
                                    @endphp
                                    <tr>
                                        <td>{{ $event->name }}</td>
                                        <td>{{ $users }}</td>
                                        <td><a href="{{ route('event.Dashboard',['id'=>( $event->id )]) }}" class="btn btn-warning">Manage</a></td>
                                    </tr>
                                @endforeach
                            @else
                                    <tr>
                                        <td colspan="3"><center>No Data Available</center></td>
                                    </tr>
                            @endif
                            

                        </tbody>
                    </center>
                    </table>
                    <div class="dropdown float-right">
                        <a style="margin-top: 14%;" href="{{ route('event.index') }}" class="btn btn-success" aria-expanded="false">
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
                

                <h4 class="header-title mb-3">Top 5 Events Expiring Soon</h4>

                <div class="table-responsive">
                    <table class="table table-borderless table-nowrap table-hover table-centered m-0">
                        <center>
                        <thead class="table-light">
                            <tr>
                                <th width="60%">Event Name</th>
                                <th width="20%">Total User</th>
                                <th width="20%">Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($ending_event) > 0)
                                @foreach($ending_event as $event)
                                @php
                                        $users = App\User::where('event_id',$event->id)->count();
                                @endphp
                                <tr>
                                    <td>{{ $event->name }}</td>
                                    <td>{{ $users }}</td>
                                    <td><a href="{{ route('event.Dashboard',['id'=>( $event->id )]) }}" class="btn btn-warning">Manage</a></td>
                                </tr>
                                @endforeach
                            @else
                                    <tr>
                                        <td colspan="3"><center>No Data Available</center></td>
                                    </tr>
                            @endif

                        </tbody>
                    </center>
                    </table>
                    <div class="dropdown float-right">
                        <a style="margin-top: 14%;" href="{{ route('event.index') }}" class="btn btn-success" aria-expanded="false">
                            View More
                        </a>
                    </div>
                </div> <!-- end .table-responsive-->
            </div>
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>
@endsection
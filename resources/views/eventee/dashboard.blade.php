@extends("layouts.admin")
@section('styles')
    @include("includes.styles.datatables")
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
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
<div style="display: flex;flex-direction:row">
    <div class="col-md-6 col-xl-4  mb-3">
        <div class="widget-rounded-circle card-box h-100">
            <div class="row">
                <div class="col-6">
                    <div class="avatar-lg rounded-circle bg-soft-info border-info border">
                        <i class="fe-bar-chart-line- font-22 avatar-title text-info"></i>
                    </div>
                </div>
                @php
                    $eventcount = App\EventSession::where('user_id',Auth::id())->where('created_at','like','%'.date('Y-m-d H:i:a').'%')->count();
                @endphp
                <div class="col-6">
                    <div class="text-right">
                        <h3 class="text-dark mt-1" id="today-unique-logins">{{ $eventcount }}</h3>
                        <p class="text-muted mb-1 text-truncate">Events Oraganized By You</p>
                    </div>
                </div>
                <div class="col-6">
                    <div class="text-left">
                        <h3 class="text-dark mt-1" id="today-unique-logins"></h3>
                        <p class="text-muted mb-1 text-truncate">Events Today</p>
                    </div>
                </div>
            </div> <!-- end row-->
        </div> <!-- end widget-rounded-circle-->
    </div>

    <div class="col-md-6 col-xl-4  mb-3">
        <div class="widget-rounded-circle card-box h-100">
            <div class="row">
                <div class="col-6">
                    <div class="avatar-lg rounded-circle bg-soft-info border-info border">
                        <i class="fe-bar-chart-line- font-22 avatar-title text-info"></i>
                    </div>
                </div>
                <div class="col-6">
                    <div class="text-right">
                        <h3 class="text-dark mt-1" id="login_last_1h">0</h3>
                        <p class="text-muted mb-1 text-truncate">Logins in last 60 mins</p>
                    </div>
                </div>
            </div> <!-- end row-->
        </div> <!-- end widget-rounded-circle-->
    </div>
    <div class="col-md-6 col-xl-4  mb-3">
        <div class="widget-rounded-circle card-box  h-100">
            <div class="row ">
                <div class="col-6">
                    <div class="avatar-lg rounded-circle bg-soft-info border-info border">
                        <i class="fe-bar-chart-line- font-22 avatar-title text-info"></i>
                    </div>
                </div>
                <div class="col-6">
                    <div class="text-right">
                        <h3 class="text-dark mt-1" id="login_total">{{ App\EventSession::where('user_id',Auth::id())->count() }}</h3>
                        <p class="text-muted mb-1 text-truncate">Total Events</p>
                    </div>
                </div>
            </div> <!-- end row-->
            <button class="btn btn-primary mt-3 mx-auto btn-block" id="download-login-logs">Event Logs</button>
        </div> <!-- end widget-rounded-circle-->
    </div>
</div>
@php
    $eventee = App\EventSession::where('user_id',Auth::id())->orderBy('created_at','desc')->limit(5)->get();
@endphp
<div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title">Last Events</h5>
        @if(count(App\EventSession::where('user_id',Auth::id())->get()) > 0)
            <ul class="list-group list-group-flush">
                @foreach($eventee as $event)
                <li class="list-group-item" data-id="{{ $event->id }}" style="cursor: pointer">{{ $event->name }}</li>
                @endforeach
            </ul>
        @else
         <h5>No data available</h5>
        @endif
    </div>
</div>

@endsection
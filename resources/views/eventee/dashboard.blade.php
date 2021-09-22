@extends("layouts.admin")
@section('styles')
    @include("includes.styles.datatables")
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
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
                    $eventcount = App\EventSession::where('user_id',Auth::id())->where('created_at','like','%'.date('Y-m-d').'%')->count();
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
            
        </div> <!-- end widget-rounded-circle-->
    </div>
</div>
@php
    $eventee = App\Event::where('user_id',Auth::id())->orderBy('created_at','desc')->limit(5)->get();
@endphp
<div class="card" style="width: 22rem;margin-left:1rem">
    <div class="card-body">
        <h5 class="card-title">Events</h5>
        @if(count(App\Event::where('user_id',Auth::id())->get()) > 0)
            <table class="table table-hover">
                <tr>
                    <th>Event</th>
                    <th>Status</th>
                </tr>
                @foreach($eventee as $event)
                <tr>
                   
                        <td><a href="{{ route('event.Dashboard',['id'=>encrypt( $event->id )]) }}" style="text-decoration: none">{{ $event->name }}</a></td>
                        <td>
                            @if ($event->end_date < Carbon\Carbon::today())
                                <span style="color: red">○ &nbsp;Expired</span>
                            @else
                                <span style="color: green">○ &nbsp;Active</span>
                            @endif
                        </td>
                   
                </tr>
                @endforeach
                
            </table>
        @else
         <h5>No data available</h5>
        @endif
    </div>
</div>

@endsection
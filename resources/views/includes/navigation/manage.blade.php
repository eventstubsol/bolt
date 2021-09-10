<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<li>
    <a href="{{ route("teacher.dashboard") }}"  class="nav-second-level"> 
        <i class="fas fa-tachometer-alt"></i>
        <span>
            Dashboard
        </span>  
    </a>
</li>
<li>
    <a href="#report" data-toggle="collapse">
        <i class="mdi mdi-file-multiple"></i>
        <span> Reports <span class="badge  badge-success" >NEW</span> </span>
    </a>
    <div class="collapse" id="report">
        <ul class="nav-second-level">
            <li>
                <a href="{{ route("event.Dashboard",['id'=>$id]) }}">General</a>
            </li>
            <li>
                <a href="{{ route("event.leaderboard",['id'=>$id]) }}">Leaderboard</a>
            </li>
            <!-- <li>
                <a href="{{ route("reports.auditorium") }}">Auditorium</a>
            </li> -->
            @php
                $session_rooms = getRoomsEventee(decrypt($id));
            @endphp
            @if($session_rooms != 0)
                @foreach($session_rooms as $master_room => $rooms)
                    @if($master_room != "private" )
                    <li>
                        <a href="#{{$master_room}}" data-toggle="collapse">{{ ucfirst( str_replace("_"," ", $master_room ) )  }}</a>
                
                        <div class="collapse" id="{{$master_room}}">
                            <ul class="nav-sesond-level">
                                @foreach($rooms as $room)
                                    <li>
                                        <a href="{{ route("event.workshop", ['name' => $room,'id'=>$id]) }}">{{ $room }}</a>
                                    </li>
                                @endforeach
                            
                            </ul>
                        </div>
                    </li>
                    @endif
                
                @endforeach
            @endif
        </ul>
    </div>
</li>

<li>

    <a href="#booth-reports" data-toggle="collapse">
        <i class="mdi mdi-file-multiple"></i>
        <span>Booth Reports <span class="badge  badge-success" >NEW</span> </span>
    </a>
    @php
        $booths = \App\Booth::where('event_id',$id);
    @endphp
    <div class="collapse" id="booth-reports">
        <ul class="nav-second-level">
            @if($booths->count() > 0)
                @foreach($booths->get() as $booth)
                <li>
                    <a href="{{ route("reports.booth", ['id' => $booth->id]) }}">{{ $booth->name }}</a>
                </li>
                @endforeach
            @endif
        </ul>
    </div>
</li>
<li class="menu-title">Administration</li>
<li>
    <a href="#users" data-toggle="collapse">
        <i data-feather="users"></i>
        <span> Users</span>
    </a>
    <div class="collapse" id="users">
        <ul class="nav-second-level">
            <li>
                <a href="{{ route("eventee.user",['id'=>$id]) }}">Manage</a>
            </li>
            <li>
                <a href="{{ route("eventee.user.create",['id'=>$id]) }}">Create</a>
            </li>
        </ul>
    </div>
</li>
<li>
    <a href="{{ route('eventee.dataEntry',$id) }}"  class="nav-second-level">
        <i data-feather="users"></i>
        <span> Data Entry</span>
    </a>
</li>
<li>
    <a href="#notification" data-toggle="collapse" >
        <i data-feather="bell"></i>
        <span> Notifications</span>
    </a>
    <div class="collapse" id="notification">
        <ul class="nav-second-level">
            <li>
                <a href="{{ route("eventee.notification",$id) }}">Manage</a>
            </li>
            <li>
                <a href="{{ route("eventee.notification.create",$id) }}">Create</a>
            </li>
        </ul>
    </div>
</li>

<li>
    <a href="#polls" data-toggle="collapse">
        <i data-feather="bar-chart-2"></i>
        <span>Polls</span>
    </a>
    <div class="collapse" id="polls">
        <ul class="nav-second-level">
            <li>
                <a href="{{ route("eventee.poll",$id) }}">Manage</a>
            </li>
        </ul>
    </div>
</li>

<li>
    <a href="#QNA" data-toggle="collapse">
        <i class="fa fa-question-circle"></i>
        <span>QnA</span>
    </a>
    <div class="collapse" id="QNA">
        <ul class="nav-second-level">
            <li>
                <a href="{{ route("eventee.qna",$id) }}">Manage</a>
            </li>
        </ul>
    </div>
</li>

<li>
    <a href="#announceAdmin" data-toggle="collapse">
        <i class="fa fa-bullhorn" aria-hidden="true"></i>
        <span>Announcements</span>
    </a>
    <div class="collapse" id="announceAdmin">
        <ul class="nav-second-level">
            <li>
                <a href="{{ route("eventee.announce",$id) }}">Manage</a>
            </li>
        </ul>
    </div>
</li>

<li>
    <a href="{{ route("eventee.videoArchive",$id) }}"  class="nav-second-level"> 
        <span>
            Past Videos Archive
        </span>  
    </a>
</li>

<li>
    <a href="{{ route("eventee.license",$id) }}"  class="nav-second-level"> 
        <span>
           Licence Upgrade
        </span>  
    </a>
</li>


{{--<li>
    <a href="{{ route("eventSession.manage") }}">
        <i data-feather="calendar"></i>
        <span>Event Sessions</span>
    </a>
</li>--}}


{{--<li>--}}
{{--    <a href="#sessions" data-toggle="collapse">--}}
{{--        <i data-feather="calendar"></i>--}}
{{--        <span>Event Sessions</span>--}}
{{--    </a>--}}
{{--    <div class="collapse" id="sessions">--}}
{{--        <ul class="nav-second-level">--}}
{{--            <li>--}}
{{--                <a href="{{ route("eventSession.manage") }}">Manage</a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="{{ route("eventSession.dashboardArchive") }}">Polls Archive</a>--}}
{{--            </li>--}}
            
{{--        </ul>--}}
{{--    </div>--}}
{{--</li>--}}


<li class="menu-title">Site Content</li>
<li>
    <a href="{{ route("eventee.options",$id) }}">
        <i data-feather="file-text"></i>
        <span> General Content</span>
    </a>
</li>
{{-- <li>
    <a href="#faqs" data-toggle="collapse">
        <i data-feather="help-circle"></i>
        <span> FAQs</span>
    </a>
    <div class="collapse" id="faqs">
        <ul class="nav-second-level">
            <li>
                <a href="{{ route("faq.index") }}">Manage</a>
            </li>
            <li>
                <a href="{{ route("faq.create") }}">Create</a>
            </li>
        </ul>
    </div>
</li>

<li>
    <a href="#analytic" data-toggle="collapse">
        <i class="fa fa-bar-chart"></i>
        <span> Third Party Setup</span>
    </a>
    <div class="collapse" id="analytic">
        <ul class="nav-second-level">
            <li>
                <a href="{{ route("analytic.index") }}">Google Analytic Data</a>
            </li>
            <li>
                <a href="{{ route("recaptcha.index") }}">Google reCaptcha Data</a>
            </li>
            <li>
                <a href="{{ route("comet.index") }}">Comet Chat Data</a>
            </li>
            <li>
                <a href="{{ route("zoom.index") }}">Zoom Data</a>
            </li>
        </ul>
    </div>
</li>


<li>
    <a href="#pages" data-toggle="collapse">
        <i class="mdi mdi-file-multiple"></i>
        <span> Pages</span>
    </a>
    <div class="collapse" id="pages">
        <ul class="nav-second-level">
            <li>
                <a href="{{ route("page.index") }}">Manage</a>
            </li>
            <li>
                <a href="{{ route("page.create") }}">Create</a>
            </li>
            <li>
                <a href="{{ route("lobby") }}">Lobby</a>
            </li>
        </ul>
    </div>
</li>
<li>
    <a href="#sessionRooms" data-toggle="collapse">
        <i data-feather="home"></i>
        <span> Session Rooms</span>
    </a>
    <div class="collapse" id="sessionRooms">
        <ul class="nav-second-level">
            <li>
                <a href="{{ route("sessionrooms.index") }}">Manage</a>
            </li>
            <li>
                <a href="{{ route("sessionrooms.create") }}">Create</a>
            </li>
        </ul>
    </div>
</li>
<li>
    <a href="#sessions" data-toggle="collapse">
        <i data-feather="play-circle"></i>
        <span> Sessions</span>
    </a>
    <div class="collapse" id="sessions">
        <ul class="nav-second-level">
            <li>
                <a href="{{ route("sessions.index") }}">Manage</a>
            </li>
            <li>
                <a href="{{ route("sessions.create") }}">Create</a>
            </li>
        </ul>
    </div>
</li>

<li>
    <a href="#notification" data-toggle="collapse">
        <i data-feather="bell"></i>
        <span> Agenda</span>
    </a>
    <div class="collapse" id="notification">
        <ul class="nav-second-level">
            <li>
                <a href="{{ route("subscriptions.index") }}">Manage</a>
            </li>
            <li>
                <a href="{{ route("subscriptions.create") }}">Create</a>
            </li>
        </ul>
    </div>
</li>


<li>
    <a href="#rooms" data-toggle="collapse">
        <i data-feather="map"></i>
        <span> Rooms </span>
    </a>
    <div class="collapse" id="rooms">
        <ul class="nav-second-level">
            <li>
                <a href="{{ route("room.index") }}">Manage</a>
            </li>
            <li>
                <a href="{{ route("room.create") }}">Create</a>
            </li>
            <li>
                <a href="{{ route("room.sort") }}">Sort</a>
            </li>
        </ul>
    </div>
</li>

<li>
    <a href="#booths" data-toggle="collapse">
        <i data-feather="grid"></i>
        <span> Booths </span>
    </a>
    <div class="collapse" id="booths">
        <ul class="nav-second-level">
            <li>
                <a href="{{ route("booth.index") }}">Manage</a>
            </li>
            <li>
                <a href="{{ route("booth.create") }}">Create</a>
            </li>
        </ul>
    </div>
</li>


<li>
    <a href="#report" data-toggle="collapse">
        <i class="mdi mdi-file-multiple"></i>
        <span> Reports </span>
    </a>
    <div class="collapse" id="report">
        <ul class="nav-second-level">
            <li>
                <a href="{{ route("report.index") }}">Manage</a>
            </li>
            <li>
                <a href="{{ route("report.create") }}">Create</a>
            </li>
        </ul>
    </div>
</li> --}}

{{--<li>--}}
{{--    <a href="#provisional" data-toggle="collapse">--}}
{{--        <i class="mdi mdi-file-multiple"></i>--}}
{{--        <span> Provisional Groups </span>--}}
{{--    </a>--}}
{{--    <div class="collapse" id="provisional">--}}
{{--        <ul class="nav-second-level">--}}
{{--            <li>--}}
{{--                <a href="{{ route("provisional.index") }}">Manage</a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="{{ route("provisional.create") }}">Create</a>--}}
{{--            </li>--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--</li>--}}

<li>
    <a href="#menu" data-toggle="collapse">
        <i class="fa fa-bars"></i>
        <span> Menu</span>
    </a>
    <div class="collapse" id="menu">
        <ul class="nav-second-level">
            <li>
                <a href="{{ route("eventee.menu",$id) }}">Manage Nav</a>
            </li>
            <li>
                <a href="{{ route("eventee.menu.footer",$id) }}">Manage Footer</a>
            </li>
        </ul>
    </div>
</li>
<li>
    <a href="#background" data-toggle="collapse">
        <i class="far fa-images"></i>
        <span> Background</span>
    </a>
    <div class="collapse" id="background">
        <ul class="nav-second-level">
            <li>
                <a href="{{ route("eventee.background",$id) }}">Manage Backgound</a>
            </li>
        </ul>
    </div>
</li>

<li>
    <a href="#prizes" data-toggle="collapse">
        <i class="mdi mdi-gift-outline"></i>
        <span> Prizes </span>
    </a>
    <div class="collapse" id="prizes">
        <ul class="nav-second-level">
            <li>
                <a href="{{ route("prize.index") }}">Manage</a>
            </li>
            <li>
                <a href="{{ route("prize.create") }}">Create</a>
            </li>
        </ul>
    </div>
</li>

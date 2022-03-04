<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{assetUrl(getField("favicon"))}}">

    @yield('styles')

    <!-- App css -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-dark.min.css') }}" type="text/css">
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" type="text/css"> --}}
	<link rel="stylesheet" href="{{ asset('assets/css/form.css') }}" type="text/css">
    {{-- <link rel="stylesheet"  href="{{ asset('assets/css/app.min.css') }}" type="text/css"> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/app-dark.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}?v=1234" type="text/css">
    <link href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://coderthemes.com/ubold/layouts/assets/libs/nestable2/jquery.nestable.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
    {{-- <link href="../assets/libs/nestable2/jquery.nestable.min.css" rel="stylesheet">
    <link href="../assets/css/config/default/bootstrap.min.css" rel="stylesheet" type="text/css" id="bs-default-stylesheet">
    <link href="../assets/css/config/default/app.min.css" rel="stylesheet" type="text/css" id="app-default-stylesheet">
    <link href="../assets/css/config/default/bootstrap-dark.min.css" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" disabled="disabled"> --}}

    <!-- icons -->
   
        {{-- <link href="https://coderthemes.com/ubold/layouts/assets/css/config/default/bootstrap.min.css" rel="stylesheet" type="text/css" /> --}}
        <link href="https://coderthemes.com/ubold/layouts/assets/libs/selectize/css/selectize.bootstrap3.css" rel="stylesheet" type="text/css" />
        <link href="https://coderthemes.com/ubold/layouts/assets/libs/mohithg-switchery/switchery.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="{{ asset('assets/css/icons.min.css') }}" type="text/css">

    <style>
        .dataTables_length select{
            width: 54px !important;
        }
        .modal-content .checkbox{
            display: none !important; 
        }
        .right-bar-toggle.chat-bubble{
            position: fixed;
            top: 85vh;
            right: 0;
            z-index: 999;
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1.5px solid #151515;
            transition: border 0.2s;
            border-right: none;
            border-radius: 5px 0 0 5px;
        }
        #chat-unread-count{
            transform: translateX(50%) translateY(-50%);
            position: absolute;
            top: 0;
            right: 0;
        }
        .right-bar-toggle.chat-bubble:hover{
            border-color: #3827c1;
        }
        .chat-loader{
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 100vh;
            font-size: 50px;
            color: #3827c1;
        }
        .right-bar#chat-container,#chat-container .page-int-wrapper{
            width: 100%;
            max-width: 750px;
        }
        .right-bar#chat-container{
            right: 0;
            transform: translateX(100%);
        }
        .theme-chat.chat-bubble,.consent-notification{
            opacity: 1;
        }
        .theme-chat.right-bar#chat-container{
            width: 90% !important;
        }
        .cc1-chat-win-header{
            padding-right: 60px !important;
        }
        .hidden{
            display: none;
        }
        .logo-box{
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .visit_event:hover{
            color: white;
        }
        .visit_event{
            padding: 22px;
            display: inline-block;
            color: white;
        }
        .action_items{
            position: fixed;
            top: 2%;
            right: 14%;
            z-index: 1002;
        }
        .action_item_2{
            position: fixed;
            top: 2%;
            right: 20%;
            z-index: 9999;
        }

        .rightSection{
            background: #37424c;
            height: 100%;
            width: 00px;
            position: absolute;
            top: 70px;
            right: -40px;
            padding: 20px;
            z-index: 999;
            transition: all 300ms ease-in-out;
        }

        .showDiv{
            width: 300px;
            right: 0px;
            transition: all 300ms ease-in-out;
        }

        .rightPanel{
            cursor: pointer;
            line-height: 0;
        }

        .switch {
        position: relative;
        display: inline-block;
        width: 30px;
        height: 14px;
        margin: 0;
        }

        .switch input { 
        opacity: 0;
        width: 0;
        height: 0;
        }

        .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
        }

        .slider:before {
        position: absolute;
        content: "";
        height: 10px;
        width: 10px;
        left: 4px;
        bottom: 2px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
        }

        input:checked + .slider {
        background-color: #2196F3;
        }

        input:focus + .slider {
        box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
        -webkit-transform: translateX(12px);
        -ms-transform: translateX(12px);
        transform: translateX(12px);
        }

        /* Rounded sliders */
        .slider.round {
        border-radius: 34px;
        }

        .slider.round:before {
        border-radius: 50%;
        }
        .buttons-pdf{
            display: none !important;
        }
    </style>
    @if(isset($id))
        @php
            $primary_color = App\Event::findOrFail($id)->primary_color;
            $secondary_color = App\Event::findOrFail($id)->secondary_color;
        @endphp
        <style>
            /* .navbar-custom{
                background: {{ $primary_color }};
               
            }
            .navbar-custom a{
                color: {{ $secondary_color }} !important;
            } */
        </style>
    @endif
    @yield("styles_after")
    <script src="//code.jquery.com/jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Nestable/2012-10-15/jquery.nestable.min.js" integrity="sha512-a3kqAaSAbp2ymx5/Kt3+GL+lnJ8lFrh2ax/norvlahyx59Ru/1dOwN1s9pbWEz1fRHbOd/gba80hkXxKPNe6fg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
{{-- <script src="https://coderthemes.com/ubold/layouts/assets/libs/nestable2/jquery.nestable.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-nestable@0.8.0/jquery.nestable.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-nestable@0.8.0/jquery.nestable.js"></script>
<script src="https://www.jqueryscript.net/demo/Mobile-Compatible-jQuery-Drag-Drop-Plugin-Nestable/jquery.nestable.js"></script> --}}

<script>
    $('#flash-overlay-modal').modal();
    /* setTimeout(function(){ 
        $('#flash-overlay-modal').modal('toggle'); 
    }, 2000); */
</script>

</head>


<body class="loading" data-sidebar-showuser="true">

<!-- Begin page -->
<div id="wrapper">
   
    
    @php
        $user  = Auth::user();
    @endphp
    <!-- Topbar Start -->
    <div class="navbar-custom">
        <div class="container-fluid">
            @auth
                <ul class="list-unstyled topnav-menu float-right mb-0 d-flex align-items-center">
                    <li class="dropdown notification-list topbar-dropdown">
                        <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light"
                           data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                             @if(isset($user->profileImage))
                                <img src="{{assetUrl($user->profileImage)}}" class="avatar-sm round-icon">
                            @else
                                <span class="round-icon">
                                    <i class="fa fa-user"></i>
                                </span>
                            @endif
                           
                            <span class="pro-user-name ml-1">
                                {{ $user->name }} <i class="mdi mdi-chevron-down"></i>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            <!-- item-->
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome !</h6>
                            </div>

                            <!-- item-->
                            @if($user->type === 'eventee')
                                <a href="{{ route('event.index')}} " class="dropdown-item notify-item">
                                    <i class="fe-user"></i> <span>My Events</span>
                                </a>
                            @endif
                            {{-- <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-settings"></i>
                                <span>Settings</span>
                            </a> --}}

                            <div class="dropdown-divider"></div>

                            <!-- item-->
                            @if(Auth::user()->type == 'exhibiter')
                                <a class="dropdown-item notify-item" href="{{ route('attendeeLogout',$event_name) }}">
                                <i class="fe-log-out"></i>
                                    <span>Logout</span>
                                </a>
                            @else
                                <a class="dropdown-item notify-item" href="{{ route('admin.logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fe-log-out"></i>
                                    <span>Logout</span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            @endif

                            

                        </div>
                    </li>
                    @if(isset($id))
                        <li>
                            <span class="ml-2 rightPanel" data-toggle="tooltip" title="Open Right Side Bar">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                                    <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
                                    <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
                                </svg>
                            </span>
                        </li>
                    @endif
                </ul>
            @endauth

            @guest
                <ul class="list-unstyled topnav-menu float-right mb-0">
                    <li class="dropdown notification-list topbar-dropdown">
                        <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light"
                           href="{{ route("login") }}" aria-expanded="false">Login
                        </a>
                    </li>
                </ul>
            @endguest

            <!--̵ LOGO -->
            <div class="logo-box">
                <a href="{{ route("home") }}" class="logo logo-dark text-center">
                    <span class="logo-sm">
                        <img src="{{ assetUrl(getField('logo')) }}" alt="..." height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ assetUrl(getField('logo')) }}" alt="..." height="30">
                    </span>
                </a>

                <a href="{{ route('home') }}" class="logo logo-light text-center">
                    <span class="logo-sm">
                        <img src="{{ assetUrl(getField('logo')) }}" alt="..." height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ assetUrl(getField('logo')) }}" alt="..." height="30">
                    </span>
                </a>
            </div>
            
            @auth
               <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
              
                   <li>
                        <button class="button-menu-mobile waves-effect waves-light">
                            <i class="fe-menu"></i>
                        </button>
                    </li>
                    {{-- ALL Events --}}
                    @if(Auth::user()->type == 'eventee')
                     
                        <li class="dropdown notification-list topbar-dropdown">
                            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light"
                            data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                               
                                <span class="pro-user-name ml-1" style="font-size: 18px; font-weight: bold;">
                                    @if(isset($id))
                                        @php
                                            $curr_event = App\Event::findOrFail($id);
                                        @endphp
                                        {{strtoupper($curr_event->name)}}
                                    @else
                                        All Events
                                    @endif
                                        <i class="mdi mdi-chevron-down"></i>
                                </span>
                            </a>
                          
                            <div class="dropdown-menu dropdown-menu-left profile-dropdown ">
                               @php
                                    $events = App\Event::where('user_id',Auth::id())->orderBy('id','desc')->get();
                               @endphp

                                    @foreach ($events as $event)
                                            <a class="@if(isset($id) &&($event->id==$id)) text-blue @endif  dropdown-item" href="{{ route('event.Dashboard',['id'=>( $event->id )]) }}" class="btn btn-warning">{{$event->name}}</a>
                                    @endforeach
                                <!-- item-->
                            </div>
                        </li>
                    @endif
                
                    @if(isset($id))
                        @php
                            $cur_eve = App\Event::findOrFail($id);
                        @endphp
                        <li class=" color-primary">
                            <a class="visit_event" href="@if($cur_eve->domain) https://{{$cur_eve->domain}}/ @else https://{{$cur_eve->link}}/event @endif" target="_blank">Visit Event</a>    
                            <a class="visit_event ml-2" href="@if($cur_eve->domain) https://{{$cur_eve->domain}}/landing @else https://{{$cur_eve->link}}/landing @endif" target="_blank">Visit Landing Page</a>    
                        </li>
                    @endif
                 

                </ul>
               
            @endauth
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- end Topbar -->

    <!-- ========== Left Sidebar Start ========== -->
    @auth
        <div class="left-side-menu">

            <div class="h-100" data-simplebar>

                <!-- User box -->
                <div class="user-box text-center">
                    <img src="{{ assetUrl(Auth::user()->profileImage) }}" alt="user-img" title="Mat Helme"
                        class="rounded-circle avatar-md">
                    <div class="dropdown">
                        <a href="javascript: void(0);" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block"
                        data-toggle="dropdown">Geneva Kennedy</a>
                        <div class="dropdown-menu user-pro-dropdown">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-user mr-1"></i>
                                <span>My Account</span>
                            </a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-log-out mr-1"></i>
                                <span>Logout</span>
                            </a>
                        </div>
                    </div>
                    <p class="text-muted">Admin Head</p>
                </div>

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <ul id="side-menu">
                        @yield('navigation')
                        
                                @if(Auth::user()->type == "exhibiter")
                                     @include("includes.navigation.exhibitor")
                                @elseif( isset($id) && $id !=null)
                                        @include("includes.navigation.manage")
                                @elseif(Auth::user()->type == "admin")
                                    @include("includes.navigation.admin")

                                @elseif(Auth::user()->type == "moderator")
                                    @include("includes.navigation.moderator")
                                


                                @elseif(Auth::user()->type == "teller")
                                    @include("includes.navigation.teller")
                                
                               

                                @elseif(Auth::user()->type == "eventee")
                                    @include("includes.navigation.eventee")

                                
                                @endif
                           

                    </ul>
                </div>
                <!-- End Sidebar -->

                <div class="clearfix"></div>

            </div>
            <!-- Sidebar -left -->

        </div>
    @endauth
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        <div class="content">
            
            <!-- Start Content-->
            <div class="container-fluid">

                <!-- start page title -->
                @include('flash::message')
                @auth
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        {{-- <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li> --}}
                                        @yield("breadcrumbs")
                                    </ol>
                                </div>
                                <h4 class="page-title">@yield('page_title')</h4>
                            </div>
                        </div>
                    </div>
                @endauth
                <!-- end page title -->
                @yield('content')

            </div> <!-- container -->

        </div> <!-- content -->

        <!-- Footer Start -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        {{ date("Y") }} - &copy; EventStub
                    </div>
                    <div class="col-md-6">
                        <div class="text-md-right footer-links d-none d-sm-block">
                            <a href="javascript:void(0);">About Us</a>
                            <a href="javascript:void(0);">Help</a>
                            <a href="javascript:void(0);">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->


</div>
<!-- END wrapper -->

<div id="chat-container" class="right-bar theme-chat"></div>
<a href="javascript:void(0);" id="chat-toggle" class="nav-link right-bar-toggle theme-chat chat-bubble">
    <i class="fe-message-square" />
    <span id="chat-unread-count" class="badge badge-danger font-15  badge-pill hidden" />
</a>
<div class="rightbar-overlay"></div>

<div class="rightSection">
    @if(isset($id))
        @php
            $event = App\Event::findOrFail($id);
        @endphp
       <div class="form-group">
        @if($event->land_page == 0)
        <div class="form-check form-switch ml-0 pl-0">
            <label for="#landPage" class="mr-1 mb-0">Set Landing Page</label>
            <label class="switch">
                <input type="checkbox" value="0" onchange="landingPage(this)">
                <span class="slider round"></span>
            </label>
        </div>
        @else
        <div class="form-check form-switch ml-0 pl-0">
            <label for="#landPage" class="mr-1 mb-0">Set Landing Page</label>
            <label class="switch">
                <input type="checkbox" value="1" onchange="landingPage(this)" checked>
                <span class="slider round"></span>
            </label>
        </div>
        @endif
       </div>
       <div class="form-group mt-2">
        @if($event->active_option == 0)
            <div class="form-check form-switch ml-0 pl-0">
                <label for="#landPage" class="mr-1 mb-0">Set Email Activation Option</label>
                <label class="switch">
                    <input type="checkbox" value="0" onchange="OtpOption(this)">
                    <span class="slider round"></span>
                </label>
            </div>
        @else
            <div class="form-check form-switch ml-0 pl-0">
                <label for="#landPage" class="mr-1 mb-0">Set Email Activation Option</label>
                <label class="switch">
                    <input type="checkbox" value="1" onchange="OtpOption(this)" checked>
                    <span class="slider round"></span>
                </label>
            </div>
        @endif
       </div>
    @endif    
</div>

<script>

$(document).ready(function(){
    $(".rightPanel").click(function(){
        $(".rightSection").toggleClass("showDiv");
    });
    $(function () {
        $('[data-toggle="tooltip"]').tooltip({
            placement:'bottom'
        })
    })
});
</script>
@if(isset($id))
<script>
    function landingPage(e){
        let status = e.value;
        if(status == 0){
            e.value = 1;
            $.get("{{ route('update.landing.status') }}",{'status':1,'id':"{{ $id }}"},function(res){
                alert("turned on");
            });
        }
        else{
            e.value = 0;
            $.get("{{ route('update.landing.status') }}",{'status':0,'id':"{{ $id }}"},function(res){
                alert("turned off");
            }); 
        }
    }
    function OtpOption(e){
        let status = e.value;
        
        if(status == 0){
            e.value = 1;
            $.get("{{ route('update.otp.status') }}",{'status':1,'id':"{{ $id }}"},function(res){
                showMessage(res.message,'success');
                console.log(res);
            });
        }
        else{
            e.value = 0;
            $.get("{{ route('update.otp.status') }}",{'status':0,'id':"{{ $id }}"},function(res){
                showMessage(res.message,'success');
                console.log(res);
            }); 
        }
    } 
</script>
@endif

<script>
    window.config = {
        ...(window.config || {}),
        cometChat: {
            appID: "{{ env("COMET_CHAT_APP_ID") }}",
            region: "{{ env("COMET_CHAT_REGION") }}",
            authKey: "{{ env("COMET_CHAT_AUTH_KEY") }}",
            supportChatUser: "{{ SUPPORT_USER }}",
        },
        userId: "{{ Auth::user()->id }}",
        userName: "{{ Auth::user()->name }}",
    };
</script>
<!-- Vendor js -->
<script src="{{ asset('assets/js/vendor.min.js') }}"></script>
<script src="{{ asset('assets/libs/parsleyjs/parsley.min.js') }}"></script>
{{-- <script src="{{ asset('assets/js/jquery.min.js') }}"></script> --}}
<script src="{{ asset('assets/js/sortable.min.js') }}"></script>
<script src="{{ asset('assets/js/d3.min.js') }}"></script>

<script src="https://coderthemes.com/ubold/layouts/assets/libs/mohithg-switchery/switchery.min.js"></script>
<script src="https://coderthemes.com/ubold/layouts/assets/js/vendor.min.js"></script>
<script src="https://coderthemes.com/ubold/layouts/assets/libs/multiselect/js/jquery.multi-select.js"></script>
<script src="https://coderthemes.com/ubold/layouts/assets/libs/selectize/js/standalone/selectize.min.js"></script>
<script src="https://coderthemes.com/ubold/layouts/assets/libs/select2/js/select2.min.js"></script>

<!-- App js -->
<script src="{{ asset('assets/js/app.js') }}"></script>
<script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset("/js/chat/app.js") }}"></script>

<script type="text/javascript">
  function confirmDelete(message = false, title = false, options = {}){
    if(!message){
      message = "Are you sure you want to proceed?";
    }
    return new Promise((resolve) => {
        Swal.fire({
            title: title || "Confirm",
            text: message,
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes",
            ...options,
        }).then((result) => resolve(result.value));
    });
  }
  function showMessage(title, type = "info", options = {}){
      Swal({
          type,
          title,
          ...options
      });
  }
  // An Example for usage
  // confirmDelete("Are you sure you want to delete the booth", "Confirm booth deletion!").then(confirmation => {
  //   if(confirmation){
  //     //Proceed with deletion
  //   }
  // })
  function exportToCsv(filename, rows) {
      console.log(rows);
      if(Array.isArray(rows) && rows.length) {
          let keys = {};
          Object.keys(rows[0]).map(k => keys[k] = k);
          rows = [
              keys,
              ...rows
          ];
          let csvFile = rows.map(e => Object.values(e).join(",")).join("\n");
          let blob = new Blob([csvFile], { type: 'text/csv;charset=utf-8;' });
          if (navigator.msSaveBlob) { // IE 10+
              navigator.msSaveBlob(blob, filename);
          } else {
              let link = document.createElement("a");
              if (link.download !== undefined) { // feature detection
                  // Browsers that support HTML5 download attribute
                  let url = URL.createObjectURL(blob);
                  link.setAttribute("href", url);
                  link.setAttribute("download", filename);
                  link.style.visibility = 'hidden';
                  document.body.appendChild(link);
                  link.click();
                  document.body.removeChild(link);
              }
          }
      }
  }
</script>
@yield('scripts')


</body>
</html>

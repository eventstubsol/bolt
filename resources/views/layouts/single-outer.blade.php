@php
    $user = Auth::user();
@endphp
        <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ getField("title", "Event") }}</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" type="text/css">
    <link href={{ asset("assets/libs/select2/css/select2.min.css" )}} rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{asset("event-assets/YouTubePopUp/YouTubePopUp.css")}}">
    {{-- App favicon--}}
    <link rel="shortcut icon" href="{{assetUrl(getField("favicon"))}}">
    <!-- Icons -->
    <link href={{asset("assets/css/icons.min.css")}} rel="stylesheet" type="text/css" />
    <script>
        var ua = window.navigator.userAgent;
        var msie = ua.indexOf("MSIE ");
        if (msie > 0) // If Internet Explorer, return version number
        {
            alert("For an immersive experience on our platform please use some modern browser like Chrome, Safari or Firefox.");
        }
    </script>
    <!-- Onesignal -->
    <link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset("event-assets/css/app.css") }}">
    <link href={{asset("assets/css/custom.css")}} rel="stylesheet" type="text/css" />
    <style>
        #faq{
            display: block;
        }
    </style>
</head>
<body>
<div class="navbar-custom navs theme-nav">
    <div class="container-fluid row">
        <div class="col-9 col-md-9 fluid-col logo-col">
            <div class="logo-box" style="min-height: 70px;">
                <a class="logo area" data-link="lobby">
                <img src="{{ assetUrl(getField('logo')) }}" style="max-height: 50px;border-radius: 10px;padding: 0px;">
                </a>
            </div>
        </div>
        <div class="col-3 col-md-3 fluid-col profile-col">
            <div class="extra">
                @auth
                    <div class="custom-dropdown profile">
                        <a href="javascript:void(0);" class="menu-trigger">
                            <p class="pro-user-name m-0">
                                <span>{{ Auth::user()->name }}</span><i class="mdi mdi-chevron-down mx-1"></i>
                            </p>
                            @if(isset(Auth::user()->profileImage))
                                <img src="{{assetUrl(Auth::user()->profileImage)}}" class="avatar-sm round-icon">
                            @else
                                <span class="round-icon"><i class="fa fa-user"></i></span><i class="mdi mdi-chevron-down mx-1"></i>
                            @endif
                        </a>
                        <div class="custom-dropdown-menu">
                            <a href="#profile" class="dropdown-item notify-item">
                                <i class="fe-user mr-1"></i> <span>My Account</span>
                            </a>
                            @if(Auth::user()->type=="admin" || Auth::user()->type=="exhibiter")
                                <a href="{{ url("/") }}" class="dropdown-item notify-item">
                                    <i class="fa fa-cog mr-1"></i> <span>Admin Panel</span>
                                </a>
                            @endif
                            <div class="dropdown-divider"></div>

                            <a data-link="lobby" class="dropdown-item notify-item area">
                                <i class="fe-home mr-1"></i> <span>Lobby</span>
                            </a>
                            <a  data-link="infodesk" class="dropdown-item notify-item area">
                                <i class="fe-info mr-1"></i> <span>Information</span>
                            </a>
                            @if(isOpenForPublic("swagbag"))
                                <a  data-toggle="modal" data-target="#resources-modal" class="dropdown-item notify-item">
                                    <i class="fe-folder mr-1"></i> <span>Library</span>
                                </a>
                                <a data-toggle="modal" data-target="#swagbag-modal" class="dropdown-item notify-item">
                                    <i class="fe-shopping-bag mr-1"></i> <span>Swag Bag</span>
                                </a>
                            @else
                                <a  disabled class="dropdown-item notify-item">
                                    <i class="fe-folder mr-1"></i> <span>Library</span>
                                </a>
                                <a disabled class="dropdown-item notify-item">
                                    <i class="fe-shopping-bag mr-1"></i> <span>Swag Bag</span>
                                </a>
                            @endif
                            @if(isOpenForPublic("leaderboard"))
                                <a  data-link="leaderboard" class="dropdown-item notify-item area">
                                    <i class="fe-bar-chart mr-1"></i> <span>Leaderboard</span>
                                </a>
                            @else
                                <a disabled class="dropdown-item notify-item area">
                                    <i class="fe-bar-chart mr-1"></i> <span>Leaderboard</span>
                                </a>
                            @endif
                            @auth
                                @if(Auth::user()->type === USER_TYPE_DELEGATE)
                                    <a href="#by-laws" class="dropdown-item notify-item">
                                        <i class="fe-book-open mr-1"></i> <span>Bylaws/Budget</span>
                                    </a>
                                @endif
                            @endauth

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item notify-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fe-log-out mr-1"></i>
                                <span>Logout</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                    <div class="mob-menu ml-2 d-none">
                        <a href="void:javascript(0);">
                        <span class="round-icon">
                            <i class="fa fa-bars"></i>
                        </span>
                        </a >
                    </div>
                @endauth
                @guest
                    <div class="dropdown notification-list topbar-dropdown">
                        <a class="" href="{{ route('attendee_login') }}" aria-expanded="false">Login</a>
                    </div>
                @endguest
            </div>
        </div>
    </div>
</div>
<!-- end Topbar -->
@yield("content")
<script src="{{ asset('assets/js/vendor.min.js') }}"></script>
<script src="{{ asset('assets/js/app.min.js') }}"></script>

</body>
</html>

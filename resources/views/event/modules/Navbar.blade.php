{{-- <style>
    ul{
        list-style:none;
    }
    ul .dropdown .notification-list{
        list-style:none;
    }
    .nav-link {
        display: block;
        padding: 0.5rem 1rem;
        color: #6658dd;
        transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out;
    }
    .waves-effect {
        position: relative;
        cursor: pointer;
        display: inline-block;
        overflow: hidden;
        -webkit-user-select: none;
        user-select: none;
        -webkit-tap-highlight-color: transparent;
    
    }
    .navbar-custom .dropdown .nav-link.show {
        background-color: rgba(255,255,255,.05);
    }
    .navbar-custom .topnav-menu .nav-link {
        padding: 0 15px;
        color: rgba(255,255,255,.6);
        min-width: 32px;
        display: block;
        line-height: 70px;
        text-align: center;
        max-height: 70px;
    }
    .dropdown-toggle {
    white-space: nowrap;
    }
    [role=button] {
        cursor: pointer;
    }
    a {
        color: #6658dd;
        text-decoration: none;
    }
    *, ::after, ::before {
        box-sizing: border-box;
    }
    user agent stylesheet
    a:-webkit-any-link {
        color: -webkit-link;
        cursor: pointer;
        text-decoration: underline;
    }
    style attribute {
        visibility: visible;
        opacity: 1;
    }
    .profile{
        left:0;
    }
</style> --}}
<script src="https://coderthemes.com/ubold/layouts/assets/js/app.min.js"></script>
<script src="https://coderthemes.com/ubold/layouts/assets/js/app.min.js"></script>
<div class="navbar-custom navs hidden theme-nav">
    <div class="container-fluid row">
        <div class="col-5 col-md-2 fluid-col logo-col">
            <div class="logo-box">
                <a class="logo area" data-link="lobby">
                    <img async src="{{ assetUrl(getFieldId('logo',$event_id)) }}" style="max-height: 50px;border-radius: 10px;padding: 0px;">
                </a>
            </div>
        </div>
        @php
            $menus = App\Menu::where('type','nav')->where('event_id',$event_id)->where('parent_id','0')->where('status','1')->orderBy('position','asc')->get();
            
        @endphp
        <div class="col-2 col-md-8 fluid-col menu-col">
           <ul class="menu">
               @foreach($menus as $menu)
                @if($menu->name === 'lounge')      
                    <li><a data-link="networking" class="area"><i class="fe-home"></i>Lounge</a></li>
                @elseif($menu->name === 'lobby')      
                    <li><a data-link="lobby" class="area"><i class="fe-home"></i>Lobby</a></li>
                @elseif($menu->name === 'library')
                    <li><a data-toggle="modal" data-target="#resources-modal"><i class="fe-folder"></i>Library</a></li>
                @elseif($menu->name == 'schedule')
                    <li><a data-toggle="modal" data-target="#schedule-modal"><i class="fe-calendar"></i>Schedule</a></li>
                @elseif($menu->name == 'swagbag')
                    <li><a data-toggle="modal" data-target="#swagbag-modal"><i class="fe-shopping-bag"></i>SwagBag</a></li>
                @elseif($menu->name == 'leaderboard')
                    <li><a class="area" data-link="leaderboard"><i class="fe-bar-chart"></i>Leaderboard</a></li>
                @elseif($menu->name == 'personalagenda')
                    <li><a data-toggle="modal" id="agenda" data-target="#personal-schedule-modal"><i class="fe-calendar"></i>Personal Agenda</a></li>
                @else
                    <li class="not-booth-menu">   
                        {!! getMenuLink($menu) !!}
                    </li>
                @endif
            @endforeach
           </ul>
           <ul class="list-unstyled  menu" style="left:0;">
                 <li class="dropdown notification-list topbar-dropdown">
                <a class="nav-link dropdown-toggle waves-effect waves-light" id="dropdownMenuLink" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <i class="fe-bell noti-icon"></i>
                    <span class="badge bg-danger rounded-circle noti-icon-badge">9</span>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-lg" aria-labelledby="dropdownMenuLink">
    
                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <h5 class="m-0">
                            <span class="float-end">
                                <a href="" class="text-dark">
                                    <small>Clear All</small>
                                </a>
                            </span>Notification
                        </h5>
                    </div>
    
                    <div class="noti-scroll" data-simplebar>
    
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item active">
                            <div class="notify-icon">
                                <img src="../assets/images/users/user-1.jpg" class="img-fluid rounded-circle" alt="" /> </div>
                            <p class="notify-details">Cristina Pride</p>
                            <p class="text-muted mb-0 user-msg">
                                <small>Hi, How are you? What about our next meeting</small>
                            </p>
                        </a>
    
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-primary">
                                <i class="mdi mdi-comment-account-outline"></i>
                            </div>
                            <p class="notify-details">Caleb Flakelar commented on Admin
                                <small class="text-muted">1 min ago</small>
                            </p>
                        </a>
    
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon">
                                <img src="../assets/images/users/user-4.jpg" class="img-fluid rounded-circle" alt="" /> </div>
                            <p class="notify-details">Karen Robinson</p>
                            <p class="text-muted mb-0 user-msg">
                                <small>Wow ! this admin looks good and awesome design</small>
                            </p>
                        </a>
    
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-warning">
                                <i class="mdi mdi-account-plus"></i>
                            </div>
                            <p class="notify-details">New user registered.
                                <small class="text-muted">5 hours ago</small>
                            </p>
                        </a>
    
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-info">
                                <i class="mdi mdi-comment-account-outline"></i>
                            </div>
                            <p class="notify-details">Caleb Flakelar commented on Admin
                                <small class="text-muted">4 days ago</small>
                            </p>
                        </a>
    
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-secondary">
                                <i class="mdi mdi-heart"></i>
                            </div>
                            <p class="notify-details">Carlos Crouch liked
                                <b>Admin</b>
                                <small class="text-muted">13 days ago</small>
                            </p>
                        </a>
                    </div>
    
                    <!-- All-->
                    <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                        View all
                        <i class="fe-arrow-right"></i>
                    </a>
    
                </div>
            </li>
                </ul>
        </div>

        


        <div class="col-5 col-md-2 fluid-col profile-col">
            <div class="extra">
                @auth
                <div class="custom-dropdown profile">
                    <a href="javascript:void(0);" class="menu-trigger">
                        <p class="pro-user-name m-0">
                            <span>{{ Auth::user()->name }}</span><i class="mdi mdi-chevron-down mx-1"></i>
                        </p>
                        @if(isset(Auth::user()->profileImage))
                            <img async src="{{assetUrl(Auth::user()->profileImage)}}" class="avatar-sm round-icon">
                        @else
                            <span class="round-icon"><i class="fa fa-user"></i></span><i class="mdi mdi-chevron-down mx-1"></i>
                        @endif
                    </a>
                    <div class="custom-dropdown-menu">
                        @if(Auth::user()->type=="admin" || Auth::user()->type=="exhibiter")
                            <a href="{{ url("/") }}" class="dropdown-item notify-item">
                                <i class="fa fa-cog mr-1"></i> <span>Admin Panel</span>
                            </a>
                            <div class="dropdown-divider"></div>
                        @endif
                        <a class="dropdown-item notify-item" href="{{ route('attendeeLogout',$event_name) }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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
                    <a class="" href="{{ route("login") }}" aria-expanded="false">Login</a>
                </div>
                @endguest
            </div>
        </div>
    </div>
</div>
<!-- end Topbar -->
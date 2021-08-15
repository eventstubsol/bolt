<div class="navbar-custom navs hidden theme-nav">
    <div class="container-fluid row">
        <div class="col-5 col-md-2 fluid-col logo-col">
            <div class="logo-box">
                <a class="logo area" data-link="lobby">
                    <img async src="{{ assetUrl(getField('logo')) }}" style="max-height: 50px;border-radius: 10px;padding: 0px;">
                </a>
            </div>
        </div>
        @php
            $menus = App\Menu::where('type','nav')->where('parent_id','0')->where('status','1')->orderBy('position','asc')->get();
        @endphp
        <div class="col-2 col-md-8 fluid-col menu-col">
           <ul class="menu">
                @foreach($menus as $menu)
                    @if($menu->sub == '0')
                        @if($menu->name == 'Library')
                            @if(isOpenForPublic("swagbag"))
                               <li><a data-toggle="modal" data-target="{{ $menu->link }}"><i class="{{ $menu->iClass }}"></i>{{ $menu->name }}</a></li>
                            @else
                               <li><a disabled><i class="{{ $menu->iClass }}"></i>{{ $menu->name }}</a></li>
                            @endif
                        @elseif($menu->name == 'Schedule')
                            <li><a data-toggle="modal" data-target="{{ $menu->link }}"><i class="{{ $menu->iClass }}"></i>{{ $menu->name }}</a></li>
                        @elseif($menu->name == 'SwagBag')
                            @if(isOpenForPublic("swagbag"))
                                <li><a data-toggle="modal" data-target="#swagbag-modal"><i class="fe-shopping-bag"></i>SwagBag</a></li>
                             @else
                                <li><a data-toggle="modal" disabled><i class="fe-shopping-bag"></i>SwagBag</a></li>
                            @endif
                       
                        @elseif($menu->name == 'Leaderboard')
                            @if(isOpenForPublic("leaderboard"))
                                <li><a class="area" data-link="{{ $menu->link }}"><i class="{{ $menu->iClass }}"></i>{{ $menu->name }}</a></li>
                            @else
                                <li><a class="area" disabled><i class="{{ $menu->link }}"></i>{{ $menu->name }}</a></li>
                            @endif
                        @elseif($menu->name == 'Personal Agenda')
                            <li><a data-toggle="modal" id="agenda" data-target="#personal-schedule-modal"><i class="fe-calendar"></i>Personal Agenda</a></li>
                        @else
                            <li><a data-link="{{ $menu->link }}" class="area"><i class="{{ $menu->iClass }}"></i>{{ $menu->name }}</a></li>
                        @endif
                    @else
                         <li class="custom-dropdown not-booth-menu">
                            <a class="area">
                            <i class="{{ $menu->iClass }}"></i>
                            {{ $menu->name }}
                            </a>
                        <div class="custom-dropdown-menu">
                            @foreach(App\Menu::where('parent_id',$menu->id)->orderBy('position','asc')->get() as $submenu)
                                @if($submenu->name == 'HEALTH PAVILION')    
                                    <a class="dropdown-item" href="{{ $submenu->link }}">{{ $submenu->name }}</a>
                                @else
                                    <a class="area dropdown-item" data-link="{{ $submenu->link }}">{{ $submenu->name }}</a>
                                @endif
                            @endforeach
                        </div>
                        </li>
                    @endif
                    
                @endforeach
             

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
                    <a class="" href="{{ route("login") }}" aria-expanded="false">Login</a>
                </div>
                @endguest
            </div>
        </div>
    </div>
</div>
<!-- end Topbar -->
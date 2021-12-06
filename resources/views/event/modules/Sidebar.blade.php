@php
$menus = App\Menu::where('type','nav')->where('event_id',$event_id)->where('parent_id','0')->where('status','1')->orderBy('position','asc')->get();

@endphp
<div class="sidebar-custom navs hidden theme-nav">
    <div class="scroller" data-simplebar>
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
             @elseif($menu->name == 'attendees')
                 <li><a class="area" data-link="attendees"><i class="fe-users"></i>Business Connect</a></li>
             @else
                 <li >   
                     {!! getMenuLink($menu) !!}
                 </li>
             @endif
         @endforeach
        </ul>
        @php
            $footers = App\Menu::where('type','footer')->where('event_id',$event_id)->where('status','1')->where('parent_id','0')->orderBy('position','asc')->get()->load(["submenus"]);

        @endphp

        <ul class="menu">
            
            @foreach($footers as $footer)
               
                      @if($footer->name == 'Polls')
                            
                            <li class="not-booth-menu"><a href="javascript:void(0);" id="poll_toggle" data-toggle="modal" data-target="#poll-modal"><i class="fas fa-poll"></i>Polls</a></li>
                        @elseif($footer->name == 'Q&A')
                        
                            <li class="not-booth-menu"><a href="javascript:void(0);" data-toggle="modal" data-target="{{ $footer->link }}"><i class="{{ $footer->iClass }}"></i>Q&A</a></li>
                        
                            @elseif($footer->name == 'Announcements')
                        
                            <li class="not-booth-menu"><a href="javascript:void(0);" data-toggle="modal" data-target="#announcement-modal"><i class="{{ $footer->iClass }}"></i>Annoucements</a></li>

                           @else
                           <li class="custom-dropdown not-booth-menu"> 
                                {!! getMenuLink($footer) !!}
                                    <ul>
                                        <li>
                               
                                        @foreach($footer->submenus as $submenu)
                                            @if($submenu->status)
                                                {!! getMenuLink($submenu) !!}
                                            @endif
                                        @endforeach
               
                                        </li>
                                    </ul>
                           </li>
                           
                        @endif
                     
                
            @endforeach
            <li class="hidden" id="notbooth_menu_toggle" >
                <a href="javascript:void(0);" style="font-size: 22px">
                    <i class="mdi mdi-chevron-left-circle"></i>
                </a>
            </li>
            <li class="booth-menu hidden">
                <a href="javascript:void(0);" data-modal="description-modal-" class="modal-toggle booth_description">
                    <i class="mdi mdi-note-text" style="font-size: 22px;"></i>
                    Description
                </a>
            </li>
            <li class="booth-menu hidden">
                <a href="javascript:void(0);" data-modal="videolist-modal-" class="modal-toggle booth_videos">
                    <i class="mdi mdi-play" style="font-size: 22px;"></i>
                    Videos
                </a>
            </li> 
            <li class="booth-menu hidden">
                <a href="javascript:void(0);" data-modal="resourcelist-modal-" class="modal-toggle booth_resources">
                    <i class="mdi mdi-file-pdf" style="font-size: 22px;"></i>
                    Resources
                </a>
            </li>
            <li class="booth-menu hidden">
                <a href="javascript:void(0);" class="show-interest">
                    <i class="mdi mdi-file-pdf" style="font-size: 22px;"></i>
                    Show Interest
                </a>
            </li>
            <li class="booth-menu hidden">
                <a href="javascript:void(0);"  data-modal="book-a-call-modal-" class="modal-toggle booth_call_booking">
                    <i class="mdi mdi-calendar" style="font-size: 22px;"></i>
                    Book a Call
                </a>
            </li>

    </ul>
        {{-- <ul class="menu">
         
            <li>
                <a class="area" data-link="auditorium">
                    <i class="menu-icon live"></i>
                    SESSION ROOMS
                </a>
                <ul>
                    <li>
                        <a class="area dropdown-item" data-link="page/Grand_Ballroom_Lobby">GRAND BALLROOM</a>
                        <a class="area dropdown-item" data-link="page/Workshop_Lobby">WORKSHOPS</a>
                        <a class="area dropdown-item" data-link="sessionroom/Plenary_Sessions">PLENARY SESSIONS</a>


                    </li>
                    <!-- <li>
                        <a class="area dropdown-item" data-link="sessions-list/peek_behind_corporate_veil">Peek Behind The Corporate Hall</a>
                    </li>
                    <li>
                        <a class="area dropdown-item" data-link="sessions-list/fireside_chat">Fireside Chat</a>
                    </li> -->
                </ul>
            </li>
            <li class="custom-dropdown">
                <a class="area">
                    <i class="menu-icon expo"></i>
                    Expo Hall
                </a>
                <ul>
                    <li>
                        <a class="area dropdown-item" data-link="page/Vendor_Floor">VENDOR HALL</a>
                        <a class="dropdown-item" href="https://wac45.eventsibles.live/event#sessionroom/Health_Pavilion_Stage">HEALTH PAVILION</a>
                        <a class="area dropdown-item" data-link="page/sponsor_floor">SPONSOR HALL</a>
                        <a class="area dropdown-item" data-link="booth_directory">BOOTH DIRECTORY</a>
                    </li>
                </ul>
            </li>
          
            <li><a href="javascript:void(0);" data-link="page/Info_Desk" class="area"><i class="fe-info"></i>Info Desk</a></li>
            <li><a href="javascript:void(0);" data-link="lobby" class="area"><i class="fe-home"></i>Lobby</a></li>
            <li><a data-toggle="modal" data-target="#resources-modal"><i class="fe-folder"></i>Library</a></li>
            <li><a data-toggle="modal" data-target="#schedule-modal"><i class="fe-calendar"></i>Schedule</a></li>
            <li><a data-toggle="modal" data-target="#workshop-schedule-modal"><i class="fe-calendar"></i>Workshop</a></li>
            <li><a data-toggle="modal" data-target="#swagbag-modal"><i class="fe-shopping-bag"></i>SwagBag</a></li>
            <li><a class="area" data-link="leaderboard"><i class="fe-bar-chart"></i>Leaderboard</a></li>
            <li>
                <a class="area" data-link="attendees"><i class="fe-users"></i>LINKS CONNECT</a>
            </li>
            <li>
                 <a href="javascript:void(0);" class="area" data-link="page/Links_Lounge">
                        <i class="menu-icon lounge"></i>
                        LINKS LOUNGE
                    </a>
             </li>
            <li><a data-toggle="modal" id="agenda" data-target="#personal-schedule-modal"><i class="fe-calendar"></i>Personal Agenda</a></li>


        </ul> --}}
    </div>
</div>
<!-- end Topbar -->
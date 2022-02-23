<style>
    a .badge {
  position: absolute;
  top: -10px;
  right: -10px;
  padding: 5px 10px;
  border-radius: 50%;
  background: red;
  color: white;
}
.custom-dropdown-menu a i{
    font-size: 18px !important;
}    
.custom-dropdown-menu a{
    display: flex;
    flex-direction: row !important;
}
</style>
@php
    $footers = App\Menu::where('type','footer')->where('event_id',$event_id)->where('status','1')->where('parent_id','0')->orderBy('position','asc')->get()->load(["submenus"]);
    $event = App\Event::findORFail($event_id);
@endphp
<style>
    /* .row .menu{
        background:{{ $event->primary_color }};
    } */
    /* .row .menu a:hover{
        background: {{ $event->secondary_color }};
    } */
    .row .menu a:hover {
        color: {{ $event->secondary_color }};
    }
    /* .row .menu .ToggleData:hover {
        color: {{ $event->secondary_color }};
    } */
    .menu-custom .menu li a:hover{
        color: {{ $event->secondary_color }};
    }
</style>
<div class="menu-custom navs hidden theme-nav" >
    <div class="container-fluid row">
        <ul class="menu">
            
                @foreach($footers as $footer)
                   
                          @if($footer->name == 'Polls')
                                
                                <li class="not-booth-menu"><a href="javascript:void(0);" id="poll_toggle" data-toggle="modal" data-target="#poll-modal"><i class="fas fa-poll"></i>Polls</a></li>
                            @elseif($footer->name == 'Q&A')
                            
                                <li class="not-booth-menu"><a href="javascript:void(0);" data-toggle="modal" data-target="{{ $footer->link }}"><i class="{{ $footer->iClass }}"></i>Q&A</a></li>
                            
                                @elseif($footer->name == 'Announcements')
                            
                                <li class="not-booth-menu"><a href="javascript:void(0);" class="ToggleData" data-toggle="modal" data-target="#announcement-modal"><i class="ToggleData" class="{{ $footer->iClass }}"></i>Annoucements</a></li>

                               @else
                               <li class="custom-dropdown not-booth-menu"> 
                                    {!! getMenuLink($footer) !!}
                                        @if(count($footer->submenus) )
                                            <div class=" custom-dropdown-menu">
                                                @foreach($footer->submenus as $submenu)
                                                    @if($submenu->status)
                                                        {!! getMenuLink($submenu) !!}
                                                    @endif
                                                @endforeach
                                            </div>
                                        @endif
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
    </div>
</div>
<!-- end Topbar -->
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>


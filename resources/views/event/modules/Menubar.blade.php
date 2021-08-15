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
</style>
@php
    $footers = App\Menu::where('type','footer')->where('status','1')->where('parent_id','0')->orderBy('position','asc')->get();

@endphp
<div class="menu-custom navs hidden theme-nav">
    <div class="container-fluid row">
        <ul class="menu">
            
                @foreach($footers as $footer)
                    @if($footer->sub == 1)
                        <li class="custom-dropdown not-booth-menu">
                            <a class="area">
                            <i class="{{ $footer->iClass }}"></i>
                            {{ $footer->name }}
                            </a>
                        <div class="custom-dropdown-menu">
                            @foreach(App\Menu::where('parent_id',$footer->id)->orderBy('position','asc')->get() as $submenu)
                                @if($submenu->name == 'HEALTH PAVILION')    
                                    <a class="dropdown-item" href="{{ $submenu->link }}">{{ $submenu->name }}</a>
                                @else
                                    <a class="area dropdown-item" data-link="{{ $submenu->link }}">{{ $submenu->name }}</a>
                                @endif
                            @endforeach
                        </div>
                        </li> 
                    @else
                        <li class="not-booth-menu">
                            @if($footer->name == 'LINKS LOUNGE')
                                @if(isOpenForPublic("lounge"))
                                    <a href="javascript:void(0);" class="area" data-link="{{ $footer->link }}">
                                        <i class="{{ $footer->iClass }}"></i>
                                        {{ $footer->name }}
                                    </a>
                                @else
                                    <a href="javascript:void(0);" class="area" disabled>
                                        <i class="{{ $footer->iClass }}"></i>
                                        LINKS LOUNGE
                                    </a>
                                @endif
                            @elseif($footer->name == 'LINKS CONNECT')
                                <a class="area" data-link="{{ $footer->link }}"><i class="{{ $footer->iClass }}"></i>{{ $footer->name }}</a>
                            @elseif($footer->name == 'Polls')
                                
                                <li><a href="javascript:void(0);" data-toggle="modal" data-target="#poll-modal"><i class="fas fa-poll"></i>Polls</a></li>
                            @elseif($footer->name == 'Q&A')
                            
                                <li><a href="javascript:void(0);" data-toggle="modal" data-target="{{ $footer->link }}"><i class="{{ $footer->iClass }}"></i>Q&A</a></li>
                            
                                @elseif($footer->name == 'Announcements')
                            
                                <li><a href="javascript:void(0);" data-toggle="modal" data-target="#announcement-modal"><i class="{{ $footer->iClass }}"></i>Annoucements</a></li>

                               
                            @else
                                <a class="area" data-link="{{ $footer->link }}"><i class="{{ $footer->iClass }}"></i>{{ $footer->name }}</a>
                            @endif
                        </li>
                        
                         
                    @endif
                    
                @endforeach

        </ul>
    </div>
</div>
<!-- end Topbar -->
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>


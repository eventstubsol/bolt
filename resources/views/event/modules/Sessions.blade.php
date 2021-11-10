@foreach($sessionrooms as $roomgroup => $rooms)
    @foreach($rooms as $room)
    @php 
        $i = 0;
    @endphp
        @foreach($access_specifiers as $room_id => $room_access)
            @php 
                $i++;
            @endphp
            @if((@Auth::user()->type ==="admin" && $i<2)  ||(in_array(Auth::user()->type,$room_access) && ( Auth::user()->subtype ? in_array(Auth::user()->subtype,$room_access) : true  ) && ($room_id === $room->id)))

            
                <div class="page" id="sessionroom-{{$room->name}}">
                    <div class="position-relative" style="height:100vh;">
                        @if(isset($room->videoBg))
                        
                        <video class="full-width-videos room_video video-{{ $room->name }}" src="{{$room->videoBg?assetUrl($room->videoBg->url):''}}" id="session_room_video" autoplay muted loop></video>
                        @elseif(isset($room->background->url))
                        <img async src="{{ assetUrl($room->background->url??'') }}" class="{{$roomgroup}} positioned booth-bg" alt="">
                        @endif
                    
                            <div class="positioned" id="play-session-{{$room->name}}" style="{{ areaStyles([$room->top,$room->left,$room->width,$room->height]) }};display:flex;align-items: center; justify-content: center;cursor: pointer;">
                            </div>
                        {!! getScavengerItems($room->name) !!}
                    </div>
                </div>
                <div data-backdrop="static"  class="modal fade embed-modal slido-container-modal" id="session-modal-{{$room->name}}" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <div class="modal-body">
                                <div class="position-relative">
                                    <div style="padding-bottom: {{ AUDI_IMAGE_ASPECT }}%"></div>
                                    <div id="session-content-{{$room->name}}" class="positioned fill" ></div>
                                    <!-- <div class="slido-panel" id="slido-panel"></div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            @endif
        @endforeach
    @endforeach
    @if($roomgroup!=='auditorium' && $roomgroup!=='Auditorium')
        <div class="modal fade embed-modal" id="session-list-{{$roomgroup}}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <div class="modal-body">
                        <div class="position-relative">
                           <h4>
                               {{ $roomgroup === 'peek_behind_corporate_veil' ? 'PEEK BEHIND THE CORPORATE VEIL' : strtoupper(str_replace("_"," ",$roomgroup)) }}
                           </h4> 
                           <ul class="nav nav-pills custom-navpills navtab-bg nav-justified" style="margin: 0px -5px;">
                                 @foreach($rooms as $room)
                                    <li class="nav-item">
                                        <a class="area nav-link" data-link="sessionroom/{{ $room->name }}">
                                            {{  str_replace("Inc","Inc.",ucfirst(str_replace("_"," ",$room->name))) }}
                                        </a>  
                                    </li>
                                @endforeach                
                            </ul>
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endforeach


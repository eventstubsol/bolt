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
                        @foreach($room->links as $link)

                            @php
                            $area = [$link->top,$link->left,$link->width,$link->height];
                            



                            $to = "";
                            $url = "";
                            switch($link->type)
                            {
                                case "zoom":
                                case "booth":
                                case "custom_page":
                                case "chat_user":
                                case "chat_group":
                                case "pdf":
                                case "lobby":
                                case "faq":
                                case "modal":
                                case "photobooth":
                                case "lounge":
                                    $to = $link->to;
                                    $url = $link->url;
                                    break;
                                case "session_room":
                                    $to = "sessionroom/".$link->to;
                                    break;
                                case "page":
                                    $to = "page/".$link->to;
                                    break;
                                case "post":
                                    $to = "post_".$link->to;
                                    break;

                            }


                            @endphp
                                @if(isset($link->background[0]))
                                        <div class="positioned" style="{{ areaStyles($area) }}  perspective:{{$link->perspective}}px;" >
                                            <div style="@if($link->rotationtype === 'X') transform: rotatex({{$link->rotation}}deg); @else transform: rotatey({{$link->rotation}}deg); @endif" class="carousel slide h-100" data-ride="carousel" data-interval="3000" data-pause="false">
                                                <div class="carousel-inner h-100" >
                                                    @foreach($link->background as $id => $bgimage)
                                                        <div class="carousel-item h-100 @if($id==0) active @endif">
                                                            <img async class="d-block img-fluid h-100 w-100" style="object-fit:cover;" src="{{assetUrl($bgimage->url)}}" alt="First slide">
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>

                                @endif
                            @if($link->type === "zoom")
                            <a title="{{ $link->name }}" class="positioned zoom_urls" style="{{ areaStyles($area) }}" href="{{ $link->to }}" target="_blank"></a>
                            @elseif($link->type === "booth")
                                <div title="{{$link->name}}"  data-flyin="{{ $link->flyin ? assetUrl($link->flyin->url) : '' }}"  class="area candidate-booth positioned" style="{{ areaStyles($area) }}" data-link="booth/{{$link->to}}">
                                </div>   
                            @elseif($link->type === "chat_user")
                                <div title="{{ $link->name  }}" class="positioned chat_user" data-link="{{ $to }}" style="{{ areaStyles($area) }}; background: transparent; cursor:pointer;">    </div>
                            @elseif($link->type === "chat_group")
                                <div title="{{ $link->name  }}" class="positioned chat_group" data-link="{{ $to }}" style="{{ areaStyles($area) }}; background: transparent; cursor:pointer;">    </div>
                            @elseif($link->type === "pdf")
                                <div title="{{ $link->name  }}" class="positioned _df_button" source="{{ assetUrl($to) }}" style="{{ areaStyles($area) }}; background: transparent;cursor:pointer;">    </div>
                            @elseif($link->type === "photobooth")
                                <div title="{{ $link->name  }}"  class="photobooth positioned area" data-link="photo-booth" data-capture="{{$link->to}}" data-gallery="{{$link->url}}" style="{{ areaStyles($area) }}">    
                                </div>
                            @elseif($link->type === "videosdk")
                                <div title="{{ $link->name  }}" data-toggle="modal"  data-target="#videosdk_modal" class="videosdk positioned " data-link="videosdk" data-meeting="{{$link->to}}" style="{{ areaStyles($area) }}">    
                                </div>
                            @elseif($link->type === "post")
                                <a title="{{ $link->name  }}" data-toggle="modal"  data-target="#{{$to}}" class="_custom_modal positioned "  style="{{ areaStyles($area) }}">    
                                </a>
                            @elseif($link->type === "modal")
                                <a title="{{ $link->name  }}" data-toggle="modal"  data-target="#{{$to}}" class="_custom_modal positioned "  style="{{ areaStyles($area) }}">    
                                </a>
                            @elseif($link->type === "lounge")
                                <a title="{{ $link->name  }}" data-link="networking"  class="_custom_modal positioned area"  style="{{ areaStyles($area) }}">    
                                </a>
                            @else
                                @if($to ==="FAQ")
                                    <a class="positioned" data-toggle="modal" data-target="#faqs-modal"
                                        title="FAQs"
                                        style="{{ areaStyles($area) }}; background: transparent; cursor:pointer;"
                                    ></a>
                                @else
                                    <div title="{{ $link->name  }}" data-flyin="{{ $link->flyin ? assetUrl($link->flyin->url) : '' }}" class="positioned @if($link->type != "vimeo") area @endif" data-link="{{ $to }}" style="{{ areaStyles($area) }}">    
                                        @if(isset($link->location_status) && $link->location_status)
                                            <div class="positionBlock centerBottom">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="red" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                                        <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                                                    </svg>
                                                </span>
                                                {{-- <p>{{ $link->name}}  </p> --}}
                                            </div> 
                                        @endif
                                        @if($link->type === "vimeo")
                                        <a class="video-play positioned fill" href="{{ $link->to }}">
                                            <div class="d-flex  positioned h-100 w-100">
                                                {{-- <i class="mdi mdi-play-circle" style="z-index: 2;font-size: 3vw; margin: auto;"></i> --}}
                                            </div>
                                        </a>
                                        @endif
                                    </div>
                                @endif
                            @endif

                            
                    @endforeach
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


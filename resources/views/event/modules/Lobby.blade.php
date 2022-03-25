<div class="page" id="lobby">
    <div class="video-container positioned">
        <video class="full-width-videos" src="{{ assetUrl(getFieldId('main_lobby_video',$event_id)) }}" id="lobby_view" autoplay muted loop poster="{{ assetUrl(getFieldId('main_lobby_image',$event_id)) }}"></video>
        @if($event->lobby_audio)
            <audio id="audio_new"  src="{{assetUrl($event->lobby_audio)}}" ></audio>
        @endif
        @foreach(getLobbyLinks($event_id) as $link)

                @php
                $area = [$link->top,$link->left,$link->width,$link->height];




                $to = "";
                $url = "";
                switch($link->type)
                {
                    case "custom_page":
                    case "zoom":
                    case "booth":
                    case "lobby":
                    case "faq":
                    case "modal":
                    case "photobooth":
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
                    <div title="{{$link->name}}" data-flyin="{{ $link->flyin ? assetUrl($link->flyin->url) : '' }}" class="area candidate-booth positioned" style="{{ areaStyles($area) }}" data-link="booth/{{$link->to}}">
                    </div>   
                @elseif($link->type === "pdf")
                    <div title="{{ $link->name  }}" class="positioned _df_button" source="{{ assetUrl($to) }}" style="{{ areaStyles($area) }}; background: transparent;cursor:pointer;">    </div>
                @elseif($link->type === "photobooth")
                    <div title="{{ $link->name  }}"  class="photobooth positioned area" data-link="photo-booth" data-capture="{{$link->to}}" data-gallery="{{$link->url}}" style="{{ areaStyles($area) }}">    
                    </div>
                @elseif($link->type === "videosdk")
                    <div title="{{ $link->name  }}" data-toggle="modal"  data-target="#videosdk_modal" class="videosdk positioned " data-link="videosdk" data-meeting="{{$link->to}}" style="{{ areaStyles($area) }}">    
                    </div>
                @elseif($link->type === "modal")
                    <a title="{{ $link->name  }}" data-toggle="modal"  data-target="#{{$to}}" class="_custom_modal positioned "  style="{{ areaStyles($area) }}">    
                    </a>
                @elseif($link->type === "post")
                    <a title="{{ $link->name  }}" data-toggle="modal"  data-target="#{{$to}}" class="_custom_modal positioned "  style="{{ areaStyles($area) }}">    
                    </a>
                @elseif($to ==="FAQ")
                    <a class="positioned" data-toggle="modal" data-target="#faqs-modal"
                        title="FAQs"
                        style="{{ areaStyles($area) }}; background: transparent; cursor:pointer;"
                    ></a>
                @else
                    <div title="{{ $link->name  }}" data-flyin="{{ $link->flyin ? assetUrl($link->flyin->url) : '' }}" class="positioned area" data-link="{{ $to }}" style="{{ areaStyles($area) }}">    
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
                                {{-- <i class="mdi mdi-play-circle" style="z-index: 2;font-size: 2vw; margin: auto;"></i> --}}
                            </div>
                        </a>
                        @endif
                    </div>
                @endif


                @endforeach
        {!! getLobbyItems($event_id) !!}
    </div>
</div>
<div class="page" id="lobby">
    <div class="video-container positioned">
        <video class="full-width-videos" src="{{ assetUrl(getFieldId('main_lobby_video',$event_id)) }}" id="lobby_view" autoplay muted loop poster="{{ assetUrl(getFieldId('main_lobby_image',$event_id)) }}"></video>
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

                }


                @endphp
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
                @elseif($to ==="FAQ")
                    <a class="positioned" data-toggle="modal" data-target="#faqs-modal"
                        title="FAQs"
                        style="{{ areaStyles($area) }}; background: transparent; cursor:pointer;"
                    ></a>
                @else
                    <div title="{{ $link->name  }}" data-flyin="{{ $link->flyin ? assetUrl($link->flyin->url) : '' }}" class="positioned area" data-link="{{ $to }}" style="{{ areaStyles($area) }}">    
                        @if($link->type === "vimeo")
                        <a class="video-play positioned fill" href="{{ $link->to }}">
                            <div class="d-flex  positioned h-100 w-100">
                                <i class="mdi mdi-play-circle" style="z-index: 2;font-size: 2vw; margin: auto;"></i>
                            </div>
                        </a>
                        @endif
                    </div>
                @endif


                @endforeach
        {!! getLobbyItems($event_id) !!}
    </div>
</div>
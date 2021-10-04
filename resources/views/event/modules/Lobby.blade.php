<div class="page" id="lobby">
    <div class="video-container positioned">
        <video class="full-width-videos" src="{{ assetUrl(getFieldId('main_lobby_video',$event_id)) }}" id="lobby_view" autoplay muted loop poster="{{ assetUrl(getFieldId('main_lobby_video_static',$event_id)) }}"></video>
        @foreach(getLobbyLinks($event_id) as $link)

                @php
                $area = [$link->top,$link->left,$link->width,$link->height];




                $to = "";
                switch($link->type)
                {
                    case "custom_page":
                    case "zoom":
                    case "booth":
                        $to = $link->to;
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
@foreach($pages as $page)
<div class="page" data-chat="{{$page->name}}" id="page-{{$page->name}}">
    <div class="position-relative" style="height:100vh;">
        @if($page->videoBg)
            <video muted class="full-width-videos page_video video-{{ $page->name }}" src="{{$page->videoBg?assetUrl($page->videoBg->url):''}}" loop ></video>
        @elseif(isset($page->images[0]->url))
            <img async src="{{ assetUrl($page->images[0]->url??'') }}" class=" positioned booth-bg" alt="">
        @endif
        @foreach($page->links as $link)

        @php
        $area = [$link->top,$link->left,$link->width,$link->height];
        



        $to = "";
        switch($link->type)
        {
            case "zoom":
            case "booth":
            case "custom_page":
            case "chat_user":
            case "chat_group":
            case "pdf":
            case "lobby":
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
            <div title="{{$link->name}}" class="area candidate-booth positioned" style="{{ areaStyles($area) }}" data-link="booth/{{$link->to}}">
            </div>   
        @elseif($link->type === "chat_user")
            <div title="{{ $link->name  }}" class="positioned chat_user" data-link="{{ $to }}" style="{{ areaStyles($area) }}; background: transparent; cursor:pointer;">    </div>
        @elseif($link->type === "chat_group")
            <div title="{{ $link->name  }}" class="positioned chat_group" data-link="{{ $to }}" style="{{ areaStyles($area) }}; background: transparent; cursor:pointer;">    </div>
        @elseif($link->type === "pdf")
            <div title="{{ $link->name  }}" class="positioned _df_button" source="{{ assetUrl($to) }}" style="{{ areaStyles($area) }}; background: transparent;cursor:pointer;">    </div>
        @else
            @if($to ==="FAQ")
                <a class="positioned" data-toggle="modal" data-target="#faqs-modal"
                    title="FAQs"
                    style="{{ areaStyles($area) }}; background: transparent; cursor:pointer;"
                ></a>
            @else
                <div title="{{ $link->name  }}" data-flyin="{{ $link->flyin ? assetUrl($link->flyin->url) : '' }}" class="positioned area" data-link="{{ $to }}" style="{{ areaStyles($area) }}">    
                    @if($link->type === "vimeo")
                    <a class="video-play positioned fill" href="{{ $link->to }}">
                        <div class="d-flex  positioned h-100 w-100">
                            <i class="mdi mdi-play-circle" style="z-index: 2;font-size: 3vw; margin: auto;"></i>
                        </div>
                    </a>
                    @endif
                </div>
            @endif
        @endif

        
  @endforeach
        {!! getTreasureItems($page->treasures,$page->name) !!}
</div>
</div>
@endforeach
@if(isOpenForPublic("booths"))
@foreach($booths as $booth)
    <div class="page  booth" data-name="{{ $booth->name }}" id="booth-{{ $booth->id }}">
        <div data-test="{{$booth->vidbg_url}}" class="position-relative" style="height:100vh">
            @if(isset($booth->vidbg_url))
            <video class="full-width-videos booth_video video-{{ $booth->id }}" src="{{assetUrl($booth->vidbg_url)}}" id="session_room_video" autoplay muted loop></video>
            @elseif(isset($booth->boothurl))
            <img async src="{{ assetUrl($booth->boothurl) }}" class="positioned booth-bg" alt="">
            @endif

            @foreach($booth->links as $link)

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
                    case "modal":
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
                @elseif($link->type === "modal")
                    <a title="{{ $link->name  }}" data-toggle="modal"  data-target="#{{$to}}" class="_custom_modal positioned "  style="{{ areaStyles($area) }}">    
                    </a>
                @elseif($link->type === "pdf")
                    <div title="{{ $link->name  }}" class="positioned _df_button" source="{{ assetUrl($to) }}" style="{{ areaStyles($area) }}; background: transparent;cursor:pointer;">    </div>
                @else
                    @if($to ==="FAQ")
                        <a class="positioned" data-toggle="modal" data-target="#faqs-modal"
                            title="FAQs"
                            style="{{ areaStyles($area) }}; background: transparent; cursor:pointer;"
                        ></a>
                    @else
                        <div title="{{ $link->name  }}" class="positioned @if($link->type != "vimeo") area @endif" data-link="{{ $to }}" style="{{ areaStyles($area) }}">    
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
        
        </div>
    </div>
        <div class="modal fade" id="videolist-modal-{{$booth->id}}" tabindex="-1" role="dialog"aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Videos</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
               @if(count($booth->videos))
                    <table class="table table-bordered  ">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th class="text-right">Link</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($booth->videos as $video)
                            @if($video->title != "brandvideo")
                                <tr>
                                <td>{{ $video->title }}</td>
                                <td class="text-right">
                                    <a class="btn theme-btn primary video-play" href="{{ $video->url }}" >View Now</a>
                                </td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" id="description-modal-{{$booth->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog  modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Description</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="tab-pane show active">
                    <div id="description-{{ $booth->id }}"></div>
                    @if(strlen($booth->url)>1)
                        <p>Website: <a target="_blank" href="{{ $booth->url  }}">{{ $booth->url }}</a></p>
                    @endif
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" id="description-two-modal-{{$booth->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog  modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Firm Attendees</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="tab-pane show active">
                    <div id="description-two-{{ $booth->id }}"></div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" id="resourcelist-modal-{{$booth->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Resources</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
            @if(count($booth->resources))
                <table class="table table-bordered  ">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th class="text-right">Link</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($booth->resources as $resource)
                        <tr>
                            <td>{{ $resource->title }}</td>
                            <td class="text-right resource  r-{{$resource->id}} ">
                                <a class="btn theme-btn plain  mr-2 _df_button theme-btn primary" href="{{ assetUrl($resource->url) }}" title="{{$resource->title}}" source="{{ assetUrl($resource->url)}}" >View Now</a>
                                <button class="btn theme-btn primary add-to-bag add" data-resource="{{ $resource->id }}" type="button" name="button"> + SwagBag</button>
                                <button class="btn btn-danger add-to-bag remove hidden" data-resource="{{ $resource->id }}" type="button" name="button"> - SwagBag</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
    @if($booth->calendly_link)
<div class="modal fade book-a-call-modal" id="book-a-call-modal-{{$booth->id}}" data-name="{{ $booth->name }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="calendly-inline-widget" data-auto-load="false" style="min-width:320px;height:80vh;">
                    <script>
                        Calendly.initInlineWidget({
                            url: '{{ $booth->calendly_link }}?hide_landing_page_details=1',
                            prefill: {
                                name: "{{ $user->name }}",
                                email: "{{ $user->email }}",
                            }
                        });
                    </script>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
    @endif
@endforeach
@endif
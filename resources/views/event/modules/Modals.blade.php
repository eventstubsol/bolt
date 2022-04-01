@foreach($modals as $modal)
    <div class="modal fade theme-modal" id="{{$modal->id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="resourceslistLabel"><span class="image-icon resources"></span>{{$modal->name}}</h4>
                    <button  type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    
                </div>
                <div class="modal-body" >
                    @if($modal->embed_status)

                    {!! $modal->embed_code !!}

                    @else
                    @foreach($modal->items as $item)
                        @php
                            $type = $item->type;
                            $to = "";
                            $url = "";
                            switch($item->type)
                            {
                                case "pdf":
                                    $to = $item->to;
                                    break;
                                case "booth":
                                    $to = "booth/".$item->to;
                                    break;
                                case "session_room":
                                    $to = "sessionroom/".$item->to;
                                    break;
                                case "page":
                                    $to = "page/".$item->to;
                                    break;
                                case "vimeo":
                                    $to = $item->to;
                                    break;

                            }
                        @endphp
                        <div class="doc-lists resources-list" data-simplebar data-simplebar-auto-hide="false">

                            <div class="doc-item row justify-content-between align-items-center">
                                <div class="d-inline-flex align-items-center flex-grow-1">
                                    <div class="doc-title flex-grow-1"><h4 class="searchresource">{{$item->name}}</h4></div>
                                </div>
                                <div class="d-inline-flex">
                                    @if($type==="session_room" || $type==="page" || $type==="booth")
                                        <a data-link="{{$to}}"  class="area shubh btn theme-btn primary"> {{ $item->button_text}} </a>
                                    @elseif($type==="pdf")
                                        <a class="btn theme-btn primary   _df_button" source="{{assetUrl($to)}}"> {{ $item->button_text}} </a>
                                    @elseif($type==="vimeo")
                                        <a class="btn video-play theme-btn primary   " href="{{$to}}"> {{ $item->button_text}} </a>
                                    @endif
                                    {{-- <button class="btn primary-filled theme-btn text-white add-to-bag add" data-resource="{{ $resource->id }}" type="button" name="button"> + SwagBag</button> --}}
                                    {{-- <button class="btn danger theme-btn has-icon delete add-to-bag remove hidden" data-resource="{{ $resource->id }}" type="button" name="button"> SwagBag</button> --}}
                                </div>
                            </div>           
                        </div>           
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endforeach
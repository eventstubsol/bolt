@extends("layouts.admin")

@section("page_title")
Access Control
@endsection

@section("title")
Access Control
@endsection
@section("content")
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">



                <button id="checkall" class="btn btn-primary">Check All</button>
                <form action="{{ route("access.store",['id'=>$id]) }}" method="post">
                    {{ csrf_field() }}

                    <div class="col-xl-6">
                        <div class="accordion custom-accordion" id="custom-accordion-one">
                            @foreach($user_types as $ids => $user_type)
                            <div class="card mb-0">
                                <div class="card-header" id="headingNine">
                                    <h5 class="m-0 position-relative">
                                        <a class="custom-accordion-title text-reset d-block collapsed" data-bs-toggle="collapse" href="#user-{{$ids}}" aria-expanded="false" aria-controls="collapseNine">
                                            {{$user_type}} <i class="mdi mdi-chevron-down accordion-arrow"></i>
                                        </a>
                                    </h5>
                                </div>

                                <div id="user-{{$ids}}" class="px-2 mb-5 pt-3" aria-labelledby="headingFour" data-bs-parent="#custom-accordion-one" style="">
                                    <h1>Pages</h1>
                                    @foreach($pages as $page)
                                    @php
                                    $checked = false;
                                    if(isset($access_all[$user_type]) ){
                                    if( in_array($page->id,$access_all[$user_type])){
                                    $checked = true;
                                    }
                                    }
                                    @endphp
                                    <div class=" px-3 d-inline-block ">
                                        <input type="checkbox" @if($checked) checked @endif name="pages-{{str_replace(' ','_',$user_type)}}[]" value="{{$page->id}}" class="form-check-input" id="{{$user_type}}-{{$page->id}}"> <label for="{{$user_type}}-{{$page->id}}">{{$page->name}}</label>
                                    </div>
                                    @endforeach
                                    <h1>Session Rooms</h1>
                                    @foreach($session_rooms as $room)
                                    @php
                                    $checked = false;
                                    if(isset($access_all[$user_type]) ){
                                    if( in_array($room->id,$access_all[$user_type])){
                                    $checked = true;
                                    }
                                    }
                                    @endphp
                                    <div class=" px-3 d-inline-block ">
                                        <input type="checkbox" @if($checked) checked @endif name="rooms-{{str_replace(' ','_',$user_type)}}[]" value="{{$room->id}}" class="form-check-input" id="{{$user_type}}-{{$room->id}}"> <label for="{{$user_type}}-{{$room->id}}">{{$room->name}}</label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @endforeach


                        </div>
                    </div>


                    <div>
                        <input class="btn btn-primary" type="submit" value="Save" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>


@endsection

@section("scripts")
<script>
    $("#checkall").on("click", () => {
        $('input:checkbox').prop('checked', true);
    })
</script>
@endsection
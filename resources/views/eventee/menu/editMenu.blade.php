@extends("layouts.admin")

@section("page_title")
Update Menu
@endsection

@section("title")
Update Menu
@endsection


@section("styles")
@include("includes.styles.select")

@include("includes.styles.fileUploader")
<link href="{{ asset('/dflip/css/themify-icons.css') }}?cb=1611083902568" rel="stylesheet" type="text/css">
<link href={{ asset('assets/css/icons.min.css') }} rel="stylesheet" type="text/css" />\

@endsection


@section("content")
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('eventee.menu.update',[$menu,$id]) }}" method="post">
                    {{ csrf_field() }}
                    @method("PUT")


                    <!-- Name -->

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Name:</label>
                            <input value="{{$menu->name}}" type="text" class="form-control" id="recipient-name" name="name">
                        </div>
                    <!-- End Name  -->

                    <!-- Type of Link -->
                    
                        <div class="form-group mb-3 col-md-4">
                            <label for="type">type</label>
                            <select required class="form-control type" name="type">
                                @foreach(LINK_TYPES as $type)
                                <option @if($menu->link_type === $type) selected @endif  value="{{$type}}">{{$type}}</option>
                                @endforeach
                            </select>
                        </div>
                    <!-- end type -->


                    <!-- To Link Start  -->       
                        <div @if($menu->link_type !== "page") style="display: none;" @endif  class="pages- pages form-group mb-3 col-md-4">
                            <label for="to">to(Page)</label>
                            <select     class="form-control" name="pages">
                                @foreach($pages as $page_to)
                                    <option @if($menu->link === $page_to->name) selected @endif value="{{$page_to->name}}">{{$page_to->name}}</option>
                                @endforeach

                            </select>
                        </div>

                        <div @if($menu->link_type !== "booth") style="display: none;" @endif  class="booth- booth form-group mb-3 col-md-4">
                            <label for="to">to(Booth)</label>
                            <select class="form-control" name="booths">
                                @foreach($booths as $booth)
                                    <option @if($menu->link === $booth->id) selected @endif value="{{$booth->id}}">{{$booth->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div @if($menu->link_type!=="session_room") style="display: none;" @endif class="room- room form-group mb-3 col-md-4">
                            <label for="to">to(Session Room)</label>
                            <select class="form-control" name="rooms" >
                                @foreach($session_rooms as $room)
                                    <option @if($menu->link === $room->name) selected @endif value="{{$room->name}}">{{$room->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div @if($menu->link_type!=="zoom") style="display: none;" @endif class="zoom- zoom form-group mb-3 col-md-4">
                            <label for="zoom">Zoom/External Link</label>
                            <input @if($menu->link_type==="zoom") value="{{$menu->link}}" @endif type="text"   name="zoom" class="form-control">
                        </div>

                        
                        <div @if($menu->link_type!=="vimeo") style="display: none;" @endif class="vimeo- vimeo form-group mb-3 col-md-4">
                            <label for="vimeo">Vimeo Url</label>
                            <input @if($menu->link_type==="vimeo") value="{{$menu->link}}" @endif type="text"   name="vimeo" class="form-control">
                        </div>

                        <div @if($menu->link_type!=="chat_user") style="display: none;" @endif class="chat_user- chat_user form-group mb-3 col-md-4">
                            <label for="chat_user">Chat User ID</label>
                            <input @if($menu->link_type==="chat_user") value="{{$menu->link}}" @endif type="text"   name="chatuser" class="form-control">
                        </div>

                        <div @if($menu->link_type!=="chat_group") style="display: none;" @endif class="chat_group- chat_group form-group mb-3 col-md-4">
                            <label for="chat_group">Chat Group ID</label>
                            <input @if($menu->link_type==="chat_group") value="{{$menu->link}}" @endif type="text"   name="chatgroup" class="form-control">
                        </div>
                        
                        <div  @if($menu->link_type!=="custom_page")  style="display: none;" @endif  class="custom_page-${n} custom_page form-group mb-3 col-md-4">
                            <label for="custom_page">Custom Page route</label>
                            <input @if($menu->link_type==="custom_page") value="{{$menu->link}}" @endif type="text"   name="custom_page" class="form-control">
                        </div>


                        <div @if($menu->link_type!=="pdf") style="display: none;" @endif class="image-uploader pdf- pdf form-group mb-3 col-md-4">
                            <label for="pdf">PDF </label>
                            <input type="hidden" name="pdf" class="upload_input" @if($menu->link_type==="pdf") value="{{$menu->link}}" @endif">
                            <input type="file"      data-name="boothimages" data-plugins="dropify" data-type="application/pdf"  @if($menu->link_type==="pdf") data-default-file="{{assetUrl($menu->link)}}" @endif }} />                                   
                        </div>
                        

                    <!-- To Link End -->

                    <!-- Icon Select Start  -->
                    <select name="icon" class="form-control icon_select  select2" data-toggle="select2">
                        <option> Select Icon </option>
                        @foreach(MENU_ICONS as $menuicon)
                            <option @if($menu->iClass === $menuicon) selected @endif id="{{$menuicon}}" data-icon="{{$menuicon}}" value="{{$menuicon}}">
                                <i class="fe fe-home"></i> {{ str_replace('fe-','',$menuicon) }}
                            </option>
                        @endforeach
                    </select>


                    <!-- Icon Select End -->

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>


@endsection

@section("scripts")
@include("includes.scripts.select")
@include("includes.scripts.fileUploader")
<script>
    $(document).ready(function(){
        console.log("test")
        $(".type").on("change",toggleVisibility);
        // $(".icon_select").html(`<option><i class="fe fe-home"></i> test</option>`)
        
        $(".icon_select").select2({
        templateResult: formatState
        });

        function formatState(state){
                if(!state.id)  return state.text;
                let newstate  =  $(`<span><i class=${state.id}> ${state.id.replace("fe-","") } </i></span>`);
                return newstate;
        }

    });
    function toggleVisibility(e){
        
        console.log(e.target.value);
        // console.log(e.data)
        const selectbox = $(e.target);

        
        $(".room").hide();
        $(".pages").hide();
        $(".zoom").hide();
        $(".booth").hide();
        $(".vimeo").hide();
        $(".pdf").hide();
        $(".chat_user").hide();
        $(".chat_group").hide();
        $(".custom_page").hide();

        switch(selectbox.val()){
            case "session_room":
                $(".room").show();
                break;
            case "page":
                $(".pages").show();
                break;
            case "zoom":
                $(".zoom").show();
                break;
            case "booth":
                $(".booth").show();
                break;
            case "vimeo":
                $(".vimeo").show();
                break;
            case "pdf":
                $(".pdf").show();
                break;
            case "chat_user":
                $(".chat_user").show();
                break;
            case "chat_group":
                $(".chat_group").show();
                break;
            case "custom_page":
                $(".custom_page").show();
                break;
        }
        // console.log(val);
    }
</script>

@endsection
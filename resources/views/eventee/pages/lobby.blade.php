@extends("layouts.admin")

@section("page_title")
Edit Page
@endsection

@section("title")
Edit Page
@endsection


@section("styles")
@include("includes.styles.fileUploader")


<style>
   .image_links{
        border-radius: 5%;  
        color: white;
        font-size: 161%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #0d613978 !important;
        border: 5px solid;
    }
</style>
@endsection



@section("breadcrumbs")
<li class="breadcrumb-item"><a href="{{ route("page.index") }}">Pages</a></li>
<li class="breadcrumb-item active">Edit</li>
@endsection

@php 
$event_id = $id;
@endphp

@section("content")
<div class="row">
    <div class="col-12">
        <div class="card" style="position: relative;" >
            Visit Page: 
            <a href="/event#page/{{$page->name}}" target="_blank">here</a>
            <div id="cont" class="card-body">
                <div id="image_demo" class="im-section" style="position:relative; padding:0" >
                    <img src="{{ assetUrl(getFieldId('main_lobby_image',$event_id)) }}" style="min-width:100%" />
                    @foreach($page->links as $ids => $link)
                        <div class="im-{{$ids}} image_links " style=" position:absolute; top:{{$link->top}}%; left:{{$link->left}}%; width:{{$link->width}}%; height:{{$link->height}}%; background:white;" >{{$link->name}}</div>
                    @endforeach
                    @foreach($page->treasures as $ids => $link)
                        <div class="tim-{{$ids}} treasure_links " style=" position:absolute; top:{{$link->top}}%; left:{{$link->left}}%; width:{{$link->width}}%; height:{{$link->height}}%; background:url('{{assetUrl($link->url)}}') no-repeat; background-size: contain; " >{{$link->name}}</div>
                    @endforeach
                </div>

            

               

                <form action="{{ route('elobbyupdate',['id'=>$id]) }}" method="post">
                    {{ csrf_field() }}
                    @method("PUT")


                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mb-3">links</h4>
                            <div class="link-section">
                            @foreach($page->links as $ids => $link) 
                                <div class="row">
                                    <div class="form-group mb-3 col-md-4">
                                        <label for="linktitles">Name</label>
                                        <input type="text" value="{{$link->name}}" required  name="linknames[]" class="name-{{$ids}} form-control">
                                    </div>


                                    <div class="form-group mb-3 col-md-4">
                                        <label for="type">type</label>
                                        <select required class="form-control type" data-index="{{$ids}}"  name="type[]" >
                                            @foreach(LINK_TYPES as $type)
                                            <option data-def="{{$link->type}}" @if($link->type===$type) selected=true @endif  value="{{$type}}">{{$type}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    

                                    <div @if($link->type !== "page") style="display: none;" @endif  class="pages-{{$ids}} pages form-group mb-3 col-md-4">
                                        <label for="to">to(Page)</label>
                                        <select     class="form-control" name="pages[]">
                                            @foreach($pages as $page_to)
                                                <option @if($link->to === $page_to->name) selected @endif value="{{$page_to->name}}">{{$page_to->name}}</option>
                                            @endforeach

                                        </select>
                                    </div>

                                    <div @if($link->type !== "booth") style="display: none;" @endif  class="booth-{{$ids}} booths form-group mb-3 col-md-4">
                                        <label for="to">to(Booth)</label>
                                        <select     class="form-control" name="booths[]">
                                            @foreach($booths as $booth)
                                                <option @if($link->to === $booth->id) selected @endif value="{{$booth->id}}">{{$booth->name}}</option>
                                            @endforeach

                                        </select>
                                    </div>

                                    <div @if($link->type!=="session_room") style="display: none;" @endif class="room-{{$ids}} room form-group mb-3 col-md-4">
                                        <label for="to">to(Session Room)</label>
                                        <select class="form-control" name="rooms[]" >
                                            @foreach($session_rooms as $room)
                                                <option @if($link->to === $room->name) selected @endif value="{{$room->name}}">{{$room->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div @if($link->type!=="zoom") style="display: none;" @endif class="zoom-{{$ids}} zoom form-group mb-3 col-md-4">
                                        <label for="zoom">Zoom/External Link</label>
                                        <input @if($link->type==="zoom") value="{{$link->to}}" @endif type="text"   name="zoom[]" class="form-control">
                                    </div>

                                    
                                    <div @if($link->type!=="vimeo") style="display: none;" @endif class="vimeo-{{$ids}} vimeo form-group mb-3 col-md-4">
                                        <label for="vimeo">Vimeo Url</label>
                                        <input @if($link->type==="vimeo") value="{{$link->to}}" @endif type="text"   name="vimeo[]" class="form-control">
                                    </div>

                                    <div @if($link->type!=="chat_user") style="display: none;" @endif class="chat_user-{{$ids}} chat_user form-group mb-3 col-md-4">
                                        <label for="chat_user">Chat User ID</label>
                                        <input @if($link->type==="chat_user") value="{{$link->to}}" @endif type="text"   name="chatuser[]" class="form-control">
                                    </div>

                                    <div @if($link->type!=="chat_group") style="display: none;" @endif class="chat_group-{{$ids}} chat_group form-group mb-3 col-md-4">
                                        <label for="chat_group">Chat Group ID</label>
                                        <input @if($link->type==="chat_group") value="{{$link->to}}" @endif type="text"   name="chatgroup[]" class="form-control">
                                    </div>
                                    
                                    <div  @if($link->type!=="custom_page")  style="display: none;" @endif  class="custom_page-${n} custom_page form-group mb-3 col-md-4">
                                        <label for="custom_page">Custom Page route</label>
                                        <input @if($link->type==="custom_page") value="{{$link->to}}" @endif type="text"   name="custom_page[]" class="form-control">
                                    </div>


                                    <div @if($link->type!=="pdf") style="display: none;" @endif class="image-uploader pdf-{{$ids}} pdf form-group mb-3 col-md-4">
                                        <label for="pdf">PDF </label>
                                        <input type="hidden" name="pdf[]" class="upload_input" @if($link->type==="pdf") value="{{$link->to}}" @endif">
                                        <input type="file"      data-name="boothimages" data-plugins="dropify" data-type="application/pdf"  @if($link->type==="pdf") data-default-file="{{assetUrl($link->to)}}" @endif }} />                                   
                                    </div>
                                     {{-- Photobooth  --}}
                                     <div @if($link->type!=="photobooth") style="display: none;" @endif class="image-uploader ph-{{$ids}} ph form-group mb-3 col-md-4">
                                        <label for="phb">Photobooth Capture Link</label>
                                        <input @if($link->type==="photobooth") value="{{$link->to}}" @endif type="text"   name="capture_link[]" class="form-control">
                                        <label for="phb">Photobooth Gallery Link</label>
                                        <input @if($link->type==="photobooth") value="{{$link->url}}" @endif type="text"   name="gallery_link[]" class="form-control">
                                    </div>
                                    

                                   
                                    <div  class="row positioning-{{$ids}} col-md-12" >
                                    
                                    <div  class="form-group mb-3 col-md-3">
                                        <label for="top">top</label>
                                        <input value="{{$link->top}}" type="number" required  name="top[]" data-index="{{$ids}}" class="pos pos-{{$ids}} form-control">
                                    </div>
                                    
                                    <div  class="form-group mb-3 col-md-3">
                                        <label for="pos">left</label>
                                        <input value="{{$link->left}}" type="number" required  name="left[]" data-index="{{$ids}}" class="pos pos-{{$ids}} form-control">
                                    </div>
                                    
                                    <div  class="form-group mb-3 col-md-3">
                                        <label for="pos">width</label>
                                        <input value="{{$link->width}}" type="number" required  name="width[]" data-index="{{$ids}}" class="pos pos-{{$ids}} form-control">
                                    </div>

                                    <div  class="form-group mb-3 col-md-3">
                                        <label for="pos">height</label>
                                        <input value="{{$link->height}}" type="number" required  name="height[]" data-index="{{$ids}}" class="pos pos-{{$ids}} form-control">
                                    </div>

                                     <button data-index="{{$ids}}" class="btn btn-primary done-{{$ids}} done" >DONE</button>

                                    </div>
                                    
                                    <div class="flyin  col-md-12">
                                        
                                            <div @if(!$link->flyin) style="display:none" @endif class="image-uploader flyin-{{$ids}}">
                                                <label class="mb-3" for="images">Fly In Video</label>
                                                <input type="hidden" name="flyin[]" class="upload_input" value={{$link->flyin ? $link->flyin->url : ''}} >
                                                <input type="file" data-name="flyin[]" data-plugins="dropify" data-type="video" data-default-file="{{$link->flyin ? assetUrl($link->flyin->url) : ''}}"  />
                                            </div>
                                        
                                           <button class="btn btn-primary addflyin" data-index="{{$ids}}">Add Fly In Video</button>
                                    </div>










                                    <button class="btn btn-danger mt-2 mb-4 remove-link">Remove</button>
                                </div>
                              @endforeach
                             

                            </div>
                            <div>
                                <button class="btn btn-primary">Save</button>
                                <button class="btn btn-primary action_items">Save</button>
                                <button class="btn btn-primary" id="add-link">Add links</button>

                            </div>

                        </div>
                    </div>










                    <div class="form-group mb-3">
                        <label for="name">Name</label>
                        <input disabled required autofocus type="text" value="lobby" value="{{old('question')}}" name="name" class="form-control   @error('name') is-invalid @enderror">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="image-uploader">
                        <label class="mb-3" for="images">Background Image</label>
                        <input type="hidden" name="url" class="upload_input" value="{{ getFieldId('main_lobby_image',$event_id) }}">
                        <input disabled type="file" data-name="url" data-plugins="dropify" data-type="image" data-default-file="{{ assetUrl(getFieldId('main_lobby_image',$event_id)) }}" />
                    </div>


                    <!-- Treasure Hunt Items Start -->
                        <div id="treasures">
                            <label class="mb-3" for="images">Treasure Hunt Items</label>
                            @foreach($page->treasures as $ids =>$treasure)
                                <div class="row">

                                    <div class="image-uploader col-md-12">
                                        <input type="hidden" name="treasures[]" class="upload_input" value="{{$treasure?$treasure->url:''}}">
                                        <input type="file" data-name="treasures[]" data-plugins="dropify" data-type="image" data-default-file="{{$treasure?assetUrl($treasure->url):''}}" />
                                    </div>
                                    <div  class="row tpositioning-{{$ids}} col-md-12" >
                                            
                                            <div  class="form-group mb-3 col-md-3">
                                                <label for="top">top</label>
                                                <input value="{{$treasure->top}}" type="number" required  name="ttop[]" data-index="{{$ids}}" class="tpos tpos-{{$ids}} form-control">
                                            </div>
                                            
                                            <div  class="form-group mb-3 col-md-3">
                                                <label for="pos">left</label>
                                                <input value="{{$treasure->left}}" type="number" required  name="tleft[]" data-index="{{$ids}}" class="tpos tpos-{{$ids}} form-control">
                                            </div>
                                            
                                            <div  class="form-group mb-3 col-md-3">
                                                <label for="pos">width</label>
                                                <input value="{{$treasure->width}}" type="number" required  name="twidth[]" data-index="{{$ids}}" class="tpos tpos-{{$ids}} form-control">
                                            </div>

                                            <div  class="form-group mb-3 col-md-3">
                                                <label for="pos">height</label>
                                                <input value="{{$treasure->height}}" type="number" required  name="theight[]" data-index="{{$ids}}" class="tpos tpos-{{$ids}} form-control">
                                            </div>

                                            <button data-index="{{$ids}}" class="btn btn-primary donet-{{$ids}} donet" >DONE</button>

                                    </div>
                                    <button class="btn btn-danger mt-2 mb-4 remove-link">Remove</button>
                                </div>

                            @endforeach
                        </div>
                        <div>
                            <button class="btn btn-primary" id="add-treasure">Add Treasure</button>
                        </div>
                    <!-- Treasure Hunt Items End -->

                    <div>
                        <input class="btn btn-primary" type="submit" value="Save" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection


@section("scripts")
@include("includes.scripts.fileUploader")

<script>
    let resetflag = true;
    let links = {!! json_encode($page->links) !!};
    let n = links.length;
    let treasures = {!! json_encode($page->treasures) !!}
    let t = treasures.length;
    console.log(n);
    $(document).ready(function() {
        
     
        
        $("#add-link").on("click", addlink);
        $("#add-treasure").on("click", addTreasure);

        $(".type").on("change",toggleVisibility);
        $(".pos").on("input",changePosition);
        $(".tpos").on("input",changePositiont);
        
        $(".done").hide();
        $(".donet").hide();
        $(".done").on("click",resetPosition)
        $(".donet").on("click",resetPositiont)

        $(".addflyin").on("click",addFlyIn);
        

        bindRemoveButton();

    });

    function addFlyIn(e){
        e.preventDefault();
        console.log("test");
        let target = $(e.target);
        const index = target.data("index");
        console.log({index})
        $(".flyin-"+index).show();
        target.hide();
        initializeFileUploads();

    }

    function resetPosition(e){
        e.preventDefault();
        let target = $(e.target);
        const index = target.data("index");
        $(".done-"+index).hide();
        $(".positioning-"+index).eq(0).css({
            position: "static",
            background: "#ffffff",
            padding: "0",
            color: "#6c757d",
            width: "100%",
        });
        resetflag =true;
    }
    
    function resetPositiont(e){
        console.log("hello world")
        e.preventDefault();
        let target = $(e.target);
        const index = target.data("index");
        $(".donet-"+index).hide();
        $(".tpositioning-"+index).eq(0).css({
            position: "static",
            background: "#ffffff",
            padding: "0",
            color: "#6c757d",
            width: "100%",
        });
        resetflag =true;
    }

    
    function changePosition(e){
        
        let target = $(e.target);
        
        
        const index = target.data("index");
        if(resetflag){
            resetflag =false;
            document.getElementById("image_demo").scrollIntoView(false);
        }
        const positions =  $(".pos-"+index).map((i, v) => v.value);
        $(".done-"+index).show();
        let name = $(".name-"+index).val();
        console.log($(".im-"+index));
        $(".im-"+index).eq(0).css(areaStylesb(positions));
        $(".im-"+index).html(`${name}`);
        $(".positioning-"+index).eq(0).css({
            position: "fixed",
            bottom: "20px",
            left: "18%",
            background: "#23283ebd",
            padding: "15px",
            color: "white",
            width: "40%",
        });
        console.log($(".positioning-"+index));
        console.log(index);
    }

    
    function changePositiont(e){
        
        let target = $(e.target);

        console.log(target);
        
        
        const index = target.data("index");
        if(resetflag){
            resetflag =false;
            document.getElementById("image_demo").scrollIntoView(false);
        }
        const positions =  $(".tpos-"+index).map((i, v) => v.value);
        $(".donet-"+index).show();
        // let name = $(".name-"+index).val();
        console.log($(".im-"+index));
        $(".tim-"+index).eq(0).css(areaStylesb(positions));
        // $(".tim-"+index).html(`${name}`);
        $(".tpositioning-"+index).eq(0).css({
            position: "fixed",
            bottom: "20px",
            left: "18%",
            background: "#23283ebd",
            padding: "15px",
            color: "white",
            width: "40%",
        });
        console.log($(".positioning-"+index));
        console.log(index);
    }

    
    function areaStylesb(area){
        return {
            position:"absolute",
             top: area[0]+'%',
             left: area[1]+'%',
             width: area[2]+'%',
             height: area[3]+'%'
        }
    }


    function toggleVisibility(e){
        
        console.log(e.target.value);
        // console.log(e.data)
        const selectbox = $(e.target);
        const index = selectbox.data('index');

        
        $(".room-"+index).hide();
        $(".pages-"+index).hide();
        $(".zoom-"+index).hide();
        $(".booth-"+index).hide();
        $(".vimeo-"+index).hide();
        $(".pdf-"+index).hide();
        $(".chat_user-"+index).hide();
        $(".chat_group-"+index).hide();
        $(".custom_page-"+index).hide();
        $(".ph-"+index).hide();

        switch(selectbox.val()){
            case "session_room":
                $(".room-"+index).show();
                break;
            case "page":
                $(".pages-"+index).show();
                break;
            case "zoom":
                $(".zoom-"+index).show();
                break;
            case "booth":
                $(".booth-"+index).show();
                break;
            case "vimeo":
                $(".vimeo-"+index).show();
                break;
            case "pdf":
                $(".pdf-"+index).show();
                break;
            case "chat_user":
                $(".chat_user-"+index).show();
                break;
            case "chat_group":
                $(".chat_group-"+index).show();
                break;
            case "custom_page":
                $(".custom_page-"+index).show();
                break;
            case "photobooth":
                $(".ph-"+index).show();
                break;
        }
        // console.log(val);
    }

    function addTreasure(e) {
        e.preventDefault();
        
        t++;
        console.log({t});

        $(".im-section").append(`
            <div class="tim-${t} image_links" style="  position:absolute; top:0px; left:0px; width:100px; height:100px; background: #0d613978 !important; border: 5px solid;" >Treasure Item ${t}</div>      
        `);
        

        $("#treasures").append(`
                                <div class="row">
                                    <div class="image-uploader col-md-12">
                                        <input type="hidden" name="treasures[]" class="upload_input" >
                                        <input type="file" data-name="treasures[]" data-plugins="dropify" data-type="image"/>
                                    </div>
                                    <div  class="row tpositioning-${t} col-md-12" >
                                        
                                        <div  class="form-group mb-3 col-md-3">
                                            <label for="top">top</label>
                                            <input type="number" required  name="ttop[]" data-index="${t}" class="tpos tpos-${t} form-control">
                                        </div>
                                        
                                        <div  class="form-group mb-3 col-md-3">
                                            <label for="pos">left</label>
                                            <input type="number" required  name="tleft[]" data-index="${t}" class="tpos tpos-${t} form-control">
                                        </div>
                                        
                                        <div  class="form-group mb-3 col-md-3">
                                            <label for="pos">width</label>
                                            <input type="number" required  name="twidth[]" data-index="${t}" class="tpos tpos-${t} form-control">
                                        </div>

                                        <div  class="form-group mb-3 col-md-3">
                                            <label for="pos">height</label>
                                            <input type="number" required  name="theight[]" data-index="${t}" class="tpos tpos-${t} form-control">
                                        </div>

                                        <button data-index="${t}" class="btn btn-primary donet-${t} donet" >DONE</button>

                                    </div>
                                    <button class="btn btn-danger mt-2 mb-4 remove-link">Remove</button>
                                </div>
        `);
        bindRemoveButton();
        
        initializeFileUploads();
    }
    function addlink(e) {
        e.preventDefault();
        console.log(n);
        
        n++;
        console.log(n);

        $(".im-section").append(`
            <div class="im-${n} image_links" style="  position:absolute; top:0px; left:0px; width:100px; height:100px; background: #0d613978 !important; border: 5px solid;" >Link ${n}</div>      
        `);
        

        $(".link-section").append(`
                                <div class="row">
                                    <div class="form-group mb-3 col-md-4">
                                        <label for="linktitles">Name</label>
                                        <input type="text" required  name="linknames[]" class="name-${n} form-control">
                                    </div>


                                    <div class="form-group mb-3 col-md-4">
                                        <label for="type">type</label>
                                        <select required class="form-control type" data-index="${n}"  name="type[]" >
                                            @foreach(LINK_TYPES as $type)
                                            <option value="{{$type}}">{{$type}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    

                                    <div  class="pages-${n} pages form-group mb-3 col-md-4">
                                        <label for="to">to(Page)</label>
                                        <select value=" " class="form-control" name="pages[]">
                                            <option selected value=" ">Select Page to Redirect to</option>
                                            @foreach($pages as $page_to)
                                                <option value="{{$page_to->name}}">{{$page_to->name}}</option>
                                            @endforeach

                                        </select>
                                    </div>

                                    <div style="display: none;" class="booth-${n} booths form-group mb-3 col-md-4">
                                        <label for="to">to(Booth)</label>
                                        <select     class="form-control" name="booths[]">
                                            @foreach($booths as $booth)
                                                <option value="{{$booth->id}}">{{$booth->name}}</option>
                                            @endforeach

                                        </select>
                                    </div>

                                    <div style="display: none;" class="room-${n} room form-group mb-3 col-md-4">
                                        <label for="to">to(Session Room)</label>
                                        <select value=" " class="form-control" name="rooms[]" >
                                                <option selected value=" ">Select Session Room</option>
                                            @foreach($session_rooms as $room)
                                                <option value="{{$room->name}}">{{$room->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div style="display: none;" class="zoom-${n} zoom form-group mb-3 col-md-4">
                                        <label for="zoom">Zoom/External Link</label>
                                        <input type="text"   name="zoom[]" class="form-control">
                                    </div>

                                    <div style="display: none;" class="vimeo-${n} vimeo form-group mb-3 col-md-4">
                                        <label for="vimeo">Vimeo Url</label>
                                        <input type="text"   name="vimeo[]" class="form-control">
                                    </div>

                                    <div  style="display: none;"  class=" pdf-${n} pdf  mb-3 col-md-4">
                                        <div class="image-uploader">
                                        <label for="pdf">PDF </label>
                                        <input type="hidden" name="pdf[]" class="upload_input">
                                        <input type="file"    data-name="pdfs" data-plugins="dropify" data-type="application/pdf" />                                   
                                        </div>
                                    </div>
                                    <div  style="display: none;"  class="chat_user-${n} chat_user form-group mb-3 col-md-4">
                                        <label for="chat_user">Chat User ID</label>
                                        <input type="text"   name="chatuser[]" class="form-control">
                                    </div>
                                    <div  style="display: none;"  class="chat_group-${n} chat_group form-group mb-3 col-md-4">
                                        <label for="chat_group">Chat Group ID</label>
                                        <input type="text"   name="chatgroup[]" class="form-control">
                                    </div>

                                    <div  style="display: none;"  class="custom_page-${n} custom_page form-group mb-3 col-md-4">
                                        <label for="custom_page">Custom Page route</label>
                                        <input type="text"   name="custom_page[]" class="form-control">
                                    </div>
                                    <div  style="display: none;" class="image-uploader ph-${n} ph form-group mb-3 col-md-4">
                                        <label for="phb">Photobooth Capture Link</label>
                                        <input  type="text"   name="capture_link[]" class="form-control">
                                        <label for="phb">Photobooth Gallery Link</label>
                                        <input  type="text"   name="gallery_link[]" class="form-control">
                                    </div>


                                    <div  class="row positioning-${n}" >
                                    
                                    <div  class="form-group mb-3 col-md-3">
                                        <label for="top">top</label>
                                        <input type="number" required  name="top[]" data-index="${n}" class="pos pos-${n} form-control">
                                    </div>
                                    
                                    <div  class="form-group mb-3 col-md-3">
                                        <label for="pos">left</label>
                                        <input type="number" required  name="left[]" data-index="${n}" class="pos pos-${n} form-control">
                                    </div>
                                    
                                    <div  class="form-group mb-3 col-md-3">
                                        <label for="pos">width</label>
                                        <input type="number" required  name="width[]" data-index="${n}" class="pos pos-${n} form-control">
                                    </div>

                                    <div  class="form-group mb-3 col-md-3">
                                        <label for="pos">height</label>
                                        <input type="number" required  name="height[]" data-index="${n}" class="pos pos-${n} form-control">
                                    </div>

                                    <button data-index="${n}" class="btn btn-primary done-${n} done" >DONE</button>

                                    </div>

                                        <div class="col-md-12 flyin ">
                                            <div style="display:none" class="image-uploader flyin-${n}">
                                                <label class="mb-3" for="images">Fly In Video</label>
                                                <input type="hidden" name="flyin[]" class="upload_input" >
                                                <input type="file" data-name="flyin[]" data-plugins="dropify" data-type="video"  />
                                            </div>
                                            <button class="btn btn-primary addflyin" data-index="${n}">Add Fly In Video</button>
                                        </div>
                                   











                                    <button class="btn btn-danger mt-2 mb-4 remove-link">Remove</button>
                                </div>`);
        bindRemoveButton();
        
        initializeFileUploads();
    }


    function bindRemoveButton() {
        $(".remove-link").unbind().on("click", removelink);
        $(".type").on("change",toggleVisibility);
        $(".pos").on("input",changePosition);
        $(".tpos").on("input",changePositiont);
       

        $(".done").hide();
        $(".done").on("click",resetPosition)
        $(".donet").hide();
        $(".donet").on("click",resetPositiont)
        $(".addflyin").on("click",addFlyIn);
    }

    function removelink(e) {
        e.preventDefault();
        confirmDelete("Are you sure you want to delete the Link", "Confirm Link deletion!").then(confirmation => {
            if (confirmation) {
                $(this).closest(".row").remove();
            }
        })
    }
</script>


@endsection
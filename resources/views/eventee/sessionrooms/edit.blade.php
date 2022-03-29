@extends("layouts.admin")

@section("page_title")
    Edit Session Room
@endsection

@section("title")
    Edit Session Room
@endsection

@section("styles")
    @include("includes.styles.fileUploader")
    
<style>
    
<style>
    .positioned .dropify-wrapper {
        height: 100%;
    }
</style>

<style>
.image_links{
    border-radius: 5%;  
    color: white;
    font-size: 161%;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #0d613978 !important;
    /* border: 5px solid; */
    cursor: all-scroll;
}
.im_names{
    background: #ffffff78 !important;
    height: 100%;
    width: 100%;

}

.DoteButton{
    position: absolute;
    top: 4%;
    right: 0;
    padding: 0;
    background: transparent;
    border: inherit;
}

.pop-up-Box{
    width: 250px;
    height: auto;
    background: #3c4752;
    position: absolute;
    top: 0px;
    left: 2%;
    border-radius: 3px;
    padding: 10px 10px 5px;
    transition: all 300ms;
    opacity: 0;
}

.opacity-0{
    opacity: 0;
    top: 0px;
}
.opacity-1{
    opacity: 1;
    top: 10px;
}

 </style>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">

@endsection


@section("breadcrumbs")
    <li class="breadcrumb-item"><a href="{{ route("eventee.sessionrooms.index",['id'=>$id]) }}">Session Rooms</a></li>
    <li class="breadcrumb-item active">Edit</li>
@endsection

@section("content")

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div id="container">
                    <div id="image_demo" class="im-section" style="position:relative; padding:0" >
                        @if(isset($sessionroom->videoBg))
                            <video class="full-width-videos"  autoplay src="{{$sessionroom->videoBg?assetUrl($sessionroom->videoBg->url):''}}" repeat style="width: 100%"></video>
                        @elseif(isset($sessionroom->background->url))
                            <img src="{{$sessionroom->background?assetUrl($sessionroom->background->url):''}}" style="min-width:100%" />
                        @endif
                            {{-- Screen Area --}}
                            <div class="screen_area sim image_links im-screen" data-id="im-screen" style=" position:absolute; top:{{$sessionroom->top}}%; left:{{$sessionroom->left}}%; width:{{$sessionroom->width}}%; height:{{$sessionroom->height}}%; background:white;" >Screen</div>
                            @foreach($sessionroom->links as $ids => $link)
                                <div data-id="im-{{$ids}}" class="im-{{$ids}} image_links " style=" position:absolute; top:{{$link->top}}%; left:{{$link->left}}%; width:{{$link->width}}%; height:{{$link->height}}%; background:white; perspective:{{$link->perspective}}px; " ><div class="im_names im_name-{{$ids}}" style="background:red; height:100%; @if($link->rotationtype === 'X') transform: rotatex({{$link->rotation}}deg); @else transform: rotatey({{$link->rotation}}deg); @endif " >{{$link->name}} 
                                </div>
                            @endforeach
                    </div>
                </div>

                <form action="{{ route("eventee.sessionrooms.update", [ "sessionroom" => $sessionroom->id,'id'=>$id ]) }}" method="post">
                    {{ csrf_field() }}
                    @method("PUT")
                   <div>
                    <div  class="row positioning col-md-12" >
                                    
                        <div  class="form-group mb-3 col-md-3">
                            <label for="top">top</label>
                            <input  type="number" required value="{{ $sessionroom->top}}"  step="any" name="stop"  class="spos top-screen  form-control">
                        </div>
                        
                        <div  class="form-group mb-3 col-md-3">
                            <label for="pos">left</label>
                            <input  type="number" required value="{{ $sessionroom->left}}"  step="any" name="sleft"  class="spos  left-screen form-control">
                        </div>
                        
                        <div  class="form-group mb-3 col-md-3">
                            <label for="pos">width</label>
                            <input  type="number" required value="{{ $sessionroom->width}}"  step="any" name="swidth"  class="spos  width-screen form-control">
                        </div>

                        <div  class="form-group mb-3 col-md-3">
                            <label for="pos">height</label>
                            <input  type="number" required value="{{ $sessionroom->height}}"  step="any" name="sheight"  class="spos  height-screen form-control">
                        </div>

                         <button  class="btn btn-primary  done" >DONE</button>

                        </div>
                   </div>

                   <h4 class="header-title mb-3">links</h4>
                   <div class="link-section">
                       @foreach($sessionroom->links as $ids => $link) 
                       <div class="row  border border-primary p-2 mt-2">
                           <div class="form-group mb-3 col-md-4">
                               <label for="linktitles">Name
                                   <span style="color:red">*</span>
                               </label>
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

                           <div @if($link->type !== "post") style="display: none;" @endif  class="post-{{$ids}} posts form-group mb-3 col-md-4">
                               <label for="to">to(post)</label>
                               <select     class="form-control" name="posts[]">
                                   @foreach($posts as $post)
                                       <option @if($link->to === $post->id) selected @endif value="{{$post->id}}">{{$post->title}}</option>
                                   @endforeach

                               </select>
                           </div>

                           {{-- Modal --}}
                           <div @if($link->type !== "modal") style="display: none;" @endif  class="modal-{{$ids}} modals form-group mb-3 col-md-4">
                               <label for="to">to(modal)</label>
                               <select     class="form-control" name="modals[]">
                                   @foreach($modals as $modal)
                                       <option @if($link->to === $modal->id) selected @endif value="{{$modal->id}}">{{$modal->name}}</option>
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


                           <div class="background_images_{{$ids}} row col-md-12">
                               @if(isset($link->background[0]))
                                   @foreach($link->background as $bgimages)
                                       <div class="form-group image-uploader mb-3 col-md-4">
                                           <label for="bgimages">Background</label>       
                                           <input type="hidden" name="bgimages[{{$ids}}][]" class="upload_input"  value="{{$bgimages->url}}"  >
                                           <input type="file" data-name="bgimages[{{$ids}}][]" data-plugins="dropify" data-type="image"  data-default-file="{{assetUrl($bgimages->url)}}" />                                   
                                       </div>
                                   @endforeach
                               @endif
                           </div>
                          
                           

                          
                           <div  class="row col-md-12 positioning-{{$ids}}" >
                           
                           {{-- <div style="visibility: hidden" class="form-group mb-3 col-md-3"> --}}
                               {{-- <label for="top">top</label> --}}
                               <input value="{{$link->top}}" type="hidden" step="any" required  name="top[]" data-index="{{$ids}}" class="pos pos-{{$ids}} form-control top-{{$ids}}">
                           {{-- </div> --}}
                           
                           {{-- <div style="visibility: hidden" class="form-group mb-3 col-md-3">
                               <label for="pos">left</label> --}}
                               <input value="{{$link->left}}" type="hidden" step="any" required  name="left[]" data-index="{{$ids}}" class="pos pos-{{$ids}} form-control left-{{$ids}}">
                           {{-- </div> --}}
                           
                           {{-- <div style="visibility: hidden" class="form-group mb-3 col-md-3"> --}}
                               {{-- <label for="pos">width</label> --}}
                               <input value="{{$link->width}}" type="hidden" step="any" required  name="width[]" data-index="{{$ids}}" class="pos pos-{{$ids}} form-control width-{{$ids}}">
                           {{-- </div> --}}

                           {{-- <div style="visibility: hidden" class="form-group mb-3 col-md-3"> --}}
                               {{-- <label for="pos">height</label> --}}
                               <input value="{{$link->height}}" type="hidden" step="any" required  name="height[]" data-index="{{$ids}}" class="pos pos-{{$ids}} form-control height-{{$ids}}">
                           {{-- </div> --}}
                           {{-- <div  class="form-group mb-3 col-md-3">
                               <label for="pos">Perspective Type</label>
                               <select name="rotationtype[]" data-index="{{$ids}}" class="pers pos pos-{{$ids}} form-control" id="">
                                   <option value="">None</option>
                                   <option @if($link->rotationtype=="X") selected @endif value="X">X</option>
                                   <option @if($link->rotationtype=="Y") selected @endif value="Y">Y</option>
                               </select>
                           </div> --}}
                           
                           {{-- <div @if(!($link->rotationtype)) style="display:none" @endif  class="pr-{{$ids}} form-group mb-3 col-md-3">
                                   <label for="pos">Perspective</label>
                                   <input value="{{$link->perspective}}" type="number" step="any"  name="perspective[]" data-index="{{$ids}}" class="pos pos-{{$ids}} form-control">
                           </div>
                           <div @if(!($link->rotationtype)) style="display:none" @endif  class="rt-{{$ids}} form-group mb-3 col-md-3">
                               <label for="pos">Rotation</label>
                               <input value="{{$link->rotation}}" type="number" step="any"  name="rotation[]" data-index="{{$ids}}" class="pos pos-{{$ids}} form-control">
                           </div> --}}
                            <button data-index="{{$ids}}" class="btn btn-primary done-{{$ids}} done" >DONE</button>

                           </div>

                            <button data-index="{{$ids}}" class="btn btn-primary done-{{$ids}} done" >DONE</button>
                            <div class="form-group col-md-2">
                                   
                               <div class="form-group">
                                   <label for="#landPage" class="mr-1 mb-0">Set Location Status</label>
                                   <select name="set_location[]" class="form-control">
                                       <option value="0" @if($link->location_status == 0) selected @endif>Off</option>
                                       <option value="1" @if($link->location_status == 1) selected @endif>On</option>
                                   </select>
                               </div>
                           </div>

                           <div class="flyin  col-md-12 mb-2">
                               
                                   <div @if(!$link->flyin) style="display:none" @endif class="image-uploader flyin-{{$ids}}">
                                       <label class="mb-3" for="images">Fly In Video</label>
                                       <input type="hidden" name="flyin[]" class="upload_input" value={{$link->flyin ? $link->flyin->url : ''}} >
                                       <input type="file" data-name="flyin[]" data-plugins="dropify" data-type="video" data-default-file="{{$link->flyin ? assetUrl($link->flyin->url) : ''}}"  />
                                   </div>
                                   
                               </div>
                               
                               
                               
                             
                               
                             
                               
                           <button class="btn btn-primary  mb-2 mr-2  add-image"  data-index="{{$ids}}" >Add Background Image</button>
                           <button class="btn btn-primary  mb-2 mr-3 addflyin" data-index="{{$ids}}">Add Fly In Video</button>
                           <button class="btn btn-danger  mb-2 remove-link">Remove</button>
                       </div>
                     @endforeach
                    

                   </div>
                   <br><br>
                   <div>
                       <button class="btn btn-primary">Save</button>
                       <button class="btn btn-primary action_items">Save</button>
                       <button class="btn btn-primary" id="add-link">Add links</button>

                   </div>

                    <div class="form-group mb-3">
                        <label for="name">Name
                            <span style="color:red">*</span>
                        </label>
                        <input required autofocus type="text"  id="name" value="{{$sessionroom->name}}" name="name" class="form-control   @error('name') is-invalid @enderror">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                        <div class="image-uploader mb-3">
                            <label class="mb-3" for="images">Background Image
                                <span style="color:red">*</span>
                            </label>
                            <input type="hidden" class="upload_input" name="background"  value="{{$sessionroom->background->url??''}}">
                            <input accept="images/*"
                                type="file"
                                data-name="background"
                                data-plugins="dropify"
                                data-default-file={{assetUrl($sessionroom->background->url??"")}}
                                data-type="image"/>
                        </div>
                        <div class="image-uploader mt-3" id="vidBg">
                            <label class="mb-3" for="images">Background Video</label>
                            <input type="hidden" name="video_url" class="upload_input" value="{{$sessionroom->videoBg?$sessionroom->videoBg->url:''}}">
                            <input type="file" data-name="video_url" data-plugins="dropify" data-type="video" data-default-file="{{$sessionroom->videoBg?assetUrl($sessionroom->videoBg->url):''}}" />
                        </div>
                  
                    <div>
                        <button class="btn btn-primary" type="submit">Create</button>
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
    $(document).ready(function() {
        
     
        
        $(".spos").on("input",changeSPosition);
  
        $(".done").hide();
        $(".done").on("click",resetPosition)
      
    });

    // function resetPosition(e){
    //     e.preventDefault();
    //     let target = $(e.target);
    //     $(".done").hide();
    //     $(".positioning").eq(0).css({
    //         position: "static",
    //         background: "#ffffff",
    //         padding: "0",
    //         color: "#6c757d",
    //         width: "100%",
    //     });
    // }

    
    function changeSPosition(e){
        
        let target = $(e.target);
        
        
        const positions =  $(".spos").map((i, v) => v.value);
        // $(".done").show();
        $(".sim").eq(0).css(areaStylesS(positions));
        // $(".positioningS").eq(0).css({
        //     position: "fixed",
        //     bottom: "20px",
        //     left: "18%",
        //     background: "#23283ebd",
        //     padding: "15px",
        //     color: "white",
        //     width: "40%",
        //     zIndex: "9"
        // });
    }

    function areaStylesS(area){
        return {
            position:"absolute",
             top: area[0]+'%',
             left: area[1]+'%',
             width: area[2]+'%',
             height: area[3]+'%'
        }
    }

    
</script>

<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>

<script>
    let resetflag = true;
    let links = {!! json_encode($sessionroom->links) !!};
    let n = links.length -1;
    let treasures = {!! json_encode($sessionroom->treasures) !!}
    let t = treasures.length;
    console.log(n);
    $(document).ready(function() {
        
     
        
        $("#add-link").on("click", addlink);
        $("#add-treasure").on("click", addTreasure);
        // $(".add-image").on("click", addImage);


        $(".type").on("change",toggleVisibility);
        $(".pos").on("input",changePosition);
        $(".tpos").on("input",changePositiont);
        
        $(".done").hide();
        $(".donet").hide();
        $(".done").on("click",resetPosition)
        $(".donet").on("click",resetPositiont)

        $(".addflyin").on("click",addFlyIn);
        $(".image_links").on("click",changePosition)
        
        $(".pers").on("change",togglePerspective);
    
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
    function addImage(e){
        e.preventDefault();
        let target = $(e.target);
        const index = target.data("index");
        console.log(index);
        
        $(".background_images_"+index).append(
            `<div class="form-group image-uploader mb-3 col-md-4">
                <label for="bgimages">Background</label>       
                <input type="hidden" name="bgimages[${index}][]" class="upload_input">
                <input type="file" data-name="bgimages[${index}][]" data-plugins="dropify" data-type="image"   />                                   
            </div>`);
            initializeFileUploads();


    }
    function initDraggable(){
        $(".image_links").draggable({
            containment: "#container",
            stop: function () {
                var l = ( 100 * parseFloat($(this).position().left / parseFloat($(this).parent().width())) ) + "%" ;
                var t = ( 100 * parseFloat($(this).position().top / parseFloat($(this).parent().height())) ) + "%" ;
                $(this).css("left", l);
                $(this).css("top", t);
                let linkId = $(this).data("id").split("-")[1];
                $(".top-"+linkId).val(parseFloat(t).toFixed(2));
                $(".left-"+linkId).val(parseFloat(l).toFixed(2));
                console.log(linkId);
            }
        })
        .resizable({
            containment: "#container",
            stop: function () {
                var w = ( 100 * parseFloat($(this).width() / parseFloat($(this).parent().width())) ) + "%" ;
                var h = ( 100 * parseFloat($(this).height() / parseFloat($(this).parent().height())) ) + "%" ;
                $(this).css("width", w);
                $(this).css("height", h);
                let linkId = $(this).data("id").split("-")[1];
                $(".width-"+linkId).val(parseFloat(w).toFixed(2));
                $(".height-"+linkId).val(parseFloat(h).toFixed(2));
            }
        });
    }
    function initTreasuresDraggable(){
        $(".treasure_links").draggable({
            containment: "#container",
            stop: function () {
                var l = ( 100 * parseFloat($(this).position().left / parseFloat($(this).parent().width())) ) + "%" ;
                var t = ( 100 * parseFloat($(this).position().top / parseFloat($(this).parent().height())) ) + "%" ;
                $(this).css("left", l);
                $(this).css("top", t);
                let linkId = $(this).data("id").split("-")[1];
                $(".ttop-"+linkId).val(parseFloat(t).toFixed(2));
                $(".tleft-"+linkId).val(parseFloat(l).toFixed(2));
                console.log(linkId);
            }
        })
        .resizable({
            containment: "#container",
            stop: function () {
                var w = ( 100 * parseFloat($(this).width() / parseFloat($(this).parent().width())) ) + "%" ;
                var h = ( 100 * parseFloat($(this).height() / parseFloat($(this).parent().height())) ) + "%" ;
                $(this).css("width", w);
                $(this).css("height", h);
                let linkId = $(this).data("id").split("-")[1];
                $(".twidth-"+linkId).val(parseFloat(w).toFixed(2));
                $(".theight-"+linkId).val(parseFloat(h).toFixed(2));
            }
        });
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
        // document.getElementsByClassName("positioning-"+index)[0].scrollIntoView(false);

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
        
        // document.getElementsByClassName(".tpositioning-"+index)[0].scrollIntoView(false);
    }

    
    function changePosition(e){
        
        
        let target = $(e.target);
        
        
        const index = target.data("index");
        if(resetflag){
            resetflag =false;
            // document.getElementById("image_demo").scrollIntoView(false);
        }
        const positions =  $(".pos-"+index).map((i, v) => v.value);
        $(".done-"+index).show();
        let name = $(".name-"+index).val();
        console.log($(".im-"+index));
        $(".im-"+index).eq(0).css(areaStylesb(positions));
        // $(".im-"+index).html(`${name}`);
        $(".im_name-"+index).eq(0).css(getRotation(positions));
        $(".im_name-"+index).html(`${name}`);
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
    function getRotation(area){
        if(area[4]=="X"){
            return {
                transform: `rotatex(${area[6]}deg)`
            }
        }else if(area[4]=="Y"){
            return {
                transform: `rotatey(${area[6]}deg)`
            }
        }else{
            return {
                transform: `rotatey(0deg)`
            }

        }
    }


    
    function changePositiont(e){
        
        let target = $(e.target);

        console.log(target);
        
        
        const index = target.data("index");
        if(resetflag){
            resetflag =false;
            // document.getElementById("image_demo").scrollIntoView(false);
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
            padding: "15px",
            background: "#23283ebd",
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
             height: area[3]+'%',
             perspective: area[5]+'px'
        }
    }
    function togglePerspective(e){
        
        // console.log(e.target.value);
        // console.log(e.data)
        const selectbox = $(e.target);
        const index = selectbox.data('index');

        
        $(".pr-"+index).hide();
        $(".rt-"+index).hide();
        
        switch(selectbox.val()){
            case "X":
            case "Y":
                $(".pr-"+index).show();
                $(".rt-"+index).show();
        }
        // console.log(val);
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
        $(".post-"+index).hide();
        $(".modal-"+index).hide();
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
            case "post":
                $(".post-"+index).show();
                break;
            case "modal":
                $(".modal-"+index).show();
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
            <div data-id="tim-${n}"  class="tim-${t}  treasure_links" style="  position:absolute; top:0px; left:0px; width:100px; height:100px; background: #0d613978 !important; cursor: all-scroll;" >Treasure Item ${t}</div>      
        `);
        

        $("#treasures").append(`
                                <div class="row border border-primary p-2 mt-2 mb-2 ">
                                    <div class="image-uploader col-md-12">
                                        <input type="hidden" name="treasures[]" class="upload_input" >
                                        <input type="file" data-name="treasures[]" data-plugins="dropify" data-type="image"/>
                                    </div>
                                    <div  class="row tpositioning-${t} col-md-12 mb-2" >
                                        
                                            <input type="hidden" value="5"  step="any" required  name="ttop[]" data-index="${t}" class="tpos tpos-${t} ttop-${n} form-control">
                                            <input type="hidden" value="5" step="any" required  name="tleft[]" data-index="${t}" class="tpos tpos-${t} tleft-${n} form-control">
                                            <input type="hidden" value="5" step="any" required  name="twidth[]" data-index="${t}" class="tpos tpos-${t} twidth-${n} form-control">
                                            <input type="hidden" value="5" step="any" required  name="theight[]" data-index="${t}" class="tpos tpos-${t} theight-${n} form-control">
                            
                                        <button data-index="${t}" class="btn btn-primary donet-${t} donet" >DONE</button>

                                    </div>
                                    <button class="btn btn-danger mt-2 remove-link">Remove</button>
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
            <div data-id="im-${n}"  class="im-${n} image_links" style="  position:absolute; top:0px; left:0px; width:100px; height:100px; background: #0d613978 !important; cursor: all-scroll;" >Link ${n}</div>      
        `);
        

        $(".link-section").append(`
                                <div class="row  border border-primary p-2 mt-2">
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
                                    <div style="display: none;" class="post-${n} posts form-group mb-3 col-md-4">
                                        <label for="to">to(post)</label>
                                        <select     class="form-control" name="posts[]">
                                            @foreach($posts as $post)
                                                <option value="{{$post->id}}">{{$post->title}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div style="display: none;" class="modal-${n} modals form-group mb-3 col-md-4">
                                        <label for="to">to(modal)</label>
                                        <select     class="form-control" name="modals[]">
                                            @foreach($modals as $modal)
                                                <option value="{{$modal->id}}">{{$modal->name}}</option>
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

                                    <div  style="display: none;" class="image-uploader ph-${n} ph form-group mb-3 col-md-4">
                                        <label for="phb">Photobooth Capture Link</label>
                                        <input  type="text"   name="capture_link[]" class="form-control">
                                        <label for="phb">Photobooth Gallery Link</label>
                                        <input  type="text"   name="gallery_link[]" class="form-control">
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
                                    <div class="background_images_${n} row col-md-12">
                                    </div>

                                    <div  class="row positioning-${n}" >
                                       
                                        <input type="hidden" value="5" step="any" required  name="top[]" data-index="${n}" class="pos pos-${n} top-${n} form-control">
                                        <input type="hidden" value="5" step="any" required  name="left[]" data-index="${n}" class="pos pos-${n} left-${n} form-control">
                                        <input type="hidden" value="5" step="any" required  name="width[]" data-index="${n}" class="pos pos-${n} width-${n} form-control">
                                        <input type="hidden" value="5" step="any" required  name="height[]" data-index="${n}" class="pos pos-${n} height-${n} form-control">
                                
                                  

                                    <button data-index="${n}" class="btn btn-primary done-${n} done" >DONE</button>

                                    </div>
                                    <div class="form-group col-md-2">
                                            
                                            <div class="form-group">
                                                <label for="#landPage" class="mr-1 mb-0">Set Location Status</label>
                                                <select name="set_location[]" class="form-control">
                                                    <option value="0"  >Off</option>
                                                    <option value="1">On</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12 flyin ">
                                            <div style="display:none" class="image-uploader flyin-${n}">
                                                <label class="mb-3" for="images">Fly In Video</label>
                                                <input type="hidden" name="flyin[]" class="upload_input" >
                                                <input type="file" data-name="flyin[]" data-plugins="dropify" data-type="video"  />
                                            </div>
                                        </div>
                                   








                                       
                                        <button class="btn btn-primary mt-2 mb-4 mr-2  add-image"  data-index="${n}"  >Add Background Image</button>
                                        <button class="btn btn-primary  mt-2 mb-4 addflyin" data-index="${n}">Add Fly In Video</button>
                                    <button class="btn btn-danger mt-2 mb-4 ml-2 remove-link">Remove</button>
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
        $(".image_links").on("click",changePosition)
        $(".add-image").unbind("click").on("click", addImage);
        $(".pers").on("change",togglePerspective);
        initDraggable();   
        initTreasuresDraggable();
    }

    function removelink(e) {
        e.preventDefault();
        confirmDelete("Are you sure you want to delete the Link", "Confirm Link deletion!").then(confirmation => {
            if (confirmation) {
                $(this).closest(".row").remove();
            }
        })
    }
    $(document).ready(function(){

        $('#bg_type').on('change',function(e){
              e.preventDefault();
              var opt = $(this).val();
              if(opt == 'none'){
                $('#imgBg').hide();
                $('#vidBg').hide();
              }
              else if(opt == 'image'){
                $('#imgBg').css('display','block');
                $('#vidBg').css('display','none');
              }
              else if(opt == 'video'){
                $('#imgBg').css('display','none');
                $('#vidBg').css('display','block');
              }
          });
      });
    
    // function LocaitonStatus(e){
    //     let current_value = e.value;
    //     if(current_value == 0){
    //         e.value = 1;
    //         current_value = 1;
    //     }
    //     else{
    //         e.value = 0;
    //         current_value = 0;
    //     }
    //     $.post("{{ route('eventee.pages.updatelocation') }}",{"id":e.getAttribute("data-id"),"status":current_value},function(res){
    //         if(res.code == 200){
    //             showMessage(res.message,'success');
    //         }
    //         else{
    //             showMessage(res.message,'error');
    //         }
    //     });
    // }


    
</script>

<script>
    $(document).ready(function() {
        $(".DoteButton").click(function(){
            $(".pop-up-Box").toggleClass("opacity-0 opacity-1");
            $(".IconDv").toggleClass("showCls hideCls");
        });
    });
</script>

@endsection
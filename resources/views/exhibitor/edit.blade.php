@extends("layouts.admin")

@section("page_title")
    Edit Booth: {{ $booth->name }}
@endsection

@section("title")
    Edit Booth: {{ $booth->name }}
@endsection

@section("styles")
    @include("includes.styles.fileUploader")
    @include("includes.styles.wyswyg")
    <link rel="stylesheet" href="{{ asset("event-assets/css/app.css") }}">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">

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
        cursor: all-scroll;
        /* border: 5px solid; */
    }
    .im_names{
        background: #ffffff78 !important;
        height: 100%;
        width: 100%;

    }

    .newBox{
        position: absolute;
        top: 5%;
        left: 3%;
        background-color: rgb(55 55 55 / 50%);
        color: #fff;
        font-size: 14px;
        overflow: hidden;
        line-height: 16px;
        cursor: pointer;
        width: 130px;
        height: 40px;
        border-radius: 4px;
        padding: 10px;
        display: flex;
        align-items: center;
        -webkit-backdrop-filter: blur(10px);
        backdrop-filter: blur(3px);
    }
</style>
@endsection

@section("breadcrumbs")
    <li class="breadcrumb-item"><a href="/">Booths</a></li>
    <li class="breadcrumb-item active">Edit</li>
@endsection

@section("content")
    <form action="{{ route("exhibiter.update", [ "booth" => $booth->id ,"id"=>$id]) }}" method="POST">
        @csrf"
        <div class="position-relative" id="container">
            <div id="image_demo"  class="im-section" style="position:relative; padding:0" >
                @if(isset($booth->vidbg_url))
                    <video loop class="full-width-videos" autoplay src="{{$booth->vidbg_url?assetUrl($booth->vidbg_url):''}}" repeat style="width: 100%"></video>
                @elseif(isset($booth->boothurl))
                    <img src="{{$booth->boothurl?assetUrl($booth->boothurl):''}}" style="min-width:100%" />
                @endif
                @foreach($booth->links as $ids => $link)
                    <div data-id="im-{{$ids}}" class="im-{{$ids}} image_links " style=" position:absolute; top:{{$link->top}}%; left:{{$link->left}}%; width:{{$link->width}}%; height:{{$link->height}}%; background:white; perspective:{{$link->perspective}}px; " ><div class="im_names im_name-{{$ids}}" style="background:red; height:100%; @if($link->rotationtype === 'X') transform: rotatex({{$link->rotation}}deg); @else transform: rotatey({{$link->rotation}}deg); @endif " >{{$link->name}}</div></div>
                @endforeach
            </div>

     </div>
        <div class="row">
            <div class="col-12">






                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mb-3">links</h4>
                            <div class="link-section">
                            @foreach($booth->links as $ids => $link) 
                                <div class="row border border-primary p-2 mb-2">
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
                                            @foreach($booths as $booth_n)
                                                <option @if($link->to === $booth_n->id) selected @endif value="{{$booth_n->id}}">{{$booth_n->name}}</option>
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

                                    <div @if($link->type!=="modal") style="display: none;" @endif class="modals-{{$ids}} modals form-group mb-3 col-md-4">
                                        <label for="to">to(modal)</label>
                                        <select class="form-control" name="modal[]" >
                                            @foreach($modals as $modal)
                                                <option @if($link->to === $modal->id) selected @endif value="{{$modal->id}}">{{$modal->name}}</option>
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
                                        <input type="hidden" name="pdfs[]" class="upload_input" @if($link->type==="pdf") value="{{$link->to}}" @endif">
                                        <input type="file"      data-name="pdfs" data-plugins="dropify" data-type="application/pdf"  @if($link->type==="pdf") data-default-file="{{assetUrl($link->to)}}" @endif }} />                                   
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
                                        
                                    
                                   
                                    <div  class="row positioning-{{$ids}} col-md-12" >
                                    
                                        <input value="{{$link->top}}" type="hidden" step="any" required  name="top[]" data-index="{{$ids}}" class="pos pos-{{$ids}} form-control top-{{$ids}}">
                                        <input value="{{$link->left}}" type="hidden" step="any" required  name="left[]" data-index="{{$ids}}" class="pos pos-{{$ids}} form-control left-{{$ids}}">
                                        <input value="{{$link->width}}" type="hidden" step="any" required  name="width[]" data-index="{{$ids}}" class="pos pos-{{$ids}} form-control width-{{$ids}}">
                                        <input value="{{$link->height}}" type="hidden" step="any" required  name="height[]" data-index="{{$ids}}" class="pos pos-{{$ids}} form-control height-{{$ids}}">
                                    </div>
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
                                     {{-- <button data-index="{{$ids}}" class="btn btn-primary done-{{$ids}} done" >DONE</button> --}}

                                    {{-- </div> --}}




                                    <button class="btn btn-primary add-image"  data-index="{{$ids}}" >Add Background Image</button>






                                    <button class="btn btn-danger remove-link ml-2">Remove</button>
                                </div>
                              @endforeach
                             

                            </div>
                            <div class="ml-2 mb-2">
                                <button class="btn btn-primary">Save</button>
                                <button class="btn btn-primary ml-2 " id="add-link">Add links</button>
                                <button class="btn btn-primary ml-2  action_items">Save</button>

                            </div>

                        </div>
                    </div>





                <!-- Card 1  -->
                <div class="card ">
                    <div class="card-body">
                        <label for="summernote-basic">Description</label>
                        <textarea id="summernote-basic" name="description">{{$booth->description}}</textarea>
                        <div class="form-group mb-3">
                            <label for="url">Website URL</label>
                            <input type="url" id="url" name="url" class="form-control" value="{{ $booth->url }}">
                        </div>

                            <!-- <label for="summernote-basic-2">Lawfirm Members</label> -->
                            <!-- <textarea id="summernote-basic-2" name="description_two">{{$booth->description_two}}</textarea> -->
                        <div>
                            <button class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>

                <!-- Card 3 Videos  -->

                 <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-3">Videos</h4>
                        <div class="video-sections row">
                            @foreach($booth->videos as $boothvideo)
                                @if($boothvideo->title != "brandvideo")
                                <div class="form-group mb-3 col-12">
                                    <label for="boothvideos">URL</label>
                                    <input type="url"  name="boothvideos[]" class="form-control mb-2"
                                           value="{{ $boothvideo->url }}"
                                    >
                                    <label for="videotitles">Title</label>
                                    <input type="text"  name="videotitles[]" class="form-control mb-2"
                                           value="{{ $boothvideo->title }}"
                                    >
                                    <button class="btn btn-danger mb-2 remove-video">Remove</button>
                                </div>
                                @endif
                            @endforeach
                        </div>
                        <div>
                            <button class="btn btn-primary">Save</button>
                            <button class="btn btn-primary" id="add-video">Add Video</button>
                        </div>
                    </div>
                 </div> 
                <!-- Card 4 Resources  -->

                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mb-3">Resources</h4>
                            <div class="resource-section">
                                @foreach($booth->resources as $resource)
                                    <div class="row">
                                        <div class="image-uploader mb-3 col-md-4">
                                            <input type="hidden" name="resources[]" class="upload_input"
                                                value="{{ $resource->url }}">
                                            <input type="file" data-name="resources" data-plugins="dropify" data-type="/"
                                                data-default-file="{{assetUrl($resource->url)}}"/>
                                        </div>
                                        <div class="form-group mb-3 col-md-8">
                                            <label for="resourcetitles">Title</label>
                                            <input type="text" id="resourcetitles" name="resourcetitles[]" class="form-control"
                                                value="{{ $resource->title }}"
                                                >
                                            <button class="btn btn-danger mt-2 remove-resource">Remove</button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div>
                                <button class="btn btn-primary">Save</button>
                                <button class="btn btn-primary" id="add-resource">Add Resources</button>

                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </form>
@endsection

@section("scripts")
    @include("includes.scripts.fileUploader")
    @include("includes.scripts.wyswyg")
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <script>
        function addvideo(e) {
            e.preventDefault();
            $(".video-sections").append(`
             <div class="form-group mb-3 col-12">
               <label for="boothvideos">URL</label>
               <input type="url"  id="boothvideos" name="boothvideos[]" class="form-control mb-2">
              <label for="videotitles">Title</label>
              <input type="text"  id="videotitles" name="videotitles[]" class="form-control mb-2">
                <button class="btn btn-danger mb-2 remove-video">Remove</button>
            </div>
          `);
            initializeFileUploads();
            bindRemoveButtons();
        }
     
        function addresource(e) {
            e.preventDefault();
            $(".resource-section").append(`
                <div class="row">
                  <div class="image-uploader mb-3 col-md-4">
                    <input type="hidden" name="resources[]" class="upload_input">
                    <input type="file" data-name="resources" data-plugins="dropify" data-type="/" />
                  </div>
                  <div class="form-group mb-3 col-md-8">
                      <label for="resourcetitles">Title</label>
                      <input type="text"  id="resourcetitles" name="resourcetitles[]" class="form-control" >
                        <button class="btn btn-danger remove-resource mt-2">Remove</button>
                  </div>
                </div>
          `);
            bindRemoveButtons();
            initializeFileUploads();
        }

        function removevideo(e){
            e.preventDefault();
            confirmDelete("Are you sure you want to delete the Video", "Confirm Video deletion!").then(confirmation => {
              if(confirmation){
                  $(this).closest(".form-group").remove();
              }
            })

        }

        function removeresource(e) {
            e.preventDefault();
            confirmDelete("Are you sure you want to delete the Resource", "Confirm Resource deletion!").then(confirmation => {
                if(confirmation){
                    $(this).closest(".row").remove();
                }
            })
        }

        function bindRemoveButtons(){
            $(".remove-video").unbind().on("click",removevideo);
            $(".remove-resource").unbind().on("click",removeresource);
        }

        $(document).ready(function () {
            $("#add-video").on("click", addvideo);
            $("#add-resource").on("click", addresource);
            $(".carousel").carousel("cycle");
            $('.carousel').carousel({
                interval: 100
            });
            bindRemoveButtons();
        })
    </script>
    
<script>
    let resetflag = true;
    let links = {!! json_encode($booth->links) !!};
    let n = links.length;
    // console.log(n);
    $(document).ready(function() {
        console.log({!! json_encode($booth->links) !!});
     
        
        $("#add-link").on("click", addlink);
        $(".add-image").on("click", addImage);

        $(".type").on("change",toggleVisibility);
        $(".pos").on("input",changePosition);
        
        $(".done").hide();
        $(".done").on("click",resetPosition)

        $(".pers").on("change",togglePerspective);
        

        bindRemoveButton();

    });

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
        $(".im-"+index).eq(0).css(areaStylesb(positions));
        console.log(positions)
        console.log(getRotation(positions))
        console.log({positions,index,name})
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

    
    function areaStylesb(area)
    {
        return {
            position:"absolute",
             background:"white", 
             top: area[0]+'%',
             left: area[1]+'%',
             width: area[2]+'%',
             height: area[3]+'%',
             perspective: area[5]+'px'
        }
    }


    function toggleVisibility(e){
        
        // console.log(e.target.value);
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
        $(".modal-"+index).hide();

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
            case "modal":
                $(".modals-"+index).show();
                break;
        }
        // console.log(val);
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

    function addlink(e) {
        e.preventDefault();
        // console.log(n);
        
        // console.log(n);

        $(".im-section").append(`
            <div data-id="im-${n}" class="im-${n} image_links" style="  position:absolute; top:0px; left:0px; width:100px; height:100px; background: #0d613978 !important; cursor: all-scroll; " ><div class="im_names im_name-${n}" style="height:100%; background:red;" >Link ${n} </div></div>      
        `);
        

        $(".link-section").append(`
                                <div class="row  border border-primary p-2 mb-2">
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
                                            @foreach($booths as $booth_n)
                                                <option value="{{$booth_n->id}}">{{$booth_n->name}}</option>
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
                                    <div style="display: none;" class="modals-${n} modals form-group mb-3 col-md-4">
                                        <label for="to">to(modal)</label>
                                        <select value=" " class="form-control" name="modal[]" >
                                                <option selected value=" ">Select Modal </option>
                                            @foreach($modals as $modal)
                                                <option value="{{$modal->id}}">{{$modal->name}}</option>
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
                                        <input type="file"    data-name="pdf[]" data-plugins="dropify" data-type="application/pdf" />                                   
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


                                    <div class="background_images_${n} row col-md-12">
                                    </div>
                                    
                                    
                                    <div  class="row positioning-${n} col-md-12" >
                                        
                                        <input type="hidden" step="any" required value='0'  name="top[]" data-index="${n}" class="pos pos-${n} top-${n} form-control">
                                        <input type="hidden" step="any" required value='0'  name="left[]" data-index="${n}" class="pos pos-${n} left-${n} form-control">
                                        <input type="hidden" step="any" required value="5"  name="width[]" data-index="${n}" class="pos pos-${n} width-${n} form-control">
                                        <input type="hidden" step="any" required value="5"  name="height[]" data-index="${n}" class="pos pos-${n} height-${n} form-control">
                                    </div>
                                        
                                        
                                        <button class="btn btn-primary add-image"  data-index="${n}"  >Add Background Image</button>
                                        <button class="btn btn-danger ml-2 remove-link">Remove</button>
                                    </div>`);
            bindRemoveButton();
        n++;
            
            initializeFileUploads();
        }


        function bindRemoveButton() {
            $(".remove-link").unbind().on("click", removelink);
            $(".type").on("change",toggleVisibility);
            $(".pos").on("input",changePosition);

            $(".done").hide();
            $(".done").on("click",resetPosition)
            $(".add-image").unbind().on("click", addImage);
            $(".pers").on("change",togglePerspective);
        
            initDraggable()

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

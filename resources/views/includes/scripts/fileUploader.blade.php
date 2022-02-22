{{-- <script id="dropify_script"  async=false defer=false src="{{ asset("assets/libs/dropify/js/dropify.min.js") }}"></script> --}}
<script  id="dropify_script"  async=false defer=false  src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<style>
    .img-gallery{
        min-width: 100%;
        min-height: 100%;
        object-fit: cover;
    }
    .img-gallery.selected:before {
        content: "";
        width: 30px;
        height: 30px;
        background: blue;
        position: absolute;
        top: 0;
        left: 0;
    }
    .img-gallery.selected{
        border: 3px solid blue;
        
    }

    #gallery-container,#video-gallery-container{
        position: relative;
        display: grid;
        grid-template-columns: auto auto auto;
        padding: 10px;

        grid-column-gap: 23px;
        grid-row-gap: 10px;
        max-height: 90vh;
        overflow-y: scroll;
    }

    #gallery-container::-webkit-scrollbar {
        width: 4px;
        border-radius: 50px;
    }

    #gallery-container::-webkit-scrollbar-thumb {
        background-color: #00a15f;
        border-radius: 500px;
    }

    #video-gallery-container::-webkit-scrollbar {
        width: 4px;
        border-radius: 50px;
    }

    #video-gallery-container::-webkit-scrollbar-thumb {
        background-color: #00a15f;
        border-radius: 500px;
    }
</style>
<script>
    let Upload = function (file, fileInput) {
        this.file = file;
        this.uploading = 0;
        let progress = fileInput.closest(".image-uploader").find(".upload.progress");
        progress.show();
        this.progressBar = progress.find(".progress-bar");
    };
    Upload.prototype.getType = function() {
        return this.file.type;
    };
    Upload.prototype.unlockForm = function(instance) {
        instance.progressBar.closest("form").find("button").prop("disabled", false);
    };
    Upload.prototype.lockForm = function() {
        this.progressBar.closest("form").find("button").prop("disabled", true);
    };
    Upload.prototype.getSize = function() {
        return this.file.size;
    };
    Upload.prototype.getName = function() {
        return this.file.name;
    };

    Upload.prototype.progressHandling = function (event, progressBar) {
        var percent = 0;
        var position = event.loaded || event.position;
        var total = event.total;
        if (event.lengthComputable) {
            percent = Math.ceil(position / total * 100);
        }
        progressBar.css("width", +percent + "%");
    };
    Upload.prototype.doUpload = function (callback) {
        if(typeof callback !== "function"){
            throw new Error("Supply a callback function to get the uploaded image path.");
        }
        var that = this;
        var formData = new FormData();
        formData.set("_token", "{{ csrf_token() }}");

        // add assoc key values, this will be posts values
        formData.append("file", this.file, this.getName());
        @if(isset($id))
            formData.append("event_id", "{{ $id }}");
        @endif
        @if(isset($event_id))
            formData.append("event_id", "{{ $event_id }}");
        @endif
        this.lockForm();

        $.ajax({
            type: "POST",
            url: "{{ route("cms.uploadFile") }}",
            xhr: function () {
                var myXhr = $.ajaxSettings.xhr();
                if (myXhr.upload) {
                    myXhr.upload.addEventListener('progress', e => that.progressHandling(e, that.progressBar), false);
                }
                return myXhr;
            },
            success: function (data) {
                that.unlockForm(that);
                if(data.success && data.path){
                    showMessage("File Uploaded Successfully", "success");
                    callback(data.path);
                    
                }else{
                    showMessage("File Size Should not be greater than 12 MB", "error");
                    callback(false);
                }
                // your callback here
            },
            error: function (error) {
                // handle error
                that.unlockForm(that);
                callback(false);
                console.log(error)
            },
            async: true,
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
        });
    };
</script>
<script>
    let data_type = ' ';
    function initializeFileUploads(){
        let fileInputs = $('[data-plugins="dropify"]');
        if (fileInputs.length > 0) {
            // Dropify
            fileInputs.each(function(){
                let  flag = 0 ;
                let fileInput = $(this);
                        if(! (fileInput.closest(".image-uploader").hasClass("pbadded"))){
                               fileInput.closest(".image-uploader").append(`<div class="progress progress-sm upload mb-2"><div class="progress-bar progress-bar-striped bg-primary" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div></div>`);
                               fileInput.closest(".image-uploader").addClass("pbadded") ;
                        }
                if(!fileInput.data("initdropify")){ //Only initialize if not already done so
                    fileInput.data("initdropify", true);
                    console.log(fileInput);
                    let dropifyInput = fileInput.dropify({
                        messages: {
                            'default': 'Drag and drop a file here or click',
                            'replace': 'Drag and drop or click to replace',
                            'remove': 'Remove',
                            'error': 'Ooops, something wrong appended.'
                        },
                    });
                    dropifyInput.on('dropify.afterClear', function(e, element){
                      let target = $(e.target);
                      let input = target.closest(".image-uploader").find(`.upload_input`).val("");
                    });

                    fileInput.on("change", function(e){
                        let target = $(e.target);
                        let type = target.data("type");
                        let input = target.closest(".image-uploader").find(`.upload_input`);
                        let files = e.target.files;
                        if(files.length){
                            let upload = new Upload(files[0], fileInput);
                            if(upload.getType().includes(type)){
                                upload.doUpload(function(path){
                                    if(path){
                                        input.val(path)
                                        input[0].dispatchEvent(new Event("uploaded"));
                                    }
                                });
                            }else{
                                setTimeout(() => target.parent().find(".dropify-clear").trigger("click"), 200);
                            }
                        }
                    });
                    fileInput.on('click',function(e){
                        data_type = fileInput.attr('data-type');
                        if(data_type === 'image' || data_type === 'video'){
                            openGalleryModal(e,fileInput,data_type);
                        }
                    });
                   
                }
            })
        }
      
    }

    function openGalleryModal(e,fileInput,data_type){
        e.preventDefault();
        e.stopPropagation();
        $('#exampleModal').modal('toggle');
        let target = $(e.target);
        let input = target.closest(".image-uploader").find(`.upload_input`);
        input.addClass("active-input");
        fileInput.addClass("active-uploader");
        $('#uploadModalContainer').empty();
        $('#uploadModalContainer').append(`<label class="mb-3" for="images">Upload `+data_type+` <small style="color:red"><b>"(File Size Cannot Be More Than 12MB)"</b></small>
            </label>
            <input type="hidden" name="url" class="upload_input" >
            <input type="file" id="setDataType" data-name="url" data-plugins="drop" data-type="`+data_type+`"  />`);
        initUpload();
        if(data_type==='image'){
            $("#gallery-container").show();
            $("#video-gallery-container").hide();
        }else{
            $("#gallery-container").hide();
            $("#video-gallery-container").show();
            
        }
    }
    function initGallery(){
        $(".img-gallery").on("click",(e)=>{
            console.log(e)
            $(".img-gallery.selected").removeClass("selected")
            // $(".img-gallery.selected").removeClass("selected")
            $(e.target).addClass("selected");
            $($(e.target).parent()).addClass("selected-p");
            $("#select-button").on("click",selectFromGallery)
        });
    }
    function selectFromGallery(){
        let selected = $(".img-gallery.selected");
        let input = $($('.active-input')[0]);
        let active_input = $($('.active-uploader')[0]);
        let path = selected.data("path");
        if(path){
            input.val(path);
            input.removeClass('active-input');
            console.log(active_input);
            if(data_type != 'video'){
                let img = $($($($(active_input).parent().children('.dropify-preview')[0]).children('span')[0]).children('img')[0]);
                if(img.length){
                    img.attr("src","{{ assetUrl("") }}"+ path);
                }else{
                    $($($(active_input).parent().children('.dropify-preview')[0]).children('span')[0]).append(`<img src="${ "{{ assetUrl("") }}"+ path }" >`)
                    $($(active_input).parent().children('.dropify-preview')[0]).show();
                }
            }
            else{
                let ext = path.split(".")[1];
                let vid = $($($($(active_input).parent().children('.dropify-preview')[0]).children('span')[0]).children('.dropify-extension')[0]);
                if(vid.length){
                    vid.text(ext);
                }
                else{
                    $($($(active_input).parent().children('.dropify-preview')[0]).children('span')[0]).append(`<span class="dropify-extension">`+ext+`</span>`)
                    $($(active_input).parent().children('.dropify-preview')[0]).show();
                }
            }
            // console.log((active_input.closest(".dropify-preview").querySelector('div')));
        //    let img = $($(".dropify-render>img")[index]);
        //    img.attr("src","{{ assetUrl("") }}"+ path);
            
            // $(active_input.parent().children(".dropify-preview>.dropify-render>img")[0]).attr("src","{{ assetUrl("") }}"+ path);
            active_input.removeClass('active-uploader');
            input[0].dispatchEvent(new Event("uploaded"));
            $('#exampleModal').modal('toggle');
        }
                           
        // $(".img-gallery").on("click",(e)=>{
        //     console.log(e)
        //     $(".img-gallery.selected").removeClass("selected")
        //     // $(".img-gallery.selected").removeClass("selected")
        //     $(e.target).addClass("selected");
        // });
    }
    $(document).ready(()=>{

        $("#dropify_script").on("load",()=>{
            
            initializeFileUploads();
            initGallery();
        })
    });
        function ModClose(){
            $('#exampleModal').modal('toggle');
        }

        function initUpload(){
            console.log(1);
            let fileUploads = $('[data-plugins="drop"]');
            if (fileUploads.length > 0) {
                // Dropify
                fileUploads.each(function(index){
                    let  flag = 0 ;
                    let fileUpload = $(this);
                    fileUpload.closest(".image-uploader").append(`<div class="progress progress-sm upload mb-2"><div class="progress-bar progress-bar-striped bg-primary" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div></div>`);
                    if(!fileUpload.data("initdropify")){ //Only initialize if not already done so
                        fileUpload.data("initdropify", true);
                        console.log(fileUpload);
                        let dropifyInput = fileUpload.dropify({
                            messages: {
                                'default': 'Drag and drop a file here or click',
                                'replace': 'Drag and drop or click to replace',
                                'remove': 'Remove',
                                'error': 'Ooops, something wrong appended.'
                            },
                        });
                    
                        dropifyInput.on('dropify.afterClear', function(e, element){
                        let target = $(e.target);
                        let input = target.closest(".image-uploader").find(`.upload_input`).val("");
                        });

                        fileUpload.on("change", function(e){
                            let target = $(e.target);
                            let type = target.data("type");
                            let input = $($('.active-input')[0]);
                            let active_input = $($('.active-uploader')[0]);
                            let files = e.target.files;
                            if(files.length){
                                let upload = new Upload(files[0], fileUpload);
                                if(upload.getType().includes(type)){
                                    upload.doUpload(function(path){
                                        console.log(path);
                                        if(path){
                                            input.val(path);
                                            input.removeClass('active-input');
                                            console.log(active_input);
                                            if(data_type != 'video'){
                                                let img = $($($($(active_input).parent().children('.dropify-preview')[0]).children('span')[0]).children('img')[0]);
                                                if(img.length){
                                                    img.attr("src","{{ assetUrl("") }}"+ path);
                                                }else{
                                                    $($($(active_input).parent().children('.dropify-preview')[0]).children('span')[0]).append(`<img src="${ "{{ assetUrl("") }}"+ path }" >`)
                                                    $($(active_input).parent().children('.dropify-preview')[0]).show();
                                                }
                                            }
                                            else{
                                                let ext = path.split(".")[1];
                                                let vid = $($($($(active_input).parent().children('.dropify-preview')[0]).children('span')[0]).children('.dropify-extension')[0]);
                                                if(vid.length){
                                                    vid.text(ext);
                                                }
                                                else{
                                                    $($($(active_input).parent().children('.dropify-preview')[0]).children('span')[0]).append(`<span class="dropify-extension">`+ext+`</span>`)
                                                    $($(active_input).parent().children('.dropify-preview')[0]).show();
                                                }
                                            }
                                            // console.log((active_input.closest(".dropify-preview").querySelector('div')));
                                        //    let img = $($(".dropify-render>img")[index]);
                                        //    img.attr("src","{{ assetUrl("") }}"+ path);
                                            
                                            // $(active_input.parent().children(".dropify-preview>.dropify-render>img")[0]).attr("src","{{ assetUrl("") }}"+ path);
                                            active_input.removeClass('active-uploader');
                                            input[0].dispatchEvent(new Event("uploaded"));
                                            $('#exampleModal').modal('toggle');
                                        }
                                    });
                                }else{
                                    setTimeout(() => target.parent().find(".dropify-clear").trigger("click"), 200);
                                }
                            }
                        });
                        
                    }
                })
            }
        
        }
</script>

{{-- Pop Modal Gallery --}}

<div class="modal fade thememodal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Image Gallery</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="mb-3" >
                <ul class="nav nav-pills navtab-bg nav-justified" style="margin: 0px -5px;">
                    <li class="nav-item "> 
                        <a href="#upload" data-toggle="tab" aria-expanded="false" class="nav-link  ">Upload New </a>
                    </li>
                    <li class="nav-item active "> 
                        <a href="#gallery" data-toggle="tab" aria-expanded="true" class="nav-link active">Gallery</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane " id="upload">
                        <div class="image-uploader" id="uploadModalContainer" >
                            
                        </div>
                    </div>
                    <div class="tab-pane active show" id="gallery">
                        <div id="gallery-container">
                            @php
                            $images = \App\Image::whereNotNull("event_id")->get();
                            @endphp
                            @foreach ($images as $i=> $image)
                                <div class="img-gallery @if($i===0) selected-p @endif ">
                                    <img width="250px" class="img-gallery @if($i===0) selected @endif " data-path="{{$image->url}}" src="{{assetUrl($image->url)}}" >
                                </div>
                            @endforeach
                        </div>
                        <div id="video-gallery-container">
                            @php
                            $videos = \App\Video::whereNotNull("event_id")->get();
                            @endphp
                            @foreach ($videos as $i=> $video)
                                <video width="250px" autoplay loop class="img-gallery @if($i===0) selected @endif " data-path="{{$video->url}}" src="{{assetUrl($video->url)}}" >
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="ModClose()">Close</button>
          <button type="button" id="select-button" class="btn btn-primary"  >Select</button>
        </div>
      </div>
    </div>
  </div>

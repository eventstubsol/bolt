<script id="dropify_script"  async=false defer=false src="{{ asset("assets/libs/dropify/js/dropify.min.js") }}"></script>
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
        // let fileInputs = $('.image-uploader>input[type="file"]');
        if (fileInputs.length > 0) {
            // Dropify
            fileInputs.each(function(){
                let  flag = 0 ;
                let fileInput = $(this);
                // fileInput.closest(".image-uploader").append(`<div class=""><div class="progress-bar progress-bar-striped bg-primary" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div></div>`);
                // if(! fileInput.closest(".image-uploader .progress") ){
                    // console.log({fileInput});
                    // if(flag === 0){
                        if(! (fileInput.closest(".image-uploader").hasClass("pbadded"))){
                               fileInput.closest(".image-uploader").append(`<div class="progress progress-sm upload mb-2"><div class="progress-bar progress-bar-striped bg-primary" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div></div>`);
                               fileInput.closest(".image-uploader").addClass("pbadded") ;
                        }
                        // $(fileInput.closest(".image-uploader")).removeClass("image-uploader");
                        // flag = 1;
                    // }
                // }
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

                    // fileInput.on("change", function(e){
                    //     let target = $(e.target);
                    //     let type = target.data("type");
                    //     let input = target.closest(".image-uploader").find(`.upload_input`);
                    //     let files = e.target.files;
                    //     if(files.length){
                    //         let upload = new Upload(files[0], fileInput);
                    //         if(upload.getType().includes(type)){
                    //             upload.doUpload(function(path){
                    //                 if(path){
                    //                     input.val(path)
                    //                     input[0].dispatchEvent(new Event("uploaded"));
                    //                 }
                    //             });
                    //         }else{
                    //             setTimeout(() => target.parent().find(".dropify-clear").trigger("click"), 200);
                    //         }
                    //     }
                    // });
                    fileInput.on('click',function(e){
                        e.preventDefault();
                        e.stopPropagation();
                        $('#exampleModal').modal('toggle');
                        let target = $(e.target);
                        let input = target.closest(".image-uploader").find(`.upload_input`);
                        input.addClass("active-input");
                        fileInput.addClass("active-uploader");
                        console.log("{{ $id }}");
                        data_type = fileInput.attr('data-type');
                        $('#uploadModalContainer').empty();
                        $('#uploadModalContainer').append(`<label class="mb-3" for="images">Upload `+data_type+`
                </label>
                <input type="hidden" name="url" class="upload_input" >
                <input type="file" id="setDataType" data-name="url" data-plugins="drop" data-type="`+data_type+`"  />`);
                    initUpload();
                    });
                   
                }
            })
        }
      
    }
    $(document).ready(
        $("#dropify_script").on("load",()=>{

            initializeFileUploads();
        })
        );
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
                    // fileInput.closest(".image-uploader").append(`<div class=""><div class="progress-bar progress-bar-striped bg-primary" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div></div>`);
                    // if(! fileInput.closest(".image-uploader .progress") ){
                        // console.log({fileInput});
                        // if(flag === 0){
                            // if(! (fileUpload.closest(".image-uploader").hasClass("pbadded"))){
                                fileUpload.closest(".image-uploader").append(`<div class="progress progress-sm upload mb-2"><div class="progress-bar progress-bar-striped bg-primary" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div></div>`);
                                // fileUpload.closest(".image-uploader").addClass("pbadded") ;
                            // }
                            // $(fileInput.closest(".image-uploader")).removeClass("image-uploader");
                            // flag = 1;
                        // }
                    // }
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
                                            // console.log(active_input.find('.dropify-preview'));
                                            if(data_type != 'video'){
                                                let img = $($($($(active_input).parent().children('.dropify-preview')[0]).children('span')[0]).children('img')[0]);
                                                if(img.length){
                                                    img.attr("src","{{ assetUrl("") }}"+ path);
                                                    // alert("not appended")
                                                }else{
                                                    // active_input.attr("data-default-file", "{{ assetUrl("") }}"+ path)
                                                    // active_input.dropify({
                                                    //     'defaultFile': "{{ assetUrl("") }}"+ path
                                                    // })
                                                    // alert("appended")
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

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Image Gallery</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="image-uploader" id="uploadModalContainer" >
                
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="ModClose()">Close</button>
        </div>
      </div>
    </div>
  </div>

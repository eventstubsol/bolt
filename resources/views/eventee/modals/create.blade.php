@extends("layouts.admin")


@section('styles')
    @include("includes.styles.fileUploader")
    @include("includes.styles.wyswyg")
    @include("includes.styles.datatables")
@endsection
@section('page_title')
   Create Modal 
@endsection

@section('title')
   Create Modal
@endsection

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route("eventee.modal",$id) }}">Modal</a></li>
    <li class="breadcrumb-item active">Create</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                    <form action="{{ route('eventee.modal.save',$id) }}" method="POST">
                        
                        <div class="form-group mb-3">
                            <label for="name">Modal Name
                                <span style="color:red">*</span>
                            </label>
                            <input  autofocus type="text" name="name" class="form-control  @error('name') is-invalid @enderror">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="name">Modal Type
                                <span style="color:red">*</span>
                            </label>
                            <select name="type"  onchange="modalType(this)" class="form-control">
                                <option value=0>List</option>
                                <option value=1>Embeded Code</option>
                            </select>
                            
                    
                        </div>

                        <div class="card list">
                            <div class="card-body">
                                <h4 class="header-title mb-3">Modal Items
                                    <span style="color:red">*</span>
                                </h4>
                                <div class="link-section">
                                   
    
                                </div>
                                <br><br>
                                <div>
                                    <button class="btn btn-primary">Save</button>
                                    <button class="btn btn-primary" id="add-link">Add Item</button>
                                </div>
    
                            </div>
                        </div>

                        <div class="card embed" style="display: none">
                            <div class="card-body">
                               
                                <div class="embed-content">
                                    <div class="form-group">
                                        <label for="answer">Embeded Code
                                            <span style="color:red">*</span>
                                        </label>
                                        <textarea  name="code"  id="summernote-basic" class="form-control @error('answer') is-invalid @enderror" cols="500" rows="1000" >{{ old('answer') }}</textarea>
                                        @error('answer')
                                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <button class="btn btn-primary">Save</button>
                                </div>
                                <br><br>
    
    
                            </div>
                        </div>
    
                    </form>
            </div>
        </div>
    </div>
</div>

@endsection


@section('scripts')

@include("includes.scripts.fileUploader")
@include("includes.scripts.wyswyg")


<script>
    let n=0;

    $(document).ready(function() {    
        $("#add-link").on("click", addlink);
    });


    function modalType(e){
        let val = e.value;
        let lis = $('.list');
        let embed = $('.embed');
        if(val == 0){
            lis.show();
            embed.hide();
        }
        else{
            lis.hide();
            embed.show();
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
        }
        // console.log(val);
    }

    
    function bindRemoveButton() {
        $(".remove-link").unbind().on("click", removelink);
        $(".type").on("change",toggleVisibility);    
    }

    
    function removelink(e) {
        e.preventDefault();
        confirmDelete("Are you sure you want to delete the Link", "Confirm Link deletion!").then(confirmation => {
            if (confirmation) {
                $(this).closest(".row").remove();
            }
        })
    }



    function addlink(e) {
        // alert("shubh");
        e.preventDefault();
        n++;
        $(".link-section").append(`
                                <div class="row  border border-primary p-2 mt-2">
                                    <div class="form-group mb-3 col-md-4">
                                        <label for="linktitles">Name</label>
                                        <input type="text" required  name="linknames[]" class="form-control">
                                    </div>
                                    <div class="form-group mb-3 col-md-4">
                                        <label for="linktitles">Button_text</label>
                                        <input type="text" required  name="button_text[]" class="form-control">
                                    </div>


                                    <div class="form-group mb-3 col-md-4">
                                        <label for="type">type</label>
                                        <select required class="form-control type" data-index="${n}"  name="type[]" >
                                            @foreach(MODAL_TYPES as $type)
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
                                    <button class="btn btn-danger mt-2 mb-4 ml-2 remove-link">Remove</button>
                                </div>`);
        
        bindRemoveButton();
        initializeFileUploads();
    }
</script>
@endsection
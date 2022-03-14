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
    <li class="breadcrumb-item"><a href="{{ route("eventee.sessionrooms.index",['id'=>$id]) }}">Session Rooms</a></li>
    <li class="breadcrumb-item active">Edit</li>
@endsection

@section("content")

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div id="image_demo" class="im-section" style="position:relative; padding:0" >
                    @if(isset($sessionroom->videoBg))
                        <video class="full-width-videos"  autoplay src="{{$sessionroom->videoBg?assetUrl($sessionroom->videoBg->url):''}}" repeat style="width: 100%"></video>
                    @elseif(isset($sessionroom->background->url))
                        <img src="{{$sessionroom->background?assetUrl($sessionroom->background->url):''}}" style="min-width:100%" />
                    @endif
                        {{-- Screen Area --}}
                        <div class="screen_area im image_links" style=" position:absolute; top:{{$sessionroom->top}}%; left:{{$sessionroom->left}}%; width:{{$sessionroom->width}}%; height:{{$sessionroom->height}}%; background:white;" >Screen</div>

                </div>
                <form action="{{ route("eventee.sessionrooms.update", [ "sessionroom" => $sessionroom->id,'id'=>$id ]) }}" method="post">
                    {{ csrf_field() }}
                    @method("PUT")
                   <div>
                    <div  class="row positioning col-md-12" >
                                    
                        <div  class="form-group mb-3 col-md-3">
                            <label for="top">top</label>
                            <input  type="number" required value="{{ $sessionroom->top}}" name="top"  class="pos  form-control">
                        </div>
                        
                        <div  class="form-group mb-3 col-md-3">
                            <label for="pos">left</label>
                            <input  type="number" required value="{{ $sessionroom->left}}" name="left"  class="pos  form-control">
                        </div>
                        
                        <div  class="form-group mb-3 col-md-3">
                            <label for="pos">width</label>
                            <input  type="number" required value="{{ $sessionroom->width}}" name="width"  class="pos  form-control">
                        </div>

                        <div  class="form-group mb-3 col-md-3">
                            <label for="pos">height</label>
                            <input  type="number" required value="{{ $sessionroom->height}}" name="height"  class="pos  form-control">
                        </div>

                         <button  class="btn btn-primary  done" >DONE</button>

                        </div>
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
        
     
        
        $(".pos").on("input",changePosition);
  
        $(".done").hide();
        $(".done").on("click",resetPosition)
      
    });

    function resetPosition(e){
        e.preventDefault();
        let target = $(e.target);
        $(".done").hide();
        $(".positioning").eq(0).css({
            position: "static",
            background: "#ffffff",
            padding: "0",
            color: "#6c757d",
            width: "100%",
        });
    }

    
    function changePosition(e){
        
        let target = $(e.target);
        
        
        const positions =  $(".pos").map((i, v) => v.value);
        $(".done").show();
        $(".im").eq(0).css(areaStylesb(positions));
        $(".positioning").eq(0).css({
            position: "fixed",
            bottom: "20px",
            left: "18%",
            background: "#23283ebd",
            padding: "15px",
            color: "white",
            width: "40%",
            zIndex: "9"
        });
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

    
</script>
@endsection
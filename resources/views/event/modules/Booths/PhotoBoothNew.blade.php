<div class="page  has-padding padding-small pb-0" id="photo-booth-page-2" style="height: 100vh">
    <iframe frameborder="0" class="photo-booth" id="photo-gallery-2"  src="{{getField('photo_booth_gallery_2')}}" allow="camera"></iframe>
    <button id="capture-2" class="pb-button">
        <i class="fe-camera mr-1"></i>
        Capture
    </button>
    <iframe id="photo-capture-2" src="{{getField('photo_booth_capture_2')}}" style="border:0px #ffffff none;" name="myiFrame" scrolling="yes" frameborder="0" marginheight="0px" marginwidth="0px" class="photo-booth" allowfullscreen allow="camera; autoplay; encrypted-media;"></iframe>
    <button id="gallery-2" class="pb-button">
        <i class="fe-image mr-1"></i>
        Gallery
    </button>



    {{--    <img src="{{ asset("images/BG.jpg") }}" class="positioned booth-bg" alt="">--}}
{{--    <div class="position-relative">--}}
{{--        <img src="{{ storageUrl("PhotoBooth.png") }}" class="positioned booth-bg" alt="">--}}
{{--        <iframe frameborder="0" class="positioned" style="width: 100%; height: 100%; top: 0%; left: 0%"  src="https://galleries.outsnapped.com/virtual/capture/ZbwNp" allow="camera"></iframe>--}}
{{--        <iframe frameborder="0" class="positioned" style="width: 60%;height: 47%;top: 25.7%;left: 20%;"  src="https://galleries.outsnapped.com/virtual/capture/nrAWa" allow="camera"></iframe>--}}
{{--        <iframe frameborder="0" class="positioned" style="width: 60%;height: 47%;top: 25.7%;left: 20%;"  src="https://galleries.outsnapped.com/virtual/capture/ZbwNp" allow="camera"></iframe>--}}
{{--    </div>--}}
</div>
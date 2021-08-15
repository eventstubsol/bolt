<div class="page" id="auditorium-room">
    <div class="position-relative" style="height:100vh">
        <img async src="{{ assetUrl(getField("background_image")) }}" id="audi-background" class="positioned fill booth-bg" alt="">
        <div class="positioned" id="play-audi-btn" style="{{ areaStyles(AUDI_SCREEN_AREA) }};display:flex;align-items: center; justify-content: center;background: #fff;cursor: pointer; opacity:0">
            @include("event.modules.clickToJoin")
        </div>
    </div>
    {!! getScavengerItems("auditorium") !!}
</div>
<div class="modal fade theme-modal slido-container-modal" id="audi-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <div class="modal-body">
                <div style="padding-bottom: {{ AUDI_IMAGE_ASPECT }}%"></div>
                <div id="audi-content" class="positioned fill"></div>
                <div class="slido-panel" id="audi-slido-panel"></div>
            </div>
        </div>
    </div>
</div>

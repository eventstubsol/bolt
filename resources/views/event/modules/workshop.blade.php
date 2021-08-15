<div class="page" id="workshop-room">
    <div class="position-relative" style="height:100vh;">
        <img src="{{ assetUrl(getField("workshop_background")) }}" class="positioned fill booth-bg" alt="">
        <div class="positioned" id="play-workshop-btn" style="{{ areaStyles(CAUCUS_SCREEN_AREA) }};display:flex;align-items: center; justify-content: center;cursor: pointer;">
        <p id='workshop-screen' style='text-transform: uppercase;line-height: 2em;font-size: 1.2rem; color: #25467b; box-shadow: aqua 38px; text-shadow: 1px 1px #ddd; font-weight: 800; text-align: center; padding-top: 35px;'></p>
    </div>
    </div>
</div>
<div class="modal fade embed-modal slido-container-modal" id="workshop-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <div class="modal-body">
                <div class="position-relative">
                    <div style="padding-bottom: {{ AUDI_IMAGE_ASPECT }}%"></div>
                    <div id="workshop-content" class="positioned fill" ></div>
                    <div class="slido-panel" id="slido-panel"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade embed-modal" id="workshop-list" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <div class="modal-body">
                <div class="position-relative">
                    <div class="workshop-list">
                        @foreach(WORKSHOP_ROOMS as $room)
                        <a class="area" data-link="workshop/{{ $room }}">
                            {{ WORKSHOP_ROOM_NAMES[$room] }}
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

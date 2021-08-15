<div class="page" id="expo-hall-page" style="position: relative; height:100vh">
    <img async src="{{ assetUrl(getField("expo_hall_image")) }}"  class="positioned booth-bg" alt="">
    <div class="rooms-list">
        <div class="area positioned" style="top: 18%; left: 61%;height: 52%; width: 19%;" data-link="room/sponser">
        </div>
        <div class="area positioned" style="top: 18%; left: 18%;height: 52%; width: 19%;" data-link="room/vendor">
        </div>
        <div class="area positioned" style="top: 18%; left: 39%;height: 52%; width: 19%;" data-link="room/pavillion">
        </div>  
        
    </div>
{{--    <div class="rooms-list">--}}
{{--        @foreach($rooms as $room)--}}
{{--            <div class="area" data-link="room/{{ $room->id }}">--}}
{{--                {{ $room->name }}--}}
{{--            </div>--}}
{{--        @endforeach--}}
{{--    </div>--}}
</div>
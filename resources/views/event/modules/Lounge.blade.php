<div class="page" id="lounge-page">
    <div style="position: relative; height:100vh">
        <img async src="{{ assetUrl(getField("networkingLounge")) }}" class="positioned booth-bg" alt="" />
            <a title="zoom" 
                class="positioned zoom_urls"
                style=" top: 29.8%; left: 5.8%; width:16.2%; height:23%;"
                href="{{ getField('lounge_zoom_url')  }}"
                target="_blank"
            ></a>
        @foreach(LOUNGE_AREAS as $area)
            @if(isset($area['zoom_url']))
            <a title="{{ $area['title']}}" 
                class="positioned zoom_urls"
                style="{{ areaStyles($area['area']) }}"
                href="{{ $area['zoom_url'] }}"
                target="_blank"
            ></a>

            @else
            <div
                    title="{{ $area['title'] }}"
                    class="positioned area"
                    data-link="{{ $area['link'] }}"
                    style="{{ areaStyles($area["area"]) }}"></div>
            @endif
        @endforeach
        {!! getScavengerItems("lounge") !!}
    </div>
</div>
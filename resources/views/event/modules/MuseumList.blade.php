<div class="page pb-0" id="museum">
    <div class="museum position-relative" style="height:100vh">
        <img async src="{{ assetUrl(getField('external_floor')) }}" class="positioned booth-bg" alt="">
        <!-- Standee 1 -->
        <div class="area positioned"  data-link="museum/1" style="top: 49.6%;left: 17.2%;width: 19.8%;height: 34.5%;">
        </div>
        <!-- Standee 2 -->
        <div class="area positioned"  data-link="museum/2" style="top: 48.6%;left: 40.2%;width: 19.8%;height: 34.5%">

        </div>
        <!-- Standee 3 -->
        <div class="area positioned"  data-link="museum/3" style="top: 49.6%;left: 63.2%;width: 19.8%;height: 34.5%">
 

        </div>
   
        </div>
        {!! getScavengerItems("museum") !!}

    </div>
</div>
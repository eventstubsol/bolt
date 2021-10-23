<style>
    
    #lounge_tables{
        padding: 0 0px;
        margin-top: 51px;
    }
    
    .lounge_container li{
        position: relative;
    }
    .lounge_container span{
        position: absolute;
        top: 10px;
        left: 10px;
        width: 68%;
        height: 78%;
        color: white;
        display: flex;
        flex-direction: column;
    }
    .lounge_container img{
        position: absolute;
        top: 10px;
        left: 12px;
        width: 64%;
        height: 69%;
        object-fit: cover;
        border-radius: 6px;
    }


    .lounge_container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-evenly;
        margin-top: 20px;
    }
    .table_container a{
        width: 59%;
        height: 47%;
        background: rgb(26, 26, 77);
        border-radius: 35px;
        cursor: pointer;
        display: flex;
        justify-content: center;
        align-items: center; 
        color: white !important;

    }
    .table_container { 
        background: sandybrown;
        height: 500px;
        width: 435px;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
        /* margin: 20px; */
        margin-top: 20px;
        border-radius:20px;

    }
    .table_container ul{
        list-style-type: none;
        top: -32px;
        left: 50px;
        display: flex;
        justify-content: space-evenly;
        width: 300px;
    } 
    ul.top{
        position: absolute;
        top: 29px;
        
    }
    ul.left{
        position: absolute;
        left: -105px;
        top: 214px;
        transform: rotate(270deg);
        
    }
    ul.right{
        position: absolute;
        transform: rotate(-270deg);
        left: 236px;
        top: 182px;
    }
    ul.bottom{
        position: absolute;
        transform: rotate(180deg);
        top: 384px;
        left: 82px;
    }
    img.profile_image {
        width: 30px;
        border-radius: 50%;
        display: inline-block;
        position: absolute;
        top: -110%;
        left: 50%;
        transform: translateX(-50%);
    }
    div#lounge-session-content {
        align-items: center;
        display: flex;
        justify-content: center;
    }

</style>
<div class="page" id="networking">
   
    <div>
        <div id="lounge_tables" >
            <div class="lounge_container">
                @foreach($tables as $i=> $table)
                    <div class="table_container">
                        @php
                            $classes = ["top","bottom","left","right"];
                            $avs = $table->availableSeats();
                            $participants = $table->participants;
    
                        @endphp
                        @if(!($avs<1)) 
                            <a class="lounge_meeting table "  data-toggle="modal" data-table="{{$table->id}}" data-target="#lounge_modal"  data-meeting="{{$table->meeting_id}}">{{$table->name}}  Seats: {{$table->seats}}
                            AV Seats: {{$avs}}</a>
                        @else  
                            <a class="table "  data-toggle="modal" data-target="#table_full" >{{$table->name}}  Seats: {{$table->seats}}
                                AV Seats: {{$avs}}</a>
                        @endif 
                       
                        @for($i = 0;$i< 4;$i++)
                           
                            <ul class="{{ $classes[$i] }}">
                                @if( $i  + 1 <= $table->seats)
                                    @if(isset($participants[$i]))
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.0" width="83pt" height="65pt" viewBox="0 0 119.000000 105.000000" preserveAspectRatio="xMidYMid meet">
                                            <g transform="translate(0.000000,105.000000) scale(0.100000,-0.100000)" fill="#BC6838" stroke="none">
                                            <path d="M235 934 c-42 -21 -111 -91 -130 -130 -9 -19 -15 -60 -15 -98 l0 -66 70 0 70 0 0 59 c0 55 2 61 35 89 19 17 51 36 72 41 21 6 134 11 253 11 119 0 232 -5 253 -11 21 -5 53 -24 72 -41 33 -28 35 -34 35 -89 l0 -59 70 0 70 0 0 66 c0 40 -6 79 -16 99 -19 40 -103 121 -139 135 -15 6 -161 10 -348 10 -271 0 -327 -3 -352 -16z"/>
                                            <path d="M375 776 c-60 -28 -87 -56 -114 -116 -18 -39 -21 -65 -21 -210 0 -153 2 -169 24 -215 28 -60 56 -87 116 -114 39 -18 65 -21 210 -21 145 0 171 3 210 21 60 27 88 54 116 114 22 46 24 62 24 215 0 153 -2 169 -24 215 -28 60 -56 87 -116 114 -39 18 -65 21 -210 21 -153 0 -169 -2 -215 -24z"/>
                                            </g>
                                        </svg>
                                        <img src="{{ $participants[$i]->user->profileImage ? assetUrl($participants[$i]->user->profileImage) : ''}}" width="30" alt="">
                                        {{$participants[$i]->user->name}}</li>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.0" width="83pt" height="65pt" viewBox="0 0 119.000000 105.000000" preserveAspectRatio="xMidYMid meet">
                                            <g transform="translate(0.000000,105.000000) scale(0.100000,-0.100000)" fill="#BC6838" stroke="none">
                                            <path d="M235 934 c-42 -21 -111 -91 -130 -130 -9 -19 -15 -60 -15 -98 l0 -66 70 0 70 0 0 59 c0 55 2 61 35 89 19 17 51 36 72 41 21 6 134 11 253 11 119 0 232 -5 253 -11 21 -5 53 -24 72 -41 33 -28 35 -34 35 -89 l0 -59 70 0 70 0 0 66 c0 40 -6 79 -16 99 -19 40 -103 121 -139 135 -15 6 -161 10 -348 10 -271 0 -327 -3 -352 -16z"/>
                                            <path d="M375 776 c-60 -28 -87 -56 -114 -116 -18 -39 -21 -65 -21 -210 0 -153 2 -169 24 -215 28 -60 56 -87 116 -114 39 -18 65 -21 210 -21 145 0 171 3 210 21 60 27 88 54 116 114 22 46 24 62 24 215 0 153 -2 169 -24 215 -28 60 -56 87 -116 114 -39 18 -65 21 -210 21 -153 0 -169 -2 -215 -24z"/>
                                            </g>
                                        </svg>
                                    @endif
                                    @if(isset($participants[$i+4]))
                                        <li>{{$participants[$i+4]->user->name}}</li>
                                    @elseif($i+4 < $table->seats)
                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.0" width="83pt" height="65pt" viewBox="0 0 119.000000 105.000000" preserveAspectRatio="xMidYMid meet">
                                            <g transform="translate(0.000000,105.000000) scale(0.100000,-0.100000)" fill="#BC6838" stroke="none">
                                            <path d="M235 934 c-42 -21 -111 -91 -130 -130 -9 -19 -15 -60 -15 -98 l0 -66 70 0 70 0 0 59 c0 55 2 61 35 89 19 17 51 36 72 41 21 6 134 11 253 11 119 0 232 -5 253 -11 21 -5 53 -24 72 -41 33 -28 35 -34 35 -89 l0 -59 70 0 70 0 0 66 c0 40 -6 79 -16 99 -19 40 -103 121 -139 135 -15 6 -161 10 -348 10 -271 0 -327 -3 -352 -16z"/>
                                            <path d="M375 776 c-60 -28 -87 -56 -114 -116 -18 -39 -21 -65 -21 -210 0 -153 2 -169 24 -215 28 -60 56 -87 116 -114 39 -18 65 -21 210 -21 145 0 171 3 210 21 60 27 88 54 116 114 22 46 24 62 24 215 0 153 -2 169 -24 215 -28 60 -56 87 -116 114 -39 18 -65 21 -210 21 -153 0 -169 -2 -215 -24z"/>
                                            </g>
                                        </svg>
                                    @endif
                                @endif
                            </ul>
                        @endfor
                    </div>
                @endforeach
            </div>
    
        </div>
    
    
    <div data-backdrop="static"  class="modal fade embed-modal slido-container-modal" id="lounge_modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <div class="modal-body">
                    <div class="position-relative">
                        <div style="padding-bottom: {{ AUDI_IMAGE_ASPECT }}%"></div>
                        <div id="lounge-session-content" class="positioned fill" >
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div data-backdrop="static"  class="modal fade embed-modal slido-container-modal" id="table_full" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <div class="modal-body">
                    <div class="position-relative">
                        <div style="padding-bottom: {{ AUDI_IMAGE_ASPECT }}%"></div>
                        <div id="lounge-session-content" class="positioned fill" >
                            No Seats Left
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

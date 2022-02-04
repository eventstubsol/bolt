<style>
    
    

    /* //New css// */
    .table_Box{
        background:#e9d4c1;
        width: 320px;
        height: 330px;
        border-radius: 5px;
        align-items: center;
        display: flex;
        justify-content: center;
        margin:0 15px 25px 0;
        position: relative;
        cursor: pointer;
    }
    .TableBlock{
        width: 150px;
        height: 160px;
        border-radius: 5px;
        border: 1px solid #d1864f;
        background: #e9ba84;
        padding: 20px 10px 10px;
        cursor: pointer;
        justify-content: space-between;
    }
    .TableBlock h2{
        font-size:13px;
        font-weight: 600;
        text-transform: uppercase;
    }
    .TableBlock h3{
        font-size: 12px;
        font-weight: 400;
        text-transform: uppercase;
    }

    .TableBlock h2 span{
        font-weight: 400;
    }

    ul{
        margin: 0;
        padding: 0;
    }

    ul li{
        list-style: none;
    }

    .tob_Chair{
        position: absolute;
        top: 6%;
        left: 0;
        display: flex;
        justify-content: center;
        width: 100%;
    }
    .right_Chair{
        position: absolute;
        top: 0;
        right: 7%;
        display: flex;
        justify-content: center;
        width: 100%;
        height: 100%;
        transform: rotate(90deg);
    }
    .bottom_Chair{
        position: absolute;
        bottom: 6%;
        left: 0;
        display: flex;
        justify-content: center;
        width: 100%;
        transform: rotate(180deg);
    }

    .left_Chair{
        position: absolute;
        top: 0;
        left: 7%;
        display: flex;
        justify-content: center;
        width: 100%;
        height: 100%;
        transform: rotate(270deg);
    }

    .table_Box ul li{
        margin-right: 15px;
        position: relative;
    }
    .table_Box ul li:last-child{
        margin-right: 0px;
    }

    .chairBooking{
        position: absolute;
        width: 40px;
        overflow: hidden;
        height: 40px;
        display: flex;
        background: transparent;
        border-radius: 25%;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        top: 15px;
        left: 14px;
        padding: 2px;
    }

    .chairBooking span{
        line-height: 0;
        background: transparent;
        width: 20px;
        height: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 100%;
        overflow: hidden;
    }
    .chairBooking span img{
        height: 20px;
        width: 100%;
        object-fit: cover;
    }

    .chairBooking h4{
        font-size: 8px;
        color: #fff;
        white-space: nowrap;
        width: 35px;
        overflow: hidden;
        text-overflow: ellipsis;
        padding: 0;
        margin: 2px 0 0;
    }

    #networking{
        background: #01493e;
        padding-top:100px;
    }

    .justify-content-evenly{
        justify-content: space-evenly;
    }

    .for-checking{
        width: 100%;
        height: 50%;
        justify-content: center;
        display: flex;
        overflow: hidden;
        border-radius: 4px;
    }

    .for-checking img{
        height: 100%;
        width: 100%;
        object-fit: contain;
    }

    .BigTableBox{
        width: 614px;
        margin: 0 auto 25px;
    }

    .bigTable{
        width: 75%;
    }

    
    .bigTable .for-checking{ 
        width: 35%;
    }

    .bigTable .for-checking img{
        object-fit: contain;
    }


    .bigTopchair{
        padding: 0 12%;
        justify-content: space-between;
    }

    .bigLeftchair{
        width: initial;
        transform: rotate(-90deg);
        left: 16%;
    }

    .bigRightchair{
        width: initial;
        right: 16%;
    }

    .bigBottomchair{
        padding: 0 12%;
        justify-content: space-between;
    }


</style>
{{-- <div class="page py-5 d-none" id="networking">
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
                                @if(isset($participants[$i]) && isset($participants[$i]->user))
                                <li>
                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.0" width="83pt" height="65pt" viewBox="0 0 119.000000 105.000000" preserveAspectRatio="xMidYMid meet">
                                        <g transform="translate(0.000000,105.000000) scale(0.100000,-0.100000)" fill="#BC6838" stroke="none">
                                        <path d="M235 934 c-42 -21 -111 -91 -130 -130 -9 -19 -15 -60 -15 -98 l0 -66 70 0 70 0 0 59 c0 55 2 61 35 89 19 17 51 36 72 41 21 6 134 11 253 11 119 0 232 -5 253 -11 21 -5 53 -24 72 -41 33 -28 35 -34 35 -89 l0 -59 70 0 70 0 0 66 c0 40 -6 79 -16 99 -19 40 -103 121 -139 135 -15 6 -161 10 -348 10 -271 0 -327 -3 -352 -16z"/>
                                        <path d="M375 776 c-60 -28 -87 -56 -114 -116 -18 -39 -21 -65 -21 -210 0 -153 2 -169 24 -215 28 -60 56 -87 116 -114 39 -18 65 -21 210 -21 145 0 171 3 210 21 60 27 88 54 116 114 22 46 24 62 24 215 0 153 -2 169 -24 215 -28 60 -56 87 -116 114 -39 18 -65 21 -210 21 -153 0 -169 -2 -215 -24z"/>
                                        </g>
                                    </svg>
                                    <img src="{{ $participants[$i]->user->profileImage ? assetUrl($participants[$i]->user->profileImage) : ''}}" width="30" alt="">
                                    {{$participants[$i]->user->name}}
                                </li>
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
</div> --}}


<div class="page py-5" id="networking" style="min-height:100vh">
    <div class="container-fluid d-flex mt-5 flex-wrap justify-content-evenly pr-0" id="lounge_tables">
        @foreach($tables as $i=> $table)
        @php
            $classes = ["tob_Chair","bottom_Chair","right_Chair","left_Chair"];
            $avs = $table->availableSeats();
            $participants = $table->participants;

        @endphp
            @if($table->seats == 16)
            <div class="container-fluid">
                <div class="table_Box BigTableBox">
                    <div class="TableBlock bigTable d-flex justify-content-between align-items-center">
                        <div>
                            <h2>Seats: <span>{{ $avs }} Available<span></span></span></h2>
                        </div>
                        @if($table->logo !== null)
                            <div class="for-checking">
                                <img src="{{ assetUrl($table->logo) }}" alt="">
                            </div>
                        @endif
                        <div class="mt-0">
                            <h3 class="d-flex align-items-center"> 
                                <span class="mr-2 d-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#fff" class="bi bi-person-check" viewBox="0 0 16 16">
                                    <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"></path>
                                    <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"></path>
                                    </svg>
                                </span> 
                                {{ $table->name }}
                            </h3>
                        </div>
                    </div>
                    <ul class="tob_Chair bigTopchair">
                        <li><img src="{{asset("/assets/images/chair-svg.svg")}}"></li>
                        <li><img src="{{asset("/assets/images/chair-svg.svg")}}"></li>
                        <li><img src="{{asset("/assets/images/chair-svg.svg")}}"></li>
                        <li><img src="{{asset("/assets/images/chair-svg.svg")}}"></li>
                        <li><img src="{{asset("/assets/images/chair-svg.svg")}}"></li>
                        <li><img src="{{asset("/assets/images/chair-svg.svg")}}"></li>
                    </ul>
                    <ul class="left_Chair bigLeftchair">
                        <li><img src="{{asset("/assets/images/chair-svg.svg")}}"></li>
                        <li><img src="{{asset("/assets/images/chair-svg.svg")}}"></li>
                    </ul>
                    <ul class="right_Chair bigRightchair">
                        <li><img src="{{asset("/assets/images/chair-svg.svg")}}"></li>
                        <li><img src="{{asset("/assets/images/chair-svg.svg")}}"></li>
                    </ul>
                    <ul class="bottom_Chair bigBottomchair">
                        <li><img src="{{asset("/assets/images/chair-svg.svg")}}"></li>
                        <li><img src="{{asset("/assets/images/chair-svg.svg")}}"></li>
                        <li><img src="{{asset("/assets/images/chair-svg.svg")}}"></li>
                        <li><img src="{{asset("/assets/images/chair-svg.svg")}}"></li>
                        <li><img src="{{asset("/assets/images/chair-svg.svg")}}"></li>
                        <li><img src="{{asset("/assets/images/chair-svg.svg")}}"></li>
                    </ul>
                </div>
            </div>
            @else
            <div class="table_Box lounge_meeting table" data-toggle="modal" data-table="{{$table->id}}" data-target="#lounge_modal" data-meeting="{{$table->meeting_id}}">
               
                <div class="TableBlock d-flex justify-content-between flex-column" >
                    <div>
                        <h2>Seats: <span>{{$avs}} Available<span></h2>
                        {{-- <h2 class="mt-3">Seats: <span>2<span></h2> --}}
                    </div>
                    @if($table->logo != null)
                        <div class="for-checking">
                            <img src="{{ assetUrl($table->logo) }}" alt="">
                        </div>
                    @endif
                    <div class="mt-0">
                        <h3 class="d-flex align-items-center"> 
                            <span class="mr-2 d-none">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#fff" class="bi bi-person-check" viewBox="0 0 16 16">
                                <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                                <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                                </svg>
                            </span> 
                            {{$table->name}}
                        </h3>
                    </div>
                </div>
                @for($i = 0;$i< 4;$i++)
                   
                    <ul class="{{ $classes[$i] }}">
                        @if( $i  + 1 <= $table->seats)
                            {{--  --}}
                            @if(isset($participants[$i]) && isset($participants[$i]->user))
                                <li>
                                    <img src="{{asset("/assets/images/chair-svg.svg")}}" />
                                    <div class="chairBooking">
                                        <span>
                                            @if(isset($participants[$i]->user->profileImage))
                                                <img src="{{ $participants[$i]->user->profileImage ? assetUrl($participants[$i]->user->profileImage) : ''}}" alt="">
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#fff" class="bi bi-person-check" viewBox="0 0 16 16">
                                                    <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                                                </svg>
                                            @endif
                                        </span>
            
                                        <h4>{{$participants[$i]->user->name}}</h4>
                                    </div>
                                </li>
                            @else
                                <li><img src="{{asset("/assets/images/chair-svg.svg")}}" /></li>
                            @endif 

                            {{--  --}}
                            @if(isset($participants[$i+4]) && isset($participants[$i+4]->user))
                                <li>
                                    <img src="{{asset("/assets/images/chair-svg.svg")}}" />
                                    <div class="chairBooking">
                                        <span>
                                            @if(isset($participants[$i+4]->user->profileImage))
                                                <img src="{{ $participants[$i+4]->user->profileImage ? assetUrl($participants[$i+4]->user->profileImage) : ''}}" alt="">
                                            @else
                                                <!-- <img src="/assets/images/userIcon.png" alt=""> -->
                                                <i class="fa fa-user text-white"></i>
                                            @endif
                                        </span>
            
                                        <h4>{{$participants[$i+4]->user->name}}</h4>
                                    </div>
                                </li>
                            @elseif($i+4 < $table->seats)
                                <li><img src="{{asset("/assets/images/chair-svg.svg")}}" /></li>
                            @endif 
                        @endif 
                    </ul>
                @endfor
            </div>
        @endif
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
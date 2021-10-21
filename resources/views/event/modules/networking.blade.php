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
        left: 42px;
        display: flex;
        justify-content: space-evenly;
        width: 300px;
    } 
    ul.top{
        position: absolute;
        top: 42px;
        
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
                                        <svg xmlns="http://www.w3.org/2000/svg" width="68" height="59" viewBox="0 0 68 59" fill="none">
                                            <rect x="7" y="6" width="53" height="53" rx="10" fill="#BC6838"/>
                                            <path d="M3.57121 2.30475C3.81975 0.968829 4.98546 0 6.34431 0H60.7916C62.0699 0 63.1648 0.915396 63.3912 2.1735L65.4763 13.757C65.7506 15.2809 63.6099 15.9232 63 14.5V14.5L60.75 9.25L59.625 6.625L59.0625 5.3125V5.3125C58.7213 4.51626 57.9383 4 57.072 4H10.5V4C9.533 4 8.59887 4.35098 7.87114 4.98776L7.5 5.3125V5.3125C6.51057 6.42561 5.76057 7.73026 5.29658 9.14543L3.52651 14.5442C3.50886 14.598 3.4871 14.6503 3.4614 14.7008V14.7008C2.88406 15.8349 1.16274 15.2503 1.39551 13.9992L3.57121 2.30475Z" fill="#BC6838"/>
                                        </svg>
                                        <img src="{{ $participants[$i]->user->profileImage ? assetUrl($participants[$i]->user->profileImage) : ''}}" width="30" alt="">
                                        {{$participants[$i]->user->name}}</li>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" width="68" height="59" viewBox="0 0 68 59" fill="none">
                                            <rect x="7" y="6" width="53" height="53" rx="10" fill="#BC6838"/>
                                            <path d="M3.57121 2.30475C3.81975 0.968829 4.98546 0 6.34431 0H60.7916C62.0699 0 63.1648 0.915396 63.3912 2.1735L65.4763 13.757C65.7506 15.2809 63.6099 15.9232 63 14.5V14.5L60.75 9.25L59.625 6.625L59.0625 5.3125V5.3125C58.7213 4.51626 57.9383 4 57.072 4H10.5V4C9.533 4 8.59887 4.35098 7.87114 4.98776L7.5 5.3125V5.3125C6.51057 6.42561 5.76057 7.73026 5.29658 9.14543L3.52651 14.5442C3.50886 14.598 3.4871 14.6503 3.4614 14.7008V14.7008C2.88406 15.8349 1.16274 15.2503 1.39551 13.9992L3.57121 2.30475Z" fill="#BC6838"/>
                                        </svg>
                                    @endif
                                    @if(isset($participants[$i+4]))
                                        <li>{{$participants[$i+4]->user->name}}</li>
                                    @elseif($i+4 < $table->seats)
                                        <svg xmlns="http://www.w3.org/2000/svg" width="68" height="59" viewBox="0 0 68 59" fill="none">
                                            <rect x="7" y="6" width="53" height="53" rx="10" fill="#BC6838"/>
                                            <path d="M3.57121 2.30475C3.81975 0.968829 4.98546 0 6.34431 0H60.7916C62.0699 0 63.1648 0.915396 63.3912 2.1735L65.4763 13.757C65.7506 15.2809 63.6099 15.9232 63 14.5V14.5L60.75 9.25L59.625 6.625L59.0625 5.3125V5.3125C58.7213 4.51626 57.9383 4 57.072 4H10.5V4C9.533 4 8.59887 4.35098 7.87114 4.98776L7.5 5.3125V5.3125C6.51057 6.42561 5.76057 7.73026 5.29658 9.14543L3.52651 14.5442C3.50886 14.598 3.4871 14.6503 3.4614 14.7008V14.7008C2.88406 15.8349 1.16274 15.2503 1.39551 13.9992L3.57121 2.30475Z" fill="#BC6838"/>
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

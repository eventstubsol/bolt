<style>
    .table_container{
        display: flex;
    }
    .lounge_container {
        display: flex;
        justify-content: space-evenly;
    }
    .table_container {
        width: 300px;
        height: 300px;
        display: flex;
        background: darkblue;
        /* margin: 30px; */
        border-radius: 30px;
        color: white;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        /* flex: 4 auto; */
        position: relative;
    }
    .table_container ul li {
        background: red;
        padding: 10px;
        border-radius: 45px;
        position: relative;
    }

    .table_container a{
        font-size: 30px;
        color:white !important;
    }
    .table_container ul {
        list-style-type: none;
        position: absolute;
        top: -32px;
        left: -15px;
        display: flex;
        justify-content: space-between;
        width: 300px;
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

</style>

<div class="page" id="networking">
    <div style="height:250px"></div>
    <div id="lounge_tables">
        <div class="lounge_container">
            @foreach($tables as $i=> $table)
                <div class="table_container">

                    <a class="lounge_meeting"  data-toggle="modal" data-table="{{$table->id}}" data-target="#lounge_modal"  data-meeting="{{$table->meeting_id}}">{{$table->name}}</a>
                    Seats: {{$table->seats}}
                    <ul>
                        @foreach($table->participants as $participant)
                            <li>{{$participant->user->name}}</li>
                        @endforeach
                    </ul>
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
</div>


<style>
    .poll_container{
        background: white;
        height: 800px;
    }
    .poll_results_container{
        background: white;
        height: 800px;
        /* overflow: auto; */
        padding: 20px;
        padding-bottom: 84px;
    }
</style>

<div class="pollbar-custom   ">
    <div class="" >
        <ul class="nav nav-pills navtab-bg nav-justified" style="margin: 0px -5px;">
            <li class="nav-item">
                <a href="#polls" data-toggle="tab" aria-expanded="true" class="nav-link  active">Polls</a>
            </li>
            <li class="nav-item">
                <a href="#results" data-toggle="tab" aria-expanded="true" class="nav-link ">Results</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active show" id="polls">
                <div class="poll_container " >
                    <iframe class="w-100 h-100" src="@if(isset($poll)) {{ route('eventee.poll',["poll"=>$poll->id,"id"=>$event->id]) }} @endif" id="pollframe" frameborder="0"></iframe>
                </div>
            </div>
            <div class="tab-pane " id="results">
                <div class="poll_results_container " >
                    <iframe class="w-100 h-100" src="@if(isset($pollResult)) {{ route('eventee.poll.userAnalytics',["poll"=>$pollResult->id,"id"=>$event->id]) }} @endif" id="pollResultframe" frameborder="0"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end Poll Bar -->


<script>
    $(document).ready(function() {
        var slug = "{{ $event_name }}";
        var pusher = new Pusher('{{ env('PUSHER_APP_KEY') }}', {
            cluster: 'us2'
        });
        var channel2 = pusher.subscribe(slug+"poll");
        @if(!isset($poll))
        $('.poll_container').hide();
        @endif
        channel2.bind('poll',function(data){
            const {location_type,location,poll,types} = data;
            let sidebar = $(".pollbar-custom");

            
            let fullLocation = window.location.hash;
            let hashlocation =fullLocation.split("/")[0]; //#sessionroom
            let user_location_type = hashlocation.split('#')[1];  //sessionroom
            let user_location = fullLocation.split("/")[1];//Auditorium
            let user_type = '{{Auth::user()->type}}';//Auditorium
            let user_subtype = '{{Auth::user()->subtype}}';//Auditorium
            console.log({user_location,user_location_type,user_type,user_subtype,location,location_type,types})
            publish = false;
            if(location_type=="all"){
                publish = true;
            }else if(location_type == user_location_type && location == user_location){
                publish = true;
            }
            if((!types.includes(user_type))||( user_subtype && user_subtype!=='' && !types.includes(user_subtype))){
                publish = false;
            }
            if(publish){
                url = window.config.baseRoute+`/poll/${window.config.eventId}/${data.poll}`;
                $("#pollframe").attr("src",url);
                sidebar.addClass('enabled');
                document.exitFullscreen();
            }


        })
        var channel3 = pusher.subscribe(slug+"pollResult");
        channel3.bind('pollResult',function(data){
            // console.log(data);
            const {location_type,location,poll,types} = data;
            let sidebar = $(".pollbar-custom");

            
            let fullLocation = window.location.hash;
            let hashlocation =fullLocation.split("/")[0]; //#sessionroom
            let user_location_type = hashlocation.split('#')[1];  //sessionroom
            let user_location = fullLocation.split("/")[1];//Auditorium
            let user_type = '{{Auth::user()->type}}';//Auditorium
            let user_subtype = '{{Auth::user()->subtype}}';//Auditorium
            console.log({user_location,user_location_type,user_type,user_subtype,location,location_type,types})
            publish = false;
            if(location_type=="all"){
                publish = true;
            }else if(location_type == user_location_type && location == user_location){
                publish = true;
            }
            if((!types.includes(user_type))||( user_subtype && user_subtype!=='' && !types.includes(user_subtype))){
                publish = false;
            }
            if(publish){
                url = window.config.baseRoute+`/analytic/${window.config.eventId}/${data.poll}`;
                $("#pollResultframe").attr("src",url);
                document.exitFullscreen();
                sidebar.addClass('enabled');
            }

         

        })
    });
</script>


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
            // console.log(data);
            
            url = window.config.baseRoute+`/poll/${window.config.eventId}/${data.poll}`;
            $("#pollframe").attr("src",url);
            $('.poll_container').show();


        })
        var channel3 = pusher.subscribe(slug+"pollResult");
        channel3.bind('pollResult',function(data){
            // console.log(data);
            
            url = window.config.baseRoute+`/analytic/${window.config.eventId}/${data.poll}`;
            $("#pollResultframe").attr("src",url);


        })
    });
</script>
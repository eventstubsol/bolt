@extends("layouts.admin")

@section("styles")
    @include("includes.styles.datatables")
    @include("includes.styles.select")
@endsection

{{-- @section("page_title")
    Room Report
@endsection --}}

@section("title")
    Room Report
@endsection

@section("breadcrumbs")
    <li class="breadcrumb-item active"><a href="{{ route('eventee.room.report',$id) }}">Room Report</a></li>
@endsection

@section("content")

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="form-group mb-3">
                    <label for="user-type">Select Location
                        <span style="color:red">*</span>
                    </label>
                    <select id="user-location" name="location" required class="form-control " onchange="checkLocation(this)">
                        <option value="none">None</option>
                        <option value="lobby">Lobby</option>
                        <option value="session_room">Session Room</option>
                        <option value="page">Page</option>
                        <option value="booth">Booth</option>
{{--                            <option>Active Users</option>--}}
{{--                            <option>Inactive Users</option>--}}
                    </select>
                </div>
                <div class="form-group mb-3" id="sessionRoom" style="display: none">
                    <label for="user-type">Select Room
                        <span style="color:red">*</span>
                    </label>
                    <select id="sessRoom" name="sessionRoom" required class="form-control ">
                        <option value=" ">None</option>
                       @foreach ($rooms as $room)
                            <option value="{{ $room->name }}">{{ __($room->name) }}</option>
                       @endforeach
{{--                            <option>Active Users</option>--}}
{{--                            <option>Inactive Users</option>--}}
                    </select>
                </div>
                <div class="form-group mb-3" id="page" style="display: none">
                    <label for="user-type">Select Page
                        <span style="color:red">*</span>
                    </label>
                    <select id="pageID" name="pages" required class="form-control ">
                        <option value=" ">None</option>
                       @foreach ($pages as $page)
                            <option value="{{ $page->name }}">{{ __($page->name) }}</option>
                       @endforeach
{{--                            <option>Active Users</option>--}}
{{--                            <option>Inactive Users</option>--}}
                    </select>
                </div>
                <div class="form-group mb-3" id="booth" style="display: none">
                    <label for="user-type">Select Booth
                        <span style="color:red">*</span>
                    </label>
                    <select id="boothId" name="booths" required class="form-control ">
                        <option value=" ">None</option>
                       @foreach ($booths as $booth)
                            <option value="{{ $booth->name }}">{{ __($booth->name) }}</option>
                       @endforeach
{{--                            <option>Active Users</option>--}}
{{--                            <option>Inactive Users</option>--}}
                    </select>
                </div>
                <div class="form-group">
                    <label for="Start_date">Start Date<span style="color:red">*</span></label>
                    <input type="date" id="start_date_report" class="form-control">
                </div>
                <div class="form-group">
                    <label for="End_date">End Date
                        <span style="color:red">*</span></label>
                    <input type="date" id="end_date_report" class="form-control">
                </div>
            </div>
        </div>
    </div>
    <button class="btn btn-primary" id="GetReport">Get Report</button>

   
</div>
<div class="row" id="showGraph" style="display: none">
    <div class="card">
        <div class="card-header">
            <form action="{{ route('eventee.excel.room.report',$id) }}" method="POST">
                <input type="hidden" name="location" id="location">
                <input type="hidden" name="location_type" id="location_type">
                <input type="hidden" name="event_id" id="event_id">
                <input type="hidden" name="start" id="start">
                <input type="hidden" name="end" id="end">
                <button type="submit" class="float-right btn btn-success">Download Report </button>
            </form>
        </div>
        <div class="card-body" >
            <div class="row" id="resultDivReport">

            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
<script>
    let submitted = 0;
    function checkLocation(e){
        var location = e.value;
        // submitted = 0;
        if(submitted == 1){
            submitted = 0;
            // $('#user-location').prop('selectedIndex',0);
            $('#start_date_report').val(" ");
            $('#end_date_report').val(" ");
            $('#showGraph').hide();
        }
        switch(location){
            case 'lobby':
                $('#sessionRoom').hide();
                $('#page').hide();
                $('#booth').hide();
                break;
            case 'session_room':
                $('#sessionRoom').show();
                $('#page').hide();
                $('#booth').hide();
                break;
            case 'page':
                $('#sessionRoom').hide();
                $('#page').show();
                $('#booth').hide();
                break;
            case 'booth':
                $('#sessionRoom').hide();
                $('#page').hide();
                $('#booth').show();
                break;
            case 'none':
                $('#sessionRoom').hide();
                $('#page').hide();
                $('#booth').hide();
                break;
        }
    }
</script>

<script>
    $(document).ready(function(){

        $('#GetReport').on('click',function(){
            submitted = 1;
            let location = $('#user-location').val();
            let locationType = null;
            let start_date = $('#start_date_report').val();
            let end_date = $('#end_date_report').val();
            if(location != 'lobby' || location != 'none'){
                if(location == 'session_room'){
                    locationType = $('#sessRoom').val();
                }
                else if(location == 'page'){
                    locationType = $('#pageID').val();
                }
                else if(location == 'booth'){
                    locationType = $('#boothId').val();
                }
            }
            $.post("{{ route('eventee.room.report.get') }}",{location:location,locationType:locationType,start_date:start_date,end_date:end_date,event_id:"{{ $id }}"},function(res){
                if(res.code == 201){
                    showMessage(res.message,'error');
                }
                else if(res.code ==200){
                    $('#showGraph').show();
                    var  report  = res.report;
                    var user_id_inp = $('#location');
                    var locationType = $('#location_type');
                    var event_id = $('#event_id');
                    var start = $('#start');
                    var end = $('#end');
                    user_id_inp.val(location);
                    locationType.val(locationType);
                    event_id.val("{{ $id }}");
                    start.val(start_date);
                    end.val(end_date);
                    $('#resultDivReport').empty();
                    $.each(report,function(key,value){
                        $('#resultDivReport').append('<table class="table  " id="childApp'+key+'"><thead><tr><th>'+ key + '</th></tr></thead><thead><tr><th>Name</th><th>Email</th><th>Entered At</th><th>Left At</th></tr></thead>');
                        $.each(value,function(secondKey,secondValue){
                            if(secondValue.type_location != null){
                                $('#childApp'+key+'').append('<tbody><tr><td>'+secondValue.name+'</td><td>'+secondValue.email+'</td><td>'+SetTime(secondValue.created_at)+'</td><td>'+SetTime(secondValue.updated_at)+'</td></tr></tbody>');
                            }
                            else{
                                $('#childApp'+key+'').append('<tbody><tr><td>'+secondValue.name+'</td><td>'+secondValue.email+'</td><td>'+SetTime(secondValue.created_at)+'</td><td>'+SetTime(secondValue.updated_at)+'</td></tr></tbody>');
                            }
                           
                        });
                    });
                }   
            })
        });
        function SetTime(time){
            let x = new Date(time);
            return x.getHours()+ ':' + x.getMinutes();
        }

    });
</script>

@endsection
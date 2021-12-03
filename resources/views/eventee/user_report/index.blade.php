@extends("layouts.admin")

@section("styles")
    @include("includes.styles.datatables")
    @include("includes.styles.select")
@endsection

@section("page_title")
    User Report
@endsection

@section("title")
    User Report
@endsection

@section("breadcrumbs")
    <li class="breadcrumb-item active">User Report</li>
@endsection

@section("content")

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="User">Select Attendee</label>
                    <select id="user" class="form-control  select2" data-toggle="select2">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }} @if($user->last_name != null){{ $user->last_name }}@endif</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="Start_date">Start Date</label>
                    <input type="date" id="start_date" class="form-control">
                </div>
                <div class="form-group">
                    <label for="End_date">End Date</label>
                    <input type="date" id="end_date" class="form-control">
                </div>
               
                    <button type="button" onclick="Report()" class="float-right btn btn-primary">Get Report </button>
                    <br><br>
                <div class="row" id="showGraph" style="display: none">
                    <div class="card">
                        <div class="card-header">
                            <form action="{{ route('eventee.excel.report',$id) }}" method="POST">
                                <input type="hidden" name="user_id" id="user_id">
                                <input type="hidden" name="event_id" id="event_id">
                                <input type="hidden" name="start" id="start">
                                <input type="hidden" name="end" id="end">
                                <button type="submit" class="float-right btn btn-success">Download Report </button>
                            </form>
                        </div>
                        <div class="card-body" >
                            <div class="row" id="resultDiv">

                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>

@endsection


@section('scripts')
@include("includes.scripts.select")
 <script src='https://www.gstatic.com/charts/loader.js'></script>
 
 <script src="src/table2csv.js"></script>

    <script>
      
        var reportStat = null;
          function Report(){
            var user_id = $('#user').val();
            var start_date = $('#start_date').val();
            var end_date = $('#end_date').val();
            $.post("{{ route('eventee.user.report.graph') }}",{'user_id':user_id,'start_date':start_date,'end_date':end_date,'event_id':"{{ $id }}"},function(response){
                console.log(response);

                if(response.code === 201){
                    showMessage("No Data Available","error");
                }
                else if(response.code === 203){
                    showMessage("Start and End Date Must Be Selected",'error');
                }
                else if(response.code === 200){
                    $('#showGraph').show();
                    var  report  = response.report;
                    reportStat = report;
                    var user_id_inp = $('#user_id');
                    var event_id = $('#event_id');
                    var start = $('#start');
                    var end = $('#end');
                    user_id_inp.val(user_id);
                    event_id.val("{{ $id }}");
                    start.val($('#start_date').val());
                    end.val($('#end_date').val());
                    $.each(report,function(key,value){
                        $('#resultDiv').append('<table class="table table-striped" id="childApp'+key+'"><thead><tr><th>'+ key + '</th></tr></thead><thead><tr><th>Type</th><th>Location</th><th>Entered At</th><th>Left At</th></tr></thead>');
                        $.each(value,function(secondKey,secondValue){
                          
                            $('#childApp'+key+'').append('<tbody><tr><td>'+secondValue.type+'</td><td>'+secondValue.type_location+'</td><td>'+SetTime(secondValue.created_at)+'</td><td>'+SetTime(secondValue.updated_at)+'</td></tr></tbody>');
                        });
                    });
                    // $('#showGraph').show();
                    // ArrBreak(response.report);
                  

                }
                else if(response.code === 202){
                  showMessage("Date Difference Cannot be more than 7 Days","error");
                }
            });
            
          }

          function SetTime(time){
            let x = new Date(time);
            return x.getHours()+ ':' + x.getMinutes();
          }

         
    </script>
@endsection
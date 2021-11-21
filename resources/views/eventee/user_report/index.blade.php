@extends("layouts.admin")

@section("styles")
    @include("includes.styles.datatables")
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
                    <select id="user" class="form-control select2">
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
                
                <div class="row" id="showGraph" style="display: none">
                    <div class="card">
                        <div class="card-header" id="reportFor"> </div>
                        <div class="card-body" id="chart_div"></div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>

@endsection


@section('scripts')

 <script src='https://www.gstatic.com/charts/loader.js'></script>
 <script>
   google.charts.load('upcoming', {'packages': ['vegachart']}).then(drawChart);

   function drawChart(object) {
     const dataTable = new google.visualization.DataTable();
     dataTable.addColumn({type: 'string', 'id': 'category'});
     dataTable.addColumn({type: 'number', 'id': 'amount'});
   
     $.each(object,function(key,value){
            if(value.section == 'Lobby' || value.section == 'Lounge' || value.section =="Leaderboard"){
                dataTable.addRows([
                [value.section,value.timeScape],
            ]);
            }
            else{
                dataTable.addRows([
                    [value.location,value.timeScape],
                ]);
            }
        });

     const options = {
       "vega": {
         "$schema": "https://vega.github.io/schema/vega/v4.json",
         "width": 500,
         "height": 200,
         "padding": 5,

         'data': [{'name': 'table', 'source': 'datatable'}],

         "signals": [
           {
             "name": "tooltip",
             "value": {},
             "on": [
               {"events": "rect:mouseover", "update": "datum"},
               {"events": "rect:mouseout",  "update": "{}"}
             ]
           }
         ],

         "scales": [
           {
             "name": "xscale",
             "type": "band",
             "domain": {"data": "table", "field": "category"},
             "range": "width",
             "padding": 0.05,
             "round": true
           },
           {
             "name": "yscale",
             "domain": {"data": "table", "field": "amount"},
             "nice": true,
             "range": "height"
           }
         ],

         "axes": [
           { "orient": "bottom", "scale": "xscale" },
           { "orient": "left", "scale": "yscale" }
         ],

         "marks": [
           {
             "type": "rect",
             "from": {"data":"table"},
             "encode": {
               "enter": {
                 "x": {"scale": "xscale", "field": "category"},
                 "width": {"scale": "xscale", "band": 1},
                 "y": {"scale": "yscale", "field": "amount"},
                 "y2": {"scale": "yscale", "value": 0}
               },
               "update": {
                 "fill": {"value": "steelblue"}
               },
               "hover": {
                 "fill": {"value": "red"}
               }
             }
           },
           {
             "type": "text",
             "encode": {
               "enter": {
                 "align": {"value": "center"},
                 "baseline": {"value": "bottom"},
                 "fill": {"value": "#333"}
               },
               "update": {
                 "x": {"scale": "xscale", "signal": "tooltip.category", "band": 0.5},
                 "y": {"scale": "yscale", "signal": "tooltip.amount", "offset": -2},
                 "text": {"signal": "tooltip.amount"},
                 "fillOpacity": [
                   {"test": "datum === tooltip", "value": 0},
                   {"value": 1}
                 ]
               }
             }
           }
         ]
       }
     };

     const chart = new google.visualization.VegaChart(document.getElementById('chart-div'));
     chart.draw(dataTable, options);
   }
 </script>
    

    <script>
        
          function Report(){
            var user_id = $('#user').val();
            var start_date = $('#start_date').val();
            var end_date = $('#end_date').val();
            $.post("{{ route('eventee.user.report.graph') }}",{'user_id':user_id,'start_date':start_date,'end_date':end_date,'event_id':"{{ $id }}"},function(response){
                console.log(response);
                if(response.code === 201){
                    showMessage("No Data Available","error");
                }
                else if(response.code === 200){
                    $('#showGraph').show();
                    $('#reportFor').html("Report Of : " + response.user_name);
                    drawChart(response.report);

                }
            });
            
          }
    </script>
@endsection
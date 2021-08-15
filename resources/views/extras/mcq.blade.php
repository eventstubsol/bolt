@extends("layouts.admin")

@section('title')
    Poll Results
@endsection

@section("styles")
    @include("includes.styles.datatables") 
@endsection

@section("page_title")
        Poll Results
@endsection

@section("breadcrumbs")
    <li class="breadcrumb-item active">Poll Results</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div id="message" style="display: none" role="alert" class="alert alert-info mb-1"></div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card mt-4">
            <div class="card-header ">
                @php
                    $votes = App\UserAnswer::where('question_id',$question->id)->count();
                @endphp
                <i class="fas fa-poll" style="size: 14px"></i>&nbsp;&nbsp;<strong>{{ $question->question }}&nbsp; <small>({{ $votes }}  votes)</small></strong>
                <button type="button" class="btn btn-success float-right" data-id="{{ $question->id }}" onclick="getAnswer(this)">Show Chart</button>
            </div>
            <div class="card-body" id="chartShow" style="display: none">
                <br> <br>
                <center>
                    <div id="top_x_div" style="width: 800px; height: 600px;"></div> 
                </center>
            </div>
        </div>
        
    </div>

</div>
@php
    $i = 0;
    
    foreach($fin as $ans){
        $option[$i] = $ans->alpha;
        $count[$i] = $ans->per;
        $i++;
    }
@endphp

@endsection


@section('scripts')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
    var count = '<?php echo $i ?>';
    var i = 0;


    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart(result) {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Percent", { role: "style" } ],
        [ 'Option',0, "#b87333"],
      ]);
      console.log(typeof(data));
      // data.push([['selet',16.2,'#9FFF33']]);

      $.each(result,function(key,value){
      // var percent = ;
      if(value.correct == 1){
        data.addRows([
          [value.alpha,parseFloat($.trim(value.per)),'green'],
        ]);
      }
      else{
        data.addRows([
          [value.alpha,parseFloat($.trim(value.per)),'grey'],
        ]);
      }
    });

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
      { calc: "stringify",
        sourceColumn: 1,
        type: "string",
        role: "annotation" },
      2]);

      var options = {
        title: "Poll Votes",
        width: 600,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.BarChart(document.getElementById("top_x_div"));
      chart.draw(view, options);
  }
</script>
<script>
google.charts.load('current', {'packages':['bar']});
google.charts.setOnLoadCallback(drawStuff);
</script>
<script>
    function getAnswer(e){
        var id = e.getAttribute('data-id');
        var arr = [];
        $.get("{{ route('mcq.showData') }}",{'id':id},function(result){
            
            $('#chartShow').css('display','block');
            drawChart(result);
        });
    }
</script>
@endsection

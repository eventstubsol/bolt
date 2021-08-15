<div class="modal fade" id="mcqShowModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="showTitle"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div id="barchart_values" style="width: 900px; height: 300px;"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <script>
       $('#mcqShowModal').on('show.bs.modal', function (e) {
    var questionId = $(e.relatedTarget).attr('data-id');
    alert(questionId)
    var dataCount = $(e.relatedTarget).attr('data-count');
    $("#mcModTable > tbody"). empty();
    $('#showTitle').html('User Vote ('+dataCount+' Votes)')
    // alert(questionId);
    $.get("{{ route('mcq.showData') }}",{'id':questionId},function(result){
        $.each(result,function(key,value){
          drawChart(result);
        });
    });
  });
  </script>


<script type="text/javascript">
    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart(result) {
        var data = google.visualization.arrayToDataTable([
        ["Element", "Percent", { role: "style" } ],
        [ 'Option',0, "#b87333"],
      ]);

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
        title: "Density of Precious Metals, in g/cm^3",
        width: 600,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
      chart.draw(view, options);
  }
  </script>

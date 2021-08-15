
@php
    $polls = App\Poll::where('status',1)->get();
@endphp
<div class="modal fade theme-modal" id="poll-modal" tabindex="-1" role="dialog" aria-labelledby="swagbaglistLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="resourceslistLabel"><span class="image-icon swagbag"></span><i class="fas fa-poll"></i>&nbsp;Poll</h4>
                <div class="form-group">
                        {{-- <button class="btn btn-success" onclick="createModal()">Create New Poll</button> --}}
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                      <ul class="list-group">
                          @foreach ($polls as $poll)
                              <li class="list-group-item"><a class="ques" data-id = "{{ $poll->id }}" onclick="seeQuestion(this)">{{ $poll->name }} (<small class="float-sm-start"><strong>Ends On: &nbsp;</strong>{{  \Carbon\Carbon::parse($poll->end_date)->format('d-m-Y') }}</a></small>)
                                
                            </li>
                          @endforeach
                      </ul>
                    </div>
                </div>
               
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script src="{{ asset('assets/js/pagination.js') }}"></script>
<!--Question Modal-->
<div class="modal" tabindex="-1" role="dialog" id="questionModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><i class="fas fa-poll"></i>&nbsp;Poll Quesitons</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <table class="table table-sm">
              <thead>
                  <tr>
                    <th width = "60%">Questions</th>
                    <th width = "30%">Type</th>
                    <th width = "10%">Actions</th>
                  </tr>
                  
              </thead>
              <tbody class="questions">

              </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<div>

</div>

<!--Answer Modal-->
<div class="modal fade theme-modal" id="answer-modal" tabindex="-1" role="dialog" aria-labelledby="swagbaglistLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="resourceslistLabel"><span class="image-icon swagbag"></span>Question</h4>
                <div class="form-group">
                  <button class="btn btn-dark" onclick="answerBack()">Back</button> 
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="card mt-4">
                    <div class="card-header" id="questionShow">
                        <input type="hidden" id="questionId">
                        <input type="hidden" id="answerId" >
                    </div>
                    <div class="card-body">
                        <fieldset>
                            <legend>Answer</legend>
                            <ul class="answerShow list-group" id="answerShow">

                            </ul>
                        </fieldset>
                    </div>
                </div>
               
            </div>
            <div class="percentage">

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
   var quest = 1;
     function seeQuestion(event){
       
        var pollId = event.getAttribute('data-id');
        
        $('#poll-modal').modal('toggle');
        $('#questionModal').modal('toggle');
        
       $.ajax({
           url:"{{ route('user.polls') }}",
           method:"get",
           data:{'id':pollId},
           success:function(result){
           var queslen = result.length;
               $.each(result,function(key,value){
                   var type = '';
                    if(value.type == 'mcq'){
                        type = 'Multiple Choice Question';
                    }
                    else if(value.type == 'wc'){
                        type = 'Word Cloud';
                    }
                    else if(value.type == 'quiz'){
                        type = 'Quiz';
                    }
                    else if(value.type == 'rate'){
                        type = 'Rating';
                    }
                    else if(value.type == 'surv'){
                        type = 'Survey';
                    }
                    if(quest <= queslen){
                      $('.questions').append('<tr class="quesetup"><td>'+ value.question + '</td><td>'+type+'</td><td><button class= "btn btn-success" data-id = "'+value.id+'" onclick="showDetails(this)">Show</button></td></tr>');
                      quest++;
                     
                    }
                    else if(queslen > quest){
                      
                      $('.quesetup').empty();
                      
                      $('.questions').append('<tr class="quesetup"><td>'+ value.question + '</td><td>'+type+'</td><td><button class= "btn btn-success" data-id = "'+value.id+'" onclick="showDetails(this)">Show</button></td></tr>');
                      quest = 2;
                    }
                  
               });
           }
       });

    }


</script>
<input type="text" id="answer" class="form-control">
<script>
    var i = 1;

    var count = 1;
     function showDetails(event){

    // event.preventDefault();
        var data_id = event.getAttribute('data-id');
        $('#questionModal').modal('toggle');
        $('#answer-modal').modal('toggle');
        // $.ajax({
        //     url::"{{ route('user.polls.update') }}",
        //     method:"post",
        //     data:{'_token':"{{ csrf_token() }}",'id':data_id},
        //     success:function(result){
        //         console.log(result);
        //     }
        // });
        $.post("{{ route('user.polls.update') }}",{'_token':"{{ csrf_token() }}",'id':data_id},function(result){
            var question = result.question;

            if(question.type == 'wc'){
                $('.answerli').remove();
                $('.answerShow').append('<li class="answerli list-group-item"><input type = "text" id="wcans" class="answers form-control"><br><button type="button" data-id="'+question.id+'" onclick="WcSubmit(this)" class="btn btn-success float-right">Save</button></li>');
                count =1;
            }
            else if(question.type == 'rate'){
                $('.answerli').remove();
                $('.answerShow').append('<li class="answerli list-group-item"><input type = "hidden" id="rate"><div class="rating-box"><center><i class="fa fa-star" aria-hidden="true" id="s1" style="font-size: 30px;" onclick="star1()"></i><i class="fa fa-star" aria-hidden="true" id="s2" style="font-size: 30px;" onclick="star2()"></i><i class="fa fa-star" aria-hidden="true" id="s3" style="font-size: 30px;" onclick="star3()"></i><i class="fa fa-star" aria-hidden="true" id="s4" style="font-size: 30px;" onclick="star4()"></i><i class="fa fa-star" aria-hidden="true" id="s5" style="font-size: 30px;" onclick="star5()"></i></div></center><button type="button" class= "btn btn-success float-right" onclick="rateSubmit()">Save</li>');
                count = 1;
            
            }
            
            var len = (result.answer).length;
            $('#questionShow').html(question.question);
            $('#questionId').val(question.id);
            
            $.each(result.answer,function(key,value){
                if(count <= len){
                    if(question.type == 'mcq' || question.type == 'surv' || question.type == 'quiz'){
                        $('.answerShow').append('<li class="answerli list-group-item"><input type="radio" id="'+question.id+'" class="check" data-id = "'+question.type+'" value ="'+value.id+'" name="answerCheck" onclick="AnswerSend(this)">&nbsp;<span id="chceked">'+value.answer+'</span></li>');
                        count++;
                    }
                }
                else{
                    if(question.type == 'mcq' || question.type == 'surv' || question.type == 'quiz'){
                    $('.answerli').remove();
                    $('.answerShow').append('<li class="answerli list-group-item"><input type="radio" id="'+question.id+'" class="check" value ="'+value.id+'" data-id = "'+question.type+'" name="answerCheck" onclick="AnswerSend(this)">&nbsp;<span id="chceked">'+value.answer+'</span></li>');
                    count = 2;
                    }
                    
                }

               
                
            });
        });
    }
    var check = 0;
    var rate = 0;
    function answerBack(){
        $('#questionModal').modal('toggle');
        $('#answer-modal').modal('toggle');
        $('.answerli').remove();
        $('.percentage').empty();
    }

    function star1(){
        var s1 = document.getElementById('s1');
        var s2 = document.getElementById('s2');
        var s3 = document.getElementById('s3');
        var s4 = document.getElementById('s4');
        var s5 = document.getElementById('s5');
        var i = document.getElementById('rate');

        
        // var app = document.getElementById('rateVal');
        
        
        if(check == 0){
          rate +=1;
          i.value = rate;
      
          check +=1;
          s1.style.color = 'yellow';
          s2.style.color = 'grey';
          s3.style.color = 'grey';
          s4.style.color = 'grey';
          s5.style.color = 'grey';
        }
       
        console.log(rate);
      }

      function star2(){
        
        var s1 = document.getElementById('s1');
        var s2 = document.getElementById('s2');
        var s3 = document.getElementById('s3');
        var s4 = document.getElementById('s4');
        var s5 = document.getElementById('s5');
        var i = document.getElementById('rate');

        
        if(check == 0){
          rate +=2; 
          check +=1;
          i.value = rate;
          s1.style.color = 'yellow';
          s2.style.color = 'yellow';
          s3.style.color = 'grey';
          s4.style.color = 'grey';
          s5.style.color = 'grey';
        }
       
        console.log(rate);
        
      }

      function star3(){
        var s1 = document.getElementById('s1');
        var s2 = document.getElementById('s2');
        var s3 = document.getElementById('s3');
        var s4 = document.getElementById('s4');
        var s5 = document.getElementById('s5');
        var i = document.getElementById('rate');
        
        if(check == 0){
          rate +=3; 
          check +=1;
          i.value = rate;
          s1.style.color = 'yellow';
          s2.style.color = 'yellow';
          s3.style.color = 'yellow';
          s4.style.color = 'grey';
          s5.style.color = 'grey';
        }
       
        console.log(rate);
      }

      function star4(){
        var s1 = document.getElementById('s1');
        var s2 = document.getElementById('s2');
        var s3 = document.getElementById('s3');
        var s4 = document.getElementById('s4');
        var s5 = document.getElementById('s5');
        var i = document.getElementById('rate');
        
        if(check == 0){
          rate +=4; 
          check +=1;
          i.value = rate;
          s1.style.color = 'yellow';
          s2.style.color = 'yellow';
          s3.style.color = 'yellow';
          s4.style.color = 'yellow';
          s5.style.color = 'grey';
        }
        
        console.log(rate);
      }

      function star5(){
        var s1 = document.getElementById('s1');
        var s2 = document.getElementById('s2');
        var s3 = document.getElementById('s3');
        var s4 = document.getElementById('s4');
        var s5 = document.getElementById('s5');
        var i = document.getElementById('rate');
        
        if(check == 0){
          rate +=5; 
          check +=1;
          i.value = rate;
          s1.style.color = 'yellow';
          s2.style.color = 'yellow';
          s3.style.color = 'yellow';
          s4.style.color = 'yellow';
          s5.style.color = 'yellow';
        }
       
        console.log(rate);
      }
   var app = 0;
function rateSubmit(){
    var rate = $('#rate').val();
    var questionId = $('#questionId').val();
    $.get("{{ route('user.polls.save') }}",{'id':questionId,'rate':rate},function(result){
      console.log(result);
        if(app<1){
            $('.rating-box').append('<span class="float=right">Average Rating In this Qurstion is:<b> '+result.rate+'</b></span>');
            app++;
        }
    });
}
</script>

<script>
  //Answer Send
  function AnswerSend(event){
    
    var answerId = event.getAttribute('value');
    var questionId = event.getAttribute('id');
    var questype = event.getAttribute('data-id'); 
    $.get("{{ route('user.poll.answer') }}",{'questionId':questionId,'answerId':answerId},function(result){
      $('.percentage').html();
      if(questype == 'mcq' || questype == 'quiz' || questype =='surv'){
          $('.answerli').remove();
          $('.answerShow').append('<li class="answerli list-group-item"> <center><div id="top_x_div" style="width: 800px; height: 400px;"></div></center> </li>');
          $.each(result,function(key,value){
            if(value.correct == 1){
              $('.percentage').html('<b>The Correct Option is :<strong> ' + value.alpha+'</strong></b>');
            }
          });
          drawChart(result);
          // $.each(result,function(key,value){
          //   console.log(value.correct);
          // });
      }
    });
  }
  
</script>
<script src="https://cdn.anychart.com/releases/v8/js/anychart-base.min.js"></script>
<script src="https://cdn.anychart.com/releases/v8/js/anychart-tag-cloud.min.js"></script>
<script>
  
  function WcSubmit(event){
    var Answer  = $('#wcans').val();
    var questionId = event.getAttribute('data-id');
    $.get("{{ route('user.poll.submit') }}",{'questionId':questionId,'answer':Answer},function(result){
      $('.answerli').remove();
      $('.answerShow').append('<li class="answerli list-group-item">  <div id="donutchart" style="width: 900px; height: 500px;font-size:50px;"></div> </li>');
      drawDonut(result);
        
    });
  }
</script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
  google.charts.load('upcoming', {'packages': ['vegachart']}).then(drawChart);

function drawChart(result) {
  const dataTable = new google.visualization.DataTable();
  dataTable.addColumn({type: 'string', 'id': 'category'});
  dataTable.addColumn({type: 'number', 'id': 'amount'});
  $.each(result,function(key,value){
    // var percent = ;
    if(value.correct == 1){
      dataTable.addRows([
        [value.alpha,parseFloat($.trim(value.per))],
      ]);
    }
    else{
      dataTable.addRows([
        [value.alpha,parseFloat($.trim(value.per))],
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

  const chart = new google.visualization.VegaChart(document.getElementById('top_x_div'));
  chart.draw(dataTable, options);
}
</script>
<script>
  google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawDonut);
      function drawDonut(result) {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Word Cloud',     0],
        ]);
        $.each(result,function(key,value){
          data.addRows([[value.answer,value.same]]);
        });
        var options = {
          title: '',
          pieHole: 1,
        };
  
        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
</script>
@extends("layouts.admin")


@section("title")
    General Event Stats
@endsection
@section("page_title")
    General Event Stats
@endsection

@section("content")
<div class="row">
    <div class="col-md-6 col-xl-4  mb-3">
        <div class="widget-rounded-circle card-box h-100">
            <div class="row">
                <div class="col-6">
                    <div class="avatar-lg rounded-circle bg-soft-info border-info border">
                        <i class="fe-bar-chart-line- font-22 avatar-title text-info"></i>
                    </div>
                </div>
                <div class="col-6">
                    <div class="text-right">
                        <p class="text-muted mb-1 text-truncate">Unique Logins Today</p>
                    </div>
                </div>
            </div> <!-- end row-->
        </div> <!-- end widget-rounded-circle-->
    </div>
    
    <div class="col-md-6 col-xl-4  mb-3">
        <div class="widget-rounded-circle card-box h-100">
            <div class="row">
                <div class="col-6">
                    <div class="avatar-lg rounded-circle bg-soft-info border-info border">
                        <i class="fe-bar-chart-line- font-22 avatar-title text-info"></i>
                    </div>
                </div>
                <div class="col-6">
                    <div class="text-right">
                        <h3 class="text-dark mt-1" id="login_last_1h"></h3>
                        <p class="text-muted mb-1 text-truncate">Logins in last 60 mins</p>
                    </div>
                </div>
            </div> <!-- end row-->
        </div> <!-- end widget-rounded-circle-->
    </div>
    <div class="col-md-6 col-xl-4  mb-3">
        <div class="widget-rounded-circle card-box  h-100">
            <div class="row ">
                <div class="col-6">
                    <div class="avatar-lg rounded-circle bg-soft-info border-info border">
                        <i class="fe-bar-chart-line- font-22 avatar-title text-info"></i>
                    </div>
                </div>
                <div class="col-6">
                    <div class="text-right">
                        <h3 class="text-dark mt-1" id="login_total"></h3>
                        <p class="text-muted mb-1 text-truncate">Total Users Logged In</p>
                    </div>
                </div>
            </div> <!-- end row-->
            <button class="btn btn-primary mt-3 mx-auto btn-block" id="download-login-logs">Download Logs</button>
        </div> <!-- end widget-rounded-circle-->
    </div>
</div>
<div class="col-md-6 col-xl-4  mb-3">
    <div class="widget-rounded-circle card-box h-100">
        <div class="row">
            <div class="card-header">User Status</div>
            <div id="piechart" style="left:0;width: 50rem; height: 20rem;"></div>
        </div> <!-- end row-->
    </div> <!-- end widget-rounded-circle-->
</div>
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">List of latest users who logged in (Last 50)</h4>
        </div>
    </div>
    <div class="col-12">
        <ul class="list-group" id="list-of-last-users">
        </ul>
    </div>
</div>

@endsection


@section("scripts")
    <script>
        function fetchData(){
            $.ajax({
                url: "{{ route("reports.general.api") }}",
                method: "POST",
                data:{
                    _token: "{{ csrf_token() }}",
                },
                success: function(response){
                    if(typeof response === "object"){
                        if(response.hasOwnProperty("login_last_1h")){
                            $("#login_last_1h").html(response.login_last_1h);
                        }
                        if(response.hasOwnProperty("unique_login_count")){
                            $("#today-unique-logins").html(response.unique_login_count);
                        }
                        if(response.hasOwnProperty("login_total")){
                            $("#login_total").html(response.login_total);
                        }
                        if(response.hasOwnProperty("last_login_list") && Array.isArray(response.last_login_list)){
                            $("#list-of-last-users").html(response.last_login_list.map(user => {
                                return `<li class="list-group-item"><span>${user.name}</span>&nbsp;(${user.email})</li>`;
                            }).join(""))
                        }
                    }
                }
            })
        }
        $(document).ready(function(){
            fetchData();
            setInterval(fetchData, 15000);
            let downloadButton = $("#download-login-logs");
            downloadButton.on("click", function () {
                downloadButton.addClass("loading").prop("disabled", true).html("Building Logs...");
                $.ajax({
                    url: "{{ route("reports.export.loginLogs") }}",
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}"
                    },
                    success: function (data) {
                        exportToCsv("Login Logs "+Date.now()+".csv", data);
                        downloadButton.prop("disabled", false).html("Downloaded");
                        setTimeout(() => {
                            if(downloadButton.html() === "Downloaded"){
                                downloadButton.html("Download Logs");
                            }
                        }, 2000);
                    },
                    error: function (e) {
                        console.log(e);
                        alert("Some error occurred while downloading report. Please try again later");
                        downloadButton.prop("disabled",false).html("Download Logs");
                    }
                });
            });
        });
    </script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart(obj) {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Online Users: '+obj.online+'',obj.online],
          ['Offline Users: ' +obj.offline+'',obj.offline]
         
        ]);
        
        var options = {
          title: 'Online Users'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
    <script>
      
        $(document).ready(function(){
            // console.log("{{ $id }}");
            $.ajax({
                url:"{{ route('eventee.chartJs') }}",
                method:"POST",
                data:{id:"{{ $id }}"},
                success:function(response){
                    drawChart(response);
                    
                }
            });
        
               
                    setInterval(function(){ 
                        $.ajax({
                            url:"{{ route('eventee.chartJs') }}",
                            method:"POST",
                            data:{id:"{{ $id }}"},
                            success:function(response){
                                drawChart(response);
                                console.log(1);
                            }
                        });
                    }, 5000);
                
            
            
            
        });
    </script>
@endsection
@extends("layouts.admin")


@section("title")
    General Event Stats
@endsection
@section("page_title")
    General Event Stats
@endsection

@section("content")
{{-- <div class="row">
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
</div> --}}
<div class="row">
    
<div class="col-md-6 col-xl-4  mb-3">
    <div class="widget-rounded-circle card-box h-100">
        <div class="row">
            <div class="card-header">User Status</div>
            <div id="piechart" style="left:0;width: 50rem; height: 20rem;"></div>
        </div> <!-- end row-->
    </div> <!-- end widget-rounded-circle-->
</div>

<div class="col-md-6 col-xl-4  mb-3">
    <div class="widget-rounded-circle card-box h-100">
        <div class="row">
            <div class="card-header">Session Room Active Users</div>
            <div id="piechart2" style="left:0;width: 50rem; height: 20rem;"></div>
        </div> <!-- end row-->
    </div> <!-- end widget-rounded-circle-->
</div>

<div class="col-md-6 col-xl-4  mb-3">
    <div class="widget-rounded-circle card-box h-100">
        <div class="row">
            
            <div class="card">
                <div class="card-header">Session Room Active Users</div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>User Name</th>
                                <th>Total User</th>
                            </tr>
                        </thead>
                        <tbody class="sesroomUSer">
                            <td colspan="2"><center>No Data Available</center></td>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end row-->
    </div> <!-- end widget-rounded-circle-->
</div>

<div class="col-md-6 col-xl-4  mb-3">
    <div class="widget-rounded-circle card-box h-100">
        <div class="row">
            <div class="card-header">Active Page Users</div>
            <div id="piechart3" style="left:0;width: 50rem; height: 20rem;"></div>
        </div> <!-- end row-->
    </div> <!-- end widget-rounded-circle-->
</div>

<div class="col-md-6 col-xl-4  mb-3">
    <div class="widget-rounded-circle card-box h-100">
        <div class="row">
            
            <div class="card">
                <div class="card-header">Active Page Users</div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>User Name</th>
                                <th>Total User</th>
                            </tr>
                        </thead>
                        <tbody class="pageUSer">
                            <td colspan="2"><center>No Data Available</center></td>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end row-->
    </div> <!-- end widget-rounded-circle-->
</div>
<div class="col-md-6 col-xl-4  mb-3">
    <div class="widget-rounded-circle card-box h-100">
        <div class="row">
            <div class="card-header">Active Booth Users</div>
            <div id="piechart4" style="left:0;width: 50rem; height: 20rem;"></div>
        </div> <!-- end row-->
    </div> <!-- end widget-rounded-circle-->
</div>
<div class="col-md-6 col-xl-4  mb-3">
    <div class="widget-rounded-circle card-box h-100">
        <div class="row">
            <div class="card">
                <div class="card-header">Active Booth Users</div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>User Name</th>
                                <th>Total User</th>
                            </tr>
                        </thead>
                        <tbody class="botthUSer">
                            <td colspan="2"><center>No Data Available</center></td>
                        </tbody>
                    </table>
                </div>
            </div>
            
            
        </div> <!-- end row-->
    </div> <!-- end widget-rounded-circle-->
</div>
    {{-- <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">List of latest users who logged in (Last 50)</h4>
        </div>
    </div>
    <div class="col-12">
        <ul class="list-group" id="list-of-last-users">
        </ul>
    </div> --}}
    <div class="col-md-6 col-xl-4  mb-3">
        <div class="widget-rounded-circle card-box h-100">
            <div class="row">
                
                <div class="card">
                    <div class="card-header">Active Lobby Users</div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>User Name</th>
                                    <th>Time</th>
                                </tr>
                            </thead>
                            <tbody class="lobbyUser">
                                <td colspan="2"><center>No Data Available</center></td>
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
           
        </div>
    </div>
    <div class="col-md-6 col-xl-4  mb-3">
        <div class="widget-rounded-circle card-box h-100">
            <div class="row">
                <div class="card">
                    <div class="card-header">Active Lounge Users</div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>User Name</th>
                                    <th>Time</th>
                                </tr>
                            </thead>
                            <tbody class="loungeUser">
                                <td colspan="2"><center>No Data Available</center></td>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
    
    
</div>

@endsection

@if(Auth::user()->type == 'eventee')
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
    //User Chart
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart(obj,total) {
          console.log(obj.offline);
        if(total == 0){
            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                ['Users: ' +0+'',15]
            
            ]);
        }
        else{
            var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            ['Online Users: '+obj.online+'',obj.online],
            ['Offline Users: ' +obj.offline+'',obj.offline]
            
            ]);
        }
        
        
        var options = {
          title: 'Online Users'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
      //Session Chart
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawPieChart);
      function drawPieChart(object) {
       
            if(object == undefined || object ===0 ){
                var data = google.visualization.arrayToDataTable([
                    ['SessionRoom', 'UserCount'],
                    ["None",10],
                ]);
            }
            else{
                var data = google.visualization.arrayToDataTable([
                    ['SessionRoom', 'UserCount'],
                    [object.locationObj.room_name+': '+object.locationObj.room_count,object.locationObj.room_count],
                ]);
                if(object.locationArr.length > 0){
                    $.each(object.locationArr,function(key,value){
                        data.addRows([
                            [value.room_name +' : '+value.room_count,value.room_count],
                        ]);
                    });
                }
            }
            
            
            var options = {
            title: 'Session Room Users'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart2'));

            chart.draw(data, options);
        }

        //Page Chart
        
        google.charts.setOnLoadCallback(drawPageChart);

            function drawPageChart(object) {
              
                // console.log(empTest);
                if(object == undefined || object ===0 ){
                    var data = google.visualization.arrayToDataTable([
                        ['Page_Name', 'UserCount'],
                        ["None",1],
                    
                    ]);
                }
                else{
                    console.log(object);
                    var data = google.visualization.arrayToDataTable([
                        ['Page Name', 'UserCount'],
                        [object.locationObj.room_name+': '+object.locationObj.room_count,object.locationObj.room_count],
                    ]);
                    if(object.locationArr.length > 0){
                    $.each(object.locationArr,function(key,value){
                        data.addRows([
                            [value.room_name +' : '+value.room_count,value.room_count],
                        ]);
                    });
                }
                }
            
            

                var options = {
                title: 'Active Page Users'
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart3'));

                chart.draw(data, options);
            }
            //Booth Chart
            
            google.charts.setOnLoadCallback(drawBoothChart);

            function drawBoothChart(object) {
                if(object == undefined || object ===0 ){
                    var data = google.visualization.arrayToDataTable([
                        ['Booth Name', 'UserCount'],
                        ["None",2],
                    ]);
                }
                else{
                    var data = google.visualization.arrayToDataTable([
                        ['Booth Name', 'UserCount'],
                        [object.locationObj.room_name+': '+object.locationObj.room_count,object.locationObj.room_count],
                    ]);
                    if(object.locationArr.length >  0){
                        $.each(object.locationArr,function(key,value){
                            data.addRows([
                                [value.room_name +' : '+value.room_count,value.room_count],
                            ]);
                        });
                    }
                }
            
           

                var options = {
                title: 'Active Booth Users'
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart4'));

                chart.draw(data, options);
            }
    </script>
    <script>
        $(document).ready(function(){
           
            // console.log("{{ $id }}");
            //User Chart
            const lobbyCall = () => $.ajax({
                url:"{{ route('eventee.chartJs') }}",
                method:"POST",
                data:{id:"{{ $id }}"},
                success:function(response){
                    drawChart(response.userobj,response.total);
                    setTimeout(function(){ sessionCall(); }, 3000);
                }
            });
            //Session Chart
            const sessionCall = () =>$.ajax({
                url:"{{ route('eventee.sessionChart') }}",
                method:"POST",
                data:{id:"{{ $id }}"},
                success:function(response){
                    // console.log(response.locations);
                    $('.sesroomUSer').empty();
                    if(response.locations.length > 0)
                    {   
                        $.each(response.locations,function(key,value){
                            $('.sesroomUSer').append('<tr><td>'+ value.room_name  +'</td><td>'+ value.room_count +'</td></tr>');
                        });
                    }
                    else{
                        $('.sesroomUSer').html('<tr><td colspan="2"><center>No Data Available</center></td></tr>');
                    }
                    
                    drawPieChart(response);
                    setTimeout(function(){ pageChart(); }, 3000);
                }
            });
            //Page Chart
            const pageChart = () => $.ajax({
                url:"{{ route('eventee.pageChart') }}",
                method:"POST",
                data:{id:"{{ $id }}"},
                success:function(response){
                    // console.log(response);
                    if(response.locations.length > 0)
                    {   
                        $.each(response.locations,function(key,value){
                            $('.pageUSer').append('<tr><td>'+ value.room_name +'</td><td>'+ value.room_count +'</td></tr>');
                        });
                    }
                    else{
                        $('.pageUSer').html('<tr><td colspan="2"><center>No Data Available</center></td></tr>');
                    }
                    drawPageChart(response);
                    setTimeout(function(){ boothCall(); }, 3000);
                }
            });
            //Booth Chart
            const boothCall = () => $.ajax({
                url:"{{ route('eventee.boothChart') }}",
                method:"POST",
                data:{id:"{{ $id }}"},
                success:function(response){
                    // console.log(response);
                    if(response.locations.length > 0)
                    {   
                        $('.botthUSer').empty();
                        $.each(response.locations,function(key,value){
                            $('.botthUSer').append('<tr><td>'+ value.room_name +'</td><td>'+ value.room_count +'</td></tr>');
                        });
                    }
                    else{
                        $('.botthUSer').empty();
                        $('.botthUSer').html('<tr><td colspan="2"><center>No Data Available</center></td></tr>');
                    }
                    drawBoothChart(response);
                    setTimeout(function(){ lobbyCall(); }, 3000);
                }
            });

            //Lobby User
            const lobbyCall = () => $.ajax({
                url:"{{ route('eventee.lobbyUser') }}",
                method:"POST",
                data:{id:"{{ $id }}"},
                success:function(response){
                    // console.log(response);
                    if(response.length > 0){
                        $('.lobbyUser').empty();
                        $.each(response,function(key,value){
                            $('.lobbyUser').append('<tr><td>'+ value.name +'</td><td>'+ value.time +'</td></tr>');
                        });
                    }
                   
                    setTimeout(function(){ LoungeCall(); }, 3000);
                    
                }
            });
        
            //Lounge User
            const LoungeCall = () => $.ajax({
                url:"{{ route('eventee.loungeUser') }}",
                method:"POST",
                data:{id:"{{ $id }}"},
                success:function(response){
                    // console.log(response);
                    if(response.length > 0){
                        $('.loungeUser').empty();
                        $.each(response,function(key,value){
                            $('.loungeUser').append('<tr><td>'+ value.name +'</td><td>'+ value.time +'</td></tr>');
                        });
                    }
                   
                    setTimeout(function(){ lobbyCall(); }, 3000);
                    
                }
            });
               
                    // setInterval(function(){ 
                    //     //User Chart
                    //     $.ajax({
                    //         url:"{{ route('eventee.chartJs') }}",
                    //         method:"POST",
                    //         data:{id:"{{ $id }}"},
                    //         success:function(response){
                    //             drawChart(response.userobj,response.total);
                    //             // console.log(1);
                    //         }
                    //     });
                    //     //Session Chart
                    //     $.ajax({
                    //         url:"{{ route('eventee.sessionChart') }}",
                    //         method:"POST",
                    //         data:{id:"{{ $id }}"},
                    //         success:function(response){
                    //             // console.log(response);
                                
                    //             if(response.locations.length > 0)
                    // {   
                    //                 $('.sesroomUSer').empty();
                    //                 $.each(response.locations,function(key,value){
                    //                     $('.sesroomUSer').append('<tr><td>'+ value.room_name +'</td><td>'+ value.room_count +'</td></tr>');
                    //                 });
                    //             }
                    //             else{
                    //                 $('.sesroomUSer').empty();
                    //                 $('.sesroomUSer').html('<tr><td colspan="2"><center>No Data Available</center></td></tr>');
                    //             }
                                
                    //             drawPieChart(response);
                                
                    //         }
                    //     });
                    //     //Page Chart
                    //     $.ajax({
                    //         url:"{{ route('eventee.pageChart') }}",
                    //         method:"POST",
                    //         data:{id:"{{ $id }}"},
                    //         success:function(response){
                    //             // console.log(response);
                               
                    //             if(response.locations.length > 0)
                    // {   
                    //                 $('.pageUSer').empty();
                    //                 $.each(response.locations,function(key,value){
                    //                     $('.pageUSer').append('<tr><td>'+ value.room_name +'</td><td>'+ value.room_count +'</td></tr>');
                    //                 });
                    //             }
                    //             else{
                    //                 $('.pageUSer').empty();
                    //                 $('.pageUSer').html('<tr><td colspan="2"><center>No Data Available</center></td></tr>');
                    //             }
                    //             drawPageChart(response);
                                
                    //         }
                    //     });
                    //     //Booth Chart
                    //     $.ajax({
                    //         url:"{{ route('eventee.boothChart') }}",
                    //         method:"POST",
                    //         data:{id:"{{ $id }}"},
                    //         success:function(response){
                    //             // console.log(response);
                               
                    //             if(response.locations.length > 0)
                    // {   
                    //                 $('.botthUSer').empty();
                    //                 $.each(response.locations,function(key,value){
                    //                     $('.botthUSer').append('<tr><td>'+ value.room_name +'</td><td>'+ value.room_count +'</td></tr>');
                    //                 });
                    //             }
                    //             else{
                    //                 $('.botthUSer').empty();
                    //                 $('.botthUSer').html('<tr><td colspan="2"><center>No Data Available</center></td></tr>');
                    //             }
                    //             drawBoothChart(response);
                                
                    //         }
                    //     });
                    //     //Lobby User
                    //     $.ajax({
                    //         url:"{{ route('eventee.lobbyUser') }}",
                    //         method:"POST",
                    //         data:{id:"{{ $id }}"},
                    //         success:function(response){
                    //             // console.log(response);
                    //             if(response.length > 0){
                    //                 $('.lobbyUser').empty();
                    //                 $.each(response,function(key,value){
                    //                     $('.lobbyUser').append('<tr><td>'+ value.name +'</td><td>'+ value.time +'</td></tr>');
                    //                 });
                    //             }
                    //             else{
                    //                 $('.lobbyUser').empty();
                    //                 $('.lobbyUser').html('<tr><td colspan="2"><center>No Data Available</center></td></tr>');
                    //             }
                    //         }
                    //     });

                    //      //Lounge User
                    //         $.ajax({
                    //             url:"{{ route('eventee.loungeUser') }}",
                    //             method:"POST",
                    //             data:{id:"{{ $id }}"},
                    //             success:function(response){
                    //                 // console.log(response);
                    //                 if(response.length > 0){
                    //                     $('.loungeUser').empty();
                    //                     $.each(response,function(key,value){
                    //                         $('.loungeUser').append('<tr><td>'+ value.name +'</td><td>'+ value.time +'</td></tr>');
                    //                     });
                    //                 }
                    //                 else{
                    //                     $('.loungeUser').empty();
                    //                     $('.loungeUser').html('<tr><td colspan="2"><center>No Data Available</center></td></tr>');
                    //                 }
                                
                                    
                                    
                    //             }
                    //         });
                    // }, 5000);
                
            
            
            
        });
    </script>
@endsection
@endif
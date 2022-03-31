@extends("layouts.admin")


@section("title")
     Event Login Stats
@endsection
@section("page_title")
     Event Login Stats
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
                        <h3 class="text-dark mt-1" id="today-unique-logins"></h3>
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
                        <button class="btn btn-primary mt-3 mx-auto btn-block" id="download-login-logs">Download Login Logs</button>
             
                    </div>
                </div>
            </div> <!-- end row-->
        </div> <!-- end widget-rounded-circle-->
    </div>
</div>

@endsection

@if(Auth::user()->type == 'eventee')
@section("scripts")
    <script>
       
        function fetchData(){
            $.ajax({
                url: "{{ route("reports.general.api",$id) }}",
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
            setInterval(fetchData, 30000);
        });
    </script>
@endsection
@endif
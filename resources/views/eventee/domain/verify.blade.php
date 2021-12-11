@extends("layouts.admin")



@section('page_title')
    Verify Domain  
@endsection

@section('title')
    Verify Domain
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3 class="card-title">{{$domain}}</h3>
                <div class="float-right"><button class="btn btn-success" onclick="Verify()">Verify</button></div>
            </div>
            <div class="card-body">
                <h3>Please add the Followig DNS Record to Your Domain and Click Verify</h3>
            
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Record Type</th>
                            <th>Record Name</th>
                            <th>Record Value</th>
                            <th>Record Proxy</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>A</td>
                            <td>{{$domain}}</td>
                            <td>52.15.157.185</td>
                            <td>DNS Only/Direct </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section("scripts")
    <script>
        function Verify(){
            var settings = {
                // "crossDomain": true,
                "url": "https://{{$domain}}/verifydomain",
                "method": "GET",
                "headers": {
                    "Access-Control-Allow-Origin":"*"
                }
            }
            console.log("{{$domain}}");
            $.ajax(settings).done(function (response) {
                console.log(response);
                if( response.verification == "domainVerified"){
                    showMessage("domain Verified Successfully",'success');
                }
            });
        }
        $(document).ready(function(){
            
        });
        </script>
    @endsection
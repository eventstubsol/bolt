@extends("layouts.admin")

@section('styles')
    @include("includes.styles.datatables")
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

@endsection

@section('page_title')
    Database Logs  
@endsection

@section('title')
Database Logs
@endsection

@section('breadcrumbs')
    <li class="breadcrumb-item active">Database Logs</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3 class="card-title"><i class="fas fa-calendar-day"></i>&nbsp;&nbsp;Database Logs</h3>
                <div class="float-right"><button class="btn btn-success" onclick="CreateEvent()">Create Event</button></div>
            </div>
            <div id="showAlert" class="alert alert-success" role="alert" style="display: none">
                <center>  Link Copied Successfully </center>
            </div>
            <div id="AlertDelete" class="alert alert-success" role="alert" style="display: none">
                <center>  Event Deleted Successfully </center>
            </div>
            <div class="card-body">
                <table id="datatable-buttons" class="table datatable table-striped dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th width="80%">Table Name</th>
                            <th width="20%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Delete Data Of Notification Table</td>
                            <td><button class="btn btn-danger" type="button" onclick="DeleteNotification()">Delete</button></td>
                        </tr>
                        <tr>
                            <td>Delete Data Of Schedule Notification Table</td>
                            <td><button class="btn btn-danger" type="button" onclick="DeleteScheduleNotification()">Delete</button></td>
                        </tr>
                        <tr>
                            <td>Delete Data Of Mails Table</td>
                            <td><button class="btn btn-danger" type="button" onclick="DeleteMails()">Delete</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection

@section('scripts')
@include("includes.scripts.datatables")

<script>
    function DeleteNotification(){
        confirmDelete("Are you sure you want to DELETE All Notifications?","Confirm Notifications Delete").then(confirmation=>{
            if(confirmation){
                $.get("{{ route('delete.notification.all') }}",function(response){
                    if(response.code == 200){
                        showMessage(response.message,'success');
                    }
                    else{
                        showMessage(response.message,'error');
                    }
                });
            }
            
        });
    }
    function DeleteScheduleNotification(){
        confirmDelete("Are you sure you want to DELETE All Sent Scheduled Notification?","Confirm Scheduled Notification Delete").then(confirmation=>{
            if(confirmation){
                $.get("{{ route('delete.schedulenotification.all') }}",function(response){
                    if(response.code == 200){
                        showMessage(response.message,'success');
                    }
                    else{
                        showMessage(response.message,'error');
                    }
                });
            }
            
        });
    }
    function DeleteMails(){
        confirmDelete("Are you sure you want to DELETE All Mails?","Confirm Mails Delete").then(confirmation=>{
            if(confirmation){
                $.get("{{ route('delete.mails.all') }}",function(response){
                    if(response.code == 200){
                        showMessage(response.message,'success');
                    }
                    else{
                        showMessage(response.message,'error');
                    }
                });
            }
            
        });
    }
</script>
  
@endsection
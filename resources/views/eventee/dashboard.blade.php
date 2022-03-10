@extends("layouts.admin")
@section('styles')
    @include("includes.styles.datatables")
   
@endsection

@section('page_title')
    Dashboard  
@endsection
<!-- include libraries(jQuery, bootstrap) -->

<!-- include summernote css/js -->


@section('title')
    Dashboard
@endsection

@section('breadcrumbs')
    <li class="breadcrumb-item active">Dashboard</li>
@endsection

@section('content')
<div class="row">
    <div class="ml-2 float-right">
        <div class="float-right"><button class="btn btn-success" onclick="CreateEvent()">Create Event</button></div>
    </div>
    {{-- Event Count --}}
    <div class="col-md-6 col-xl-3">
        <div class="widget-rounded-circle card" >
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                            <i class="fa fa-calendar font-22 avatar-title text-primary" style="margin-left: 35%;margin-top: 31%;width: 15%;height: 10%;"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-end">
                            <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $events }}</span></h3>
                            <p class="text-muted mb-1 mr-1 text-truncate">Total Events</p>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div>
        </div>
    </div>
    {{-- Total Live Events --}}
    <div class="col-md-6 col-xl-3">
        <div class="widget-rounded-circle card" >
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                            <i class="fas fa-stream font-22 avatar-title text-primary" style="margin-left: 35%;margin-top: 31%;width: 15%;height: 10%;"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-end">
                            <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $liveEvent }}</span></h3>
                            <p class="text-muted mb-1 text-truncate">Total Live Events</p>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div>
        </div>
    </div>
    {{-- Total Eventees --}}
    <div class="col-md-6 col-xl-3">
        <div class="widget-rounded-circle card" >
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                            <i class="fa fa-users font-22 avatar-title text-primary" style="margin-left: 35%;margin-top: 31%;width: 15%;height: 10%;"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-end">
                            <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $alluser }}</span></h3>
                            <p class="text-muted mb-1 text-truncate">Total Event Users</p>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div>
        </div>
    </div>
    

    {{-- Total Live Events --}}
    <div class="col-md-6 col-xl-3">
        <div class="widget-rounded-circle card" >
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                            <i class="fa fa-clock-o font-22 avatar-title text-primary" style="margin-left: 35%;margin-top: 31%;width: 15%;height: 10%;"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-end">
                            <h3 class="text-dark mt-1"><span data-plugin="counterup">@php echo $totaluserLive @endphp</span></h3>
                            <p class="text-muted mb-1 text-truncate">Total Online Attendees</p>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div>
        </div>
    </div>
   
    
</div>
<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                

                <h4 class="header-title mb-3">Last 5 Events</h4>
                
                <div class="table-responsive">
                    <table class="table table-borderless table-hover table-nowrap table-centered m-0">
                        <center>
                        <thead class="table-light">
                            <tr>
                                
                                <th width="60%">Event Name</th>
                                <th width="20%">Total User</th>
                                <th width="20%">Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($recent) > 0)
                                @foreach ($recent as $event)
                                    @php
                                        $users = App\User::where('event_id',$event->id)->count();
                                    @endphp
                                    <tr>
                                        <td>{{ $event->name }}</td>
                                        <td>{{ $users }}</td>
                                        <td>
                                            <a href="{{ route('event.Edit',['event_id'=>( $event->id )]) }}" class="btn btn-info" data-toggle="tooltip" title="Edit"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('event.Dashboard',['id'=>( $event->id )]) }}" class="btn btn-warning" data-toggle="tooltip" title="Manage"><i class="fas fa-tasks"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                    <tr>
                                        <td colspan="3"><center>No Data Available</center></td>
                                    </tr>
                            @endif
                            

                        </tbody>
                    </center>
                    </table>
                    <div class="dropdown float-right">
                        <a style="margin-top: 14%;" href="{{ route('event.index') }}" class="btn btn-success" aria-expanded="false">
                            View More
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end col -->

    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                

                <h4 class="header-title mb-3">Events Expiring Soon</h4>

                <div class="table-responsive">
                    <table class="table table-borderless table-nowrap table-hover table-centered m-0">
                        <center>
                        <thead class="table-light">
                            <tr>
                                <th width="60%">Event Name</th>
                                <th width="20%">Total User</th>
                                <th width="20%">Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($ending_event) > 0)
                                @foreach($ending_event as $event)
                                @php
                                        $users = App\User::where('event_id',$event->id)->count();
                                @endphp
                                <tr>
                                    <td>{{ $event->name }}</td>
                                    <td>{{ $users }}</td>
                                    <td><a href="{{ route('event.Dashboard',['id'=>( $event->id )]) }}" class="btn btn-warning">Manage</a></td>
                                </tr>
                                @endforeach
                            @else
                                    <tr>
                                        <td colspan="3"><center>No Data Available</center></td>
                                    </tr>
                            @endif

                        </tbody>
                    </center>
                    </table>
                    <div class="dropdown float-right">
                        <a style="margin-top: 14%;" href="{{ route('event.expiring') }}" class="btn btn-success" aria-expanded="false">
                            View More
                        </a>
                    </div>
                </div> <!-- end .table-responsive-->
            </div>
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>

<!-- Modal -->
<div class="modal fade theme-modal" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Create Event</h5>
        </div>
        <form action="{{ route('event.Save') }}" method="POST">
            <div class="modal-body " id="eventData">
                <div class="form-group">
                    <label for="name">Event Name
                        <span style="color:red">*</span>

                    </label>
                   <input type="text" id="event_name_slug" name="name" class="form-control" required>
                   <span id="letterError" style="display: none;color:red">Event Name And Link Must Contain Some Letter</span>
                </div>
                <br>
                <div class="form-group">
                    <label for="name">Event Link
                        <span style="color:red">*</span></label><br>
                  
                    @php
                        if(env('APP_ENV') == 'staging'){
                            $link= 'http://localhost:8000';
                        }
                        else{
                            $link= ['https://','.'.explode(".",env('APP_URL'))[1].'.'.explode(".",env('APP_URL'))[2]];
                        }
                    @endphp
                      <input type="text" id="event_slug" name="event_slug" class="form-control" required>
                    <span>{{$link[0]}}</span>
                      <span class="successShow " role="alert" style="display: none;color:green;"></span>
                      <span class="errorShow " role="alert" style="display: none;color:red;"></span>
                    <br><span id="event_link">@if(env('APP_ENV') == 'staging'){{ ".localhost:8000" }}@else {{ $link[1] }} @endif</span><br>
                    <span style="color:red">**Note : Do Not Use <strong>Spaces Or Caps </strong> Between Subdomain Name, use '-' only if needed</span>
                </div>
                <div class="form-group">
                    <label for="number">Number Of Attendess
                        <span style="color:red">*</span></label><br>
                    <input type="number" id="domain" name="total_attendees" class="form-control"  value="1">
                </div>
                <div class="form-group">
                    <label for="name">Custom Domain (Optional)</label><br>
                    <input type="text" id="domain" name="domain" class="form-control" >
                    <span style="color:red">**Note : Do Not Use <strong>Spaces Or Caps and do not use http:// or https://.  </strong> </span>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="name">Event Start Date & Time
                            <span style="color:red">*</span>
                        </label>
                        <input type="datetime-local" name="start_date" id="event_start" class="event_start form-control" min="{{ Carbon\Carbon::today()->format('Y-m-d\TH:i:s') }}" required>
                    </div>
                    <div class="col">
                        <label for="name">Event End Date & Time
                            <span style="color:red">*</span>
                        </label>
                        <input type="datetime-local" name="end_date" min="{{ Carbon\Carbon::today()->format('Y-m-d\TH:i:s') }}" class="event_end form-control" id="event_end"required>
                        <span id="erroshowEndDate"  style="color:red;display:none">Event end date and time cannot be before the start date and time</span>
                        <span id="erroshowEnd"  style="color:red;display:none">Event Start Time and End Time Cannot Be The Same</span>
                    </div>
                </div><br>
                    <div class="form-group mb-3">
                        <label for="timezone">Timezone
                            <span style="color:red">*</span>
                        </label>
                        <select class="form-control js-example-basic-single" name="timezone"  >
                            <option  value="UTC">UTC</option>
                            @foreach(TIMEZONES as $tz=>$timezone)
                            <option  value="{{ $tz }}">{{ ucfirst($tz) }} - {{ ucfirst($timezone) }}</option>
                            @endforeach
                        </select>
                    </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="closeModal()">Close</button>
                <button type="submit" class="btn btn-primary" id="sameType">Save</button>
            </form>
            </div>
        
      </div>
    </div>
  </div>
@endsection

@section('scripts')
<script>
     function CreateEvent(){
          $('#createModal').modal('toggle');
      }
      $(document).ready(function(){
         $('#event_name_slug').on('input',function(){
            
            let event_name = $(this).val();
            if(containsAnyLetter(event_name) == false){
                $('#letterError').show();
                $('#sameType').attr('disabled', true);
            }
            else{
                $('#letterError').hide();
                $('#sameType').attr('disabled', false);
            }
            let slug = event_name.toLowerCase().replaceAll(" ","-");
            $.get("{{ route('event.available') }}",{'event_name':slug},function(res){
                if(res.code == 203){
                    $('.successShow').hide();
                    $('.errorShow').show();
                    $('.errorShow').empty();
                    $('.errorShow').html(res.message);
                }
                else if(res.code == 202){
                    $('.successShow').hide();
                    $('.errorShow').show();
                    $('.errorShow').empty();
                    $('.errorShow').html(res.message);
                   
                }
                else if(res.code == 200){
                    $('.errorShow').hide();
                    $('.successShow').show();
                    $('.successShow').empty();
                    $('.successShow').html(res.message);
                }
            });
            $('#event_slug').val(slug);
         });
         $('#event_slug').on('input',function(){
            $.get("{{ route('event.available') }}",{'event_name':$(this).val()},function(res){
                if(containsAnyLetter($(this).val()) == false){
                    $('#letterError').show();
                    $('.successShow').hide();
                    $('#sameType').attr('disabled', true);
                }
                else{
                    $('#letterError').hide();
                    $('#sameType').attr('disabled', false);
                }
                if(res.code == 203){
                    $('.successShow').hide();
                    $('.errorShow').show();
                    $('.errorShow').empty();
                    $('.errorShow').html(res.message);
                }
                else if(res.code == 202){
                    $('.successShow').hide();
                    $('.errorShow').show();
                    $('.errorShow').empty();
                    $('.errorShow').html(res.message);
                   
                }
                else if(res.code == 200){
                    $('.errorShow').hide();
                    $('.successShow').show();
                    $('.successShow').empty();
                    $('.successShow').html(res.message);
                }
            });
         });


         $('.event_end').on('input',function(){
            let start_date =new Date($('.event_start').val());
            let end_date = new Date($(this).val());
            //  console.log(start_date.getHours());
            let month_start = parseInt(start_date.getMonth())+1;
            let month_end = parseInt(end_date.getMonth())+1;
            let start_main_date = new Date(start_date.getFullYear(),month_start , start_date.getDate());
            let end_main_date = new Date(end_date.getFullYear(),month_end , end_date.getDate());
            //   console.log(parseInt(end_date.getMonth())+1);
            // if((start_main_date == end_main_date)  || (start_main_date > end_main_date)){
            //     $(this).addClass('is-invalid');
            //     $('#erroshowEndDate').show();
            //     $('#erroshowEnd').hide();
            //     $('#sameType').attr('disabled', true);
            // }
            // // console.log(start_main_date);
            // console.log(end_main_date)
             if ((start_main_date == end_main_date) && (start_date.getHours() == end_date
                            .getHours()) && (start_date.getMinutes() == end_date.getMinutes())) {
                
                $(this).addClass('is-invalid');
                $('#erroshowEnd').show();
                $('#erroshowEndDate').hide();
                $('#sameType').attr('disabled', true);
            }else if (((start_main_date >= end_main_date) && (start_date.getHours() >= end_date
                    .getHours()) && (start_date.getMinutes() >= end_date.getMinutes()))){
                        
                        $(this).addClass('is-invalid');
                        $('#erroshowEndDate').show();
                        $('#erroshowEnd').hide();
                        $('#sameType').attr('disabled', true);
                }
                
            else {
                $(this).removeClass('is-invalid');
                $('#erroshowEndDate').hide();
                $('#erroshowEnd').hide();
                $('#sameType').attr('disabled', false);
            }
         });
     });

     function closeModal(){
         $('#createModal').modal('toggle');
     }

</script>

@endsection
@extends("layouts.admin")

@section('styles')
    @include("includes.styles.datatables")
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <style>
        /* #eventData .slugInp{
            width: 85%;
            border: 1px solid grey;
            height: calc(1.5rem+ 0.9rem+ 2px);
            padding: 0.45rem 0.9rem;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 0.2rem;
        } */
        #event_link{
            font-weight: 700;
            white-space: nowrap;
        }
    </style>
    <style>

        .form-control::-webkit-input-placeholder {

            color: white;

            }



            .form-control:-ms-input-placeholder {

            color: white;

            }



            .form-control::placeholder {

            color: white;

            }
    </style>
@endsection

{{-- @section('page_title')
    All Events  
@endsection --}}

@section('title')
    Events
@endsection

@section('breadcrumbs')
    <li class="breadcrumb-item active"><a href="{{ route("event.index") }}">Events</a></li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3 class="card-title"><i class="fas fa-calendar-day"></i>&nbsp;&nbsp;Events</h3>
                <div class="float-right"><button class="btn btn-success" onclick="CreateEvent()">Create Event</button></div>
            </div>
            <div id="showAlert" class="alert alert-success" role="alert" style="display: none">
                <center>  Link Copied Successfully </center>
            </div>
            <div id="AlertDelete" class="alert alert-success" role="alert" style="display: none">
                <center>  Event Deleted Successfully </center>
            </div>
            <div class="card-body">
                <table id="datatable-buttons" class="table datatable   dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Event Name</th>
                            <th>Url</th>
                            <th>Total Users</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(App\Event::where('user_id',Auth::id())->count() > 0)
                            @foreach($events as $key => $event)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $event->name }}</td>
                                <td id="copyTarget" style="cursor: pointer" data-id="{{ $event->link }}" ondblclick="openPage(this)" onclick="copyclip(this)" data-des="{{ $event->link }}">{{ Str::limit($event->link,50) }}</td>
                                <td>{{ App\User::where("event_id",$event->id)->count() }}</td>
                                <td>{{ \Carbon\Carbon::parse($event->start_date)->format('d-m-Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($event->end_date)->format('d-m-Y') }}</td>
                                <td>
                                    @if ($event->end_date < Carbon\Carbon::today())
                                        <span style="color: red">○ &nbsp;Expired</span>
                                    @else
                                        <span style="color: green">○ &nbsp;Active</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('event.Edit',['event_id'=>( $event->id )]) }}" class="btn btn-info" data-toggle="tooltip" title="Edit"><i class="fas fa-edit"></i></a>
                                    <a href="{{ route('event.Dashboard',['id'=>( $event->id )]) }}" class="btn btn-warning" data-toggle="tooltip" title="Manage"><i class="fas fa-tasks"></i></a>
                                    <button onclick="deleteEvent(this)" data-id="{{ $event->id }}" class="btn btn-danger" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="10"><center>No Data Available</center></td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
           
        </div>
    </div>
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
                   <input type="text" id="event_name" name="name" class="form-control" required>
                   <span id="letterError" style="display: none;color:red">Event Name And Link Must Contain Some Letter</span>
                </div>
                <br>
                <div class="form-group">
                    <label for="name">Event Link
                        <span style="color:red">*</span></label><br>
                    <input type="text" id="event_slug" name="event_slug" class="form-control" required>
                    
                    <span class="successShow " role="alert" style="display: none;color:green;"></span>
                    <span class="errorShow " role="alert" style="display: none;color:red;"></span>
                    @php
                        // if(env('APP_ENV') == 'staging'){
                        //     $link= ['http://','.'.explode(".",$event->link)[1]];
                        // }
                        // else{
                        //     $link= ['https://','.'.explode(".",$event->link)[1].'.'.explode(".",$event->link)[2]];
                        // }
                    @endphp
                    <br><span id="event_link">@if(env('APP_ENV') == 'staging'){{ ".localhost:8000" }}@else .eventstub.co @endif</span><br>
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
                        <label for="name">Start Date
                            <span style="color:red">*</span>
                        </label>
                        <input type="datetime-local" name="start_date" id="event_start" class="event_start form-control" min="{{ Carbon\Carbon::today()->format('Y-m-d\TH:i:s') }}" required>
                    </div>
                    <div class="col">
                        <label for="name">End Date
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
                        <select class="form-control" name="timezone"    >
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
@include("includes.scripts.datatables")
  <script>
      function containsAnyLetter(str) {
        return /[a-zA-Z]/.test(str);
        }
      function CreateEvent(){
          $('#createModal').modal('toggle');
      }

      function copyclip(e){

        var link = e.getAttribute('data-des');
        /* Copy the text inside the text field */
        navigator.clipboard.writeText(link);

        /* Alert the copied text */
        // alert("Link Copied To Clipboard");
        showMessage("Link Copied To Clipboard",'success');

      }

      function openPage(e){
          var link = e.getAttribute("data-id");
          window.open(link,'_blank');
      }

      function deleteEvent(e){
        confirmDelete("Are you sure you want to DELETE Event?","Confirm Event Delete").then(confirmation=>{
            if(confirmation){
                var eventId = e.getAttribute('data-id');
                var data = e.closest('tr');
                $.post('{{ route("event.delete") }}',{'id':eventId},function(response){
                    if(response.code == 200){
                        data.remove();
                        showMessage(response.message,'success');
                    }
                    else{
                        showMessage(response.message,'error');
                    }
                    
                    
                });
            }
        });
      }
     $(document).ready(function(){
         $('#event_name').on('input',function(){
            
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
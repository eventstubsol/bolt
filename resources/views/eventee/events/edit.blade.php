@extends("layouts.admin")
@section('styles')
    @include("includes.styles.datatables")
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <style>
         .slugInp{
           
            border: 1px solid grey;
            height: calc(1.5rem+ 0.9rem+ 2px);
            padding: 0.45rem 0.9rem;
            ;
            /* background-color: #fff; */
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 0.2rem;
        }
        #event_link{
            font-weight: 700;
            white-space: nowrap;
        }
    </style>
    @include("includes.styles.select")

@endsection

@section('page_title')
    Event Edit  
@endsection

@section('title')
    Event Edit
@endsection

@section('breadcrumbs')
    <li class="breadcrumb-item active"><a href="{{ route("event.index") }}">Events</a> &nbsp; > &nbsp;Edit</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('event.Update',$event_id) }}" method="POST">
                    @csrf       
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="name">Event Name
                                <span style="color:#03fffd">*</span>
                            </label>
                            <input type="text" id="event_name" name="name" value="{{ $event->name }}" class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="name">Event Link
                                <span style="color:#03fffd">*</span></label><br>
                                <span id="event_link">{{ $link[0] }}</span>
                                <input type="text" style="  width: 50% !important; display: inline-block !important" id="event_slug" name="slug" class="slugInp  form-control @error('slug') is-invalid @enderror" value="{{ $event->slug }}" required>
                                @error('slug')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                                
                            <span id="event_link">{{ $link[1]  }}</span><br>
                            <span style="color:#03fffd">**Note : Do Not Use <strong>Spaces Or Caps </strong> Between Subdomain Name, use '-' only if needed</span>
                        </div>
                    </div>
                    <div class="row">

                        <div class="form-group col-md-6">
                            <label for="number">Number Of Attendess</label><br>
                            <input type="number" id="domain" name="expected_attendees" class="form-control" value="{{ $event->expected_attendees }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="name">Custom Domain (Optional)</label><br>
                            <input type="text" id="domain" value="{{ isset($event->domain) ? $event->domain : '' }}" name="domain" class="slugInp form-control" >
                            <span style="display:block; color:#03fffd">**Note : Do Not Use <strong>Spaces Or Caps and do not use http:// or https://.  </strong> </span>
                        </div>
                    </div>
                    <div class="row">
                        @if($event->start_dates < Carbon\Carbon::today())
                        <div class="col-md-6">
                            <label for="name">Start Date
                                <span style="color:#03fffd">*</span>
                            </label>
                            <input type="text" data-start="{{ $event->start_dates }}" disabled  value="{{ Carbon\Carbon::parse($event->start_dates)->format('d-m-Y') }}" min="{{ Carbon\Carbon::today()->format('Y-m-d\TH:i:s') }}" class="event_Start form-control" >
                        </div>
                        @elseif($event->start_dates >= Carbon\Carbon::today())
                        <div class="col-md-6">
                            <label for="name">Start Date
                                <span style="color:#03fffd">*</span>
                            </label>
                            <input type="datetime-local" name="start_date"  value="{{ $event->start_dates }}" min="{{ Carbon\Carbon::today()->format('Y-m-d\TH:i:s') }}" class="event_Start form-control" >
                        </div>
                        @endif
                        @if($event->end_dates >= Carbon\Carbon::today())
                                <div class="col-md-6">
                                    <label for="name">End Date
                                        <span style="color:#03fffd">*</span>
                                    </label>
                                    <input type="datetime-local" data-start="{{ $event->start_dates }}" name="end_date"  value="{{ $event->end_dates }}" min="{{ Carbon\Carbon::today()->format('Y-m-d\TH:i:s') }}" class="event_end form-control @error('end_date') is-invalid @enderror" required>
                                    <span id="erroshowEndDate"  style="color:red;display:none">Event end date and time cannot be before the start date and time</span>
                                    <span id="erroshowEnd"  style="color:red;display:none">Event Start Time and End Time Cannot Be The Same</span>
                                    @error('end_date')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                            
                    
                        
                        @endif
                        <div class="form-group  col-sm-12">
                            <label for="timezone">Timezone
                                <span style="color:red">*</span>
                            </label>
                            <select class="form-control icon_select_2  select2" name="timezone">
                                <option  value="UTC">UTC</option>
                                @foreach(TIMEZONES as $tz=>$timezone)
                                <option  @if($event->timezone===$tz) selected="true" @endif   value="{{ $tz }}">{{ ucfirst($tz) }} - {{ ucfirst($timezone) }}</option>
                            
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" id="sameType">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
@include("includes.scripts.select")

<script>
    $(document).ready(function(){
        $(".icon_select_2").select2({});

         $('#event_name').on('input',function(){
            let event_name = $(this).val();
            let slug = event_name.toLowerCase().replaceAll(" ","-");
        
            $('#event_slug').val(slug);
         });
         $('.event_end').on('input',function(){
            let start_date =new Date("{{ $event->start_dates }}");
            let end_date = new Date($(this).val());
            let month_start = parseInt(start_date.getMonth())+1;
            let month_end = parseInt(end_date.getMonth())+1;
            let start_main_date = new Date(start_date.getFullYear(),month_start , start_date.getDate());
            let end_main_date = new Date(end_date.getFullYear(),month_end , end_date.getDate());
            //  console.log(start_date.getHours());
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
</script>

@endsection
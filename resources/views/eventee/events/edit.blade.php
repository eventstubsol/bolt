@extends("layouts.admin")
@section('styles')
    @include("includes.styles.datatables")
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <style>
         .slugInp{
            width: 85%;
            border: 1px solid grey;
            height: calc(1.5rem+ 0.9rem+ 2px);
            padding: 0.45rem 0.9rem;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 0.2rem;
        }
        #event_link{
            font-weight: 700;
            white-space: nowrap;
        }
    </style>
@endsection

@section('page_title')
    Event Edit  
@endsection

@section('title')
    Event Edit
@endsection

@section('breadcrumbs')
    <li class="breadcrumb-item active">Events &nbsp; > &nbsp;Edit</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('event.Update',$event_id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Event Name
                            <span style="color:red">*</span>
                        </label>
                        <input type="text" id="event_name" name="name" value="{{ $event->name }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Event Link
                            <span style="color:red">*</span></label><br>
                        <input type="text" id="event_slug" name="event_slug" class="slugInp" value="{{ $event->slug }}" required>
                        @php
                            $baseurl = URL::to('/');
                            if(strpos($baseurl,'https')){
                                    $baseurl =  str_replace('https://','',$baseurl);
                            }else{
                                $baseurl=  str_replace('http://','',$baseurl);
                            }
                        @endphp
                        <span id="event_link">.{{ $baseurl }}</span><br>
                        <span style="color:red">**Note : Do Not Use <strong>Spaces Or Caps </strong> Between Subdomain Name, use '-' only if needed</span>
                    </div>
                    <div class="form-group">
                        <label for="name">Custom Domain (Optional)</label><br>
                        <input type="text" id="domain" name="domain" class="slugInp" >
                        <span style="color:red">**Note : Do Not Use <strong>Spaces Or Caps and do not use http:// or https://.  </strong> </span>
                    </div>
                    @if($event->end_date >= Carbon\Carbon::today())
                        <div class="row">
                            <div class="col">
                                <label for="name">Start Date
                                    <span style="color:red">*</span>
                                </label>
                                <input type="date" name="start_date" value="{{ $event->start_date }}"  class="form-control" required>
                            </div>
                            <div class="col">
                                <label for="name">End Date
                                    <span style="color:red">*</span>
                                </label>
                                <input type="date" name="end_date" value="{{ $event->end_date }}" min="{{ Carbon\Carbon::today()->format('Y-m-d')}}" class="form-control" required>
                            </div>
                            
                        </div><br>
                   
                       
                    @endif
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

<script>
    $(document).ready(function(){
         $('#event_name').on('input',function(){
            let event_name = $(this).val();
            let slug = event_name.toLowerCase().replaceAll(" ","-");
        
            $('#event_slug').val(slug);
         });
     });
</script>

@endsection
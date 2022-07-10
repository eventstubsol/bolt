@extends("layouts.admin")

@section("page_title")
    Booth Enquiries: {{ $booth->name }}
@endsection

@section("title")
    Booth Enquiries: {{ $booth->name }}
@endsection

@section("styles")
    @include("includes.styles.fileUploader")
    @include("includes.styles.wyswyg")
    <link rel="stylesheet" href="{{ asset("event-assets/css/app.css") }}">
    <style>
        .positioned .dropify-wrapper {
            height: 100%;
        }
    </style>
@endsection

@section("breadcrumbs")
    <li class="breadcrumb-item"><a href="/">Booths</a></li>
    <li class="breadcrumb-item active">Enquiries</li>
@endsection

@section("content")
    <div class="row">
        <div class="col-sm-12 text-right mb-3">
            <button class="btn btn-primary" id="export-csv">EXPORT CSV</button>
        </div>
        <div class="col-sm-12">
            @foreach($booth->interests as $interest)
                @php
                $user = $interest->user;
                if(!$user){ continue; }
                @endphp
            <div class="card-box mb-2">
                <div class="row align-items-center">
                    <div class="col-sm-4">
                        <div class="media">
                            <img class="d-flex align-self-center mr-3 rounded-circle" src="{{ $user->profileImage }}" alt="" height="64">
                            <div class="media-body">
                                <h4 class="mt-0 mb-2 font-16">{{$user->name}} {{$user->last_name}}
                                </h4>
                                <p class="mb-1 text-italic text-dark">{{ $user->job_title }} at
                                    @if($user->company_name)
                                        @if($user->company_website_link)
                                            <a href="{{ $user->company_website_link }}" target="_blank">
                                                @endif
                                                    {{ $user->company_name }}
                                                @if($user->company_website_link)
                                            </a>
                                        @endif
                                    @endif
                                </p>
                                {{-- <p class="mb-1"><b>Location:</b> {{ $user->country }}</p> --}}
                                {{-- <p class="mb-0"><b>Industry:</b> {{ $user->industry }}</p> --}}
                                <p class="mb-0"><b>Enquiry Date:</b> {{ $interest->created_at->format("d-m-Y h:i:s A e (P)")  ?? ""}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <p class="mb-1 mt-3 mt-sm-0"><i class="mdi mdi-email mr-1"></i> {{ $user->email }}</p>
                        <p class="mb-0"><i class="mdi mdi-phone-classic mr-1"></i> {{ $user->phone }}</p>
                    </div>
                    <div class="col-sm-4">
                        <div class="text-center mt-3 mt-sm-0">
                            @if($user->website_link)
                                    <a href="{{ $user->website_link }}" class="font-22" target="_blank">
                                        <i class="mdi mdi-link"></i>
                                    </a>
                            @endif
                            @if($user->facebook_link)
                                    <a href="{{ $user->facebook_link }}"  class="font-22" target="_blank">
                                        <i class="mdi mdi-facebook"></i>
                                    </a>
                            @endif
                            @if($user->twitter_link)
                                    <a href="{{ $user->twitter_link }}" class="font-22" target="_blank">
                                        <i class="mdi mdi-twitter"></i>
                                    </a>
                            @endif
                            @if($user->linkedin_link)
                                    <a href="{{ $user->linkedin_link }}" class="font-22" target="_blank">
                                        <i class="mdi mdi-linkedin"></i>
                                    </a>
                            @endif
                        </div>
                    </div>
                </div> <!-- end row -->
            </div> <!-- end card-box-->
            @endforeach
        </div> <!-- end col -->
    </div>
@endsection

@section("scripts")
    <script>
        $(document).ready(function () {
            let button = $("#export-csv");
            button.on("click", function(e){
                e.preventDefault();
                $.ajax({
                    url: "{{ route("exhibiter.enquiries.raw", [ "booth" => $booth->id ]) }}",
                    data: {
                        _token: "{{ csrf_token() }}",
                    },
                    success: function(rows){
                        if(rows.length){
                            exportToCsv("{{ $booth->name }} Enquiries ({{ date("d-m-Y") }}).csv", rows)
                        }else{
                            alert("Nothing to export!");
                        }
                    },
                });
            })
        })
    </script>
@endsection
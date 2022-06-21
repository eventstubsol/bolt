<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ $event->name }}</title>
    <meta content="width=device-width" name="viewport" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <style>
 


.scedule{
/* background: url({{ asset("assets/images/landing/scedule_bg.jpg") }} ) no-repeat left top; */
/* background-size: cover; */
display: flex;
align-items: center;
justify-content: center;
padding: 60px 0 100px;
min-height: 740px;
}

.register_block{
background: url("{{ assetUrl($landing->banner_image) }}") no-repeat left top;
background-size: cover;
padding: 100px 0 50px;
min-height: 780px;
position: relative;
}

.register_block:after{
content: "";
width: 100%;
height: 100%;
background: url("{{ assetUrl($landing->banner_image) }}") no-repeat left top;
background-size: cover;
position: absolute;
top: 0;
left: 0;
}

        .bg_image{
            width: 99vw;
            margin-top: 5%;
            height: 100vh;
            object-fit: contain;

        }
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        body{
            overflow-x: hidden;
            background-color: {{$event->primary_color}} !important;
            
            /* background: linear-gradient(-949deg,  {{$event->primary_color}},  {{$event->secondary_color}}); */
        }
        
        /* .navbar-shrink .nav-item.register{
            border: 1px solid {{$event->primary_color}} ;
        } */
        .speaker_block{
        /* background:linear-gradient(to bottom, rgb(116 116 116 / 57%) 0%, rgb(86 86 86 / 15%) 100%); */
        background-size: cover;
        padding: 55px 0;
        }

        .speaker_block h4{
        /* margin-bottom: 100px; */
        }

        .speaker_block h5{
            text-align: center;
            color: #fff;
            text-transform: uppercase;
            font-weight: 300;
            font-size: 55px;
            position: relative;
            letter-spacing: 3px; 
        }

    .speakerbox{
        width: 280px;
    }

    .speakerbox h6{
        font-size: 20px;
        color: #fff;
        text-transform: uppercase;
        letter-spacing: 1px;
        
        font-family: 'Open Sans';
    }

    .speakerbox h6 span{
        font-weight: 100;
        font-size: 14px;
    }

    .speakerbox .boxBg{
        height: 250px;
        background: #d0d0d0;
        border-radius: 50px;
        margin-bottom: 20px;
        overflow: hidden;
        border: 5px solid #fff;
    }

    .speakerbox .boxBg img{
        width: 100%;
        height: 250px;
        object-fit: cover;
    }

        #defaultCountdown{
            /* position: absolute; */
            /* top: 90%; */
            /* left: 71%; */
            /* width: 26%; */
            color: white;
            margin-top: 40px;
            padding-left: 14px;
            padding: 6px 1px 6px 7px;
            background-color: #1313137d;
            border: none;
            font-family: 'Montserrat', sans-serif;
            font-weight: 900;
        }
        
        .btn-primary:hover {
        color: #fff;
        background-color:  {{$event->secondary_color}} !important;
        border-color:  {{$event->secondary_color}} !important;
        }
        .btn-reg:hover {
        color: #fff;
        background-color:  {{$event->secondary_color}} !important;
        border-color:  {{$event->secondary_color}} !important;
        }
        #defaultCountdown .countdown-section:not(:last-child){
            border-right: 1px solid white;
        }
        #defaultCountdown .countdown-period{
            font-family: 'Montserrat', sans-serif;
            font-weight: 400;
        }
        .register_now{            
            position: absolute;
            top: 90%;
            left: 23%;
            color: #52009e;
            background: #ffd900;
            padding: 18px;
            text-decoration: none;
            font-family: 'Montserrat', sans-serif;
            font-weight: 900;
            border-radius: 7px;
        }
        @media only screen and (max-width: 880px)  and (min-width: 480px)  {
            #defaultCountdown{                
                font-size: 10px;
                /* top: 5%;
                left: 66%;
                width: 207px; */
            }
            .register_now{
                top: 280px;
                left: 616px;
                padding: 10px;
            }
        }
        @media only screen and (max-width: 480px) {
            .bg_image{
               height: 80vh;

            }
            #defaultCountdown{                
                top: 83%;
                left: 1%;
                width: 352px;
            }
            .register_now{
                top: 440px;
                left: 109px;
            }

        }
        header.masthead{
            padding-top: 0 !important;
        }
        

        hr.divider {
        height: 0.2rem;
        max-width: 3.25rem;
        margin: 1.5rem auto;
        background-color: {{ $event->secondary_color}} !important;
        opacity: 1;
        }

        .banner_block img{
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .banner_block{
            height: 104vh;
        }
      
        .form-group{
            min-width: 49%;
            margin-right: 1%;
        }
        .form-group:last-child {
            width: 100%;
        }
        .form-group:nth-last-child(2){
            width: 100%;
        }
        .form-control{
            background-color: #f0f8ff00;
            border: none;
            border-bottom: 1px solid #ced4da;
            border-radius: 0;
        }
        .event_desc{
            position: absolute;
            right: 73px;
            background: #131313c2;
            height: 69vh;
            /* margin: auto 0; */
            top: 50%;
            transform: translateY(-50%);
        }
    </style>
     <!-- Bootstrap Icons-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
     <!-- Google fonts-->
     <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
     <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
     <!-- SimpleLightbox plugin CSS-->
     <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset("assets/css/landing.css")}}">
    <link rel="shortcut icon" href="{{asset("assets/landing/favicon.png")}}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-countdown/2.1.0/css/jquery.countdown.min.css" integrity="sha512-3TZ6IiaoL7KEeLwJgOfw+/dEOxOUpb9YhmUokvcFOvNuFJ7t9kvilMNAMqeJ8neRT4iBnCe35TZsPwD2Y1Gl6g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#page-top">
                    <img src="{{ assetUrl(getFieldId('logo',$event->id)) }}" width="100%" alt="">
            </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto my-2 my-lg-0">
                    @if($landing->speaker_status == 1)
                        <li class="nav-item"><a class="nav-link" href="#speakers">Speakers</a></li>
                    @endif 
                    @if($landing->schedule_status == 1)
                        <li class="nav-item"><a class="nav-link" href="#schedule">Schedule</a></li>
                    @endif 
                    @if($landing->section_status == 1)
                        <li class="nav-item"><a class="nav-link" href="#sponsers">Sponsors</a></li>
                    @endif 
                    @if(isset($landing->cta))
                        <li class="nav-item register btn-reg"><a class="nav-link" href="{{ $landing->cta }}">Register Now</a></li>
                    @elseif($landing->registration_status == 1)
                        <li class="nav-item register btn-reg"><a class="nav-link" href="#registration">Register Now</a></li>
                    @endif 

                    
                </ul>
                
            </div>
        </div>
    </nav>
   
    {{-- @if(isset($landing->banner_image)) --}}
        {{-- <header class="masthead" id="home"> --}}
          
        {{-- </header> --}}
    {{-- @else --}}
        <header class="masthead" id="home">
            <div class="banner_block">
                @if(isset($landing->banner_image))
                <img src="{{ assetUrl($landing->banner_image) }}" alt="" class="bigBanner" />
                @endif
            </div>
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 event_desc align-items-center justify-content-center text-center">
                    <div class="col-lg-8 w-100 align-self-end">
                        <h1 class="text-white font-weight-bold">{{ $event->name }}</h1>
                        <hr class="divider" />
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                        @if($landing->tagline != null)  <p class="text-white-75 mb-5">{{ $landing->tagline	 }}</p> @endif
                        @if(isset($landing->cta))
                            <a class="btn btn-primary btn-xl" href="{{ $landing->cta }}">Register now</a>
                        @elseif($landing->registration_status == 1)
                            <a class="btn btn-primary btn-xl" href="#registration">Register now</a>
                        @endif 
                       @if(!$hasStarted)  
                        <div id="defaultCountdown"></div>
                        </div>
                       @endif
                </div>
            </div>
        </header>
    {{-- @endif --}}
    
@php
$main_event = $event;
@endphp
    @if($landing->speaker_status == 1)
    <!-- Speaker page Start -->
        <div class="speaker_block" id="speakers">
            {{-- <h4>{{ $event->name }}</h4> --}}
            <h5>Speakers</h5>
            <hr class="divider" />

            <div class="d-flex justify-content-evenly flex-wrap">
            @if(count($speakers) > 0)

            @foreach ($speakers as $speaker)
                <div class="speakerbox">
                    <div class="boxBg">
                    <img src="{{ assetUrl($speaker->image) }}" alt="">
                    </div>
                    @php
                    $user = App\User::findOrFail($speaker->speaker_id);
                    @endphp
                    <h6 class="text-center">{{ ($user->name).' '.$user->last_name }} <span class="d-block">{{ $speaker->designation }}</span></h6>
                
                </div>
                @endforeach

            @endif  
            </div>

        </div>

    @endif

    
@php
$lastDate = false;
$i = 0;
// $dates = []; 
    // foreach($schedule as $room => $scheduleForRoom){
    //     foreach ($scheduleForRoom as $id => $event){
    //         if($lastDate != $event['start_date']['m']){
    //             $lastDate = $event['start_date']['m'];
    //         }
    //         if($event['type']!=="PRIVATE_SESSION"){
    //             $event['id'] = $id;
    //             $dates[$lastDate][$room][] = $event;
    //          }

    //     }
    // }
@endphp


{{-- Schedule Section --}}
@if($landing->schedule_status == 1)

    <div class="scedule" id="schedule">
        <div>
            <h5>Event Schedule</h5>
            <hr class="divider" />

            <div class="container">
                {{-- Date Pills --}}
                <ul class="nav nav-tabs mt-3 " id="myTab" role="tablist">
                @foreach($schedule as $date => $room)
                    @php
                        $i++;
                    @endphp
                    <li class="nav-item" role="presentation">
                    <a class="nav-link @if($i === 1) active @endif"  data-toggle="tab" href="#sch-{{$i}}" role="tab" aria-controls="home"  aria-expanded="{{ $i === 1 ? 'true' : 'false' }}" aria-selected="{{ $i === 1 ? 'true' : 'false' }}">{{ $date }}</a>
                    </li>
                @endforeach
                </ul>
                @php
                    $i = 0;
                @endphp
                {{-- Tab For Each Date --}}
                <div class="tab-content">
                @foreach($schedule as $date => $rooms)
                    @php
                        $i++;
                    @endphp
                    <div class="tab-pane fade {{ $i === 1 ? "active show" : "" }}" id="sch-{{$i}}" role="tabpanel" >
                    @php
                        $j = 0;
                    @endphp
                    {{-- Room Name Pills --}}
                    <ul class="nav nav-tabs tabSec mb-3" id="myTab" role="tablist">
                        @foreach($rooms as $room => $events)
                        @php
                            $j++;
                        @endphp
                        <li class="nav-item" role="presentation">
                            <a class="nav-link @if($j === 1) active @endif"  data-toggle="tab" href="#sch-{{$i}}-{{$j}}" role="tab" aria-controls="home" aria-expanded="{{ $j === 1 ? 'true' : 'false' }}" aria-selected="{{ $j === 1 ? 'true' : 'false' }}">{{$room}}</a>
                        </li>
                        @endforeach
                        
                    </ul>
                    
                    @php
                        $j = 0;
                    @endphp
                    {{-- Tab For Each Room --}}
                    <div class="tab-content" >
                        @foreach($rooms as $room => $events)
                        @php
                            $j++;
                        @endphp
                        <div class="tab-pane fade show @if($j === 1) active @endif" id="sch-{{$i}}-{{$j}}" role="tabpanel" aria-labelledby="chat1-tab">
                            <!-- Print each event in schedule -->
                            @foreach($events as $id => $event)
                            @php 
                                $id = $event['id'];
                            @endphp
                            <div class="d-flex">
                                <ul class="list-unstyled timeline-sm descUl"> 
                                <li class="timeline-sm-item d-flex align-items-start">
                                    <div class="d-flex flex-column">
                                        <span class="timeline-sm-date">
                                            {{ $event['start_date']['dts'] }} - {{ $event['start_date']['dte'] }}
                                        </span>
                                    </div>
                                    <div @if($event['status'] === 1) @endif class="desc_block"> 
                                        <h3 class="">{{ $event['name'] }}</h3>
                                        <p class="">{!! $event['description'] !!}</p>
                                    </div>
                                </li>
                                </ul>
                            </div>
                            @endforeach
                        </div>

                        @endforeach
                    </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
@endif


{{-- Sposer Sections  --}}
    @if($landing->section_status == 1)
        <div id="sponsers"></div>
        @foreach ($sections as $section)
            
            <div class="speaker_block">
                <p data-test="{{print_r($section)}}"></p>
                <h5>{{$section->section}}</h5>
                <hr class="divider" />

                <div class="d-flex justify-content-evenly flex-wrap">
                {{-- @if(count($speakers) > 0) --}}

                    @foreach ($section->images as $image)
                        <div class="sponser_image">
                            <div class="boxBg">
                                <img src="{{ assetUrl($image->url) }}" alt="">
                            </div>
                           
                            {{-- <h6 class="text-center">{{ ($user->name).' '.$user->last_name }} <span class="d-block">{{ $speaker->designation }}</span></h6> --}}
                        </div>
                    @endforeach

                {{-- @endif   --}}
                </div>

            </div>
        @endforeach

    @endif


    @php
    $event  = $main_event;
    @endphp
@if($landing->registration_status == 1)

    <div class="row justify-content-lg-center align-items-center pr-lg-5 mb-5" id="registration">
        <div class="col-lg-8 mb-4">
        <div class="regBox">
            <h5>Register Now</h5>
            <hr class="divider" />
         
            @include('flash::message')
            @if($form != null)
            <form method="POST" class="register mt-2" id="customform"  action="{{route('attendee_register.confirmReg.landingSave',$event->slug)}}" enctype="multipart/form-data">
            @csrf
            @foreach($form->fields as $field)
                @php 
                    $struct = (object) ($field->toArray()["form_struct"]);
                    // print_r($field)
                @endphp
                @switch($struct->type)
                    @case("text")
                    @case("email")
                    @case("tel")
                            <div class="form-group">
                                <!-- <label class="text-white" for="{{ $field->placeholder ?? $struct->label }}">{{ $field->placeholder ?? $struct->label }}</label> -->
                                <input @if($field->required) required @endif class="form-control" type="{{ $struct->type }}" placeholder="{{ $field->placeholder ?? $struct->label
                                }}" name="{{ $struct->field }}">
                            </div>
                            
                        @break
                    @case("country")
                            <div class="form-group">
                                <!-- <label class="text-white" for="country" >{{ $field->placeholder ?? $struct->label }}</label> -->
                                <select id="country" class="form-control" name="country">
                                    <option value="Afganistan">Afghanistan</option>
                                    <option value="Albania">Albania</option>
                                    <option value="Algeria">Algeria</option>
                                    <option value="American Samoa">American Samoa</option>
                                    <option value="Andorra">Andorra</option>
                                    <option value="Angola">Angola</option>
                                    <option value="Anguilla">Anguilla</option>
                                    <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                                    <option value="Argentina">Argentina</option>
                                    <option value="Armenia">Armenia</option>
                                    <option value="Aruba">Aruba</option>
                                    <option value="Australia">Australia</option>
                                    <option value="Austria">Austria</option>
                                    <option value="Azerbaijan">Azerbaijan</option>
                                    <option value="Bahamas">Bahamas</option>
                                    <option value="Bahrain">Bahrain</option>
                                    <option value="Bangladesh">Bangladesh</option>
                                    <option value="Barbados">Barbados</option>
                                    <option value="Belarus">Belarus</option>
                                    <option value="Belgium">Belgium</option>
                                    <option value="Belize">Belize</option>
                                    <option value="Benin">Benin</option>
                                    <option value="Bermuda">Bermuda</option>
                                    <option value="Bhutan">Bhutan</option>
                                    <option value="Bolivia">Bolivia</option>
                                    <option value="Bonaire">Bonaire</option>
                                    <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                                    <option value="Botswana">Botswana</option>
                                    <option value="Brazil">Brazil</option>
                                    <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                    <option value="Brunei">Brunei</option>
                                    <option value="Bulgaria">Bulgaria</option>
                                    <option value="Burkina Faso">Burkina Faso</option>
                                    <option value="Burundi">Burundi</option>
                                    <option value="Cambodia">Cambodia</option>
                                    <option value="Cameroon">Cameroon</option>
                                    <option value="Canada">Canada</option>
                                    <option value="Canary Islands">Canary Islands</option>
                                    <option value="Cape Verde">Cape Verde</option>
                                    <option value="Cayman Islands">Cayman Islands</option>
                                    <option value="Central African Republic">Central African Republic</option>
                                    <option value="Chad">Chad</option>
                                    <option value="Channel Islands">Channel Islands</option>
                                    <option value="Chile">Chile</option>
                                    <option value="China">China</option>
                                    <option value="Christmas Island">Christmas Island</option>
                                    <option value="Cocos Island">Cocos Island</option>
                                    <option value="Colombia">Colombia</option>
                                    <option value="Comoros">Comoros</option>
                                    <option value="Congo">Congo</option>
                                    <option value="Cook Islands">Cook Islands</option>
                                    <option value="Costa Rica">Costa Rica</option>
                                    <option value="Cote DIvoire">Cote DIvoire</option>
                                    <option value="Croatia">Croatia</option>
                                    <option value="Cuba">Cuba</option>
                                    <option value="Curaco">Curacao</option>
                                    <option value="Cyprus">Cyprus</option>
                                    <option value="Czech Republic">Czech Republic</option>
                                    <option value="Denmark">Denmark</option>
                                    <option value="Djibouti">Djibouti</option>
                                    <option value="Dominica">Dominica</option>
                                    <option value="Dominican Republic">Dominican Republic</option>
                                    <option value="East Timor">East Timor</option>
                                    <option value="Ecuador">Ecuador</option>
                                    <option value="Egypt">Egypt</option>
                                    <option value="El Salvador">El Salvador</option>
                                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                                    <option value="Eritrea">Eritrea</option>
                                    <option value="Estonia">Estonia</option>
                                    <option value="Ethiopia">Ethiopia</option>
                                    <option value="Falkland Islands">Falkland Islands</option>
                                    <option value="Faroe Islands">Faroe Islands</option>
                                    <option value="Fiji">Fiji</option>
                                    <option value="Finland">Finland</option>
                                    <option value="France">France</option>
                                    <option value="French Guiana">French Guiana</option>
                                    <option value="French Polynesia">French Polynesia</option>
                                    <option value="French Southern Ter">French Southern Ter</option>
                                    <option value="Gabon">Gabon</option>
                                    <option value="Gambia">Gambia</option>
                                    <option value="Georgia">Georgia</option>
                                    <option value="Germany">Germany</option>
                                    <option value="Ghana">Ghana</option>
                                    <option value="Gibraltar">Gibraltar</option>
                                    <option value="Great Britain">Great Britain</option>
                                    <option value="Greece">Greece</option>
                                    <option value="Greenland">Greenland</option>
                                    <option value="Grenada">Grenada</option>
                                    <option value="Guadeloupe">Guadeloupe</option>
                                    <option value="Guam">Guam</option>
                                    <option value="Guatemala">Guatemala</option>
                                    <option value="Guinea">Guinea</option>
                                    <option value="Guyana">Guyana</option>
                                    <option value="Haiti">Haiti</option>
                                    <option value="Hawaii">Hawaii</option>
                                    <option value="Honduras">Honduras</option>
                                    <option value="Hong Kong">Hong Kong</option>
                                    <option value="Hungary">Hungary</option>
                                    <option value="Iceland">Iceland</option>
                                    <option value="Indonesia">Indonesia</option>
                                    <option value="India" selected>India</option>
                                    <option value="Iran">Iran</option>
                                    <option value="Iraq">Iraq</option>
                                    <option value="Ireland">Ireland</option>
                                    <option value="Isle of Man">Isle of Man</option>
                                    <option value="Israel">Israel</option>
                                    <option value="Italy">Italy</option>
                                    <option value="Jamaica">Jamaica</option>
                                    <option value="Japan">Japan</option>
                                    <option value="Jordan">Jordan</option>
                                    <option value="Kazakhstan">Kazakhstan</option>
                                    <option value="Kenya">Kenya</option>
                                    <option value="Kiribati">Kiribati</option>
                                    <option value="Korea North">Korea North</option>
                                    <option value="Korea Sout">Korea South</option>
                                    <option value="Kuwait">Kuwait</option>
                                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                                    <option value="Laos">Laos</option>
                                    <option value="Latvia">Latvia</option>
                                    <option value="Lebanon">Lebanon</option>
                                    <option value="Lesotho">Lesotho</option>
                                    <option value="Liberia">Liberia</option>
                                    <option value="Libya">Libya</option>
                                    <option value="Liechtenstein">Liechtenstein</option>
                                    <option value="Lithuania">Lithuania</option>
                                    <option value="Luxembourg">Luxembourg</option>
                                    <option value="Macau">Macau</option>
                                    <option value="Macedonia">Macedonia</option>
                                    <option value="Madagascar">Madagascar</option>
                                    <option value="Malaysia">Malaysia</option>
                                    <option value="Malawi">Malawi</option>
                                    <option value="Maldives">Maldives</option>
                                    <option value="Mali">Mali</option>
                                    <option value="Malta">Malta</option>
                                    <option value="Marshall Islands">Marshall Islands</option>
                                    <option value="Martinique">Martinique</option>
                                    <option value="Mauritania">Mauritania</option>
                                    <option value="Mauritius">Mauritius</option>
                                    <option value="Mayotte">Mayotte</option>
                                    <option value="Mexico">Mexico</option>
                                    <option value="Midway Islands">Midway Islands</option>
                                    <option value="Moldova">Moldova</option>
                                    <option value="Monaco">Monaco</option>
                                    <option value="Mongolia">Mongolia</option>
                                    <option value="Montserrat">Montserrat</option>
                                    <option value="Morocco">Morocco</option>
                                    <option value="Mozambique">Mozambique</option>
                                    <option value="Myanmar">Myanmar</option>
                                    <option value="Nambia">Nambia</option>
                                    <option value="Nauru">Nauru</option>
                                    <option value="Nepal">Nepal</option>
                                    <option value="Netherland Antilles">Netherland Antilles</option>
                                    <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                    <option value="Nevis">Nevis</option>
                                    <option value="New Caledonia">New Caledonia</option>
                                    <option value="New Zealand">New Zealand</option>
                                    <option value="Nicaragua">Nicaragua</option>
                                    <option value="Niger">Niger</option>
                                    <option value="Nigeria">Nigeria</option>
                                    <option value="Niue">Niue</option>
                                    <option value="Norfolk Island">Norfolk Island</option>
                                    <option value="Norway">Norway</option>
                                    <option value="Oman">Oman</option>
                                    <option value="Pakistan">Pakistan</option>
                                    <option value="Palau Island">Palau Island</option>
                                    <option value="Palestine">Palestine</option>
                                    <option value="Panama">Panama</option>
                                    <option value="Papua New Guinea">Papua New Guinea</option>
                                    <option value="Paraguay">Paraguay</option>
                                    <option value="Peru">Peru</option>
                                    <option value="Phillipines">Philippines</option>
                                    <option value="Pitcairn Island">Pitcairn Island</option>
                                    <option value="Poland">Poland</option>
                                    <option value="Portugal">Portugal</option>
                                    <option value="Puerto Rico">Puerto Rico</option>
                                    <option value="Qatar">Qatar</option>
                                    <option value="Republic of Montenegro">Republic of Montenegro</option>
                                    <option value="Republic of Serbia">Republic of Serbia</option>
                                    <option value="Reunion">Reunion</option>
                                    <option value="Romania">Romania</option>
                                    <option value="Russia">Russia</option>
                                    <option value="Rwanda">Rwanda</option>
                                    <option value="St Barthelemy">St Barthelemy</option>
                                    <option value="St Eustatius">St Eustatius</option>
                                    <option value="St Helena">St Helena</option>
                                    <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                    <option value="St Lucia">St Lucia</option>
                                    <option value="St Maarten">St Maarten</option>
                                    <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                                    <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                                    <option value="Saipan">Saipan</option>
                                    <option value="Samoa">Samoa</option>
                                    <option value="Samoa American">Samoa American</option>
                                    <option value="San Marino">San Marino</option>
                                    <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                    <option value="Senegal">Senegal</option>
                                    <option value="Seychelles">Seychelles</option>
                                    <option value="Sierra Leone">Sierra Leone</option>
                                    <option value="Singapore">Singapore</option>
                                    <option value="Slovakia">Slovakia</option>
                                    <option value="Slovenia">Slovenia</option>
                                    <option value="Solomon Islands">Solomon Islands</option>
                                    <option value="Somalia">Somalia</option>
                                    <option value="South Africa">South Africa</option>
                                    <option value="Spain">Spain</option>
                                    <option value="Sri Lanka">Sri Lanka</option>
                                    <option value="Sudan">Sudan</option>
                                    <option value="Suriname">Suriname</option>
                                    <option value="Swaziland">Swaziland</option>
                                    <option value="Sweden">Sweden</option>
                                    <option value="Switzerland">Switzerland</option>
                                    <option value="Syria">Syria</option>
                                    <option value="Tahiti">Tahiti</option>
                                    <option value="Taiwan">Taiwan</option>
                                    <option value="Tajikistan">Tajikistan</option>
                                    <option value="Tanzania">Tanzania</option>
                                    <option value="Thailand">Thailand</option>
                                    <option value="Togo">Togo</option>
                                    <option value="Tokelau">Tokelau</option>
                                    <option value="Tonga">Tonga</option>
                                    <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                                    <option value="Tunisia">Tunisia</option>
                                    <option value="Turkey">Turkey</option>
                                    <option value="Turkmenistan">Turkmenistan</option>
                                    <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                                    <option value="Tuvalu">Tuvalu</option>
                                    <option value="Uganda">Uganda</option>
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="Ukraine">Ukraine</option>
                                    <option value="United Arab Erimates">United Arab Emirates</option>
                                    <option value="United States of America">United States of America</option>
                                    <option value="Uraguay">Uruguay</option>
                                    <option value="Uzbekistan">Uzbekistan</option>
                                    <option value="Vanuatu">Vanuatu</option>
                                    <option value="Vatican City State">Vatican City State</option>
                                    <option value="Venezuela">Venezuela</option>
                                    <option value="Vietnam">Vietnam</option>
                                    <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                    <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                    <option value="Wake Island">Wake Island</option>
                                    <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                                    <option value="Yemen">Yemen</option>
                                    <option value="Zaire">Zaire</option>
                                    <option value="Zambia">Zambia</option>
                                    <option value="Zimbabwe">Zimbabwe</option>
                                </select>
                            </div>
                        @break
    
                  
                    @case("subtype")
                            @php
                                $options = $subtypes;
                            @endphp
                            @if(count($options))
                                <div class="form-group mb-3 ">
                                    <!-- <label for="type">{{ $field->placeholder }}</label> -->
                                    <select  @if($field->required && count($options)) required @endif  class="form-control"  name="subtype">
                                        <option value="">Select {{$field->placeholder}}</option>
                                        @foreach($options  as $type)
                                        <option value="{{ $type->name }}">{{ ucfirst($type->name) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif
    
                        @break
                    @case("select")
                            @php
                                $options = explode(",",$struct->options);
                            @endphp
                            <div class="form-group mb-3 ">
                                <!-- <label for="type">{{ $struct->label }}</label> -->
                                <select  @if($field->required) required @endif  class="form-control"  name="{{$struct->field}}">
                                    <option value="">Select {{$struct->label}}</option>
                                    @foreach($options  as $type)
                                    <option value="{{ $type }}">{{ ucfirst($type) }}</option>
                                    @endforeach
                                </select>
                            </div>
    
                        @break
                    @default
                        
                @endswitch
                    @error('email')
                        <span class="invalid-feedback" role="alert">{{ print_r($message)  }}</span>
                    @enderror
            @endforeach    
            <input type="hidden" name="event_id" value="{{$event->id}}">
            <input type="hidden" name="type" value="{{$form->user_type}}">
    
            <div class="input-group form-group">
                <div class="col-md-12 mb-2">
                    <button type="submit" class="theme-btn btn primary-filled">{{ __('Register') }}</button>
                </div>
            </div>
        </form>
            @else
            <form action="{{ route('attendee_register.confirmReg',$event->slug) }}" method="POST">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Name" name="name">
                </div>

                <div class="form-group">

                    <input type="text" class="form-control" placeholder="Mobile no." name="phone" min="10" max="13">
                </div>

                <div class="form-group">

                    <input type="text" class="form-control mb-5" placeholder="Email address" name="email">
                </div>
                <input type="hidden" class="form-control mb-5" placeholder="Email address" name="event_id" value="{{$event->id}}">

                <div class="submit">
                    <button type="submit" class="theme-btn btn primary-filled">{{ __('Register') }}</button>
                </div>
            </form>
            @endif
        </div>
        </div>
    </div>  
 @endif




   
    {{-- <img class="bg_image" src="{{ assetUrl($landing->banner_image) }}" alt="">  --}}
  

    {{-- <a class="register_now" href="https://www.eventsibles.online/mlk2022-pep-register">Register Now</a> --}}



    
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    
    <script src="{{asset("assets/libs/countdown/js/jquery.plugin.min.js")}}"></script>
    <script src="{{asset("assets/libs/countdown/js/jquery.countdown.js")}}"></script>
    <script>
        $(document).ready(function() { 
            // var newYear = new Date(); 
            // console.log(new Date("{{$event->end_date}}").toDateString())
            // newYear = new Date(newYear.getFullYear() + 1, 1 - 1, 1); 
            var newYear = new Date("{{$event->start_date}}");
            // var newYear = new Date("Thu Apr 13 2023");
            $('#defaultCountdown').countdown({until: newYear}); 
            
            // document.querySelector("video").play()

        });

    
        window.addEventListener('DOMContentLoaded', event => {

        // Navbar shrink function
        var navbarShrink = function () {
            const navbarCollapsible = document.body.querySelector('#mainNav');
            if (!navbarCollapsible) {
                return;
            }
            if (window.scrollY === 0) {
                navbarCollapsible.classList.remove('navbar-shrink')
            } else {
                navbarCollapsible.classList.add('navbar-shrink')
            }

        };

        // Shrink the navbar 
        navbarShrink();

        // Shrink the navbar when page is scrolled
        document.addEventListener('scroll', navbarShrink);

        // Activate Bootstrap scrollspy on the main nav element
        // const mainNav = document.body.querySelector('#mainNav');
        // if (mainNav) {
        //     new bootstrap.ScrollSpy(document.body, {
        //         target: '#mainNav',
        //         offset: 74,
        //     });
        // };

// Collapse responsive navbar when toggler is visible
const navbarToggler = document.body.querySelector('.navbar-toggler');
const responsiveNavItems = [].slice.call(
    document.querySelectorAll('#navbarResponsive .nav-link')
);
responsiveNavItems.map(function (responsiveNavItem) {
    responsiveNavItem.addEventListener('click', () => {
        if (window.getComputedStyle(navbarToggler).display !== 'none') {
            navbarToggler.click();
        }
    });
});

// Activate SimpleLightbox plugin for portfolio items
// new SimpleLightbox({
//     elements: '#portfolio a.portfolio-box'
// });

});

        
    </script>
</body>
</html>
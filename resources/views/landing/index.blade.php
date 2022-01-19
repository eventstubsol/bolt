<!DOCTYPE html>
<html lang="en">
<head>
<title>Landing page</title>
<meta content="width=device-width" name="viewport" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="shortcut icon" href="https://virturo-bucket.s3.us-east-2.amazonaws.com/uploads/fi1awmsj1YbbTuNQpfKxYJsoflCWrVHBsHV0L7cN.png">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">


<style>
    body{
        /* font-family: 'MuseoModerno', cursive; */
        overflow-x: hidden;
    }
    img.bigBanner{
        width: 100%;
        max-width: 100%;
        height: 1075px;
    }
    .banner_block{
        position: relative;
    }
    .banner_block:before{
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: #00000078;
    }

    .textSection{
        position: absolute;
        top: 0;
        left: 0;
        padding: 50px 80px 80px;
        width: 100%;
        height: 100%;
    }

    .logosection{
        width: 225px;
        height: 60px;
        display: flex;
        overflow: hidden;
        justify-content: start;
    }
    .logosection img{
        height: 60px;
        object-fit: contain;
        width: 100%;
    }

    #timer{
        display: flex;
        justify-content: center;
        color: #fff;
        min-height: 72px;
        margin: 90px 0 30px;
    }

    .setTime{
        text-align: center;
        margin: 0 10px;
        font-size: 40px;
        font-weight: 700;
        border: 1px solid #fff;
        border-radius: 5px;
        min-width: 85px;
        line-height: 1;
    }

    .setTime span{
        display: block;
        font-size: 16px;
        font-weight: 200;
        padding: 7px 0;
    }

    h4{
        text-align: center;
        color: #18333c;
        background: #fff;
        border-radius: 30px;
        width: 360px;
        font-size: 38px;
        line-height: 50px;
        margin: 0 auto;
        text-transform: uppercase;
        padding: 25px;
        font-family: 'Varela Round', sans-serif;
    }

    h4 span{
        display: block;
        font-weight: bold;
        font-size: 38px;
    }

    p{
      text-align: center;
      color: #fff;
      text-transform: uppercase;
      padding: 0;
      margin: 30px 0 70px;
      font-size: 20px;
      letter-spacing: 1px;
    }

    p span{
      font-weight: bold;
    }

    .bottom-section{
      display: flex;
      justify-content: space-between;
      padding: 0 200px;
      flex-wrap: wrap;
    }

    @media screen and (max-width: 1440px) {
      .bottom-section{
        padding: 0;
      }
      
    }
    
    @media screen and (max-width: 1100px) {
      .bottom-section{
        flex-direction: column;
        align-items: center;
      }

      img.bigBanner{
        height: 1400px;
        object-fit: cover;
      }

      #timer{
        margin: 20px 0;
      }

      .banner_block::before {
        background: #000000b5;
      }

      .textSection{
        padding: 20px;
      }

      .regBtn{
        margin: 20px 0 !important;
      }

      .speaker_block h5::before {
        display: none;
      }

      .speaker_block h5::after {
        display: none;
      }
    }

    @media screen and (max-width: 767px) {
      .register_block{
        min-height: 850px !important;
      }

      .speaker_block h4 {
        margin-bottom: 30px !important;
      }
      .speaker_block h5 {
        margin-bottom: 30px !important;
        font-size: 40px !important;
      }

      .setTime{
        font-size: 22px !important;
        min-width: 60px;
      }

      .setTime span{
        font-size: 13px !important;
      }

      #timer{
        min-height: 52px !important;
      }

      h4{
        width: 100%;
        padding: 10px;
        font-size: 25px;
        line-height: 30px;
      }

      h4 span {
        font-size: 23px;
      }
      
    }

    @media screen and (max-width: 400px) {
      .img_box{
        width: 100% !important;
      }
      .regBox{
        padding: 20px !important;
      }
    }

    .img_box{
      overflow: hidden;
      width: 310px;
      height: 315px;
      border-radius: 50px;
    }

    .img_box img{
      border-radius: 50px;
      height: 315px;
      object-fit: fill;
      width: 100%;
    }

    h3{
      font-weight: bold;
      color: #fff;
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    sup{
      font-size: 12px;
      top: -0.9em;
    }
    
    .regBtn{
      border-radius: 50px;
      background: #18333c;
      color: #fff;
      text-transform: uppercase;
      letter-spacing: 1px;
      font-weight: bold;
      border: 2px solid #fff;
      font-size: 25px;
      padding: 12px 40px;
      margin-top: 50px;
    }

    .speaker_block{
      background: url('/assets/images/landing/speaker_bg.jpg') no-repeat left top;
      background-size: cover;
      padding: 55px 0;
    }

    .speaker_block h4{
      margin-bottom: 100px;
    }

    .speaker_block h5{
      text-align: center;
      color: #fff;
      text-transform: uppercase;
      font-weight: 300;
      font-size: 55px;
      position: relative;
      letter-spacing: 3px; 
      margin-bottom: 80px;
    }

  .speaker_block h5:before{
    content: "";
    background: url(/assets/images/landing/speaker_textBorder.png) no-repeat center;
    width: 263px;
    height: 33px;
    position: absolute;
    top: 20px;
    left: -570px;
    right: 0;
    margin: 0 auto;
  }

  .speaker_block h5:after{
    content: "";
    background: url(/assets/images/landing/speaker_textBorder.png) no-repeat center;
    width: 263px;
    height: 33px;
    position: absolute;
    top: 20px;
    left: 0;
    right: -570px;
    margin: 0 auto;
  }

  .speakerbox{
    width: 355px;
  }

  .speakerbox h6{
    font-size: 20px;
    color: #fff;
    text-transform: uppercase;
    letter-spacing: 1px;
  }

  .speakerbox h6 span{
    font-weight: 100;
  }

  .speakerbox .boxBg{
    height: 305px;
    background: #d0d0d0;
    border-radius: 50px;
    margin-bottom: 20px;
    overflow: hidden;
  }

  .speakerbox .boxBg img{
    width: 100%;
    height: 305px;
    object-fit: cover;
  }

  .justify-content-evenly{
    justify-content: space-evenly;
  }

  .register_block{
    background: url("{{ assetUrl($landing->banner_image) }}") no-repeat left top;
    background-size: cover;
    padding: 155px 0 50px;
    min-height: 1080px;
    position: relative;
  }

  .registerLogo{
    position: absolute;
    top: 0;
    left: 0;
  }

  .regBox{
    border: 1px solid #fff;
    background: #515151c4;
    padding: 50px;
    border-radius: 40px;
  }

  .regBox h2{
    font-size: 30px;
    color: #fff;
    text-align: center;
    text-transform: uppercase;
    font-weight: 300;
    letter-spacing: 3px;
    margin-bottom: 50px;
  }

  .form-control{
    height: 65px;
    border-radius: 30px;
    margin-bottom: 40px;
    font-size: 18px;
    text-align: center;
  }

  .btn{
    background: #00a0fc;
    border: 1px solid #fff;
    border-radius: 30px;
    font-size: 20px;
    color: #fff;
    width: 160px;
    padding: 10px 0;
    margin: 0 auto;
    display: block;
  }
    
</style>
</head>
<body>



<!-- Home page start -->
<div class="banner_block">
    <img src="{{ assetUrl($landing->banner_image) }}" alt="" class="bigBanner" />
    <div class="textSection">
      @include('flash::message')
        <!-- Site Logo Start -->
        <div class="logosection">
            <img src="{{ assetUrl(getFieldId('logo',$event->id)) }}" alt="">
        </div>    
        <!-- Site Logo End -->

        <!-- Countdown Start -->
        <div id="timer" data-endtime="{{ $event->start_date }}"></div>
        <!-- Countdown Start -->

        <h4>{{ $event->name }}</h4>
        <p>@if($landing->tagline != null){{ $landing->tagline	 }}@endif</p>

        <!-- Register section Start -->
        <div class="bottom-section">
          <div class="img_box">
            <img src="{{ assetUrl($landing->first_logo) }}" alt="">
          </div>
          <div class="text-center mt-4 mx-0 mx-lg-3">
            <h3 class="mt-4">{{ Carbon\Carbon::parse($event->start_date)->format('d-m-Y') }}</h3>
            <a href="#regInit" style="text-decoration: none" class="regBtn d-block">Register now</a>
          </div>
          <div class="img_box mt-lg-0 mt-4">
            <img src="{{ assetUrl($landing->second_logo) }}" alt="">
          </div>
        </div>
        <!-- Register section End -->

    </div>
</div>
<!-- Home page end -->

@if($landing->speaker_status == 1)
  <!-- Speaker page Start -->
<div class="speaker_block">
  <h4>{{ $event->name }}</h4>
  <h5>Speakers</h5>

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
<!-- Speaker page End -->

@endif
@if (\Session::has('message'))
    <script>
      showMessage(`User Created Succesfully`,'success');
    </script>
@endif
<!-- Register page Start -->
<div id="regInit" class="register_block">
  <!-- <div class="registerLogo">
  <img src="{{ assetUrl(getFieldId('logo',$event->id)) }}" alt="">
  </div> -->
  <div class="row justify-content-lg-end align-items-center pr-lg-5">
    <div class="col-lg-5">
      <div class="regBox">
        <h2>Registration</h2>
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
                              <label class="text-white" for="{{ $field->placeholder ?? $struct->label }}">{{ $field->placeholder ?? $struct->label }}</label>
                              <input @if($field->required) required @endif class="form-control" type="{{ $struct->type }}" placeholder="{{ $field->placeholder ?? $struct->label
                              }}" name="{{ $struct->field }}">
                          </div>
                          
                      @break
                  @case("country")
                          <div class="form-group">
                              <label class="text-white" for="country" >{{ $field->placeholder ?? $struct->label }}</label>
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
  
                  @case("image")
                      <div class="image-uploader profilepic">
                          <label class="mb-3 text-white" for="images">{{ $field->placeholder }}</label>
                          <input type="hidden" name="profileImage" class="upload_input"  >
                          <input type="file" data-name="profileImage" data-plugins="dropify" data-type="image" />
                      </div>
                      {{-- <div className="image-uploader profilepic">
                          <input type="hidden" id="profileurl"  className="upload_input" name="profileImage" />
                          <input accept="images/*" type="file" data-name="imageurl" data-plugins="dropify" data-type="image" />
                      </div> --}}
                      @break
                  @case("subtype")
                          @php
                              $options = $subtypes;
                          @endphp
                          @if(count($options))
                              <div class="form-group mb-3 ">
                                  <label for="type">{{ $field->placeholder }}</label>
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
                              <label for="type">{{ $struct->label }}</label>
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
          <form action="{{ route('attendee_register.confirmReg.defaultsave',$event->slug) }}" method="POST">
            <input type="text" class="form-control" placeholder="Name" name="name">
            <input type="text" class="form-control" placeholder="Mobile no." name="phone" min="10" max="13">
            <input type="text" class="form-control mb-5" placeholder="Email address" name="email">
            <button type="submit" class="theme-btn btn primary-filled">{{ __('Register') }}</button>
          </form>
        @endif
      </div>
    </div>
  </div>  
</div>
<!-- Register page End -->

<!-- Script All -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

<script>

 

//Countdown jquery Start //
function myTimer() {
  var ending = jQuery("#timer").attr("data-endtime"),
  endTime = new Date(ending);
  endTime = Date.parse(endTime) / 1000;

  var now = new Date();
  now = Date.parse(now) / 1000;

  var timeLeft = endTime - now;

  var days = Math.floor(timeLeft / 86400);
  var hours = Math.floor((timeLeft - days * 86400) / 3600);
  var minutes = Math.floor((timeLeft - days * 86400 - hours * 3600) / 60);
  var seconds = Math.floor(
    timeLeft - days * 86400 - hours * 3600 - minutes * 60
  );

//   if (days < "10") {
//     days = "0" + days;
//   }
  if (days < "1") {
    days = "0";
  }
//   if (hours < "10") {
//     hours = "0" + hours;
//   }
  if (hours < "1") {
    hours = "0";
  }
//   if (minutes < "10") {
//     minutes = "0" + minutes;
//   }
  if (minutes < "1") {
    minutes = "0";
  }
//   if (seconds < "10") {
//     seconds = "0" + seconds;
//   }
  if (seconds < "1") {
    seconds = "0";
  }

  $("#timer").html(
    "<span id='days' class='setTime'>" +
    days +
    "<span>Days</span></span>" +
    "<span id='hours' class='setTime'>" +
    hours +
    "<span>Hours</span></span>" +
    "<span id='minutes' class='setTime'>" +
    minutes +
    "<span>Minutes</span></span>" +
    "<span id='seconds' class='setTime'>" +
    seconds +
    "<span>Seconds</span></span>"
  );
}
setInterval(function() {
  myTimer();
}, 1000);
//Countdown jquery End //



</script>
<script>
  $('#flash-overlay-modal').modal();
</script>
</body>
</html>
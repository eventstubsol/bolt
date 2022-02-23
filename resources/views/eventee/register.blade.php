<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <style>
        body{
            font-family: 'Montserrat', sans-serif;
            overflow-x: hidden;
            background: url("{{asset('assets/images/reg.jpg')}}") no-repeat left top;
            background-size: cover;
        }
        
        img{
            max-width: 100%;
            width: auto;
        }
        .logo{
            margin: 20px 0 0 35px;
        }
        .regBlock{
            padding-bottom: 80px;
        }

        .formBlock{
            border-radius: 10px;
            border: 1px solid #fff;
            background: #ffffff70;
            padding: 40px 35px;
        }

        .formBlock h5{
            font-size: 26px;
            padding-bottom: 35px;
            text-align: center;
            font-weight: 600;
            color: #fff;
        }
        .form-control{
            margin-bottom: 15px;
            color: #333;
            font-size: 14px;
            min-height: 46px;
            border-radius: 6px;
        }
        .form-control:focus{
            box-shadow: none;
            border-color: #007a7c;
        }
        .form-control::-webkit-input-placeholder { 
            color: #007a7c;
        }
        .form-control:-ms-input-placeholder { 
            color: #007a7c;
        }
        .form-control::placeholder {
            color: #007a7c;
        }

        .btn-reg{
            background: #0fb602;
            color: #fff;
            font-weight: 600;
            font-size: 14px;
            border: 1px solid #fff;
            padding: 0.6rem 2rem;
            margin-top: 1.5rem;
        }

        .phone-number-prefix{
            background: #cecece;
            min-height: 46px;
            border-radius: 6px 0 0px 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #333;
            font-size: 14px;
            padding: 0 5px;
            min-width: 48px;
        }

        .phone-number .form-control{
            border-radius: 0px 6px 6px 0px;
        }
    </style>
</head>
<body>
<div class="regBlock">
    <div class="logo">
        <img src="{{asset("assets/images/reg_logo.png")}}" alt="">
    </div>
    <div class="row align-items-center pe-5">
        <div class="col-md-4 offset-md-1">
            <img src="{{asset("assets/images/reg_lt_img.png")}}" alt="">
        </div>
        <div class="col-md-7 ps-5">
            <div class="formBlock">
                <h5>Registration</h5>
                @if($errors->any())
                    @foreach ($errors->all('<p>:message</p>') as $input_error)
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $input_error }}</strong>
                        </span>
                    @endforeach 
                @endif
                <form method="POST" class="register mt-6" action="{{ route('Eventee.register') }}">
                  @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" name="name"  class="form-control" placeholder ="First Name*">
                        </div>
                        <div class="col-md-6">
                            <input type="text"  name="last_name" class="form-control" placeholder ="Last Name*">
                        </div>
                    </div>
                    <input type="text" class="form-control"  name="email" placeholder ="Corporate e-Mail Address *">
                    <input type="password" name="password" class="form-control" placeholder ="Password *">

                    <select class="form-control" placeholder ="Last Name*" id="phone-number-country" name="country" autocomplete="off"></select>
                    <div class="phone-number mb-3 d-flex">
                        <div class="phone-number-prefix"></div>
                        <input class="form-control mb-0" id="phone-number" name="phone"  type="tel" autocomplete="off">
                        <input type="hidden" id="phone-number-full" name="phone" />
                    </div>

                    <input type="text" class="form-control" name="job_title" placeholder ="Job Title *">
                    {{-- <input type="text" class="form-control" placeholder =""> --}}

                    <div class="d-flex justify-content-center">
                        <button  type="submit"  class="btn btn-reg">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="//code.jquery.com/jquery.js"></script>
<script type="text/javascript" src="https://1cf5229636340d3e1dd5-0eccc4d82b7628eccb93a74a572fd3ee.ssl.cf1.rackcdn.com/testing/jquery.formatter.min.js"></script>
<script type="text/javascript" src="https://1cf5229636340d3e1dd5-0eccc4d82b7628eccb93a74a572fd3ee.ssl.cf1.rackcdn.com/testing/intlTelInput.min.js"></script>


<script>
const intlPhoneNumber = function(countryCode) {
  // get the country data from the plugin
  const countryData = $.fn.intlTelInput.getCountryData();
  const telInput = $("#phone-number");
  const telInputLabel = telInput.parents(".form-group").find("label");
  const countryDropdown = $("#phone-number-country");
  const phonePrefix = $('.phone-number-prefix');
  const fullPhoneNumber = $('#phone-number-full');
  const errorMsg = $("#error-msg");
  const initCountry = countryCode || 'us';
  let pattern = '';
  
  //set initial pattern for formatting
  // if (initCountry === 'us') {
  //   pattern = '({{{999}}}) {{{999}}}-{{{9999}}}';
  // } else {
  //   // using as temp until formatting on init figured out
  //   pattern = '{{{9999999999999999999999}}}'; 
  // }
  
  // reset function to reset error state on validation
  const reset = function() {
    telInput.attr("placeholder", "PHONE NUMBER");
    telInput.removeClass("has-error");
    telInputLabel.removeClass("has-error");
    errorMsg.addClass("hidden-xs-up");
  };

  // populate the country dropdown with intl-tel-input countries data
  $.each(countryData, function(i, country) {
    countryDropdown.append($("<option></option>").attr("value", country.iso2).text(country.name));
  });

  // init plugin for formatting placeholders
  telInput.intlTelInput({
    allowDropdown: false,
    initialCountry: initCountry,
    utilsScript: "https://1cf5229636340d3e1dd5-0eccc4d82b7628eccb93a74a572fd3ee.ssl.cf1.rackcdn.com/testing/utils.js"
  });
  
    // set dropdowns initial value
  const initialCountry = telInput.intlTelInput("getSelectedCountryData").iso2;
  let dialCode = telInput.intlTelInput("getSelectedCountryData").dialCode;
  countryDropdown.val(initialCountry);
  phonePrefix.text("+" + dialCode);

  // init format
  // telInput.formatter({
  //   'pattern': pattern
  // });  
  
  // delete intl-tel-input items that aren't needed
  $('.flag-container').remove();
  $('.intl-tel-input').replaceWith(function() {
    return $('#phone-number', this);
  });

  // set placeholder
  telInput.attr("placeholder", "PHONE NUMBER");

  // on blur: validate
  telInput.blur(function() {
    // reset states
    reset();

    if ($.trim(telInput.val())) {
      // if number is not valid
      if (telInput.intlTelInput("isValidNumber")) {
        // set hidden input to dial code + inputted number
        fullPhoneNumber.val(telInput.intlTelInput("getSelectedCountryData").dialCode + telInput.val());
      } else {
        // set error states
        telInput.addClass("has-error");
        telInputLabel.addClass("has-error");
        errorMsg.removeClass("hidden-xs-up");
        //clear hidden input val
        fullPhoneNumber.val("");
      }
    }
  });

  // on keyup / change flag: reset
  telInput.on("keyup change", reset);

  // listen to the country dropdown for changes.
  // updates placeholder and prefix when changed
  countryDropdown.change(function() {
    // Update Placeholder via plugin - so we can get the example number + format
    telInput.intlTelInput("setCountry", $(this).val());
    // Update Dial Code Prefix
    dialCode = telInput.intlTelInput("getSelectedCountryData").dialCode;
    phonePrefix.text("+" + dialCode);
    // Use updated placeholder to define formatting pattern
    pattern = telInput.attr("placeholder").replace(new RegExp("[0-9]", "g"), "9").replace(/([9]\d{0,10})/g, '{{"$1"}}');
    // update formatter
    telInput.formatter().resetPattern(pattern);
    // clear telephone input to prevent validation errors
    telInput.val("");
    // update placeholder to specific
    telInput.attr("placeholder", "PHONE NUMBER");
  });
};

// Testing for prepopulation. If country code not supplied: default = 'us'
// const initCountryCode = 'ca'; // uncomment to pass in as param
intlPhoneNumber();
</script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
        @if(isset($id))
        <link rel="shortcut icon" href="{{ assetUrl(getFieldId('favicon',$id)) }}?v=3">
        @endif
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">


    @if(Session::has('eventee-register'))
    <script>
        var show = "{{ Session::get('eventee-register') }}";
        showMessage(show,'success');
    </script>
    @endif

    @if(Session::has('login-failed'))
        <script>
            $(document).ready(function(){
                showMessage("{{ Session::get('login-failed') }}",'error');
                alert("Please Check Your Login ID And Password");
                
            });
        </script>
        @php
            Session::forget('login-failed');
        @endphp
    @endif

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
            background: #003135;
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
            color: #fff;
            font-size: 14px;
            min-height: 46px;
            border-radius: 6px;
            background: #001010;
            border-color: #001010;
        }
        .form-control:focus{
            box-shadow: none;
            border-color: #fff;
            background: #001010;
            color: #fff;
        }
        .form-control::-webkit-input-placeholder { 
            color: #fff;
        }
        .form-control:-ms-input-placeholder { 
            color: #fff;
        }
        .form-control::placeholder {
            color: #fff;
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
            background: #021d1d;
            min-height: 46px;
            border-radius: 6px 0 0px 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 14px;
            padding: 0 5px;
            min-width: 48px;
        }

        .phone-number .form-control{
            border-radius: 0px 6px 6px 0px;
        }

        label{
          color: #fff;
          font-size: 13px;
        }
        

        input:-webkit-autofill,
        input:-webkit-autofill:hover, 
        input:-webkit-autofill:focus,
        textarea:-webkit-autofill,
        textarea:-webkit-autofill:hover,
        textarea:-webkit-autofill:focus,
        select:-webkit-autofill,
        select:-webkit-autofill:hover,
        select:-webkit-autofill:focus {
          border: 1px solid #1d1d1d;
          -webkit-text-fill-color: #ebebeb ;
          transition: background-color 5000s ease-in-out 0s;
        }
        .register_now{
            color: white;
        }
    </style>
</head>
<body>
<div class="regBlock">
    <div class="logo">
        <img src="{{asset("assets/images/reg_logo.png")}}" alt="">
    </div>
    <div class="row align-items-center mt-5">
        <!-- <div class="col-md-4 offset-md-1">
            <img src="{{asset("assets/images/reg_lt_img.png")}}" alt="">
        </div> -->
        <div class="col-md-6 offset-md-3">
            <div class="formBlock">
                <h5>Login</h5>
                @include('flash::message')
                @if($errors->any())
                    @foreach ($errors->all('<p>:message</p>') as $input_error)
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $input_error }}</strong>
                        </span>
                    @endforeach 
                @endif
                <form action="{{ route('Eventee.login.confirm') }}" method="post">
                    @csrf
                    <label>Email address <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror"  name="email" placeholder ="Enter Your E-Mail Address *">
                    @error('email')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                    <br/>
                   

                    <label>Password <span class="text-danger">*</span></label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder ="Password *">
                    @error('password')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
               

                    <div class="d-flex justify-content-center">
                        <button class="btn btn-reg" type="submit">Login</button>
                    </div>
                </form>
                <p class="text register_now">Register As An Event Admin<a href="{{ route('Eventee.register') }}"> Click here</a></p>
            </div>

        </div>
    </div>
</div>

</body>
<script>
    $('#flash-overlay-modal').modal();
    /* setTimeout(function(){ 
        $('#flash-overlay-modal').modal('toggle'); 
    }, 2000); */
</script>
</html>

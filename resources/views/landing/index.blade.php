<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ $event->name }}</title>
    <meta content="width=device-width" name="viewport" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">
    <style>
        .bg_image{
            width: 100vw;
            height: 100vh;
            object-fit: contain;

        }
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        body{
            overflow: hidden;
            background: linear-gradient(-949deg, #d62125, #94181a);

            /* background: linear-gradient(-949deg, #910cff, #52009e); */
        }
        #defaultCountdown{
            position: absolute;
            top: 90%;
            left: 71%;
            width: 26%;
            color: white;
            padding-left: 14px;
            padding: 6px 1px 6px 7px;
            background-color: #1313137d;
            border: none;
            font-family: 'Montserrat', sans-serif;
            font-weight: 900;
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
                top: 5%;
                left: 66%;
                width: 207px;
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
    </style>
    <link rel="shortcut icon" href="{{asset("assets/landing/favicon.png")}}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-countdown/2.1.0/css/jquery.countdown.min.css" integrity="sha512-3TZ6IiaoL7KEeLwJgOfw+/dEOxOUpb9YhmUokvcFOvNuFJ7t9kvilMNAMqeJ8neRT4iBnCe35TZsPwD2Y1Gl6g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!-- <img class="bg_image" src="./bg.png" alt=""> -->
    <!-- <video class="bg_image" src="{{asset("assets/landing/video.mp4")}}" alt="" autoplay loop muted></video> -->
    <img class="bg_image" src="{{ assetUrl($landing->banner_image) }}" alt=""> 
  
    <div id="defaultCountdown"></div>

    {{-- <a class="register_now" href="https://www.eventsibles.online/mlk2022-pep-register">Register Now</a> --}}



    
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{asset("assets/libs/countdown/js/jquery.plugin.min.js")}}"></script>
    <script src="{{asset("assets/libs/countdown/js/jquery.countdown.js")}}"></script>
    <script>
        $(document).ready(function() { 
            // var newYear = new Date(); 
            // newYear = new Date(newYear.getFullYear() + 1, 1 - 1, 1); 
            var newYear = new Date("19 March 2022 12:00 CDT");
            $('#defaultCountdown').countdown({until: newYear}); 
            
            $('#removeCountdown').click(function() { 
                var destroy = $(this).text() === 'Remove'; 
                $(this).text(destroy ? 'Re-attach' : 'Remove'); 
                $('#defaultCountdown').countdown(destroy ? 'destroy' : {until: newYear}); 
            });
            // document.querySelector("video").play()

        });

        
    </script>
</body>
</html>
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
        }
        #defaultCountdown{
            position: absolute;
            top: 10%;
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
        @media only screen and (max-width: 680px)  and (min-width: 480px)  {
            #defaultCountdown{                
                font-size: 10px;
                top: 5%;
                left: 66%;
                width: 207px;
            }
            .register_now{
                top: 300px;
                left: 107px;
                padding: 10px;
            }
        }
        @media only screen and (max-width: 480px) {
            .bg_image{
               height: 80vh;
            }

            #defaultCountdown{                
                top: 24%;
                left: 1%;
                width: 352px;
            }
            .register_now{
                top: 440px;
                left: 109px;
            }

        }
    </style>
    
<style>
  body{
      /* font-family: 'MuseoModerno', cursive; */
      overflow-x: hidden;
  }
  img.bigBanner{
      width: 100%;
      max-width: 100%;
      height: 850px;
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
      position: absolute;
      bottom: 30px;
      right: 35px;
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
      font-size: 30px;
      line-height: 50px;
      margin: 0px auto 30px ;
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

    .scedule h5::before {
      display: none;
    }

    .scedule h5::after {
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

    .nav-tabs .nav-link{
      margin-bottom: 15px;
    }

    .img_box{
      display: none;
    }

    img.bigBanner {
      height: 650px;
      object-fit: cover;
    }
    
  }

  @media screen and (max-width: 400px) {
    .img_box{
      width: 100% !important;
    }
    .regBox{
      padding: 20px !important;
    }

    .img_box{
      display: none;
      
    }
    img.bigBanner {
      height: 650px;
    }

    .speakerbox {
      width: 290px;
    }
  }

  .img_box{
    overflow: hidden;
    width: 22%;
    height: 250px;
    border-radius: 50px;
    border: 5px solid #fff;
  }

  .img_box img{
    border-radius: 30px;
    height: 250px;
    object-fit: cover;
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
    font-size: 20px;
    padding: 12px 40px;
    margin-top: 50px;
  }

  .speaker_block{
    background: url( {{ asset('assets/images/landing/speaker_bg.jpg') }}) no-repeat left top;
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
  width: 280px;
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

.justify-content-evenly{
  justify-content: space-evenly;
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

.registerLogo{
  position: absolute;
  top: 0;
  left: 0;
}

.regBox{
  border: 1px solid #fff;
  background: #47474787;
  padding: 50px;
  border-radius: 40px;
  position: relative;
  z-index: 2;
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

.scedule{
  background: url({{ asset("assets/images/landing/scedule_bg.jpg") }} ) no-repeat left top;
  background-size: cover;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 60px 0 100px;
  min-height: 740px;
}

.scedule h5{
    text-align: center;
    color: #fff;
    text-transform: uppercase;
    font-weight: 600;
    font-size: 55px;
    position: relative;
    letter-spacing: 3px; 
    margin-bottom: 80px;
  }

.scedule h5:before{
  content: "";
  background: url({{ asset("/assets/images/landing/speaker_textBorder.png") }} ) no-repeat center;
  width: 263px;
  height: 33px;
  position: absolute;
  top: 20px;
  left: -50rem;
  right: 0;
  margin: 0 auto;
}

.scedule h5:after{
  content: "";
  background: url( {{ asset("/assets/images/landing/speaker_textBorder.png") }} ) no-repeat center;
  width: 263px;
  height: 33px;
  position: absolute;
  top: 20px;
  left: 0;
  right: -50rem;
  margin: 0 auto;
}
.nav-tabs{
  border: inherit;
}
.nav-tabs .nav-link{
  border-radius: 50px;
  border: 4px solid #fff;
  padding: 10px 40px;
  text-transform: uppercase;
  color: #fff;
  font-weight: 500;
  margin-right: 20px;
}
.nav-tabs .nav-item:last-child .nav-link{
  margin-right: 0px;
}
.nav-tabs .nav-link.active {
  color: #18333c;
  background-color: #fff;
}
.nav-tabs .nav-link:hover{
  color: #18333c;
  background-color: #fff;
}

.tab-pane h2{
  background: #fff;
  display: inline-block;
  font-size: 14px;
  text-transform: uppercase;
  font-weight: 600;
  border-radius: 20px;
  padding: 7px 15px;
  margin: 20px 0;
}

.tabSec .nav-item{
  margin: 25px 15px 20px 0;
}

.tabSec .nav-item:last-child{
  margin-right: 0;
}

.tabSec .nav-item .nav-link{
  margin-right: 0px;
  display: inline-block;
  font-size: 13px;
  text-transform: uppercase;
  font-weight: 600;
  border-radius: 20px;
  padding: 3px 15px;
  border-color: #fff;
  border: 2px solid #fff;
}

.tab-pane .descUl{
  
}



.tab-pane .descUl .timeline-sm-date{
  background: #fff;
  font-size: 12px;
  text-transform: uppercase;
  font-weight: 400;
  border-radius: 20px;
  padding: 7px 15px;
  list-style: none;
  width: 140px;
  margin: 20px 30px 0 0;
  position: relative;
  flex-shrink: 0;
}

.tab-pane .descUl .timeline-sm-date:before{
  content: "";
  width: 15px;
  height: 15px;
  background: #fff;
  position: absolute;
  right: -46px;
  top: 9px;
  border-radius: 100%;
}

.desc_block{
  background: #fff;
  border-radius: 25px;
  color: #18333c;
  padding: 30px 40px;
  position: relative;
  margin-left: 40px;
}

.desc_block:after{
  content: "";
  width: 2px;
  height: 100%;
  background: #fff;
  position: absolute;
  left: -32px;
  top: 0;
}

.desc_block h3{
  color: #18333c;
  font-size: 13px;
}
.desc_block p{
  color: #18333c;
  font-size: 13px;
  text-align: left;
  margin: 0 0 20px;
}
.desc_block p:last-child{
  margin: 0;
}


</style>
    <link rel="shortcut icon" href="./favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-countdown/2.1.0/css/jquery.countdown.min.css" integrity="sha512-3TZ6IiaoL7KEeLwJgOfw+/dEOxOUpb9YhmUokvcFOvNuFJ7t9kvilMNAMqeJ8neRT4iBnCe35TZsPwD2Y1Gl6g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
     <img class="bg_image" src="{{ assetUrl($landing->banner_image) }}" alt=""> 
    {{-- <video class="bg_image" src="./video.mp4" alt="" autoplay loop muted></video> --}}

    {{-- @if(Carbon\Carbon::parse($event->start_date) >=  Carbon\Carbon::now()) --}}
    <!-- Countdown Start -->
    <div id="timer" data-endtime="2022-03-19 18:00:00 UTC"></div>
    <!-- Countdown Start -->
   {{-- @else --}}
   {{-- <br><br><br><br><br> --}}
     {{-- <div class="pt-5">

     </div> --}}
   {{-- @endif --}}
    
    {{-- <a class="register_now" href="https://www.eventsibles.online/mlk2022-pep-register">Register Now</a> --}}

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
</body>
</html>
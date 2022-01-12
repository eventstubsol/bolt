<!DOCTYPE html>
<html lang="en">
<head>
<title>Landing page</title>
<meta content="width=device-width" name="viewport" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

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
        /* background: #00000078; */
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

    .img_box img{
      border-radius: 50px;
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
    background: url('/assets/images/landing/register_bg.jpg') no-repeat left top;
    background-size: cover;
    padding: 55px 0;
    min-height: 1080px;
    position: relative;
  }

  .registerLogo{
    position: absolute;
    top: 0;
    left: 0;
  }
    
</style>
</head>
<body>



<!-- Home page start -->
<div class="banner_block">
    <img src="/assets/images/landing/landing-img.jpg" alt="" class="bigBanner" />
    <div class="textSection">
        <!-- Site Logo Start -->
        <div class="logosection">
            <img src="/assets/images/landing/logo.png" alt="">
        </div>    
        <!-- Site Logo End -->

        <!-- Countdown Start -->
        <div id="timer" data-endtime="10 june 2022 10:00:00 GMT+01:00"></div>
        <!-- Countdown Start -->

        <h4>VirtuaL EVENT <span>SUMMIT 2022</span></h4>
        <p>bring your <span>brand image</span> to the highest destination</p>

        <!-- Register section Start -->
        <div class="bottom-section">
          <div class="img_box">
            <img src="/assets/images/landing/img-1.jpg" alt="">
          </div>
          <div class="text-center mt-4">
            <h3 class="mt-4">23<sup>rd</sup> january 2022</h3>
            <button class="regBtn">Register now</button>
          </div>
          <div class="img_box mt-4">
            <img src="/assets/images/landing/img-1.jpg" alt="">
          </div>
        </div>
        <!-- Register section End -->

    </div>
</div>
<!-- Home page end -->

<!-- Speaker page Start -->
<div class="speaker_block">
  <h4>VirtuaL EVENT <span>SUMMIT 2022</span></h4>
  <h5>Speakers</h5>

  <div class="d-flex justify-content-evenly flex-wrap">
    <div class="speakerbox">
      <div class="boxBg">
        <!-- <img src="/assets/images/landing/register_bg.jpg" alt=""> -->
      </div>
      <h6 class="text-center">Name <span class="d-block">Designation</span></h6>
    </div>
    <div class="speakerbox">
      <div class="boxBg">
        <!-- <img src="/assets/images/landing/register_bg.jpg" alt=""> -->
      </div>
      <h6 class="text-center">Name <span class="d-block">Designation</span></h6>
    </div>
    <div class="speakerbox">
      <div class="boxBg">
        <!-- <img src="/assets/images/landing/register_bg.jpg" alt=""> -->
      </div>
      <h6 class="text-center">Name <span class="d-block">Designation</span></h6>
    </div>
  </div>
  
</div>
<!-- Speaker page End -->

<!-- Register page Start -->
<div class="register_block">
  <div class="registerLogo">
    <img src="/assets/images/landing/register_pageLogo.png" alt="" />
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
</body>
</html>
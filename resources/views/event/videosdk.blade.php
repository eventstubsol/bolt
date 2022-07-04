<!DOCTYPE html>
<head id="inner_head">
    <title>Zoom</title>
    <meta charset="utf-8" />
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <style>
          #videosdk{
              width: 100vw;
              height: 100vh;
          }
      
      </style>
</head>
<body>
    <div id="video"></div>
    
    <script>
    window.addEventListener('DOMContentLoaded', (event) => {
      var script = document.createElement("script");
      script.type = "text/javascript";
      //
      script.addEventListener("load", function (event) {
        // Initialize the factory function
        const meeting = new VideoSDKMeeting();

        // Set apikey, meetingId and participant name
        const apiKey = "1a850e75-02d7-4444-bb30-3e8b5f32d8cb"; // generated from app.videosdk.live
        const name = "{{Auth::user()->name}}";

        const config = {
          name: name,
          apiKey: "1a850e75-02d7-4444-bb30-3e8b5f32d8cb",
          meetingId: "{{$meetingId}}",

          containerId: "{{$containerId === 'video_play_area' ? 'video_play_area' : 'session-content-'.$containerId}}",
          
          micEnabled: false,
          webcamEnabled: false,
          participantCanToggleSelfWebcam: true,
          participantCanToggleSelfMic: true,
          // redirectOnLeave: ,

          chatEnabled: true,
          screenShareEnabled: true,
          pollEnabled: true,
          whiteBoardEnabled: true,
          raiseHandEnabled: true,

          recordingEnabled: true,
          recordingWebhookUrl: "https://www.videosdk.live/callback",
          participantCanToggleRecording: false,

          brandingEnabled: false,
          brandLogoURL: "",
          brandName: "",
          poweredBy: false,

          participantCanLeave: false, // if false, leave button won't be visible

          // Live stream meeting to youtube
          livestream: {
            autoStart: true,
            outputs: [
              // {
              //   url: "rtmp://broadcast.api.video/s",
              //   streamKey: "5a7b8009-e0fb-45fa-9e5a-9105ac4efc99",
              // },
              // {
              //   url:"rtmps://rtmp-global.cloud.vimeo.com:443/live",
              //   streamKey:"084545eb-1fed-41a3-8aaa-f406079a117c",
              // }
            ],
          },
        permissions: {
          askToJoin: false, // Ask joined participants for entry in meeting
          toggleParticipantMic: false, // Can toggle other participant's mic
          toggleParticipantWebcam: false, // Can toggle other participant's webcam
          cantoggleLivestream: true,
          changeLayout: true,
          drawOnWhiteboard: true,
          toggleWhiteboard: true,
          toggleRecording: true,
          pin: true,
          removeParticipant: true,
        },
 
        joinScreen: {
          visible: false, // Show the join screen ?
          title: "Daily scrum", // Meeting title
          meetingUrl: window.location.href, // Meeting joining url
        },
      };
      console.log(config);

        meeting.init(config);
      });
      console.log(document.getElementsByTagName("head")[0])
    //   let doc = document.getElementById("frame").contentDocument;
      
      script.src =
        "https://sdk.videosdk.live/rtc-js-prebuilt/0.3.3/rtc-js-prebuilt.js";
      document.getElementsByTagName("head")[0].appendChild(script);
    })
    //   doc.getElementById("inner_head").appendChild(script);
    </script>
</body>
</html>
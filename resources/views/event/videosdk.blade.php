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
        const apiKey = "9dc7ab5b-c227-4f0f-a0fe-8ff279cdaf75"; // generated from app.videosdk.live
        const name = "{{Auth::user()->name}}";

        const config = {
          name: name,
          apiKey: "9dc7ab5b-c227-4f0f-a0fe-8ff279cdaf75",
          meetingId: "{{$meetingId}}",

          containerId: "video_play_area",
          
          micEnabled: false,
          webcamEnabled: false,
          participantCanToggleSelfWebcam: true,
          participantCanToggleSelfMic: true,
          redirectOnLeave: false,

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

          participantCanLeave: true, // if false, leave button won't be visible

          // Live stream meeting to youtube
          livestream: {
            autoStart: true,
            outputs: [
              // {
              //   url: "rtmp://x.rtmp.youtube.com/live2",
              //   streamKey: "<STREAM KEY FROM YOUTUBE>",
              // },
            ],
          },
        permissions: {
          askToJoin: false, // Ask joined participants for entry in meeting
          toggleParticipantMic: true, // Can toggle other participant's mic
          toggleParticipantWebcam: true, // Can toggle other participant's webcam
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
        "https://sdk.videosdk.live/rtc-js-prebuilt/0.1.5/rtc-js-prebuilt.js";
      document.getElementsByTagName("head")[0].appendChild(script);
    })
    //   doc.getElementById("inner_head").appendChild(script);
    </script>
</body>
</html>
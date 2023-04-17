
<style>
    #videosdk {
        width: 100vw;
        height: 100vh;
    }
</style>

<!-- <div id="video"></div> -->

<script>
    window.addEventListener('DOMContentLoaded', (event) => {
        var script = document.createElement("script");
        script.type = "text/javascript";
        //
        script.addEventListener("load", function(event) {
            // Initialize the factory function
            const meeting = new VideoSDKMeeting();

            // Set apikey, meetingId and participant name
            const apiKey = "47f76aef-bd6e-4741-9fa4-2e1551113a34"; // generated from app.videosdk.live
            const name = "{{Auth::user()->name}}";
            const user_type = "{{Auth::user()->type}}";

            const permissions = {
                askToJoin: true, // Ask joined participants for entry in meeting
                toggleParticipantMic: false, // Can toggle other participant's mic
                toggleParticipantWebcam: false, // Can toggle other participant's webcam
                toggleLivestream: false,
                changeLayout: false,
                drawOnWhiteboard: false,
                toggleWhiteboard: false,
                toggleRecording: false,
                pin: false,
                removeParticipant: false,
                endMeeting: false,
                screenShareEnabled: false,
                drawOnWhiteboard: true,
                toggleWhiteboard: true, 
                // toggleHls: true,
            };

            // Set permissions for speaker user type
            if (user_type === "speaker" || user_type === "attendee" || user_type === "exhibiter" || user_type === "delegate") {
                permissions.askToJoin = false;
                permissions.toggleParticipantMic = true;
                permissions.toggleParticipantWebcam = true;
                permissions.toggleLivestream = false;
                permissions.changeLayout = true;
                permissions.drawOnWhiteboard = true;
                permissions.toggleWhiteboard = true;
                permissions.toggleRecording = true;
                permissions.pin = true;
                permissions.removeParticipant = true;
                permissions.participantCanToggleRecording = true;
                permissions.canCreatePoll = true;
                permissions.endMeeting = true;
                permissions.screenShareEnabled = true;
                permissions.toggleParticipantMode = true;
                permissions.toggleHls = false;                
            }

            const config = {
                name: name,
                apiKey: "47f76aef-bd6e-4741-9fa4-2e1551113a34",
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

                hls: {
                    enabled: false,
                    autoStart: false,
                    theme: "LIGHT", // DARK || LIGHT || DEFAULT
                },
                

                recording: {
                        enabled: false,
                        webhookUrl: "https://www.videosdk.live/callback",
                        // awsDirPath: `/meeting-recordings/${meetingId}/`, // Pass it only after configuring your S3 Bucket credentials on Video SDK dashboard
                        autoStart: false,
                        theme: "DARK", // DARK || LIGHT || DEFAULT

                        layout: {
                            type: "GRID", // "SPOTLIGHT" | "SIDEBAR" | "GRID"
                            priority: "SPEAKER", // "SPEAKER" | "PIN",
                            gridSize: 6,
                        },
                        },
                participantCanToggleRecording: false,

                branding: {
                    enabled: false,
                    // logoURL:
                    // "https://dfnvrl6dq2wfj.cloudfront.net/uploads/zS5ITKgKnQ58bHVQGA8YtR3qNEKfSRRSEgwQC9L7.gif", // Add the event event
                    // name: "Eventsibles",
                    poweredBy: false,
                },

                theme: "LIGHT", // DARK || LIGHT || DEFAULT

                participantCanLeave: true, // if false, leave button won't be visible

                // Live stream meeting to youtube
                livestream: {
                    autoStart: false,
                    enabled: false,
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
                permissions: permissions,

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
        "https://sdk.videosdk.live/rtc-js-prebuilt/0.3.23/rtc-js-prebuilt.js";
      document.getElementsByTagName("head")[0].appendChild(script);
    })
    //   doc.getElementById("inner_head").appendChild(script);
    </script>

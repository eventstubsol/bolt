<!DOCTYPE html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <style>
        body{
            margin: 0;
            padding: 0;
            overflow: hidden;
            height: 100vh;
            width: 100vw;
            position: relative;
        }
        /* .embed-container {
            position: relative;
            padding-bottom: 56.25%;
            height: 0;
            overflow: hidden;
            max-width: 100vw;
        }
        .embed-container iframe{
            position: absolute;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
        } */

        body.buggy .embed-container {
            /* overflow: auto; 
            position: relative; 
            height: 100%;
            max-height:90vh;
            left: 5%;
            top: 5%; */
        }

        body.buggy iframe {
            width: 90vw;
            margin-left: 10%;
            position: relative; 
        }
        /**/
    </style>
</head>
<body>
<iframe src="https://player.vimeo.com/video/{{ $videoId }}?autoplay=1" width="640" height="360" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>

<script type="text/javascript">
    let isIOS = /iPad|iPhone|iPod/.test(navigator.platform) || (navigator.platform === 'MacIntel' && navigator.maxTouchPoints > 1);
    if(isIOS){
        document.querySelector('body').classList.add('buggy');
    }
</script>
</body>
</html>
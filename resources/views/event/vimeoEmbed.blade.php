<!DOCTYPE html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <style>
        body{
            margin: 0;
            padding: 0;
            overflow: hidden;
        }
        iframe{
            width: 100vw;
            height: 100vh;
        }
        body.buggy iframe {
            width: 90vw;
            margin-left: 10%;
            position: relative; 
        }
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
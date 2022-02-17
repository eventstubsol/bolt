<!DOCTYPE html>
<head>
    <title>Zoom</title>
    <meta charset="utf-8" />
    <link type="text/css" rel="stylesheet" href="https://source.zoom.us/1.9.1/css/bootstrap.css" />
    <link type="text/css" rel="stylesheet" href="https://source.zoom.us/1.9.1/css/react-select.css" />
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <style>
        #participant-window{
            max-height: 70vh;
        }
        .participant-scrollbar{
            max-height: 50vh;
            max-height: calc(70vh - 70px);
        }
        .participants-ul{
            padding-bottom: 130px;
            padding-bottom: calc(55px);
        }
        .participants-footer .bottom{
            background: #fff;
            border-top: 1px solid #cccccc;
            box-shadow: 0 -1px 5px 0 #ddd;
        }
        body{
            transform: translateY(0);
            min-width:100vw !important;
            max-width:100vw !important;
            -webkit-overflow-scrolling: touch;
            overflow:scroll;
        }
        body{
            margin: 0;
            padding: 0;
            overflow: hidden;
            height: 100vh;
            width: 100vw;
            overflow: hidden;
            position: relative;
        }
        .embed-container {
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
        }

        body.buggy .embed-container {
            overflow: auto; 
            position: relative; 
            height: 100%;
            max-height:90vh;
            left: 5%;
            top: 5%;
        }

        body.buggy .embed-container iframe {
            position:relative;
            border: 0 !important;
            width: 100%;
            max-height:100%;
        }
    </style>
</head>
<body>
<script src="https://source.zoom.us/1.9.1/lib/vendor/react.min.js"></script>
<script src="https://source.zoom.us/1.9.1/lib/vendor/react-dom.min.js"></script>
<script src="https://source.zoom.us/1.9.1/lib/vendor/redux.min.js"></script>
<script src="https://source.zoom.us/1.9.1/lib/vendor/redux-thunk.min.js"></script>
<script src="https://source.zoom.us/1.9.1/lib/vendor/jquery.min.js"></script>
<script src="https://source.zoom.us/1.9.1/lib/vendor/lodash.min.js"></script>
<script src="https://source.zoom.us/zoom-meeting-1.9.1.min.js"></script>
<script src="{{ asset("js/zoom/tool.js") }}"></script>
<script src="{{ asset("js/zoom/meeting.js") }}"></script>

<script type="text/javascript">
    let isIOS = /iPad|iPhone|iPod/.test(navigator.platform) || (navigator.platform === 'MacIntel' && navigator.maxTouchPoints > 1);
    if(isIOS){
        document.querySelector('body').classList.add('buggy');
    }
</script>
</body>
</html>
@php
$user = Auth::user();
@endphp
<!doctype html>
<html lang="en">

<head>
    <style>
        #announce_body{
            height: 200px;
            overflow-y: scroll;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ getFieldId('title', $event_id,$event_name) }}</title>
     {{-- App favicon --}}
     <link rel="shortcut icon" href="{{ assetUrl(getFieldId('favicon',$event_id)) }}?v=3">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" type="text/css">
    <link href={{ asset('assets/libs/select2/css/select2.min.css') }} rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('event-assets/YouTubePopUp/YouTubePopUp.css') }}">
    <style>  
        .loader span,
        .loader:after {
        background: #233c77 !important;
        }

        .loader:before {
        border-color: #233c77 !important;
        }

        #photo-capture-2 {
            width: 100%;
            height: 100%;
        }
        #videosdk-frame{
              z-index: 39;
              position: relative;
            }

        #photo-gallery-2 {
            width: 100%;
            height: 100%;
        }

        .menu-custom .menu li a .menu-icon.courses {
            background-image: url(/assets/images/menu/final/guide.png);
        }

        .menu-custom .menu li a:hover .menu-icon.courses {
            background-image: url(/assets/images/menu/final/guide.png);
        }

        .full-width-videos {
            width: 100vw;
            object-fit: unset;
            display: block;
            height: 100vh;
        }

        .booth-bg {
            object-fit: unset;
            height: 100vh;
        }

        body.auth .container {
            padding: 0px;
        }

        .side-navigation__list-item__title {
            opacity: 0 !important;
        }

        .app-footer__credit h4 {
            opacity: 0 !important;
        }

        @media only screen and (max-device-width: 867px) {
            .theme-chat.right-bar#chat-container {
                min-width: 90% !important;
            }
            .menu img{
                display: inline-block;
            }
            .YouTubePopUp-Content iframe{
                height: 243px!important;
            }
        }

        .tab-content .nav-justified .nav-item {
            min-width: max-content;
            max-width: 25%;
            margin-top: 15px;
        }

        .tab-content .nav-justified .nav-item:nth-child(1) a {
            background: #ff7549;
            color: #fff;
        }

        .tab-content .nav-justified .nav-item:nth-child(2) a {
            background: #1b9e84;
            color: #fff;
        }

        .tab-content .nav-justified .nav-item:nth-child(3) a {
            background: #233c77;
            color: #fff;
        }

        .tab-content .nav-justified .nav-item:nth-child(4) a {
            background: #921d1f;
            color: #fff;
        }

        .tab-content .nav-justified .nav-item:nth-child(5) a {
            background: #6d2e5c;
            color: #fff;
        }

        .tab-content .nav-justified .nav-item:nth-child(6) a {
            background: #050708;
            color: #fff;
        }

        .tab-content .nav-justified .nav-item:nth-child(7) a {
            background: #f06031;
            color: #fff;
        }

        .tab-content .nav-justified .nav-item:nth-child(8) a {
            background: #1b7765;
            color: #fff;
        }

        .tab-content .nav-justified .nav-item:nth-child(9) a {
            background: #4763a9;
            color: #fff;
        }

        .tab-content .nav-justified .nav-item:nth-child(10) a {
            background: #563d3d;
            color: #fff;
        }

        .tab-content .nav-justified .nav-item a.active {
            background: none;
            color: #00a15f;
            border: 1px solid #00a15f;
        }

        .nav-justified .nav-item {
            min-width: max-content;
            margin: 4px 0;
        }

        .schedule-pdf {
            margin: 7px 0 !important;
            padding: 5px 13px;
            border: 1px solid silver;
            border-radius: 5px;
            display: flex;
            flex-wrap: wrap;
        }

        @media (min-width:992px) {

            .modal-lg,
            .modal-xl {
                max-width: 1024px
            }
        }

        @media (max-width: 991.98px) {
            .page {
                padding: 0 !important;
                min-height: 99% !important;
            }

            body {
                padding: 0 !important;
                min-height: 99% !important;
            }
        }

        @media (max-width: 1500px) {
            .right-bar-enabled .theme-chat.right-bar#chat-container {
                min-width: 70% !important;
            }
        }

        @media (max-width: 1024px) {
            .right-bar-enabled .theme-chat.right-bar#chat-container {
                min-width: 90% !important;
                max-width: 100% !important;
            }
        }

        .theme-chat.right-bar#chat-container {
            transform: translateY(200%) !important;
        }

        .right-bar-enabled .theme-chat.right-bar#chat-container {
            transform: translateX(0) !important;
            opacity: 1;
        }

        @media (max-width: 900px) {
            .right-bar-enabled .theme-chat.right-bar#chat-container {
                min-width: 100% !important;
                top: 0 !important;
                bottom: 0 !important;
                right: 0 !important;
                left: 0 !important;
                border-radius: 0 !important;
                transform: translateY(200%) !important;
            }

            .right-bar-enabled .theme-chat.right-bar#chat-container {
                min-width: 100% !important;
                max-width: 100% !important;
            }

            .right-bar-enabled .theme-chat.right-bar#chat-container {
                transform: translateX(0) !important;
                opacity: 1;
            }

            .theme-chat.right-bar#chat-container .page-int-wrapper .ccl-left-panel {
                width: 200px !important;
                max-width: 200px !important;
            }

            .theme-chat.right-bar#chat-container .chat-ppl-listitem .chat-ppl-thumbnail-wrap {
                width: 30px !important;
                height: 30px !important;
            }

            .theme-chat.right-bar#chat-container .chat-ppl-listitem .chat-ppl-thumbnail-wrap img {
                width: 30px !important;
            }

            .theme-chat.right-bar#chat-container .chat-ppl-listitem .chat-ppl-listitem-dtls .chat-ppl-listitem-name {
                font-size: 12px !important;
            }

            .theme-chat.right-bar#chat-container .chat-ppl-listitem .chat-ppl-listitem-dtls .chat-ppl-listitem-txt {
                font-size: 10px !important;
            }

            .theme-chat.right-bar#chat-container .chat-ppl-listitem .chat-ppl-listitem-time {
                display: none !important;
            }

            .theme-chat.right-bar#chat-container .chat-ppl-listitem {
                padding: 8px 8px 0 !important;
            }
        }

        body.page::after {
            content: '';
            position: absolute;
            background: #000;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: -1;
            opacity: 0.5
        }

        .device-orentation.disabled {
            display: none;
        }

        .device-orentation .inner {
            position: relative;
            min-width: 300px;
            pointer-events: auto;
        }

        .device-orentation {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 999999;
            background: rgba(0, 0, 0, 0.7);
            padding: 30px;
            overflow: hidden;
        }

        .device-orentation.disabled {
            opacity: 0;
            display: none;
            pointer-events: none;
        }

        .device-orentation.disabled .inner {
            transform: translateY(10%);
        }

        .device-orentation .inner {
            display: inline-flex;
            padding: 20px 25px;
            text-align: center;
            background: #fff;
            box-shadow: 0px 2.76726px 2.21381px rgba(0, 0, 0, 0.0196802), 0px 6.6501px 5.32008px rgba(0, 0, 0, 0.0282725), 0px 12.5216px 10.0172px rgba(0, 0, 0, 0.035), 0px 22.3363px 17.869px rgba(0, 0, 0, 0.0417275), 0px 41.7776px 33.4221px rgba(0, 0, 0, 0.0503198), 0px 100px 80px rgba(0, 0, 0, 0.07);
            border-radius: 4px;
            overflow: hidden;
            transition: ease all 0.3s;
            opacity: 1;
            transform: translateY(0%);
            pointer-events: none;
            max-width: 400px;
            flex-direction: column;
        }

        .device-orentation .inner p {
            margin-top: 15px;
            font-size: 14px;
            font-weight: 400;
            color: #111a348c;
        }

        .modal {
            overflow-x: hidden;
            overflow-y: auto;
        }

        #profile-app .mdc-chip-set .mdc-chip,
        #view-profile-modal .mdc-chip-set .mdc-chip {
            background: #951e34 !important;
        }

        .col-md-6 .card-box {
            max-height: 455px;
            overflow: hidden;
            position: relative;
        }

        .col-md-6 .card-box .full-profile {
            display: block !important;
        }

        .full-profile {
            text-align: center;
            width: 92%;
            display: none;
            position: absolute;
            bottom: 0;
            left: 13px;
            cursor: pointer;
            height: 10%;
            font-weight: 700;
            background: white;
            z-index: 2;
        }

        .card-box.text-center .main-heading {
            font-size: 18px;
            font-weight: 900;
        }

        .custom-navpills .nav-link {
            border-width: 2px;
            border-style: solid;
            border-color: #971b23;
            font-weight: 800;
            color: #525252;
            background: none !important;
        }
        #skip_flyin{
            position: absolute;
            z-index: 9;
            top: 10%;
            right: 2%;
        }

        #chat-toggle {
            display: none !important;
        }

        .app__messenger {
            min-height: 0 !important;
        }

        .booth_directory_item {
            color: #6c757d !important;
            border: 1px solid;
            padding: 5px;
        }

        .expo_hall_list {
            width: 50%;
        }

        .boothroomlist {
            display: flex;
            flex-direction: row;
            padding: 23px;
        }

        .booth_directory_item_heading {
            color: #6c757d !important;
            font-size: 30px;
            font-weight: 800;
            border: 2px solid;
            padding: 4px;

        }

        .css-1gvrc8 {
            height: auto !important;
        }
        #video_play_area{
            width: 100%;
            height: 100%;
            position: absolute;
            z-index: 2;
        }
        .hidden{
            display: none !important;
        }
        .custom-dropdown a{
            cursor: pointer;
        }

        .loader-logo img {
            width: auto;
            max-width: 100%;
            margin: 0 auto;
        }
        
        .loaderSection {
            width: 100%;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            flex-direction: column;
            z-index: 2119;
            background: #00000085;
        }
        .loader-logo{
            width: 300px;
        }

    </style>
    {{-- Notification Modal --}}
    <!-- Small modal -->
    <div style="z-index:99999" class="consent-notification hide-on-exterior"  id="notification-smallModal">
    <h4 id="notification-head"></h4>
    <p id="notification-body" ></p>
    <div class="flex">
        <div class="notification-actions">

        </div>
        <button class="btn theme-btn primary mr-2" onclick="offNotification()" style="float:right" data-consent="true">Close</button>
    </div>
    </div>
      
        
     <!-- Icons -->
    <link href={{ asset('assets/css/icons.min.css') }} rel="stylesheet" type="text/css" />
    <script>
        var ua = window.navigator.userAgent;
        var msie = ua.indexOf("MSIE ");
        if (msie > 0) // If Internet Explorer, return version number
        {
                showMessage("For an immersive experience on our platform please use some modern browser like Chrome, Safari or Firefox.",'error');
        }
    </script>
    <!-- Onesignal -->
    <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js"></script>
    <script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js"></script>
    <script>
        window.OneSignal = window.OneSignal || [];
        OneSignal.push(function() {
            // Occurs when the user's subscription changes to a new value.
            OneSignal.setExternalUserId("{{ Auth::user()->id }}");
            OneSignal.sendTags({
                "user_type": "{{ $user->type }}",
                "name": "{{ $user->name }}",
            });
            OneSignal.on('subscriptionChange', function(isSubscribed) {
                console.log("Subscription changed", isSubscribed)
                if (isSubscribed) {
                    OneSignal.getUserId().then(function(userId) {
                        $.ajax({
                            url: "{{ route('registerDevice') }}",
                            method: "POST",
                            data: {
                                device_id: userId,
                                _token: "{{ csrf_token() }}",
                            },
                            success: function(response) {
                                if (response && response.success) {
                                    console.log("Device Saved");
                                } else {
                                    console.log("Could not save device id.");
                                }
                            },
                            error: function() {
                                console.log("Could not save device id.");
                            },
                        });
                    });
                }
            });
            OneSignal.init({
                appId: "{{ env('ONESIGNAL_APP_ID') }}",
                // notifyButton: {
                //     enable: true,
                // },
                allowLocalhostAsSecureOrigin: {{ env('APP_DEBUG', true) ? 'true' : 'false' }}, //Making it false when the app goes into production
            });
        });
    </script>
    @include("includes.styles.sweetalert2")
    @include("includes.styles.fileUploader")
    <!-- Custom -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link href="{{ asset('/dflip/css/dflip.css') }}?cb=21872367628472" rel="stylesheet" type="text/css">
    <link href="{{ asset('/dflip/css/themify-icons.css') }}?cb=21872367628472" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}?cb=21872367628472" type="text/css">
    <link rel="stylesheet" href="{{ asset('event-assets/css/app.css') }}?cb=21872367628472">
    <link href="{{ asset('assets/css/custom.css') }}?v=21872367628472" rel="stylesheet" type="text/css" />
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ api('GA_TRACKING_ID',$event_id) }}"></script>
    @php
        $user = Auth::user();
    @endphp
    <script>
        const GA_MEASUREMENT_ID = '{{ env('GA_TRACKING_ID') }}';
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', GA_MEASUREMENT_ID);
        gtag('set', {
            'user_id': '{{ $user->id }}'
        }); // Set the user ID using signed-in user_id.

        function recordEvent(type, event_label, event_category) {
            if (typeof event_category === "undefined") {
                event_category = "general"
            }
            gtag('event', type, {
                event_category,
                event_label
            });
        }
        window.recordEvent = recordEvent;
        let lastPage = false;
        let currentPage = false;

        function recordPageView(page_path, page_title = "",type="",typeloc=null) {
            console.log(type);
            if (page_path === "go_back" && lastPage) {
                console.log("Going Back");
                page_path = lastPage.page_path;
                page_title = lastPage.page_title;
            } else {
                lastPage = currentPage;
                currentPage = {
                    page_path,
                    page_title,
                };
                $.post("{{ route('set.Location') }}",{'add':0,"type":type,"typeloc":typeloc},function(response){
                    console.log(response);
                });
            }
            gtag('config', GA_MEASUREMENT_ID, {
                page_path,
                page_title
            });
        }

        function createGroup(room) {
            let id = {{ $event->id }};
            $.ajax({
                url: "{{ route('createGroup') }}",
                data: {
                    room,
                    id
                },
                success: function(response) {
                    if (response) {
                        console.log(response);
                        console.log("Chat Created");
                    }
                },
            });
        }
    </script>
    <script>
        (function(h, o, t, j, a, r) {
            h.hj = h.hj || function() {
                (h.hj.q = h.hj.q || []).push(arguments)
            };
            h._hjSettings = {
                hjid: 1993421,
                hjsv: 6
            };
            a = o.getElementsByTagName('head')[0];
            r = o.createElement('script');
            r.async = 1;
            r.src = t + h._hjSettings.hjid + j + h._hjSettings.hjsv;
            a.appendChild(r);
        })(window, document, 'https://static.hotjar.com/c/hotjar-', '.js?sv=');
    </script>
</head>

<body class="custom-theme">
    <div id="skip_flyin" style="display:none">
        <button class="btn btn-primary">Skip</button>
    </div>
    <div class="consent-notification hide-on-exterior" >

        <h4 id="notification-head"></h4>
    
        <p id="notification-body" >We'll send you  notifications about the event, chats and other cool stuff. Sounds good?</p>
    
        <div class="flex">
    
            <button class="btn theme-btn primary mr-2" onclick="offNotification()" style="float:right" data-consent="true">Close</button>
    
        </div>
    
        </div>
    {{-- <div class="loader"></div> --}}
    
    <div class="loader loaderSection ">
        <div class="loader-logo">
            <img src="{{ assetUrl(getFieldId('logo',$event_id)) }}" alt="">
        </div>
        <img  src="{{ assetUrl($loader->load_class) }}" class="w-25 mt-5" alt="">
    </div>
    @php
        $boothConfig = [];
        foreach ($booths as $booth) {
            $boothConfig[$booth->id] = $booth->name;
        }
        
    @endphp
    <div class="device-orentation disabled">
        <div class="inner">
            <div class="icon">
                <svg id="Capa_1" enable-background="new 0 0 512 512" height="32" viewBox="0 0 512 512" width="32"
                    xmlns="http://www.w3.org/2000/svg">
                    <g>
                        <path
                            d="m356.225 417v-76-55-186c-49.254 0-88.509-10-137.764-10-50.745 0-101.49 0-152.236 0v337h150.902c49.7 0 89.399-10 139.098-10z"
                            fill="#e9f6ff" />
                        <path d="m66.225 166h120v30h-120z" fill="#d2e4fd" />
                        <path d="m66.225 226h75v30h-75z" fill="#d2e4fd" />
                        <path
                            d="m356.225 64.5c0-35.565-28.935-59.5-64.5-59.5l-75.5-5h-85.5c-35.565 0-64.5 28.935-64.5 64.5v25.5h150l140-5z"
                            fill="#4c607e" />
                        <path
                            d="m66.225 447.5c0 35.565 28.935 64.5 64.5 64.5h85.5l75.5-5c35.565 0 64.5-23.935 64.5-59.5v-22.5l-140-5h-150z"
                            fill="#4c607e" />
                        <path d="m216.225 420h150v-79-55-196h-150z" fill="#d2e4fd" />
                        <path d="m301.725 0h-85.5v90h150v-25.5c0-35.565-28.935-64.5-64.5-64.5z" fill="#374965" />
                        <path d="m216.225 512h85.5c35.565 0 64.5-28.935 64.5-64.5v-27.5h-150z" fill="#374965" />
                        <path
                            d="m440.775 211.377-37.427-37.426-37.123 32.123-37.123-37.123-42.427 42.426 37.124 37.123-37.124 37.123 42.427 42.426 37.123-37.123 37.123 32.123 37.427-37.426-37.124-37.123z"
                            fill="#e58f22" />
                        <path
                            d="m445.775 285.623-37.124-37.123 37.124-37.123-42.427-42.426-37.123 37.123v84.852l37.123 37.123z"
                            fill="#df6426" />
                    </g>
                </svg>
            </div>
            <p>{{ getFieldId('mobilemessage',$event_id, 'For an immersive experience, please login using a Tablet Device/Laptop/PC Or switch to landscape mode in your mobile phone.') }}
            </p>
        </div>
    </div>
    @include("event.modules.Modals")

    @include("event.modules.Navbar")
    @include("event.modules.Menubar")
    @include("event.modules.Sidebar")


    @if (isOpenForPublic('photo-booth'))
        @include("event.modules.Booths.PhotoBooth")
        @include("event.modules.Booths.PhotoBoothNew")
    @endif

    @if (isOpenForPublic('library'))
        @include("event.modules.Resources")
    @endif

    @include("event.modules.Exterior")
    @include("event.modules.Lobby")

    @include("event.modules.Booths.BoothList")

    @include("event.modules.Booths.BoothDirectory")

    @include("event.modules.Booths.ExpoHall")

    @include("event.modules.Sessions")
    @include("event.modules.Pages")

    @include("event.modules.Booths.SingleBooth")

    @include("event.modules.Leaderboard")
    @include("event.modules.MuseumList")

    @include("event.modules.MuseumSingle")

    @include("event.modules.VimeoModal")


    @if (isOpenForPublic('swagbag'))
        @include("event.modules.Report")
    @endif

    @if (isOpenForPublic('meet-and-greet'))
        @include("event.modules.MeetGreet")
    @endif

    @include("event.modules.Faq")

    @if (isOpenForPublic('swagbag'))
        @include("event.modules.Swagbag")
    @endif


    @if (isOpenForPublic('lounge'))
        @include("event.modules.Lounge")
    @endif

    @include("event.modules.SchedulePopup")
    @include("event.modules.WorkshopPopup")
    @include("event.modules.Personalagenda")
    @include("event.poll")
    @include("event.qna")
    @include("event.announce")
    @include("event.toast")

    @include("event.modules.Profile")
    @if(isset($chat_app))
        @include("event.modules.chat")
    @endif
    @include("event.modules.networking")

    @include("event.modules.Confirmation")

    @include("event.modules.webinar")
    @include("event.modules.workshop")

    @if (isOpenForPublic('caucus'))
        @include("event.modules.caucusRoom")
    @endif

    @include("event.modules.infodesk")

    {{-- Information Dialog - for opening of booth rooms at specific timings && also for booth enquiry - DO NOT REMOVE --}}
    @include("event.modules.Information")

    @include("event.modules.Delegates")
    @include("event.modules.ArchiveVideos")

    @include("event.modules.ByLaws")
    @include("event.modules.FlyIn")


    <div id="chat_div"></div>
    <div id="announce_div" class="d-flex justify-content-end">
        <div class="modal fade bd-example-modal-sm" id="myModal" tabindex="-1" role="dialog"
            aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm" style="margin-left: 80%;margin-top:29%">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="annouce_head"><i class="fa fa-bullhorn" aria-hidden="true"></i>
                            &nbsp;Announcement</h4>
                    </div>
                    <div class="modal-body" id="announce_body">
                        
                    </div>
                
            
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal" id="seenAnn"
                    onclick="AnnouceChecked(this)">Close</button>
            </div>
        </div>
    </div>
    </div>
    </div>
    <script defer src="https://widget-js.cometchat.io/v2/cometchatwidget.js"></script>

    <script>
        // $(document).ready(function(){
        //     $('#notification-smallModal').addClass('enable');
        // });
        (function() {
            let deviceElem = document.querySelector('.device-orentation');
            let deviceElemClose = document.querySelector('.device-orentation .close');

            function isMobile() {
                let check = false;
                (function(a) {
                    if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i
                        .test(a) ||
                        /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i
                        .test(a.substr(0, 4)))
                        check = true;
                })(navigator.userAgent || navigator.vendor || window.opera);
                return check;
            }

            function isProtrait() {
                return !window.screen.orientation.angle;
            }

            window.addEventListener("orientationchange", function(event) {
                (isMobile() && isProtrait()) ? deviceElem.classList.remove('disabled'): deviceElem.classList
                    .add('disabled');
            });

            window.addEventListener("DOMContentLoaded", function() {
                (isMobile() && isProtrait()) ? deviceElem.classList.remove('disabled'): deviceElem.classList
                    .add('disabled');
            }, false);
        })();
    </script>

    <script>
        window.openUserChat = (userid) => {
            console.log(userid)
            CometChatWidget.chatWithUser(userid);
            CometChatWidget.openOrCloseChat(true);
        }
        // console.log( {!! json_encode(getSuggestedTags()) !!} );
        const config = {
            homepage: "{{ $event->home_page }}",
            baseRoute: "{{ url('/') }}",
            videoSDK: "{{route('videosdk',['meetingId'=>':id','containerId'=>'video_play_area'])}}",
            addParticipant: "{{route('addParticipant',['subdomain'=>$event_name,'table'=>':id','user'=>$user->id])}}",
            removeParicipant: "{{route('removeParticipant',['subdomain'=>$event_name,'table'=>':id','user'=>$user->id])}}",
            updateLounge: "{{route('updateLounge',['subdomain'=>$event_name])}}",
            leaderboard: "{{ route('leaderboard',['subdomain'=>$event_name,'id'=>$event_id]) }}",
            token: "{{ csrf_token() }}",
            trackEvent: "{{ route('trackEvent') }}",
            getswagBag: "{{ route('getSwagBag') }}",
            addtoBag: "{{ route('addToBag') }}",
            subscription_raw: "{{ route('subscription_raw',['subdomain'=>$event_name]) }}",
            deletefromBag: "{{ route('deleteFromBag') }}",
            boothDetails: "{{ route('boothDetails', ['booth' => 'BID']) }}",
            delegateList: "{{ route('delegateList') }}",
            socketUri: "{{ env('SOCKET_URI') }}",
            userId: "{{ $user->id }}",
            userType: "{{ $user->type }}",
            userName: "{{ $user->name }}",
            userEmail: "{{ $user->email }}",
            userCompany: "{{ $user->company_name }}",
            roomSlidoConfig: {!! json_encode(getSlidoConfig()) !!},
            booths: {!! json_encode($boothConfig) !!},
            saveprofile: "{{ route('saveprofile') }}",
            cometChat: {
                appID: "{{ env('COMET_CHAT_APP_ID') }}",
                region: "{{ env('COMET_CHAT_REGION') }}",
                authKey: "{{ env('COMET_CHAT_AUTH_KEY') }}",
                supportChatUser: "{{ SUPPORT_USER }}",
            },
            candidateBooth: "{{ CANDIDATES_BOOTH_ROOM }}",
            auditoriumEmbed: "{{ route('auditoriumEmbed') }}",
            meetEmbed: "{{ route('meetEmbed') }}",
            checkCurrentSession: "{{ route('currentSession') }}",
            profileImage: "{{ $user->profileImage ? $user->profileImage : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) }}",
            profile: {!! json_encode(getProfileDetails()) !!},
            profileURL: '{{ route('event.profile') }}',
            profileUpdateURL: '{{ route('updateProfile') }}',
            suggestedContactsURL: '{{ route('suggestedContacts') }}',
            attendeesURL: '{{ route('attendeesURL') }}',
            company_sizes: {!! json_encode(getFilters('company_size')) !!},
            geography: {!! json_encode(getFilters('Geographical Preference')) !!},
            others: {!! json_encode(getFilters('Top 3  Industries')) !!},
            practice_areas: {!! json_encode(getFilters('Practice Areas')) !!},
            cetrifications: {!! json_encode(getFilters('Certifications')) !!},
            firm_size: {!! json_encode(getFilters('Firm Size')) !!},
            ownership: {!! json_encode(getFilters('Ownership')) !!},
            mytags: {!! json_encode(getFilters($event_id)) !!},
            sendConnectionURL: '{{ route('sendConnectionRequest') }}',
            updateConnectionURL: '{{ route('updateConnectionRequest') }}',
            addToContactURL: '{{ route('addToContacts') }}',
            removeContactURL: '{{ route('removeContact') }}',
            savedContactsURL: '{{ route('savedContacts') }}',
            connectionRequestsURL: '{{ route('myConnectionRequests') }}',
            contentTickerURL: '{{ route('contentTicker') }}',
            tagSuggestions: {!! json_encode(getSuggestedTags()) !!},
            showInterestURL: "{{ route('showInterestInBooth', ['booth' => 'BID']) }}",
            exportContactsURL: "{{ route('exportContacts') }}",
            mailContactsURL: "{{ route('sendContactsOnMail') }}",
            fetchUserDetails: "{{ route('fetchUserDetails') }}",
            subscribeToEvent: "{{ route('event.subscribe', ['event' => 'EVENT_ID']) }}",
            unsubscribeToEvent: "{{ route('event.unsubscribe', ['event' => 'EVENT_ID']) }}",
            byLawsURL: "{{ route('byLaws.get') }}",
            byLawsSubmissionURL: "{{ route('byLaws.submit') }}",
            byLawsOptionSubmissionURL: "{{ route('byLaws.optionSubmit') }}",
            roomNames: {!! json_encode(WORKSHOP_ROOM_NAMES) !!}
        };
        const assetUrl = url => "{{ assetUrl('') }}" + url;
        window.assetUrl = assetUrl;
        window.config = config;
    </script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('assets/js/vendor.min.js') }}?cb=21872367628472"></script>
    <script src="{{ asset('assets/js/app.min.js') }}?cb=21872367628472"></script>
    <script src="{{ asset('event-assets/js/routie.min.js') }}?cb=21872367628472"></script>
    <script src="{{ asset('event-assets/js/app.js') }}?cb=21872367628472"></script>
    <script src="{{ asset('/js/chat/app.js') }}?cb=21872367628472"></script>
    <!-- <script src="{{ asset('/js/by-laws/App.js') }}?cb=21872367628472"></script> -->
    <script src="{{ asset('/js/profile/index.js') }}?cb=21872367628472"></script>
    <script src="{{ asset('event-assets/YouTubePopUp/YouTubePopUp.jquery.js') }}?cb=21872367628472"></script>
    <script src="{{ asset('event-assets/YouTubePopUp/PopupInit.js') }}?cb=21872367628472"></script>
    @if (isOpenForPublic('polls'))
        @include("event.poll")
    @endif
    <style>
        fieldset.scheduler-border {
            border: 1px groove #ddd !important;
            padding: 0 1.4em 1.4em 1.4em !important;
            margin: 0 0 1.5em 0 !important;
            -webkit-box-shadow: 0px 0px 0px 0px #000;
            box-shadow: 0px 0px 0px 0px #000;
        }

        legend.scheduler-border {
            font-size: 1.2em !important;
            font-weight: bold !important;
            text-align: left !important;
        }

    </style>
    <script>
        function oneSignalJsInit() {
            OneSignal.push(function() {
                OneSignal.showNativePrompt();
            });
        }

        $(document).ready(function() {
            setInterval(function() {
                $.ajax({
                    url: "{{ route('confirmLogin',['subdomain'=>$event_name]) }}",
                    success: function(response) {
                        if (response && !response.loggedIn) {
                            window.location.reload();
                        }
                    },
                });
            }, 15000);
            var countT = 1;
            // setInterval(function() {
            //     $('#announce_body ').empty();
            //     $.ajax({
            //         url: "{{ route('announcement.popUp',$event_id) }}",
            //         success: function(result) {
            //             if (result != null) {
                            
            //                 $.each(result, function(index, value) {
            //                   $('#announce_body ').append("<fieldset class='scheduler-border'><b>" +value.subject +"</b><legend class='scheduler-border'></legend><ul class='list-group'><li class='list-group-item'>" +value.announce +"</li></ul></fieldset>");
            //                     $('#myModal').modal('toggle');
            //                     countT++;
            //                 });
            //                 $('#seenAnn').attr('data-id', countT);
            //             }
            //             else{
            //                 alert(0);
            //                 $('#myModal').modal('hide');
            //             }


            //         },
            //     });
            // }, 100000);


        });

        function AnnouceChecked(e) {
            var id = e.getAttribute('data-id');
            
            $.get("{{ route('announcement.Close') }}", {
                'id': id
            }, function(result) {
                if (result.status == 200) {
                    console.log(result.message);
                } else {
                    console.log(result.message);
                }
            });
        }

        function initJs() {
            $('body').addClass('loaded');
            let consent = localStorage.getItem('notifyConsent');
            let consentNotify = $('.consent-notification');

            if (consent === null || consent === 'skip') {
                consentNotify.addClass('enable');
                recordEvent("push_notification_consent", "Push Notifications Consent Box Shown");
            } else if (consent === 'allow') {
                oneSignalJsInit();
            }

            $('.btn[data-consent]').on('click', function() {
                let consent = $(this).data('consent');
                if (consent == "skip") {
                    localStorage.setItem('notifyConsent', 'skip');
                    recordEvent("push_notification_allow", "Push Notifications Skipped");
                } else if (consent == true) {
                    localStorage.setItem('notifyConsent', 'allow');
                    recordEvent("push_notification_allow", "Push Notifications Allowed");
                    oneSignalJsInit();
                } else {
                    recordEvent("push_notification_deny", "Push Notifications Denied");
                    localStorage.setItem('notifyConsent', 'dontallow');
                }
                consentNotify.removeClass('enable');
            });

            $('#prizes').on('slid.bs.carousel', function() {
                var $parent = $(this).parents('.d-block');
                var $prtext = $parent.find('.pr-text');
                var $cprtext = $(this).find('.active').data('prize-rank');
                $prtext.text($cprtext);
            });

            $('.faq-card .collapse').on('shown.bs.collapse', function() {
                $(this).parents('.faq-card').find('.faq-title').addClass('active');
                $(this).parents('.faq-card').siblings().find('.faq-title').removeClass('active');
                recordEvent("faq_opened", "FAQ Opened");
            });

        }
        $(document).ready(initJs);
    </script>

    <script src="{{ asset('event-assets/js/ResourceInit.js') }}"></script>

    <link rel="stylesheet" href="https://unpkg.com/simplebar@latest/dist/simplebar.css" />
    <script src="https://unpkg.com/simplebar@latest/dist/simplebar.min.js"></script>

    @include("includes.scripts.fileUploader")
    @include("includes.scripts.sweetalert2")

    {{-- Select2 init --}}
    <script src={{ asset('assets/libs/select2/js/select2.min.js') }}></script>
    <script>
        function initializeSelect() {
            $('[data-toggle="select2"]').select2({
                minimumResultsForSearch: -1
            });
        }
        $(document).ready(initializeSelect);
        const sendBtn = $("#sendEmailBtn");
        sendBtn.click(function(e) {
            e.preventDefault()
            sendBtn.text("Sending...");
            $.ajax({
                url: '{{ route('sendSwagsToEmail') }}',
                method: "GET",
                success(r) {
                    sendBtn
                        .text("Sent")
                        .removeClass("btn-primary")
                        .addClass("btn-success");

                    setTimeout(() => {
                        sendBtn
                            .text("Mail Me")
                            .addClass("btn-primary")
                            .removeClass("btn-success");
                    }, 2000);
                }
            })
        })
    </script>
    <script src="{{ asset('dflip/js/dflip.min.js') }}" type="text/javascript"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.slim.js"></script> --}}
    <script async src="https://app.popkit.club/pixel/3c26bfdb333b6fecd7284b84b0465334"></script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script>
      
      </script>
      <script>
          $(document).ready(function(){
            var slug = "{{ $event_name }}";
    
        
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;
    
        var pusher = new Pusher('{{ env("PUSHER_APP_KEY") }}', {
          cluster: 'ap2'
        });
        
        var channel = pusher.subscribe(slug);
        channel.bind('notification-sent', function(data) {
            let fullLocation = window.location.hash;
            console.log({data});
            // fullLocation = data.location;
            let hashlocation =fullLocation.split("/")[0];
            let location = hashlocation.split('#')[1];
            let location_type = fullLocation.split("/")[1];
            // let location_type = data.location_type;
            console.log(location_type);
            let consentNotify = $('.consent-notification');
            $('#notification-head').empty();
            $('#notification-body').empty();
            if(data.role == 'Attendee' || data.role == 'All'){
               if(data.location == location  && location === 'lobby'){
                   console.log("lobby");
                    $('#notification-head').html('Subject:&nbsp;'+data.title);
                    $('#notification-body').html('Message:&nbsp;'+data.message);
                    consentNotify.removeClass('enable');
                    $('#notification-smallModal').addClass('enable');
                    var count = $('.count');
                    var body = $('.notificationBody .simplebar-content');
                    var actions = $('.notification-actions');
                    if(data.url == null){
                        var appendable =  '<a href="javascript:void(0);" onclick="showNotification(this)" data-id="'+data.notify_id+'" data-title="'+data.title+'" data-message="'+data.message+'" class="dropdown-item notify-item active"><div class="notify-icon"><img src="data:image/png;base64,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" class="img-fluid rounded-circle" alt="" /> </div><p class="notify-details">'+data.title +'</p><p class="text-muted mb-0 user-msg"><small>'+ data.message +'</small></p></a>';  
                    }
                    else{
                        if(data.url.includes(window.location.hostname)){
                            var appendable =  '<a href="'+data.url+'"  data-id="'+data.notify_id+'" data-title="'+data.title+'" data-message="'+data.message+'" class="dropdown-item notify-item active"><div class="notify-icon"><img src="data:image/png;base64,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" class="img-fluid rounded-circle" alt="" /> </div><p class="notify-details">'+data.title +'</p><p class="text-muted mb-0 user-msg"><small>'+ data.message +'</small></p></a>';  
                        }else{
                            
                            var appendable =  '<a href="'+data.url+'"  data-id="'+data.notify_id+'" data-title="'+data.title+'" data-message="'+data.message+'" class="dropdown-item notify-item active"><div class="notify-icon"><img src="data:image/png;base64,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" class="img-fluid rounded-circle" alt="" /> </div><p class="notify-details">'+data.title +'</p><p class="text-muted mb-0 user-msg"><small>'+ data.message +'</small></p></a>';  
                        }
                        actions.html(`<a href=${data.url} onclick="offNotification()" class=" btn theme-btn primary mr-2"> Visit </a>`);
                    }
                    count.html(parseInt(count.text()) + 1);
                    body.append(appendable);
                    // console.log(data.title);
                    // console.log(data.message);
               }
               else if(data.location != 'lobby' && data.location_type == location_type){
                console.log("others");

                $('#notification-head').html('Subject:&nbsp;'+data.title);
                    $('#notification-body').html('Message:&nbsp;'+data.message);
                    consentNotify.removeClass('enable');
                    $('#notification-smallModal').addClass('enable');
                    var count = $('.count');
                    var body = $('.notificationBody .simplebar-content');
                    if(data.url == null){
                        var appendable =  '<a href="javascript:void(0);" onclick="showNotification(this)" data-id="'+data.notify_id+'" data-title="'+data.title+'" data-message="'+data.message+'" class="dropdown-item notify-item active"><div class="notify-icon"><img src="data:image/png;base64,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" class="img-fluid rounded-circle" alt="" /> </div><p class="notify-details">'+data.title +'</p><p class="text-muted mb-0 user-msg"><small>'+ data.message +'</small></p></a>';  
                    }
                    else{
                        var appendable =  '<a href="'+data.url+'" target="_blank" data-id="'+data.notify_id+'" data-title="'+data.title+'" data-message="'+data.message+'" class="dropdown-item notify-item active"><div class="notify-icon"><img src="data:image/png;base64,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" class="img-fluid rounded-circle" alt="" /> </div><p class="notify-details">'+data.title +'</p><p class="text-muted mb-0 user-msg"><small>'+ data.message +'</small></p></a>';  
                    }
                    count.html(parseInt(count.text()) + 1);
                    body.append(appendable);
                    // console.log(data.title);
                    // console.log(data.message);
               }
            }
           
        });
        function offNotification(){
           
            
            $('#notification-smallModal').removeClass('enable');
        }
              
          });
      </script>
</body>

</html>

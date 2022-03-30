<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ getFieldId('title', $event_id,$event_name) }}</title>
     {{-- App favicon --}}
    <link rel="shortcut icon" href="{{ assetUrl(getFieldId('favicon',$event_id)) }}?v=3">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" type="text/css">
    {{-- <link href={{ asset('assets/libs/select2/css/select2.min.css') }} rel="stylesheet" type="text/css" /> --}}
    <link rel="stylesheet" href="{{ asset('event-assets/YouTubePopUp/YouTubePopUp.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/intro.js/minified/introjs.min.css">
    @include("event.modules.style")
 
    {{-- Notification Modal --}}
    <!-- Small modal -->
    <div style="z-index:99999" class="notification-smallModal consent-notification hide-on-exterior"  id="notification-smallModal">
        <h4 id="notification-head"></h4>
        <p id="notification-body" ></p>
        <div class="d-flex">
            <div class="notification-actions">

            </div>
            <button class="btn theme-btn primary mr-2" onclick="offNotification()" style="float:right" data-consent="true">Close</button>
        </div>
    </div>
    <script>
        let isIOS = /iPad|iPhone|iPod/.test(navigator.platform) || (navigator.platform === 'MacIntel' && navigator.maxTouchPoints > 1);
        if(isIOS){
            document.querySelector('body').classList.add('custom_ios');
        }
    </script>
      
        
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
    
    @include("includes.styles.sweetalert2")
    @include("includes.styles.fileUploader")
    <!-- Custom -->
    <link href="{{ asset('/dflip/css/dflip.css') }}?cb=2187236762891" rel="stylesheet" type="text/css">
    <link href="{{ asset('/dflip/css/themify-icons.css') }}?cb=2187236762891" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}?cb=2187236762891" type="text/css">
    <link rel="stylesheet" href="{{ asset('event-assets/css/app.css') }}?cb=2187236762891">
    <link href="{{ asset('assets/css/custom.css') }}?v=2187236762891" rel="stylesheet" type="text/css" />
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ api('GA_TRACKING_ID',$event_id) }}"></script>
    @php
        $user = Auth::user();
        $gapi = App\Api::where("event_id",$event_id)->where("variable","GA_TRACKING_ID")->first();
    @endphp
    <script>
        const GA_MEASUREMENT_ID = '{{ isset($gapi)? $gapi->key : '' }}';
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
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
    {{-- Event Loader --}}
    <div class="loader loaderSection ">
        <img  src="{{ assetUrl($loader->load_class) }}" class="w-25 mt-5" alt="">
    </div>
   
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
            <p> For an immersive experience, please login using a Tablet Device/Laptop/PC Or switch to landscape mode in your mobile phone.
            </p>
        </div>
    </div>
    {{-- Custom Modals --}}
    @include("event.modules.Modals")
    
    {{-- Event Menus --}}
    @include("event.modules.Navbar")
    @include("event.modules.Menubar")
    @include("event.modules.Sidebar")

    {{-- Photobooth --}}
    @include("event.modules.Booths.PhotoBooth")

    {{-- Post --}}
    @include("event.modules.Posts.Single")
    
    {{-- PDF Library --}}
    @include("event.modules.Resources")
   
   {{-- Exterior and lobby --}}
    @include("event.modules.Exterior")
    @include("event.modules.Lobby")

    {{-- Session Rooms --}}
    @include("event.modules.Sessions")
   {{-- Pages --}}
    @include("event.modules.Pages")
    {{-- Booths --}}
    @include("event.modules.Booths.SingleBooth")

    @include("event.modules.Leaderboard")
  
  
   

    {{-- @if (isOpenForPublic('swagbag'))
        @include("event.modules.Report")
    @endif --}}


    @include("event.modules.Faq")

    @include("event.modules.Swagbag")



    @include("event.modules.SchedulePopup")
    @include("event.modules.Personalagenda")

    @include("event.modules.Profile")

    @if(isset($chat_app))
        @include("event.modules.chat")
    @endif

    @include("event.modules.networking")
    
    {{-- Swagbag Delete Confirmation --}}
    @include("event.modules.Confirmation")

    @include("event.modules.FlyIn")
    {{-- @include("event.modules.Onboarding")  --}}




    <div id="chat_div"></div>

    </div>
    </div>
    <script defer src="https://widget-js.cometchat.io/v2/cometchatwidget.js"></script>
    {{-- Script Checking user Device and orientation --}}
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
            leaderboard: "{{ route('leaderboard',['id'=>$event_id,'subdomain'=>$event_name]) }}",
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
            lobby_audio: {{ $event->lobby_audio ? true : 0}}
        };
        const assetUrl = url => "{{ assetUrl('') }}" + url;
        window.assetUrl = assetUrl;
        window.config = config;
    </script>
    {{-- <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script> --}}
    <script src="{{ asset('assets/js/vendor.min.js') }}?cb=2187236762891"></script>
    <script src="{{ asset('assets/js/app.min.js') }}?cb=2187236762891"></script>
    <script src="{{ asset('event-assets/js/routie.min.js') }}?cb=2187236762891"></script>
    <script src="{{ asset('event-assets/js/app.js') }}?cb=2187236762891"></script>
    <script src="{{ asset('/js/profile/index.js') }}?cb=2187236762891"></script>
    <script src="{{ asset('event-assets/YouTubePopUp/YouTubePopUp.jquery.js') }}?cb=2187236762891"></script>
    <script src="{{ asset('event-assets/YouTubePopUp/PopupInit.js') }}?cb=2187236762891"></script>
    <style>
    
    </style>
    <script>
    
        $(document).ready(function() {
            // setInterval(function() {
            //     $.ajax({
            //         url: "{{ route('confirmLogin',['subdomain'=>$event_name]) }}",
            //         success: function(response) {
            //             if (response && !response.loggedIn) {
            //                 window.location.reload();
            //             }
            //         },
            //     });
            // }, 30000);
            var countT = 1;
        });

        
        function initJs() {
            $('body').addClass('loaded');
        
            $('.faq-card .collapse').on('shown.bs.collapse', function() {
                $(this).parents('.faq-card').find('.faq-title').addClass('active');
                $(this).parents('.faq-card').siblings().find('.faq-title').removeClass('active');
                recordEvent("faq_opened", "FAQ Opened");
            });

        }
        $(document).ready(initJs);
    </script>
    
    {{-- Swagbag buttons setup script --}}
    <script src="{{ asset('event-assets/js/ResourceInit.js') }}"></script>

    {{-- Script and css for scrollbars --}}
    {{-- <link rel="stylesheet" href="https://unpkg.com/simplebar@latest/dist/simplebar.css" />
    <script src="https://unpkg.com/simplebar@latest/dist/simplebar.min.js"></script> --}}

    @include("includes.scripts.fileUploaderFrontend")
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
    {{-- <script async src="https://app.popkit.club/pixel/3c26bfdb333b6fecd7284b84b0465334"></script> --}}
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
            console.log(location);
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
                        if((data.url).includes(window.location.hostname)){
                            actions.html(`<a href=${data.url}  onclick="offNotification()" class=" btn theme-btn primary mr-2"> Visit </a>`);
                        }else{
                            actions.html(`<a href=${data.url} target="_blank"  onclick="offNotification()" class=" btn theme-btn primary mr-2"> Visit </a>`);
                        }
                        
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
                        if((data.url).includes(window.location.hostname)){
                            actions.html(`<a href=${data.url}  onclick="offNotification()" class=" btn theme-btn primary mr-2"> Visit </a>`);
                        }else{
                            actions.html(`<a href=${data.url} target="_blank"  onclick="offNotification()" class=" btn theme-btn primary mr-2"> Visit </a>`);
                        }
                         
                    }
                    count.html(parseInt(count.text()) + 1);
                    body.append(appendable);
                    // console.log(data.title);
                    // console.log(data.message);
               }
            }
           
        });
        
              
          });
        function offNotification(){
            $('#notification-smallModal').removeClass('enable');
        }
      </script>
</body>

</html>

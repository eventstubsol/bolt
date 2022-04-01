<style>
    #announce_body{
        height: 200px;
        overflow-y: scroll;
    }
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

        @media only screen and (max-device-width: 967px) {
            .pb-button{
                right: 112px;
            }
            .theme-chat.right-bar#chat-container {
                min-width: 90% !important;
            }
            .app__messenger{

                bottom: 24px !important;
                right: 90px !important;
            }
            .menu img{
                display: inline-block;
            }
            .YouTubePopUp-Content iframe{
                height: 243px!important;
            }
            .YouTubePopUp-Close {
                bottom: auto;
                top: 20px;
            }
        }

        .tab-content .nav-justified .nav-item {
            min-width: max-content;
            max-width: 25%;
            margin-top: 15px;
            color: #fff;
        }

        /* .tab-content .nav-justified .nav-item:nth-child(1) a {
            background: #ff7549;
            color: #fff;
        } */

        button.pb-button {
            color: {{ $event->secondary_color }} !important;
        }
        .custom-theme a{
            color: {{ $event->secondary_color }} ;
        }

        /* .tab-content .nav-justified .nav-item:nth-child(2) a {
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
        } */

        /* .tab-content .nav-justified .nav-item a.active {
            background: none;
        } */

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
            #skip_flyin{
                z-index: 7199 !important;
                top: 15% !important;
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
        .theme-modal .nav-pills .nav-link.active,
        .nav-pills .nav-link.active,
        .nav-pills .show > .nav-link {
            background-color: {{ $event->primary_color }} !important;
            color: #fff;
        }

        .page#faq .faq-card .faq-content a {
            color: {{ $event->primary_color }} !important;
        }
        .page#faq .faq-card .faq-content a {
            color: {{ $event->primary_color }} !important;
        }

        a {
            color: {{ $event->primary_color }};
            text-decoration: none;
            background-color: transparent;
        }

        a:hover {
            color: {{ $event->secondary_color }} ;
            text-decoration: underline;
        }


        .faq-items .faq-card .faq-content a {
            color: {{ $event->primary_color }} !important;
        }


        .timeline-sm .timeline-sm-item:after {
            border-color: {{ $event->primary_color }} !important;
        }


        .profile-card .p-header {
            display: block;
            width: 100%;
            background: {{ $event->primary_color }} !important;
            height: 140px;
        }


        .profile-card .p-body .p-info .points {
            display: inline-block;
            font-size: 16px;
            background: rgba(219, 91, 91, 0.1);
            border-radius: 3px;
            letter-spacing: 0.01em;
            color: {{ $event->primary_color }} !important;
            font-weight: 700;
            padding: 5px 30px;
        }
        .doc-lists .doc-item .theme-btn.add-to-bag:before {
            color: {{ $event->primary_color }} !important;
            /* padding: 8px; */
            font-weight: 700;
        }

        .theme-modal .modal-dialog.confirmation .modal-content h3 span {
            color: {{ $event->primary_color }} !important;
        }
        .justify-content-between.align-items-center.schedule-speaker{
            display: flex;
            gap: 19px;
        }
        .custom-dropdown-menu a img{
            margin-right: 0.6rem;
        }
        .event_speakers img {
            width: 88px;
            height: 88px;
            object-fit: cover;
            border-radius: 33%;
        }


        .custom-dropdown-menu a:not(:last-child){
            border-bottom: 1px solid  {{ $event->primary_color }}21 !important;
        }

        /* .df-ui-btn.df-ui-next.ti-angle-right {
            display: none !important;
        }
        .df-ui-btn.df-ui-prev.ti-angle-left {
            display: none !important;
        } */
        .custom_ios #menu_items_right{
            margin-right: 15%;
        }
        .custom_ios [class*=col-].fluid-col.profile-col{
            max-width: 270px;
        }

        .btn:focus, .btn.focus {
            box-shadow: none !important;
        }
        .theme-btn.primary {
            background: rgb(91 219 103 / 10%);
            border-color: rgb(91 219 140 / 30%);
            color: {{ $event->primary_color }} !important;
        }

        .theme-btn.primary-filled {
            background: {{ $event->primary_color }} !important;
            border-color: {{ $event->primary_color }} !important;
            color: #fff;
        }


        .theme-btn .green.primary {
            background: white;
            border-color: white;
            color: {{ $event->primary_color }} !important;
        }

        .theme-btn .green.primary-filled {
            background: {{ $event->primary_color }} !important;
            border-color: {{ $event->primary_color }} !important;
            color: #fff;
        }




        .doc-lists .simplebar-track .simplebar-scrollbar:before {
            background: #00a15f !important;
            opacity: 1 !important;
            border-radius: 100px;
        }


        .doc-lists.swagbag-list .doc-item .checkbox input:checked+label:before {
            background: {{ $event->primary_color }} !important;
            border: 2px solid {{ $event->primary_color }} !important;
        }



        .modal-open .select2-container--open .select2-results__options .select2-results__option:hover {
            color: {{ $event->primary_color }} !important;
            background: #fff;
        }

        .modal-open .select2-container--open .select2-results__options .select2-results__option--highlighted {
            background: #fff;
            color: {{ $event->primary_color }} !important;
        }



        .modal-open .select2-container--open .select2-results__options::-webkit-scrollbar-thumb {
            background-color: {{ $event->primary_color }} !important;
            border-right: 5px solid rgba(0, 0, 0, 0);
            border-top: 5px solid rgba(0, 0, 0, 0);
            border-bottom: 5px solid rgba(0, 0, 0, 0);
            border-radius: 100px;
        }

        .round-icon {
            display: inline-flex;
            width: 32px;
            height: 32px;
            background: rgba(219, 91, 91, 0.1);
            border: 1px solid rgba(219, 91, 91, 0.1);
            align-items: center;
            justify-content: center;
            border-radius: 100%;
            color: {{ $event->primary_color }} !important;
            font-size: 16px;
            min-width: 32px;
        }

        .menu-custom .menu .custom-dropdown .custom-dropdown-menu .dropdown-item:hover {
            color: {{ $event->primary_color }} !important;
            background: transparent;
        }

        .custom-theme .btn-link {
            color: {{ $event->primary_color }} !important;
        }

        .custom-theme .btn-link:hover {
            color: #00a15ea9;
        }

        .custom-theme .badge-primary {
            color: #fff;
            background-color: {{ $event->primary_color }} !important;
        }

        .custom-theme .btn-primary,
        .custom-theme .page-item.active .page-link,
        .custom-theme .btn-outline-primary:hover {
            color: #fff !important;
            background-color: {{ $event->primary_color }} !important;
            border-color: {{ $event->primary_color }} !important;
        }

        .custom-theme .btn-outline-primary {
            color: {{ $event->primary_color }} !important;
            border-color: {{ $event->primary_color }} !important;
        }
        
      
        .custom-theme .btn-outline-primary.disabled,
        .custom-theme .btn-outline-primary:disabled {
            color: {{ $event->primary_color }} !important;
            background-color: transparent;
        }

        .custom-theme .btn-outline-primary:not(:disabled):not(.disabled).active,
        .custom-theme .btn-outline-primary:not(:disabled):not(.disabled):active,
        .custom-theme .show>.btn-outline-primary.dropdown-toggle {
            color: #fff;
            background-color: {{ $event->primary_color }} !important;
            border-color: {{ $event->primary_color }} !important;
        }

        .custom-theme .btn-outline-primary:not(:disabled):not(.disabled).active:focus,
        .custom-theme .btn-outline-primary:not(:disabled):not(.disabled):active:focus,
        .custom-theme .show>.btn-outline-primary.dropdown-toggle:focus {
            box-shadow: 0 0 0 0.15rem white;
        }

        .custom-theme .text-primary {
            color: #00a15f !important;
        }

        .custom-theme .border-primary {
            border-color: #00a15f !important;
        }

        .custom-theme a.text-primary:focus,
        .custom-theme a.text-primary:hover {
            color: #00a15ea9 !important;
        }

        .page .wrapper .points {
            display: block;
            width: 30%;
            background: {{ $event->primary_color }} !important;
            color: #fff;
            padding: 25px 25px;
        }


        .page .wrapper .scores .score-list li::before {
            display: flex;
            justify-content: center;
            align-items: center;
            background: #F4F4F4;
            width: 50px;
            height: 50px;
            content: counter(rank-counter);
            color: {{ $event->primary_color }} !important;
            font-weight: 800;
            border-radius: 100%;
            font-size: 20px;
            float: left;
            margin-right: 30px;
        }

        .page#faq .page-header {
            padding: 80px 0;
            margin: 65px 0;
            background: {{ $event->primary_color }} !important;
        }


        .timeline-sm .timeline-sm-item:after {
            border-color: "{{ $event->primary_color }}" !important;
        }

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
        .positionBlock {
            position: absolute;
            left: 2%;
            top: 2%;
            display: flex;
            align-items: center;
            /* background: #fff; */
            padding: 0px 6px;
            border-radius: 4px;
            height: 30px;
        }
        
        .rightTop {
            right: 2%;
            left: inherit;
        }
        
        .leftBottom {
            top: inherit;
            bottom: 2%;
        }
        
        .rightBottom {
            top: inherit;
            bottom: 2%;
            left: inherit;
            right: 2%;
        }
        
        .centerBottom {
            top: 50%;
            bottom: inherit;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        
        .positionBlock span {
            line-height: 0;
            animation: infinite example 1500ms;
            position: absolute;
            bottom: -50%;
            left: 50%;
            transform: translateX(-50%);
        }
        
        @keyframes example {
            0% {
                bottom: -80%;
            }
            33% {
                bottom: -48%;
            }
            100% {
                bottom: -80%;
            }
        }
        
        .positionBlock p {
            line-height: 0;
            padding: 0;
            margin: 0 0 0 3px;
            font-size: 10px;
            font-weight: 600;
            color: #515151;
        }



</style>
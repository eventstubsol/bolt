let loader = $(".loader");
let setRoom = '';
function initApp() {

    
    $('.modal').on('hidden.bs.modal', function (e) {
        // do something...
        console.log({e});
        let x = $(e.target).html()
        $(e.target).empty()
        $(e.target).html(x)
        // $('.modal video').pause()
      });

    var pause_audio = $("#pause_li");
    // function audioSetup(page){
        
        // const audio = document.getElementById("audio_new");
    
        // let playing = true;
        // if(window.config.lobby_audio){

        //     audio.on('ended', function () {
        //         this.currentTime = 0;
        //         this.play();
        //     }, false);
        //     pause_audio.on("click", () => {
        //         console.log("clicked1");
        //         console.log(playing);
        //         if (playing) {
        //             localStorage.setItem("lobbyAudio",false);
        //             audio.pause();
        //             playing = false;
        //             pause_audio.find("i").removeClass('fe-volume-1');
        //             pause_audio.find("i").addClass('fe-volume-x');
        //         } else {
        //             audio.play();
        //             playing = true;
        //             localStorage.setItem("lobbyAudio",true);

        //             pause_audio.find("i").removeClass('fe-volume-x');
        //             pause_audio.find("i").addClass('fe-volume-1');

        //         }
        //     });
        //     localStorage.setItem("lobbyAudio",true);
        // }
    // }

    //Wait for video load and then hide loader
    loader = $(".loader");
    let exteriorView = $("#exterior_view");
    let enteringView = $("#entering_view");
    let flyIn = $("#flyin_view");
    let pages = $(".page");
    let navs = $('.navs,.hide-on-exterior');
    let currentresbtns = null;
    let active_session_list = null;
    let loungeInterval = false;
        


    //Wait for all three main video loads before removing loader
    // if (isMobile()) {
    //     loader.fadeOut();
    // }
    // else {
    //     waitForVideosLoad(exteriorView, enteringView)
    //         .then(() => loader.fadeOut());
    // }
    function isMobile() {
        let check = false;
        (function (a) {
            if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0, 4)))
                check = true;
        })(navigator.userAgent || navigator.vendor || window.opera);
        return check;
    }
    //initMenu();
    initPolls();
    initSideMenu();

    function setAreas(){
        let areas = $(".area");
        const doNotRoute = [
            "support"
        ];
        areas.on("click", function (e) {
            const link = $(this).data("link");
            directAccess = false;
            if (!doNotRoute.includes(link)) {
                routie(link);
            } else {
                e.preventDefault();
            }
        });
    }

    //Support chat opening
    $(".open-support-chat").on("click", function (e) {

        e.preventDefault();
        CometChatWidget.chatWithUser("75899f1b-481a-47e0-961d-422864d8ce98");
        // openChat(config.cometChat.supportChatUser);
        // loader.show();
        setTimeout(() => {
            CometChatWidget.openOrCloseChat(true);
            $("body").addClass("right-bar-enabled");
            loader.hide();
        }, 750);
    });
    $(".chat_user").on("click", function (e) {

        e.preventDefault();
        let userid = $(e.target).data("link");
        CometChatWidget.chatWithUser(userid);
        // openChat(config.cometChat.supportChatUser);
        // loader.show();
        setTimeout(() => {
            CometChatWidget.openOrCloseChat(true);
            $("body").addClass("right-bar-enabled");
            loader.hide();
        }, 750);
    });
    $(".chat_group").on("click", function (e) {

        e.preventDefault();
        let grpid = $(e.target).data("link");
        CometChatWidget.chatWithGroup(grpid);
        
        // openChat(config.cometChat.supportChatUser);
        // loader.show();
        setTimeout(() => {
            CometChatWidget.openOrCloseChat(true);
            $("body").addClass("right-bar-enabled");
            loader.hide();
        }, 750);
    });
    $("body .open-user-chat").on("click", function (e) {
        e.preventDefault();
        console.log("reached");
        const userid = $(this).data("user");
        CometChatWidget.chatWithUser(userid);
        CometChatWidget.openOrCloseChat(true);
    });

    function checkAuth(room = "all") {
        if(room == "all"){
            // if (window.config.userType == "exhibiter" || window.config.userType == "sponsor") {
            //     return true;
            // }
        }
        return false;
    }



    $("#agenda").on("click", function () {

        $.ajax({
            url: window.config.subscription_raw,
            method: "GET",
            data: {
                _token: window.config.token,
            },
            success: function (data) {
                $("#agenda-modal").html(data);

                let areas = $(".area");
                const doNotRoute = [
                    "support"
                ];
                areas.on("click", function (e) {
                    const link = $(this).data("link");
                    directAccess = false;
                    if (!doNotRoute.includes(link)) {
                        routie(link);
                    } else {
                        e.preventDefault();
                    }
                });
                // alert("done");
                // console.log(data)
                $(".unsubscribe-agenda").on("click", function (e) {
                    console.log("Hello World")
                    e.preventDefault();
                    let t = $(this);
                    console.log(t);
                    t.prop("disabled", true);
                    if (t.data("id")) {
                        $.ajax({
                            url: window.config.unsubscribeToEvent.replace("EVENT_ID", t.data("id")),
                            method: "POST",
                            data: {
                                _token: window.config.token,
                            },
                            success: function () {
                                // t.parent().find("a").prop("disabled", false).hide().filter(".subscribe-to-event").show();
                                $(".sa-"+t.data("id")).show();
                                $(".sr-"+t.data("id")).hide();
                                t.hide().filter(".subscribe-to-event").show();
                                t.parent().find("a").filter(".subscribe-to-event").show();
                         
                                t.parent().parent().hide();
                                showMessage("Unsubscribed to session. ", "success");
                            },
                            error: function () {
                                showMessage("Error occurred while disabling session notification. Please try again later or refresh page.", "error");
                            }
                        })
                    }
                });

            },
            error: function () {
                showMessage("Error occurred while subscribing to session. Please try again later or refresh page.", "error");
            }
        })
    });

    //Listen for PDF Views and give points for them
    $("body").on("click", function (e) {
        let target = $(e.target);
        if (target.hasClass("_df_button")) {
            const url = target.attr("source");
            if (url) {
                trackEvent({
                    type: "resourceView",
                    url,
                });
            }
        }
    });

    let directAccess = true;
    let areas = $(".area");
    const doNotRoute = [
        "support"
    ];
    areas.on("click", async function (e) {
        loader.show();
        const link = $(this).data("link");
        console.log(link);
        directAccess = false;
        const flyin = $(e.target).data("flyin");
        const photobooth = $(e.target).data("capture");
        if(photobooth){
            let gallery = $("#photo-gallery");
            let capture = $("#photo-capture");
            await gallery.attr("src" , $(this).data("gallery"));
            await capture.attr("src" , $(this).data("capture"));
        }

        if(flyin && checkDestination(link)){
            flyIn.show();
            let skipped = false;
            navs.addClass('hidden');
            $("#skip_flyin").show();
            $("#skip_flyin").unbind().on("click",()=>{
                routie(link);
                skipped=true;
                $("#skip_flyin").hide();
                flyIn.hide();
            })
            flyIn.attr('src', flyin);
            // loader.fadeOut()
            flyIn.prop("currentTime", 0).get(0).play();
            flyIn.unbind()
                .on("canplaythrough", () =>{
                      pages.hide();
                      pages.filter("#flyin").show();        
                      loader.hide()
                     })  
                .off("click")
                .on("ended", function () {
                    flyIn.fadeOut();
                    console.log({skipped});
                    if(!skipped){
                        routie(link);
                    }
                    // loader.fadeOut();
            });
            // waitForVideosLoad(flyin)
            //     .then(() => {
                
            //     });
            
            return;
        }else{
            loader.hide();
        }

        if (!doNotRoute.includes(link)) {
            routie(link);
        } else {
            e.preventDefault();
        }
    });

    $("._custom_modal").on("click", function (e) {
        // console.log(e);
        $($(e.target).data("target")).modal()
    });
    $(".videosdk").on("click", function (e) {
        meeting_id = $(this).data("meeting");
        if(meeting_id){
            $("#videosdk-session-content").empty().append(`<iframe frameborder="0" id="frame"  class="positioned fill" src="${window.config.videoSDK.replace(":id",meeting_id)}"></iframe>`);
            $("#videosdk-session-content").append(`<div id="video_play_area"></div>`);
            $("#videosdk_modal").unbind().on("hide.bs.modal", function () {
                $("#videosdk-session-content").empty();
            });
        }
    });
    
    $(".subscribe-to-event").on("click", function (e) {
        // console.log("hello")
        e.preventDefault();
        let t = $(this);

        console.log( t);
        console.log( t.data("id"));
        t.prop("disabled", true);
        if (t.data("id")) {
            $.ajax({
                url: window.config.subscribeToEvent.replace("EVENT_ID", t.data("id")),
                method: "POST",
                data: {
                    _token: window.config.token,
                },
                success: function () {
                    showMessage("Subscribed to session. You will now get a priority notification few minutes prior to session.", "success");
                    t.hide();
                    $(".sa-"+t.data("id")).hide();
                    $(".sr-"+t.data("id")).show();
                    t.parent().find("a").filter(".unsubscribe-event").show();
                },
                error: function () {
                    showMessage("Error occurred while subscribing to session. Please try again later or refresh page.", "error");
                }
            })
        }
    });
    $(".unsubscribe-event").on("click", function (e) {
        e.preventDefault();
        let t = $(this);
        console.log(t.data("id"));
        
        console.log("Hello World")
        t.prop("disabled", true);
        if (t.data("id")) {
            $.ajax({
                url: window.config.unsubscribeToEvent.replace("EVENT_ID", t.data("id")),
                method: "POST",
                data: {
                    _token: window.config.token,
                },
                success: function () {
                    t.hide().filter(".subscribe-to-event").show();
                    t.parent().find("a").filter(".subscribe-to-event").show();
                },
                error: function () {
                    showMessage("Error occurred while disabling session notification. Please try again later or refresh page.", "error");
                }
            })
        }
    });

    let boothMenus = $(".booth-menu");
    let notboothMenus = $(".not-booth-menu");
    let notboothmenubutton = $("#notbooth_menu_toggle");
    notboothmenubutton.on("click", toggleboothmenu);
    function toggleboothmenu() {
        if (notboothMenus.is(":hidden")) {
            notboothMenus.show();
            $("#notbooth_menu_toggle i").removeClass("mdi-chevron-left-circle");
            $("#notbooth_menu_toggle i").addClass("mdi-chevron-right-circle");
            boothMenus.addClass("hidden");
            $(".booth_description").parent().hide();
            $(".booth_description_2").parent().hide();
            $(".booth_resources").parent().hide();
            $(".candidatemenus").hide();
        } else {
            notboothMenus.hide();
            $("#notbooth_menu_toggle i").addClass("mdi-chevron-left-circle");
            $("#notbooth_menu_toggle i").removeClass("mdi-chevron-right-circle");
            boothMenus.removeClass("hidden");
            if (currentresbtns) {
                currentresbtns.show();
            } else {
                $(".booth_description").parent().show();
                $(".booth_description_2").parent().show();
                $(".booth_resources").parent().show();
            }
        }
    }
    window.addEventListener("hashchange", function (e) {
        $("#chat-container").removeClass("in-lounge");
        $("body").removeClass("in-lounge");
        $(".candidatemenus").hide();
        $(".booth_description").parent().hide();
        $(".booth_resources").parent().hide();
        let newHash = e.newURL.split("#")[1];
        boothMenus.addClass("hidden");
        notboothmenubutton.addClass("hidden");
        notboothMenus.show();
        if (newHash === "lounge") {
            $("#chat-container").addClass("in-lounge");
            $("body").addClass("in-lounge");
        }
    });

    //Open by-laws modal
    $('a[href="#by-laws"]').on("click", function (e) {
        e.preventDefault();
        $("#bylaws-modal").modal();
    });

    //Open Pre-recorded Sessions
    $(".open-session").on("click", function (e) {
        e.preventDefault();
        let id = $(this).data("id");
        $("#audi-content").empty().append(`<iframe frameborder="0"  class="positioned fill" src="${window.config.auditoriumEmbed}?type=pre-recorded&id=${id}"></iframe>`);
    });
    $(".open-profile-popup").unbind().on("click", function (e) {
        e.preventDefault();
        let id = $(this).data("id");
        if (id) {
            window.showProfile(id);
        }
    });

    pages.hide();
    if(window.config.homepage){
        pages.hide().filter("#"+window.config.homepage.replace("/","-")).show();
        // routie(window.config.homepage);
    }else{
        // pages.hide().filter("#"+window.config.homepage.replace("/","-")).show();

        pages.filter(".initial").show();

    }

    $("#audi-content").empty();
    const notFoundRoute = "lobby";
    //Routing setup
    navs.addClass('hidden');
    let contentTicker = false;
    let initializedLeaderboard = false;

    function clearContentTicker() {
        if (contentTicker !== false) {
            clearInterval(contentTicker);
        }
    }
    function clearLounge(){
        if(loungeInterval !== false){
            clearInterval(loungeInterval);
        }
    }

    $(".zoom_urls").on("click", function () {
        t = $(this);
        trackEvent({
            type: "zoom_video_view",
            name: t.attr("title")
        });
    })

    function setLoungeLinks(){
        $(".lounge_meeting").on("click",(e)=>{
            // e.stopPropagation();
            let meetingId= $(e.currentTarget).data("meeting");
            let tableId= $(e.currentTarget).data("table");
            let limit= $(e.currentTarget).data("limit");
            console.log(e);
            console.log(tableId);
            if(limit>0){
                let participant_interval = setInterval(addParticipant,30000,tableId);
                addParticipant(tableId);
                
                $("#lounge-session-content").empty().append(`<iframe frameborder="0" id="frame"  class="positioned fill" src="${window.config.videoSDK.replace(":id",meetingId)}"></iframe>`);
                $("#lounge-session-content").append(`<div id="video_play_area"></div>`);
                $("#lounge_modal").unbind().on("hide.bs.modal", function () {
                    console.log("opened")
                    clearInterval(participant_interval);
                    removeParticipant(tableId);
                    $("#lounge-session-content").empty();
                });
            }else{
                $("#lounge-session-content").empty().append(`<h1>Table Seats Full</h1>`);
                // $("#lounge-session-content").append(`<div id="video_play_area"></div>`);
              
            }

        })
    }

    function updateLounge(){

        // console.log("test interval 1");
        console.log(window.config.updateLounge);
        let addingParticipant = false;
        let last_add = 0;
        loungeInterval = setInterval(function(){
            console.log("test interval")
                let now = Date.now();
                if (!addingParticipant && last_add + 5000 > now) { return false; } //If already requesting and last request was less than 5 seconds ago, then dont refresh again
                last_add = false;
                $.ajax({
                    url: window.config.updateLounge,
                    success: function (html) {
                        addingParticipant = true;
                        // console.log(html);
                        $("#lounge_tables").html(html);
                        setAreas();
                        setLoungeLinks();
                    }
                });
        },30000);
    }
    let addingParticipant = false;
    let last_add = 0;
    function addParticipant(tableId){
        let now = Date.now();
        if (addingParticipant && last_add + 5000 > now) { return false; } //If already requesting and last request was less than 5 seconds ago, then dont refresh again
        addingParticipant = true;
        last_add = now;

        console.log("participant added");
        $.ajax({
            url: window.config.addParticipant.replace(":id", tableId),
            method: "POST",
            success: function (html) {
                console.log("participant added");
                // $("#description-" + id).html(html[0]);
                // $("#description-two-" + id).html(html[1]);
                // console.log(html);
            }
        });
    }
    function removeParticipant(tableId){
        $.ajax({
            url: window.config.removeParicipant.replace(":id", tableId),
            method: "POST",

            success: function (html) {
                console.log("participant removed");
                // $("#description-" + id).html(html[0]);
                // $("#description-two-" + id).html(html[1]);
                // console.log(html);
            }
        });
    }

    function pageChangeActions(changeChat = true) {
        // muteAllAudios
        $(".page_audio").trigger("pause")
        navs.removeClass('hidden');
        pause_audio.hide();
        // if(window.config.lobby_audio){
        //     audio.pause();
        //     playing = false;
        // }
        $("#skip_flyin").hide();
        currentresbtns = null;
        if (changeChat)
            CometChatWidget.chatWithGroup('general');
        if ($("#cometchat__widget")) {
            $("#cometchat__widget").show();

        }
        loader.hide();
        clearContentTicker();
        clearLounge();
        window.scrollTo(0, 0);
        $('.YouTubePopUp-Wrap, .YouTubePopUp-Close').click();
        if ($('.page:visible').hasClass('menu-filled')) {
            $('.navbar-custom.theme-nav').addClass('filled')
        } else {
            $('.navbar-custom.theme-nav').removeClass('filled')
        }
        if (typeof dfLightBox !== "undefined" && dfLightBox && dfLightBox.closeButton) {
            $(dfLightBox.closeButton).trigger("click");
        }
        $('.modal').modal('hide');
    }
    

    let  reload  = true ;
   function isios(){
        let isIOS = /iPad|iPhone|iPod/.test(navigator.platform) || (navigator.platform === 'MacIntel' && navigator.maxTouchPoints > 1);
        return isIOS;
   }
    routie({
        'lobby': function () {
            trackEvent({
                type: "resourceView",
                url:""
            });
            pages.hide();
            if(localStorage.getItem("lobbyAudio")=='true' && window.config.lobby_audio){
                if(reload){
                    $("body").on("mousemove",()=>{
                        // pause_audio.show();
                        // pause_audio.find("i").removeClass('fe-volume-x');
                        // pause_audio.find("i").addClass('fe-volume-1');
                        // audio.play();
                        // audio.muted = false;
                        playing = true;    
                        $("body").unbind("mousemove");
                    });
                    // $("body").trigger("mousemove");
                    reload= false;
                }
                if(isMobile()){
                    $("#lobby_view").src = "";
                }
                if(isios()){
                    document.getElementById("lobby_view").setAttribute("src","")
                }
                // audio.play();
                playing = true;
                // audio.muted = false;
                // pause_audio.find("i").removeClass('fe-volume-x');
                // pause_audio.find("i").addClass('fe-volume-1');
            }
            // createGroup("general");
            pages.filter("#lobby").show();
            pageChangeActions();
            recordPageView("lobby", "lobby","lobby");
            // if(window.config.lobby_audio){
            //     pause_audio.show();  
            // }

        },
        'networking': function () {
            pages.hide();
            pages.filter("#networking").show();
            setLoungeLinks();
            pageChangeActions();
            setTimeout(() => {
                updateLounge();
            }, 2000);
            recordPageView("networking", "networking","lounge");
        },
        'booth/:id': function (id) {
            pages.hide();
            let video = $('.video-'+id);
            console.log(id);
            $("#notbooth_menu_toggle i").addClass("mdi-chevron-left-circle");
            $("#notbooth_menu_toggle i").removeClass("mdi-chevron-right-circle");
            let resbtns = $(".resourcelist-" + id);
            let toShow = pages.filter("#booth-" + id).show();
            if (toShow.length) {
                toShow.show();
                pageChangeActions();
                trackEvent({
                    type: "boothVisit",
                    id,
                });
                pageChangeActions(false);
                CometChatWidget.chatWithGroup(id);
                console.log(id);
                // console.log(CometChatWidget.chatWithGroup('98237'));
                $.ajax({
                    url: window.config.boothDetails.replace("BID", id),
                    success: function (html) {
                        $("#description-" + id).html(html[0]);
                        $("#description-two-" + id).html(html[1]);
                        // console.log(html);
                    }
                });
                setTimeout(function () {
                    $(".booth_description").parent().show();
                    $(".booth_resources").parent().show();
                    notboothMenus.hide();
                    notboothmenubutton.removeClass("hidden");
                    boothMenus.removeClass("hidden");
                    let callBookingButton = $(".booth_call_booking");
                    let bookingModal = $("#book-a-call-modal-" + id);
                    if (bookingModal.length) {
                        callBookingButton.show();
                    } else {
                        callBookingButton.hide();
                    }
                    boothMenus.find('.modal-toggle').unbind().on("click", function () {
                        var trigger = $(".mob-menu a");
                        var sidebar = $(".sidebar-custom");
                    
                        if (sidebar.hasClass('enabled')) {
                            // $(".sidebar-custom").removeClass("enabled");
                            $(".overLay").removeClass("d-block");
                            $(".fa").removeClass("fa-times").addClass("fa-bars");
                            sidebar.removeClass('enabled')
                            trigger.find('i').removeClass('fa-times').addClass('fa-bars')
                        }
                        let modalId = $(this).data("modal") + id;
                        let modalEl = $("#" + modalId);
                        if ($(this).data("modal") === "book-a-call-modal-") {
                            recordEvent("booking_modal_opened", "Booking Modal Opened / " + modalEl.data("name"), "booking_flow",'Booth',id);
                            trackEvent({
                                type: "boothBookingModalOpened",
                                id,
                            });
                        } else {
                            trackEvent({
                                type: "boothContentTab",
                                id,
                                tab: modalId,
                            });
                        }
                        modalEl.modal();
                    });
                    boothMenus.find('.show-interest').unbind().on("click", function () {
                        var trigger = $(".mob-menu a");
                        var sidebar = $(".sidebar-custom");
                    
                        if (sidebar.hasClass('enabled')) {
                            // $(".sidebar-custom").removeClass("enabled");
                            $(".overLay").removeClass("d-block");
                            $(".fa").removeClass("fa-times").addClass("fa-bars");
                            sidebar.removeClass('enabled')
                            trigger.find('i').removeClass('fa-times').addClass('fa-bars')
                        }
                        trackEvent({
                            type: "boothShowInterestButtonClicked",
                            id,
                        });
                        Swal.fire({
                            title: 'Do you want to show interest in the booth?',
                            text: "Your basic contact information will be shared with booth owner.",
                            showCancelButton: true,
                            confirmButtonText: `Sure go ahead`,
                            cancelButtonText: `Don't Share`,
                        }).then((result) => {
                            if (result.value) {
                                $.ajax({
                                    url: window.config.showInterestURL.replace("BID", id),
                                    method: "POST",
                                    data: {
                                        _token: window.config.token,
                                    }
                                });
                                Swal.fire('Great choice', 'We have recorded your interest in the booth!', 'success')
                            } else {
                                Swal.fire('Your interest was not registered!')
                            }
                        })
                    });
                    if (resbtns.length) {
                        resbtns.show();
                        $(".booth_description").parent().hide();
                        $(".booth_resources").parent().hide();
                        currentresbtns = resbtns;
                    }
                }, 100)
                recordPageView("booth/" + id, "Booth - " + toShow.data("name"),"Booth",id);
            } else {
                routie(notFoundRoute);
            }
            video.show();
            video.prop("currentTime", 0).get(0).play();
        },
        'faq': function () {
            pages.hide();
            let toShow = pages.filter("#faq").show();
            if (toShow.length) {
                toShow.show();
            } else {
                routie(notFoundRoute);
            }
            recordPageView("faq", "FAQs");
            pageChangeActions();
        },
        'attendees': function () {
            if (checkAuth()) {
                routie("page/Lobby");
            } else {
                pages.hide();
                let toShow = pages.filter("#profile").show();
                if (toShow.length) {
                    toShow.show();
                    recordPageView("profile", "Profile");
                } else {
                    routie(notFoundRoute);
                }
                pageChangeActions();
            }
            recordPageView("attendees",'attendees','Attendees')
        },
        'exterior': function () {
            // $("#cometchat__widget").hide();
            navs.addClass('hidden');
            $("body").click()
            pages.hide();
            pages.filter(".initials").show();
            if (!isMobile() && !isios()) {
                exteriorView.prop("currentTime", 0).get(0).play();
                setTimeout(function () {
                    loader.hide();
                }, 5000);
                exteriorView
                    .on("canplaythrough", () =>{ 
                        loader.hide();})
                    .on("click", function () {
                        enteringView.prop("currentTime", 0).get(0).play();
                        exteriorView.fadeOut();
                        enteringView
                            .off("click")
                            .on("ended", function () {
                                enteringView.fadeOut();
                                routie("lobby");
                            });
                    });
            }else{
                routie("lobby");
            }
            recordPageView("exterior", "Exterior");
        },
        'leaderboard': function () {
            if (checkAuth()) {
                routie("page/Lobby");
            } else {
                pages.hide();
                let page = pages.filter("#leaderboard").show();
                if (!initializedLeaderboard) {
                    loader.show();
                    showLeaderboard();
                    initializedLeaderboard = setInterval(() => showLeaderboard(true), 30000);
                }
                pageChangeActions();
                recordPageView("leaderboard", "Leaderboard","Leaderboard");
            }
        },
        'sessionroom/:room': function (room) {
            // alert(room);
            setRoom = room;
            let video = $('.video-'+room);
            let whitelist_for_all = ["Health_Pavilion_Stage","Sponsor_Stage"]
            if ((!whitelist_for_all.includes(room)) && checkAuth() && room != "Sponsor_Stage") {
                routie("page/Lobby");
            } else {
                if($("#sessionroom-" + room).length===0){
                    routie("page/Lobby");
                }
                pages.hide().filter("#sessionroom-" + room).show();
                if(room==="Program-Workshop-2"||room==="Program-Workshop-1"){
                    trackEvent({
                        type:"workshopVisit",
                        id:room
                    });
                }
                if (active_session_list) active_session_list.modal("hide");
                trackEvent({
                    type: room + "_visit"
                });
                // createGroup(room);
                console.log({room})
                CometChatWidget.chatWithGroup(room);
                pageChangeActions(false);


                // if (!(room === "Auditorium" || room === "auditorium")) {
                    // $("#cometchat__widget").hide();
                    //     $("#cometchat__widget").style.display = 'none';
                // }
                const loadContent = () => {
                    // if(window.config.auditoriumEmbed.startsWith(""))
                    // console.log(window.config.auditoriumEmbed)
                    $("#session-content-" + room).empty().append(`<iframe frameborder="0" id="frame" allowusermedia allow="camera https://bbb.eventstub.co;  microphone https://bbb.eventstub.co"  class="positioned fill" src="${window.config.auditoriumEmbed}?type=${room}"></iframe>`);
                    // $("#session-content-" + room).append(`<div id="video_play_area"></div>`);
                    $(".cc1-chat-win-inpt-wrap input").unbind("mousedown").on("mousedown", function (e) { e.preventDefault(); e.stopImmediatePropagation(); $(e.target).focus() });
                };
                let sessionModal = $("#session-modal-" + room);
                // console.log(room);
                $("#play-session-" + room).unbind().on("click", function () {
                    loadContent();
                    sessionModal.modal();
                    trackEvent({
                        type:"sessionView",
                        id:room
                    });
                });
                sessionModal.unbind().on("hide.bs.modal", function () {
                    console.log("opened")
                    $("#session-content-" + room).empty();
                });
                recordPageView("workshop/" + room, room + " Room",'Sessionroom',room);
            }
            if(!isios()){
                video.show();
                video.prop("currentTime", 0).get(0).play();
            }
        },
        'page/:page': function (page) {
            
            let pause_audio = $("#pause_li");
            // if(page === "auditorium"){
            // }
            // alert(page);
            let video = $('.video-'+page);
            let pageAudio = $("#audio_"+page);
           
            console.log(pageAudio);
            let whitelist_for_all = ["expo_lobby","sponsor_floor","Vendor_Floor"]
            if ((!whitelist_for_all.includes(page)) && checkAuth()) {
                routie("page/Lobby");
            } else {
                if($("#page-" + page).length===0){
                    routie("page/Lobby");
                }
                pages.hide().filter("#page-" + page).show();
                let chatname = pages.filter("#page-" + page).data("chat");
                let menu_hidden = pages.filter("#page-" + page).data("menu");
               
                if(page==="Program-Workshop-2"||page==="Program-Workshop-1"){
                    trackEvent({
                        type:"workshopVisit",
                        id:page
                    });
                }
                pageChangeActions(false);
                

                if(Object.keys(pageAudio).length){
                    if(reload){
                        console.log("reload")
                        $("body").on("mousemove",()=>{
                            if(localStorage.getItem("audio_mute")==="false"){
                                console.log("reload")
                            
                                pageAudio.trigger("play");
                                pause_audio.find("i").addClass('fe-volume-1');
                                pause_audio.find("i").removeClass('fe-volume-x');
                                $("body").unbind("mousemove");
                            }   
                        });
                        // $("body").trigger("mousemove");
                        reload= false;
                    }else{
                        if(localStorage.getItem("audio_mute")==="false"){
                            pageAudio.trigger("play");   
                            pause_audio.find("i").addClass('fe-volume-1');
                            pause_audio.find("i").removeClass('fe-volume-x');
                        }
                    }
                    pause_audio.show();
                    
                    
                    pause_audio.unbind().on("click",()=>{
                        if(pageAudio[0].paused){
                            pageAudio.trigger("play");
                            localStorage.setItem("audio_mute","false");
                            pause_audio.find("i").addClass('fe-volume-1');
                            pause_audio.find("i").removeClass('fe-volume-x');
                        }else{
                            pause_audio.find("i").removeClass('fe-volume-1');
                            pause_audio.find("i").addClass('fe-volume-x');
                            pageAudio.trigger("pause");
                            localStorage.setItem("audio_mute","true");
                        }
                    })
                }else{
                    pause_audio.hide();
                }
                // createGroup(chatname);
                CometChatWidget.chatWithGroup(chatname);
                
               recordPageView("page/" + page, page + " page", "page",page);
               if(menu_hidden === "1" || menu_hidden == 1){
                    navs.addClass('hidden');
                }
            }
            if(!isios()){
                video.show();
                video.prop("currentTime", 0).get(0).play();
            }

        },
        'photo-booth': function (id) {
            if (checkAuth()) {
                routie("page/Lobby");
            } else {
                pages.hide().filter("#photo-booth-page").show();
                pageChangeActions();
                recordPageView("photobooth", "Photo Booth");
                trackEvent({
                    type:"PHOTOBOOTH_VISIT",
                    id:'PHOTOBOOTH_VISIT',
                });
                let gallery = $("#photo-gallery");
                let galleryBtn = $("#gallery");
                let capture = $("#photo-capture");
                let captureBtn = $("#capture");
                console.log($(this).data("gallery"));
                console.log(this);
                console.log($(this));
                console.log($(this).data("capture"));
                gallery.attr("src" , $(this).data("gallery"));
                capture.attr("src" , $(this).data("capture"));
                capture.hide();
                gallery.show();
                galleryBtn.hide();
                captureBtn.show();
                captureBtn.unbind().on("click", function () {
                    capture.show();
                    gallery.hide();
                    captureBtn.hide();
                    galleryBtn.show();
                });
                galleryBtn.unbind().on("click", function () {
                    capture.hide();
                    gallery.show();
                    galleryBtn.hide();
                    captureBtn.show();
                });
                setTimeout(function () {
                    $("#chat-toggle").fadeOut();
                }, 20);
            }
        },
        ':route': function (route) {
            routie(notFoundRoute);
            recordEvent("not_found_route", "Not Found / [" + route + "]");
        }
    });
    if (window.location.hash === "") {
        if(!isMobile()){
            routie("page/Lobby");
        }
        if(window.config.homepage){
            routie(window.config.homepage);
        }else{
            routie("exterior");
        }
    } else if (window.location.hash.indexOf("#exterior") === -1) {
        // pageChangeActions();
    }
    setupGamification();
    $("#saveprofile").on("click", saveprofile);
    $(".right-bar-toggle").on("click", function () {
        $(this).find("#chat-unread-count").addClass("hidden");
        recordEvent("chat_opened", "Chat Opened");
    }); //Hide the unread messages count once user opens the chat panel.

    $(".video-play").on("click", function () {
        if ($(this).attr("href")) {
            let video = $(this).attr("href");
            trackEvent({
                type: "videoView",
                video,
            });
            recordEvent("video_played", "Video / " + (video));
        }
    });

    $(".caucus-message").on("click", function () {
        swal("", "Caucus Rooms will open Friday, August 21st at 10pm, EDT (9pm CDT, 8pm MDT, 7pm PDT)")
    });
}
function saveprofile(e, retries = 0) {
    if (e && typeof e.preventDefault === "function") {
        e.preventDefault();
    }
    let url = $("#profileurl").val();
    if (!url.length) {
        if (retries <= 5) {
            setTimeout(saveprofile(false, ++retries), 2000);
        }
        return false;
    }
    $("#saveprofile").html("Saving...").attr("disabled", true);
    recordEvent("profile_updated", "Profile updated");
    $.ajax({
        url: config.saveprofile,
        method: "POST",
        data: {
            _token: config.token,
            url
        },
        success: function (response) {
            if (response.success) {
                $('#profile-modal').modal('hide');
                $(".modal-backdrop").remove();
                Swal.fire({
                    title: "Saved",
                    text: "Saved Successfully",
                    type: "success",
                });
                $("#saveprofile").html("Save").attr("disabled", false);
                recordEvent("profile_updated", "Profile update success");
                location.reload();
            }
            else {
                Swal.fire({
                    title: "Error",
                    text: "Please Upload an Image",
                    type: "error",
                });
                $("#saveprofile").html("Save").attr("disabled", false);
                recordEvent("profile_update_failed_1", "Profile update Failed - 1");
            }
        },
        error: function () {
            recordEvent("profile_update_failed_1", "Profile update Failed - 2");
        }
    });
}
function waitForVideosLoad(...videos) {
    return Promise.all(videos.map((video, index) => {
        return new Promise(resolve => {
            video.on("canplaythrough", () => resolve());
        });
    }));
}
function showMessage(title, type = "info", options = {}) {
    Swal({
        type,
        title,
        ...options
    });
}


function checkDestination(link) {
    let check = "";
    if(link.includes("sessionroom")){
       check =  link.replace("sessionroom/","#sessionroom-")
    }
    if(link.includes("booth")){
       check =  link.replace("booth/","#booth-")
    }
    if(link.includes("page")){
       check =  link.replace("page/","#page-")
    }
    if($(check).length){
        return true
    }else{
        return false
    }
    
}

function setupGamification() {
    let huntItems = $(".scavenger-item");
    huntItems.on("click", function () {
        let item = $(this);
        showMessage("Congratulations on finding the item.", "success", {
            imageUrl: "https://media.giphy.com/media/2aQUoJgTUKAOc1vk5s/giphy.gif",
            imageWidth: 100,
            imageHeight: 100,
            type: "",
        });
        trackEvent({
            type: "scavengerHunt",
            index: item.data("index"),
            page: item.data("page"),
            name: item.data("name"),
        });
        recordEvent("treasure_hunt", "Treasure Hunt Item Clicked");
    });
}

function trackEvent(options = {}) {
    $.ajax({
        url: config.trackEvent,
        method: "POST",
        data: {
            ...options,
            _token: config.token,
        }
    });
}

window.trackEvent = trackEvent;

function showLeaderboard(inLoop = false) {
    let list = $("#list-of-people");
    $.ajax({
        url: config.leaderboard,
        method: "POST",
        data: { _token: config.token },
        success: function (leaderboard) {
            // console.log({leaderboard});
            loader.hide();
            list.html(leaderboard.map(([name, points]) => {
                return `<li class="score-item"><div class="info"><p>${name}</p><span>${points} points</span></div></li>`;
            }).join(""));
        },
        error: function (err) {
            loader.hide();
            console.log({err});
            if (!inLoop) {
                showMessage(
                    "Error loading the leaderboard. Please try again in some time",
                    "error"
                );
            }
        }
    });
}

function initMenu() {
    let triggers = $(".custom-dropdown a.menu-trigger");
    triggers.on('click', function (e) {
        e.preventDefault();
        $(this).next().toggleClass('active');
    });
}

function initPolls() {
    let trigger = $(".polls-menu a");
    let sidebar = $(".pollbar-custom");
console.log("triggering")
    trigger.on('click', function (e) {
        e.preventDefault();
        console.log("tr");
        // sidebar.toggleClass('hidden');
        sidebar.toggleClass('enabled');
        // if (sidebar.hasClass('enabled')) {
        //     // $(".overLay").addClass("d-block");
        // } else {
        //     // $(".overLay").removeClass("d-block");
        // }
    });
    sidebar.find('.menu a').on('click', function () {
        if (sidebar.hasClass('enabled')) {
            // $(".sidebar-custom").removeClass("enabled");
            // $(".overLay").removeClass("d-block");
            // sidebar.toggleClass('hidden');
            sidebar.removeClass('enabled')
        }
    });
}
function initSideMenu() {
    let trigger = $(".mob-menu a");
    let sidebar = $(".sidebar-custom");

    trigger.on('click', function (e) {
        e.preventDefault();
        sidebar.toggleClass('enabled');
        if (sidebar.hasClass('enabled')) {
            trigger.find('i').removeClass('fa-bars').addClass('fa-times')
            $(".overLay").addClass("d-block");
        } else {
            $(".overLay").removeClass("d-block");
            trigger.find('i').removeClass('fa-times').addClass('fa-bars')
        }
    });
    sidebar.find('.menu a').on('click', function () {
        if (sidebar.hasClass('enabled')) {
            // $(".sidebar-custom").removeClass("enabled");
            $(".overLay").removeClass("d-block");
            $(".fa").removeClass("fa-times").addClass("fa-bars");
            sidebar.removeClass('enabled')
            trigger.find('i').removeClass('fa-times').addClass('fa-bars')
        }
    });
}

const [
    listenForChanges,
    refreshContents,
] = (function () {
    let listeningObjects = {};
    let refreshing = false;
    let lastRefresh = 0;
    const listenForChanges = (key, callback) => {
        if (typeof callback !== "function") { console.error("Invalid callback provided for listening to changes!"); return; }
        (Array.isArray(key) ? [...key] : [key]).map(key => {
            if (!(key in listeningObjects)) {
                listeningObjects[key] = [];
            }
            listeningObjects[key].push(callback);
        });
    };


    const refreshContents = () => {
        let now = Date.now();
        if (refreshing && lastRefresh + 5000 > now) { return false; } //If already requesting and last request was less than 5 seconds ago, then dont refresh again
        refreshing = true;
        lastRefresh = now;
        $.ajax({
            url: window.config.contentTickerURL,
            method: "POST",
            data: {
                _token: window.config.token
            },
            success: function (response) {
                if (response.updates && typeof response.updates === "object") {
                    let updates = response.updates;
                    for (let key in updates) {
                        if (key in listeningObjects) {
                            listeningObjects[key].map(callback => callback(updates[key], key));
                        }
                    }
                }
                refreshing = false;
            },
            error: function () {
                refreshing = false;
                console.log("Error while checking for new content!");
            }
        });
    };

    refreshContents(); //Calling for initialization
    // setInterval(refreshContents, 25000); //Will be called every 15 seconds

    return [
        listenForChanges,
        refreshContents, //Helper function to manually refresh the contents - useful in case of some events where we want to know the updates
    ]
})();
window.listenForChanges = listenForChanges;
window.refreshContents = refreshContents;

function isCalendlyEvent(e) {
    return e.data.event &&
        e.data.event.indexOf('calendly') === 0;
};

function getCurrentBoothId() {
    let hash = window.location.hash;
    return hash.startsWith("#booth") ? hash.substr(7) : false;
}

window.addEventListener(
    'message',
    function (e) {
        const boothId = getCurrentBoothId();
        const boothName = $("#book-a-call-modal-" + boothId).data("name");
        if (isCalendlyEvent(e) && boothId) {
            if (e.data.event === "calendly.date_and_time_selected") {
                recordEvent(e.data.event, "Call Slot Selected / " + boothName, "booking_flow");
                trackEvent({
                    type: "boothBookingSlotSelected",
                    id,
                });
            } else if (e.data.event === "calendly.event_scheduled") {
                recordEvent(e.data.event, "Call Scheduled / " + boothName, "booking_flow");
                trackEvent({
                    type: "boothBookingCallScheduled",
                    id,
                });
            }
        }
    }
);

$(document).ready(initApp);
let loader = $(".loader");
let setRoom = '';
function initApp() {

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
    if (isMobile()) {
        loader.fadeOut();
    }
    else {
        waitForVideosLoad(exteriorView, enteringView)
            .then(() => loader.fadeOut());
    }
    function isMobile() {
        let check = false;
        (function (a) {
            if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0, 4)))
                check = true;
        })(navigator.userAgent || navigator.vendor || window.opera);
        return check;
    }
    //initMenu();
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
            if (window.config.userType == "exhibiter" || window.config.userType == "sponsor") {
                return true;
            }
            return false;
        }
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
        // loader.show();
        const link = $(this).data("link");
        directAccess = false;
        const flyin = $(e.target).data("flyin");
        const photobooth = $(e.target).data("capture");
        if(photobooth){
            let gallery = $("#photo-gallery");
            let capture = $("#photo-capture");
            await gallery.attr("src" , $(this).data("gallery"));
            await capture.attr("src" , $(this).data("capture"));
            console.log("photobooth");
        }

        if(flyin){
            pages.hide();
            pages.filter("#flyin").show();
            flyIn.show();

            flyIn.attr('src', flyin);
            // waitForVideosLoad(flyin)
            //     .then(() => loader.fadeOut());
            flyIn.prop("currentTime", 0).get(0).play();
            flyIn
                .off("click")
                .on("ended", function () {
                    flyIn.fadeOut();
                    routie(link);
                    loader.fadeOut();
                });
            return;
        }

        if (!doNotRoute.includes(link)) {
            routie(link);
        } else {
            e.preventDefault();
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
    $("#audi-content").empty();
    const notFoundRoute = "lobby";
    //Routing setup
    navs.removeClass('hidden');
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
            type: "LoungeSessionAttended",
            name: t.attr("title")
        });
    })

    function setLoungeLinks(){
        $(".lounge_meeting").on("click",(e)=>{
            let meetingId= $(e.target).data("meeting");
            let tableId= $(e.target).data("table");
            let participant_interval = setInterval(addParticipant,15000,tableId);
            // addParticipant(tableId);
            
            $("#lounge-session-content").empty().append(`<iframe frameborder="0" id="frame"  class="positioned fill" src="${window.config.videoSDK.replace(":id",meetingId)}"></iframe>`);
            $("#lounge-session-content").append(`<div id="video_play_area"></div>`);
            $("#lounge_modal").unbind().on("hide.bs.modal", function () {
                console.log("opened")
                clearInterval(participant_interval);
                removeParticipant(tableId);
                $("#lounge-session-content").empty();
            });
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
        },10000);
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
        // $("#cometchat__widget").show();
        // clearInterval(loungeInterval);

        currentresbtns = null;
        if (changeChat)
            CometChatWidget.chatWithGroup('general');
        // window.$socket.emit("update_page", window.location.hash.substr(1));
        if ($("#cometchat__widget")) {
            $("#cometchat__widget").show();

        }
        // $('.page_video').hide();
        // $('.room_video').hide();
        // $('.booth_video').hide();
        loader.hide();
        $("#audi-content").empty();
        $("#caucus-room-content").empty();
        $("#workshop-content").empty();
        navs.removeClass('hidden');
        clearContentTicker();
        clearLounge();
        $("#audi-modal").modal("hide");
        $("#caucus-modal").modal("hide");
        $("#workshop-modal").modal("hide");
        // $("#workshop-modal").modal("hide");
        $("body").removeClass("right-bar-enabled"); //Hide Chat modal
        $("#chat-toggle").show();
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

    let lastLoaded = false;
    const checkContentLoad = (room, callback = false) => (loaded = true) => {
        // $.ajax({
        //     url: window.config.checkCurrentSession,
        //     data: {
        //         room,
        //     },
        //     success: function(response){
        //         if(loaded && lastLoaded !== response.id && typeof callback === "function"){
        //             callback();
        //             trackEvent({
        //                 type: "sessionView",
        //                 id: response.id
        //             });
        //         }else if(response.id){
        //             trackEvent({
        //                 type: "sessionView",
        //                 id: response.id
        //             });
        //         }
        //         lastLoaded = response.id;
        //     }
        // });
    };
    const contentRecheckingTime = 25000;
    $("#workshop-list").unbind().on("hide.bs.modal", function () {
        if (window.location.hash === "#workshop-list") {
            window.history.back();
        }
    });
    $("#booth_directory").unbind().on("hide.bs.modal", function () {
        if (window.location.hash === "#booth_directory") {
            window.history.back();
        }
    });
    $("#session-list-peek_behind_corporate_veil").unbind().on("hide.bs.modal", function () {
        if (window.location.hash === "#sessions-list/peek_behind_corporate_veil") {
            window.history.back();
        }
    });
    $("#session-list-fireside_chat").unbind().on("hide.bs.modal", function () {
        if (window.location.hash === "#sessions-list/fireside_chat") {
            window.history.back();
        }
    });



    routie({
        'lobby': function () {
            pages.hide();
            if (isMobile()) {
                document.querySelector("#lobby_view").src = '';
            }
            pages.filter("#lobby").show();
            pageChangeActions();
            recordPageView("lobby", "Lobby");
        },
        'room/:id': function (id) {
            let toShow = pages.filter("#room-" + id);
            if (toShow.length) {
                pages.hide();
                toShow.show();
                recordPageView("room-" + id, "Room / " + (toShow.data("name") || id));
            } else {
                //alert("The doors will open on friday at 4:00 - 6:00 PM.");
                $('#information-modal').modal({
                    backdrop: true
                });
                routie("expo-hall");
            }
            pageChangeActions();
        },
        'networking': function () {
            pages.hide();
            pages.filter("#networking").show();
            setLoungeLinks();
            pageChangeActions();
            setTimeout(() => {
                updateLounge();
            }, 2000);
        },
        "museum": function () {
            if (checkAuth()) {
                routie("lobby");
            } else {
                pages.hide();
                let toShow = pages.filter("#museum").show();
                if (toShow.length) {
                    toShow.show();
                    trackEvent({
                        type: "museumVisit",
                    });
                    recordPageView("Museum", "Museum");
                } else {
                    routie(notFoundRoute);
                }
                pageChangeActions();
            }
        },
        "museum/:id": function (id) {
            if (checkAuth()) {
                routie("lobby");
            } else {
                pages.hide();
                let toShow = pages.filter("#museum-" + id).show();
                if (toShow.length) {
                    toShow.show();
                    trackEvent({
                        type: "museumVisit",
                        id,
                    });
                    recordPageView("museum/item-" + id, "Museum / " + (toShow.data("name") || id));
                } else {
                    routie(notFoundRoute);
                }
                pageChangeActions();
            }
        },
        "expo-hall": function () {

            pages.hide().filter("#expo-hall-page").show();
            pageChangeActions();
            recordPageView("expo-hall", "Expo Hall");
        },
        "past-videos": function () {
            if (checkAuth()) {
                routie("lobby");
            } else {
                pages.hide().filter("#sessions-archive").show();
                pageChangeActions();
                recordPageView("past-videos", "Past Videos");
            }
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
                        let modalId = $(this).data("modal") + id;
                        let modalEl = $("#" + modalId);
                        if ($(this).data("modal") === "book-a-call-modal-") {
                            recordEvent("booking_modal_opened", "Booking Modal Opened / " + modalEl.data("name"), "booking_flow");
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
                recordPageView("booth/" + id, "Booth - " + toShow.data("name"));
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
                routie("lobby");
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
        },
        'report': function () {
            if (checkAuth()) {
                routie("lobby");
            } else {
                pages.hide();
                pages.filter("#reports").show();
                recordPageView("reports", "Reports");
                pageChangeActions();
            }
        },
        'provisional': function () {
            if (checkAuth()) {
                routie("lobby");
            } else {
                pages.hide();
                pages.filter("#provisionals").show();
                recordPageView("provisionals", "Provisionals");
                pageChangeActions();
            }
        },
        'exterior': function () {
            pages.hide();
            // $("#cometchat__widget").hide();
            navs.addClass('hidden');
            pages.filter(".initial").show();
            if (!isMobile()) {
                exteriorView.prop("currentTime", 0).get(0).play();
                setTimeout(function () {
                    loader.hide();
                }, 5000);
                exteriorView
                    .on("canplaythrough", () => loader.hide())
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
            } else {
                exteriorView
                    .on("click", function () {

                        routie("lobby");
                    });
            }
            recordPageView("exterior", "Exterior");
        },
        'leaderboard': function () {
            if (checkAuth()) {
                routie("lobby");
            } else {
                pages.hide();
                let page = pages.filter("#leaderboard").show();
                if (!initializedLeaderboard) {
                    loader.show();
                    showLeaderboard();
                    initializedLeaderboard = setInterval(() => showLeaderboard(true), 30000);
                }
                pageChangeActions();
                recordPageView("leaderboard", "Leaderboard");
            }
        },
        'lounge': function () {
            if (checkAuth()) {
                routie("lobby");
            } else {
                pages.hide();
                let page = pages.filter("#lounge-page").show();
                $("#chat-container").addClass("in-lounge");
                $("body").addClass("in-lounge").addClass("right-bar-enabled");
                pageChangeActions(false);
                CometChatWidget.chatWithGroup("virtual_entertainment");
                recordPageView("lounge", "Lounge");
            }
        },
        'auditorium': function () {
            if (checkAuth()) {
                console.log("yo");
                routie("lobby");
            } else {

                pages.hide();
                let page = pages.filter("#auditorium-room").show();
                trackEvent({
                    type: "audi_visit"
                });
                pageChangeActions();
                const loadContent = () => {
                    $("#audi-content").empty().append(`<iframe frameborder="0"  class="positioned fill" src="${window.config.auditoriumEmbed}"></iframe>`);
                    $(".cc1-chat-win-inpt-wrap input").unbind("mousedown").on("mousedown", function (e) { e.preventDefault(); e.stopImmediatePropagation(); $(e.target).focus() });
                };
                $("#audi-slido-panel").empty().html(getSlidoFrame("AUDITORIUM"));
                let audiModal = $("#audi-modal");
                $("#play-audi-btn").unbind().on("click", function () {
                    // window.open(window.config.auditoriumEmbed+"?t="+Date.now());
                    audiModal.modal();
                    loadContent();
                    checkContentLoad("auditorium")(false);
                    contentTicker = setInterval(checkContentLoad("auditorium", loadContent), contentRecheckingTime);
                    recordEvent("audi_video_played", "Auditorium Video Played");
                });
                audiModal.unbind().on("hide.bs.modal", function () {
                    clearContentTicker();
                    $("#audi-content").empty();
                });
                recordPageView("auditorium", "Auditorium");
            }
        },
        'workshop-list': function () {
            pageChangeActions();
            $("#workshop-list").modal();
            recordPageView("workshop-list", "Workshop List");
        },
        'workshop': function () {
            pages.hide().filter("#workshop-room").show();

            pageChangeActions();
            const loadContent = () => {
                $("#workshop-content").empty().append(`<iframe frameborder="0"  class="positioned fill" src="${window.config.auditoriumEmbed}?type=workshop"></iframe>`);
                $(".cc1-chat-win-inpt-wrap input").unbind("mousedown").on("mousedown", function (e) { e.preventDefault(); e.stopImmediatePropagation(); $(e.target).focus() });
            };
            let workshopModal = $("#workshop-modal");
            $("#play-workshop-btn").unbind().on("click", function () {
                loadContent();
                checkContentLoad("workshop")(false);
                workshopModal.modal();
                contentTicker = setInterval(checkContentLoad("workshop", loadContent), contentRecheckingTime);
            });
            workshopModal.unbind().on("hide.bs.modal", function () {
                clearContentTicker();
                $("#workshop-content").empty();
            });
        },
        'workshop/:room': function (room) {
            pages.hide().filter("#workshop-room").show();
            $("#workshop-screen").empty().append(`<span style="font-size: 1.3vw;">${window.config.roomNames[room]} course </span> <br/><span style='font-size: 2vw;margin-top: 20px;'>Click here to join<span>`)
            $("#workshop-list").modal("hide");
            trackEvent({
                type: room + "_visit"
            });
            pageChangeActions();
            const loadContent = () => {
                $("#workshop-content").empty().append(`<iframe frameborder="0"  class="positioned fill" src="${window.config.auditoriumEmbed}?type=${room}"></iframe>`);
                $(".cc1-chat-win-inpt-wrap input").unbind("mousedown").on("mousedown", function (e) { e.preventDefault(); e.stopImmediatePropagation(); $(e.target).focus() });
            };
            let workshopModal = $("#workshop-modal");
            $("#slido-panel").empty().html(getSlidoFrame(room));
            $("#play-workshop-btn").unbind().on("click", function () {
                loadContent();
                checkContentLoad("workshop")(false);
                workshopModal.modal();
                //TODO: Content ticker to be disabled in case we go with the single streams optino
                contentTicker = setInterval(checkContentLoad(room, loadContent), contentRecheckingTime);
            });
            workshopModal.unbind().on("hide.bs.modal", function () {
                clearContentTicker();
                $("#workshop-content").empty();
            });
            recordPageView("workshop/" + room, room + " Room");
        },
        'sessions-list/:roomgroup': function (roomgroup) {
            if (checkAuth()) {
                routie("lobby");
            } else {
                pageChangeActions();
                $("#session-list-" + roomgroup).modal();
                // $("#session-list-"+roomgroup).unbind().on("hide.bs.modal", function(){
                //     console.log(roomgroup);
                //     if(window.location.hash === "#sessions-list/"+roomgroup){
                //         window.history.back();
                //     }
                // });
                recordPageView("#session-list-" + roomgroup, "Session List " + roomgroup);
                active_session_list = $("#session-list-" + roomgroup);
            }
        },
        'booth_directory': function (roomgroup) {
            console.log("booth");
            pageChangeActions();
            $("#booth_directory").modal();
            recordPageView("#session-list-" + roomgroup, "Session List " + roomgroup);
        },
        'sessionroom/:room': function (room) {
            console.log(room);
            setRoom = room;
            let video = $('.video-'+room);
            let whitelist_for_all = ["Health_Pavilion_Stage","Sponsor_Stage"]
            if ((!whitelist_for_all.includes(room)) && checkAuth() && room != "Sponsor_Stage") {
                routie("lobby");
            } else {
                if($("#sessionroom-" + room).length===0){
                    routie("lobby");
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
                createGroup(room);
                CometChatWidget.chatWithGroup(room);
                pageChangeActions(false);


                // if (!(room === "Auditorium" || room === "auditorium")) {
                    // $("#cometchat__widget").hide();
                    //     $("#cometchat__widget").style.display = 'none';
                // }
                const loadContent = () => {
                    // if(window.config.auditoriumEmbed.startsWith(""))
                    // console.log(window.config.auditoriumEmbed)
                    $("#session-content-" + room).empty().append(`<iframe frameborder="0" id="frame"  class="positioned fill" src="${window.config.auditoriumEmbed}?type=${room}"></iframe>`);
                    $("#session-content-" + room).append(`<div id="video_play_area"></div>`);
                    $(".cc1-chat-win-inpt-wrap input").unbind("mousedown").on("mousedown", function (e) { e.preventDefault(); e.stopImmediatePropagation(); $(e.target).focus() });
                };
                let sessionModal = $("#session-modal-" + room);
                // console.log(room);
                $("#play-session-" + room).unbind().on("click", function () {
                    loadContent();
                    sessionModal.modal();
                });
                sessionModal.unbind().on("hide.bs.modal", function () {
                    console.log("opened")
                    $("#session-content-" + room).empty();
                });
                recordPageView("workshop/" + room, room + " Room");
            }
            video.show();
            video.prop("currentTime", 0).get(0).play();
        },
        'page/:page': function (page) {
            // if(page === "auditorium"){
                // CometChatWidget.chatWithGroup(page);
            // }
            // alert(page);
            let video = $('.video-'+page);
            
            let whitelist_for_all = ["expo_lobby","sponsor_floor","Vendor_Floor"]
            if ((!whitelist_for_all.includes(page)) && checkAuth()) {
                routie("lobby");
            } else {
                if($("#page-" + page).length===0){
                    routie("lobby");
                }
                pages.hide().filter("#page-" + page).show();
                if(page==="Program-Workshop-2"||page==="Program-Workshop-1"){
                    trackEvent({
                        type:"workshopVisit",
                        id:page
                    });
                }
                pageChangeActions(false);

               recordPageView("page/" + page, page + " page");
            }
            video.show();
            video.prop("currentTime", 0).get(0).play();

        },
        'caucus-room': function () {
            pages.hide().filter("#caucus-room-page").show();
            pageChangeActions();
            const loadContent = () => {
                $("#caucus-room-content").empty().append(`<iframe frameborder="0"  class="positioned fill" src="${window.config.auditoriumEmbed}?type=caucus"></iframe>`);
                $(".cc1-chat-win-inpt-wrap input").unbind("mousedown").on("mousedown", function (e) { e.preventDefault(); e.stopImmediatePropagation(); $(e.target).focus() });
            };
            let caucusModal = $("#caucus-modal");
            $("#play-caucus-btn").on("click", function () {
                loadContent();
                checkContentLoad("caucus")(false);
                caucusModal.modal();
                contentTicker = setInterval(checkContentLoad("caucus", loadContent), contentRecheckingTime);
                recordEvent("caucus_video_played", "Caucus Video Played");
            });
            caucusModal.unbind().on("hide.bs.modal", function () {
                clearContentTicker();
            });
            recordPageView("caucus", "Caucus");
        },
        "infodesk": function () {
            if (checkAuth()) {
                routie("lobby");
            } else {
                pages.hide();
                let toShow = pages.filter("#infodesk").show();
                if (toShow.length) {
                    toShow.show();
                } else {
                    routie(notFoundRoute);
                }
                pageChangeActions(false);
                CometChatWidget.chatWithUser("75899f1b-481a-47e0-961d-422864d8ce98");
                recordPageView("infodesk", "Infodesk");
            }
        },
        'photo-booth': function (id) {
            if (checkAuth()) {
                routie("lobby");
            } else {
                pages.hide().filter("#photo-booth-page").show();
                pageChangeActions();
                recordPageView("photobooth", "Photo Booth");
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
        'photo-booth-2': function () {
            if (checkAuth()) {
                routie("lobby");
            } else {
                pages.hide().filter("#photo-booth-page-2").show();
                pageChangeActions();
                recordPageView("photobooth", "Photo Booth");
                let gallery = $("#photo-gallery-2");
                let galleryBtn = $("#gallery-2");
                let capture = $("#photo-capture-2");
                let captureBtn = $("#capture-2");
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
        routie("exterior");
    } else if (window.location.hash.indexOf("#exterior") === -1) {
        pageChangeActions();
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

    // const meetContent = $("#meet-content");
    // const meetVideoModal = $("#meet-video");
    // $(".meet-greet-video").on("click", function(e){
    //     e.preventDefault();
    //     let index = $(e.target).closest(".meet-greet-video-row").index();
    //     recordEvent("meet_n_greet", "Meet & Greet Opened / "+(index));
    //     recordPageView("meet_n_greet/"+index, "Meet & Greet / "+ index);
    //     meetContent.empty().html(`<iframe frameborder="0" src="${window.config.meetEmbed}?id=${index}"></iframe>`);
    //     meetVideoModal.modal();
    // });
    // meetVideoModal.on("hide.bs.modal", function(){
    //     recordPageView("go_back");
    //     meetContent.empty();
    // });
    $(".caucus-message").on("click", function () {
        swal("", "Caucus Rooms will open Friday, August 21st at 10pm, EDT (9pm CDT, 8pm MDT, 7pm PDT)")
    });
}

function getSlidoFrame(room) {
    return "";
    const {
        userName,
        userEmail,
        userCompany,
        roomSlidoConfig,
    } = window.config;
    return `<iframe src="https://app.sli.do/event/${roomSlidoConfig[room]}?user_name=${userName}&user_email=${userEmail}&user_company=${userCompany}" height="100%" width="100%" frameBorder="0"></iframe>`
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

function initSideMenu() {
    let trigger = $(".mob-menu a");
    let sidebar = $(".sidebar-custom");

    trigger.on('click', function (e) {
        e.preventDefault();
        sidebar.toggleClass('enabled');
        if (sidebar.hasClass('enabled')) {
            trigger.find('i').removeClass('fa-bars').addClass('fa-times')
        } else {
            trigger.find('i').removeClass('fa-times').addClass('fa-bars')
        }
    });
    sidebar.find('.menu a').on('click', function () {
        if (sidebar.hasClass('enabled')) {
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
    setInterval(refreshContents, 15000); //Will be called every 15 seconds

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
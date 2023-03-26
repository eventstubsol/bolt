@if(false)
<div id="chat-container" class="right-bar theme-chat"></div>
<a href="javascript:void(0);" id="chat-toggle" class="nav-link right-bar-toggle theme-chat chat-bubble hide-on-exterior hidden">
    <i class="fe-message-square"></i>
    <span id="chat-unread-count" class="badge badge-danger font-15  badge-pill hidden"></span>
</a>
<div class="rightbar-overlay"></div>
@endif
<div id="cometchatnew"></div>
<div class="consent-notification hide-on-exterior">
    <h4>Subscribe to Notifications.</h4>
    <p>We'll send you  notifications about the event, chats and other cool stuff. Sounds good?</p>
    <div class="flex">
        <button class="btn theme-btn primary mr-2" data-consent="true">Yes</button>
        <button class="btn theme-btn primary mr-2" style="background: #fff; border-color: #9090904d;" data-consent="skip">No</button>
        <button class="btn theme-btn primary" style="background: #fff; border-color: #9090904d;" data-consent="false">Never Show</button>
    </div>
</div>

<script>
    window.addEventListener('DOMContentLoaded', (event) => {
        CometChatWidget.init({
            "appID": "{{$chat_app->appid}}",
            "appRegion": "{{$chat_app->region}}",
            "authKey": "{{$chat_app->authKey}}"
        }).then(response => {
            console.log("Initialization completed successfully");
            console.log('{{$user->id}}');
            //You can now call login function.
            CometChatWidget.login({
                "uid": "{{ $user->id }}"
            }).then(response => {
                CometChatWidget.launch({
                    "widgetID": "{{$chat_app->widgetId}}",
                    "target": "#chat_div",
                    "docked": "true",
                    "alignment": "right", //left or right
                    "roundedCorners": "true",
                    "height": "74vh",
                    "width": "51vw",
                    "defaultID": 'general', //default UID (user) or GUID (group) to show,
                    "defaultType": 'group' //user or group
                });
            }, error => {
                console.log("User login failed with error:", error);
                //Check the reason for error and take appropriate action.
            });
        }, error => {
            console.log("Initialization failed with error:", error);
            //Check the reason for error and take appropriate action.
        });
    });
</script>


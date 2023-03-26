@extends("layouts.admin")


@section("styles")
    @include("includes.styles.fileUploader")
    @include("includes.styles.wyswyg")
@endsection

@section("page_title")
     Poll Results
@endsection

@section("title")
     Poll Results
@endsection

@section("breadcrumbs")
    <li class="breadcrumb-item"><a href="">Poll</a></li>
    <li class="breadcrumb-item active">Results</li>
@endsection

@section("content")
    <div class="row">
        <div class="col-12">
          
        </div>
    </div>


@endsection

@section("scripts")
    @include("includes.scripts.fileUploader")
    @include("includes.scripts.wyswyg")
    <script type="text/javascript" src="https://unpkg.com/@cometchat-pro/chat@3.0.6/CometChat.js"></script>
    <script>
        let appID = "{{$chat_app->appid}}";
        let region = "{{$chat_app->region}}";
        let appSetting = new CometChat.AppSettingsBuilder()
                            .subscribePresenceForAllUsers()
                            .setRegion(region)
                            .autoEstablishSocketConnection(true)
                            .build();
        CometChat.init(appID, appSetting).then(
        () => {
            let GUID = "general";
            let limit = 30;
            let latestId = await CometChat.getLastDeliveredMessageId();

            var messagesRequest = new CometChat.MessagesRequestBuilder()
                                                            .setGUID(GUID)
                                                            .setMessageId(latestId)
                                                            .setLimit(limit)
                                                            .build();

            messagesRequest.fetchNext().then(
            messages => {
                console.log("Message list fetched:", messages);
            }, error => {
                console.log("Message fetching failed with error:", error);
            }
            );
            // console.log("Initialization completed successfully");
        }, error => {
            console.log("Initialization failed with error:", error);
        }
        );
    </script>
@endsection
<?php

use Illuminate\Support\Facades\Http;
use App\CometChat;

$api = env("COMET_CHAT_API_URL");
$key = env("COMET_CHAT_KEY");
$secret = env("COMET_CHAT_SECRET");


define("CHAT_SETTINGS",[
    "settings"=>[
        "name"=>"Widget",
        "version"=>"2"
    ]
]);
define("EXTENSIONS",[
   "enabled"=>[
       "widget",
       "polls"
   ]
]);

function createApp($event){
    $name = $event->name;
    $event_id = $event->id;
    $body = [
        "name"=> $name,
        "region"=>"eu",
        "version"=>"2",
        "skipSampleData"=>true
    ];
    $r = chatPostRequest("/apps",$body);
    // dd(json_decode($r->body()));
    $app = json_decode($r->body())->data;
    //id, accessKey, restAPI key =  apiKeys[0], auth key =  apiKeys[1] 
    $app_id =  $app->id;
    $access_key =  $app->accessKey;
    $apikey = "";
    $authkey = "";
    foreach($app->apiKeys as $key => $keydetails){
        if($keydetails->name==="Rest API Key"){
            $apikey = $key;
        }else{
            $authkey = $key;
        }
    }
    $chat_app = new CometChat([
        "appid"=>$app->id,
        "name"=>$name,
        "state"=>"active",
        "accessKey"=>$app->accessKey,
        "authKey"=>$authkey,
        "apiKey"=>$apikey,
        "event_id"=>$event_id,
    ]);
    $chat_app->save();
    createWidget($chat_app);
    return $chat_app;
}
function getAuthToken($appId,$apiKey,$user_id){
    // dd($appId);
    $response = Http::withHeaders([
        'apiKey' => $apiKey, 
        "Content-Type"=>"application/json",
        "Accept"=>"application/json",
        ])
        ->post("https://$appId.api-eu.cometchat.io/v2"."/users/$user_id/auth_tokens", []);
    // return ($response);
    return  json_decode($response)->data->authToken;
}


function createPoll($chat_app,$question,$options,$reciever,$reciever_type,$user_id){
    $appId = $chat_app->appid;
    // $res = getGroups($chat_app);
    // dd($res);
    $body = [
        "question"  => $question,
        "options"  =>  $options,
        "receiver"  => $reciever,
        "receiverType"  => $reciever_type,
    ];

    $authToken = (getAuthToken($chat_app->appid,$chat_app->apiKey,$user_id));
    $response = Http::withHeaders([
        'appId' => $appId,
        'authToken'=>$authToken,
        "Content-Type"=>"application/json",
        "Accept"=>"application/json",
        ])
        ->post("https://polls-eu.cometchat.io/v2/create", $body);   
    return $response;
    
}


function getGroups($chat_app){
    $response = Http::withHeaders([
        'apiKey' => $chat_app->apiKey, 
        "Content-Type"=>"application/json",
        "Accept"=>"application/json",
        ])
        ->get("https://$chat_app->appid.api-eu.cometchat.io/v2"."/groups");

    return json_decode($response->body())->data;
    
}

function createWidget($chat_app){
    //Enable Widget  widget
    $response = chatPostRequest("/apps/".$chat_app->appid."/extensions",EXTENSIONS);
    $body = [
        "settings"=>[
            "name"=>"Widget",
            "version"=>"2",
            "style"=>[
                "docked_layout_icon_background"=>"#03a9f4",
                "docked_layout_icon_close"=>"https://widget-js.cometchat.io/v2/resources/chat_close.svg",
                "docked_layout_icon_open"=>"https://widget-js.cometchat.io/v2/resources/chat_bubble.svg",
                "custom_css"=>".option__videocall-group{ display: none }"
            ],
            "sidebar"=>[
                    "chats"=>"true",
                    "users"=>true,
                    "groups"=>true,
                    "calls"=>true,
                    // "user_settings"=>true,
                    "recent_chat_listing"=>"all_chats",
                    "user_listing"=>"all_users",
                    "sidebar_navigation_sequence"=>["chats","users","groups","calls","settings"]
            ],
            "main" => [
                "allow_add_members"=> true,
                "allow_creating_polls"=> true,
                "allow_delete_groups"=> false,
                "allow_kick_ban_members"=> false,
                "allow_message_reactions"=> true,
                "allow_moderator_to_delete_member_messages"=> true,
                "allow_promote_demote_members"=> true,
                "block_user"=> true,
                "create_groups"=> false,
                "enable_collaborative_document"=> false,
                "enable_collaborative_whiteboard"=> false,
                "enable_deleting_messages"=> true,
                "enable_editing_messages"=> true,
                "enable_message_translation"=> true,
                "enable_sending_messages"=> true,
                "enable_sound_for_calls"=> true,
                "enable_sound_for_messages"=> true,
                "enable_threaded_replies"=> true,
                "enable_video_calling"=> true,
                "enable_voice_calling"=> true,
                "hide_deleted_messages"=> true,
                "hide_join_leave_notifications"=> true,
                "join_or_leave_groups"=> true,
                "send_emojis"=> true,
                "send_files"=> false,
                "send_message_in_private_to_group_member"=> true,
                "send_photos_videos"=> true,
                "share_live_reactions"=> true,
                "show_call_notifications"=> true,
                "show_delivery_read_indicators"=> true,
                "show_emojis_in_larger_size"=> true,
                "show_stickers"=> true,
                "show_typing_indicators"=> true,
                "show_user_presence"=> true,
                "view_group_members"=> true,
                "view_shared_media"=> true
            ]
        ]
    ];
    // dd($chat_app->appid);
    $response = chatPostRequest("/apps/".$chat_app->appid."/extensions/widget/v2/settings", $body);
    // $response->
    $widgetId = json_decode($response->body())->data->body->data->widgetId;
    $chat_app->widgetId =  $widgetId;
    $chat_app->settings =  json_encode($body);
    $chat_app->save();
    return ["success"=>true];
    // /dd();
}
function updateWidget($chat_app,$settings){
    //Enable Widget  widget
    // $response = chatPostRequest("/apps/".$chat_app->appid."/extensions",EXTENSIONS);
    $body = [
        "settings"=>[
            "name"=>"Widget",
            "version"=>"2",
            "style"=>[
                "docked_layout_icon_background"=>$settings->docked_layout_icon_background,
                "docked_layout_icon_close"=>$settings->docked_layout_icon_close,
                "docked_layout_icon_open"=>$settings->docked_layout_icon_open,
                "custom_css"=>".option__videocall-group{ display: none }"
            ],
            "sidebar"=>[
                    "chats"=>"true",
                    "users"=>true,
                    "groups"=>true,
                    "calls"=>true,
                    "recent_chat_listing"=>"all_chats",
                    "user_listing"=>"all_users",
                    "sidebar_navigation_sequence"=>["chats","users","groups","calls","settings"]
            ],
            "main" => [
                "allow_add_members"=> true,
                "allow_creating_polls"=> false,
                "allow_delete_groups"=> false,
                "allow_kick_ban_members"=> false,
                "allow_message_reactions"=> true,
                "allow_moderator_to_delete_member_messages"=> true,
                "allow_promote_demote_members"=> true,
                "block_user"=> true,
                "create_groups"=> false,
                "enable_collaborative_document"=> false,
                "enable_collaborative_whiteboard"=> false,
                "enable_deleting_messages"=> true,
                "enable_editing_messages"=> true,
                "enable_message_translation"=> true,
                "enable_sending_messages"=> true,
                "enable_sound_for_calls"=> true,
                "enable_sound_for_messages"=> true,
                "enable_threaded_replies"=> true,
                "enable_video_calling"=> $settings->enable_video_calling === "true",
                "enable_voice_calling"=> $settings->enable_voice_calling === "true",
                "hide_deleted_messages"=> true,
                "hide_join_leave_notifications"=> true,
                "join_or_leave_groups"=> true,
                "send_emojis"=> true,
                "send_files"=> false,
                "send_message_in_private_to_group_member"=> true,
                "send_photos_videos"=> true,
                "share_live_reactions"=> true,
                "show_call_notifications"=> true,
                "show_delivery_read_indicators"=> true,
                "show_emojis_in_larger_size"=> true,
                "show_stickers"=> true,
                "show_typing_indicators"=> true,
                "show_user_presence"=> true,
                "view_group_members"=> true,
                "view_shared_media"=> true
            ],
            "widgetId"=>$chat_app->widgetId
        ]
    ];
    $response = chatPutRequest("/apps/".$chat_app->appid."/extensions/widget/v2/settings", $body);
    // dd($response->body());
    // $response->
    // $widgetId = json_decode($response->body())->data->body->data->widgetId;
    // $chat_app->widgetId =  $widgetId;
    $chat_app->settings =  json_encode($body);
    $chat_app->save();
    return ["success"=>true];
    // /dd();
}
function deleteChatApp($chat_app){
    chatDeleteRequest("/apps/".$chat_app->appid);
}
function createGroup($chat_app,$group){
    $url = "https://api-eu.cometchat.io";
    Http::withHeaders([
            "apiKey" => $chat_app->apiKey,
            "appId" => $chat_app->appid,
            "Accept-Encoding" => "deflate, gzip",
            "Content-Encoding" => "gzip"
          ])
            ->post($url . "/v2.0/groups", [
              "type" => strtolower(env("COMET_CHAT_GROUP_TYPE")),
              "guid" => $group->id,
              "name" => $group->name
            ]);
}
function createUser($chat_app,$user){
    $url = "https://api-eu.cometchat.io";
    $response = Http::withHeaders(
        [
            "apiKey" => $chat_app->apiKey,
            "appId" => $chat_app->appid,
            "Accept-Encoding" => "deflate, gzip",
            "Content-Encoding" => "gzip"
        ])->post($url . '/v2.0/users', [
            'uid' => $user->id,
            'name' => $user->getFullName()
        ]);
        // dd($response->body());
}
function updateChatProfile($chat_app,$user){
    $url = "https://api-eu.cometchat.io";
    $response = Http::withHeaders(
        [
            "apiKey" => $chat_app->apiKey,
            "appId" => $chat_app->appid,
            "Accept-Encoding" => "deflate, gzip",
            "Content-Encoding" => "gzip"
        ])->put($url . '/v2.0/users/'. $user->id , [
            'name' => $user->getFullName(),
            'avatar' => isset($user->profileImage) ? assetUrl($user->profileImage):''
        ]);
        // dd($response->body());
}
function deleteUser($chat_app,$user){
    $url = "https://api-eu.cometchat.io";
    $response = Http::withHeaders(
        [
            "apiKey" => $chat_app->apiKey,
            "appId" => $chat_app->appid,
            "Accept-Encoding" => "deflate, gzip",
            "Content-Encoding" => "gzip"
        ])->delete($url . '/v2.0/users/'.$user->id);
        // dd($response->body());
}
function chatPostRequest($route,$body){
    $api = env("COMET_CHAT_API_URL");
    $key = env("COMET_CHAT_KEY");
    $secret = env("COMET_CHAT_SECRET");
    $response = Http::withHeaders([
        'key' => $key, 
        'secret' => $secret,
        "Content-Type"=>"application/json",
        "Accept"=>"application/json",
        ])
        ->post($api.$route, $body);   
    return $response;
}
function chatPutRequest($route,$body){
    $api = env("COMET_CHAT_API_URL");
    $key = env("COMET_CHAT_KEY");
    $secret = env("COMET_CHAT_SECRET");
    $response = Http::withHeaders([
        'key' => $key, 
        'secret' => $secret,
        "Content-Type"=>"application/json",
        "Accept"=>"application/json",
        ])
        ->put($api.$route, $body);   
    return $response;
}
function chatGetRequest($route){
    $api = env("COMET_CHAT_API_URL");
    $key = env("COMET_CHAT_KEY");
    $secret = env("COMET_CHAT_SECRET");
    $response = Http::withHeaders([
        'key' => $key, 
        'secret' => $secret,
        "Content-Type"=>"application/json",
        "Accept"=>"application/json",
        ])
        ->get($api.$route);   
    return $response;
}
function chatDeleteRequest($route){
    $api = env("COMET_CHAT_API_URL");
    $key = env("COMET_CHAT_KEY");
    $secret = env("COMET_CHAT_SECRET");
    $response = Http::withHeaders([
        'key' => $key, 
        'secret' => $secret,
        "Content-Type"=>"application/json",
        "Accept"=>"application/json",
        ])
        ->delete($api.$route);   
    return $response;
}

?>
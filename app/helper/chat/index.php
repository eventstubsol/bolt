<?php
$api = env("COMET_CHAT_API_URL");
$key = env("COMET_CHAT_KEY");
$secret = env("COMET_CHAT_SECRET");

function createApp($event){
    $name = $event->name;
    $body = `{
    "name": "$name",
    "region":"eu",
    "version":"v3",
    "skipSampleData":true
    }`;
    dd($body);
    

}

function chatPostRequest($route,$body){
    $api = env("COMET_CHAT_API_URL");
    $response = Http::withHeaders([
        'key' => '{key}', 
        'secret' => '{secret}',
        "Content-Type"=>"application/json",
        "Accept"=>"application/json",
        "Accept-Encoding"=> "deflate, gzip",
        "Content-Encoding"=> "gzip"
        ])
        ->post($api.$route, $body);   
    return $response;
}

?>
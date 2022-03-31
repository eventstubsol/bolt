<?php
define("LOBBY_AREAS", [
     "expo_hall" => [
         "title" => "Expo Hall",
         "link" => "expo-hall",
         "area" => [ 33.5,13.4,14.5,14 ], //In Percentage
     ],
    "Welcome Video" => [
        "title" => "welcome",
        "area" =>[ 35.4,45.5,9,8.7],
        "class" => "txt-white",
        "videoEmbed" => "https://vimeo.com/536234276",
    ],
//    "Photobooth" => [
//        "title" => "photobooth",
//        "area" =>[ 38.5,8.4,11.3,12 ],
//        "link" => "photo-booth",
//    ],
   "HallOfFame" => [
       "title" => "HallOfFame",
       "link" => "museum",
       "area" => [30.5,72.4,12.5,17] , //In Percentage
   ],
    "InfoDesk" => [
        "title" => "infodesk",
        "link"=> "infodesk",
        "area" =>[ 49,27,45,15],
    ],

    "Polls" => [
        "title"=>'Polls',
        "link"=>  'polls',
        "area" => [ 49,27,45,15],
    ],
    
    "Lounge" => [
        "title" => "Lounge",
        "link"=> "lounge",
        "area" =>[30, 56.5, 13.5, 18],
    ],
//    "PhotoB2" => [
//        "title" => "Photo Booth",
//        "link"=> "photo-booth",
//        "area" =>[ 53.5,17.8,3.5,4],
//    ],
    "Auditorioum" => [
        "title" => "Auditorium",
        "link" => "sessionroom/Auditorium",
        "area" => [30, 31.5, 13.5, 18 ] , //In Percentage
    ],
//    "Workshop" => [
//        "title" => "Workshop",
//        "link" => "workshop",
//        "area" => [ 29, 57.5, 12.5, 17] , //In Percentage
//    ],
]);

define("LOUNGE_AREAS", [
    // "Trivia" => [
    //     "title" => "Trivia",
    //     "zoom_url"=> "https://eventsibles.zoom.us/j/83448563720?pwd=Z2ZzQ1pxd3BrTzRSTnFSUlRKT011Zz09",
    //     "area" =>[ 12.8,2.8,11.2,11],
    // ],
    // "WineTasting" => [
    //     "title" => "Wine Tasting",
    //     "zoom_url"=> "https://eventsibles.zoom.us/j/89621735900?pwd=R3FQNTdwSUxqZUNZV2N3K3pPSUhEZz09",
    //     "area" =>[ 26.8,3,11.3,11],
    // ],
    // "Mixology" => [
    //     "title" => "Mixology",
    //     "zoom_url"=> "https://eventsibles.zoom.us/j/83624749324?pwd=MVBYTTVVRlhLSmpZbS9ObjhnVlpIdz09",
    //     "area" =>[ 12.8,85.8,11.2,11],
    // ],
    // "ChocolateTasting" => [
    //     "title" => "Chocolate Tasting",
    //     "zoom_url"=> "https://eventsibles.zoom.us/j/87120424525?pwd=NEF5TjVmTDJaQ3dGOUFlNkRaUjQ5UT09",
    //     "area" =>[ 26.8,85.8,11.2,11],
    // ],
    // "YOUAREONMUTE" => [
    //     "title" => "You Are On Mute",
    //     "zoom_url"=> "https://eventsibles.zoom.us/j/83448563720?pwd=Z2ZzQ1pxd3BrTzRSTnFSUlRKT011Zz09",
    //     "area" =>[ 38.7,24.7,12.9,6.3],
    // ],
    // "YOUAREFROZEN" => [
    //     "title" => "You Are Frozen",
    //     "zoom_url"=> "https://eventsibles.zoom.us/j/89621735900?pwd=R3FQNTdwSUxqZUNZV2N3K3pPSUhEZz09",
    //     "area" =>[ 46.4,28.9,13.3,6.3],
    // ],
    // "SHARINGMYSCREEN" => [
    //     "title" => "Sharing My Screen",
    //     "zoom_url"=> "https://eventsibles.zoom.us/j/83624749324?pwd=MVBYTTVVRlhLSmpZbS9ObjhnVlpIdz09",
    //     "area" =>[ 38.6,60.7,14.4,6.3],
    // ],
    "met" => [
        "title" => "The Met Gala",
        "link" => "sessionroom/The-Met-Gala",
        "area" => [ 10.8, 21.8,18.2,19 ] , //In Percentage
    ],
    "award" => [
        "title" => "Awards Ceremony",
        "link" => "sessionroom/Awards-Ceremony",
        "area" => [ 10.8, 40.8,18.2,19 ] , //In Percentage
    ],
    "anthony" => [
        "title" => "Anthony Hamilton Concert",
        "link" => "sessionroom/Anthony-Hamilton-Concert",
        "area" => [ 10.8, 60.8,18.2,19] , //In Percentage
    ],
    "dj" => [
        "title" => "Entertainment Room",
        "link" => "sessionroom/DJ-Room",
        "area" => [ 32.8, 77.8,18.2,19] , //In Percentage
    ],
    "Photobooth" => [
        "title" => "photobooth",
        "area" =>[29 ,41.5,17.5,22],
        "link" => "photo-booth",
    ],



 //   "InfoDesk" => [
 //       "title" => "infodesk",
 //       "link"=> "infodesk",
 //       "area" =>[ 48,23.5,52,20],
 //   ]
//    "Auditorioum" => [
//        "title" => "Auditorium",
//        "link" => "auditorium",
//        "area" => [ 25.5, 13, 9, 2] , //In Percentage
//    ],
//    "WorkShop" => [
//        "title" => "WorkShop",
//        "link" => "workshop",
//        "area" => [ 21.5, 13, 9, 2] , //In Percentage
//    ],
//    "FAQ" => [
//        "title" => "Expo Hall",
//        "link" => "expo-hall",
//        "area" => [ 16.5, 13, 9, 2.3 ], //In Percentage
//    ],
]);

//For Green Image
define("BOOTH_IMAGE_AREA_SLOTS", 4);
define("BOOTH_IMAGE_AREAS", [
    "candidate_standard"=>[
        "assets" => [
            "Slot 0" => [
                "area" => [43.2, 45.1, 4.57, 9.2],
                "type" => "image"
            ],
            "brandvideo" => [
                "area" => [42.69,45.8,8.78,9.1],
                "type" => "video",
            ],
        ]
    ],
    "candidate_platinum"=>[
        "assets" => [
            "Slot 0" => [
                "area" => [29,20.9,8.1,5],
                "type" => "image"
            ],
            "brandvideo" => [
                "area" => [42.69,45.8,10.78,13.1],
                "type" => "video",
            ],
        ],
    ],
    "candidate_gold"=>[
        "assets" => [
            "Slot 0" => [
                "area" => [45.599,30.1,4.19,11.3],
                "type" => "image"
            ],
            "brandvideo" => [
                "area" => [42.69,45.8,10.78,13.1],
                "type" => "video",
            ],
        ],
    ],"sponsor_standard"=>[
        "assets" => [
            "Slot 0" => [
                "area" => [21.5,54.2,20.8,11.1],
                "type" => "image"
            ],
            "brandvideo" => [
                "area" => [40.69,62.8,12.78,14.1],
                "type" => "video",
                "classes"=>"above_object"
            ],
        ],
    ],"sponsor_gold"=>[
        "assets" => [
            "Slot 0" => [
                "area" => [23.46,17,31.87,8.2],
                "type" => "image"
            ],
            "brandvideo" => [
                "area" => [42.69,33.8,12.78,13.1],
                "type" => "video",
            ],
        ],
    ],"sponsor_platinum"=>[
        "assets" => [
            "Slot 0" => [
                "area" => [23.2,35.9,33,6.8],
                "type" => "image",
                "class"=>"brrb"
            ],
            "brandvideo" => [
                "area" => [44.69,48.8,8.78,10.1],
                "type" => "video",
            ],
        ],
    ],
    "vendor"=>[
        "assets" => [
            "Slot 0" => [
                "area" => [33.7,44.65,13.3,5.4],
                "type" => "image",
                "class"=>"rounded_border-4"
            ],
            "Slot 1" => [
                "area" => [60.7,37.65,3.3,3.4],
                "type" => "image",
                "class"=>"rounded_border-4"
            ],
            "Slot 2" => [
                "area" => [60.7,61.65,3.3,3.4],
                "type" => "image",
                "class"=>"rounded_border-4"
            ],
            "brandvideo" => [
                "area" => [39.59,40.8,20.78,22.1],
                "type" => "video",
            ],
        ],
    ],
    "national_partners"=>[
        "assets" => [
            "Slot 0" => [
                "area" => [0,0,0,0],
                "type" => "image"
            ],
            "brandvideo" => [
                "area" => [45.69,49.99,6.98,6.6],
                "type" => "video",
                "classes" => "above_object"
            ],
            "Slot 1" => [
                "area" => [0,0,0,0],
                "type" => "image",
                "class" => "clipped-left"
            ],
            "Slot 2" => [
                "area" => [0,0,0,0],
                "class" => "clipped-right",
                "type" => "image",
            ],
        ],
    ],
    "foundation"=>[
        "assets" => [
            "Slot 0" => [
                "area" => [39.4,21.9,5.8,20.5],
                "type" => "image"
            ],
            "Slot 1" => [
                "area" => [39.4,73.7,5.8,20.5],
                "type" => "image",
            ],
            "Slot 2" => [
                "area" => [38.3,36.3,7.2,4.8],
                "type" => "image",
            ],
            "Slot 3" => [
                "area" => [38.3,43.51,12.87,4.8],
                "type" => "image",
            ],
            "Slot 4" => [
                "area" => [38.3,56.3,7.2,4.8],
                "type" => "image",
            ],
            "Slot 5" => [
                "area" => [43,36.4,7.1,6.4],
                "type" => "image",
            ],
            "Slot 6" => [
                "area" => [43,43.6,12.78,6.4],
                "type" => "image",
            ],
            "Slot 7" => [
                "area" => [43,56.4,7.1,6.4],
                "type" => "image",
            ],
            "Slot 8" => [
                "area" => [65, 59, 6, 14.5],
                "type" => "link",
                "to" => "https://jackandjillfoundation.org/donate-now/",
            ],
            "Slot 9" => [
                "area" => [65, 35, 6, 14.5],
                "type" => "link",
                "to" => "https://jackandjillfoundation.org/",
            ],
        ],
    ],
    "american_family"=>[
        "assets" => [
            "brandvideo" => [
                "area" => [50.7,50.7,9.6,10.8],
                "type" => "video"
            ],
            "Slot 0" => [
                "area" => [53.4,65.55,11.5,7.8],
                "type" => "image",
            ]
        ],
    ],
]);

define("INF0_DESK_AREAS",[
    "expo-hall" => [
        "title" =>"Expo Hall",
        "link" => "expo-hall",
        "area" =>[45,23,5.7,7],
    ],
    "lounge" => [
        "title" =>"Networking Lounge",
        "link" => "lounge",
        "area" =>[45,71,5.7,7],
    ],
    "support" => [
        "title" =>"Support",
        "link" => "support",
        "area" =>[15.3,40.98,18.2,17.4],
        "class" => "open-support-chat"
    ],
]);

define("BOOTH_AREA_IMAGE_ASPECT", 56.23);
define("EXTERNAL_VIDEO_ASSETS_ASPECT", 56.15);
define("polls", 56.15);

//Points definition for Gamification
define("SCAVENGER_HUNT_POINTS", 50);
define("BOOTH_VISIT_POINTS", 100);
define("BOOTH_RESOURCES_VIEW_POINTS", 100);
define("BOOTH_CHAT_POINTS", 0);
define("LOGIN_POINTS", 50);
define("RESOURCE_VIEW_POINTS", 50);
define("PROFILE_PICTURE_UPDATE", 0);
define("SESSION_ATTENDING_POINTS", 100);
define("VIDEO_VIEWING_POINTS", 150);
define("MUSEUM_VISIT_POINTS", 200);
define("WORKSHOP_VISIT_POINTS", 200);
define("EXTERIOR_ZOOM_POINTS", 100);

define("SCAVENGER_HUNT", [
    "lobby" => [
        [
            "id" => 1,
            "name" => "Silver Gem",
            "area" => [ 60, 88, 2, 4, ],
            "image" => "event-assets/images/treasurehunt/1.png",
        ],
        [
            "id" => 2,
            "name" => "Pink Gem",
            "area" => [ 60, 10, 2, 4],
            "image" => "event-assets/images/treasurehunt/2.png",
        ],
        [
            "id" => 3,
            "name" => "Round Gem",
            "area" => [ 43, 96, 2, 4 ],
            "image" => "event-assets/images/treasurehunt/3.png",
        ],
        [
            "id" => 4,
            "name" => "Round Gem 2",
            "area" => [ 43, 3, 2, 4 ],
            "image" => "event-assets/images/treasurehunt/3.png",
        ]
    ],
    "room1" => [
        [
            "id" => 4,
            "name" => "Silver Gem",
            "area" => [ 20,14 , 2, 4 ],
            "image" => "event-assets/images/treasurehunt/3.png",
        ],
        [
            "id" => 5,
            "name" => "Pink Gem",
            "area" => [ 84, 85, 2, 4 ],
            "image" => "event-assets/images/treasurehunt/2.png",
        ],
        [
            "id" => 6,
            "name" => "Round Gem",
            "area" => [ 87, 7, 2, 4 ],
            "image" => "event-assets/images/treasurehunt/1.png",
        ],
        [
            "id" => 12,
            "name" => "Round Gem",
            "area" => [ 50, 2, 2, 4 ],
            "image" => "event-assets/images/treasurehunt/14.png",
        ]
    ],
    "room2" => [
        [
            "id" => 4,
            "name" => "Silver Gem",
            "area" => [ 82,12 , 2, 4 ],
            "image" => "event-assets/images/treasurehunt/3.png",
        ],
        [
            "id" => 5,
            "name" => "Pink Gem",
            "area" => [ 82, 87, 2, 4 ],
            "image" => "event-assets/images/treasurehunt/1.png",
        ],
        [
            "id" => 6,
            "name" => "Round Gem",
            "area" => [ 23, 11, 2, 4 ],
            "image" => "event-assets/images/treasurehunt/2.png",
        ],
    ],
    "room0" => [
        [
            "id" => 4,
            "name" => "Silver Gem",
            "area" => [ 50, 2, 2, 4 ],
            "image" => "event-assets/images/treasurehunt/5.png",
        ],
        [
            "id" => 5,
            "name" => "Pink Gem",
            "area" => [ 10, 17, 2, 4 ],
            "image" => "event-assets/images/treasurehunt/2.png",
        ],
        [
            "id" => 6,
            "name" => "Round Gem",
            "area" => [ 80, 85, 2, 4 ],
            "image" => "event-assets/images/treasurehunt/1.png",
        ],
        [
            "id" => 12,
            "name" => "Round Gem",
            "area" => [ 80, 96, 2, 4 ],
            "image" => "event-assets/images/treasurehunt/3.png",
        ]
    ],
    "lounge" => [
        [
            "id" => 13,
            "name" => "Silver Gem",
            "area" => [ 52, 11, 2, 4 ],
            "image" => "event-assets/images/treasurehunt/3.png",
        ],
        [
            "id" => 14,
            "name" => "Pink Gem",
            "area" => [ 57, 92.5, 2, 2],
            "image" => "event-assets/images/treasurehunt/3.png",
        ],
        [
            "id" => 15,
            "name" => "Round Gem",
            "area" => [ 57, 73, 2, 4 ],
            "image" => "event-assets/images/treasurehunt/4.png",
        ],
    ],
    "museum" => [
        [
            "id" => 16,
            "name" => "Silver Gem",
            "area" => [ 70, 93, 2, 4 ],
            "image" => "event-assets/images/treasurehunt/3.png",
        ],
        [
            "id" => 17,
            "name" => "Pink Gem",
            "area" => [ 68, 6, 2, 4 ],
            "image" => "event-assets/images/treasurehunt/3.png",
        ],
        [
            "id" => 18,
            "name" => "Round Gem",
            "area" => [ 82, 4, 2, 4 ],
            "image" => "event-assets/images/treasurehunt/2.png",
        ],
        [
            "id" => 18,
            "name" => "Round Gem",
            "area" => [ 66, 88, 2, 4 ],
            "image" => "event-assets/images/treasurehunt/1.png",
        ]
    ],
    // "auditorium" => [
    //     [
    //         "id" => 19,
    //         "name" => "Silver Gem",
    //         "area" => [ 25, 80, 2, 4 ],
    //         "image" => "event-assets/images/treasurehunt/2.png",
    //     ],
    //     [
    //         "id" => 20,
    //         "name" => "Pink Gem",
    //         "area" => [ 44, 2, 2, 4 ],
    //         "image" => "event-assets/images/treasurehunt/5.png",
    //     ],
    //     [
    //         "id" => 21,
    //         "name" => "Round Gem",
    //         "area" => [ 45, 94, 2, 4 ],
    //         "image" => "event-assets/images/treasurehunt/1.png",
    //     ]
    // ],
]);

define("AUDI_SCREEN_AREA", [ 27, 5.3, 87.5, 43 ]);

define("CAUCUS_SCREEN_AREA", [ 27, 5.3, 87.5, 43 ]);
define("FIRESIDE_SCREEN_AREA", [ 27, 5.3, 87.5, 43 ]);



define("AUDI_IMAGE_ASPECT", 56.15);
define("AUDI_VIDEO_ASPECT", 56.15);

//define("MEET_AND_GREET", [
//    [
//        "name" => "Claudia Curtis",
//        "zoom_meet_id" => "94505392138",
//        "zoom_password" => "",
//    ],
//]);

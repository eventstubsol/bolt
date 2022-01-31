<?php
//All functions defined in this file will be accessible all through the project including View

use App\Api;
use App\Content;
use App\Poll;
use App\User;
use App\Vote;
use App\EventSession;
use App\SessionPoll;
use App\ArchiveVideos;
use App\UserConnection;
use App\sessionRooms;
use App\Contact;
use App\Template;
use App\Event;
use App\Link;
use App\Leaderboard;
use App\LeadPoint;
use App\Image;
use App\LandingPage;
use App\LandingSpeaker;
use App\UserTag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use \SendGrid\Mail\From as From;
use \SendGrid\Mail\To as To;
use \SendGrid\Mail\Mail as Mail;
use Illuminate\Support\Facades\Date;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Stmt\Catch_;
use App\ContentMaster;
use App\Menu;
use App\Treasure;
use App\UserSubtype;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;


include_once "clickableAreasConfig.php";
include_once "chat/index.php";


define("USER_TYPE_DELEGATE", "delegate");
define("BY_LAWS_POLL", "b0e7dbbd-a6f3-4898-9a08-a188de3a0884");

define("SUPPORT_USER", "75899f1b-481a-47e0-961d-422864d8ce98");


define("SESSION_POLL_TIME", 60); //Session Poll Timing in minutes

define("CLICKABLE_AREA_TYPES",[
"ZOOM_URL",
"VIMEO",
"PAGE",
"BOOTH",
]);
// "Radio Button",
define("FORMTYPES",[
"Text"=>"text",
"Email"=>"email",
"Phone"=>"tel",
"Select Box/Dropdown"=>"select",
"Image"=>"image",
"Country"=>"country",
"User Subtype"=>"subtype"
]);

define('LINK_TYPES', [
    'page',
    'session_room',
    'zoom',
    "booth",
    "vimeo",
    "chat_user",
    "chat_group",
    "pdf",
    // "custom_page",
    "lobby",
    "back",
    "faq",
    "photobooth",
    "videosdk",
    "modal",
    "lounge"
]);
define('MENU_LINK_TYPES', [
    'page',
    'session_room',
    'zoom',
    "booth",
    "vimeo",
    "pdf",
    "lobby",
    "back",
    "faq",
    "photobooth",
    "videosdk",
    "modal",
    "lounge",
    "SwagBag",
    "Leaderboard",
    "Schedule",
    "Library",
    "social_wall"
]);

define('MODAL_TYPES', [
    'page',
    'session_room',
    "booth",
    "vimeo",
    "pdf",
]);

define('HOME_PAGE_TYPES', [
    'page',
    'session_room',
    'lobby',
    'exterior'
]);
define("TIMEZONES",[
    'Pacific/Midway'       => "(GMT-11:00) Midway Island",
    'US/Samoa'             => "(GMT-11:00) Samoa",
    'US/Hawaii'            => "(GMT-10:00) Hawaii",
    'US/Alaska'            => "(GMT-09:00) Alaska",
    'US/Pacific'           => "(GMT-08:00) Pacific Time (US &amp; Canada)",
    'America/Tijuana'      => "(GMT-08:00) Tijuana",
    'US/Arizona'           => "(GMT-07:00) Arizona",
    'US/Mountain'          => "(GMT-07:00) Mountain Time (US &amp; Canada)",
    'America/Chihuahua'    => "(GMT-07:00) Chihuahua",
    'America/Mazatlan'     => "(GMT-07:00) Mazatlan",
    'America/Mexico_City'  => "(GMT-06:00) Mexico City",
    'America/Monterrey'    => "(GMT-06:00) Monterrey",
    'Canada/Saskatchewan'  => "(GMT-06:00) Saskatchewan",
    'US/Central'           => "(GMT-06:00) Central Time (US &amp; Canada)",
    'US/Eastern'           => "(GMT-05:00) Eastern Time (US &amp; Canada)",
    'US/East-Indiana'      => "(GMT-05:00) Indiana (East)",
    'America/Bogota'       => "(GMT-05:00) Bogota",
    'America/Lima'         => "(GMT-05:00) Lima",
    'America/Caracas'      => "(GMT-04:30) Caracas",
    'Canada/Atlantic'      => "(GMT-04:00) Atlantic Time (Canada)",
    'America/La_Paz'       => "(GMT-04:00) La Paz",
    'America/Santiago'     => "(GMT-04:00) Santiago",
    'Canada/Newfoundland'  => "(GMT-03:30) Newfoundland",
    'America/Buenos_Aires' => "(GMT-03:00) Buenos Aires",
    'Greenland'            => "(GMT-03:00) Greenland",
    'Atlantic/Stanley'     => "(GMT-02:00) Stanley",
    'Atlantic/Azores'      => "(GMT-01:00) Azores",
    'Atlantic/Cape_Verde'  => "(GMT-01:00) Cape Verde Is.",
    'Africa/Casablanca'    => "(GMT) Casablanca",
    'Europe/Dublin'        => "(GMT) Dublin",
    'Europe/Lisbon'        => "(GMT) Lisbon",
    'Europe/London'        => "(GMT) London",
    'Africa/Monrovia'      => "(GMT) Monrovia",
    'Europe/Amsterdam'     => "(GMT+01:00) Amsterdam",
    'Europe/Belgrade'      => "(GMT+01:00) Belgrade",
    'Europe/Berlin'        => "(GMT+01:00) Berlin",
    'Europe/Bratislava'    => "(GMT+01:00) Bratislava",
    'Europe/Brussels'      => "(GMT+01:00) Brussels",
    'Europe/Budapest'      => "(GMT+01:00) Budapest",
    'Europe/Copenhagen'    => "(GMT+01:00) Copenhagen",
    'Europe/Ljubljana'     => "(GMT+01:00) Ljubljana",
    'Europe/Madrid'        => "(GMT+01:00) Madrid",
    'Europe/Paris'         => "(GMT+01:00) Paris",
    'Europe/Prague'        => "(GMT+01:00) Prague",
    'Europe/Rome'          => "(GMT+01:00) Rome",
    'Europe/Sarajevo'      => "(GMT+01:00) Sarajevo",
    'Europe/Skopje'        => "(GMT+01:00) Skopje",
    'Europe/Stockholm'     => "(GMT+01:00) Stockholm",
    'Europe/Vienna'        => "(GMT+01:00) Vienna",
    'Europe/Warsaw'        => "(GMT+01:00) Warsaw",
    'Europe/Zagreb'        => "(GMT+01:00) Zagreb",
    'Europe/Athens'        => "(GMT+02:00) Athens",
    'Europe/Bucharest'     => "(GMT+02:00) Bucharest",
    'Africa/Cairo'         => "(GMT+02:00) Cairo",
    'Africa/Harare'        => "(GMT+02:00) Harare",
    'Europe/Helsinki'      => "(GMT+02:00) Helsinki",
    'Europe/Istanbul'      => "(GMT+02:00) Istanbul",
    'Asia/Jerusalem'       => "(GMT+02:00) Jerusalem",
    'Europe/Kiev'          => "(GMT+02:00) Kyiv",
    'Europe/Minsk'         => "(GMT+02:00) Minsk",
    'Europe/Riga'          => "(GMT+02:00) Riga",
    'Europe/Sofia'         => "(GMT+02:00) Sofia",
    'Europe/Tallinn'       => "(GMT+02:00) Tallinn",
    'Europe/Vilnius'       => "(GMT+02:00) Vilnius",
    'Asia/Baghdad'         => "(GMT+03:00) Baghdad",
    'Asia/Kuwait'          => "(GMT+03:00) Kuwait",
    'Africa/Nairobi'       => "(GMT+03:00) Nairobi",
    'Asia/Riyadh'          => "(GMT+03:00) Riyadh",
    'Europe/Moscow'        => "(GMT+03:00) Moscow",
    'Asia/Tehran'          => "(GMT+03:30) Tehran",
    'Asia/Baku'            => "(GMT+04:00) Baku",
    'Europe/Volgograd'     => "(GMT+04:00) Volgograd",
    'Asia/Muscat'          => "(GMT+04:00) Muscat",
    'Asia/Tbilisi'         => "(GMT+04:00) Tbilisi",
    'Asia/Yerevan'         => "(GMT+04:00) Yerevan",
    'Asia/Kabul'           => "(GMT+04:30) Kabul",
    'Asia/Karachi'         => "(GMT+05:00) Karachi",
    'Asia/Tashkent'        => "(GMT+05:00) Tashkent",
    'Asia/Kolkata'         => "(GMT+05:30) Kolkata",
    'Asia/Kathmandu'       => "(GMT+05:45) Kathmandu",
    'Asia/Yekaterinburg'   => "(GMT+06:00) Ekaterinburg",
    'Asia/Almaty'          => "(GMT+06:00) Almaty",
    'Asia/Dhaka'           => "(GMT+06:00) Dhaka",
    'Asia/Novosibirsk'     => "(GMT+07:00) Novosibirsk",
    'Asia/Bangkok'         => "(GMT+07:00) Bangkok",
    'Asia/Jakarta'         => "(GMT+07:00) Jakarta",
    'Asia/Krasnoyarsk'     => "(GMT+08:00) Krasnoyarsk",
    'Asia/Chongqing'       => "(GMT+08:00) Chongqing",
    'Asia/Hong_Kong'       => "(GMT+08:00) Hong Kong",
    'Asia/Kuala_Lumpur'    => "(GMT+08:00) Kuala Lumpur",
    'Australia/Perth'      => "(GMT+08:00) Perth",
    'Asia/Singapore'       => "(GMT+08:00) Singapore",
    'Asia/Taipei'          => "(GMT+08:00) Taipei",
    'Asia/Ulaanbaatar'     => "(GMT+08:00) Ulaan Bataar",
    'Asia/Urumqi'          => "(GMT+08:00) Urumqi",
    'Asia/Irkutsk'         => "(GMT+09:00) Irkutsk",
    'Asia/Seoul'           => "(GMT+09:00) Seoul",
    'Asia/Tokyo'           => "(GMT+09:00) Tokyo",
    'Australia/Adelaide'   => "(GMT+09:30) Adelaide",
    'Australia/Darwin'     => "(GMT+09:30) Darwin",
    'Asia/Yakutsk'         => "(GMT+10:00) Yakutsk",
    'Australia/Brisbane'   => "(GMT+10:00) Brisbane",
    'Australia/Canberra'   => "(GMT+10:00) Canberra",
    'Pacific/Guam'         => "(GMT+10:00) Guam",
    'Australia/Hobart'     => "(GMT+10:00) Hobart",
    'Australia/Melbourne'  => "(GMT+10:00) Melbourne",
    'Pacific/Port_Moresby' => "(GMT+10:00) Port Moresby",
    'Australia/Sydney'     => "(GMT+10:00) Sydney",
    'Asia/Vladivostok'     => "(GMT+11:00) Vladivostok",
    'Asia/Magadan'         => "(GMT+12:00) Magadan",
    'Pacific/Auckland'     => "(GMT+12:00) Auckland",
    'Pacific/Fiji'         => "(GMT+12:00) Fiji",
]);



define("BOOTH_TYPES", [
    "candidate_standard",
    "candidate_gold",
    "candidate_platinum",
    "sponsor_standard",
    "sponsor_gold",
    "sponsor_platinum",
    "vendor",
    "national_partners",
    "foundation",
    "american_family"
]);



define("CMS_SECTIONS", [
    "General",
]);

define("CMS_SECTIONS_2", [
    "General",
]);

define("CMS_FIELD_TYPES", [
    "text",
    "number",
    "textarea",
    "url",
    "youtube",
    "image",
    "video",
    "pdf"
]);

define("ROOM_TYPES", [
    "standard",
    "gold",
    "platinum",
]);

define("REGIONS", [
    "central",
    "eastern",
    "far-west",
    "mid-atlantic",
    "mid-western",
    "south-central",
    "south-eastern",
]);

define("REGIONS_NAMES_TO_VALUE", [
    "east" => REGIONS[1],
    "far west" => REGIONS[2],
    "mid atlantic" => REGIONS[3],
    "mid western" => REGIONS[4],
    "south central" => REGIONS[5],
    "south eastern" => REGIONS[6],
    "south east" => REGIONS[6],
]);

define("CAUCUS_REGIONS", [
    "Central",
    "Eastern",
    "Far West",
    "Mid Atlantic",
    "Mid Western",
    "South Central",
    "South Eastern",
]);

define("USER_TYPE_MODERATOR", "moderator");
define("USER_TYPE_SPEAKER", "speaker");

define("USER_TYPES", [
    "attendee",
    "exhibiter",
    USER_TYPE_SPEAKER,
    USER_TYPE_DELEGATE
]);

define("USER_TYPES_TO_LOGIN_WITH_MEMBERSHIP_ID", [
    "attendee",
]);

define("NOT_ATTENDEE_USER_TYPES", [
    "admin",
    "super_admin",
]);

define("NUMBER_OF_CONTACTS_TO_SHOW", 20);

define("CANDIDATES_BOOTH_ROOM", "9371ce28-c9c8-4851-a877-74a9f7b1ab7c");
define("ONLINE_KEEPING_TIME", 3600);
//define("ONLINE_KEEPING_TIME", 3600);

/**
 * Safe one is without email address
 */
define("USER_COLUMNS_TO_GET_SAFE", [
    "id",
    "name",
    "last_name",
    "job_title",
    "company_name",
    "country",
    "industry",
    "profileImage",
    "updated_at",
    "bio",
    "facebook_link",
    "twitter_link",
    "linkedin_link",
    "website_link",
    "company_website_link",
]);

define("USER_COLUMNS_TO_GET", [
    "id",
    "name",
    "email",
    "last_name",
    "job_title",
    "profileImage",
    "company_name",
    "country",
    "industry",
    "updated_at",
    "bio",
    "facebook_link",
    "twitter_link",
    "linkedin_link",
    "website_link",
    "company_website_link",
]);
/*
 * 1. Candidate Booth
 * 2. Sponsors & National Partners (With Foundation Booth)
 * 3. Vendors Booth
 */

define('EXPO_HALL_ROOMS', [
    [ "ca9d92bd-e5a1-4392-9659-b65d9c857310", "ExpoFloor 1" ],
    [ "d4021162-16a5-43a2-aba1-005ac9507717", "ExpoFloor 2" ],
]);

//Event Session Rooms
define('EVENT_ROOM_AUDI', "ZOOM_SDK");
define('EVENT_ROOM_CAUCUS', "CAUCUS");
define('EVENT_ROOM_WORKSHOP', "WORKSHOP");
define('WORKSHOP_ROOMS', [
    "Gynaecology",
    "Masri",
    "Nursing",
    "Palliative",
    "Pathology",
    "Pharmacy",
    "Radio Diagnosis",
    "Radio Therapy",
    "Surgery",
]);
define('WORKSHOP_ROOM_NAMES', [
    "AUDITORIUM" => "Auditorium",
    "Gynaecology" => "Gyne-oncology",
    "Masri" => "MASRI Research",
    "Nursing" => "Nursing",
    "Palliative" => "Palliative Care",
    "Pathology" => "Pathology",
    "Pharmacy" => "Pharmacy & Drug Discovery",
    "Radio Diagnosis" => "Radiology",
    "Radio Therapy" => "Radiation",
    "Surgery" => "Surgical"
]);


define('EVENT_ROOMS', [
    EVENT_ROOM_AUDI,
    "Gynaecology",
    "Masri",
    "Nursing",
    "Palliative",
	"Pathology",
	"Pharmacy",
	"Radio Diagnosis",
	"Radio Therapy",
	"Surgery",
]);

//Event Session Types
define('ZOOM_SDK', "ZOOM_SDK");
define('ZOOM_EXTERNAL', "ZOOM_EXTERNAL");
define('VIMEO_SESSION', "VIMEO_SESSION");
define('VIMEO_ZOOM_EX', "VIMEO_ZOOM_EX");
define('VIMEO_ZOOM_SDK', "VIMEO_ZOOM_SDK");
define('VIMEO_VIDEO_SDK', "VIMEO_VIDEO_SDK");
define('VIDEO_SDK', "VIDEO_SDK");

define("EVENT_SESSION_TYPES", [
    ZOOM_SDK,
    ZOOM_EXTERNAL,
    VIMEO_SESSION,
    VIMEO_ZOOM_EX,
    VIMEO_ZOOM_SDK,
    VIDEO_SDK,
    VIMEO_VIDEO_SDK
]);


//f=> Feather Icon 
//tt => Two Tone
//md => Material Design
define("MENU_ICONS",[
    "fe-home",
   "fe-bar-chart",
   "fe-briefcase",
    "fe-calendar",
    "fe-radio",
    "fe-clock",
    "fe-file-text",
    "fe-play-circle",
]);
define("MENU_ICONS_SVG",[
   "Agenda"=> "icons/Agenda.svg",
   "Attendees"=> "icons/Attendees.svg",
   "Auditorium"=> "icons/Auditorium.svg",
   "Award"=> "icons/Award.svg",
   "Badge"=> "icons/Badge.svg",
   "Donation"=> "icons/Donation.svg",
   "Download"=> "icons/Download.svg",
   "Email"=> "icons/Email.svg",
   "Expo-Hall"=> "icons/Expo-Hall.svg",
   "Feedback"=> "icons/Feedback.svg",
   "Games"=> "icons/Games.svg",
   "InfoDesk"=> "icons/InfoDesk.svg",
   "Leaderboard"=> "icons/Leaderboard.svg",
   "Lobby"=> "icons/Lobby.svg",
   "Log-OUt"=> "icons/Log-OUt.svg",
   "Login"=> "icons/Login.svg",
   "Museum"=> "icons/Museum.svg",
   "Music-Off"=> "icons/Music-Off.svg",
   "Music-on"=> "icons/Music-on.svg",
   "Networking-Lounge"=> "icons/Networking-Lounge.svg",
   "Notifications"=> "icons/Notifications.svg",
   "PDF"=> "icons/PDF.svg",
   "Personal-Agenda"=> "icons/Personal-Agenda.svg",
   "Photobooth"=> "icons/Photobooth.svg",
   "Profile"=> "icons/Profile.svg",
   "Q_A"=> "icons/Q_A.svg",
   "Reminder"=> "icons/Reminder.svg",
   "Shopping-Cart"=> "icons/Shopping-Cart.svg",
   "Speed-Dating"=> "icons/Speed-Dating.svg",
   "Swagbag-Icons"=> "icons/Swagbag-Icons.svg",
   "Upload"=> "icons/Upload.svg",
   "Video"=> "icons/Video.svg",
   "Workshop"=> "icons/Workshop.svg"
]);


define("MASTER_ROOMS",[
    "auditorium",
    "workshop_1",
    "workshop_2",
    "private",
    "general"
]);

define("CREATOR_TELLER_LINKS", [
    "51b46d28-6923-444d-9ab8-e3478bb6ff07" => "d01c8491-fd30-434b-bead-f17ddbe843e4", //NNC TELLER => NNC Moderator
    "500474c9-0227-4d30-a6c5-610cc30390fd" => "9ddfb8f9-799a-4b7e-bb52-eaa59fce6d6a", //NRS TELLER => NRS Moderator
]);

define("BY_LAWS_TELLER_ID", "280fd217-8106-46fc-a36b-c5c38b1a3823");

function whitelistDomain($domain){
 
    $process = new Process(['/home/eventdev/domain_vh.sh',$domain]);
    $process->run();

    // executes after the command finishes
    if (!$process->isSuccessful()) {
        throw new ProcessFailedException($process);
    }
}

function addSSL($domain)
{
    
    $process = new Process(['/home/eventdev/addssl.sh',$domain]);
    $process->run();

    // dd($process->getOutput());

    // executes after the command finishes
    if (!$process->isSuccessful()) {
        throw new ProcessFailedException($process);
    }
    
}

function addNewSSL($domain)
{
    
    $process = new Process(['/home/eventdev/addnewssl.sh',$domain]);
    $process->run();

    dd($process->getOutput());

    // executes after the command finishes
    if (!$process->isSuccessful()) {
        throw new ProcessFailedException($process);
    }
    
}

function api($var,$event_id,$default = ""){
    $api = Api::where("variable",$var)->where("event_id",$event_id)->first();
    if($api){
        return $api->key;
    }else{
        return $default;
    }
}


function getMenuLink($menu){
    $icon = asset($menu->iClass );
    switch(trim($menu->link_type)){

                    
                    
    case("zoom"):
    case("custom_page"):
            return <<<HTML
                    <a  target="_blank" href="$menu->link" >      
                    <img src="$icon" width="26" alt="">
   
                    <!-- <i style="font-size:24px;" class="$menu->iClass"></i> -->
                             $menu->name 
                    </a>
                <!-- </li> -->
HTML;

        break;
    case("chat_user"):
        return <<<HTML
                <a  class="chat_user" data-link="$menu->link" >    
                <img src="$icon" width="26" alt="">
   
                <!-- <i style="font-size:24px;" class="$menu->iClass"></i> -->
                         $menu->name 
                </a>
HTML;

        break;
    case("chat_group"):
        return <<<HTML
                <a   class="chat_group" data-link="$menu->link" > 
                        <!-- <i style="font-size:24px;" class="$menu->iClass"></i> -->
                        <img src="$icon" width="26" alt="">
                        $menu->name 
                </a>
HTML;
        break;
    case("pdf"):
        return <<<HTML
            <a  style="border:none !important;" class="_df_button" source=" assetUrl($menu->link) " >
                <!-- <i style="font-size:24px;" class="$menu->iClass"></i> -->
                <img src="$icon" width="26" alt="">
    
                $menu->name 
            </a>
HTML;
        break;
    case("booth"):
        return <<<HTML
            <a data-link="booth/$menu->link" class="area">
                <!-- <i style="font-size:24px;" class="$menu->iClass"></i> -->
                <img src="$icon" width="26" alt="">
    
                $menu->name 
            </a>
HTML;
        break;
    case("session_room"):
        return  <<<HTML
            <a data-link="sessionroom/$menu->link" class="area">
               <img src="$icon" width="26" alt="">
 
            <!-- <i style="font-size:24px;" class="$menu->iClass"></i> -->
                $menu->name 
            </a>
HTML;
        break;
    case("page"):
        return <<<HTML
                <a data-link="page/$menu->link" class="area">
                    <img src="$icon" width="26" alt="">
                         
                    <!-- <i style="font-size:24px;" class="$menu->iClass"></i> -->
                     $menu->name 
                </a>
HTML;
break;
    case("lobby"):
        return <<<HTML
                <a data-link="lobby" class="area">
                    <img src="$icon" width="26" alt="">

                    <!-- <i style="font-size:24px;" class="$menu->iClass"></i> -->
                     $menu->name 
                </a>
HTML;
    break;
    case("SwagBag"):
        return <<<HTML
                <a data-toggle="modal" data-target="#swagbag-modal">
                    <img src="$icon" width="26" alt="">

                    <!-- <i style="font-size:24px;" class="$menu->iClass"></i> -->
                     $menu->name 
                </a>
HTML;
    break;
    case("Leaderboard"):
        return <<<HTML
                <a class="area" data-link="leaderboard">
                    <img src="$icon" width="26" alt="">

                    <!-- <i style="font-size:24px;" class="$menu->iClass"></i> -->
                     $menu->name 
                </a>
HTML;
    break;
    case("Schedule"):
        return <<<HTML
                <a  data-toggle="modal" data-target="#schedule-modal">
                    <img src="$icon" width="26" alt="">

                    <!-- <i style="font-size:24px;" class="$menu->iClass"></i> -->
                     $menu->name 
                </a>
HTML;
    case("Library"):
        return <<<HTML
                <a  data-toggle="modal" data-target="#resources-modal">
                    <img src="$icon" width="26" alt="">

                    <!-- <i style="font-size:24px;" class="$menu->iClass"></i> -->
                     $menu->name 
                </a>
HTML;
    break;
    case("social_wall"):
        return <<<HTML
             <a class="area" data-link="attendees">
             <img src="$icon" width="26" alt="">
                 
             <!-- <i class="fe-users"></i> -->
             $menu->name</a>
HTML;

        break; 
    case("modal"):
        return <<<HTML
             <a data-toggle="modal" data-target="#$menu->link" class="_custom_modal">
             <img src="$icon" width="26" alt="">
                 
             <!-- <i class="fe-users"></i> -->
                 $menu->name</a>
HTML;

        break; 
    case("photobooth"):
            return <<<HTML
             <a class="photobooth area"  data-link="photo-booth"  data-capture="$menu->link" data-gallery="$menu->url" >
             <img src="$icon" width="26" alt="">
                 
             <!-- <i class="fe-users"></i> -->
                 $menu->name</a>
            HTML;
        
    break; 
    case("faq"):
        return <<<HTML
             <a   data-toggle="modal" data-target="#faqs-modal" >
             <img src="$icon" width="26" alt="">            
                 $menu->name</a>
HTML;

        break; 
    default:
        return <<<HTML
       
HTML;
    }
}



// function getLobbyLinks()
// {
//     $links = Link::where(["page"=>"lobby"])->get();
//     return $links;
// }

function imageUrl($image){
    $sourceUrl = "file:///G:/event/Development/public";
    return $sourceUrl.$image;
}
function getLobbyLinks($id)
{
    $lobby = "lobby_".$id;
    $links = Link::where(["page"=>$lobby])->get();
    return $links;
}
function getFilters($event_id)
{
    $ftags = [];
    $tags = UserSubtype::select("name")->where('event_id',$event_id)->distinct()->get()->toArray();
    foreach($tags as $tag){
        array_push($ftags,$tag["name"]);
    }
    return $ftags;

    // return UserSubtype::select("name")->where('event_id',$event_id)->get()->distinct()->toArray();
    // switch($filter){
    //     case "company_size":
    //       return  User::select("company_size")->distinct()->get()->toArray();
    //       break;
    //     case "mytags":
    //         return UserTag::select("tag")->where("tag_group","My Tags")->distinct()->get()->toArray();
    //         break;
    //     default :
    //         return UserTag::select("tag")->where("tag_group",$filter)->distinct()->get()->toArray();
    //         break;
    // }
}

function createMenus($event_id){
    $delfaultMenus =   ["lobby","library","schedule","swagbag","leaderboard","personalagenda","lounge","attendees"];
    foreach($delfaultMenus as $id=> $menu){
        // dd($menu);
        $menuitem = new Menu();
        $menuitem->name = $menu;
        $menuitem->link = "perm";
        $menuitem->event_id = $event_id;
        $menuitem->type = "nav";
        $menuitem->parent_id = 0;
        $menuitem->position = $id;
        $menuitem->save();
    }
    return true;
}


function createLeaderboard($event_id){
    $leaderboard = new Leaderboard;
    $leaderboard->color = #64D709;
    $leaderboard->event_id = $event_id;
    if($leaderboard->save()){
        $defaultpoints = ['Event Login','Viewing an On-demand Video','Viewing a document in the library','Viewing a live streaming','Visiting a booth'];
        for($i = 0 ; $i < count($defaultpoints) ; $i++){
            LeadPoint::create(['owner'=>$leaderboard->id,'point'=>$defaultpoints[$i]]);
        }
        return True;
    }
   return False;
}

function getRooms(){
    $sessionrooms = sessionRooms::all()->groupBy("master_room");
    $sessionroomnames = [];
    foreach($sessionrooms as $master_room=>$rooms){
            $roomnames = [];
            foreach($rooms as $room ){
                array_push($roomnames,$room->name);
            }
            $sessionroomnames[$master_room] = $roomnames;
     }
     return $sessionroomnames;
}

function getRoomsEventee($id){
    $sessionrooms = sessionRooms::where('event_id',$id)->get();
    return $sessionrooms;  
}
function getAllFields($id = null)
{
    if($id){
        return Content::where("event_id",($id))->get();
    }
    return ContentMaster::all();
}

function getField($name,$default = "")
{
    $content = Content::where("name", $name)->where('event_id',null)->first();
    return $content ? $content->value : $default;
}
function getFieldId($name,$id=null, $default = "")
{
    if(Content::where("name", $name)->where('event_id',null)->count()>0){
        $default = Content::where("name", $name)->where('event_id',null)->first()->value;
    }
   
    $content = Content::where("name", $name)->where('event_id',$id);
    if($content->count()>0 &&  $content->first()->value){
         return $content->first()->value;
    }
    else{
       return $default;    
    }
   
}


function createField($name, $type = "text", $section = CMS_SECTIONS[0], $value = ""){
    $existing = Content::where("name", $name)->first();
    if($existing){
        return $existing;
    }
    $content = Content::create([
        "name" => $name,
        "type" => $type,
        "section" => $section,
        "value" => $value
    ]);
    return $content;
}

function getBooths()
{
    return Auth::User()->load("booths")->booths;
}

function getModeratorSessions()
{
    return Auth::User()->load("event_session.session")->event_session;
}

function getboothImages()
{
    return BOOTH_IMAGE_AREA_SLOTS;
}


function areaStyles($area)
{
    if(count($area) == 3){
        return "top: $area[0]%;left: $area[1]%;width: $area[2]%;";
    }
    return "top: $area[0]%;left: $area[1]%;width: $area[2]%;height: $area[3]%;";
}

function assetUrl($url = "")
{
    return env("UPLOADS_FILE_DRIVER") === "spaces" ? ( env("DO_PUBLIC_URL") . $url ):( env("AWS_URL") . $url);
}

function storageUrl($url = "")
{
    return "https://storage.googleapis.com/fits/" . $url;
}

function getScavengerItems($page)
{
    // return "";
    $toReturn = "";
    if (isset(SCAVENGER_HUNT[$page])) {
        foreach (SCAVENGER_HUNT[$page] as $index => $item) {
            $toReturn .= "
            <div class='scavenger-item positioned' data-page='$page' data-index='$index' style='" . areaStyles($item['area']) . "' data-name='" . $item['name'] . "' title='" . $item['name'] . "' >
                <img async class='fill positioned' src='" . asset($item['image']) . "' style='object-fit:contain;' alt='' />
            </div>
            ";
        }
    }
    return $toReturn;
}
function getTreasureItems($treasures,$page_name)
{
    // return "";
    $toReturn = "";
    foreach ($treasures as $index => $treasure) {
        $toReturn .= "
        <div class='scavenger-item positioned' data-page='".$page_name."' data-index='$index' style='" . areaStyles([$treasure->top,$treasure->left,$treasure->width,$treasure->height]) . "' data-name='treasure_hunt_item' title='treasure_hunt_item' >
            <img async class='fill positioned' src='" . assetUrl($treasure->url) . "' style='object-fit:contain;' alt='' />
        </div>
        ";
    }
    return $toReturn;
}
function getLobbyItems($event_id)
{
    
    // return "";
    $toReturn = "";
    $treasures = Treasure::where(["owner"=>"lobby_".$event_id])->get();
    foreach ($treasures as $index => $treasure) {
        $toReturn .= "
        <div class='scavenger-item positioned' data-page='lobby' data-index='$index' style='" . areaStyles([$treasure->top,$treasure->left,$treasure->width,$treasure->height]) . "' data-name='treasure_hunt_item_$index' title='treasure_hunt_item_$index' >
            <img async class='fill positioned' src='" . assetUrl($treasure->url) . "' style='object-fit:contain;' alt='' />
        </div>
        ";
    }
    return $toReturn;
}

define("PERMANANT_SWAGS",[
//    ["id" => "1","resource"=>["url"=>"https://congress2021web.fra1.digitaloceanspaces.com/uploads/qs2ZHWlxEsbj8VYpjn13OhInfd73q6I9ukKWpRfw.pdf","title"=>"Eastern Area Conference Souvenir Journal.pdf"],"permanent"=>true],
//    ["id" => "2","resource"=>["url"=>"https://congress2021web.fra1.digitaloceanspaces.com/uploads/Rfhxtx3NUawwnzLBoSPPtdHp2yEUXctnFV4xlFss.pdf","title"=>"EA Conference Highlights Expanded.pdf"],"permanent"=>true]
]);


/**
 * @param string $templateId Template ID
 * @param string $email Email to which you want to send the mail
 * @param array $content Associative array for populating the data in the template
 * @return bool **TRUE** if response status is `2xx`, otherwise **FALSE**
 */
function sendMail($templateId, $email, $content)
{
    $sg = new SendGrid(env("SG_API"));
    $email = strtolower($email);
    $from = new From(env("SG_FROM_MAIL"), env("SG_FROM_NAME"));

    $to = new To($email);

    $sgmail = new Mail($from, $to);
    $sgmail->setTemplateId($templateId);
    $sgmail->addDynamicTemplateDatas($content);
    try {
        $response = $sg->send($sgmail);
        return $response->statusCode() == 202;
    } catch (Exception $th) {
        return FALSE;
    }
}

function sendNotifications()
{
    $response = Http::withHeaders([
        "Authorization" => "Basic " . env("ONESIGNAL_API_KEY"),
    ])->post('https://onesignal.com/api/v1/notifications', [
        "app_id" => env("ONESIGNAL_APP_ID"),
        "template_id" => env("ONESIGNAL_POLL_START_TEMPLATE"),
        "included_segments" => [
            "Delegates"
        ],
        "url" => route("event") . "#faq", //We can customize this url to give the poll page route and frontend can show the Route as per need
    ]);
    return $response;
}

/**
 * @param string $title Title of the notification
 * @param string $message Message body of the notifiction
 * @param string $url Action URL (Optional)
 * @param array $segments Segments of users to send the message
 * @return \Illuminate\Http\Client\Response
 */
function sendGeneralNotification($title, $message, $url = NULL, $segments = ["All"])
{
    $response = NULL;
    if ($url) {
        $response = Http::withHeaders([
            "Authorization" => "Basic " . env("ONESIGNAL_API_KEY")
        ])
            ->post("https://onesignal.com/api/v1/notifications", [
                "app_id" => env("ONESIGNAL_APP_ID"),
                "url" => $url,
                "included_segments" => $segments,
                "headings" => array("en" => $title),
                "contents" => array("en" => $message)
            ]);
    } else {
        $response = Http::withHeaders([
            "Authorization" => "Basic " . env("ONESIGNAL_API_KEY")
        ])
            ->post("https://onesignal.com/api/v1/notifications", [
                "app_id" => env("ONESIGNAL_APP_ID"),
                "included_segments" => $segments,
                "headings" => array("en" => $title),
                "contents" => array("en" => $message)
            ]);
    }

    return $response;
}

/**
 * @param Poll $poll Poll to check
 * @return int Status of poll (0 = Yet to begin, 1 = Ongoing, 2 = Complete)
 */
function checkPollStatus(Poll $poll, $checkBoundaries = true, $checkStatus = false){
    if($poll->status == 2){
        return 2;
    }
    if($checkBoundaries){
        if($poll->start_date->startOf("day")->isPast()){
            if($poll->end_date->endOf("day")->isPast()){
                //End of day is in past - poll completed
                return 2;
            }
            return 1;
        }
        //Start of day is in future so not started
        return 0;
    }
    //Check precision date/time
    if($poll->start_date->isPast()){
        if($poll->end_date->isPast()){
            //End date is in past - poll completed
            return 2;
        }
        return 1;
    }
    //Start date is in future so not started
    return 0;
}
function generateSignature( $meeting_number ){
    $api_key = env("ZOOM_API_KEY");
    $api_secret = env("ZOOM_API_SECRET");
    $role = 0; //Attendee

    $time = time() * 1000 - 30000;//time in milliseconds (or close enough)

    $data = base64_encode($api_key . $meeting_number . $time . $role);

    $hash = hash_hmac('sha256', $data, $api_secret, true);

    $_sig = $api_key . "." . $meeting_number . "." . $time . "." . $role . "." . base64_encode($hash);

    //return signature, url safe base64 encoded
    return rtrim(strtr(base64_encode($_sig), '+/', '-_'), '=');
}

function getZoomParameters($meeting_number, $password){
    $user = Auth::user();
    if(!$user) return false;
    $api_key = env("ZOOM_API_KEY");
    $name = $user->name ? $user->name : "Anonymous";
    if($user->last_name){
        $name .= " ". $user->last_name;
    }
    $parameters = [
        "name" => base64_encode($name),
        "email" => base64_encode($user->email),
        "mn" => $meeting_number,
        "pwd" => $password,
        "role" => 0, //Attendee always
        "lang" => "en-US",
        "signature" => generateSignature($meeting_number),
        "china" => 0,
        "apiKey" => $api_key
    ];
    return $parameters;
}

function getVideoOptions($meetingid){
    
    if(Auth::user()){
        $user  =  Auth::user();
        $name = Auth::user() ? Auth::user()->name : "Guest";
        $admin = $user->type === "speaker" ?  true : false;
    }

    $apiKey= env("VIDEO_SDK_API");


     $config = [
        "name"=> $name,
        "apiKey"=>$apiKey,
        "meetingId"=>$meetingid,

        "containerId"=>"video",
      
        "micEnabled"=>false,
        "webcamEnabled"=>false,
        "participantCanToggleSelfWebcam"=>true,
        "participantCanToggleSelfMic"=>true,

        "chatEnabled"=>true,
        "screenShareEnabled"=>true,
        "pollEnabled"=>true,
        "whiteBoardEnabled"=>true,
        "raiseHandEnabled"=>true,

        "recordingEnabled"=>true,
        "recordingWebhookUrl"=>"https://www.videosdk.live/callback",
        "participantCanToggleRecording"=>false,

        "brandingEnabled"=>false,
        "brandLogoURL"=>"",
        "brandName"=>"",
        "poweredBy"=>false,

        "participantCanLeave"=>true, // if false, leave button won't be visible

        // Live stream meeting to youtube
        "livestream"=>[
            "autoStart"=>true,
            "outputs"=>[
                // {
                //   url=>"rtmp://x.rtmp.youtube.com/live2",
                //   streamKey=>"<STREAM KEY FROM YOUTUBE>",
                // },
            ],
        ],
        "permissions"=>[
            "askToJoin"=>false, // Ask joined participants for entry in meeting
            "toggleParticipantMic"=>true, // Can toggle other participant's mic
            "toggleParticipantWebcam"=>true, // Can toggle other participant's webcam
        ],

        "joinScreen"=>[
            "visible"=>false, // Show the join screen ?
            "title"=>"Daily scrum", // Meeting title
            "meetingUrl"=>"", // Meeting joining url
        ],
    ];
}

function getPollNonVoters($pollId,$userType = false){
    return [];
    $toShow = ["id", "name", "email", "type", "last_name", "member_id", "region_name" ];
    if($userType){
        $users = User::whereType($userType)->get(["id"]);
    }else{
        $users = User::get(["id"]);
    }
    $ids_all = array_map(function ($user) {
        return $user["id"];
    }, $users->toArray());

    $voters = Vote::whereStatus(1)->whereIn("user_id", $ids_all)->where("poll_id", $pollId)->get(["user_id"]);


    $ids_voters = array_map(function ($user) {
        return $user["user_id"];
    }, $voters->toArray());

    $result = array_diff($ids_all, $ids_voters);
    if($userType){
        $nonVoters = User::where("type", $userType)->whereIn("id", $result)->get($toShow);
    }else{
        $nonVoters = User::whereIn("id", $result)->get($toShow);
    }

    return $nonVoters;
}

function toShowCandidateBooth($id = ''){
     return true;
    if($id == CANDIDATES_BOOTH_ROOM){
        return false;
        $now = Date::now();
        $showAfter = Date::parse("Friday 4:00 PM");
        $showBefore = Date::parse("Friday 6:00 PM");
        return $now->isDayOfWeek(Carbon::FRIDAY) && $now->isBetween($showAfter, $showBefore);
    }
    return true; 
}

function getSessionPoll(EventSession $session, $sendPoll = false){
    $polls = $session->load([
        "polls.poll.questions.options"
    ])->polls;
    foreach ($polls as $poll) {
        if(
            $poll->poll->status &&
            $poll->poll->status != 2 &&
            $poll->poll->start_date &&
            $poll->poll->start_date->isPast() &&
            $poll->poll->end_date &&
            !$poll->poll->end_date->isPast()
        ){
            if($sendPoll){
                return $poll;
            }
            return $poll->poll;
        }
    }
    return false;
}

function isSessionActive(EventSession $session){
    return $session->start_time && $session->start_time->isPast() && $session->end_time && !$session->end_time->add(5, "mins")->isPast();
}

function getCurrentSession($where,$event_id){
    $sessions = EventSession::where("room", $where)->where("event_id",$event_id)->get();
    foreach ($sessions as $session){
        if(isSessionActive($session)){
           return $session;
        }
    }
    return false;
}

function getTellerPolls(){
    $user = Auth::user();
    $polls = [];
    if(isset(CREATOR_TELLER_LINKS[$user->id])){
        $creator = CREATOR_TELLER_LINKS[$user->id];
        $curatedPolls = SessionPoll::where("creator", $creator)->get();
        $pollIds = [];
        foreach ($curatedPolls as $poll){
            $pollIds[] = $poll->poll_id;
        }
        $polls = Poll::with("questions")->whereIn("id", $pollIds)->orderBy("created_at", "desc")->get();
    }else if(BY_LAWS_TELLER_ID === $user->id){
        $polls[] = Poll::where("id", BY_LAWS_POLL)->orderBy("created_at", "desc")->withCount("questions")->first();
    }
    return $polls;
}

function getPastSessionVideos(){
    return ArchiveVideos::all();
}

function isOpenForPublic($item){
//     return true;
    // "chat",
    // "lounge",
    // "photo-booth",
    // "booths",
    // "leaderboard",
    // "delegates",
    // "swagbag",
    // "library"
    $itemsLocked = [
        "meet-and-greet",
//        "caucus",
    ];
    return !in_array($item,$itemsLocked);
}

function getLoginVars(){
    return [
        "field" => "email",
        "placeholder" => "Email",
        "text" => "Enter email address",
        "label" => "Enter your email to login "
    ];
}

function array_group_by($array,$field){

}

function getProfileDetails($user = false){
    if(!$user){
        $user = Auth::user();
    }
    if(!$user->tags || !$user->looking_for_tags || !$user->interests){
        $user->load([
            "tags",
            "looking_for_tags",
            "interests",
        ]);
    }
    // dd($user);
    // $newtags = [];
    // foreach($user->tags as $tag){
    //         $newtags[$tag->tag_group][] = $tag ;
    // }
    // $user->tags = $newtags;
    // $newlookingfortags = [];
    // foreach($user->looking_for_tags as $tag){
    //         $newlookingfortags[$tag->tag_group][] = $tag ;
    // }
    // $user->looking_for_tags = $newlookingfortags;
    // dd($newtags);
    $toSend = [
        "user" => $user,
    ];
    return $toSend;
}

function checkUserConnection($userId, $connectionId){
    //TODO: Make Connetions table and check from table if user is connected or not
    return $userId === $connectionId;
}

function setUserConnectionStatus($users, $currentUser = false, $removeIds = false){
    if(!is_array($users)){
        $users = $users->toArray();
    }
    if(!$currentUser){
        $currentUser = Auth::user();
    }
    foreach ($users as $index => $user){
        $connection = getConnection($user['id'], $currentUser->id);
        $contact = Contact::where("user_id", $currentUser->id)->where("contact_id", $user['id'])->select("id")->first();
        if($connection){
            $users[$index] = array_merge($user, $connection);
        }
        if(!$connection || $connection['connection_status'] !== 1){
            unset($users[$index]["email"]);
        }
        if($contact){
            $users[$index]["is_contact"] = true;
        }
        if($removeIds){
            unset($users[$index]['id']);
            unset($users[$index]['is_contact']);
            unset($users[$index]['updated_at']);
        }
    }
    return $users;
}

function getConnection($userId, $connectionId, $type = "sent"){
    $conn = UserConnection::where("connection_id", $userId)->where("user_id", $connectionId)->select(["status", "id"])->first();
    if($conn){
        return [
            'connection_status' => $conn->status,
            'connection_id' => $conn->id,
            'connection_type' => $type,
        ];
    }else if($type === "sent"){
        return getConnection($connectionId, $userId,"received");
    }
    return false;
}

function getContact($user, $currentUser = false){
    if(!$currentUser){
        $currentUser = Auth::user()->id;
    }
    $contact = Contact::where("user_id", $currentUser)->where("contact_id", $user)->select("id")->first();
    if($contact){
        return $contact->id;
    }
    return false;
}

function getSuggestedTags(){
    // $toSend = [
    //     "Clinical Oncology",
    //     "Radiation Oncology",
    //     "Medical Oncology",
    //     "Radiology",
    //     "Gynecology",
    //     "Surgical Oncology",
    //     "Pathology",
    //     "Clinical Pathology",
    //     "Clinical Pharmacy",
    //     "Physics",
    //     "Radiotherapist",
    //     "Biochemistry",
    //     "Community",
    //     "Immunology",
    //     "Medical Statistics",
    //     "Palliative Care"
    // ];
    // $toSend = [];
   $tags = \App\UserTag::all()->groupBy("tag_group");
//    foreach ($tags as $tag) {
//        $toSend[] = $tag;
//    }
    return $tags;
}

function getSchedule($event_id){
    $schedule = [];
    $eventsLineup = EventSession::where("event_id",$event_id)->orderBy("start_time")->with("speakers.speaker")->get()->load(["parentroom","resources"]);
    foreach ($eventsLineup as $event){
        if(!isset($schedule[$event->room])){
            $schedule[$event->room] = [];
        }
        $now = Carbon::now("UTC");
        $status = 0; //Not Started
        if($now->isAfter($event->end_time)){
            $status = -1; //Already ended
        }else if($now->isBetween($event->start_time,$event->end_time)){
            $status = 1; //Ongoing
        }else if($now->clone()->add(15, "minutes")->isAfter($event->start_time)){
            $status = 3; //Starting soon
        }
        if($event->start_time && $event->end_time){
            $schedule[$event->room][$event->id] = [
                "start_time" => $event->start_time->utc()->toString(),
                "start_date" => [
                    "m" => $event->start_time->format("l, M dS"),
                    "dts" => $event->start_time->format("h:i A"),
                    "dte" => $event->end_time->format("h:i A"),
                ],
                "end_time" => $event->end_time->toString(),
                "status" => $status,
                "name" => $event->name,
                "resources" => $event->resources,
                "description" => $event->description,
                "speakers" => $event->speakers,
                "recording" => $event->past_video ? $event->past_video : false,
                "room"=> $event->parentroom->name ?? $event->room,
                "type" => $event->type,
                "zoom_url"=>$event->zoom_url??'',
            ];
        }
    }
    return $schedule;
}
// function getSchedule(){
//     $schedule = [];
//     $eventsLineup = EventSession::orderBy("start_time")->with("speakers.speaker")->get();
//     foreach ($eventsLineup as $event){
//         if(!isset($schedule[$event->room])){
//             $schedule[$event->room] = [];
//         }
//         $now = Carbon::now("UTC");
//         $status = 0; //Not Started
//         if($now->isAfter($event->end_time)){
//             $status = -1; //Already ended
//         }else if($now->isBetween($event->start_time,$event->end_time)){
//             $status = 1; //Ongoing
//         }else if($now->clone()->add(15, "minutes")->isAfter($event->start_time)){
//             $status = 3; //Starting soon
//         }
//         if($event->start_time && $event->end_time){
//             $schedule[$event->room][$event->id] = [
//                 "start_time" => $event->start_time->utc()->toString(),
//                 "start_date" => [
//                     "m" => $event->start_time->format("l, M dS"),
//                     "dts" => $event->start_time->format("h:i A"),
//                     "dte" => $event->end_time->format("h:i A"),
//                 ],
//                 "end_time" => $event->end_time->toString(),
//                 "status" => $status,
//                 "name" => $event->name,
//                 "description" => $event->description,
//                 "speakers" => $event->speakers,
//                 "recording" => $event->past_video ? $event->past_video : false,
//             ];
//         }
//     }
//     return $schedule;
//// }

function getRoomRoute($room){
    $roomRouteMap = [
        "AUDITORIUM" => "auditorium",
        "WORKSHOP" => "workshop",
    ];
    if(isset($roomRouteMap[$room])){
        return $roomRouteMap[$room];
    }
    return false;
}

function getSlidoConfig(){
    $roomSlidoMap = [];
    foreach (EVENT_ROOMS as $ROOM){
        $roomSlidoMap[$ROOM] = getField($ROOM."_Slido", "");
    }
    return $roomSlidoMap;
}

function UpdateEnv($key,$value){
    $path = base_path('.env');
    try{
         if(file_exists($path)){
            if(env($key)){
                return false;
            }
            else{
                $content = PHP_EOL.$key .'= '."'".$value."'";
            // file_put_contents($path, '\n',FILE_APPEND);
                file_put_contents($path, $content,FILE_APPEND);
            }
            

         }
    }
    catch(\Exception $e){
        Log::error($e->getMessage());
    }
  
    
}

function UniqueEmail($email,$id){
     $exist = User::where('email',$email)->where('event_id', ($id))->count();
     if($exist > 0){
         return 1;
     }
     else{
         return 0;
     }
 } 

function SaveMenu($menu,$position = null){
        
        if(isset($menu['children'])){
            
            foreach($menu['children'] as $pos =>$child){
                $mMenu = Menu::findOrFail($child['id']);
                $mMenu->parent_id = $menu['id'];
                $mMenu->save();
               if(isset($child['children'])){
                 SaveMenu($child,$pos);
               }
            }
        
        }
        
         $mMneu = Menu::findOrFail($menu['id']);
         $mMneu->position = $position;
         $mMneu->save();
       
        
    
        
}

function EventAttendee($event_id){
    $user = new User;
    $user->name = 'Attendee';
    $user->last_name = 'User';
    $user->email = 'attendee@eventstub.co';
    $user->type = 'attendee';
    $user->event_id = $event_id;
    if($user->save()){
        return 1;
    }
    else{
        return 0;
    }

}

function LandPage($event_id){
    $page = new LandingPage;
    $page->event_id = $event_id;
    $page->save();
}

function getDomain($event_id){
    $event = Event::findOrFail($event_id);
    if($event->domain == null){
        return $event->link;
    }
    else{
        return $event->domain;
    }
}

function CreateTemplate($event_id){
    $template = new Template;
    $template->event_id = $event_id;
    $template->subject = null;
    $template->message = null;
    $template->save();
}
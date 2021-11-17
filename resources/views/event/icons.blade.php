<style>
@charset "UTF-8";
/*
Template Name: Ubold - Responsive Bootstrap 4 Admin Dashboard
Version: 4.0.0
Author: CoderThemes
Email: support@coderthemes.com
File: Icons Css File
*/
@font-face {
  font-family: "dripicons-v2";
  src: {{ asset("assets/fonts/dripicons-v2.eot")}};
  src: {{ asset("assets/fonts/dripicons-v2.eot?#iefix")}} format("embedded-opentype"), {{ asset("assets/fonts/dripicons-v2.woff") }}format("woff"), {{ asset("assets/fonts/dripicons-v2.ttf")}} format("truetype"), {{ asset("assets/fonts/dripicons-v2.svg#dripicons-v2")}} format("svg");
  font-weight: normal;
  font-style: normal; }

[data-icon]:before {
  font-family: "dripicons-v2" !important;
  content: attr(data-icon);
  font-style: normal !important;
  font-weight: normal !important;
  font-variant: normal !important;
  text-transform: none !important;
  speak: none;
  line-height: 1;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale; }

[class^="dripicons-"]:before,
[class*=" dripicons-"]:before {
  font-family: "dripicons-v2" !important;
  font-style: normal !important;
  font-weight: normal !important;
  font-variant: normal !important;
  text-transform: none !important;
  speak: none;
  line-height: 1;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale; }

.dripicons-alarm:before {
  content: "\61"; }

.dripicons-align-center:before {
  content: "\62"; }

.dripicons-align-justify:before {
  content: "\63"; }

.dripicons-align-left:before {
  content: "\64"; }

.dripicons-align-right:before {
  content: "\65"; }

.dripicons-anchor:before {
  content: "\66"; }

.dripicons-archive:before {
  content: "\67"; }

.dripicons-arrow-down:before {
  content: "\68"; }

.dripicons-arrow-left:before {
  content: "\69"; }

.dripicons-arrow-right:before {
  content: "\6a"; }

.dripicons-arrow-thin-down:before {
  content: "\6b"; }

.dripicons-arrow-thin-left:before {
  content: "\6c"; }

.dripicons-arrow-thin-right:before {
  content: "\6d"; }

.dripicons-arrow-thin-up:before {
  content: "\6e"; }

.dripicons-arrow-up:before {
  content: "\6f"; }

.dripicons-article:before {
  content: "\70"; }

.dripicons-backspace:before {
  content: "\71"; }

.dripicons-basket:before {
  content: "\72"; }

.dripicons-basketball:before {
  content: "\73"; }

.dripicons-battery-empty:before {
  content: "\74"; }

.dripicons-battery-full:before {
  content: "\75"; }

.dripicons-battery-low:before {
  content: "\76"; }

.dripicons-battery-medium:before {
  content: "\77"; }

.dripicons-bell:before {
  content: "\78"; }

.dripicons-blog:before {
  content: "\79"; }

.dripicons-bluetooth:before {
  content: "\7a"; }

.dripicons-bold:before {
  content: "\41"; }

.dripicons-bookmark:before {
  content: "\42"; }

.dripicons-bookmarks:before {
  content: "\43"; }

.dripicons-box:before {
  content: "\44"; }

.dripicons-briefcase:before {
  content: "\45"; }

.dripicons-brightness-low:before {
  content: "\46"; }

.dripicons-brightness-max:before {
  content: "\47"; }

.dripicons-brightness-medium:before {
  content: "\48"; }

.dripicons-broadcast:before {
  content: "\49"; }

.dripicons-browser:before {
  content: "\4a"; }

.dripicons-browser-upload:before {
  content: "\4b"; }

.dripicons-brush:before {
  content: "\4c"; }

.dripicons-calendar:before {
  content: "\4d"; }

.dripicons-camcorder:before {
  content: "\4e"; }

.dripicons-camera:before {
  content: "\4f"; }

.dripicons-card:before {
  content: "\50"; }

.dripicons-cart:before {
  content: "\51"; }

.dripicons-checklist:before {
  content: "\52"; }

.dripicons-checkmark:before {
  content: "\53"; }

.dripicons-chevron-down:before {
  content: "\54"; }

.dripicons-chevron-left:before {
  content: "\55"; }

.dripicons-chevron-right:before {
  content: "\56"; }

.dripicons-chevron-up:before {
  content: "\57"; }

.dripicons-clipboard:before {
  content: "\58"; }

.dripicons-clock:before {
  content: "\59"; }

.dripicons-clockwise:before {
  content: "\5a"; }

.dripicons-cloud:before {
  content: "\30"; }

.dripicons-cloud-download:before {
  content: "\31"; }

.dripicons-cloud-upload:before {
  content: "\32"; }

.dripicons-code:before {
  content: "\33"; }

.dripicons-contract:before {
  content: "\34"; }

.dripicons-contract-2:before {
  content: "\35"; }

.dripicons-conversation:before {
  content: "\36"; }

.dripicons-copy:before {
  content: "\37"; }

.dripicons-crop:before {
  content: "\38"; }

.dripicons-cross:before {
  content: "\39"; }

.dripicons-crosshair:before {
  content: "\21"; }

.dripicons-cutlery:before {
  content: "\22"; }

.dripicons-device-desktop:before {
  content: "\23"; }

.dripicons-device-mobile:before {
  content: "\24"; }

.dripicons-device-tablet:before {
  content: "\25"; }

.dripicons-direction:before {
  content: "\26"; }

.dripicons-disc:before {
  content: "\27"; }

.dripicons-document:before {
  content: "\28"; }

.dripicons-document-delete:before {
  content: "\29"; }

.dripicons-document-edit:before {
  content: "\2a"; }

.dripicons-document-new:before {
  content: "\2b"; }

.dripicons-document-remove:before {
  content: "\2c"; }

.dripicons-dot:before {
  content: "\2d"; }

.dripicons-dots-2:before {
  content: "\2e"; }

.dripicons-dots-3:before {
  content: "\2f"; }

.dripicons-download:before {
  content: "\3a"; }

.dripicons-duplicate:before {
  content: "\3b"; }

.dripicons-enter:before {
  content: "\3c"; }

.dripicons-exit:before {
  content: "\3d"; }

.dripicons-expand:before {
  content: "\3e"; }

.dripicons-expand-2:before {
  content: "\3f"; }

.dripicons-experiment:before {
  content: "\40"; }

.dripicons-export:before {
  content: "\5b"; }

.dripicons-feed:before {
  content: "\5d"; }

.dripicons-flag:before {
  content: "\5e"; }

.dripicons-flashlight:before {
  content: "\5f"; }

.dripicons-folder:before {
  content: "\60"; }

.dripicons-folder-open:before {
  content: "\7b"; }

.dripicons-forward:before {
  content: "\7c"; }

.dripicons-gaming:before {
  content: "\7d"; }

.dripicons-gear:before {
  content: "\7e"; }

.dripicons-graduation:before {
  content: "\5c"; }

.dripicons-graph-bar:before {
  content: "\e000"; }

.dripicons-graph-line:before {
  content: "\e001"; }

.dripicons-graph-pie:before {
  content: "\e002"; }

.dripicons-headset:before {
  content: "\e003"; }

.dripicons-heart:before {
  content: "\e004"; }

.dripicons-help:before {
  content: "\e005"; }

.dripicons-home:before {
  content: "\e006"; }

.dripicons-hourglass:before {
  content: "\e007"; }

.dripicons-inbox:before {
  content: "\e008"; }

.dripicons-information:before {
  content: "\e009"; }

.dripicons-italic:before {
  content: "\e00a"; }

.dripicons-jewel:before {
  content: "\e00b"; }

.dripicons-lifting:before {
  content: "\e00c"; }

.dripicons-lightbulb:before {
  content: "\e00d"; }

.dripicons-link:before {
  content: "\e00e"; }

.dripicons-link-broken:before {
  content: "\e00f"; }

.dripicons-list:before {
  content: "\e010"; }

.dripicons-loading:before {
  content: "\e011"; }

.dripicons-location:before {
  content: "\e012"; }

.dripicons-lock:before {
  content: "\e013"; }

.dripicons-lock-open:before {
  content: "\e014"; }

.dripicons-mail:before {
  content: "\e015"; }

.dripicons-map:before {
  content: "\e016"; }

.dripicons-media-loop:before {
  content: "\e017"; }

.dripicons-media-next:before {
  content: "\e018"; }

.dripicons-media-pause:before {
  content: "\e019"; }

.dripicons-media-play:before {
  content: "\e01a"; }

.dripicons-media-previous:before {
  content: "\e01b"; }

.dripicons-media-record:before {
  content: "\e01c"; }

.dripicons-media-shuffle:before {
  content: "\e01d"; }

.dripicons-media-stop:before {
  content: "\e01e"; }

.dripicons-medical:before {
  content: "\e01f"; }

.dripicons-menu:before {
  content: "\e020"; }

.dripicons-message:before {
  content: "\e021"; }

.dripicons-meter:before {
  content: "\e022"; }

.dripicons-microphone:before {
  content: "\e023"; }

.dripicons-minus:before {
  content: "\e024"; }

.dripicons-monitor:before {
  content: "\e025"; }

.dripicons-move:before {
  content: "\e026"; }

.dripicons-music:before {
  content: "\e027"; }

.dripicons-network-1:before {
  content: "\e028"; }

.dripicons-network-2:before {
  content: "\e029"; }

.dripicons-network-3:before {
  content: "\e02a"; }

.dripicons-network-4:before {
  content: "\e02b"; }

.dripicons-network-5:before {
  content: "\e02c"; }

.dripicons-pamphlet:before {
  content: "\e02d"; }

.dripicons-paperclip:before {
  content: "\e02e"; }

.dripicons-pencil:before {
  content: "\e02f"; }

.dripicons-phone:before {
  content: "\e030"; }

.dripicons-photo:before {
  content: "\e031"; }

.dripicons-photo-group:before {
  content: "\e032"; }

.dripicons-pill:before {
  content: "\e033"; }

.dripicons-pin:before {
  content: "\e034"; }

.dripicons-plus:before {
  content: "\e035"; }

.dripicons-power:before {
  content: "\e036"; }

.dripicons-preview:before {
  content: "\e037"; }

.dripicons-print:before {
  content: "\e038"; }

.dripicons-pulse:before {
  content: "\e039"; }

.dripicons-question:before {
  content: "\e03a"; }

.dripicons-reply:before {
  content: "\e03b"; }

.dripicons-reply-all:before {
  content: "\e03c"; }

.dripicons-return:before {
  content: "\e03d"; }

.dripicons-retweet:before {
  content: "\e03e"; }

.dripicons-rocket:before {
  content: "\e03f"; }

.dripicons-scale:before {
  content: "\e040"; }

.dripicons-search:before {
  content: "\e041"; }

.dripicons-shopping-bag:before {
  content: "\e042"; }

.dripicons-skip:before {
  content: "\e043"; }

.dripicons-stack:before {
  content: "\e044"; }

.dripicons-star:before {
  content: "\e045"; }

.dripicons-stopwatch:before {
  content: "\e046"; }

.dripicons-store:before {
  content: "\e047"; }

.dripicons-suitcase:before {
  content: "\e048"; }

.dripicons-swap:before {
  content: "\e049"; }

.dripicons-tag:before {
  content: "\e04a"; }

.dripicons-tag-delete:before {
  content: "\e04b"; }

.dripicons-tags:before {
  content: "\e04c"; }

.dripicons-thumbs-down:before {
  content: "\e04d"; }

.dripicons-thumbs-up:before {
  content: "\e04e"; }

.dripicons-ticket:before {
  content: "\e04f"; }

.dripicons-time-reverse:before {
  content: "\e050"; }

.dripicons-to-do:before {
  content: "\e051"; }

.dripicons-toggles:before {
  content: "\e052"; }

.dripicons-trash:before {
  content: "\e053"; }

.dripicons-trophy:before {
  content: "\e054"; }

.dripicons-upload:before {
  content: "\e055"; }

.dripicons-user:before {
  content: "\e056"; }

.dripicons-user-group:before {
  content: "\e057"; }

.dripicons-user-id:before {
  content: "\e058"; }

.dripicons-vibrate:before {
  content: "\e059"; }

.dripicons-view-apps:before {
  content: "\e05a"; }

.dripicons-view-list:before {
  content: "\e05b"; }

.dripicons-view-list-large:before {
  content: "\e05c"; }

.dripicons-view-thumb:before {
  content: "\e05d"; }

.dripicons-volume-full:before {
  content: "\e05e"; }

.dripicons-volume-low:before {
  content: "\e05f"; }

.dripicons-volume-medium:before {
  content: "\e060"; }

.dripicons-volume-off:before {
  content: "\e061"; }

.dripicons-wallet:before {
  content: "\e062"; }

.dripicons-warning:before {
  content: "\e063"; }

.dripicons-web:before {
  content: "\e064"; }

.dripicons-weight:before {
  content: "\e065"; }

.dripicons-wifi:before {
  content: "\e066"; }

.dripicons-wrong:before {
  content: "\e067"; }

.dripicons-zoom-in:before {
  content: "\e068"; }

.dripicons-zoom-out:before {
  content: "\e069"; }

@font-face {
  font-family: "Material Design Icons";
  src: {{ asset("assets/fonts/materialdesignicons-webfont.eot?v=5.0.45")}};
  src: {{ asset("assets/fonts/materialdesignicons-webfont.eot?#iefix&v=5.0.45")}} format("embedded-opentype"), {{ asset("assets/fonts/materialdesignicons-webfont.woff2?v=5.0.45")}} format("woff2"), {{ asset("assets/fonts/materialdesignicons-webfont.woff?v=5.0.45")}} format("woff"), {{ asset("assets/fonts/materialdesignicons-webfont.ttf?v=5.0.45")}} format("truetype");
  font-weight: normal;
  font-style: normal; }

.mdi:before, .mdi-set {
  display: inline-block;
  font: normal normal normal 24px/1 "Material Design Icons";
  font-size: inherit;
  text-rendering: auto;
  line-height: inherit;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale; }

.mdi-ab-testing::before {
  content: "\F01C9"; }

.mdi-abjad-arabic::before {
  content: "\F1328"; }

.mdi-abjad-hebrew::before {
  content: "\F1329"; }

.mdi-abugida-devanagari::before {
  content: "\F132A"; }

.mdi-abugida-thai::before {
  content: "\F132B"; }

.mdi-access-point::before {
  content: "\F0003"; }

.mdi-access-point-network::before {
  content: "\F0002"; }

.mdi-access-point-network-off::before {
  content: "\F0BE1"; }

.mdi-account::before {
  content: "\F0004"; }

.mdi-account-alert::before {
  content: "\F0005"; }

.mdi-account-alert-outline::before {
  content: "\F0B50"; }

.mdi-account-arrow-left::before {
  content: "\F0B51"; }

.mdi-account-arrow-left-outline::before {
  content: "\F0B52"; }

.mdi-account-arrow-right::before {
  content: "\F0B53"; }

.mdi-account-arrow-right-outline::before {
  content: "\F0B54"; }

.mdi-account-box::before {
  content: "\F0006"; }

.mdi-account-box-multiple::before {
  content: "\F0934"; }

.mdi-account-box-multiple-outline::before {
  content: "\F100A"; }

.mdi-account-box-outline::before {
  content: "\F0007"; }

.mdi-account-cancel::before {
  content: "\F12DF"; }

.mdi-account-cancel-outline::before {
  content: "\F12E0"; }

.mdi-account-cash::before {
  content: "\F1097"; }

.mdi-account-cash-outline::before {
  content: "\F1098"; }

.mdi-account-check::before {
  content: "\F0008"; }

.mdi-account-check-outline::before {
  content: "\F0BE2"; }

.mdi-account-child::before {
  content: "\F0A89"; }

.mdi-account-child-circle::before {
  content: "\F0A8A"; }

.mdi-account-child-outline::before {
  content: "\F10C8"; }

.mdi-account-circle::before {
  content: "\F0009"; }

.mdi-account-circle-outline::before {
  content: "\F0B55"; }

.mdi-account-clock::before {
  content: "\F0B56"; }

.mdi-account-clock-outline::before {
  content: "\F0B57"; }

.mdi-account-cog::before {
  content: "\F1370"; }

.mdi-account-cog-outline::before {
  content: "\F1371"; }

.mdi-account-convert::before {
  content: "\F000A"; }

.mdi-account-convert-outline::before {
  content: "\F1301"; }

.mdi-account-cowboy-hat::before {
  content: "\F0E9B"; }

.mdi-account-details::before {
  content: "\F0631"; }

.mdi-account-details-outline::before {
  content: "\F1372"; }

.mdi-account-edit::before {
  content: "\F06BC"; }

.mdi-account-edit-outline::before {
  content: "\F0FFB"; }

.mdi-account-group::before {
  content: "\F0849"; }

.mdi-account-group-outline::before {
  content: "\F0B58"; }

.mdi-account-hard-hat::before {
  content: "\F05B5"; }

.mdi-account-heart::before {
  content: "\F0899"; }

.mdi-account-heart-outline::before {
  content: "\F0BE3"; }

.mdi-account-key::before {
  content: "\F000B"; }

.mdi-account-key-outline::before {
  content: "\F0BE4"; }

.mdi-account-lock::before {
  content: "\F115E"; }

.mdi-account-lock-outline::before {
  content: "\F115F"; }

.mdi-account-minus::before {
  content: "\F000D"; }

.mdi-account-minus-outline::before {
  content: "\F0AEC"; }

.mdi-account-multiple::before {
  content: "\F000E"; }

.mdi-account-multiple-check::before {
  content: "\F08C5"; }

.mdi-account-multiple-check-outline::before {
  content: "\F11FE"; }

.mdi-account-multiple-minus::before {
  content: "\F05D3"; }

.mdi-account-multiple-minus-outline::before {
  content: "\F0BE5"; }

.mdi-account-multiple-outline::before {
  content: "\F000F"; }

.mdi-account-multiple-plus::before {
  content: "\F0010"; }

.mdi-account-multiple-plus-outline::before {
  content: "\F0800"; }

.mdi-account-multiple-remove::before {
  content: "\F120A"; }

.mdi-account-multiple-remove-outline::before {
  content: "\F120B"; }

.mdi-account-music::before {
  content: "\F0803"; }

.mdi-account-music-outline::before {
  content: "\F0CE9"; }

.mdi-account-network::before {
  content: "\F0011"; }

.mdi-account-network-outline::before {
  content: "\F0BE6"; }

.mdi-account-off::before {
  content: "\F0012"; }

.mdi-account-off-outline::before {
  content: "\F0BE7"; }

.mdi-account-outline::before {
  content: "\F0013"; }

.mdi-account-plus::before {
  content: "\F0014"; }

.mdi-account-plus-outline::before {
  content: "\F0801"; }

.mdi-account-question::before {
  content: "\F0B59"; }

.mdi-account-question-outline::before {
  content: "\F0B5A"; }

.mdi-account-remove::before {
  content: "\F0015"; }

.mdi-account-remove-outline::before {
  content: "\F0AED"; }

.mdi-account-search::before {
  content: "\F0016"; }

.mdi-account-search-outline::before {
  content: "\F0935"; }

.mdi-account-settings::before {
  content: "\F0630"; }

.mdi-account-settings-outline::before {
  content: "\F10C9"; }

.mdi-account-star::before {
  content: "\F0017"; }

.mdi-account-star-outline::before {
  content: "\F0BE8"; }

.mdi-account-supervisor::before {
  content: "\F0A8B"; }

.mdi-account-supervisor-circle::before {
  content: "\F0A8C"; }

.mdi-account-supervisor-outline::before {
  content: "\F112D"; }

.mdi-account-switch::before {
  content: "\F0019"; }

.mdi-account-switch-outline::before {
  content: "\F04CB"; }

.mdi-account-tie::before {
  content: "\F0CE3"; }

.mdi-account-tie-outline::before {
  content: "\F10CA"; }

.mdi-account-tie-voice::before {
  content: "\F1308"; }

.mdi-account-tie-voice-off::before {
  content: "\F130A"; }

.mdi-account-tie-voice-off-outline::before {
  content: "\F130B"; }

.mdi-account-tie-voice-outline::before {
  content: "\F1309"; }

.mdi-account-voice::before {
  content: "\F05CB"; }

.mdi-adjust::before {
  content: "\F001A"; }

.mdi-adobe::before {
  content: "\F0936"; }

.mdi-adobe-acrobat::before {
  content: "\F0F9D"; }

.mdi-air-conditioner::before {
  content: "\F001B"; }

.mdi-air-filter::before {
  content: "\F0D43"; }

.mdi-air-horn::before {
  content: "\F0DAC"; }

.mdi-air-humidifier::before {
  content: "\F1099"; }

.mdi-air-purifier::before {
  content: "\F0D44"; }

.mdi-airbag::before {
  content: "\F0BE9"; }

.mdi-airballoon::before {
  content: "\F001C"; }

.mdi-airballoon-outline::before {
  content: "\F100B"; }

.mdi-airplane::before {
  content: "\F001D"; }

.mdi-airplane-landing::before {
  content: "\F05D4"; }

.mdi-airplane-off::before {
  content: "\F001E"; }

.mdi-airplane-takeoff::before {
  content: "\F05D5"; }

.mdi-airport::before {
  content: "\F084B"; }

.mdi-alarm::before {
  content: "\F0020"; }

.mdi-alarm-bell::before {
  content: "\F078E"; }

.mdi-alarm-check::before {
  content: "\F0021"; }

.mdi-alarm-light::before {
  content: "\F078F"; }

.mdi-alarm-light-outline::before {
  content: "\F0BEA"; }

.mdi-alarm-multiple::before {
  content: "\F0022"; }

.mdi-alarm-note::before {
  content: "\F0E71"; }

.mdi-alarm-note-off::before {
  content: "\F0E72"; }

.mdi-alarm-off::before {
  content: "\F0023"; }

.mdi-alarm-plus::before {
  content: "\F0024"; }

.mdi-alarm-snooze::before {
  content: "\F068E"; }

.mdi-album::before {
  content: "\F0025"; }

.mdi-alert::before {
  content: "\F0026"; }

.mdi-alert-box::before {
  content: "\F0027"; }

.mdi-alert-box-outline::before {
  content: "\F0CE4"; }

.mdi-alert-circle::before {
  content: "\F0028"; }

.mdi-alert-circle-check::before {
  content: "\F11ED"; }

.mdi-alert-circle-check-outline::before {
  content: "\F11EE"; }

.mdi-alert-circle-outline::before {
  content: "\F05D6"; }

.mdi-alert-decagram::before {
  content: "\F06BD"; }

.mdi-alert-decagram-outline::before {
  content: "\F0CE5"; }

.mdi-alert-octagon::before {
  content: "\F0029"; }

.mdi-alert-octagon-outline::before {
  content: "\F0CE6"; }

.mdi-alert-octagram::before {
  content: "\F0767"; }

.mdi-alert-octagram-outline::before {
  content: "\F0CE7"; }

.mdi-alert-outline::before {
  content: "\F002A"; }

.mdi-alert-rhombus::before {
  content: "\F11CE"; }

.mdi-alert-rhombus-outline::before {
  content: "\F11CF"; }

.mdi-alien::before {
  content: "\F089A"; }

.mdi-alien-outline::before {
  content: "\F10CB"; }

.mdi-align-horizontal-center::before {
  content: "\F11C3"; }

.mdi-align-horizontal-left::before {
  content: "\F11C2"; }

.mdi-align-horizontal-right::before {
  content: "\F11C4"; }

.mdi-align-vertical-bottom::before {
  content: "\F11C5"; }

.mdi-align-vertical-center::before {
  content: "\F11C6"; }

.mdi-align-vertical-top::before {
  content: "\F11C7"; }

.mdi-all-inclusive::before {
  content: "\F06BE"; }

.mdi-allergy::before {
  content: "\F1258"; }

.mdi-alpha::before {
  content: "\F002B"; }

.mdi-alpha-a::before {
  content: "\F0AEE"; }

.mdi-alpha-a-box::before {
  content: "\F0B08"; }

.mdi-alpha-a-box-outline::before {
  content: "\F0BEB"; }

.mdi-alpha-a-circle::before {
  content: "\F0BEC"; }

.mdi-alpha-a-circle-outline::before {
  content: "\F0BED"; }

.mdi-alpha-b::before {
  content: "\F0AEF"; }

.mdi-alpha-b-box::before {
  content: "\F0B09"; }

.mdi-alpha-b-box-outline::before {
  content: "\F0BEE"; }

.mdi-alpha-b-circle::before {
  content: "\F0BEF"; }

.mdi-alpha-b-circle-outline::before {
  content: "\F0BF0"; }

.mdi-alpha-c::before {
  content: "\F0AF0"; }

.mdi-alpha-c-box::before {
  content: "\F0B0A"; }

.mdi-alpha-c-box-outline::before {
  content: "\F0BF1"; }

.mdi-alpha-c-circle::before {
  content: "\F0BF2"; }

.mdi-alpha-c-circle-outline::before {
  content: "\F0BF3"; }

.mdi-alpha-d::before {
  content: "\F0AF1"; }

.mdi-alpha-d-box::before {
  content: "\F0B0B"; }

.mdi-alpha-d-box-outline::before {
  content: "\F0BF4"; }

.mdi-alpha-d-circle::before {
  content: "\F0BF5"; }

.mdi-alpha-d-circle-outline::before {
  content: "\F0BF6"; }

.mdi-alpha-e::before {
  content: "\F0AF2"; }

.mdi-alpha-e-box::before {
  content: "\F0B0C"; }

.mdi-alpha-e-box-outline::before {
  content: "\F0BF7"; }

.mdi-alpha-e-circle::before {
  content: "\F0BF8"; }

.mdi-alpha-e-circle-outline::before {
  content: "\F0BF9"; }

.mdi-alpha-f::before {
  content: "\F0AF3"; }

.mdi-alpha-f-box::before {
  content: "\F0B0D"; }

.mdi-alpha-f-box-outline::before {
  content: "\F0BFA"; }

.mdi-alpha-f-circle::before {
  content: "\F0BFB"; }

.mdi-alpha-f-circle-outline::before {
  content: "\F0BFC"; }

.mdi-alpha-g::before {
  content: "\F0AF4"; }

.mdi-alpha-g-box::before {
  content: "\F0B0E"; }

.mdi-alpha-g-box-outline::before {
  content: "\F0BFD"; }

.mdi-alpha-g-circle::before {
  content: "\F0BFE"; }

.mdi-alpha-g-circle-outline::before {
  content: "\F0BFF"; }

.mdi-alpha-h::before {
  content: "\F0AF5"; }

.mdi-alpha-h-box::before {
  content: "\F0B0F"; }

.mdi-alpha-h-box-outline::before {
  content: "\F0C00"; }

.mdi-alpha-h-circle::before {
  content: "\F0C01"; }

.mdi-alpha-h-circle-outline::before {
  content: "\F0C02"; }

.mdi-alpha-i::before {
  content: "\F0AF6"; }

.mdi-alpha-i-box::before {
  content: "\F0B10"; }

.mdi-alpha-i-box-outline::before {
  content: "\F0C03"; }

.mdi-alpha-i-circle::before {
  content: "\F0C04"; }

.mdi-alpha-i-circle-outline::before {
  content: "\F0C05"; }

.mdi-alpha-j::before {
  content: "\F0AF7"; }

.mdi-alpha-j-box::before {
  content: "\F0B11"; }

.mdi-alpha-j-box-outline::before {
  content: "\F0C06"; }

.mdi-alpha-j-circle::before {
  content: "\F0C07"; }

.mdi-alpha-j-circle-outline::before {
  content: "\F0C08"; }

.mdi-alpha-k::before {
  content: "\F0AF8"; }

.mdi-alpha-k-box::before {
  content: "\F0B12"; }

.mdi-alpha-k-box-outline::before {
  content: "\F0C09"; }

.mdi-alpha-k-circle::before {
  content: "\F0C0A"; }

.mdi-alpha-k-circle-outline::before {
  content: "\F0C0B"; }

.mdi-alpha-l::before {
  content: "\F0AF9"; }

.mdi-alpha-l-box::before {
  content: "\F0B13"; }

.mdi-alpha-l-box-outline::before {
  content: "\F0C0C"; }

.mdi-alpha-l-circle::before {
  content: "\F0C0D"; }

.mdi-alpha-l-circle-outline::before {
  content: "\F0C0E"; }

.mdi-alpha-m::before {
  content: "\F0AFA"; }

.mdi-alpha-m-box::before {
  content: "\F0B14"; }

.mdi-alpha-m-box-outline::before {
  content: "\F0C0F"; }

.mdi-alpha-m-circle::before {
  content: "\F0C10"; }

.mdi-alpha-m-circle-outline::before {
  content: "\F0C11"; }

.mdi-alpha-n::before {
  content: "\F0AFB"; }

.mdi-alpha-n-box::before {
  content: "\F0B15"; }

.mdi-alpha-n-box-outline::before {
  content: "\F0C12"; }

.mdi-alpha-n-circle::before {
  content: "\F0C13"; }

.mdi-alpha-n-circle-outline::before {
  content: "\F0C14"; }

.mdi-alpha-o::before {
  content: "\F0AFC"; }

.mdi-alpha-o-box::before {
  content: "\F0B16"; }

.mdi-alpha-o-box-outline::before {
  content: "\F0C15"; }

.mdi-alpha-o-circle::before {
  content: "\F0C16"; }

.mdi-alpha-o-circle-outline::before {
  content: "\F0C17"; }

.mdi-alpha-p::before {
  content: "\F0AFD"; }

.mdi-alpha-p-box::before {
  content: "\F0B17"; }

.mdi-alpha-p-box-outline::before {
  content: "\F0C18"; }

.mdi-alpha-p-circle::before {
  content: "\F0C19"; }

.mdi-alpha-p-circle-outline::before {
  content: "\F0C1A"; }

.mdi-alpha-q::before {
  content: "\F0AFE"; }

.mdi-alpha-q-box::before {
  content: "\F0B18"; }

.mdi-alpha-q-box-outline::before {
  content: "\F0C1B"; }

.mdi-alpha-q-circle::before {
  content: "\F0C1C"; }

.mdi-alpha-q-circle-outline::before {
  content: "\F0C1D"; }

.mdi-alpha-r::before {
  content: "\F0AFF"; }

.mdi-alpha-r-box::before {
  content: "\F0B19"; }

.mdi-alpha-r-box-outline::before {
  content: "\F0C1E"; }

.mdi-alpha-r-circle::before {
  content: "\F0C1F"; }

.mdi-alpha-r-circle-outline::before {
  content: "\F0C20"; }

.mdi-alpha-s::before {
  content: "\F0B00"; }

.mdi-alpha-s-box::before {
  content: "\F0B1A"; }

.mdi-alpha-s-box-outline::before {
  content: "\F0C21"; }

.mdi-alpha-s-circle::before {
  content: "\F0C22"; }

.mdi-alpha-s-circle-outline::before {
  content: "\F0C23"; }

.mdi-alpha-t::before {
  content: "\F0B01"; }

.mdi-alpha-t-box::before {
  content: "\F0B1B"; }

.mdi-alpha-t-box-outline::before {
  content: "\F0C24"; }

.mdi-alpha-t-circle::before {
  content: "\F0C25"; }

.mdi-alpha-t-circle-outline::before {
  content: "\F0C26"; }

.mdi-alpha-u::before {
  content: "\F0B02"; }

.mdi-alpha-u-box::before {
  content: "\F0B1C"; }

.mdi-alpha-u-box-outline::before {
  content: "\F0C27"; }

.mdi-alpha-u-circle::before {
  content: "\F0C28"; }

.mdi-alpha-u-circle-outline::before {
  content: "\F0C29"; }

.mdi-alpha-v::before {
  content: "\F0B03"; }

.mdi-alpha-v-box::before {
  content: "\F0B1D"; }

.mdi-alpha-v-box-outline::before {
  content: "\F0C2A"; }

.mdi-alpha-v-circle::before {
  content: "\F0C2B"; }

.mdi-alpha-v-circle-outline::before {
  content: "\F0C2C"; }

.mdi-alpha-w::before {
  content: "\F0B04"; }

.mdi-alpha-w-box::before {
  content: "\F0B1E"; }

.mdi-alpha-w-box-outline::before {
  content: "\F0C2D"; }

.mdi-alpha-w-circle::before {
  content: "\F0C2E"; }

.mdi-alpha-w-circle-outline::before {
  content: "\F0C2F"; }

.mdi-alpha-x::before {
  content: "\F0B05"; }

.mdi-alpha-x-box::before {
  content: "\F0B1F"; }

.mdi-alpha-x-box-outline::before {
  content: "\F0C30"; }

.mdi-alpha-x-circle::before {
  content: "\F0C31"; }

.mdi-alpha-x-circle-outline::before {
  content: "\F0C32"; }

.mdi-alpha-y::before {
  content: "\F0B06"; }

.mdi-alpha-y-box::before {
  content: "\F0B20"; }

.mdi-alpha-y-box-outline::before {
  content: "\F0C33"; }

.mdi-alpha-y-circle::before {
  content: "\F0C34"; }

.mdi-alpha-y-circle-outline::before {
  content: "\F0C35"; }

.mdi-alpha-z::before {
  content: "\F0B07"; }

.mdi-alpha-z-box::before {
  content: "\F0B21"; }

.mdi-alpha-z-box-outline::before {
  content: "\F0C36"; }

.mdi-alpha-z-circle::before {
  content: "\F0C37"; }

.mdi-alpha-z-circle-outline::before {
  content: "\F0C38"; }

.mdi-alphabet-aurebesh::before {
  content: "\F132C"; }

.mdi-alphabet-cyrillic::before {
  content: "\F132D"; }

.mdi-alphabet-greek::before {
  content: "\F132E"; }

.mdi-alphabet-latin::before {
  content: "\F132F"; }

.mdi-alphabet-piqad::before {
  content: "\F1330"; }

.mdi-alphabet-tengwar::before {
  content: "\F1337"; }

.mdi-alphabetical::before {
  content: "\F002C"; }

.mdi-alphabetical-off::before {
  content: "\F100C"; }

.mdi-alphabetical-variant::before {
  content: "\F100D"; }

.mdi-alphabetical-variant-off::before {
  content: "\F100E"; }

.mdi-altimeter::before {
  content: "\F05D7"; }

.mdi-amazon::before {
  content: "\F002D"; }

.mdi-amazon-alexa::before {
  content: "\F08C6"; }

.mdi-ambulance::before {
  content: "\F002F"; }

.mdi-ammunition::before {
  content: "\F0CE8"; }

.mdi-ampersand::before {
  content: "\F0A8D"; }

.mdi-amplifier::before {
  content: "\F0030"; }

.mdi-amplifier-off::before {
  content: "\F11B5"; }

.mdi-anchor::before {
  content: "\F0031"; }

.mdi-android::before {
  content: "\F0032"; }

.mdi-android-auto::before {
  content: "\F0A8E"; }

.mdi-android-debug-bridge::before {
  content: "\F0033"; }

.mdi-android-messages::before {
  content: "\F0D45"; }

.mdi-android-studio::before {
  content: "\F0034"; }

.mdi-angle-acute::before {
  content: "\F0937"; }

.mdi-angle-obtuse::before {
  content: "\F0938"; }

.mdi-angle-right::before {
  content: "\F0939"; }

.mdi-angular::before {
  content: "\F06B2"; }

.mdi-angularjs::before {
  content: "\F06BF"; }

.mdi-animation::before {
  content: "\F05D8"; }

.mdi-animation-outline::before {
  content: "\F0A8F"; }

.mdi-animation-play::before {
  content: "\F093A"; }

.mdi-animation-play-outline::before {
  content: "\F0A90"; }

.mdi-ansible::before {
  content: "\F109A"; }

.mdi-antenna::before {
  content: "\F1119"; }

.mdi-anvil::before {
  content: "\F089B"; }

.mdi-apache-kafka::before {
  content: "\F100F"; }

.mdi-api::before {
  content: "\F109B"; }

.mdi-api-off::before {
  content: "\F1257"; }

.mdi-apple::before {
  content: "\F0035"; }

.mdi-apple-airplay::before {
  content: "\F001F"; }

.mdi-apple-finder::before {
  content: "\F0036"; }

.mdi-apple-icloud::before {
  content: "\F0038"; }

.mdi-apple-ios::before {
  content: "\F0037"; }

.mdi-apple-keyboard-caps::before {
  content: "\F0632"; }

.mdi-apple-keyboard-command::before {
  content: "\F0633"; }

.mdi-apple-keyboard-control::before {
  content: "\F0634"; }

.mdi-apple-keyboard-option::before {
  content: "\F0635"; }

.mdi-apple-keyboard-shift::before {
  content: "\F0636"; }

.mdi-apple-safari::before {
  content: "\F0039"; }

.mdi-application::before {
  content: "\F0614"; }

.mdi-application-export::before {
  content: "\F0DAD"; }

.mdi-application-import::before {
  content: "\F0DAE"; }

.mdi-approximately-equal::before {
  content: "\F0F9E"; }

.mdi-approximately-equal-box::before {
  content: "\F0F9F"; }

.mdi-apps::before {
  content: "\F003B"; }

.mdi-apps-box::before {
  content: "\F0D46"; }

.mdi-arch::before {
  content: "\F08C7"; }

.mdi-archive::before {
  content: "\F003C"; }

.mdi-archive-arrow-down::before {
  content: "\F1259"; }

.mdi-archive-arrow-down-outline::before {
  content: "\F125A"; }

.mdi-archive-arrow-up::before {
  content: "\F125B"; }

.mdi-archive-arrow-up-outline::before {
  content: "\F125C"; }

.mdi-archive-outline::before {
  content: "\F120E"; }

.mdi-arm-flex::before {
  content: "\F0FD7"; }

.mdi-arm-flex-outline::before {
  content: "\F0FD6"; }

.mdi-arrange-bring-forward::before {
  content: "\F003D"; }

.mdi-arrange-bring-to-front::before {
  content: "\F003E"; }

.mdi-arrange-send-backward::before {
  content: "\F003F"; }

.mdi-arrange-send-to-back::before {
  content: "\F0040"; }

.mdi-arrow-all::before {
  content: "\F0041"; }

.mdi-arrow-bottom-left::before {
  content: "\F0042"; }

.mdi-arrow-bottom-left-bold-outline::before {
  content: "\F09B7"; }

.mdi-arrow-bottom-left-thick::before {
  content: "\F09B8"; }

.mdi-arrow-bottom-right::before {
  content: "\F0043"; }

.mdi-arrow-bottom-right-bold-outline::before {
  content: "\F09B9"; }

.mdi-arrow-bottom-right-thick::before {
  content: "\F09BA"; }

.mdi-arrow-collapse::before {
  content: "\F0615"; }

.mdi-arrow-collapse-all::before {
  content: "\F0044"; }

.mdi-arrow-collapse-down::before {
  content: "\F0792"; }

.mdi-arrow-collapse-horizontal::before {
  content: "\F084C"; }

.mdi-arrow-collapse-left::before {
  content: "\F0793"; }

.mdi-arrow-collapse-right::before {
  content: "\F0794"; }

.mdi-arrow-collapse-up::before {
  content: "\F0795"; }

.mdi-arrow-collapse-vertical::before {
  content: "\F084D"; }

.mdi-arrow-decision::before {
  content: "\F09BB"; }

.mdi-arrow-decision-auto::before {
  content: "\F09BC"; }

.mdi-arrow-decision-auto-outline::before {
  content: "\F09BD"; }

.mdi-arrow-decision-outline::before {
  content: "\F09BE"; }

.mdi-arrow-down::before {
  content: "\F0045"; }

.mdi-arrow-down-bold::before {
  content: "\F072E"; }

.mdi-arrow-down-bold-box::before {
  content: "\F072F"; }

.mdi-arrow-down-bold-box-outline::before {
  content: "\F0730"; }

.mdi-arrow-down-bold-circle::before {
  content: "\F0047"; }

.mdi-arrow-down-bold-circle-outline::before {
  content: "\F0048"; }

.mdi-arrow-down-bold-hexagon-outline::before {
  content: "\F0049"; }

.mdi-arrow-down-bold-outline::before {
  content: "\F09BF"; }

.mdi-arrow-down-box::before {
  content: "\F06C0"; }

.mdi-arrow-down-circle::before {
  content: "\F0CDB"; }

.mdi-arrow-down-circle-outline::before {
  content: "\F0CDC"; }

.mdi-arrow-down-drop-circle::before {
  content: "\F004A"; }

.mdi-arrow-down-drop-circle-outline::before {
  content: "\F004B"; }

.mdi-arrow-down-thick::before {
  content: "\F0046"; }

.mdi-arrow-expand::before {
  content: "\F0616"; }

.mdi-arrow-expand-all::before {
  content: "\F004C"; }

.mdi-arrow-expand-down::before {
  content: "\F0796"; }

.mdi-arrow-expand-horizontal::before {
  content: "\F084E"; }

.mdi-arrow-expand-left::before {
  content: "\F0797"; }

.mdi-arrow-expand-right::before {
  content: "\F0798"; }

.mdi-arrow-expand-up::before {
  content: "\F0799"; }

.mdi-arrow-expand-vertical::before {
  content: "\F084F"; }

.mdi-arrow-horizontal-lock::before {
  content: "\F115B"; }

.mdi-arrow-left::before {
  content: "\F004D"; }

.mdi-arrow-left-bold::before {
  content: "\F0731"; }

.mdi-arrow-left-bold-box::before {
  content: "\F0732"; }

.mdi-arrow-left-bold-box-outline::before {
  content: "\F0733"; }

.mdi-arrow-left-bold-circle::before {
  content: "\F004F"; }

.mdi-arrow-left-bold-circle-outline::before {
  content: "\F0050"; }

.mdi-arrow-left-bold-hexagon-outline::before {
  content: "\F0051"; }

.mdi-arrow-left-bold-outline::before {
  content: "\F09C0"; }

.mdi-arrow-left-box::before {
  content: "\F06C1"; }

.mdi-arrow-left-circle::before {
  content: "\F0CDD"; }

.mdi-arrow-left-circle-outline::before {
  content: "\F0CDE"; }

.mdi-arrow-left-drop-circle::before {
  content: "\F0052"; }

.mdi-arrow-left-drop-circle-outline::before {
  content: "\F0053"; }

.mdi-arrow-left-right::before {
  content: "\F0E73"; }

.mdi-arrow-left-right-bold::before {
  content: "\F0E74"; }

.mdi-arrow-left-right-bold-outline::before {
  content: "\F09C1"; }

.mdi-arrow-left-thick::before {
  content: "\F004E"; }

.mdi-arrow-right::before {
  content: "\F0054"; }

.mdi-arrow-right-bold::before {
  content: "\F0734"; }

.mdi-arrow-right-bold-box::before {
  content: "\F0735"; }

.mdi-arrow-right-bold-box-outline::before {
  content: "\F0736"; }

.mdi-arrow-right-bold-circle::before {
  content: "\F0056"; }

.mdi-arrow-right-bold-circle-outline::before {
  content: "\F0057"; }

.mdi-arrow-right-bold-hexagon-outline::before {
  content: "\F0058"; }

.mdi-arrow-right-bold-outline::before {
  content: "\F09C2"; }

.mdi-arrow-right-box::before {
  content: "\F06C2"; }

.mdi-arrow-right-circle::before {
  content: "\F0CDF"; }

.mdi-arrow-right-circle-outline::before {
  content: "\F0CE0"; }

.mdi-arrow-right-drop-circle::before {
  content: "\F0059"; }

.mdi-arrow-right-drop-circle-outline::before {
  content: "\F005A"; }

.mdi-arrow-right-thick::before {
  content: "\F0055"; }

.mdi-arrow-split-horizontal::before {
  content: "\F093B"; }

.mdi-arrow-split-vertical::before {
  content: "\F093C"; }

.mdi-arrow-top-left::before {
  content: "\F005B"; }

.mdi-arrow-top-left-bold-outline::before {
  content: "\F09C3"; }

.mdi-arrow-top-left-bottom-right::before {
  content: "\F0E75"; }

.mdi-arrow-top-left-bottom-right-bold::before {
  content: "\F0E76"; }

.mdi-arrow-top-left-thick::before {
  content: "\F09C4"; }

.mdi-arrow-top-right::before {
  content: "\F005C"; }

.mdi-arrow-top-right-bold-outline::before {
  content: "\F09C5"; }

.mdi-arrow-top-right-bottom-left::before {
  content: "\F0E77"; }

.mdi-arrow-top-right-bottom-left-bold::before {
  content: "\F0E78"; }

.mdi-arrow-top-right-thick::before {
  content: "\F09C6"; }

.mdi-arrow-up::before {
  content: "\F005D"; }

.mdi-arrow-up-bold::before {
  content: "\F0737"; }

.mdi-arrow-up-bold-box::before {
  content: "\F0738"; }

.mdi-arrow-up-bold-box-outline::before {
  content: "\F0739"; }

.mdi-arrow-up-bold-circle::before {
  content: "\F005F"; }

.mdi-arrow-up-bold-circle-outline::before {
  content: "\F0060"; }

.mdi-arrow-up-bold-hexagon-outline::before {
  content: "\F0061"; }

.mdi-arrow-up-bold-outline::before {
  content: "\F09C7"; }

.mdi-arrow-up-box::before {
  content: "\F06C3"; }

.mdi-arrow-up-circle::before {
  content: "\F0CE1"; }

.mdi-arrow-up-circle-outline::before {
  content: "\F0CE2"; }

.mdi-arrow-up-down::before {
  content: "\F0E79"; }

.mdi-arrow-up-down-bold::before {
  content: "\F0E7A"; }

.mdi-arrow-up-down-bold-outline::before {
  content: "\F09C8"; }

.mdi-arrow-up-drop-circle::before {
  content: "\F0062"; }

.mdi-arrow-up-drop-circle-outline::before {
  content: "\F0063"; }

.mdi-arrow-up-thick::before {
  content: "\F005E"; }

.mdi-arrow-vertical-lock::before {
  content: "\F115C"; }

.mdi-artstation::before {
  content: "\F0B5B"; }

.mdi-aspect-ratio::before {
  content: "\F0A24"; }

.mdi-assistant::before {
  content: "\F0064"; }

.mdi-asterisk::before {
  content: "\F06C4"; }

.mdi-at::before {
  content: "\F0065"; }

.mdi-atlassian::before {
  content: "\F0804"; }

.mdi-atm::before {
  content: "\F0D47"; }

.mdi-atom::before {
  content: "\F0768"; }

.mdi-atom-variant::before {
  content: "\F0E7B"; }

.mdi-attachment::before {
  content: "\F0066"; }

.mdi-audio-video::before {
  content: "\F093D"; }

.mdi-audio-video-off::before {
  content: "\F11B6"; }

.mdi-augmented-reality::before {
  content: "\F0850"; }

.mdi-auto-download::before {
  content: "\F137E"; }

.mdi-auto-fix::before {
  content: "\F0068"; }

.mdi-auto-upload::before {
  content: "\F0069"; }

.mdi-autorenew::before {
  content: "\F006A"; }

.mdi-av-timer::before {
  content: "\F006B"; }

.mdi-aws::before {
  content: "\F0E0F"; }

.mdi-axe::before {
  content: "\F08C8"; }

.mdi-axis::before {
  content: "\F0D48"; }

.mdi-axis-arrow::before {
  content: "\F0D49"; }

.mdi-axis-arrow-lock::before {
  content: "\F0D4A"; }

.mdi-axis-lock::before {
  content: "\F0D4B"; }

.mdi-axis-x-arrow::before {
  content: "\F0D4C"; }

.mdi-axis-x-arrow-lock::before {
  content: "\F0D4D"; }

.mdi-axis-x-rotate-clockwise::before {
  content: "\F0D4E"; }

.mdi-axis-x-rotate-counterclockwise::before {
  content: "\F0D4F"; }

.mdi-axis-x-y-arrow-lock::before {
  content: "\F0D50"; }

.mdi-axis-y-arrow::before {
  content: "\F0D51"; }

.mdi-axis-y-arrow-lock::before {
  content: "\F0D52"; }

.mdi-axis-y-rotate-clockwise::before {
  content: "\F0D53"; }

.mdi-axis-y-rotate-counterclockwise::before {
  content: "\F0D54"; }

.mdi-axis-z-arrow::before {
  content: "\F0D55"; }

.mdi-axis-z-arrow-lock::before {
  content: "\F0D56"; }

.mdi-axis-z-rotate-clockwise::before {
  content: "\F0D57"; }

.mdi-axis-z-rotate-counterclockwise::before {
  content: "\F0D58"; }

.mdi-babel::before {
  content: "\F0A25"; }

.mdi-baby::before {
  content: "\F006C"; }

.mdi-baby-bottle::before {
  content: "\F0F39"; }

.mdi-baby-bottle-outline::before {
  content: "\F0F3A"; }

.mdi-baby-carriage::before {
  content: "\F068F"; }

.mdi-baby-carriage-off::before {
  content: "\F0FA0"; }

.mdi-baby-face::before {
  content: "\F0E7C"; }

.mdi-baby-face-outline::before {
  content: "\F0E7D"; }

.mdi-backburger::before {
  content: "\F006D"; }

.mdi-backspace::before {
  content: "\F006E"; }

.mdi-backspace-outline::before {
  content: "\F0B5C"; }

.mdi-backspace-reverse::before {
  content: "\F0E7E"; }

.mdi-backspace-reverse-outline::before {
  content: "\F0E7F"; }

.mdi-backup-restore::before {
  content: "\F006F"; }

.mdi-bacteria::before {
  content: "\F0ED5"; }

.mdi-bacteria-outline::before {
  content: "\F0ED6"; }

.mdi-badge-account::before {
  content: "\F0DA7"; }

.mdi-badge-account-alert::before {
  content: "\F0DA8"; }

.mdi-badge-account-alert-outline::before {
  content: "\F0DA9"; }

.mdi-badge-account-horizontal::before {
  content: "\F0E0D"; }

.mdi-badge-account-horizontal-outline::before {
  content: "\F0E0E"; }

.mdi-badge-account-outline::before {
  content: "\F0DAA"; }

.mdi-badminton::before {
  content: "\F0851"; }

.mdi-bag-carry-on::before {
  content: "\F0F3B"; }

.mdi-bag-carry-on-check::before {
  content: "\F0D65"; }

.mdi-bag-carry-on-off::before {
  content: "\F0F3C"; }

.mdi-bag-checked::before {
  content: "\F0F3D"; }

.mdi-bag-personal::before {
  content: "\F0E10"; }

.mdi-bag-personal-off::before {
  content: "\F0E11"; }

.mdi-bag-personal-off-outline::before {
  content: "\F0E12"; }

.mdi-bag-personal-outline::before {
  content: "\F0E13"; }

.mdi-baguette::before {
  content: "\F0F3E"; }

.mdi-balloon::before {
  content: "\F0A26"; }

.mdi-ballot::before {
  content: "\F09C9"; }

.mdi-ballot-outline::before {
  content: "\F09CA"; }

.mdi-ballot-recount::before {
  content: "\F0C39"; }

.mdi-ballot-recount-outline::before {
  content: "\F0C3A"; }

.mdi-bandage::before {
  content: "\F0DAF"; }

.mdi-bandcamp::before {
  content: "\F0675"; }

.mdi-bank::before {
  content: "\F0070"; }

.mdi-bank-minus::before {
  content: "\F0DB0"; }

.mdi-bank-outline::before {
  content: "\F0E80"; }

.mdi-bank-plus::before {
  content: "\F0DB1"; }

.mdi-bank-remove::before {
  content: "\F0DB2"; }

.mdi-bank-transfer::before {
  content: "\F0A27"; }

.mdi-bank-transfer-in::before {
  content: "\F0A28"; }

.mdi-bank-transfer-out::before {
  content: "\F0A29"; }

.mdi-barcode::before {
  content: "\F0071"; }

.mdi-barcode-off::before {
  content: "\F1236"; }

.mdi-barcode-scan::before {
  content: "\F0072"; }

.mdi-barley::before {
  content: "\F0073"; }

.mdi-barley-off::before {
  content: "\F0B5D"; }

.mdi-barn::before {
  content: "\F0B5E"; }

.mdi-barrel::before {
  content: "\F0074"; }

.mdi-baseball::before {
  content: "\F0852"; }

.mdi-baseball-bat::before {
  content: "\F0853"; }

.mdi-bash::before {
  content: "\F1183"; }

.mdi-basket::before {
  content: "\F0076"; }

.mdi-basket-fill::before {
  content: "\F0077"; }

.mdi-basket-outline::before {
  content: "\F1181"; }

.mdi-basket-unfill::before {
  content: "\F0078"; }

.mdi-basketball::before {
  content: "\F0806"; }

.mdi-basketball-hoop::before {
  content: "\F0C3B"; }

.mdi-basketball-hoop-outline::before {
  content: "\F0C3C"; }

.mdi-bat::before {
  content: "\F0B5F"; }

.mdi-battery::before {
  content: "\F0079"; }

.mdi-battery-10::before {
  content: "\F007A"; }

.mdi-battery-10-bluetooth::before {
  content: "\F093E"; }

.mdi-battery-20::before {
  content: "\F007B"; }

.mdi-battery-20-bluetooth::before {
  content: "\F093F"; }

.mdi-battery-30::before {
  content: "\F007C"; }

.mdi-battery-30-bluetooth::before {
  content: "\F0940"; }

.mdi-battery-40::before {
  content: "\F007D"; }

.mdi-battery-40-bluetooth::before {
  content: "\F0941"; }

.mdi-battery-50::before {
  content: "\F007E"; }

.mdi-battery-50-bluetooth::before {
  content: "\F0942"; }

.mdi-battery-60::before {
  content: "\F007F"; }

.mdi-battery-60-bluetooth::before {
  content: "\F0943"; }

.mdi-battery-70::before {
  content: "\F0080"; }

.mdi-battery-70-bluetooth::before {
  content: "\F0944"; }

.mdi-battery-80::before {
  content: "\F0081"; }

.mdi-battery-80-bluetooth::before {
  content: "\F0945"; }

.mdi-battery-90::before {
  content: "\F0082"; }

.mdi-battery-90-bluetooth::before {
  content: "\F0946"; }

.mdi-battery-alert::before {
  content: "\F0083"; }

.mdi-battery-alert-bluetooth::before {
  content: "\F0947"; }

.mdi-battery-alert-variant::before {
  content: "\F10CC"; }

.mdi-battery-alert-variant-outline::before {
  content: "\F10CD"; }

.mdi-battery-bluetooth::before {
  content: "\F0948"; }

.mdi-battery-bluetooth-variant::before {
  content: "\F0949"; }

.mdi-battery-charging::before {
  content: "\F0084"; }

.mdi-battery-charging-10::before {
  content: "\F089C"; }

.mdi-battery-charging-100::before {
  content: "\F0085"; }

.mdi-battery-charging-20::before {
  content: "\F0086"; }

.mdi-battery-charging-30::before {
  content: "\F0087"; }

.mdi-battery-charging-40::before {
  content: "\F0088"; }

.mdi-battery-charging-50::before {
  content: "\F089D"; }

.mdi-battery-charging-60::before {
  content: "\F0089"; }

.mdi-battery-charging-70::before {
  content: "\F089E"; }

.mdi-battery-charging-80::before {
  content: "\F008A"; }

.mdi-battery-charging-90::before {
  content: "\F008B"; }

.mdi-battery-charging-high::before {
  content: "\F12A6"; }

.mdi-battery-charging-low::before {
  content: "\F12A4"; }

.mdi-battery-charging-medium::before {
  content: "\F12A5"; }

.mdi-battery-charging-outline::before {
  content: "\F089F"; }

.mdi-battery-charging-wireless::before {
  content: "\F0807"; }

.mdi-battery-charging-wireless-10::before {
  content: "\F0808"; }

.mdi-battery-charging-wireless-20::before {
  content: "\F0809"; }

.mdi-battery-charging-wireless-30::before {
  content: "\F080A"; }

.mdi-battery-charging-wireless-40::before {
  content: "\F080B"; }

.mdi-battery-charging-wireless-50::before {
  content: "\F080C"; }

.mdi-battery-charging-wireless-60::before {
  content: "\F080D"; }

.mdi-battery-charging-wireless-70::before {
  content: "\F080E"; }

.mdi-battery-charging-wireless-80::before {
  content: "\F080F"; }

.mdi-battery-charging-wireless-90::before {
  content: "\F0810"; }

.mdi-battery-charging-wireless-alert::before {
  content: "\F0811"; }

.mdi-battery-charging-wireless-outline::before {
  content: "\F0812"; }

.mdi-battery-heart::before {
  content: "\F120F"; }

.mdi-battery-heart-outline::before {
  content: "\F1210"; }

.mdi-battery-heart-variant::before {
  content: "\F1211"; }

.mdi-battery-high::before {
  content: "\F12A3"; }

.mdi-battery-low::before {
  content: "\F12A1"; }

.mdi-battery-medium::before {
  content: "\F12A2"; }

.mdi-battery-minus::before {
  content: "\F008C"; }

.mdi-battery-negative::before {
  content: "\F008D"; }

.mdi-battery-off::before {
  content: "\F125D"; }

.mdi-battery-off-outline::before {
  content: "\F125E"; }

.mdi-battery-outline::before {
  content: "\F008E"; }

.mdi-battery-plus::before {
  content: "\F008F"; }

.mdi-battery-positive::before {
  content: "\F0090"; }

.mdi-battery-unknown::before {
  content: "\F0091"; }

.mdi-battery-unknown-bluetooth::before {
  content: "\F094A"; }

.mdi-battlenet::before {
  content: "\F0B60"; }

.mdi-beach::before {
  content: "\F0092"; }

.mdi-beaker::before {
  content: "\F0CEA"; }

.mdi-beaker-alert::before {
  content: "\F1229"; }

.mdi-beaker-alert-outline::before {
  content: "\F122A"; }

.mdi-beaker-check::before {
  content: "\F122B"; }

.mdi-beaker-check-outline::before {
  content: "\F122C"; }

.mdi-beaker-minus::before {
  content: "\F122D"; }

.mdi-beaker-minus-outline::before {
  content: "\F122E"; }

.mdi-beaker-outline::before {
  content: "\F0690"; }

.mdi-beaker-plus::before {
  content: "\F122F"; }

.mdi-beaker-plus-outline::before {
  content: "\F1230"; }

.mdi-beaker-question::before {
  content: "\F1231"; }

.mdi-beaker-question-outline::before {
  content: "\F1232"; }

.mdi-beaker-remove::before {
  content: "\F1233"; }

.mdi-beaker-remove-outline::before {
  content: "\F1234"; }

.mdi-bed::before {
  content: "\F02E3"; }

.mdi-bed-double::before {
  content: "\F0FD4"; }

.mdi-bed-double-outline::before {
  content: "\F0FD3"; }

.mdi-bed-empty::before {
  content: "\F08A0"; }

.mdi-bed-king::before {
  content: "\F0FD2"; }

.mdi-bed-king-outline::before {
  content: "\F0FD1"; }

.mdi-bed-outline::before {
  content: "\F0099"; }

.mdi-bed-queen::before {
  content: "\F0FD0"; }

.mdi-bed-queen-outline::before {
  content: "\F0FDB"; }

.mdi-bed-single::before {
  content: "\F106D"; }

.mdi-bed-single-outline::before {
  content: "\F106E"; }

.mdi-bee::before {
  content: "\F0FA1"; }

.mdi-bee-flower::before {
  content: "\F0FA2"; }

.mdi-beehive-outline::before {
  content: "\F10CE"; }

.mdi-beer::before {
  content: "\F0098"; }

.mdi-beer-outline::before {
  content: "\F130C"; }

.mdi-bell::before {
  content: "\F009A"; }

.mdi-bell-alert::before {
  content: "\F0D59"; }

.mdi-bell-alert-outline::before {
  content: "\F0E81"; }

.mdi-bell-check::before {
  content: "\F11E5"; }

.mdi-bell-check-outline::before {
  content: "\F11E6"; }

.mdi-bell-circle::before {
  content: "\F0D5A"; }

.mdi-bell-circle-outline::before {
  content: "\F0D5B"; }

.mdi-bell-off::before {
  content: "\F009B"; }

.mdi-bell-off-outline::before {
  content: "\F0A91"; }

.mdi-bell-outline::before {
  content: "\F009C"; }

.mdi-bell-plus::before {
  content: "\F009D"; }

.mdi-bell-plus-outline::before {
  content: "\F0A92"; }

.mdi-bell-ring::before {
  content: "\F009E"; }

.mdi-bell-ring-outline::before {
  content: "\F009F"; }

.mdi-bell-sleep::before {
  content: "\F00A0"; }

.mdi-bell-sleep-outline::before {
  content: "\F0A93"; }

.mdi-beta::before {
  content: "\F00A1"; }

.mdi-betamax::before {
  content: "\F09CB"; }

.mdi-biathlon::before {
  content: "\F0E14"; }

.mdi-bicycle::before {
  content: "\F109C"; }

.mdi-bicycle-basket::before {
  content: "\F1235"; }

.mdi-bike::before {
  content: "\F00A3"; }

.mdi-bike-fast::before {
  content: "\F111F"; }

.mdi-billboard::before {
  content: "\F1010"; }

.mdi-billiards::before {
  content: "\F0B61"; }

.mdi-billiards-rack::before {
  content: "\F0B62"; }

.mdi-binoculars::before {
  content: "\F00A5"; }

.mdi-bio::before {
  content: "\F00A6"; }

.mdi-biohazard::before {
  content: "\F00A7"; }

.mdi-bitbucket::before {
  content: "\F00A8"; }

.mdi-bitcoin::before {
  content: "\F0813"; }

.mdi-black-mesa::before {
  content: "\F00A9"; }

.mdi-blender::before {
  content: "\F0CEB"; }

.mdi-blender-software::before {
  content: "\F00AB"; }

.mdi-blinds::before {
  content: "\F00AC"; }

.mdi-blinds-open::before {
  content: "\F1011"; }

.mdi-block-helper::before {
  content: "\F00AD"; }

.mdi-blogger::before {
  content: "\F00AE"; }

.mdi-blood-bag::before {
  content: "\F0CEC"; }

.mdi-bluetooth::before {
  content: "\F00AF"; }

.mdi-bluetooth-audio::before {
  content: "\F00B0"; }

.mdi-bluetooth-connect::before {
  content: "\F00B1"; }

.mdi-bluetooth-off::before {
  content: "\F00B2"; }

.mdi-bluetooth-settings::before {
  content: "\F00B3"; }

.mdi-bluetooth-transfer::before {
  content: "\F00B4"; }

.mdi-blur::before {
  content: "\F00B5"; }

.mdi-blur-linear::before {
  content: "\F00B6"; }

.mdi-blur-off::before {
  content: "\F00B7"; }

.mdi-blur-radial::before {
  content: "\F00B8"; }

.mdi-bolnisi-cross::before {
  content: "\F0CED"; }

.mdi-bolt::before {
  content: "\F0DB3"; }

.mdi-bomb::before {
  content: "\F0691"; }

.mdi-bomb-off::before {
  content: "\F06C5"; }

.mdi-bone::before {
  content: "\F00B9"; }

.mdi-book::before {
  content: "\F00BA"; }

.mdi-book-account::before {
  content: "\F13AD"; }

.mdi-book-account-outline::before {
  content: "\F13AE"; }

.mdi-book-alphabet::before {
  content: "\F061D"; }

.mdi-book-cross::before {
  content: "\F00A2"; }

.mdi-book-information-variant::before {
  content: "\F106F"; }

.mdi-book-lock::before {
  content: "\F079A"; }

.mdi-book-lock-open::before {
  content: "\F079B"; }

.mdi-book-minus::before {
  content: "\F05D9"; }

.mdi-book-minus-multiple::before {
  content: "\F0A94"; }

.mdi-book-minus-multiple-outline::before {
  content: "\F090B"; }

.mdi-book-multiple::before {
  content: "\F00BB"; }

.mdi-book-multiple-outline::before {
  content: "\F0436"; }

.mdi-book-music::before {
  content: "\F0067"; }

.mdi-book-open::before {
  content: "\F00BD"; }

.mdi-book-open-outline::before {
  content: "\F0B63"; }

.mdi-book-open-page-variant::before {
  content: "\F05DA"; }

.mdi-book-open-variant::before {
  content: "\F00BE"; }

.mdi-book-outline::before {
  content: "\F0B64"; }

.mdi-book-play::before {
  content: "\F0E82"; }

.mdi-book-play-outline::before {
  content: "\F0E83"; }

.mdi-book-plus::before {
  content: "\F05DB"; }

.mdi-book-plus-multiple::before {
  content: "\F0A95"; }

.mdi-book-plus-multiple-outline::before {
  content: "\F0ADE"; }

.mdi-book-remove::before {
  content: "\F0A97"; }

.mdi-book-remove-multiple::before {
  content: "\F0A96"; }

.mdi-book-remove-multiple-outline::before {
  content: "\F04CA"; }

.mdi-book-search::before {
  content: "\F0E84"; }

.mdi-book-search-outline::before {
  content: "\F0E85"; }

.mdi-book-variant::before {
  content: "\F00BF"; }

.mdi-book-variant-multiple::before {
  content: "\F00BC"; }

.mdi-bookmark::before {
  content: "\F00C0"; }

.mdi-bookmark-check::before {
  content: "\F00C1"; }

.mdi-bookmark-check-outline::before {
  content: "\F137B"; }

.mdi-bookmark-minus::before {
  content: "\F09CC"; }

.mdi-bookmark-minus-outline::before {
  content: "\F09CD"; }

.mdi-bookmark-multiple::before {
  content: "\F0E15"; }

.mdi-bookmark-multiple-outline::before {
  content: "\F0E16"; }

.mdi-bookmark-music::before {
  content: "\F00C2"; }

.mdi-bookmark-music-outline::before {
  content: "\F1379"; }

.mdi-bookmark-off::before {
  content: "\F09CE"; }

.mdi-bookmark-off-outline::before {
  content: "\F09CF"; }

.mdi-bookmark-outline::before {
  content: "\F00C3"; }

.mdi-bookmark-plus::before {
  content: "\F00C5"; }

.mdi-bookmark-plus-outline::before {
  content: "\F00C4"; }

.mdi-bookmark-remove::before {
  content: "\F00C6"; }

.mdi-bookmark-remove-outline::before {
  content: "\F137A"; }

.mdi-bookshelf::before {
  content: "\F125F"; }

.mdi-boom-gate::before {
  content: "\F0E86"; }

.mdi-boom-gate-alert::before {
  content: "\F0E87"; }

.mdi-boom-gate-alert-outline::before {
  content: "\F0E88"; }

.mdi-boom-gate-down::before {
  content: "\F0E89"; }

.mdi-boom-gate-down-outline::before {
  content: "\F0E8A"; }

.mdi-boom-gate-outline::before {
  content: "\F0E8B"; }

.mdi-boom-gate-up::before {
  content: "\F0E8C"; }

.mdi-boom-gate-up-outline::before {
  content: "\F0E8D"; }

.mdi-boombox::before {
  content: "\F05DC"; }

.mdi-boomerang::before {
  content: "\F10CF"; }

.mdi-bootstrap::before {
  content: "\F06C6"; }

.mdi-border-all::before {
  content: "\F00C7"; }

.mdi-border-all-variant::before {
  content: "\F08A1"; }

.mdi-border-bottom::before {
  content: "\F00C8"; }

.mdi-border-bottom-variant::before {
  content: "\F08A2"; }

.mdi-border-color::before {
  content: "\F00C9"; }

.mdi-border-horizontal::before {
  content: "\F00CA"; }

.mdi-border-inside::before {
  content: "\F00CB"; }

.mdi-border-left::before {
  content: "\F00CC"; }

.mdi-border-left-variant::before {
  content: "\F08A3"; }

.mdi-border-none::before {
  content: "\F00CD"; }

.mdi-border-none-variant::before {
  content: "\F08A4"; }

.mdi-border-outside::before {
  content: "\F00CE"; }

.mdi-border-right::before {
  content: "\F00CF"; }

.mdi-border-right-variant::before {
  content: "\F08A5"; }

.mdi-border-style::before {
  content: "\F00D0"; }

.mdi-border-top::before {
  content: "\F00D1"; }

.mdi-border-top-variant::before {
  content: "\F08A6"; }

.mdi-border-vertical::before {
  content: "\F00D2"; }

.mdi-bottle-soda::before {
  content: "\F1070"; }

.mdi-bottle-soda-classic::before {
  content: "\F1071"; }

.mdi-bottle-soda-classic-outline::before {
  content: "\F1363"; }

.mdi-bottle-soda-outline::before {
  content: "\F1072"; }

.mdi-bottle-tonic::before {
  content: "\F112E"; }

.mdi-bottle-tonic-outline::before {
  content: "\F112F"; }

.mdi-bottle-tonic-plus::before {
  content: "\F1130"; }

.mdi-bottle-tonic-plus-outline::before {
  content: "\F1131"; }

.mdi-bottle-tonic-skull::before {
  content: "\F1132"; }

.mdi-bottle-tonic-skull-outline::before {
  content: "\F1133"; }

.mdi-bottle-wine::before {
  content: "\F0854"; }

.mdi-bottle-wine-outline::before {
  content: "\F1310"; }

.mdi-bow-tie::before {
  content: "\F0678"; }

.mdi-bowl::before {
  content: "\F028E"; }

.mdi-bowl-mix::before {
  content: "\F0617"; }

.mdi-bowl-mix-outline::before {
  content: "\F02E4"; }

.mdi-bowl-outline::before {
  content: "\F02A9"; }

.mdi-bowling::before {
  content: "\F00D3"; }

.mdi-box::before {
  content: "\F00D4"; }

.mdi-box-cutter::before {
  content: "\F00D5"; }

.mdi-box-cutter-off::before {
  content: "\F0B4A"; }

.mdi-box-shadow::before {
  content: "\F0637"; }

.mdi-boxing-glove::before {
  content: "\F0B65"; }

.mdi-braille::before {
  content: "\F09D0"; }

.mdi-brain::before {
  content: "\F09D1"; }

.mdi-bread-slice::before {
  content: "\F0CEE"; }

.mdi-bread-slice-outline::before {
  content: "\F0CEF"; }

.mdi-bridge::before {
  content: "\F0618"; }

.mdi-briefcase::before {
  content: "\F00D6"; }

.mdi-briefcase-account::before {
  content: "\F0CF0"; }

.mdi-briefcase-account-outline::before {
  content: "\F0CF1"; }

.mdi-briefcase-check::before {
  content: "\F00D7"; }

.mdi-briefcase-check-outline::before {
  content: "\F131E"; }

.mdi-briefcase-clock::before {
  content: "\F10D0"; }

.mdi-briefcase-clock-outline::before {
  content: "\F10D1"; }

.mdi-briefcase-download::before {
  content: "\F00D8"; }

.mdi-briefcase-download-outline::before {
  content: "\F0C3D"; }

.mdi-briefcase-edit::before {
  content: "\F0A98"; }

.mdi-briefcase-edit-outline::before {
  content: "\F0C3E"; }

.mdi-briefcase-minus::before {
  content: "\F0A2A"; }

.mdi-briefcase-minus-outline::before {
  content: "\F0C3F"; }

.mdi-briefcase-outline::before {
  content: "\F0814"; }

.mdi-briefcase-plus::before {
  content: "\F0A2B"; }

.mdi-briefcase-plus-outline::before {
  content: "\F0C40"; }

.mdi-briefcase-remove::before {
  content: "\F0A2C"; }

.mdi-briefcase-remove-outline::before {
  content: "\F0C41"; }

.mdi-briefcase-search::before {
  content: "\F0A2D"; }

.mdi-briefcase-search-outline::before {
  content: "\F0C42"; }

.mdi-briefcase-upload::before {
  content: "\F00D9"; }

.mdi-briefcase-upload-outline::before {
  content: "\F0C43"; }

.mdi-brightness-1::before {
  content: "\F00DA"; }

.mdi-brightness-2::before {
  content: "\F00DB"; }

.mdi-brightness-3::before {
  content: "\F00DC"; }

.mdi-brightness-4::before {
  content: "\F00DD"; }

.mdi-brightness-5::before {
  content: "\F00DE"; }

.mdi-brightness-6::before {
  content: "\F00DF"; }

.mdi-brightness-7::before {
  content: "\F00E0"; }

.mdi-brightness-auto::before {
  content: "\F00E1"; }

.mdi-brightness-percent::before {
  content: "\F0CF2"; }

.mdi-broom::before {
  content: "\F00E2"; }

.mdi-brush::before {
  content: "\F00E3"; }

.mdi-buddhism::before {
  content: "\F094B"; }

.mdi-buffer::before {
  content: "\F0619"; }

.mdi-buffet::before {
  content: "\F0578"; }

.mdi-bug::before {
  content: "\F00E4"; }

.mdi-bug-check::before {
  content: "\F0A2E"; }

.mdi-bug-check-outline::before {
  content: "\F0A2F"; }

.mdi-bug-outline::before {
  content: "\F0A30"; }

.mdi-bugle::before {
  content: "\F0DB4"; }

.mdi-bulldozer::before {
  content: "\F0B22"; }

.mdi-bullet::before {
  content: "\F0CF3"; }

.mdi-bulletin-board::before {
  content: "\F00E5"; }

.mdi-bullhorn::before {
  content: "\F00E6"; }

.mdi-bullhorn-outline::before {
  content: "\F0B23"; }

.mdi-bullseye::before {
  content: "\F05DD"; }

.mdi-bullseye-arrow::before {
  content: "\F08C9"; }

.mdi-bulma::before {
  content: "\F12E7"; }

.mdi-bunk-bed::before {
  content: "\F1302"; }

.mdi-bunk-bed-outline::before {
  content: "\F0097"; }

.mdi-bus::before {
  content: "\F00E7"; }

.mdi-bus-alert::before {
  content: "\F0A99"; }

.mdi-bus-articulated-end::before {
  content: "\F079C"; }

.mdi-bus-articulated-front::before {
  content: "\F079D"; }

.mdi-bus-clock::before {
  content: "\F08CA"; }

.mdi-bus-double-decker::before {
  content: "\F079E"; }

.mdi-bus-marker::before {
  content: "\F1212"; }

.mdi-bus-multiple::before {
  content: "\F0F3F"; }

.mdi-bus-school::before {
  content: "\F079F"; }

.mdi-bus-side::before {
  content: "\F07A0"; }

.mdi-bus-stop::before {
  content: "\F1012"; }

.mdi-bus-stop-covered::before {
  content: "\F1013"; }

.mdi-bus-stop-uncovered::before {
  content: "\F1014"; }

.mdi-cable-data::before {
  content: "\F1394"; }

.mdi-cached::before {
  content: "\F00E8"; }

.mdi-cactus::before {
  content: "\F0DB5"; }

.mdi-cake::before {
  content: "\F00E9"; }

.mdi-cake-layered::before {
  content: "\F00EA"; }

.mdi-cake-variant::before {
  content: "\F00EB"; }

.mdi-calculator::before {
  content: "\F00EC"; }

.mdi-calculator-variant::before {
  content: "\F0A9A"; }

.mdi-calendar::before {
  content: "\F00ED"; }

.mdi-calendar-account::before {
  content: "\F0ED7"; }

.mdi-calendar-account-outline::before {
  content: "\F0ED8"; }

.mdi-calendar-alert::before {
  content: "\F0A31"; }

.mdi-calendar-arrow-left::before {
  content: "\F1134"; }

.mdi-calendar-arrow-right::before {
  content: "\F1135"; }

.mdi-calendar-blank::before {
  content: "\F00EE"; }

.mdi-calendar-blank-multiple::before {
  content: "\F1073"; }

.mdi-calendar-blank-outline::before {
  content: "\F0B66"; }

.mdi-calendar-check::before {
  content: "\F00EF"; }

.mdi-calendar-check-outline::before {
  content: "\F0C44"; }

.mdi-calendar-clock::before {
  content: "\F00F0"; }

.mdi-calendar-edit::before {
  content: "\F08A7"; }

.mdi-calendar-export::before {
  content: "\F0B24"; }

.mdi-calendar-heart::before {
  content: "\F09D2"; }

.mdi-calendar-import::before {
  content: "\F0B25"; }

.mdi-calendar-minus::before {
  content: "\F0D5C"; }

.mdi-calendar-month::before {
  content: "\F0E17"; }

.mdi-calendar-month-outline::before {
  content: "\F0E18"; }

.mdi-calendar-multiple::before {
  content: "\F00F1"; }

.mdi-calendar-multiple-check::before {
  content: "\F00F2"; }

.mdi-calendar-multiselect::before {
  content: "\F0A32"; }

.mdi-calendar-outline::before {
  content: "\F0B67"; }

.mdi-calendar-plus::before {
  content: "\F00F3"; }

.mdi-calendar-question::before {
  content: "\F0692"; }

.mdi-calendar-range::before {
  content: "\F0679"; }

.mdi-calendar-range-outline::before {
  content: "\F0B68"; }

.mdi-calendar-refresh::before {
  content: "\F01E1"; }

.mdi-calendar-refresh-outline::before {
  content: "\F0203"; }

.mdi-calendar-remove::before {
  content: "\F00F4"; }

.mdi-calendar-remove-outline::before {
  content: "\F0C45"; }

.mdi-calendar-search::before {
  content: "\F094C"; }

.mdi-calendar-star::before {
  content: "\F09D3"; }

.mdi-calendar-sync::before {
  content: "\F0E8E"; }

.mdi-calendar-sync-outline::before {
  content: "\F0E8F"; }

.mdi-calendar-text::before {
  content: "\F00F5"; }

.mdi-calendar-text-outline::before {
  content: "\F0C46"; }

.mdi-calendar-today::before {
  content: "\F00F6"; }

.mdi-calendar-week::before {
  content: "\F0A33"; }

.mdi-calendar-week-begin::before {
  content: "\F0A34"; }

.mdi-calendar-weekend::before {
  content: "\F0ED9"; }

.mdi-calendar-weekend-outline::before {
  content: "\F0EDA"; }

.mdi-call-made::before {
  content: "\F00F7"; }

.mdi-call-merge::before {
  content: "\F00F8"; }

.mdi-call-missed::before {
  content: "\F00F9"; }

.mdi-call-received::before {
  content: "\F00FA"; }

.mdi-call-split::before {
  content: "\F00FB"; }

.mdi-camcorder::before {
  content: "\F00FC"; }

.mdi-camcorder-off::before {
  content: "\F00FF"; }

.mdi-camera::before {
  content: "\F0100"; }

.mdi-camera-account::before {
  content: "\F08CB"; }

.mdi-camera-burst::before {
  content: "\F0693"; }

.mdi-camera-control::before {
  content: "\F0B69"; }

.mdi-camera-enhance::before {
  content: "\F0101"; }

.mdi-camera-enhance-outline::before {
  content: "\F0B6A"; }

.mdi-camera-front::before {
  content: "\F0102"; }

.mdi-camera-front-variant::before {
  content: "\F0103"; }

.mdi-camera-gopro::before {
  content: "\F07A1"; }

.mdi-camera-image::before {
  content: "\F08CC"; }

.mdi-camera-iris::before {
  content: "\F0104"; }

.mdi-camera-metering-center::before {
  content: "\F07A2"; }

.mdi-camera-metering-matrix::before {
  content: "\F07A3"; }

.mdi-camera-metering-partial::before {
  content: "\F07A4"; }

.mdi-camera-metering-spot::before {
  content: "\F07A5"; }

.mdi-camera-off::before {
  content: "\F05DF"; }

.mdi-camera-outline::before {
  content: "\F0D5D"; }

.mdi-camera-party-mode::before {
  content: "\F0105"; }

.mdi-camera-plus::before {
  content: "\F0EDB"; }

.mdi-camera-plus-outline::before {
  content: "\F0EDC"; }

.mdi-camera-rear::before {
  content: "\F0106"; }

.mdi-camera-rear-variant::before {
  content: "\F0107"; }

.mdi-camera-retake::before {
  content: "\F0E19"; }

.mdi-camera-retake-outline::before {
  content: "\F0E1A"; }

.mdi-camera-switch::before {
  content: "\F0108"; }

.mdi-camera-switch-outline::before {
  content: "\F084A"; }

.mdi-camera-timer::before {
  content: "\F0109"; }

.mdi-camera-wireless::before {
  content: "\F0DB6"; }

.mdi-camera-wireless-outline::before {
  content: "\F0DB7"; }

.mdi-campfire::before {
  content: "\F0EDD"; }

.mdi-cancel::before {
  content: "\F073A"; }

.mdi-candle::before {
  content: "\F05E2"; }

.mdi-candycane::before {
  content: "\F010A"; }

.mdi-cannabis::before {
  content: "\F07A6"; }

.mdi-caps-lock::before {
  content: "\F0A9B"; }

.mdi-car::before {
  content: "\F010B"; }

.mdi-car-2-plus::before {
  content: "\F1015"; }

.mdi-car-3-plus::before {
  content: "\F1016"; }

.mdi-car-arrow-left::before {
  content: "\F13B2"; }

.mdi-car-arrow-right::before {
  content: "\F13B3"; }

.mdi-car-back::before {
  content: "\F0E1B"; }

.mdi-car-battery::before {
  content: "\F010C"; }

.mdi-car-brake-abs::before {
  content: "\F0C47"; }

.mdi-car-brake-alert::before {
  content: "\F0C48"; }

.mdi-car-brake-hold::before {
  content: "\F0D5E"; }

.mdi-car-brake-parking::before {
  content: "\F0D5F"; }

.mdi-car-brake-retarder::before {
  content: "\F1017"; }

.mdi-car-child-seat::before {
  content: "\F0FA3"; }

.mdi-car-clutch::before {
  content: "\F1018"; }

.mdi-car-connected::before {
  content: "\F010D"; }

.mdi-car-convertible::before {
  content: "\F07A7"; }

.mdi-car-coolant-level::before {
  content: "\F1019"; }

.mdi-car-cruise-control::before {
  content: "\F0D60"; }

.mdi-car-defrost-front::before {
  content: "\F0D61"; }

.mdi-car-defrost-rear::before {
  content: "\F0D62"; }

.mdi-car-door::before {
  content: "\F0B6B"; }

.mdi-car-door-lock::before {
  content: "\F109D"; }

.mdi-car-electric::before {
  content: "\F0B6C"; }

.mdi-car-esp::before {
  content: "\F0C49"; }

.mdi-car-estate::before {
  content: "\F07A8"; }

.mdi-car-hatchback::before {
  content: "\F07A9"; }

.mdi-car-info::before {
  content: "\F11BE"; }

.mdi-car-key::before {
  content: "\F0B6D"; }

.mdi-car-light-dimmed::before {
  content: "\F0C4A"; }

.mdi-car-light-fog::before {
  content: "\F0C4B"; }

.mdi-car-light-high::before {
  content: "\F0C4C"; }

.mdi-car-limousine::before {
  content: "\F08CD"; }

.mdi-car-multiple::before {
  content: "\F0B6E"; }

.mdi-car-off::before {
  content: "\F0E1C"; }

.mdi-car-parking-lights::before {
  content: "\F0D63"; }

.mdi-car-pickup::before {
  content: "\F07AA"; }

.mdi-car-seat::before {
  content: "\F0FA4"; }

.mdi-car-seat-cooler::before {
  content: "\F0FA5"; }

.mdi-car-seat-heater::before {
  content: "\F0FA6"; }

.mdi-car-shift-pattern::before {
  content: "\F0F40"; }

.mdi-car-side::before {
  content: "\F07AB"; }

.mdi-car-sports::before {
  content: "\F07AC"; }

.mdi-car-tire-alert::before {
  content: "\F0C4D"; }

.mdi-car-traction-control::before {
  content: "\F0D64"; }

.mdi-car-turbocharger::before {
  content: "\F101A"; }

.mdi-car-wash::before {
  content: "\F010E"; }

.mdi-car-windshield::before {
  content: "\F101B"; }

.mdi-car-windshield-outline::before {
  content: "\F101C"; }

.mdi-caravan::before {
  content: "\F07AD"; }

.mdi-card::before {
  content: "\F0B6F"; }

.mdi-card-account-details::before {
  content: "\F05D2"; }

.mdi-card-account-details-outline::before {
  content: "\F0DAB"; }

.mdi-card-account-details-star::before {
  content: "\F02A3"; }

.mdi-card-account-details-star-outline::before {
  content: "\F06DB"; }

.mdi-card-account-mail::before {
  content: "\F018E"; }

.mdi-card-account-mail-outline::before {
  content: "\F0E98"; }

.mdi-card-account-phone::before {
  content: "\F0E99"; }

.mdi-card-account-phone-outline::before {
  content: "\F0E9A"; }

.mdi-card-bulleted::before {
  content: "\F0B70"; }

.mdi-card-bulleted-off::before {
  content: "\F0B71"; }

.mdi-card-bulleted-off-outline::before {
  content: "\F0B72"; }

.mdi-card-bulleted-outline::before {
  content: "\F0B73"; }

.mdi-card-bulleted-settings::before {
  content: "\F0B74"; }

.mdi-card-bulleted-settings-outline::before {
  content: "\F0B75"; }

.mdi-card-outline::before {
  content: "\F0B76"; }

.mdi-card-plus::before {
  content: "\F11FF"; }

.mdi-card-plus-outline::before {
  content: "\F1200"; }

.mdi-card-search::before {
  content: "\F1074"; }

.mdi-card-search-outline::before {
  content: "\F1075"; }

.mdi-card-text::before {
  content: "\F0B77"; }

.mdi-card-text-outline::before {
  content: "\F0B78"; }

.mdi-cards::before {
  content: "\F0638"; }

.mdi-cards-club::before {
  content: "\F08CE"; }

.mdi-cards-diamond::before {
  content: "\F08CF"; }

.mdi-cards-diamond-outline::before {
  content: "\F101D"; }

.mdi-cards-heart::before {
  content: "\F08D0"; }

.mdi-cards-outline::before {
  content: "\F0639"; }

.mdi-cards-playing-outline::before {
  content: "\F063A"; }

.mdi-cards-spade::before {
  content: "\F08D1"; }

.mdi-cards-variant::before {
  content: "\F06C7"; }

.mdi-carrot::before {
  content: "\F010F"; }

.mdi-cart::before {
  content: "\F0110"; }

.mdi-cart-arrow-down::before {
  content: "\F0D66"; }

.mdi-cart-arrow-right::before {
  content: "\F0C4E"; }

.mdi-cart-arrow-up::before {
  content: "\F0D67"; }

.mdi-cart-minus::before {
  content: "\F0D68"; }

.mdi-cart-off::before {
  content: "\F066B"; }

.mdi-cart-outline::before {
  content: "\F0111"; }

.mdi-cart-plus::before {
  content: "\F0112"; }

.mdi-cart-remove::before {
  content: "\F0D69"; }

.mdi-case-sensitive-alt::before {
  content: "\F0113"; }

.mdi-cash::before {
  content: "\F0114"; }

.mdi-cash-100::before {
  content: "\F0115"; }

.mdi-cash-marker::before {
  content: "\F0DB8"; }

.mdi-cash-minus::before {
  content: "\F1260"; }

.mdi-cash-multiple::before {
  content: "\F0116"; }

.mdi-cash-plus::before {
  content: "\F1261"; }

.mdi-cash-refund::before {
  content: "\F0A9C"; }

.mdi-cash-register::before {
  content: "\F0CF4"; }

.mdi-cash-remove::before {
  content: "\F1262"; }

.mdi-cash-usd::before {
  content: "\F1176"; }

.mdi-cash-usd-outline::before {
  content: "\F0117"; }

.mdi-cassette::before {
  content: "\F09D4"; }

.mdi-cast::before {
  content: "\F0118"; }

.mdi-cast-audio::before {
  content: "\F101E"; }

.mdi-cast-connected::before {
  content: "\F0119"; }

.mdi-cast-education::before {
  content: "\F0E1D"; }

.mdi-cast-off::before {
  content: "\F078A"; }

.mdi-castle::before {
  content: "\F011A"; }

.mdi-cat::before {
  content: "\F011B"; }

.mdi-cctv::before {
  content: "\F07AE"; }

.mdi-ceiling-light::before {
  content: "\F0769"; }

.mdi-cellphone::before {
  content: "\F011C"; }

.mdi-cellphone-android::before {
  content: "\F011D"; }

.mdi-cellphone-arrow-down::before {
  content: "\F09D5"; }

.mdi-cellphone-basic::before {
  content: "\F011E"; }

.mdi-cellphone-charging::before {
  content: "\F1397"; }

.mdi-cellphone-cog::before {
  content: "\F0951"; }

.mdi-cellphone-dock::before {
  content: "\F011F"; }

.mdi-cellphone-erase::before {
  content: "\F094D"; }

.mdi-cellphone-information::before {
  content: "\F0F41"; }

.mdi-cellphone-iphone::before {
  content: "\F0120"; }

.mdi-cellphone-key::before {
  content: "\F094E"; }

.mdi-cellphone-link::before {
  content: "\F0121"; }

.mdi-cellphone-link-off::before {
  content: "\F0122"; }

.mdi-cellphone-lock::before {
  content: "\F094F"; }

.mdi-cellphone-message::before {
  content: "\F08D3"; }

.mdi-cellphone-message-off::before {
  content: "\F10D2"; }

.mdi-cellphone-nfc::before {
  content: "\F0E90"; }

.mdi-cellphone-nfc-off::before {
  content: "\F12D8"; }

.mdi-cellphone-off::before {
  content: "\F0950"; }

.mdi-cellphone-play::before {
  content: "\F101F"; }

.mdi-cellphone-screenshot::before {
  content: "\F0A35"; }

.mdi-cellphone-settings::before {
  content: "\F0123"; }

.mdi-cellphone-sound::before {
  content: "\F0952"; }

.mdi-cellphone-text::before {
  content: "\F08D2"; }

.mdi-cellphone-wireless::before {
  content: "\F0815"; }

.mdi-celtic-cross::before {
  content: "\F0CF5"; }

.mdi-centos::before {
  content: "\F111A"; }

.mdi-certificate::before {
  content: "\F0124"; }

.mdi-certificate-outline::before {
  content: "\F1188"; }

.mdi-chair-rolling::before {
  content: "\F0F48"; }

.mdi-chair-school::before {
  content: "\F0125"; }

.mdi-charity::before {
  content: "\F0C4F"; }

.mdi-chart-arc::before {
  content: "\F0126"; }

.mdi-chart-areaspline::before {
  content: "\F0127"; }

.mdi-chart-areaspline-variant::before {
  content: "\F0E91"; }

.mdi-chart-bar::before {
  content: "\F0128"; }

.mdi-chart-bar-stacked::before {
  content: "\F076A"; }

.mdi-chart-bell-curve::before {
  content: "\F0C50"; }

.mdi-chart-bell-curve-cumulative::before {
  content: "\F0FA7"; }

.mdi-chart-bubble::before {
  content: "\F05E3"; }

.mdi-chart-donut::before {
  content: "\F07AF"; }

.mdi-chart-donut-variant::before {
  content: "\F07B0"; }

.mdi-chart-gantt::before {
  content: "\F066C"; }

.mdi-chart-histogram::before {
  content: "\F0129"; }

.mdi-chart-line::before {
  content: "\F012A"; }

.mdi-chart-line-stacked::before {
  content: "\F076B"; }

.mdi-chart-line-variant::before {
  content: "\F07B1"; }

.mdi-chart-multiline::before {
  content: "\F08D4"; }

.mdi-chart-multiple::before {
  content: "\F1213"; }

.mdi-chart-pie::before {
  content: "\F012B"; }

.mdi-chart-ppf::before {
  content: "\F1380"; }

.mdi-chart-sankey::before {
  content: "\F11DF"; }

.mdi-chart-sankey-variant::before {
  content: "\F11E0"; }

.mdi-chart-scatter-plot::before {
  content: "\F0E92"; }

.mdi-chart-scatter-plot-hexbin::before {
  content: "\F066D"; }

.mdi-chart-timeline::before {
  content: "\F066E"; }

.mdi-chart-timeline-variant::before {
  content: "\F0E93"; }

.mdi-chart-tree::before {
  content: "\F0E94"; }

.mdi-chat::before {
  content: "\F0B79"; }

.mdi-chat-alert::before {
  content: "\F0B7A"; }

.mdi-chat-alert-outline::before {
  content: "\F12C9"; }

.mdi-chat-outline::before {
  content: "\F0EDE"; }

.mdi-chat-processing::before {
  content: "\F0B7B"; }

.mdi-chat-processing-outline::before {
  content: "\F12CA"; }

.mdi-chat-sleep::before {
  content: "\F12D1"; }

.mdi-chat-sleep-outline::before {
  content: "\F12D2"; }

.mdi-check::before {
  content: "\F012C"; }

.mdi-check-all::before {
  content: "\F012D"; }

.mdi-check-bold::before {
  content: "\F0E1E"; }

.mdi-check-box-multiple-outline::before {
  content: "\F0C51"; }

.mdi-check-box-outline::before {
  content: "\F0C52"; }

.mdi-check-circle::before {
  content: "\F05E0"; }

.mdi-check-circle-outline::before {
  content: "\F05E1"; }

.mdi-check-decagram::before {
  content: "\F0791"; }

.mdi-check-network::before {
  content: "\F0C53"; }

.mdi-check-network-outline::before {
  content: "\F0C54"; }

.mdi-check-outline::before {
  content: "\F0855"; }

.mdi-check-underline::before {
  content: "\F0E1F"; }

.mdi-check-underline-circle::before {
  content: "\F0E20"; }

.mdi-check-underline-circle-outline::before {
  content: "\F0E21"; }

.mdi-checkbook::before {
  content: "\F0A9D"; }

.mdi-checkbox-blank::before {
  content: "\F012E"; }

.mdi-checkbox-blank-circle::before {
  content: "\F012F"; }

.mdi-checkbox-blank-circle-outline::before {
  content: "\F0130"; }

.mdi-checkbox-blank-off::before {
  content: "\F12EC"; }

.mdi-checkbox-blank-off-outline::before {
  content: "\F12ED"; }

.mdi-checkbox-blank-outline::before {
  content: "\F0131"; }

.mdi-checkbox-intermediate::before {
  content: "\F0856"; }

.mdi-checkbox-marked::before {
  content: "\F0132"; }

.mdi-checkbox-marked-circle::before {
  content: "\F0133"; }

.mdi-checkbox-marked-circle-outline::before {
  content: "\F0134"; }

.mdi-checkbox-marked-outline::before {
  content: "\F0135"; }

.mdi-checkbox-multiple-blank::before {
  content: "\F0136"; }

.mdi-checkbox-multiple-blank-circle::before {
  content: "\F063B"; }

.mdi-checkbox-multiple-blank-circle-outline::before {
  content: "\F063C"; }

.mdi-checkbox-multiple-blank-outline::before {
  content: "\F0137"; }

.mdi-checkbox-multiple-marked::before {
  content: "\F0138"; }

.mdi-checkbox-multiple-marked-circle::before {
  content: "\F063D"; }

.mdi-checkbox-multiple-marked-circle-outline::before {
  content: "\F063E"; }

.mdi-checkbox-multiple-marked-outline::before {
  content: "\F0139"; }

.mdi-checkerboard::before {
  content: "\F013A"; }

.mdi-checkerboard-minus::before {
  content: "\F1202"; }

.mdi-checkerboard-plus::before {
  content: "\F1201"; }

.mdi-checkerboard-remove::before {
  content: "\F1203"; }

.mdi-cheese::before {
  content: "\F12B9"; }

.mdi-chef-hat::before {
  content: "\F0B7C"; }

.mdi-chemical-weapon::before {
  content: "\F013B"; }

.mdi-chess-bishop::before {
  content: "\F085C"; }

.mdi-chess-king::before {
  content: "\F0857"; }

.mdi-chess-knight::before {
  content: "\F0858"; }

.mdi-chess-pawn::before {
  content: "\F0859"; }

.mdi-chess-queen::before {
  content: "\F085A"; }

.mdi-chess-rook::before {
  content: "\F085B"; }

.mdi-chevron-double-down::before {
  content: "\F013C"; }

.mdi-chevron-double-left::before {
  content: "\F013D"; }

.mdi-chevron-double-right::before {
  content: "\F013E"; }

.mdi-chevron-double-up::before {
  content: "\F013F"; }

.mdi-chevron-down::before {
  content: "\F0140"; }

.mdi-chevron-down-box::before {
  content: "\F09D6"; }

.mdi-chevron-down-box-outline::before {
  content: "\F09D7"; }

.mdi-chevron-down-circle::before {
  content: "\F0B26"; }

.mdi-chevron-down-circle-outline::before {
  content: "\F0B27"; }

.mdi-chevron-left::before {
  content: "\F0141"; }

.mdi-chevron-left-box::before {
  content: "\F09D8"; }

.mdi-chevron-left-box-outline::before {
  content: "\F09D9"; }

.mdi-chevron-left-circle::before {
  content: "\F0B28"; }

.mdi-chevron-left-circle-outline::before {
  content: "\F0B29"; }

.mdi-chevron-right::before {
  content: "\F0142"; }

.mdi-chevron-right-box::before {
  content: "\F09DA"; }

.mdi-chevron-right-box-outline::before {
  content: "\F09DB"; }

.mdi-chevron-right-circle::before {
  content: "\F0B2A"; }

.mdi-chevron-right-circle-outline::before {
  content: "\F0B2B"; }

.mdi-chevron-triple-down::before {
  content: "\F0DB9"; }

.mdi-chevron-triple-left::before {
  content: "\F0DBA"; }

.mdi-chevron-triple-right::before {
  content: "\F0DBB"; }

.mdi-chevron-triple-up::before {
  content: "\F0DBC"; }

.mdi-chevron-up::before {
  content: "\F0143"; }

.mdi-chevron-up-box::before {
  content: "\F09DC"; }

.mdi-chevron-up-box-outline::before {
  content: "\F09DD"; }

.mdi-chevron-up-circle::before {
  content: "\F0B2C"; }

.mdi-chevron-up-circle-outline::before {
  content: "\F0B2D"; }

.mdi-chili-hot::before {
  content: "\F07B2"; }

.mdi-chili-medium::before {
  content: "\F07B3"; }

.mdi-chili-mild::before {
  content: "\F07B4"; }

.mdi-chip::before {
  content: "\F061A"; }

.mdi-christianity::before {
  content: "\F0953"; }

.mdi-christianity-outline::before {
  content: "\F0CF6"; }

.mdi-church::before {
  content: "\F0144"; }

.mdi-cigar::before {
  content: "\F1189"; }

.mdi-circle::before {
  content: "\F0765"; }

.mdi-circle-double::before {
  content: "\F0E95"; }

.mdi-circle-edit-outline::before {
  content: "\F08D5"; }

.mdi-circle-expand::before {
  content: "\F0E96"; }

.mdi-circle-half::before {
  content: "\F1395"; }

.mdi-circle-half-full::before {
  content: "\F1396"; }

.mdi-circle-medium::before {
  content: "\F09DE"; }

.mdi-circle-multiple::before {
  content: "\F0B38"; }

.mdi-circle-multiple-outline::before {
  content: "\F0695"; }

.mdi-circle-off-outline::before {
  content: "\F10D3"; }

.mdi-circle-outline::before {
  content: "\F0766"; }

.mdi-circle-slice-1::before {
  content: "\F0A9E"; }

.mdi-circle-slice-2::before {
  content: "\F0A9F"; }

.mdi-circle-slice-3::before {
  content: "\F0AA0"; }

.mdi-circle-slice-4::before {
  content: "\F0AA1"; }

.mdi-circle-slice-5::before {
  content: "\F0AA2"; }

.mdi-circle-slice-6::before {
  content: "\F0AA3"; }

.mdi-circle-slice-7::before {
  content: "\F0AA4"; }

.mdi-circle-slice-8::before {
  content: "\F0AA5"; }

.mdi-circle-small::before {
  content: "\F09DF"; }

.mdi-circular-saw::before {
  content: "\F0E22"; }

.mdi-city::before {
  content: "\F0146"; }

.mdi-city-variant::before {
  content: "\F0A36"; }

.mdi-city-variant-outline::before {
  content: "\F0A37"; }

.mdi-clipboard::before {
  content: "\F0147"; }

.mdi-clipboard-account::before {
  content: "\F0148"; }

.mdi-clipboard-account-outline::before {
  content: "\F0C55"; }

.mdi-clipboard-alert::before {
  content: "\F0149"; }

.mdi-clipboard-alert-outline::before {
  content: "\F0CF7"; }

.mdi-clipboard-arrow-down::before {
  content: "\F014A"; }

.mdi-clipboard-arrow-down-outline::before {
  content: "\F0C56"; }

.mdi-clipboard-arrow-left::before {
  content: "\F014B"; }

.mdi-clipboard-arrow-left-outline::before {
  content: "\F0CF8"; }

.mdi-clipboard-arrow-right::before {
  content: "\F0CF9"; }

.mdi-clipboard-arrow-right-outline::before {
  content: "\F0CFA"; }

.mdi-clipboard-arrow-up::before {
  content: "\F0C57"; }

.mdi-clipboard-arrow-up-outline::before {
  content: "\F0C58"; }

.mdi-clipboard-check::before {
  content: "\F014E"; }

.mdi-clipboard-check-multiple::before {
  content: "\F1263"; }

.mdi-clipboard-check-multiple-outline::before {
  content: "\F1264"; }

.mdi-clipboard-check-outline::before {
  content: "\F08A8"; }

.mdi-clipboard-file::before {
  content: "\F1265"; }

.mdi-clipboard-file-outline::before {
  content: "\F1266"; }

.mdi-clipboard-flow::before {
  content: "\F06C8"; }

.mdi-clipboard-flow-outline::before {
  content: "\F1117"; }

.mdi-clipboard-list::before {
  content: "\F10D4"; }

.mdi-clipboard-list-outline::before {
  content: "\F10D5"; }

.mdi-clipboard-multiple::before {
  content: "\F1267"; }

.mdi-clipboard-multiple-outline::before {
  content: "\F1268"; }

.mdi-clipboard-outline::before {
  content: "\F014C"; }

.mdi-clipboard-play::before {
  content: "\F0C59"; }

.mdi-clipboard-play-multiple::before {
  content: "\F1269"; }

.mdi-clipboard-play-multiple-outline::before {
  content: "\F126A"; }

.mdi-clipboard-play-outline::before {
  content: "\F0C5A"; }

.mdi-clipboard-plus::before {
  content: "\F0751"; }

.mdi-clipboard-plus-outline::before {
  content: "\F131F"; }

.mdi-clipboard-pulse::before {
  content: "\F085D"; }

.mdi-clipboard-pulse-outline::before {
  content: "\F085E"; }

.mdi-clipboard-text::before {
  content: "\F014D"; }

.mdi-clipboard-text-multiple::before {
  content: "\F126B"; }

.mdi-clipboard-text-multiple-outline::before {
  content: "\F126C"; }

.mdi-clipboard-text-outline::before {
  content: "\F0A38"; }

.mdi-clipboard-text-play::before {
  content: "\F0C5B"; }

.mdi-clipboard-text-play-outline::before {
  content: "\F0C5C"; }

.mdi-clippy::before {
  content: "\F014F"; }

.mdi-clock::before {
  content: "\F0954"; }

.mdi-clock-alert::before {
  content: "\F0955"; }

.mdi-clock-alert-outline::before {
  content: "\F05CE"; }

.mdi-clock-check::before {
  content: "\F0FA8"; }

.mdi-clock-check-outline::before {
  content: "\F0FA9"; }

.mdi-clock-digital::before {
  content: "\F0E97"; }

.mdi-clock-end::before {
  content: "\F0151"; }

.mdi-clock-fast::before {
  content: "\F0152"; }

.mdi-clock-in::before {
  content: "\F0153"; }

.mdi-clock-out::before {
  content: "\F0154"; }

.mdi-clock-outline::before {
  content: "\F0150"; }

.mdi-clock-start::before {
  content: "\F0155"; }

.mdi-close::before {
  content: "\F0156"; }

.mdi-close-box::before {
  content: "\F0157"; }

.mdi-close-box-multiple::before {
  content: "\F0C5D"; }

.mdi-close-box-multiple-outline::before {
  content: "\F0C5E"; }

.mdi-close-box-outline::before {
  content: "\F0158"; }

.mdi-close-circle::before {
  content: "\F0159"; }

.mdi-close-circle-multiple::before {
  content: "\F062A"; }

.mdi-close-circle-multiple-outline::before {
  content: "\F0883"; }

.mdi-close-circle-outline::before {
  content: "\F015A"; }

.mdi-close-network::before {
  content: "\F015B"; }

.mdi-close-network-outline::before {
  content: "\F0C5F"; }

.mdi-close-octagon::before {
  content: "\F015C"; }

.mdi-close-octagon-outline::before {
  content: "\F015D"; }

.mdi-close-outline::before {
  content: "\F06C9"; }

.mdi-close-thick::before {
  content: "\F1398"; }

.mdi-closed-caption::before {
  content: "\F015E"; }

.mdi-closed-caption-outline::before {
  content: "\F0DBD"; }

.mdi-cloud::before {
  content: "\F015F"; }

.mdi-cloud-alert::before {
  content: "\F09E0"; }

.mdi-cloud-braces::before {
  content: "\F07B5"; }

.mdi-cloud-check::before {
  content: "\F0160"; }

.mdi-cloud-check-outline::before {
  content: "\F12CC"; }

.mdi-cloud-circle::before {
  content: "\F0161"; }

.mdi-cloud-download::before {
  content: "\F0162"; }

.mdi-cloud-download-outline::before {
  content: "\F0B7D"; }

.mdi-cloud-lock::before {
  content: "\F11F1"; }

.mdi-cloud-lock-outline::before {
  content: "\F11F2"; }

.mdi-cloud-off-outline::before {
  content: "\F0164"; }

.mdi-cloud-outline::before {
  content: "\F0163"; }

.mdi-cloud-print::before {
  content: "\F0165"; }

.mdi-cloud-print-outline::before {
  content: "\F0166"; }

.mdi-cloud-question::before {
  content: "\F0A39"; }

.mdi-cloud-refresh::before {
  content: "\F052A"; }

.mdi-cloud-search::before {
  content: "\F0956"; }

.mdi-cloud-search-outline::before {
  content: "\F0957"; }

.mdi-cloud-sync::before {
  content: "\F063F"; }

.mdi-cloud-sync-outline::before {
  content: "\F12D6"; }

.mdi-cloud-tags::before {
  content: "\F07B6"; }

.mdi-cloud-upload::before {
  content: "\F0167"; }

.mdi-cloud-upload-outline::before {
  content: "\F0B7E"; }

.mdi-clover::before {
  content: "\F0816"; }

.mdi-coach-lamp::before {
  content: "\F1020"; }

.mdi-coat-rack::before {
  content: "\F109E"; }

.mdi-code-array::before {
  content: "\F0168"; }

.mdi-code-braces::before {
  content: "\F0169"; }

.mdi-code-braces-box::before {
  content: "\F10D6"; }

.mdi-code-brackets::before {
  content: "\F016A"; }

.mdi-code-equal::before {
  content: "\F016B"; }

.mdi-code-greater-than::before {
  content: "\F016C"; }

.mdi-code-greater-than-or-equal::before {
  content: "\F016D"; }

.mdi-code-json::before {
  content: "\F0626"; }

.mdi-code-less-than::before {
  content: "\F016E"; }

.mdi-code-less-than-or-equal::before {
  content: "\F016F"; }

.mdi-code-not-equal::before {
  content: "\F0170"; }

.mdi-code-not-equal-variant::before {
  content: "\F0171"; }

.mdi-code-parentheses::before {
  content: "\F0172"; }

.mdi-code-parentheses-box::before {
  content: "\F10D7"; }

.mdi-code-string::before {
  content: "\F0173"; }

.mdi-code-tags::before {
  content: "\F0174"; }

.mdi-code-tags-check::before {
  content: "\F0694"; }

.mdi-codepen::before {
  content: "\F0175"; }

.mdi-coffee::before {
  content: "\F0176"; }

.mdi-coffee-maker::before {
  content: "\F109F"; }

.mdi-coffee-off::before {
  content: "\F0FAA"; }

.mdi-coffee-off-outline::before {
  content: "\F0FAB"; }

.mdi-coffee-outline::before {
  content: "\F06CA"; }

.mdi-coffee-to-go::before {
  content: "\F0177"; }

.mdi-coffee-to-go-outline::before {
  content: "\F130E"; }

.mdi-coffin::before {
  content: "\F0B7F"; }

.mdi-cog::before {
  content: "\F0493"; }

.mdi-cog-box::before {
  content: "\F0494"; }

.mdi-cog-clockwise::before {
  content: "\F11DD"; }

.mdi-cog-counterclockwise::before {
  content: "\F11DE"; }

.mdi-cog-outline::before {
  content: "\F08BB"; }

.mdi-cog-transfer::before {
  content: "\F105B"; }

.mdi-cog-transfer-outline::before {
  content: "\F105C"; }

.mdi-cogs::before {
  content: "\F08D6"; }

.mdi-collage::before {
  content: "\F0640"; }

.mdi-collapse-all::before {
  content: "\F0AA6"; }

.mdi-collapse-all-outline::before {
  content: "\F0AA7"; }

.mdi-color-helper::before {
  content: "\F0179"; }

.mdi-comma::before {
  content: "\F0E23"; }

.mdi-comma-box::before {
  content: "\F0E2B"; }

.mdi-comma-box-outline::before {
  content: "\F0E24"; }

.mdi-comma-circle::before {
  content: "\F0E25"; }

.mdi-comma-circle-outline::before {
  content: "\F0E26"; }

.mdi-comment::before {
  content: "\F017A"; }

.mdi-comment-account::before {
  content: "\F017B"; }

.mdi-comment-account-outline::before {
  content: "\F017C"; }

.mdi-comment-alert::before {
  content: "\F017D"; }

.mdi-comment-alert-outline::before {
  content: "\F017E"; }

.mdi-comment-arrow-left::before {
  content: "\F09E1"; }

.mdi-comment-arrow-left-outline::before {
  content: "\F09E2"; }

.mdi-comment-arrow-right::before {
  content: "\F09E3"; }

.mdi-comment-arrow-right-outline::before {
  content: "\F09E4"; }

.mdi-comment-check::before {
  content: "\F017F"; }

.mdi-comment-check-outline::before {
  content: "\F0180"; }

.mdi-comment-edit::before {
  content: "\F11BF"; }

.mdi-comment-edit-outline::before {
  content: "\F12C4"; }

.mdi-comment-eye::before {
  content: "\F0A3A"; }

.mdi-comment-eye-outline::before {
  content: "\F0A3B"; }

.mdi-comment-multiple::before {
  content: "\F085F"; }

.mdi-comment-multiple-outline::before {
  content: "\F0181"; }

.mdi-comment-outline::before {
  content: "\F0182"; }

.mdi-comment-plus::before {
  content: "\F09E5"; }

.mdi-comment-plus-outline::before {
  content: "\F0183"; }

.mdi-comment-processing::before {
  content: "\F0184"; }

.mdi-comment-processing-outline::before {
  content: "\F0185"; }

.mdi-comment-question::before {
  content: "\F0817"; }

.mdi-comment-question-outline::before {
  content: "\F0186"; }

.mdi-comment-quote::before {
  content: "\F1021"; }

.mdi-comment-quote-outline::before {
  content: "\F1022"; }

.mdi-comment-remove::before {
  content: "\F05DE"; }

.mdi-comment-remove-outline::before {
  content: "\F0187"; }

.mdi-comment-search::before {
  content: "\F0A3C"; }

.mdi-comment-search-outline::before {
  content: "\F0A3D"; }

.mdi-comment-text::before {
  content: "\F0188"; }

.mdi-comment-text-multiple::before {
  content: "\F0860"; }

.mdi-comment-text-multiple-outline::before {
  content: "\F0861"; }

.mdi-comment-text-outline::before {
  content: "\F0189"; }

.mdi-compare::before {
  content: "\F018A"; }

.mdi-compass::before {
  content: "\F018B"; }

.mdi-compass-off::before {
  content: "\F0B80"; }

.mdi-compass-off-outline::before {
  content: "\F0B81"; }

.mdi-compass-outline::before {
  content: "\F018C"; }

.mdi-compass-rose::before {
  content: "\F1382"; }

.mdi-concourse-ci::before {
  content: "\F10A0"; }

.mdi-console::before {
  content: "\F018D"; }

.mdi-console-line::before {
  content: "\F07B7"; }

.mdi-console-network::before {
  content: "\F08A9"; }

.mdi-console-network-outline::before {
  content: "\F0C60"; }

.mdi-consolidate::before {
  content: "\F10D8"; }

.mdi-contactless-payment::before {
  content: "\F0D6A"; }

.mdi-contactless-payment-circle::before {
  content: "\F0321"; }

.mdi-contactless-payment-circle-outline::before {
  content: "\F0408"; }

.mdi-contacts::before {
  content: "\F06CB"; }

.mdi-contacts-outline::before {
  content: "\F05B8"; }

.mdi-contain::before {
  content: "\F0A3E"; }

.mdi-contain-end::before {
  content: "\F0A3F"; }

.mdi-contain-start::before {
  content: "\F0A40"; }

.mdi-content-copy::before {
  content: "\F018F"; }

.mdi-content-cut::before {
  content: "\F0190"; }

.mdi-content-duplicate::before {
  content: "\F0191"; }

.mdi-content-paste::before {
  content: "\F0192"; }

.mdi-content-save::before {
  content: "\F0193"; }

.mdi-content-save-alert::before {
  content: "\F0F42"; }

.mdi-content-save-alert-outline::before {
  content: "\F0F43"; }

.mdi-content-save-all::before {
  content: "\F0194"; }

.mdi-content-save-all-outline::before {
  content: "\F0F44"; }

.mdi-content-save-edit::before {
  content: "\F0CFB"; }

.mdi-content-save-edit-outline::before {
  content: "\F0CFC"; }

.mdi-content-save-move::before {
  content: "\F0E27"; }

.mdi-content-save-move-outline::before {
  content: "\F0E28"; }

.mdi-content-save-outline::before {
  content: "\F0818"; }

.mdi-content-save-settings::before {
  content: "\F061B"; }

.mdi-content-save-settings-outline::before {
  content: "\F0B2E"; }

.mdi-contrast::before {
  content: "\F0195"; }

.mdi-contrast-box::before {
  content: "\F0196"; }

.mdi-contrast-circle::before {
  content: "\F0197"; }

.mdi-controller-classic::before {
  content: "\F0B82"; }

.mdi-controller-classic-outline::before {
  content: "\F0B83"; }

.mdi-cookie::before {
  content: "\F0198"; }

.mdi-coolant-temperature::before {
  content: "\F03C8"; }

.mdi-copyright::before {
  content: "\F05E6"; }

.mdi-cordova::before {
  content: "\F0958"; }

.mdi-corn::before {
  content: "\F07B8"; }

.mdi-counter::before {
  content: "\F0199"; }

.mdi-cow::before {
  content: "\F019A"; }

.mdi-cpu-32-bit::before {
  content: "\F0EDF"; }

.mdi-cpu-64-bit::before {
  content: "\F0EE0"; }

.mdi-crane::before {
  content: "\F0862"; }

.mdi-creation::before {
  content: "\F0674"; }

.mdi-creative-commons::before {
  content: "\F0D6B"; }

.mdi-credit-card::before {
  content: "\F0FEF"; }

.mdi-credit-card-clock::before {
  content: "\F0EE1"; }

.mdi-credit-card-clock-outline::before {
  content: "\F0EE2"; }

.mdi-credit-card-marker::before {
  content: "\F06A8"; }

.mdi-credit-card-marker-outline::before {
  content: "\F0DBE"; }

.mdi-credit-card-minus::before {
  content: "\F0FAC"; }

.mdi-credit-card-minus-outline::before {
  content: "\F0FAD"; }

.mdi-credit-card-multiple::before {
  content: "\F0FF0"; }

.mdi-credit-card-multiple-outline::before {
  content: "\F019C"; }

.mdi-credit-card-off::before {
  content: "\F0FF1"; }

.mdi-credit-card-off-outline::before {
  content: "\F05E4"; }

.mdi-credit-card-outline::before {
  content: "\F019B"; }

.mdi-credit-card-plus::before {
  content: "\F0FF2"; }

.mdi-credit-card-plus-outline::before {
  content: "\F0676"; }

.mdi-credit-card-refund::before {
  content: "\F0FF3"; }

.mdi-credit-card-refund-outline::before {
  content: "\F0AA8"; }

.mdi-credit-card-remove::before {
  content: "\F0FAE"; }

.mdi-credit-card-remove-outline::before {
  content: "\F0FAF"; }

.mdi-credit-card-scan::before {
  content: "\F0FF4"; }

.mdi-credit-card-scan-outline::before {
  content: "\F019D"; }

.mdi-credit-card-settings::before {
  content: "\F0FF5"; }

.mdi-credit-card-settings-outline::before {
  content: "\F08D7"; }

.mdi-credit-card-wireless::before {
  content: "\F0802"; }

.mdi-credit-card-wireless-off::before {
  content: "\F057A"; }

.mdi-credit-card-wireless-off-outline::before {
  content: "\F057B"; }

.mdi-credit-card-wireless-outline::before {
  content: "\F0D6C"; }

.mdi-cricket::before {
  content: "\F0D6D"; }

.mdi-crop::before {
  content: "\F019E"; }

.mdi-crop-free::before {
  content: "\F019F"; }

.mdi-crop-landscape::before {
  content: "\F01A0"; }

.mdi-crop-portrait::before {
  content: "\F01A1"; }

.mdi-crop-rotate::before {
  content: "\F0696"; }

.mdi-crop-square::before {
  content: "\F01A2"; }

.mdi-crosshairs::before {
  content: "\F01A3"; }

.mdi-crosshairs-gps::before {
  content: "\F01A4"; }

.mdi-crosshairs-off::before {
  content: "\F0F45"; }

.mdi-crosshairs-question::before {
  content: "\F1136"; }

.mdi-crown::before {
  content: "\F01A5"; }

.mdi-crown-outline::before {
  content: "\F11D0"; }

.mdi-cryengine::before {
  content: "\F0959"; }

.mdi-crystal-ball::before {
  content: "\F0B2F"; }

.mdi-cube::before {
  content: "\F01A6"; }

.mdi-cube-outline::before {
  content: "\F01A7"; }

.mdi-cube-scan::before {
  content: "\F0B84"; }

.mdi-cube-send::before {
  content: "\F01A8"; }

.mdi-cube-unfolded::before {
  content: "\F01A9"; }

.mdi-cup::before {
  content: "\F01AA"; }

.mdi-cup-off::before {
  content: "\F05E5"; }

.mdi-cup-off-outline::before {
  content: "\F137D"; }

.mdi-cup-outline::before {
  content: "\F130F"; }

.mdi-cup-water::before {
  content: "\F01AB"; }

.mdi-cupboard::before {
  content: "\F0F46"; }

.mdi-cupboard-outline::before {
  content: "\F0F47"; }

.mdi-cupcake::before {
  content: "\F095A"; }

.mdi-curling::before {
  content: "\F0863"; }

.mdi-currency-bdt::before {
  content: "\F0864"; }

.mdi-currency-brl::before {
  content: "\F0B85"; }

.mdi-currency-btc::before {
  content: "\F01AC"; }

.mdi-currency-cny::before {
  content: "\F07BA"; }

.mdi-currency-eth::before {
  content: "\F07BB"; }

.mdi-currency-eur::before {
  content: "\F01AD"; }

.mdi-currency-eur-off::before {
  content: "\F1315"; }

.mdi-currency-gbp::before {
  content: "\F01AE"; }

.mdi-currency-ils::before {
  content: "\F0C61"; }

.mdi-currency-inr::before {
  content: "\F01AF"; }

.mdi-currency-jpy::before {
  content: "\F07BC"; }

.mdi-currency-krw::before {
  content: "\F07BD"; }

.mdi-currency-kzt::before {
  content: "\F0865"; }

.mdi-currency-ngn::before {
  content: "\F01B0"; }

.mdi-currency-php::before {
  content: "\F09E6"; }

.mdi-currency-rial::before {
  content: "\F0E9C"; }

.mdi-currency-rub::before {
  content: "\F01B1"; }

.mdi-currency-sign::before {
  content: "\F07BE"; }

.mdi-currency-try::before {
  content: "\F01B2"; }

.mdi-currency-twd::before {
  content: "\F07BF"; }

.mdi-currency-usd::before {
  content: "\F01C1"; }

.mdi-currency-usd-circle::before {
  content: "\F116B"; }

.mdi-currency-usd-circle-outline::before {
  content: "\F0178"; }

.mdi-currency-usd-off::before {
  content: "\F067A"; }

.mdi-current-ac::before {
  content: "\F095B"; }

.mdi-current-dc::before {
  content: "\F095C"; }

.mdi-cursor-default::before {
  content: "\F01C0"; }

.mdi-cursor-default-click::before {
  content: "\F0CFD"; }

.mdi-cursor-default-click-outline::before {
  content: "\F0CFE"; }

.mdi-cursor-default-gesture::before {
  content: "\F1127"; }

.mdi-cursor-default-gesture-outline::before {
  content: "\F1128"; }

.mdi-cursor-default-outline::before {
  content: "\F01BF"; }

.mdi-cursor-move::before {
  content: "\F01BE"; }

.mdi-cursor-pointer::before {
  content: "\F01BD"; }

.mdi-cursor-text::before {
  content: "\F05E7"; }

.mdi-database::before {
  content: "\F01BC"; }

.mdi-database-check::before {
  content: "\F0AA9"; }

.mdi-database-edit::before {
  content: "\F0B86"; }

.mdi-database-export::before {
  content: "\F095E"; }

.mdi-database-import::before {
  content: "\F095D"; }

.mdi-database-lock::before {
  content: "\F0AAA"; }

.mdi-database-marker::before {
  content: "\F12F6"; }

.mdi-database-minus::before {
  content: "\F01BB"; }

.mdi-database-plus::before {
  content: "\F01BA"; }

.mdi-database-refresh::before {
  content: "\F05C2"; }

.mdi-database-remove::before {
  content: "\F0D00"; }

.mdi-database-search::before {
  content: "\F0866"; }

.mdi-database-settings::before {
  content: "\F0D01"; }

.mdi-database-sync::before {
  content: "\F0CFF"; }

.mdi-death-star::before {
  content: "\F08D8"; }

.mdi-death-star-variant::before {
  content: "\F08D9"; }

.mdi-deathly-hallows::before {
  content: "\F0B87"; }

.mdi-debian::before {
  content: "\F08DA"; }

.mdi-debug-step-into::before {
  content: "\F01B9"; }

.mdi-debug-step-out::before {
  content: "\F01B8"; }

.mdi-debug-step-over::before {
  content: "\F01B7"; }

.mdi-decagram::before {
  content: "\F076C"; }

.mdi-decagram-outline::before {
  content: "\F076D"; }

.mdi-decimal::before {
  content: "\F10A1"; }

.mdi-decimal-comma::before {
  content: "\F10A2"; }

.mdi-decimal-comma-decrease::before {
  content: "\F10A3"; }

.mdi-decimal-comma-increase::before {
  content: "\F10A4"; }

.mdi-decimal-decrease::before {
  content: "\F01B6"; }

.mdi-decimal-increase::before {
  content: "\F01B5"; }

.mdi-delete::before {
  content: "\F01B4"; }

.mdi-delete-alert::before {
  content: "\F10A5"; }

.mdi-delete-alert-outline::before {
  content: "\F10A6"; }

.mdi-delete-circle::before {
  content: "\F0683"; }

.mdi-delete-circle-outline::before {
  content: "\F0B88"; }

.mdi-delete-empty::before {
  content: "\F06CC"; }

.mdi-delete-empty-outline::before {
  content: "\F0E9D"; }

.mdi-delete-forever::before {
  content: "\F05E8"; }

.mdi-delete-forever-outline::before {
  content: "\F0B89"; }

.mdi-delete-off::before {
  content: "\F10A7"; }

.mdi-delete-off-outline::before {
  content: "\F10A8"; }

.mdi-delete-outline::before {
  content: "\F09E7"; }

.mdi-delete-restore::before {
  content: "\F0819"; }

.mdi-delete-sweep::before {
  content: "\F05E9"; }

.mdi-delete-sweep-outline::before {
  content: "\F0C62"; }

.mdi-delete-variant::before {
  content: "\F01B3"; }

.mdi-delta::before {
  content: "\F01C2"; }

.mdi-desk::before {
  content: "\F1239"; }

.mdi-desk-lamp::before {
  content: "\F095F"; }

.mdi-deskphone::before {
  content: "\F01C3"; }

.mdi-desktop-classic::before {
  content: "\F07C0"; }

.mdi-desktop-mac::before {
  content: "\F01C4"; }

.mdi-desktop-mac-dashboard::before {
  content: "\F09E8"; }

.mdi-desktop-tower::before {
  content: "\F01C5"; }

.mdi-desktop-tower-monitor::before {
  content: "\F0AAB"; }

.mdi-details::before {
  content: "\F01C6"; }

.mdi-dev-to::before {
  content: "\F0D6E"; }

.mdi-developer-board::before {
  content: "\F0697"; }

.mdi-deviantart::before {
  content: "\F01C7"; }

.mdi-devices::before {
  content: "\F0FB0"; }

.mdi-diabetes::before {
  content: "\F1126"; }

.mdi-dialpad::before {
  content: "\F061C"; }

.mdi-diameter::before {
  content: "\F0C63"; }

.mdi-diameter-outline::before {
  content: "\F0C64"; }

.mdi-diameter-variant::before {
  content: "\F0C65"; }

.mdi-diamond::before {
  content: "\F0B8A"; }

.mdi-diamond-outline::before {
  content: "\F0B8B"; }

.mdi-diamond-stone::before {
  content: "\F01C8"; }

.mdi-dice-1::before {
  content: "\F01CA"; }

.mdi-dice-1-outline::before {
  content: "\F114A"; }

.mdi-dice-2::before {
  content: "\F01CB"; }

.mdi-dice-2-outline::before {
  content: "\F114B"; }

.mdi-dice-3::before {
  content: "\F01CC"; }

.mdi-dice-3-outline::before {
  content: "\F114C"; }

.mdi-dice-4::before {
  content: "\F01CD"; }

.mdi-dice-4-outline::before {
  content: "\F114D"; }

.mdi-dice-5::before {
  content: "\F01CE"; }

.mdi-dice-5-outline::before {
  content: "\F114E"; }

.mdi-dice-6::before {
  content: "\F01CF"; }

.mdi-dice-6-outline::before {
  content: "\F114F"; }

.mdi-dice-d10::before {
  content: "\F1153"; }

.mdi-dice-d10-outline::before {
  content: "\F076F"; }

.mdi-dice-d12::before {
  content: "\F1154"; }

.mdi-dice-d12-outline::before {
  content: "\F0867"; }

.mdi-dice-d20::before {
  content: "\F1155"; }

.mdi-dice-d20-outline::before {
  content: "\F05EA"; }

.mdi-dice-d4::before {
  content: "\F1150"; }

.mdi-dice-d4-outline::before {
  content: "\F05EB"; }

.mdi-dice-d6::before {
  content: "\F1151"; }

.mdi-dice-d6-outline::before {
  content: "\F05ED"; }

.mdi-dice-d8::before {
  content: "\F1152"; }

.mdi-dice-d8-outline::before {
  content: "\F05EC"; }

.mdi-dice-multiple::before {
  content: "\F076E"; }

.mdi-dice-multiple-outline::before {
  content: "\F1156"; }

.mdi-digital-ocean::before {
  content: "\F1237"; }

.mdi-dip-switch::before {
  content: "\F07C1"; }

.mdi-directions::before {
  content: "\F01D0"; }

.mdi-directions-fork::before {
  content: "\F0641"; }

.mdi-disc::before {
  content: "\F05EE"; }

.mdi-disc-alert::before {
  content: "\F01D1"; }

.mdi-disc-player::before {
  content: "\F0960"; }

.mdi-discord::before {
  content: "\F066F"; }

.mdi-dishwasher::before {
  content: "\F0AAC"; }

.mdi-dishwasher-alert::before {
  content: "\F11B8"; }

.mdi-dishwasher-off::before {
  content: "\F11B9"; }

.mdi-disqus::before {
  content: "\F01D2"; }

.mdi-distribute-horizontal-center::before {
  content: "\F11C9"; }

.mdi-distribute-horizontal-left::before {
  content: "\F11C8"; }

.mdi-distribute-horizontal-right::before {
  content: "\F11CA"; }

.mdi-distribute-vertical-bottom::before {
  content: "\F11CB"; }

.mdi-distribute-vertical-center::before {
  content: "\F11CC"; }

.mdi-distribute-vertical-top::before {
  content: "\F11CD"; }

.mdi-diving-flippers::before {
  content: "\F0DBF"; }

.mdi-diving-helmet::before {
  content: "\F0DC0"; }

.mdi-diving-scuba::before {
  content: "\F0DC1"; }

.mdi-diving-scuba-flag::before {
  content: "\F0DC2"; }

.mdi-diving-scuba-tank::before {
  content: "\F0DC3"; }

.mdi-diving-scuba-tank-multiple::before {
  content: "\F0DC4"; }

.mdi-diving-snorkel::before {
  content: "\F0DC5"; }

.mdi-division::before {
  content: "\F01D4"; }

.mdi-division-box::before {
  content: "\F01D5"; }

.mdi-dlna::before {
  content: "\F0A41"; }

.mdi-dna::before {
  content: "\F0684"; }

.mdi-dns::before {
  content: "\F01D6"; }

.mdi-dns-outline::before {
  content: "\F0B8C"; }

.mdi-do-not-disturb::before {
  content: "\F0698"; }

.mdi-do-not-disturb-off::before {
  content: "\F0699"; }

.mdi-dock-bottom::before {
  content: "\F10A9"; }

.mdi-dock-left::before {
  content: "\F10AA"; }

.mdi-dock-right::before {
  content: "\F10AB"; }

.mdi-dock-window::before {
  content: "\F10AC"; }

.mdi-docker::before {
  content: "\F0868"; }

.mdi-doctor::before {
  content: "\F0A42"; }

.mdi-dog::before {
  content: "\F0A43"; }

.mdi-dog-service::before {
  content: "\F0AAD"; }

.mdi-dog-side::before {
  content: "\F0A44"; }

.mdi-dolby::before {
  content: "\F06B3"; }

.mdi-dolly::before {
  content: "\F0E9E"; }

.mdi-domain::before {
  content: "\F01D7"; }

.mdi-domain-off::before {
  content: "\F0D6F"; }

.mdi-domain-plus::before {
  content: "\F10AD"; }

.mdi-domain-remove::before {
  content: "\F10AE"; }

.mdi-domino-mask::before {
  content: "\F1023"; }

.mdi-donkey::before {
  content: "\F07C2"; }

.mdi-door::before {
  content: "\F081A"; }

.mdi-door-closed::before {
  content: "\F081B"; }

.mdi-door-closed-lock::before {
  content: "\F10AF"; }

.mdi-door-open::before {
  content: "\F081C"; }

.mdi-doorbell::before {
  content: "\F12E6"; }

.mdi-doorbell-video::before {
  content: "\F0869"; }

.mdi-dot-net::before {
  content: "\F0AAE"; }

.mdi-dots-horizontal::before {
  content: "\F01D8"; }

.mdi-dots-horizontal-circle::before {
  content: "\F07C3"; }

.mdi-dots-horizontal-circle-outline::before {
  content: "\F0B8D"; }

.mdi-dots-vertical::before {
  content: "\F01D9"; }

.mdi-dots-vertical-circle::before {
  content: "\F07C4"; }

.mdi-dots-vertical-circle-outline::before {
  content: "\F0B8E"; }

.mdi-douban::before {
  content: "\F069A"; }

.mdi-download::before {
  content: "\F01DA"; }

.mdi-download-lock::before {
  content: "\F1320"; }

.mdi-download-lock-outline::before {
  content: "\F1321"; }

.mdi-download-multiple::before {
  content: "\F09E9"; }

.mdi-download-network::before {
  content: "\F06F4"; }

.mdi-download-network-outline::before {
  content: "\F0C66"; }

.mdi-download-off::before {
  content: "\F10B0"; }

.mdi-download-off-outline::before {
  content: "\F10B1"; }

.mdi-download-outline::before {
  content: "\F0B8F"; }

.mdi-drag::before {
  content: "\F01DB"; }

.mdi-drag-horizontal::before {
  content: "\F01DC"; }

.mdi-drag-horizontal-variant::before {
  content: "\F12F0"; }

.mdi-drag-variant::before {
  content: "\F0B90"; }

.mdi-drag-vertical::before {
  content: "\F01DD"; }

.mdi-drag-vertical-variant::before {
  content: "\F12F1"; }

.mdi-drama-masks::before {
  content: "\F0D02"; }

.mdi-draw::before {
  content: "\F0F49"; }

.mdi-drawing::before {
  content: "\F01DE"; }

.mdi-drawing-box::before {
  content: "\F01DF"; }

.mdi-dresser::before {
  content: "\F0F4A"; }

.mdi-dresser-outline::before {
  content: "\F0F4B"; }

.mdi-drone::before {
  content: "\F01E2"; }

.mdi-dropbox::before {
  content: "\F01E3"; }

.mdi-drupal::before {
  content: "\F01E4"; }

.mdi-duck::before {
  content: "\F01E5"; }

.mdi-dumbbell::before {
  content: "\F01E6"; }

.mdi-dump-truck::before {
  content: "\F0C67"; }

.mdi-ear-hearing::before {
  content: "\F07C5"; }

.mdi-ear-hearing-off::before {
  content: "\F0A45"; }

.mdi-earth::before {
  content: "\F01E7"; }

.mdi-earth-arrow-right::before {
  content: "\F1311"; }

.mdi-earth-box::before {
  content: "\F06CD"; }

.mdi-earth-box-off::before {
  content: "\F06CE"; }

.mdi-earth-off::before {
  content: "\F01E8"; }

.mdi-egg::before {
  content: "\F0AAF"; }

.mdi-egg-easter::before {
  content: "\F0AB0"; }

.mdi-eight-track::before {
  content: "\F09EA"; }

.mdi-eject::before {
  content: "\F01EA"; }

.mdi-eject-outline::before {
  content: "\F0B91"; }

.mdi-electric-switch::before {
  content: "\F0E9F"; }

.mdi-electric-switch-closed::before {
  content: "\F10D9"; }

.mdi-electron-framework::before {
  content: "\F1024"; }

.mdi-elephant::before {
  content: "\F07C6"; }

.mdi-elevation-decline::before {
  content: "\F01EB"; }

.mdi-elevation-rise::before {
  content: "\F01EC"; }

.mdi-elevator::before {
  content: "\F01ED"; }

.mdi-elevator-down::before {
  content: "\F12C2"; }

.mdi-elevator-passenger::before {
  content: "\F1381"; }

.mdi-elevator-up::before {
  content: "\F12C1"; }

.mdi-ellipse::before {
  content: "\F0EA0"; }

.mdi-ellipse-outline::before {
  content: "\F0EA1"; }

.mdi-email::before {
  content: "\F01EE"; }

.mdi-email-alert::before {
  content: "\F06CF"; }

.mdi-email-alert-outline::before {
  content: "\F0D42"; }

.mdi-email-box::before {
  content: "\F0D03"; }

.mdi-email-check::before {
  content: "\F0AB1"; }

.mdi-email-check-outline::before {
  content: "\F0AB2"; }

.mdi-email-edit::before {
  content: "\F0EE3"; }

.mdi-email-edit-outline::before {
  content: "\F0EE4"; }

.mdi-email-lock::before {
  content: "\F01F1"; }

.mdi-email-mark-as-unread::before {
  content: "\F0B92"; }

.mdi-email-minus::before {
  content: "\F0EE5"; }

.mdi-email-minus-outline::before {
  content: "\F0EE6"; }

.mdi-email-multiple::before {
  content: "\F0EE7"; }

.mdi-email-multiple-outline::before {
  content: "\F0EE8"; }

.mdi-email-newsletter::before {
  content: "\F0FB1"; }

.mdi-email-open::before {
  content: "\F01EF"; }

.mdi-email-open-multiple::before {
  content: "\F0EE9"; }

.mdi-email-open-multiple-outline::before {
  content: "\F0EEA"; }

.mdi-email-open-outline::before {
  content: "\F05EF"; }

.mdi-email-outline::before {
  content: "\F01F0"; }

.mdi-email-plus::before {
  content: "\F09EB"; }

.mdi-email-plus-outline::before {
  content: "\F09EC"; }

.mdi-email-receive::before {
  content: "\F10DA"; }

.mdi-email-receive-outline::before {
  content: "\F10DB"; }

.mdi-email-search::before {
  content: "\F0961"; }

.mdi-email-search-outline::before {
  content: "\F0962"; }

.mdi-email-send::before {
  content: "\F10DC"; }

.mdi-email-send-outline::before {
  content: "\F10DD"; }

.mdi-email-sync::before {
  content: "\F12C7"; }

.mdi-email-sync-outline::before {
  content: "\F12C8"; }

.mdi-email-variant::before {
  content: "\F05F0"; }

.mdi-ember::before {
  content: "\F0B30"; }

.mdi-emby::before {
  content: "\F06B4"; }

.mdi-emoticon::before {
  content: "\F0C68"; }

.mdi-emoticon-angry::before {
  content: "\F0C69"; }

.mdi-emoticon-angry-outline::before {
  content: "\F0C6A"; }

.mdi-emoticon-confused::before {
  content: "\F10DE"; }

.mdi-emoticon-confused-outline::before {
  content: "\F10DF"; }

.mdi-emoticon-cool::before {
  content: "\F0C6B"; }

.mdi-emoticon-cool-outline::before {
  content: "\F01F3"; }

.mdi-emoticon-cry::before {
  content: "\F0C6C"; }

.mdi-emoticon-cry-outline::before {
  content: "\F0C6D"; }

.mdi-emoticon-dead::before {
  content: "\F0C6E"; }

.mdi-emoticon-dead-outline::before {
  content: "\F069B"; }

.mdi-emoticon-devil::before {
  content: "\F0C6F"; }

.mdi-emoticon-devil-outline::before {
  content: "\F01F4"; }

.mdi-emoticon-excited::before {
  content: "\F0C70"; }

.mdi-emoticon-excited-outline::before {
  content: "\F069C"; }

.mdi-emoticon-frown::before {
  content: "\F0F4C"; }

.mdi-emoticon-frown-outline::before {
  content: "\F0F4D"; }

.mdi-emoticon-happy::before {
  content: "\F0C71"; }

.mdi-emoticon-happy-outline::before {
  content: "\F01F5"; }

.mdi-emoticon-kiss::before {
  content: "\F0C72"; }

.mdi-emoticon-kiss-outline::before {
  content: "\F0C73"; }

.mdi-emoticon-lol::before {
  content: "\F1214"; }

.mdi-emoticon-lol-outline::before {
  content: "\F1215"; }

.mdi-emoticon-neutral::before {
  content: "\F0C74"; }

.mdi-emoticon-neutral-outline::before {
  content: "\F01F6"; }

.mdi-emoticon-outline::before {
  content: "\F01F2"; }

.mdi-emoticon-poop::before {
  content: "\F01F7"; }

.mdi-emoticon-poop-outline::before {
  content: "\F0C75"; }

.mdi-emoticon-sad::before {
  content: "\F0C76"; }

.mdi-emoticon-sad-outline::before {
  content: "\F01F8"; }

.mdi-emoticon-tongue::before {
  content: "\F01F9"; }

.mdi-emoticon-tongue-outline::before {
  content: "\F0C77"; }

.mdi-emoticon-wink::before {
  content: "\F0C78"; }

.mdi-emoticon-wink-outline::before {
  content: "\F0C79"; }

.mdi-engine::before {
  content: "\F01FA"; }

.mdi-engine-off::before {
  content: "\F0A46"; }

.mdi-engine-off-outline::before {
  content: "\F0A47"; }

.mdi-engine-outline::before {
  content: "\F01FB"; }

.mdi-epsilon::before {
  content: "\F10E0"; }

.mdi-equal::before {
  content: "\F01FC"; }

.mdi-equal-box::before {
  content: "\F01FD"; }

.mdi-equalizer::before {
  content: "\F0EA2"; }

.mdi-equalizer-outline::before {
  content: "\F0EA3"; }

.mdi-eraser::before {
  content: "\F01FE"; }

.mdi-eraser-variant::before {
  content: "\F0642"; }

.mdi-escalator::before {
  content: "\F01FF"; }

.mdi-escalator-box::before {
  content: "\F1399"; }

.mdi-escalator-down::before {
  content: "\F12C0"; }

.mdi-escalator-up::before {
  content: "\F12BF"; }

.mdi-eslint::before {
  content: "\F0C7A"; }

.mdi-et::before {
  content: "\F0AB3"; }

.mdi-ethereum::before {
  content: "\F086A"; }

.mdi-ethernet::before {
  content: "\F0200"; }

.mdi-ethernet-cable::before {
  content: "\F0201"; }

.mdi-ethernet-cable-off::before {
  content: "\F0202"; }

.mdi-ev-station::before {
  content: "\F05F1"; }

.mdi-evernote::before {
  content: "\F0204"; }

.mdi-excavator::before {
  content: "\F1025"; }

.mdi-exclamation::before {
  content: "\F0205"; }

.mdi-exclamation-thick::before {
  content: "\F1238"; }

.mdi-exit-run::before {
  content: "\F0A48"; }

.mdi-exit-to-app::before {
  content: "\F0206"; }

.mdi-expand-all::before {
  content: "\F0AB4"; }

.mdi-expand-all-outline::before {
  content: "\F0AB5"; }

.mdi-expansion-card::before {
  content: "\F08AE"; }

.mdi-expansion-card-variant::before {
  content: "\F0FB2"; }

.mdi-exponent::before {
  content: "\F0963"; }

.mdi-exponent-box::before {
  content: "\F0964"; }

.mdi-export::before {
  content: "\F0207"; }

.mdi-export-variant::before {
  content: "\F0B93"; }

.mdi-eye::before {
  content: "\F0208"; }

.mdi-eye-check::before {
  content: "\F0D04"; }

.mdi-eye-check-outline::before {
  content: "\F0D05"; }

.mdi-eye-circle::before {
  content: "\F0B94"; }

.mdi-eye-circle-outline::before {
  content: "\F0B95"; }

.mdi-eye-minus::before {
  content: "\F1026"; }

.mdi-eye-minus-outline::before {
  content: "\F1027"; }

.mdi-eye-off::before {
  content: "\F0209"; }

.mdi-eye-off-outline::before {
  content: "\F06D1"; }

.mdi-eye-outline::before {
  content: "\F06D0"; }

.mdi-eye-plus::before {
  content: "\F086B"; }

.mdi-eye-plus-outline::before {
  content: "\F086C"; }

.mdi-eye-settings::before {
  content: "\F086D"; }

.mdi-eye-settings-outline::before {
  content: "\F086E"; }

.mdi-eyedropper::before {
  content: "\F020A"; }

.mdi-eyedropper-variant::before {
  content: "\F020B"; }

.mdi-face::before {
  content: "\F0643"; }

.mdi-face-agent::before {
  content: "\F0D70"; }

.mdi-face-outline::before {
  content: "\F0B96"; }

.mdi-face-profile::before {
  content: "\F0644"; }

.mdi-face-profile-woman::before {
  content: "\F1076"; }

.mdi-face-recognition::before {
  content: "\F0C7B"; }

.mdi-face-woman::before {
  content: "\F1077"; }

.mdi-face-woman-outline::before {
  content: "\F1078"; }

.mdi-facebook::before {
  content: "\F020C"; }

.mdi-facebook-messenger::before {
  content: "\F020E"; }

.mdi-facebook-workplace::before {
  content: "\F0B31"; }

.mdi-factory::before {
  content: "\F020F"; }

.mdi-fan::before {
  content: "\F0210"; }

.mdi-fan-off::before {
  content: "\F081D"; }

.mdi-fast-forward::before {
  content: "\F0211"; }

.mdi-fast-forward-10::before {
  content: "\F0D71"; }

.mdi-fast-forward-30::before {
  content: "\F0D06"; }

.mdi-fast-forward-5::before {
  content: "\F11F8"; }

.mdi-fast-forward-outline::before {
  content: "\F06D2"; }

.mdi-fax::before {
  content: "\F0212"; }

.mdi-feather::before {
  content: "\F06D3"; }

.mdi-feature-search::before {
  content: "\F0A49"; }

.mdi-feature-search-outline::before {
  content: "\F0A4A"; }

.mdi-fedora::before {
  content: "\F08DB"; }

.mdi-ferris-wheel::before {
  content: "\F0EA4"; }

.mdi-ferry::before {
  content: "\F0213"; }

.mdi-file::before {
  content: "\F0214"; }

.mdi-file-account::before {
  content: "\F073B"; }

.mdi-file-account-outline::before {
  content: "\F1028"; }

.mdi-file-alert::before {
  content: "\F0A4B"; }

.mdi-file-alert-outline::before {
  content: "\F0A4C"; }

.mdi-file-cabinet::before {
  content: "\F0AB6"; }

.mdi-file-cad::before {
  content: "\F0EEB"; }

.mdi-file-cad-box::before {
  content: "\F0EEC"; }

.mdi-file-cancel::before {
  content: "\F0DC6"; }

.mdi-file-cancel-outline::before {
  content: "\F0DC7"; }

.mdi-file-certificate::before {
  content: "\F1186"; }

.mdi-file-certificate-outline::before {
  content: "\F1187"; }

.mdi-file-chart::before {
  content: "\F0215"; }

.mdi-file-chart-outline::before {
  content: "\F1029"; }

.mdi-file-check::before {
  content: "\F0216"; }

.mdi-file-check-outline::before {
  content: "\F0E29"; }

.mdi-file-clock::before {
  content: "\F12E1"; }

.mdi-file-clock-outline::before {
  content: "\F12E2"; }

.mdi-file-cloud::before {
  content: "\F0217"; }

.mdi-file-cloud-outline::before {
  content: "\F102A"; }

.mdi-file-code::before {
  content: "\F022E"; }

.mdi-file-code-outline::before {
  content: "\F102B"; }

.mdi-file-cog::before {
  content: "\F107B"; }

.mdi-file-cog-outline::before {
  content: "\F107C"; }

.mdi-file-compare::before {
  content: "\F08AA"; }

.mdi-file-delimited::before {
  content: "\F0218"; }

.mdi-file-delimited-outline::before {
  content: "\F0EA5"; }

.mdi-file-document::before {
  content: "\F0219"; }

.mdi-file-document-edit::before {
  content: "\F0DC8"; }

.mdi-file-document-edit-outline::before {
  content: "\F0DC9"; }

.mdi-file-document-outline::before {
  content: "\F09EE"; }

.mdi-file-download::before {
  content: "\F0965"; }

.mdi-file-download-outline::before {
  content: "\F0966"; }

.mdi-file-edit::before {
  content: "\F11E7"; }

.mdi-file-edit-outline::before {
  content: "\F11E8"; }

.mdi-file-excel::before {
  content: "\F021B"; }

.mdi-file-excel-box::before {
  content: "\F021C"; }

.mdi-file-excel-box-outline::before {
  content: "\F102C"; }

.mdi-file-excel-outline::before {
  content: "\F102D"; }

.mdi-file-export::before {
  content: "\F021D"; }

.mdi-file-export-outline::before {
  content: "\F102E"; }

.mdi-file-eye::before {
  content: "\F0DCA"; }

.mdi-file-eye-outline::before {
  content: "\F0DCB"; }

.mdi-file-find::before {
  content: "\F021E"; }

.mdi-file-find-outline::before {
  content: "\F0B97"; }

.mdi-file-hidden::before {
  content: "\F0613"; }

.mdi-file-image::before {
  content: "\F021F"; }

.mdi-file-image-outline::before {
  content: "\F0EB0"; }

.mdi-file-import::before {
  content: "\F0220"; }

.mdi-file-import-outline::before {
  content: "\F102F"; }

.mdi-file-key::before {
  content: "\F1184"; }

.mdi-file-key-outline::before {
  content: "\F1185"; }

.mdi-file-link::before {
  content: "\F1177"; }

.mdi-file-link-outline::before {
  content: "\F1178"; }

.mdi-file-lock::before {
  content: "\F0221"; }

.mdi-file-lock-outline::before {
  content: "\F1030"; }

.mdi-file-move::before {
  content: "\F0AB9"; }

.mdi-file-move-outline::before {
  content: "\F1031"; }

.mdi-file-multiple::before {
  content: "\F0222"; }

.mdi-file-multiple-outline::before {
  content: "\F1032"; }

.mdi-file-music::before {
  content: "\F0223"; }

.mdi-file-music-outline::before {
  content: "\F0E2A"; }

.mdi-file-outline::before {
  content: "\F0224"; }

.mdi-file-pdf::before {
  content: "\F0225"; }

.mdi-file-pdf-box::before {
  content: "\F0226"; }

.mdi-file-pdf-box-outline::before {
  content: "\F0FB3"; }

.mdi-file-pdf-outline::before {
  content: "\F0E2D"; }

.mdi-file-percent::before {
  content: "\F081E"; }

.mdi-file-percent-outline::before {
  content: "\F1033"; }

.mdi-file-phone::before {
  content: "\F1179"; }

.mdi-file-phone-outline::before {
  content: "\F117A"; }

.mdi-file-plus::before {
  content: "\F0752"; }

.mdi-file-plus-outline::before {
  content: "\F0EED"; }

.mdi-file-powerpoint::before {
  content: "\F0227"; }

.mdi-file-powerpoint-box::before {
  content: "\F0228"; }

.mdi-file-powerpoint-box-outline::before {
  content: "\F1034"; }

.mdi-file-powerpoint-outline::before {
  content: "\F1035"; }

.mdi-file-presentation-box::before {
  content: "\F0229"; }

.mdi-file-question::before {
  content: "\F086F"; }

.mdi-file-question-outline::before {
  content: "\F1036"; }

.mdi-file-refresh::before {
  content: "\F0918"; }

.mdi-file-refresh-outline::before {
  content: "\F0541"; }

.mdi-file-remove::before {
  content: "\F0B98"; }

.mdi-file-remove-outline::before {
  content: "\F1037"; }

.mdi-file-replace::before {
  content: "\F0B32"; }

.mdi-file-replace-outline::before {
  content: "\F0B33"; }

.mdi-file-restore::before {
  content: "\F0670"; }

.mdi-file-restore-outline::before {
  content: "\F1038"; }

.mdi-file-search::before {
  content: "\F0C7C"; }

.mdi-file-search-outline::before {
  content: "\F0C7D"; }

.mdi-file-send::before {
  content: "\F022A"; }

.mdi-file-send-outline::before {
  content: "\F1039"; }

.mdi-file-settings::before {
  content: "\F1079"; }

.mdi-file-settings-outline::before {
  content: "\F107A"; }

.mdi-file-star::before {
  content: "\F103A"; }

.mdi-file-star-outline::before {
  content: "\F103B"; }

.mdi-file-swap::before {
  content: "\F0FB4"; }

.mdi-file-swap-outline::before {
  content: "\F0FB5"; }

.mdi-file-sync::before {
  content: "\F1216"; }

.mdi-file-sync-outline::before {
  content: "\F1217"; }

.mdi-file-table::before {
  content: "\F0C7E"; }

.mdi-file-table-box::before {
  content: "\F10E1"; }

.mdi-file-table-box-multiple::before {
  content: "\F10E2"; }

.mdi-file-table-box-multiple-outline::before {
  content: "\F10E3"; }

.mdi-file-table-box-outline::before {
  content: "\F10E4"; }

.mdi-file-table-outline::before {
  content: "\F0C7F"; }

.mdi-file-tree::before {
  content: "\F0645"; }

.mdi-file-undo::before {
  content: "\F08DC"; }

.mdi-file-undo-outline::before {
  content: "\F103C"; }

.mdi-file-upload::before {
  content: "\F0A4D"; }

.mdi-file-upload-outline::before {
  content: "\F0A4E"; }

.mdi-file-video::before {
  content: "\F022B"; }

.mdi-file-video-outline::before {
  content: "\F0E2C"; }

.mdi-file-word::before {
  content: "\F022C"; }

.mdi-file-word-box::before {
  content: "\F022D"; }

.mdi-file-word-box-outline::before {
  content: "\F103D"; }

.mdi-file-word-outline::before {
  content: "\F103E"; }

.mdi-film::before {
  content: "\F022F"; }

.mdi-filmstrip::before {
  content: "\F0230"; }

.mdi-filmstrip-box::before {
  content: "\F0332"; }

.mdi-filmstrip-box-multiple::before {
  content: "\F0D18"; }

.mdi-filmstrip-off::before {
  content: "\F0231"; }

.mdi-filter::before {
  content: "\F0232"; }

.mdi-filter-menu::before {
  content: "\F10E5"; }

.mdi-filter-menu-outline::before {
  content: "\F10E6"; }

.mdi-filter-minus::before {
  content: "\F0EEE"; }

.mdi-filter-minus-outline::before {
  content: "\F0EEF"; }

.mdi-filter-outline::before {
  content: "\F0233"; }

.mdi-filter-plus::before {
  content: "\F0EF0"; }

.mdi-filter-plus-outline::before {
  content: "\F0EF1"; }

.mdi-filter-remove::before {
  content: "\F0234"; }

.mdi-filter-remove-outline::before {
  content: "\F0235"; }

.mdi-filter-variant::before {
  content: "\F0236"; }

.mdi-filter-variant-minus::before {
  content: "\F1112"; }

.mdi-filter-variant-plus::before {
  content: "\F1113"; }

.mdi-filter-variant-remove::before {
  content: "\F103F"; }

.mdi-finance::before {
  content: "\F081F"; }

.mdi-find-replace::before {
  content: "\F06D4"; }

.mdi-fingerprint::before {
  content: "\F0237"; }

.mdi-fingerprint-off::before {
  content: "\F0EB1"; }

.mdi-fire::before {
  content: "\F0238"; }

.mdi-fire-extinguisher::before {
  content: "\F0EF2"; }

.mdi-fire-hydrant::before {
  content: "\F1137"; }

.mdi-fire-hydrant-alert::before {
  content: "\F1138"; }

.mdi-fire-hydrant-off::before {
  content: "\F1139"; }

.mdi-fire-truck::before {
  content: "\F08AB"; }

.mdi-firebase::before {
  content: "\F0967"; }

.mdi-firefox::before {
  content: "\F0239"; }

.mdi-fireplace::before {
  content: "\F0E2E"; }

.mdi-fireplace-off::before {
  content: "\F0E2F"; }

.mdi-firework::before {
  content: "\F0E30"; }

.mdi-fish::before {
  content: "\F023A"; }

.mdi-fishbowl::before {
  content: "\F0EF3"; }

.mdi-fishbowl-outline::before {
  content: "\F0EF4"; }

.mdi-fit-to-page::before {
  content: "\F0EF5"; }

.mdi-fit-to-page-outline::before {
  content: "\F0EF6"; }

.mdi-flag::before {
  content: "\F023B"; }

.mdi-flag-checkered::before {
  content: "\F023C"; }

.mdi-flag-minus::before {
  content: "\F0B99"; }

.mdi-flag-minus-outline::before {
  content: "\F10B2"; }

.mdi-flag-outline::before {
  content: "\F023D"; }

.mdi-flag-plus::before {
  content: "\F0B9A"; }

.mdi-flag-plus-outline::before {
  content: "\F10B3"; }

.mdi-flag-remove::before {
  content: "\F0B9B"; }

.mdi-flag-remove-outline::before {
  content: "\F10B4"; }

.mdi-flag-triangle::before {
  content: "\F023F"; }

.mdi-flag-variant::before {
  content: "\F0240"; }

.mdi-flag-variant-outline::before {
  content: "\F023E"; }

.mdi-flare::before {
  content: "\F0D72"; }

.mdi-flash::before {
  content: "\F0241"; }

.mdi-flash-alert::before {
  content: "\F0EF7"; }

.mdi-flash-alert-outline::before {
  content: "\F0EF8"; }

.mdi-flash-auto::before {
  content: "\F0242"; }

.mdi-flash-circle::before {
  content: "\F0820"; }

.mdi-flash-off::before {
  content: "\F0243"; }

.mdi-flash-outline::before {
  content: "\F06D5"; }

.mdi-flash-red-eye::before {
  content: "\F067B"; }

.mdi-flashlight::before {
  content: "\F0244"; }

.mdi-flashlight-off::before {
  content: "\F0245"; }

.mdi-flask::before {
  content: "\F0093"; }

.mdi-flask-empty::before {
  content: "\F0094"; }

.mdi-flask-empty-minus::before {
  content: "\F123A"; }

.mdi-flask-empty-minus-outline::before {
  content: "\F123B"; }

.mdi-flask-empty-outline::before {
  content: "\F0095"; }

.mdi-flask-empty-plus::before {
  content: "\F123C"; }

.mdi-flask-empty-plus-outline::before {
  content: "\F123D"; }

.mdi-flask-empty-remove::before {
  content: "\F123E"; }

.mdi-flask-empty-remove-outline::before {
  content: "\F123F"; }

.mdi-flask-minus::before {
  content: "\F1240"; }

.mdi-flask-minus-outline::before {
  content: "\F1241"; }

.mdi-flask-outline::before {
  content: "\F0096"; }

.mdi-flask-plus::before {
  content: "\F1242"; }

.mdi-flask-plus-outline::before {
  content: "\F1243"; }

.mdi-flask-remove::before {
  content: "\F1244"; }

.mdi-flask-remove-outline::before {
  content: "\F1245"; }

.mdi-flask-round-bottom::before {
  content: "\F124B"; }

.mdi-flask-round-bottom-empty::before {
  content: "\F124C"; }

.mdi-flask-round-bottom-empty-outline::before {
  content: "\F124D"; }

.mdi-flask-round-bottom-outline::before {
  content: "\F124E"; }

.mdi-fleur-de-lis::before {
  content: "\F1303"; }

.mdi-flip-horizontal::before {
  content: "\F10E7"; }

.mdi-flip-to-back::before {
  content: "\F0247"; }

.mdi-flip-to-front::before {
  content: "\F0248"; }

.mdi-flip-vertical::before {
  content: "\F10E8"; }

.mdi-floor-lamp::before {
  content: "\F08DD"; }

.mdi-floor-lamp-dual::before {
  content: "\F1040"; }

.mdi-floor-lamp-variant::before {
  content: "\F1041"; }

.mdi-floor-plan::before {
  content: "\F0821"; }

.mdi-floppy::before {
  content: "\F0249"; }

.mdi-floppy-variant::before {
  content: "\F09EF"; }

.mdi-flower::before {
  content: "\F024A"; }

.mdi-flower-outline::before {
  content: "\F09F0"; }

.mdi-flower-poppy::before {
  content: "\F0D08"; }

.mdi-flower-tulip::before {
  content: "\F09F1"; }

.mdi-flower-tulip-outline::before {
  content: "\F09F2"; }

.mdi-focus-auto::before {
  content: "\F0F4E"; }

.mdi-focus-field::before {
  content: "\F0F4F"; }

.mdi-focus-field-horizontal::before {
  content: "\F0F50"; }

.mdi-focus-field-vertical::before {
  content: "\F0F51"; }

.mdi-folder::before {
  content: "\F024B"; }

.mdi-folder-account::before {
  content: "\F024C"; }

.mdi-folder-account-outline::before {
  content: "\F0B9C"; }

.mdi-folder-alert::before {
  content: "\F0DCC"; }

.mdi-folder-alert-outline::before {
  content: "\F0DCD"; }

.mdi-folder-clock::before {
  content: "\F0ABA"; }

.mdi-folder-clock-outline::before {
  content: "\F0ABB"; }

.mdi-folder-cog::before {
  content: "\F107F"; }

.mdi-folder-cog-outline::before {
  content: "\F1080"; }

.mdi-folder-download::before {
  content: "\F024D"; }

.mdi-folder-download-outline::before {
  content: "\F10E9"; }

.mdi-folder-edit::before {
  content: "\F08DE"; }

.mdi-folder-edit-outline::before {
  content: "\F0DCE"; }

.mdi-folder-google-drive::before {
  content: "\F024E"; }

.mdi-folder-heart::before {
  content: "\F10EA"; }

.mdi-folder-heart-outline::before {
  content: "\F10EB"; }

.mdi-folder-home::before {
  content: "\F10B5"; }

.mdi-folder-home-outline::before {
  content: "\F10B6"; }

.mdi-folder-image::before {
  content: "\F024F"; }

.mdi-folder-information::before {
  content: "\F10B7"; }

.mdi-folder-information-outline::before {
  content: "\F10B8"; }

.mdi-folder-key::before {
  content: "\F08AC"; }

.mdi-folder-key-network::before {
  content: "\F08AD"; }

.mdi-folder-key-network-outline::before {
  content: "\F0C80"; }

.mdi-folder-key-outline::before {
  content: "\F10EC"; }

.mdi-folder-lock::before {
  content: "\F0250"; }

.mdi-folder-lock-open::before {
  content: "\F0251"; }

.mdi-folder-marker::before {
  content: "\F126D"; }

.mdi-folder-marker-outline::before {
  content: "\F126E"; }

.mdi-folder-move::before {
  content: "\F0252"; }

.mdi-folder-move-outline::before {
  content: "\F1246"; }

.mdi-folder-multiple::before {
  content: "\F0253"; }

.mdi-folder-multiple-image::before {
  content: "\F0254"; }

.mdi-folder-multiple-outline::before {
  content: "\F0255"; }

.mdi-folder-music::before {
  content: "\F1359"; }

.mdi-folder-music-outline::before {
  content: "\F135A"; }

.mdi-folder-network::before {
  content: "\F0870"; }

.mdi-folder-network-outline::before {
  content: "\F0C81"; }

.mdi-folder-open::before {
  content: "\F0770"; }

.mdi-folder-open-outline::before {
  content: "\F0DCF"; }

.mdi-folder-outline::before {
  content: "\F0256"; }

.mdi-folder-plus::before {
  content: "\F0257"; }

.mdi-folder-plus-outline::before {
  content: "\F0B9D"; }

.mdi-folder-pound::before {
  content: "\F0D09"; }

.mdi-folder-pound-outline::before {
  content: "\F0D0A"; }

.mdi-folder-refresh::before {
  content: "\F0749"; }

.mdi-folder-refresh-outline::before {
  content: "\F0542"; }

.mdi-folder-remove::before {
  content: "\F0258"; }

.mdi-folder-remove-outline::before {
  content: "\F0B9E"; }

.mdi-folder-search::before {
  content: "\F0968"; }

.mdi-folder-search-outline::before {
  content: "\F0969"; }

.mdi-folder-settings::before {
  content: "\F107D"; }

.mdi-folder-settings-outline::before {
  content: "\F107E"; }

.mdi-folder-star::before {
  content: "\F069D"; }

.mdi-folder-star-outline::before {
  content: "\F0B9F"; }

.mdi-folder-swap::before {
  content: "\F0FB6"; }

.mdi-folder-swap-outline::before {
  content: "\F0FB7"; }

.mdi-folder-sync::before {
  content: "\F0D0B"; }

.mdi-folder-sync-outline::before {
  content: "\F0D0C"; }

.mdi-folder-table::before {
  content: "\F12E3"; }

.mdi-folder-table-outline::before {
  content: "\F12E4"; }

.mdi-folder-text::before {
  content: "\F0C82"; }

.mdi-folder-text-outline::before {
  content: "\F0C83"; }

.mdi-folder-upload::before {
  content: "\F0259"; }

.mdi-folder-upload-outline::before {
  content: "\F10ED"; }

.mdi-folder-zip::before {
  content: "\F06EB"; }

.mdi-folder-zip-outline::before {
  content: "\F07B9"; }

.mdi-font-awesome::before {
  content: "\F003A"; }

.mdi-food::before {
  content: "\F025A"; }

.mdi-food-apple::before {
  content: "\F025B"; }

.mdi-food-apple-outline::before {
  content: "\F0C84"; }

.mdi-food-croissant::before {
  content: "\F07C8"; }

.mdi-food-fork-drink::before {
  content: "\F05F2"; }

.mdi-food-off::before {
  content: "\F05F3"; }

.mdi-food-variant::before {
  content: "\F025C"; }

.mdi-foot-print::before {
  content: "\F0F52"; }

.mdi-football::before {
  content: "\F025D"; }

.mdi-football-australian::before {
  content: "\F025E"; }

.mdi-football-helmet::before {
  content: "\F025F"; }

.mdi-forklift::before {
  content: "\F07C9"; }

.mdi-format-align-bottom::before {
  content: "\F0753"; }

.mdi-format-align-center::before {
  content: "\F0260"; }

.mdi-format-align-justify::before {
  content: "\F0261"; }

.mdi-format-align-left::before {
  content: "\F0262"; }

.mdi-format-align-middle::before {
  content: "\F0754"; }

.mdi-format-align-right::before {
  content: "\F0263"; }

.mdi-format-align-top::before {
  content: "\F0755"; }

.mdi-format-annotation-minus::before {
  content: "\F0ABC"; }

.mdi-format-annotation-plus::before {
  content: "\F0646"; }

.mdi-format-bold::before {
  content: "\F0264"; }

.mdi-format-clear::before {
  content: "\F0265"; }

.mdi-format-color-fill::before {
  content: "\F0266"; }

.mdi-format-color-highlight::before {
  content: "\F0E31"; }

.mdi-format-color-marker-cancel::before {
  content: "\F1313"; }

.mdi-format-color-text::before {
  content: "\F069E"; }

.mdi-format-columns::before {
  content: "\F08DF"; }

.mdi-format-float-center::before {
  content: "\F0267"; }

.mdi-format-float-left::before {
  content: "\F0268"; }

.mdi-format-float-none::before {
  content: "\F0269"; }

.mdi-format-float-right::before {
  content: "\F026A"; }

.mdi-format-font::before {
  content: "\F06D6"; }

.mdi-format-font-size-decrease::before {
  content: "\F09F3"; }

.mdi-format-font-size-increase::before {
  content: "\F09F4"; }

.mdi-format-header-1::before {
  content: "\F026B"; }

.mdi-format-header-2::before {
  content: "\F026C"; }

.mdi-format-header-3::before {
  content: "\F026D"; }

.mdi-format-header-4::before {
  content: "\F026E"; }

.mdi-format-header-5::before {
  content: "\F026F"; }

.mdi-format-header-6::before {
  content: "\F0270"; }

.mdi-format-header-decrease::before {
  content: "\F0271"; }

.mdi-format-header-equal::before {
  content: "\F0272"; }

.mdi-format-header-increase::before {
  content: "\F0273"; }

.mdi-format-header-pound::before {
  content: "\F0274"; }

.mdi-format-horizontal-align-center::before {
  content: "\F061E"; }

.mdi-format-horizontal-align-left::before {
  content: "\F061F"; }

.mdi-format-horizontal-align-right::before {
  content: "\F0620"; }

.mdi-format-indent-decrease::before {
  content: "\F0275"; }

.mdi-format-indent-increase::before {
  content: "\F0276"; }

.mdi-format-italic::before {
  content: "\F0277"; }

.mdi-format-letter-case::before {
  content: "\F0B34"; }

.mdi-format-letter-case-lower::before {
  content: "\F0B35"; }

.mdi-format-letter-case-upper::before {
  content: "\F0B36"; }

.mdi-format-letter-ends-with::before {
  content: "\F0FB8"; }

.mdi-format-letter-matches::before {
  content: "\F0FB9"; }

.mdi-format-letter-starts-with::before {
  content: "\F0FBA"; }

.mdi-format-line-spacing::before {
  content: "\F0278"; }

.mdi-format-line-style::before {
  content: "\F05C8"; }

.mdi-format-line-weight::before {
  content: "\F05C9"; }

.mdi-format-list-bulleted::before {
  content: "\F0279"; }

.mdi-format-list-bulleted-square::before {
  content: "\F0DD0"; }

.mdi-format-list-bulleted-triangle::before {
  content: "\F0EB2"; }

.mdi-format-list-bulleted-type::before {
  content: "\F027A"; }

.mdi-format-list-checkbox::before {
  content: "\F096A"; }

.mdi-format-list-checks::before {
  content: "\F0756"; }

.mdi-format-list-numbered::before {
  content: "\F027B"; }

.mdi-format-list-numbered-rtl::before {
  content: "\F0D0D"; }

.mdi-format-list-text::before {
  content: "\F126F"; }

.mdi-format-overline::before {
  content: "\F0EB3"; }

.mdi-format-page-break::before {
  content: "\F06D7"; }

.mdi-format-paint::before {
  content: "\F027C"; }

.mdi-format-paragraph::before {
  content: "\F027D"; }

.mdi-format-pilcrow::before {
  content: "\F06D8"; }

.mdi-format-quote-close::before {
  content: "\F027E"; }

.mdi-format-quote-close-outline::before {
  content: "\F11A8"; }

.mdi-format-quote-open::before {
  content: "\F0757"; }

.mdi-format-quote-open-outline::before {
  content: "\F11A7"; }

.mdi-format-rotate-90::before {
  content: "\F06AA"; }

.mdi-format-section::before {
  content: "\F069F"; }

.mdi-format-size::before {
  content: "\F027F"; }

.mdi-format-strikethrough::before {
  content: "\F0280"; }

.mdi-format-strikethrough-variant::before {
  content: "\F0281"; }

.mdi-format-subscript::before {
  content: "\F0282"; }

.mdi-format-superscript::before {
  content: "\F0283"; }

.mdi-format-text::before {
  content: "\F0284"; }

.mdi-format-text-rotation-angle-down::before {
  content: "\F0FBB"; }

.mdi-format-text-rotation-angle-up::before {
  content: "\F0FBC"; }

.mdi-format-text-rotation-down::before {
  content: "\F0D73"; }

.mdi-format-text-rotation-down-vertical::before {
  content: "\F0FBD"; }

.mdi-format-text-rotation-none::before {
  content: "\F0D74"; }

.mdi-format-text-rotation-up::before {
  content: "\F0FBE"; }

.mdi-format-text-rotation-vertical::before {
  content: "\F0FBF"; }

.mdi-format-text-variant::before {
  content: "\F0E32"; }

.mdi-format-text-wrapping-clip::before {
  content: "\F0D0E"; }

.mdi-format-text-wrapping-overflow::before {
  content: "\F0D0F"; }

.mdi-format-text-wrapping-wrap::before {
  content: "\F0D10"; }

.mdi-format-textbox::before {
  content: "\F0D11"; }

.mdi-format-textdirection-l-to-r::before {
  content: "\F0285"; }

.mdi-format-textdirection-r-to-l::before {
  content: "\F0286"; }

.mdi-format-title::before {
  content: "\F05F4"; }

.mdi-format-underline::before {
  content: "\F0287"; }

.mdi-format-vertical-align-bottom::before {
  content: "\F0621"; }

.mdi-format-vertical-align-center::before {
  content: "\F0622"; }

.mdi-format-vertical-align-top::before {
  content: "\F0623"; }

.mdi-format-wrap-inline::before {
  content: "\F0288"; }

.mdi-format-wrap-square::before {
  content: "\F0289"; }

.mdi-format-wrap-tight::before {
  content: "\F028A"; }

.mdi-format-wrap-top-bottom::before {
  content: "\F028B"; }

.mdi-forum::before {
  content: "\F028C"; }

.mdi-forum-outline::before {
  content: "\F0822"; }

.mdi-forward::before {
  content: "\F028D"; }

.mdi-forwardburger::before {
  content: "\F0D75"; }

.mdi-fountain::before {
  content: "\F096B"; }

.mdi-fountain-pen::before {
  content: "\F0D12"; }

.mdi-fountain-pen-tip::before {
  content: "\F0D13"; }

.mdi-freebsd::before {
  content: "\F08E0"; }

.mdi-frequently-asked-questions::before {
  content: "\F0EB4"; }

.mdi-fridge::before {
  content: "\F0290"; }

.mdi-fridge-alert::before {
  content: "\F11B1"; }

.mdi-fridge-alert-outline::before {
  content: "\F11B2"; }

.mdi-fridge-bottom::before {
  content: "\F0292"; }

.mdi-fridge-off::before {
  content: "\F11AF"; }

.mdi-fridge-off-outline::before {
  content: "\F11B0"; }

.mdi-fridge-outline::before {
  content: "\F028F"; }

.mdi-fridge-top::before {
  content: "\F0291"; }

.mdi-fruit-cherries::before {
  content: "\F1042"; }

.mdi-fruit-citrus::before {
  content: "\F1043"; }

.mdi-fruit-grapes::before {
  content: "\F1044"; }

.mdi-fruit-grapes-outline::before {
  content: "\F1045"; }

.mdi-fruit-pineapple::before {
  content: "\F1046"; }

.mdi-fruit-watermelon::before {
  content: "\F1047"; }

.mdi-fuel::before {
  content: "\F07CA"; }

.mdi-fullscreen::before {
  content: "\F0293"; }

.mdi-fullscreen-exit::before {
  content: "\F0294"; }

.mdi-function::before {
  content: "\F0295"; }

.mdi-function-variant::before {
  content: "\F0871"; }

.mdi-furigana-horizontal::before {
  content: "\F1081"; }

.mdi-furigana-vertical::before {
  content: "\F1082"; }

.mdi-fuse::before {
  content: "\F0C85"; }

.mdi-fuse-blade::before {
  content: "\F0C86"; }

.mdi-gamepad::before {
  content: "\F0296"; }

.mdi-gamepad-circle::before {
  content: "\F0E33"; }

.mdi-gamepad-circle-down::before {
  content: "\F0E34"; }

.mdi-gamepad-circle-left::before {
  content: "\F0E35"; }

.mdi-gamepad-circle-outline::before {
  content: "\F0E36"; }

.mdi-gamepad-circle-right::before {
  content: "\F0E37"; }

.mdi-gamepad-circle-up::before {
  content: "\F0E38"; }

.mdi-gamepad-down::before {
  content: "\F0E39"; }

.mdi-gamepad-left::before {
  content: "\F0E3A"; }

.mdi-gamepad-right::before {
  content: "\F0E3B"; }

.mdi-gamepad-round::before {
  content: "\F0E3C"; }

.mdi-gamepad-round-down::before {
  content: "\F0E3D"; }

.mdi-gamepad-round-left::before {
  content: "\F0E3E"; }

.mdi-gamepad-round-outline::before {
  content: "\F0E3F"; }

.mdi-gamepad-round-right::before {
  content: "\F0E40"; }

.mdi-gamepad-round-up::before {
  content: "\F0E41"; }

.mdi-gamepad-square::before {
  content: "\F0EB5"; }

.mdi-gamepad-square-outline::before {
  content: "\F0EB6"; }

.mdi-gamepad-up::before {
  content: "\F0E42"; }

.mdi-gamepad-variant::before {
  content: "\F0297"; }

.mdi-gamepad-variant-outline::before {
  content: "\F0EB7"; }

.mdi-gamma::before {
  content: "\F10EE"; }

.mdi-gantry-crane::before {
  content: "\F0DD1"; }

.mdi-garage::before {
  content: "\F06D9"; }

.mdi-garage-alert::before {
  content: "\F0872"; }

.mdi-garage-alert-variant::before {
  content: "\F12D5"; }

.mdi-garage-open::before {
  content: "\F06DA"; }

.mdi-garage-open-variant::before {
  content: "\F12D4"; }

.mdi-garage-variant::before {
  content: "\F12D3"; }

.mdi-gas-cylinder::before {
  content: "\F0647"; }

.mdi-gas-station::before {
  content: "\F0298"; }

.mdi-gas-station-outline::before {
  content: "\F0EB8"; }

.mdi-gate::before {
  content: "\F0299"; }

.mdi-gate-and::before {
  content: "\F08E1"; }

.mdi-gate-arrow-right::before {
  content: "\F1169"; }

.mdi-gate-nand::before {
  content: "\F08E2"; }

.mdi-gate-nor::before {
  content: "\F08E3"; }

.mdi-gate-not::before {
  content: "\F08E4"; }

.mdi-gate-open::before {
  content: "\F116A"; }

.mdi-gate-or::before {
  content: "\F08E5"; }

.mdi-gate-xnor::before {
  content: "\F08E6"; }

.mdi-gate-xor::before {
  content: "\F08E7"; }

.mdi-gatsby::before {
  content: "\F0E43"; }

.mdi-gauge::before {
  content: "\F029A"; }

.mdi-gauge-empty::before {
  content: "\F0873"; }

.mdi-gauge-full::before {
  content: "\F0874"; }

.mdi-gauge-low::before {
  content: "\F0875"; }

.mdi-gavel::before {
  content: "\F029B"; }

.mdi-gender-female::before {
  content: "\F029C"; }

.mdi-gender-male::before {
  content: "\F029D"; }

.mdi-gender-male-female::before {
  content: "\F029E"; }

.mdi-gender-male-female-variant::before {
  content: "\F113F"; }

.mdi-gender-non-binary::before {
  content: "\F1140"; }

.mdi-gender-transgender::before {
  content: "\F029F"; }

.mdi-gentoo::before {
  content: "\F08E8"; }

.mdi-gesture::before {
  content: "\F07CB"; }

.mdi-gesture-double-tap::before {
  content: "\F073C"; }

.mdi-gesture-pinch::before {
  content: "\F0ABD"; }

.mdi-gesture-spread::before {
  content: "\F0ABE"; }

.mdi-gesture-swipe::before {
  content: "\F0D76"; }

.mdi-gesture-swipe-down::before {
  content: "\F073D"; }

.mdi-gesture-swipe-horizontal::before {
  content: "\F0ABF"; }

.mdi-gesture-swipe-left::before {
  content: "\F073E"; }

.mdi-gesture-swipe-right::before {
  content: "\F073F"; }

.mdi-gesture-swipe-up::before {
  content: "\F0740"; }

.mdi-gesture-swipe-vertical::before {
  content: "\F0AC0"; }

.mdi-gesture-tap::before {
  content: "\F0741"; }

.mdi-gesture-tap-box::before {
  content: "\F12A9"; }

.mdi-gesture-tap-button::before {
  content: "\F12A8"; }

.mdi-gesture-tap-hold::before {
  content: "\F0D77"; }

.mdi-gesture-two-double-tap::before {
  content: "\F0742"; }

.mdi-gesture-two-tap::before {
  content: "\F0743"; }

.mdi-ghost::before {
  content: "\F02A0"; }

.mdi-ghost-off::before {
  content: "\F09F5"; }

.mdi-gif::before {
  content: "\F0D78"; }

.mdi-gift::before {
  content: "\F0E44"; }

.mdi-gift-outline::before {
  content: "\F02A1"; }

.mdi-git::before {
  content: "\F02A2"; }

.mdi-github::before {
  content: "\F02A4"; }

.mdi-gitlab::before {
  content: "\F0BA0"; }

.mdi-glass-cocktail::before {
  content: "\F0356"; }

.mdi-glass-flute::before {
  content: "\F02A5"; }

.mdi-glass-mug::before {
  content: "\F02A6"; }

.mdi-glass-mug-variant::before {
  content: "\F1116"; }

.mdi-glass-pint-outline::before {
  content: "\F130D"; }

.mdi-glass-stange::before {
  content: "\F02A7"; }

.mdi-glass-tulip::before {
  content: "\F02A8"; }

.mdi-glass-wine::before {
  content: "\F0876"; }

.mdi-glasses::before {
  content: "\F02AA"; }

.mdi-globe-light::before {
  content: "\F12D7"; }

.mdi-globe-model::before {
  content: "\F08E9"; }

.mdi-gmail::before {
  content: "\F02AB"; }

.mdi-gnome::before {
  content: "\F02AC"; }

.mdi-go-kart::before {
  content: "\F0D79"; }

.mdi-go-kart-track::before {
  content: "\F0D7A"; }

.mdi-gog::before {
  content: "\F0BA1"; }

.mdi-gold::before {
  content: "\F124F"; }

.mdi-golf::before {
  content: "\F0823"; }

.mdi-golf-cart::before {
  content: "\F11A4"; }

.mdi-golf-tee::before {
  content: "\F1083"; }

.mdi-gondola::before {
  content: "\F0686"; }

.mdi-goodreads::before {
  content: "\F0D7B"; }

.mdi-google::before {
  content: "\F02AD"; }

.mdi-google-ads::before {
  content: "\F0C87"; }

.mdi-google-analytics::before {
  content: "\F07CC"; }

.mdi-google-assistant::before {
  content: "\F07CD"; }

.mdi-google-cardboard::before {
  content: "\F02AE"; }

.mdi-google-chrome::before {
  content: "\F02AF"; }

.mdi-google-circles::before {
  content: "\F02B0"; }

.mdi-google-circles-communities::before {
  content: "\F02B1"; }

.mdi-google-circles-extended::before {
  content: "\F02B2"; }

.mdi-google-circles-group::before {
  content: "\F02B3"; }

.mdi-google-classroom::before {
  content: "\F02C0"; }

.mdi-google-cloud::before {
  content: "\F11F6"; }

.mdi-google-controller::before {
  content: "\F02B4"; }

.mdi-google-controller-off::before {
  content: "\F02B5"; }

.mdi-google-downasaur::before {
  content: "\F1362"; }

.mdi-google-drive::before {
  content: "\F02B6"; }

.mdi-google-earth::before {
  content: "\F02B7"; }

.mdi-google-fit::before {
  content: "\F096C"; }

.mdi-google-glass::before {
  content: "\F02B8"; }

.mdi-google-hangouts::before {
  content: "\F02C9"; }

.mdi-google-home::before {
  content: "\F0824"; }

.mdi-google-keep::before {
  content: "\F06DC"; }

.mdi-google-lens::before {
  content: "\F09F6"; }

.mdi-google-maps::before {
  content: "\F05F5"; }

.mdi-google-my-business::before {
  content: "\F1048"; }

.mdi-google-nearby::before {
  content: "\F02B9"; }

.mdi-google-photos::before {
  content: "\F06DD"; }

.mdi-google-play::before {
  content: "\F02BC"; }

.mdi-google-plus::before {
  content: "\F02BD"; }

.mdi-google-podcast::before {
  content: "\F0EB9"; }

.mdi-google-spreadsheet::before {
  content: "\F09F7"; }

.mdi-google-street-view::before {
  content: "\F0C88"; }

.mdi-google-translate::before {
  content: "\F02BF"; }

.mdi-gradient::before {
  content: "\F06A0"; }

.mdi-grain::before {
  content: "\F0D7C"; }

.mdi-graph::before {
  content: "\F1049"; }

.mdi-graph-outline::before {
  content: "\F104A"; }

.mdi-graphql::before {
  content: "\F0877"; }

.mdi-grave-stone::before {
  content: "\F0BA2"; }

.mdi-grease-pencil::before {
  content: "\F0648"; }

.mdi-greater-than::before {
  content: "\F096D"; }

.mdi-greater-than-or-equal::before {
  content: "\F096E"; }

.mdi-grid::before {
  content: "\F02C1"; }

.mdi-grid-large::before {
  content: "\F0758"; }

.mdi-grid-off::before {
  content: "\F02C2"; }

.mdi-grill::before {
  content: "\F0E45"; }

.mdi-grill-outline::before {
  content: "\F118A"; }

.mdi-group::before {
  content: "\F02C3"; }

.mdi-guitar-acoustic::before {
  content: "\F0771"; }

.mdi-guitar-electric::before {
  content: "\F02C4"; }

.mdi-guitar-pick::before {
  content: "\F02C5"; }

.mdi-guitar-pick-outline::before {
  content: "\F02C6"; }

.mdi-guy-fawkes-mask::before {
  content: "\F0825"; }

.mdi-hail::before {
  content: "\F0AC1"; }

.mdi-hair-dryer::before {
  content: "\F10EF"; }

.mdi-hair-dryer-outline::before {
  content: "\F10F0"; }

.mdi-halloween::before {
  content: "\F0BA3"; }

.mdi-hamburger::before {
  content: "\F0685"; }

.mdi-hammer::before {
  content: "\F08EA"; }

.mdi-hammer-screwdriver::before {
  content: "\F1322"; }

.mdi-hammer-wrench::before {
  content: "\F1323"; }

.mdi-hand::before {
  content: "\F0A4F"; }

.mdi-hand-heart::before {
  content: "\F10F1"; }

.mdi-hand-left::before {
  content: "\F0E46"; }

.mdi-hand-okay::before {
  content: "\F0A50"; }

.mdi-hand-peace::before {
  content: "\F0A51"; }

.mdi-hand-peace-variant::before {
  content: "\F0A52"; }

.mdi-hand-pointing-down::before {
  content: "\F0A53"; }

.mdi-hand-pointing-left::before {
  content: "\F0A54"; }

.mdi-hand-pointing-right::before {
  content: "\F02C7"; }

.mdi-hand-pointing-up::before {
  content: "\F0A55"; }

.mdi-hand-right::before {
  content: "\F0E47"; }

.mdi-hand-saw::before {
  content: "\F0E48"; }

.mdi-hand-water::before {
  content: "\F139F"; }

.mdi-handball::before {
  content: "\F0F53"; }

.mdi-handcuffs::before {
  content: "\F113E"; }

.mdi-handshake::before {
  content: "\F1218"; }

.mdi-hanger::before {
  content: "\F02C8"; }

.mdi-hard-hat::before {
  content: "\F096F"; }

.mdi-harddisk::before {
  content: "\F02CA"; }

.mdi-harddisk-plus::before {
  content: "\F104B"; }

.mdi-harddisk-remove::before {
  content: "\F104C"; }

.mdi-hat-fedora::before {
  content: "\F0BA4"; }

.mdi-hazard-lights::before {
  content: "\F0C89"; }

.mdi-hdr::before {
  content: "\F0D7D"; }

.mdi-hdr-off::before {
  content: "\F0D7E"; }

.mdi-head::before {
  content: "\F135E"; }

.mdi-head-alert::before {
  content: "\F1338"; }

.mdi-head-alert-outline::before {
  content: "\F1339"; }

.mdi-head-check::before {
  content: "\F133A"; }

.mdi-head-check-outline::before {
  content: "\F133B"; }

.mdi-head-cog::before {
  content: "\F133C"; }

.mdi-head-cog-outline::before {
  content: "\F133D"; }

.mdi-head-dots-horizontal::before {
  content: "\F133E"; }

.mdi-head-dots-horizontal-outline::before {
  content: "\F133F"; }

.mdi-head-flash::before {
  content: "\F1340"; }

.mdi-head-flash-outline::before {
  content: "\F1341"; }

.mdi-head-heart::before {
  content: "\F1342"; }

.mdi-head-heart-outline::before {
  content: "\F1343"; }

.mdi-head-lightbulb::before {
  content: "\F1344"; }

.mdi-head-lightbulb-outline::before {
  content: "\F1345"; }

.mdi-head-minus::before {
  content: "\F1346"; }

.mdi-head-minus-outline::before {
  content: "\F1347"; }

.mdi-head-outline::before {
  content: "\F135F"; }

.mdi-head-plus::before {
  content: "\F1348"; }

.mdi-head-plus-outline::before {
  content: "\F1349"; }

.mdi-head-question::before {
  content: "\F134A"; }

.mdi-head-question-outline::before {
  content: "\F134B"; }

.mdi-head-remove::before {
  content: "\F134C"; }

.mdi-head-remove-outline::before {
  content: "\F134D"; }

.mdi-head-snowflake::before {
  content: "\F134E"; }

.mdi-head-snowflake-outline::before {
  content: "\F134F"; }

.mdi-head-sync::before {
  content: "\F1350"; }

.mdi-head-sync-outline::before {
  content: "\F1351"; }

.mdi-headphones::before {
  content: "\F02CB"; }

.mdi-headphones-bluetooth::before {
  content: "\F0970"; }

.mdi-headphones-box::before {
  content: "\F02CC"; }

.mdi-headphones-off::before {
  content: "\F07CE"; }

.mdi-headphones-settings::before {
  content: "\F02CD"; }

.mdi-headset::before {
  content: "\F02CE"; }

.mdi-headset-dock::before {
  content: "\F02CF"; }

.mdi-headset-off::before {
  content: "\F02D0"; }

.mdi-heart::before {
  content: "\F02D1"; }

.mdi-heart-box::before {
  content: "\F02D2"; }

.mdi-heart-box-outline::before {
  content: "\F02D3"; }

.mdi-heart-broken::before {
  content: "\F02D4"; }

.mdi-heart-broken-outline::before {
  content: "\F0D14"; }

.mdi-heart-circle::before {
  content: "\F0971"; }

.mdi-heart-circle-outline::before {
  content: "\F0972"; }

.mdi-heart-flash::before {
  content: "\F0EF9"; }

.mdi-heart-half::before {
  content: "\F06DF"; }

.mdi-heart-half-full::before {
  content: "\F06DE"; }

.mdi-heart-half-outline::before {
  content: "\F06E0"; }

.mdi-heart-multiple::before {
  content: "\F0A56"; }

.mdi-heart-multiple-outline::before {
  content: "\F0A57"; }

.mdi-heart-off::before {
  content: "\F0759"; }

.mdi-heart-outline::before {
  content: "\F02D5"; }

.mdi-heart-pulse::before {
  content: "\F05F6"; }

.mdi-helicopter::before {
  content: "\F0AC2"; }

.mdi-help::before {
  content: "\F02D6"; }

.mdi-help-box::before {
  content: "\F078B"; }

.mdi-help-circle::before {
  content: "\F02D7"; }

.mdi-help-circle-outline::before {
  content: "\F0625"; }

.mdi-help-network::before {
  content: "\F06F5"; }

.mdi-help-network-outline::before {
  content: "\F0C8A"; }

.mdi-help-rhombus::before {
  content: "\F0BA5"; }

.mdi-help-rhombus-outline::before {
  content: "\F0BA6"; }

.mdi-hexadecimal::before {
  content: "\F12A7"; }

.mdi-hexagon::before {
  content: "\F02D8"; }

.mdi-hexagon-multiple::before {
  content: "\F06E1"; }

.mdi-hexagon-multiple-outline::before {
  content: "\F10F2"; }

.mdi-hexagon-outline::before {
  content: "\F02D9"; }

.mdi-hexagon-slice-1::before {
  content: "\F0AC3"; }

.mdi-hexagon-slice-2::before {
  content: "\F0AC4"; }

.mdi-hexagon-slice-3::before {
  content: "\F0AC5"; }

.mdi-hexagon-slice-4::before {
  content: "\F0AC6"; }

.mdi-hexagon-slice-5::before {
  content: "\F0AC7"; }

.mdi-hexagon-slice-6::before {
  content: "\F0AC8"; }

.mdi-hexagram::before {
  content: "\F0AC9"; }

.mdi-hexagram-outline::before {
  content: "\F0ACA"; }

.mdi-high-definition::before {
  content: "\F07CF"; }

.mdi-high-definition-box::before {
  content: "\F0878"; }

.mdi-highway::before {
  content: "\F05F7"; }

.mdi-hiking::before {
  content: "\F0D7F"; }

.mdi-hinduism::before {
  content: "\F0973"; }

.mdi-history::before {
  content: "\F02DA"; }

.mdi-hockey-puck::before {
  content: "\F0879"; }

.mdi-hockey-sticks::before {
  content: "\F087A"; }

.mdi-hololens::before {
  content: "\F02DB"; }

.mdi-home::before {
  content: "\F02DC"; }

.mdi-home-account::before {
  content: "\F0826"; }

.mdi-home-alert::before {
  content: "\F087B"; }

.mdi-home-analytics::before {
  content: "\F0EBA"; }

.mdi-home-assistant::before {
  content: "\F07D0"; }

.mdi-home-automation::before {
  content: "\F07D1"; }

.mdi-home-circle::before {
  content: "\F07D2"; }

.mdi-home-circle-outline::before {
  content: "\F104D"; }

.mdi-home-city::before {
  content: "\F0D15"; }

.mdi-home-city-outline::before {
  content: "\F0D16"; }

.mdi-home-currency-usd::before {
  content: "\F08AF"; }

.mdi-home-edit::before {
  content: "\F1159"; }

.mdi-home-edit-outline::before {
  content: "\F115A"; }

.mdi-home-export-outline::before {
  content: "\F0F9B"; }

.mdi-home-flood::before {
  content: "\F0EFA"; }

.mdi-home-floor-0::before {
  content: "\F0DD2"; }

.mdi-home-floor-1::before {
  content: "\F0D80"; }

.mdi-home-floor-2::before {
  content: "\F0D81"; }

.mdi-home-floor-3::before {
  content: "\F0D82"; }

.mdi-home-floor-a::before {
  content: "\F0D83"; }

.mdi-home-floor-b::before {
  content: "\F0D84"; }

.mdi-home-floor-g::before {
  content: "\F0D85"; }

.mdi-home-floor-l::before {
  content: "\F0D86"; }

.mdi-home-floor-negative-1::before {
  content: "\F0DD3"; }

.mdi-home-group::before {
  content: "\F0DD4"; }

.mdi-home-heart::before {
  content: "\F0827"; }

.mdi-home-import-outline::before {
  content: "\F0F9C"; }

.mdi-home-lightbulb::before {
  content: "\F1251"; }

.mdi-home-lightbulb-outline::before {
  content: "\F1252"; }

.mdi-home-lock::before {
  content: "\F08EB"; }

.mdi-home-lock-open::before {
  content: "\F08EC"; }

.mdi-home-map-marker::before {
  content: "\F05F8"; }

.mdi-home-minus::before {
  content: "\F0974"; }

.mdi-home-modern::before {
  content: "\F02DD"; }

.mdi-home-outline::before {
  content: "\F06A1"; }

.mdi-home-plus::before {
  content: "\F0975"; }

.mdi-home-remove::before {
  content: "\F1247"; }

.mdi-home-roof::before {
  content: "\F112B"; }

.mdi-home-search::before {
  content: "\F13B0"; }

.mdi-home-search-outline::before {
  content: "\F13B1"; }

.mdi-home-thermometer::before {
  content: "\F0F54"; }

.mdi-home-thermometer-outline::before {
  content: "\F0F55"; }

.mdi-home-variant::before {
  content: "\F02DE"; }

.mdi-home-variant-outline::before {
  content: "\F0BA7"; }

.mdi-hook::before {
  content: "\F06E2"; }

.mdi-hook-off::before {
  content: "\F06E3"; }

.mdi-hops::before {
  content: "\F02DF"; }

.mdi-horizontal-rotate-clockwise::before {
  content: "\F10F3"; }

.mdi-horizontal-rotate-counterclockwise::before {
  content: "\F10F4"; }

.mdi-horseshoe::before {
  content: "\F0A58"; }

.mdi-hospital::before {
  content: "\F0FF6"; }

.mdi-hospital-box::before {
  content: "\F02E0"; }

.mdi-hospital-box-outline::before {
  content: "\F0FF7"; }

.mdi-hospital-building::before {
  content: "\F02E1"; }

.mdi-hospital-marker::before {
  content: "\F02E2"; }

.mdi-hot-tub::before {
  content: "\F0828"; }

.mdi-hubspot::before {
  content: "\F0D17"; }

.mdi-hulu::before {
  content: "\F0829"; }

.mdi-human::before {
  content: "\F02E6"; }

.mdi-human-baby-changing-table::before {
  content: "\F138B"; }

.mdi-human-child::before {
  content: "\F02E7"; }

.mdi-human-female::before {
  content: "\F0649"; }

.mdi-human-female-boy::before {
  content: "\F0A59"; }

.mdi-human-female-female::before {
  content: "\F0A5A"; }

.mdi-human-female-girl::before {
  content: "\F0A5B"; }

.mdi-human-greeting::before {
  content: "\F064A"; }

.mdi-human-handsdown::before {
  content: "\F064B"; }

.mdi-human-handsup::before {
  content: "\F064C"; }

.mdi-human-male::before {
  content: "\F064D"; }

.mdi-human-male-boy::before {
  content: "\F0A5C"; }

.mdi-human-male-child::before {
  content: "\F138C"; }

.mdi-human-male-female::before {
  content: "\F02E8"; }

.mdi-human-male-girl::before {
  content: "\F0A5D"; }

.mdi-human-male-height::before {
  content: "\F0EFB"; }

.mdi-human-male-height-variant::before {
  content: "\F0EFC"; }

.mdi-human-male-male::before {
  content: "\F0A5E"; }

.mdi-human-pregnant::before {
  content: "\F05CF"; }

.mdi-human-wheelchair::before {
  content: "\F138D"; }

.mdi-humble-bundle::before {
  content: "\F0744"; }

.mdi-hvac::before {
  content: "\F1352"; }

.mdi-hydraulic-oil-level::before {
  content: "\F1324"; }

.mdi-hydraulic-oil-temperature::before {
  content: "\F1325"; }

.mdi-hydro-power::before {
  content: "\F12E5"; }

.mdi-ice-cream::before {
  content: "\F082A"; }

.mdi-ice-cream-off::before {
  content: "\F0E52"; }

.mdi-ice-pop::before {
  content: "\F0EFD"; }

.mdi-id-card::before {
  content: "\F0FC0"; }

.mdi-identifier::before {
  content: "\F0EFE"; }

.mdi-ideogram-cjk::before {
  content: "\F1331"; }

.mdi-ideogram-cjk-variant::before {
  content: "\F1332"; }

.mdi-iframe::before {
  content: "\F0C8B"; }

.mdi-iframe-array::before {
  content: "\F10F5"; }

.mdi-iframe-array-outline::before {
  content: "\F10F6"; }

.mdi-iframe-braces::before {
  content: "\F10F7"; }

.mdi-iframe-braces-outline::before {
  content: "\F10F8"; }

.mdi-iframe-outline::before {
  content: "\F0C8C"; }

.mdi-iframe-parentheses::before {
  content: "\F10F9"; }

.mdi-iframe-parentheses-outline::before {
  content: "\F10FA"; }

.mdi-iframe-variable::before {
  content: "\F10FB"; }

.mdi-iframe-variable-outline::before {
  content: "\F10FC"; }

.mdi-image::before {
  content: "\F02E9"; }

.mdi-image-album::before {
  content: "\F02EA"; }

.mdi-image-area::before {
  content: "\F02EB"; }

.mdi-image-area-close::before {
  content: "\F02EC"; }

.mdi-image-auto-adjust::before {
  content: "\F0FC1"; }

.mdi-image-broken::before {
  content: "\F02ED"; }

.mdi-image-broken-variant::before {
  content: "\F02EE"; }

.mdi-image-edit::before {
  content: "\F11E3"; }

.mdi-image-edit-outline::before {
  content: "\F11E4"; }

.mdi-image-filter-black-white::before {
  content: "\F02F0"; }

.mdi-image-filter-center-focus::before {
  content: "\F02F1"; }

.mdi-image-filter-center-focus-strong::before {
  content: "\F0EFF"; }

.mdi-image-filter-center-focus-strong-outline::before {
  content: "\F0F00"; }

.mdi-image-filter-center-focus-weak::before {
  content: "\F02F2"; }

.mdi-image-filter-drama::before {
  content: "\F02F3"; }

.mdi-image-filter-frames::before {
  content: "\F02F4"; }

.mdi-image-filter-hdr::before {
  content: "\F02F5"; }

.mdi-image-filter-none::before {
  content: "\F02F6"; }

.mdi-image-filter-tilt-shift::before {
  content: "\F02F7"; }

.mdi-image-filter-vintage::before {
  content: "\F02F8"; }

.mdi-image-frame::before {
  content: "\F0E49"; }

.mdi-image-move::before {
  content: "\F09F8"; }

.mdi-image-multiple::before {
  content: "\F02F9"; }

.mdi-image-multiple-outline::before {
  content: "\F02EF"; }

.mdi-image-off::before {
  content: "\F082B"; }

.mdi-image-off-outline::before {
  content: "\F11D1"; }

.mdi-image-outline::before {
  content: "\F0976"; }

.mdi-image-plus::before {
  content: "\F087C"; }

.mdi-image-search::before {
  content: "\F0977"; }

.mdi-image-search-outline::before {
  content: "\F0978"; }

.mdi-image-size-select-actual::before {
  content: "\F0C8D"; }

.mdi-image-size-select-large::before {
  content: "\F0C8E"; }

.mdi-image-size-select-small::before {
  content: "\F0C8F"; }

.mdi-import::before {
  content: "\F02FA"; }

.mdi-inbox::before {
  content: "\F0687"; }

.mdi-inbox-arrow-down::before {
  content: "\F02FB"; }

.mdi-inbox-arrow-down-outline::before {
  content: "\F1270"; }

.mdi-inbox-arrow-up::before {
  content: "\F03D1"; }

.mdi-inbox-arrow-up-outline::before {
  content: "\F1271"; }

.mdi-inbox-full::before {
  content: "\F1272"; }

.mdi-inbox-full-outline::before {
  content: "\F1273"; }

.mdi-inbox-multiple::before {
  content: "\F08B0"; }

.mdi-inbox-multiple-outline::before {
  content: "\F0BA8"; }

.mdi-inbox-outline::before {
  content: "\F1274"; }

.mdi-incognito::before {
  content: "\F05F9"; }

.mdi-incognito-off::before {
  content: "\F0075"; }

.mdi-infinity::before {
  content: "\F06E4"; }

.mdi-information::before {
  content: "\F02FC"; }

.mdi-information-outline::before {
  content: "\F02FD"; }

.mdi-information-variant::before {
  content: "\F064E"; }

.mdi-instagram::before {
  content: "\F02FE"; }

.mdi-instrument-triangle::before {
  content: "\F104E"; }

.mdi-invert-colors::before {
  content: "\F0301"; }

.mdi-invert-colors-off::before {
  content: "\F0E4A"; }

.mdi-iobroker::before {
  content: "\F12E8"; }

.mdi-ip::before {
  content: "\F0A5F"; }

.mdi-ip-network::before {
  content: "\F0A60"; }

.mdi-ip-network-outline::before {
  content: "\F0C90"; }

.mdi-ipod::before {
  content: "\F0C91"; }

.mdi-islam::before {
  content: "\F0979"; }

.mdi-island::before {
  content: "\F104F"; }

.mdi-iv-bag::before {
  content: "\F10B9"; }

.mdi-jabber::before {
  content: "\F0DD5"; }

.mdi-jeepney::before {
  content: "\F0302"; }

.mdi-jellyfish::before {
  content: "\F0F01"; }

.mdi-jellyfish-outline::before {
  content: "\F0F02"; }

.mdi-jira::before {
  content: "\F0303"; }

.mdi-jquery::before {
  content: "\F087D"; }

.mdi-jsfiddle::before {
  content: "\F0304"; }

.mdi-judaism::before {
  content: "\F097A"; }

.mdi-jump-rope::before {
  content: "\F12FF"; }

.mdi-kabaddi::before {
  content: "\F0D87"; }

.mdi-karate::before {
  content: "\F082C"; }

.mdi-keg::before {
  content: "\F0305"; }

.mdi-kettle::before {
  content: "\F05FA"; }

.mdi-kettle-alert::before {
  content: "\F1317"; }

.mdi-kettle-alert-outline::before {
  content: "\F1318"; }

.mdi-kettle-off::before {
  content: "\F131B"; }

.mdi-kettle-off-outline::before {
  content: "\F131C"; }

.mdi-kettle-outline::before {
  content: "\F0F56"; }

.mdi-kettle-steam::before {
  content: "\F1319"; }

.mdi-kettle-steam-outline::before {
  content: "\F131A"; }

.mdi-kettlebell::before {
  content: "\F1300"; }

.mdi-key::before {
  content: "\F0306"; }

.mdi-key-arrow-right::before {
  content: "\F1312"; }

.mdi-key-change::before {
  content: "\F0307"; }

.mdi-key-link::before {
  content: "\F119F"; }

.mdi-key-minus::before {
  content: "\F0308"; }

.mdi-key-outline::before {
  content: "\F0DD6"; }

.mdi-key-plus::before {
  content: "\F0309"; }

.mdi-key-remove::before {
  content: "\F030A"; }

.mdi-key-star::before {
  content: "\F119E"; }

.mdi-key-variant::before {
  content: "\F030B"; }

.mdi-key-wireless::before {
  content: "\F0FC2"; }

.mdi-keyboard::before {
  content: "\F030C"; }

.mdi-keyboard-backspace::before {
  content: "\F030D"; }

.mdi-keyboard-caps::before {
  content: "\F030E"; }

.mdi-keyboard-close::before {
  content: "\F030F"; }

.mdi-keyboard-esc::before {
  content: "\F12B7"; }

.mdi-keyboard-f1::before {
  content: "\F12AB"; }

.mdi-keyboard-f10::before {
  content: "\F12B4"; }

.mdi-keyboard-f11::before {
  content: "\F12B5"; }

.mdi-keyboard-f12::before {
  content: "\F12B6"; }

.mdi-keyboard-f2::before {
  content: "\F12AC"; }

.mdi-keyboard-f3::before {
  content: "\F12AD"; }

.mdi-keyboard-f4::before {
  content: "\F12AE"; }

.mdi-keyboard-f5::before {
  content: "\F12AF"; }

.mdi-keyboard-f6::before {
  content: "\F12B0"; }

.mdi-keyboard-f7::before {
  content: "\F12B1"; }

.mdi-keyboard-f8::before {
  content: "\F12B2"; }

.mdi-keyboard-f9::before {
  content: "\F12B3"; }

.mdi-keyboard-off::before {
  content: "\F0310"; }

.mdi-keyboard-off-outline::before {
  content: "\F0E4B"; }

.mdi-keyboard-outline::before {
  content: "\F097B"; }

.mdi-keyboard-return::before {
  content: "\F0311"; }

.mdi-keyboard-settings::before {
  content: "\F09F9"; }

.mdi-keyboard-settings-outline::before {
  content: "\F09FA"; }

.mdi-keyboard-space::before {
  content: "\F1050"; }

.mdi-keyboard-tab::before {
  content: "\F0312"; }

.mdi-keyboard-variant::before {
  content: "\F0313"; }

.mdi-khanda::before {
  content: "\F10FD"; }

.mdi-kickstarter::before {
  content: "\F0745"; }

.mdi-klingon::before {
  content: "\F135B"; }

.mdi-knife::before {
  content: "\F09FB"; }

.mdi-knife-military::before {
  content: "\F09FC"; }

.mdi-kodi::before {
  content: "\F0314"; }

.mdi-kubernetes::before {
  content: "\F10FE"; }

.mdi-label::before {
  content: "\F0315"; }

.mdi-label-multiple::before {
  content: "\F1375"; }

.mdi-label-multiple-outline::before {
  content: "\F1376"; }

.mdi-label-off::before {
  content: "\F0ACB"; }

.mdi-label-off-outline::before {
  content: "\F0ACC"; }

.mdi-label-outline::before {
  content: "\F0316"; }

.mdi-label-percent::before {
  content: "\F12EA"; }

.mdi-label-percent-outline::before {
  content: "\F12EB"; }

.mdi-label-variant::before {
  content: "\F0ACD"; }

.mdi-label-variant-outline::before {
  content: "\F0ACE"; }

.mdi-ladybug::before {
  content: "\F082D"; }

.mdi-lambda::before {
  content: "\F0627"; }

.mdi-lamp::before {
  content: "\F06B5"; }

.mdi-lan::before {
  content: "\F0317"; }

.mdi-lan-check::before {
  content: "\F12AA"; }

.mdi-lan-connect::before {
  content: "\F0318"; }

.mdi-lan-disconnect::before {
  content: "\F0319"; }

.mdi-lan-pending::before {
  content: "\F031A"; }

.mdi-language-c::before {
  content: "\F0671"; }

.mdi-language-cpp::before {
  content: "\F0672"; }

.mdi-language-csharp::before {
  content: "\F031B"; }

.mdi-language-css3::before {
  content: "\F031C"; }

.mdi-language-fortran::before {
  content: "\F121A"; }

.mdi-language-go::before {
  content: "\F07D3"; }

.mdi-language-haskell::before {
  content: "\F0C92"; }

.mdi-language-html5::before {
  content: "\F031D"; }

.mdi-language-java::before {
  content: "\F0B37"; }

.mdi-language-javascript::before {
  content: "\F031E"; }

.mdi-language-kotlin::before {
  content: "\F1219"; }

.mdi-language-lua::before {
  content: "\F08B1"; }

.mdi-language-markdown::before {
  content: "\F0354"; }

.mdi-language-markdown-outline::before {
  content: "\F0F5B"; }

.mdi-language-php::before {
  content: "\F031F"; }

.mdi-language-python::before {
  content: "\F0320"; }

.mdi-language-r::before {
  content: "\F07D4"; }

.mdi-language-ruby::before {
  content: "\F0D2D"; }

.mdi-language-ruby-on-rails::before {
  content: "\F0ACF"; }

.mdi-language-swift::before {
  content: "\F06E5"; }

.mdi-language-typescript::before {
  content: "\F06E6"; }

.mdi-language-xaml::before {
  content: "\F0673"; }

.mdi-laptop::before {
  content: "\F0322"; }

.mdi-laptop-chromebook::before {
  content: "\F0323"; }

.mdi-laptop-mac::before {
  content: "\F0324"; }

.mdi-laptop-off::before {
  content: "\F06E7"; }

.mdi-laptop-windows::before {
  content: "\F0325"; }

.mdi-laravel::before {
  content: "\F0AD0"; }

.mdi-lasso::before {
  content: "\F0F03"; }

.mdi-lastpass::before {
  content: "\F0446"; }

.mdi-latitude::before {
  content: "\F0F57"; }

.mdi-launch::before {
  content: "\F0327"; }

.mdi-lava-lamp::before {
  content: "\F07D5"; }

.mdi-layers::before {
  content: "\F0328"; }

.mdi-layers-minus::before {
  content: "\F0E4C"; }

.mdi-layers-off::before {
  content: "\F0329"; }

.mdi-layers-off-outline::before {
  content: "\F09FD"; }

.mdi-layers-outline::before {
  content: "\F09FE"; }

.mdi-layers-plus::before {
  content: "\F0E4D"; }

.mdi-layers-remove::before {
  content: "\F0E4E"; }

.mdi-layers-search::before {
  content: "\F1206"; }

.mdi-layers-search-outline::before {
  content: "\F1207"; }

.mdi-layers-triple::before {
  content: "\F0F58"; }

.mdi-layers-triple-outline::before {
  content: "\F0F59"; }

.mdi-lead-pencil::before {
  content: "\F064F"; }

.mdi-leaf::before {
  content: "\F032A"; }

.mdi-leaf-maple::before {
  content: "\F0C93"; }

.mdi-leaf-maple-off::before {
  content: "\F12DA"; }

.mdi-leaf-off::before {
  content: "\F12D9"; }

.mdi-leak::before {
  content: "\F0DD7"; }

.mdi-leak-off::before {
  content: "\F0DD8"; }

.mdi-led-off::before {
  content: "\F032B"; }

.mdi-led-on::before {
  content: "\F032C"; }

.mdi-led-outline::before {
  content: "\F032D"; }

.mdi-led-strip::before {
  content: "\F07D6"; }

.mdi-led-strip-variant::before {
  content: "\F1051"; }

.mdi-led-variant-off::before {
  content: "\F032E"; }

.mdi-led-variant-on::before {
  content: "\F032F"; }

.mdi-led-variant-outline::before {
  content: "\F0330"; }

.mdi-leek::before {
  content: "\F117D"; }

.mdi-less-than::before {
  content: "\F097C"; }

.mdi-less-than-or-equal::before {
  content: "\F097D"; }

.mdi-library::before {
  content: "\F0331"; }

.mdi-library-shelves::before {
  content: "\F0BA9"; }

.mdi-license::before {
  content: "\F0FC3"; }

.mdi-lifebuoy::before {
  content: "\F087E"; }

.mdi-light-switch::before {
  content: "\F097E"; }

.mdi-lightbulb::before {
  content: "\F0335"; }

.mdi-lightbulb-cfl::before {
  content: "\F1208"; }

.mdi-lightbulb-cfl-off::before {
  content: "\F1209"; }

.mdi-lightbulb-cfl-spiral::before {
  content: "\F1275"; }

.mdi-lightbulb-cfl-spiral-off::before {
  content: "\F12C3"; }

.mdi-lightbulb-group::before {
  content: "\F1253"; }

.mdi-lightbulb-group-off::before {
  content: "\F12CD"; }

.mdi-lightbulb-group-off-outline::before {
  content: "\F12CE"; }

.mdi-lightbulb-group-outline::before {
  content: "\F1254"; }

.mdi-lightbulb-multiple::before {
  content: "\F1255"; }

.mdi-lightbulb-multiple-off::before {
  content: "\F12CF"; }

.mdi-lightbulb-multiple-off-outline::before {
  content: "\F12D0"; }

.mdi-lightbulb-multiple-outline::before {
  content: "\F1256"; }

.mdi-lightbulb-off::before {
  content: "\F0E4F"; }

.mdi-lightbulb-off-outline::before {
  content: "\F0E50"; }

.mdi-lightbulb-on::before {
  content: "\F06E8"; }

.mdi-lightbulb-on-outline::before {
  content: "\F06E9"; }

.mdi-lightbulb-outline::before {
  content: "\F0336"; }

.mdi-lighthouse::before {
  content: "\F09FF"; }

.mdi-lighthouse-on::before {
  content: "\F0A00"; }

.mdi-link::before {
  content: "\F0337"; }

.mdi-link-box::before {
  content: "\F0D1A"; }

.mdi-link-box-outline::before {
  content: "\F0D1B"; }

.mdi-link-box-variant::before {
  content: "\F0D1C"; }

.mdi-link-box-variant-outline::before {
  content: "\F0D1D"; }

.mdi-link-lock::before {
  content: "\F10BA"; }

.mdi-link-off::before {
  content: "\F0338"; }

.mdi-link-plus::before {
  content: "\F0C94"; }

.mdi-link-variant::before {
  content: "\F0339"; }

.mdi-link-variant-minus::before {
  content: "\F10FF"; }

.mdi-link-variant-off::before {
  content: "\F033A"; }

.mdi-link-variant-plus::before {
  content: "\F1100"; }

.mdi-link-variant-remove::before {
  content: "\F1101"; }

.mdi-linkedin::before {
  content: "\F033B"; }

.mdi-linux::before {
  content: "\F033D"; }

.mdi-linux-mint::before {
  content: "\F08ED"; }

.mdi-lipstick::before {
  content: "\F13B5"; }

.mdi-litecoin::before {
  content: "\F0A61"; }

.mdi-loading::before {
  content: "\F0772"; }

.mdi-location-enter::before {
  content: "\F0FC4"; }

.mdi-location-exit::before {
  content: "\F0FC5"; }

.mdi-lock::before {
  content: "\F033E"; }

.mdi-lock-alert::before {
  content: "\F08EE"; }

.mdi-lock-check::before {
  content: "\F139A"; }

.mdi-lock-clock::before {
  content: "\F097F"; }

.mdi-lock-open::before {
  content: "\F033F"; }

.mdi-lock-open-alert::before {
  content: "\F139B"; }

.mdi-lock-open-check::before {
  content: "\F139C"; }

.mdi-lock-open-outline::before {
  content: "\F0340"; }

.mdi-lock-open-variant::before {
  content: "\F0FC6"; }

.mdi-lock-open-variant-outline::before {
  content: "\F0FC7"; }

.mdi-lock-outline::before {
  content: "\F0341"; }

.mdi-lock-pattern::before {
  content: "\F06EA"; }

.mdi-lock-plus::before {
  content: "\F05FB"; }

.mdi-lock-question::before {
  content: "\F08EF"; }

.mdi-lock-reset::before {
  content: "\F0773"; }

.mdi-lock-smart::before {
  content: "\F08B2"; }

.mdi-locker::before {
  content: "\F07D7"; }

.mdi-locker-multiple::before {
  content: "\F07D8"; }

.mdi-login::before {
  content: "\F0342"; }

.mdi-login-variant::before {
  content: "\F05FC"; }

.mdi-logout::before {
  content: "\F0343"; }

.mdi-logout-variant::before {
  content: "\F05FD"; }

.mdi-longitude::before {
  content: "\F0F5A"; }

.mdi-looks::before {
  content: "\F0344"; }

.mdi-loupe::before {
  content: "\F0345"; }

.mdi-lumx::before {
  content: "\F0346"; }

.mdi-lungs::before {
  content: "\F1084"; }

.mdi-magnet::before {
  content: "\F0347"; }

.mdi-magnet-on::before {
  content: "\F0348"; }

.mdi-magnify::before {
  content: "\F0349"; }

.mdi-magnify-close::before {
  content: "\F0980"; }

.mdi-magnify-minus::before {
  content: "\F034A"; }

.mdi-magnify-minus-cursor::before {
  content: "\F0A62"; }

.mdi-magnify-minus-outline::before {
  content: "\F06EC"; }

.mdi-magnify-plus::before {
  content: "\F034B"; }

.mdi-magnify-plus-cursor::before {
  content: "\F0A63"; }

.mdi-magnify-plus-outline::before {
  content: "\F06ED"; }

.mdi-magnify-remove-cursor::before {
  content: "\F120C"; }

.mdi-magnify-remove-outline::before {
  content: "\F120D"; }

.mdi-magnify-scan::before {
  content: "\F1276"; }

.mdi-mail::before {
  content: "\F0EBB"; }

.mdi-mailbox::before {
  content: "\F06EE"; }

.mdi-mailbox-open::before {
  content: "\F0D88"; }

.mdi-mailbox-open-outline::before {
  content: "\F0D89"; }

.mdi-mailbox-open-up::before {
  content: "\F0D8A"; }

.mdi-mailbox-open-up-outline::before {
  content: "\F0D8B"; }

.mdi-mailbox-outline::before {
  content: "\F0D8C"; }

.mdi-mailbox-up::before {
  content: "\F0D8D"; }

.mdi-mailbox-up-outline::before {
  content: "\F0D8E"; }

.mdi-map::before {
  content: "\F034D"; }

.mdi-map-check::before {
  content: "\F0EBC"; }

.mdi-map-check-outline::before {
  content: "\F0EBD"; }

.mdi-map-clock::before {
  content: "\F0D1E"; }

.mdi-map-clock-outline::before {
  content: "\F0D1F"; }

.mdi-map-legend::before {
  content: "\F0A01"; }

.mdi-map-marker::before {
  content: "\F034E"; }

.mdi-map-marker-alert::before {
  content: "\F0F05"; }

.mdi-map-marker-alert-outline::before {
  content: "\F0F06"; }

.mdi-map-marker-check::before {
  content: "\F0C95"; }

.mdi-map-marker-check-outline::before {
  content: "\F12FB"; }

.mdi-map-marker-circle::before {
  content: "\F034F"; }

.mdi-map-marker-distance::before {
  content: "\F08F0"; }

.mdi-map-marker-down::before {
  content: "\F1102"; }

.mdi-map-marker-left::before {
  content: "\F12DB"; }

.mdi-map-marker-left-outline::before {
  content: "\F12DD"; }

.mdi-map-marker-minus::before {
  content: "\F0650"; }

.mdi-map-marker-minus-outline::before {
  content: "\F12F9"; }

.mdi-map-marker-multiple::before {
  content: "\F0350"; }

.mdi-map-marker-multiple-outline::before {
  content: "\F1277"; }

.mdi-map-marker-off::before {
  content: "\F0351"; }

.mdi-map-marker-off-outline::before {
  content: "\F12FD"; }

.mdi-map-marker-outline::before {
  content: "\F07D9"; }

.mdi-map-marker-path::before {
  content: "\F0D20"; }

.mdi-map-marker-plus::before {
  content: "\F0651"; }

.mdi-map-marker-plus-outline::before {
  content: "\F12F8"; }

.mdi-map-marker-question::before {
  content: "\F0F07"; }

.mdi-map-marker-question-outline::before {
  content: "\F0F08"; }

.mdi-map-marker-radius::before {
  content: "\F0352"; }

.mdi-map-marker-radius-outline::before {
  content: "\F12FC"; }

.mdi-map-marker-remove::before {
  content: "\F0F09"; }

.mdi-map-marker-remove-outline::before {
  content: "\F12FA"; }

.mdi-map-marker-remove-variant::before {
  content: "\F0F0A"; }

.mdi-map-marker-right::before {
  content: "\F12DC"; }

.mdi-map-marker-right-outline::before {
  content: "\F12DE"; }

.mdi-map-marker-up::before {
  content: "\F1103"; }

.mdi-map-minus::before {
  content: "\F0981"; }

.mdi-map-outline::before {
  content: "\F0982"; }

.mdi-map-plus::before {
  content: "\F0983"; }

.mdi-map-search::before {
  content: "\F0984"; }

.mdi-map-search-outline::before {
  content: "\F0985"; }

.mdi-mapbox::before {
  content: "\F0BAA"; }

.mdi-margin::before {
  content: "\F0353"; }

.mdi-marker::before {
  content: "\F0652"; }

.mdi-marker-cancel::before {
  content: "\F0DD9"; }

.mdi-marker-check::before {
  content: "\F0355"; }

.mdi-mastodon::before {
  content: "\F0AD1"; }

.mdi-material-design::before {
  content: "\F0986"; }

.mdi-material-ui::before {
  content: "\F0357"; }

.mdi-math-compass::before {
  content: "\F0358"; }

.mdi-math-cos::before {
  content: "\F0C96"; }

.mdi-math-integral::before {
  content: "\F0FC8"; }

.mdi-math-integral-box::before {
  content: "\F0FC9"; }

.mdi-math-log::before {
  content: "\F1085"; }

.mdi-math-norm::before {
  content: "\F0FCA"; }

.mdi-math-norm-box::before {
  content: "\F0FCB"; }

.mdi-math-sin::before {
  content: "\F0C97"; }

.mdi-math-tan::before {
  content: "\F0C98"; }

.mdi-matrix::before {
  content: "\F0628"; }

.mdi-medal::before {
  content: "\F0987"; }

.mdi-medal-outline::before {
  content: "\F1326"; }

.mdi-medical-bag::before {
  content: "\F06EF"; }

.mdi-meditation::before {
  content: "\F117B"; }

.mdi-memory::before {
  content: "\F035B"; }

.mdi-menu::before {
  content: "\F035C"; }

.mdi-menu-down::before {
  content: "\F035D"; }

.mdi-menu-down-outline::before {
  content: "\F06B6"; }

.mdi-menu-left::before {
  content: "\F035E"; }

.mdi-menu-left-outline::before {
  content: "\F0A02"; }

.mdi-menu-open::before {
  content: "\F0BAB"; }

.mdi-menu-right::before {
  content: "\F035F"; }

.mdi-menu-right-outline::before {
  content: "\F0A03"; }

.mdi-menu-swap::before {
  content: "\F0A64"; }

.mdi-menu-swap-outline::before {
  content: "\F0A65"; }

.mdi-menu-up::before {
  content: "\F0360"; }

.mdi-menu-up-outline::before {
  content: "\F06B7"; }

.mdi-merge::before {
  content: "\F0F5C"; }

.mdi-message::before {
  content: "\F0361"; }

.mdi-message-alert::before {
  content: "\F0362"; }

.mdi-message-alert-outline::before {
  content: "\F0A04"; }

.mdi-message-arrow-left::before {
  content: "\F12F2"; }

.mdi-message-arrow-left-outline::before {
  content: "\F12F3"; }

.mdi-message-arrow-right::before {
  content: "\F12F4"; }

.mdi-message-arrow-right-outline::before {
  content: "\F12F5"; }

.mdi-message-bulleted::before {
  content: "\F06A2"; }

.mdi-message-bulleted-off::before {
  content: "\F06A3"; }

.mdi-message-cog::before {
  content: "\F06F1"; }

.mdi-message-cog-outline::before {
  content: "\F1172"; }

.mdi-message-draw::before {
  content: "\F0363"; }

.mdi-message-image::before {
  content: "\F0364"; }

.mdi-message-image-outline::before {
  content: "\F116C"; }

.mdi-message-lock::before {
  content: "\F0FCC"; }

.mdi-message-lock-outline::before {
  content: "\F116D"; }

.mdi-message-minus::before {
  content: "\F116E"; }

.mdi-message-minus-outline::before {
  content: "\F116F"; }

.mdi-message-outline::before {
  content: "\F0365"; }

.mdi-message-plus::before {
  content: "\F0653"; }

.mdi-message-plus-outline::before {
  content: "\F10BB"; }

.mdi-message-processing::before {
  content: "\F0366"; }

.mdi-message-processing-outline::before {
  content: "\F1170"; }

.mdi-message-reply::before {
  content: "\F0367"; }

.mdi-message-reply-text::before {
  content: "\F0368"; }

.mdi-message-settings::before {
  content: "\F06F0"; }

.mdi-message-settings-outline::before {
  content: "\F1171"; }

.mdi-message-text::before {
  content: "\F0369"; }

.mdi-message-text-clock::before {
  content: "\F1173"; }

.mdi-message-text-clock-outline::before {
  content: "\F1174"; }

.mdi-message-text-lock::before {
  content: "\F0FCD"; }

.mdi-message-text-lock-outline::before {
  content: "\F1175"; }

.mdi-message-text-outline::before {
  content: "\F036A"; }

.mdi-message-video::before {
  content: "\F036B"; }

.mdi-meteor::before {
  content: "\F0629"; }

.mdi-metronome::before {
  content: "\F07DA"; }

.mdi-metronome-tick::before {
  content: "\F07DB"; }

.mdi-micro-sd::before {
  content: "\F07DC"; }

.mdi-microphone::before {
  content: "\F036C"; }

.mdi-microphone-minus::before {
  content: "\F08B3"; }

.mdi-microphone-off::before {
  content: "\F036D"; }

.mdi-microphone-outline::before {
  content: "\F036E"; }

.mdi-microphone-plus::before {
  content: "\F08B4"; }

.mdi-microphone-settings::before {
  content: "\F036F"; }

.mdi-microphone-variant::before {
  content: "\F0370"; }

.mdi-microphone-variant-off::before {
  content: "\F0371"; }

.mdi-microscope::before {
  content: "\F0654"; }

.mdi-microsoft::before {
  content: "\F0372"; }

.mdi-microsoft-access::before {
  content: "\F138E"; }

.mdi-microsoft-azure::before {
  content: "\F0805"; }

.mdi-microsoft-azure-devops::before {
  content: "\F0FD5"; }

.mdi-microsoft-bing::before {
  content: "\F00A4"; }

.mdi-microsoft-dynamics-365::before {
  content: "\F0988"; }

.mdi-microsoft-edge::before {
  content: "\F01E9"; }

.mdi-microsoft-edge-legacy::before {
  content: "\F1250"; }

.mdi-microsoft-excel::before {
  content: "\F138F"; }

.mdi-microsoft-internet-explorer::before {
  content: "\F0300"; }

.mdi-microsoft-office::before {
  content: "\F03C6"; }

.mdi-microsoft-onedrive::before {
  content: "\F03CA"; }

.mdi-microsoft-onenote::before {
  content: "\F0747"; }

.mdi-microsoft-outlook::before {
  content: "\F0D22"; }

.mdi-microsoft-powerpoint::before {
  content: "\F1390"; }

.mdi-microsoft-sharepoint::before {
  content: "\F1391"; }

.mdi-microsoft-teams::before {
  content: "\F02BB"; }

.mdi-microsoft-visual-studio::before {
  content: "\F0610"; }

.mdi-microsoft-visual-studio-code::before {
  content: "\F0A1E"; }

.mdi-microsoft-windows::before {
  content: "\F05B3"; }

.mdi-microsoft-windows-classic::before {
  content: "\F0A21"; }

.mdi-microsoft-word::before {
  content: "\F1392"; }

.mdi-microsoft-xbox::before {
  content: "\F05B9"; }

.mdi-microsoft-xbox-controller::before {
  content: "\F05BA"; }

.mdi-microsoft-xbox-controller-battery-alert::before {
  content: "\F074B"; }

.mdi-microsoft-xbox-controller-battery-charging::before {
  content: "\F0A22"; }

.mdi-microsoft-xbox-controller-battery-empty::before {
  content: "\F074C"; }

.mdi-microsoft-xbox-controller-battery-full::before {
  content: "\F074D"; }

.mdi-microsoft-xbox-controller-battery-low::before {
  content: "\F074E"; }

.mdi-microsoft-xbox-controller-battery-medium::before {
  content: "\F074F"; }

.mdi-microsoft-xbox-controller-battery-unknown::before {
  content: "\F0750"; }

.mdi-microsoft-xbox-controller-menu::before {
  content: "\F0E6F"; }

.mdi-microsoft-xbox-controller-off::before {
  content: "\F05BB"; }

.mdi-microsoft-xbox-controller-view::before {
  content: "\F0E70"; }

.mdi-microsoft-yammer::before {
  content: "\F0789"; }

.mdi-microwave::before {
  content: "\F0C99"; }

.mdi-middleware::before {
  content: "\F0F5D"; }

.mdi-middleware-outline::before {
  content: "\F0F5E"; }

.mdi-midi::before {
  content: "\F08F1"; }

.mdi-midi-port::before {
  content: "\F08F2"; }

.mdi-mine::before {
  content: "\F0DDA"; }

.mdi-minecraft::before {
  content: "\F0373"; }

.mdi-mini-sd::before {
  content: "\F0A05"; }

.mdi-minidisc::before {
  content: "\F0A06"; }

.mdi-minus::before {
  content: "\F0374"; }

.mdi-minus-box::before {
  content: "\F0375"; }

.mdi-minus-box-multiple::before {
  content: "\F1141"; }

.mdi-minus-box-multiple-outline::before {
  content: "\F1142"; }

.mdi-minus-box-outline::before {
  content: "\F06F2"; }

.mdi-minus-circle::before {
  content: "\F0376"; }

.mdi-minus-circle-multiple::before {
  content: "\F035A"; }

.mdi-minus-circle-multiple-outline::before {
  content: "\F0AD3"; }

.mdi-minus-circle-outline::before {
  content: "\F0377"; }

.mdi-minus-network::before {
  content: "\F0378"; }

.mdi-minus-network-outline::before {
  content: "\F0C9A"; }

.mdi-mirror::before {
  content: "\F11FD"; }

.mdi-mixed-martial-arts::before {
  content: "\F0D8F"; }

.mdi-mixed-reality::before {
  content: "\F087F"; }

.mdi-mixer::before {
  content: "\F07DD"; }

.mdi-molecule::before {
  content: "\F0BAC"; }

.mdi-molecule-co::before {
  content: "\F12FE"; }

.mdi-molecule-co2::before {
  content: "\F07E4"; }

.mdi-monitor::before {
  content: "\F0379"; }

.mdi-monitor-cellphone::before {
  content: "\F0989"; }

.mdi-monitor-cellphone-star::before {
  content: "\F098A"; }

.mdi-monitor-clean::before {
  content: "\F1104"; }

.mdi-monitor-dashboard::before {
  content: "\F0A07"; }

.mdi-monitor-edit::before {
  content: "\F12C6"; }

.mdi-monitor-eye::before {
  content: "\F13B4"; }

.mdi-monitor-lock::before {
  content: "\F0DDB"; }

.mdi-monitor-multiple::before {
  content: "\F037A"; }

.mdi-monitor-off::before {
  content: "\F0D90"; }

.mdi-monitor-screenshot::before {
  content: "\F0E51"; }

.mdi-monitor-speaker::before {
  content: "\F0F5F"; }

.mdi-monitor-speaker-off::before {
  content: "\F0F60"; }

.mdi-monitor-star::before {
  content: "\F0DDC"; }

.mdi-moon-first-quarter::before {
  content: "\F0F61"; }

.mdi-moon-full::before {
  content: "\F0F62"; }

.mdi-moon-last-quarter::before {
  content: "\F0F63"; }

.mdi-moon-new::before {
  content: "\F0F64"; }

.mdi-moon-waning-crescent::before {
  content: "\F0F65"; }

.mdi-moon-waning-gibbous::before {
  content: "\F0F66"; }

.mdi-moon-waxing-crescent::before {
  content: "\F0F67"; }

.mdi-moon-waxing-gibbous::before {
  content: "\F0F68"; }

.mdi-moped::before {
  content: "\F1086"; }

.mdi-more::before {
  content: "\F037B"; }

.mdi-mother-heart::before {
  content: "\F1314"; }

.mdi-mother-nurse::before {
  content: "\F0D21"; }

.mdi-motion-sensor::before {
  content: "\F0D91"; }

.mdi-motorbike::before {
  content: "\F037C"; }

.mdi-mouse::before {
  content: "\F037D"; }

.mdi-mouse-bluetooth::before {
  content: "\F098B"; }

.mdi-mouse-off::before {
  content: "\F037E"; }

.mdi-mouse-variant::before {
  content: "\F037F"; }

.mdi-mouse-variant-off::before {
  content: "\F0380"; }

.mdi-move-resize::before {
  content: "\F0655"; }

.mdi-move-resize-variant::before {
  content: "\F0656"; }

.mdi-movie::before {
  content: "\F0381"; }

.mdi-movie-edit::before {
  content: "\F1122"; }

.mdi-movie-edit-outline::before {
  content: "\F1123"; }

.mdi-movie-filter::before {
  content: "\F1124"; }

.mdi-movie-filter-outline::before {
  content: "\F1125"; }

.mdi-movie-open::before {
  content: "\F0FCE"; }

.mdi-movie-open-outline::before {
  content: "\F0FCF"; }

.mdi-movie-outline::before {
  content: "\F0DDD"; }

.mdi-movie-roll::before {
  content: "\F07DE"; }

.mdi-movie-search::before {
  content: "\F11D2"; }

.mdi-movie-search-outline::before {
  content: "\F11D3"; }

.mdi-muffin::before {
  content: "\F098C"; }

.mdi-multiplication::before {
  content: "\F0382"; }

.mdi-multiplication-box::before {
  content: "\F0383"; }

.mdi-mushroom::before {
  content: "\F07DF"; }

.mdi-mushroom-outline::before {
  content: "\F07E0"; }

.mdi-music::before {
  content: "\F075A"; }

.mdi-music-accidental-double-flat::before {
  content: "\F0F69"; }

.mdi-music-accidental-double-sharp::before {
  content: "\F0F6A"; }

.mdi-music-accidental-flat::before {
  content: "\F0F6B"; }

.mdi-music-accidental-natural::before {
  content: "\F0F6C"; }

.mdi-music-accidental-sharp::before {
  content: "\F0F6D"; }

.mdi-music-box::before {
  content: "\F0384"; }

.mdi-music-box-multiple::before {
  content: "\F0333"; }

.mdi-music-box-multiple-outline::before {
  content: "\F0F04"; }

.mdi-music-box-outline::before {
  content: "\F0385"; }

.mdi-music-circle::before {
  content: "\F0386"; }

.mdi-music-circle-outline::before {
  content: "\F0AD4"; }

.mdi-music-clef-alto::before {
  content: "\F0F6E"; }

.mdi-music-clef-bass::before {
  content: "\F0F6F"; }

.mdi-music-clef-treble::before {
  content: "\F0F70"; }

.mdi-music-note::before {
  content: "\F0387"; }

.mdi-music-note-bluetooth::before {
  content: "\F05FE"; }

.mdi-music-note-bluetooth-off::before {
  content: "\F05FF"; }

.mdi-music-note-eighth::before {
  content: "\F0388"; }

.mdi-music-note-eighth-dotted::before {
  content: "\F0F71"; }

.mdi-music-note-half::before {
  content: "\F0389"; }

.mdi-music-note-half-dotted::before {
  content: "\F0F72"; }

.mdi-music-note-off::before {
  content: "\F038A"; }

.mdi-music-note-off-outline::before {
  content: "\F0F73"; }

.mdi-music-note-outline::before {
  content: "\F0F74"; }

.mdi-music-note-plus::before {
  content: "\F0DDE"; }

.mdi-music-note-quarter::before {
  content: "\F038B"; }

.mdi-music-note-quarter-dotted::before {
  content: "\F0F75"; }

.mdi-music-note-sixteenth::before {
  content: "\F038C"; }

.mdi-music-note-sixteenth-dotted::before {
  content: "\F0F76"; }

.mdi-music-note-whole::before {
  content: "\F038D"; }

.mdi-music-note-whole-dotted::before {
  content: "\F0F77"; }

.mdi-music-off::before {
  content: "\F075B"; }

.mdi-music-rest-eighth::before {
  content: "\F0F78"; }

.mdi-music-rest-half::before {
  content: "\F0F79"; }

.mdi-music-rest-quarter::before {
  content: "\F0F7A"; }

.mdi-music-rest-sixteenth::before {
  content: "\F0F7B"; }

.mdi-music-rest-whole::before {
  content: "\F0F7C"; }

.mdi-nail::before {
  content: "\F0DDF"; }

.mdi-nas::before {
  content: "\F08F3"; }

.mdi-nativescript::before {
  content: "\F0880"; }

.mdi-nature::before {
  content: "\F038E"; }

.mdi-nature-people::before {
  content: "\F038F"; }

.mdi-navigation::before {
  content: "\F0390"; }

.mdi-near-me::before {
  content: "\F05CD"; }

.mdi-necklace::before {
  content: "\F0F0B"; }

.mdi-needle::before {
  content: "\F0391"; }

.mdi-netflix::before {
  content: "\F0746"; }

.mdi-network::before {
  content: "\F06F3"; }

.mdi-network-off::before {
  content: "\F0C9B"; }

.mdi-network-off-outline::before {
  content: "\F0C9C"; }

.mdi-network-outline::before {
  content: "\F0C9D"; }

.mdi-network-strength-1::before {
  content: "\F08F4"; }

.mdi-network-strength-1-alert::before {
  content: "\F08F5"; }

.mdi-network-strength-2::before {
  content: "\F08F6"; }

.mdi-network-strength-2-alert::before {
  content: "\F08F7"; }

.mdi-network-strength-3::before {
  content: "\F08F8"; }

.mdi-network-strength-3-alert::before {
  content: "\F08F9"; }

.mdi-network-strength-4::before {
  content: "\F08FA"; }

.mdi-network-strength-4-alert::before {
  content: "\F08FB"; }

.mdi-network-strength-off::before {
  content: "\F08FC"; }

.mdi-network-strength-off-outline::before {
  content: "\F08FD"; }

.mdi-network-strength-outline::before {
  content: "\F08FE"; }

.mdi-new-box::before {
  content: "\F0394"; }

.mdi-newspaper::before {
  content: "\F0395"; }

.mdi-newspaper-minus::before {
  content: "\F0F0C"; }

.mdi-newspaper-plus::before {
  content: "\F0F0D"; }

.mdi-newspaper-variant::before {
  content: "\F1001"; }

.mdi-newspaper-variant-multiple::before {
  content: "\F1002"; }

.mdi-newspaper-variant-multiple-outline::before {
  content: "\F1003"; }

.mdi-newspaper-variant-outline::before {
  content: "\F1004"; }

.mdi-nfc::before {
  content: "\F0396"; }

.mdi-nfc-search-variant::before {
  content: "\F0E53"; }

.mdi-nfc-tap::before {
  content: "\F0397"; }

.mdi-nfc-variant::before {
  content: "\F0398"; }

.mdi-nfc-variant-off::before {
  content: "\F0E54"; }

.mdi-ninja::before {
  content: "\F0774"; }

.mdi-nintendo-game-boy::before {
  content: "\F1393"; }

.mdi-nintendo-switch::before {
  content: "\F07E1"; }

.mdi-nintendo-wii::before {
  content: "\F05AB"; }

.mdi-nintendo-wiiu::before {
  content: "\F072D"; }

.mdi-nix::before {
  content: "\F1105"; }

.mdi-nodejs::before {
  content: "\F0399"; }

.mdi-noodles::before {
  content: "\F117E"; }

.mdi-not-equal::before {
  content: "\F098D"; }

.mdi-not-equal-variant::before {
  content: "\F098E"; }

.mdi-note::before {
  content: "\F039A"; }

.mdi-note-multiple::before {
  content: "\F06B8"; }

.mdi-note-multiple-outline::before {
  content: "\F06B9"; }

.mdi-note-outline::before {
  content: "\F039B"; }

.mdi-note-plus::before {
  content: "\F039C"; }

.mdi-note-plus-outline::before {
  content: "\F039D"; }

.mdi-note-text::before {
  content: "\F039E"; }

.mdi-note-text-outline::before {
  content: "\F11D7"; }

.mdi-notebook::before {
  content: "\F082E"; }

.mdi-notebook-multiple::before {
  content: "\F0E55"; }

.mdi-notebook-outline::before {
  content: "\F0EBF"; }

.mdi-notification-clear-all::before {
  content: "\F039F"; }

.mdi-npm::before {
  content: "\F06F7"; }

.mdi-nuke::before {
  content: "\F06A4"; }

.mdi-null::before {
  content: "\F07E2"; }

.mdi-numeric::before {
  content: "\F03A0"; }

.mdi-numeric-0::before {
  content: "\F0B39"; }

.mdi-numeric-0-box::before {
  content: "\F03A1"; }

.mdi-numeric-0-box-multiple::before {
  content: "\F0F0E"; }

.mdi-numeric-0-box-multiple-outline::before {
  content: "\F03A2"; }

.mdi-numeric-0-box-outline::before {
  content: "\F03A3"; }

.mdi-numeric-0-circle::before {
  content: "\F0C9E"; }

.mdi-numeric-0-circle-outline::before {
  content: "\F0C9F"; }

.mdi-numeric-1::before {
  content: "\F0B3A"; }

.mdi-numeric-1-box::before {
  content: "\F03A4"; }

.mdi-numeric-1-box-multiple::before {
  content: "\F0F0F"; }

.mdi-numeric-1-box-multiple-outline::before {
  content: "\F03A5"; }

.mdi-numeric-1-box-outline::before {
  content: "\F03A6"; }

.mdi-numeric-1-circle::before {
  content: "\F0CA0"; }

.mdi-numeric-1-circle-outline::before {
  content: "\F0CA1"; }

.mdi-numeric-10::before {
  content: "\F0FE9"; }

.mdi-numeric-10-box::before {
  content: "\F0F7D"; }

.mdi-numeric-10-box-multiple::before {
  content: "\F0FEA"; }

.mdi-numeric-10-box-multiple-outline::before {
  content: "\F0FEB"; }

.mdi-numeric-10-box-outline::before {
  content: "\F0F7E"; }

.mdi-numeric-10-circle::before {
  content: "\F0FEC"; }

.mdi-numeric-10-circle-outline::before {
  content: "\F0FED"; }

.mdi-numeric-2::before {
  content: "\F0B3B"; }

.mdi-numeric-2-box::before {
  content: "\F03A7"; }

.mdi-numeric-2-box-multiple::before {
  content: "\F0F10"; }

.mdi-numeric-2-box-multiple-outline::before {
  content: "\F03A8"; }

.mdi-numeric-2-box-outline::before {
  content: "\F03A9"; }

.mdi-numeric-2-circle::before {
  content: "\F0CA2"; }

.mdi-numeric-2-circle-outline::before {
  content: "\F0CA3"; }

.mdi-numeric-3::before {
  content: "\F0B3C"; }

.mdi-numeric-3-box::before {
  content: "\F03AA"; }

.mdi-numeric-3-box-multiple::before {
  content: "\F0F11"; }

.mdi-numeric-3-box-multiple-outline::before {
  content: "\F03AB"; }

.mdi-numeric-3-box-outline::before {
  content: "\F03AC"; }

.mdi-numeric-3-circle::before {
  content: "\F0CA4"; }

.mdi-numeric-3-circle-outline::before {
  content: "\F0CA5"; }

.mdi-numeric-4::before {
  content: "\F0B3D"; }

.mdi-numeric-4-box::before {
  content: "\F03AD"; }

.mdi-numeric-4-box-multiple::before {
  content: "\F0F12"; }

.mdi-numeric-4-box-multiple-outline::before {
  content: "\F03B2"; }

.mdi-numeric-4-box-outline::before {
  content: "\F03AE"; }

.mdi-numeric-4-circle::before {
  content: "\F0CA6"; }

.mdi-numeric-4-circle-outline::before {
  content: "\F0CA7"; }

.mdi-numeric-5::before {
  content: "\F0B3E"; }

.mdi-numeric-5-box::before {
  content: "\F03B1"; }

.mdi-numeric-5-box-multiple::before {
  content: "\F0F13"; }

.mdi-numeric-5-box-multiple-outline::before {
  content: "\F03AF"; }

.mdi-numeric-5-box-outline::before {
  content: "\F03B0"; }

.mdi-numeric-5-circle::before {
  content: "\F0CA8"; }

.mdi-numeric-5-circle-outline::before {
  content: "\F0CA9"; }

.mdi-numeric-6::before {
  content: "\F0B3F"; }

.mdi-numeric-6-box::before {
  content: "\F03B3"; }

.mdi-numeric-6-box-multiple::before {
  content: "\F0F14"; }

.mdi-numeric-6-box-multiple-outline::before {
  content: "\F03B4"; }

.mdi-numeric-6-box-outline::before {
  content: "\F03B5"; }

.mdi-numeric-6-circle::before {
  content: "\F0CAA"; }

.mdi-numeric-6-circle-outline::before {
  content: "\F0CAB"; }

.mdi-numeric-7::before {
  content: "\F0B40"; }

.mdi-numeric-7-box::before {
  content: "\F03B6"; }

.mdi-numeric-7-box-multiple::before {
  content: "\F0F15"; }

.mdi-numeric-7-box-multiple-outline::before {
  content: "\F03B7"; }

.mdi-numeric-7-box-outline::before {
  content: "\F03B8"; }

.mdi-numeric-7-circle::before {
  content: "\F0CAC"; }

.mdi-numeric-7-circle-outline::before {
  content: "\F0CAD"; }

.mdi-numeric-8::before {
  content: "\F0B41"; }

.mdi-numeric-8-box::before {
  content: "\F03B9"; }

.mdi-numeric-8-box-multiple::before {
  content: "\F0F16"; }

.mdi-numeric-8-box-multiple-outline::before {
  content: "\F03BA"; }

.mdi-numeric-8-box-outline::before {
  content: "\F03BB"; }

.mdi-numeric-8-circle::before {
  content: "\F0CAE"; }

.mdi-numeric-8-circle-outline::before {
  content: "\F0CAF"; }

.mdi-numeric-9::before {
  content: "\F0B42"; }

.mdi-numeric-9-box::before {
  content: "\F03BC"; }

.mdi-numeric-9-box-multiple::before {
  content: "\F0F17"; }

.mdi-numeric-9-box-multiple-outline::before {
  content: "\F03BD"; }

.mdi-numeric-9-box-outline::before {
  content: "\F03BE"; }

.mdi-numeric-9-circle::before {
  content: "\F0CB0"; }

.mdi-numeric-9-circle-outline::before {
  content: "\F0CB1"; }

.mdi-numeric-9-plus::before {
  content: "\F0FEE"; }

.mdi-numeric-9-plus-box::before {
  content: "\F03BF"; }

.mdi-numeric-9-plus-box-multiple::before {
  content: "\F0F18"; }

.mdi-numeric-9-plus-box-multiple-outline::before {
  content: "\F03C0"; }

.mdi-numeric-9-plus-box-outline::before {
  content: "\F03C1"; }

.mdi-numeric-9-plus-circle::before {
  content: "\F0CB2"; }

.mdi-numeric-9-plus-circle-outline::before {
  content: "\F0CB3"; }

.mdi-numeric-negative-1::before {
  content: "\F1052"; }

.mdi-nut::before {
  content: "\F06F8"; }

.mdi-nutrition::before {
  content: "\F03C2"; }

.mdi-nuxt::before {
  content: "\F1106"; }

.mdi-oar::before {
  content: "\F067C"; }

.mdi-ocarina::before {
  content: "\F0DE0"; }

.mdi-oci::before {
  content: "\F12E9"; }

.mdi-ocr::before {
  content: "\F113A"; }

.mdi-octagon::before {
  content: "\F03C3"; }

.mdi-octagon-outline::before {
  content: "\F03C4"; }

.mdi-octagram::before {
  content: "\F06F9"; }

.mdi-octagram-outline::before {
  content: "\F0775"; }

.mdi-odnoklassniki::before {
  content: "\F03C5"; }

.mdi-offer::before {
  content: "\F121B"; }

.mdi-office-building::before {
  content: "\F0991"; }

.mdi-oil::before {
  content: "\F03C7"; }

.mdi-oil-lamp::before {
  content: "\F0F19"; }

.mdi-oil-level::before {
  content: "\F1053"; }

.mdi-oil-temperature::before {
  content: "\F0FF8"; }

.mdi-omega::before {
  content: "\F03C9"; }

.mdi-one-up::before {
  content: "\F0BAD"; }

.mdi-onepassword::before {
  content: "\F0881"; }

.mdi-opacity::before {
  content: "\F05CC"; }

.mdi-open-in-app::before {
  content: "\F03CB"; }

.mdi-open-in-new::before {
  content: "\F03CC"; }

.mdi-open-source-initiative::before {
  content: "\F0BAE"; }

.mdi-openid::before {
  content: "\F03CD"; }

.mdi-opera::before {
  content: "\F03CE"; }

.mdi-orbit::before {
  content: "\F0018"; }

.mdi-order-alphabetical-ascending::before {
  content: "\F020D"; }

.mdi-order-alphabetical-descending::before {
  content: "\F0D07"; }

.mdi-order-bool-ascending::before {
  content: "\F02BE"; }

.mdi-order-bool-ascending-variant::before {
  content: "\F098F"; }

.mdi-order-bool-descending::before {
  content: "\F1384"; }

.mdi-order-bool-descending-variant::before {
  content: "\F0990"; }

.mdi-order-numeric-ascending::before {
  content: "\F0545"; }

.mdi-order-numeric-descending::before {
  content: "\F0546"; }

.mdi-origin::before {
  content: "\F0B43"; }

.mdi-ornament::before {
  content: "\F03CF"; }

.mdi-ornament-variant::before {
  content: "\F03D0"; }

.mdi-outdoor-lamp::before {
  content: "\F1054"; }

.mdi-overscan::before {
  content: "\F1005"; }

.mdi-owl::before {
  content: "\F03D2"; }

.mdi-pac-man::before {
  content: "\F0BAF"; }

.mdi-package::before {
  content: "\F03D3"; }

.mdi-package-down::before {
  content: "\F03D4"; }

.mdi-package-up::before {
  content: "\F03D5"; }

.mdi-package-variant::before {
  content: "\F03D6"; }

.mdi-package-variant-closed::before {
  content: "\F03D7"; }

.mdi-page-first::before {
  content: "\F0600"; }

.mdi-page-last::before {
  content: "\F0601"; }

.mdi-page-layout-body::before {
  content: "\F06FA"; }

.mdi-page-layout-footer::before {
  content: "\F06FB"; }

.mdi-page-layout-header::before {
  content: "\F06FC"; }

.mdi-page-layout-header-footer::before {
  content: "\F0F7F"; }

.mdi-page-layout-sidebar-left::before {
  content: "\F06FD"; }

.mdi-page-layout-sidebar-right::before {
  content: "\F06FE"; }

.mdi-page-next::before {
  content: "\F0BB0"; }

.mdi-page-next-outline::before {
  content: "\F0BB1"; }

.mdi-page-previous::before {
  content: "\F0BB2"; }

.mdi-page-previous-outline::before {
  content: "\F0BB3"; }

.mdi-palette::before {
  content: "\F03D8"; }

.mdi-palette-advanced::before {
  content: "\F03D9"; }

.mdi-palette-outline::before {
  content: "\F0E0C"; }

.mdi-palette-swatch::before {
  content: "\F08B5"; }

.mdi-palette-swatch-outline::before {
  content: "\F135C"; }

.mdi-palm-tree::before {
  content: "\F1055"; }

.mdi-pan::before {
  content: "\F0BB4"; }

.mdi-pan-bottom-left::before {
  content: "\F0BB5"; }

.mdi-pan-bottom-right::before {
  content: "\F0BB6"; }

.mdi-pan-down::before {
  content: "\F0BB7"; }

.mdi-pan-horizontal::before {
  content: "\F0BB8"; }

.mdi-pan-left::before {
  content: "\F0BB9"; }

.mdi-pan-right::before {
  content: "\F0BBA"; }

.mdi-pan-top-left::before {
  content: "\F0BBB"; }

.mdi-pan-top-right::before {
  content: "\F0BBC"; }

.mdi-pan-up::before {
  content: "\F0BBD"; }

.mdi-pan-vertical::before {
  content: "\F0BBE"; }

.mdi-panda::before {
  content: "\F03DA"; }

.mdi-pandora::before {
  content: "\F03DB"; }

.mdi-panorama::before {
  content: "\F03DC"; }

.mdi-panorama-fisheye::before {
  content: "\F03DD"; }

.mdi-panorama-horizontal::before {
  content: "\F03DE"; }

.mdi-panorama-vertical::before {
  content: "\F03DF"; }

.mdi-panorama-wide-angle::before {
  content: "\F03E0"; }

.mdi-paper-cut-vertical::before {
  content: "\F03E1"; }

.mdi-paper-roll::before {
  content: "\F1157"; }

.mdi-paper-roll-outline::before {
  content: "\F1158"; }

.mdi-paperclip::before {
  content: "\F03E2"; }

.mdi-parachute::before {
  content: "\F0CB4"; }

.mdi-parachute-outline::before {
  content: "\F0CB5"; }

.mdi-parking::before {
  content: "\F03E3"; }

.mdi-party-popper::before {
  content: "\F1056"; }

.mdi-passport::before {
  content: "\F07E3"; }

.mdi-passport-biometric::before {
  content: "\F0DE1"; }

.mdi-pasta::before {
  content: "\F1160"; }

.mdi-patio-heater::before {
  content: "\F0F80"; }

.mdi-patreon::before {
  content: "\F0882"; }

.mdi-pause::before {
  content: "\F03E4"; }

.mdi-pause-circle::before {
  content: "\F03E5"; }

.mdi-pause-circle-outline::before {
  content: "\F03E6"; }

.mdi-pause-octagon::before {
  content: "\F03E7"; }

.mdi-pause-octagon-outline::before {
  content: "\F03E8"; }

.mdi-paw::before {
  content: "\F03E9"; }

.mdi-paw-off::before {
  content: "\F0657"; }

.mdi-pdf-box::before {
  content: "\F0E56"; }

.mdi-peace::before {
  content: "\F0884"; }

.mdi-peanut::before {
  content: "\F0FFC"; }

.mdi-peanut-off::before {
  content: "\F0FFD"; }

.mdi-peanut-off-outline::before {
  content: "\F0FFF"; }

.mdi-peanut-outline::before {
  content: "\F0FFE"; }

.mdi-pen::before {
  content: "\F03EA"; }

.mdi-pen-lock::before {
  content: "\F0DE2"; }

.mdi-pen-minus::before {
  content: "\F0DE3"; }

.mdi-pen-off::before {
  content: "\F0DE4"; }

.mdi-pen-plus::before {
  content: "\F0DE5"; }

.mdi-pen-remove::before {
  content: "\F0DE6"; }

.mdi-pencil::before {
  content: "\F03EB"; }

.mdi-pencil-box::before {
  content: "\F03EC"; }

.mdi-pencil-box-multiple::before {
  content: "\F1144"; }

.mdi-pencil-box-multiple-outline::before {
  content: "\F1145"; }

.mdi-pencil-box-outline::before {
  content: "\F03ED"; }

.mdi-pencil-circle::before {
  content: "\F06FF"; }

.mdi-pencil-circle-outline::before {
  content: "\F0776"; }

.mdi-pencil-lock::before {
  content: "\F03EE"; }

.mdi-pencil-lock-outline::before {
  content: "\F0DE7"; }

.mdi-pencil-minus::before {
  content: "\F0DE8"; }

.mdi-pencil-minus-outline::before {
  content: "\F0DE9"; }

.mdi-pencil-off::before {
  content: "\F03EF"; }

.mdi-pencil-off-outline::before {
  content: "\F0DEA"; }

.mdi-pencil-outline::before {
  content: "\F0CB6"; }

.mdi-pencil-plus::before {
  content: "\F0DEB"; }

.mdi-pencil-plus-outline::before {
  content: "\F0DEC"; }

.mdi-pencil-remove::before {
  content: "\F0DED"; }

.mdi-pencil-remove-outline::before {
  content: "\F0DEE"; }

.mdi-pencil-ruler::before {
  content: "\F1353"; }

.mdi-penguin::before {
  content: "\F0EC0"; }

.mdi-pentagon::before {
  content: "\F0701"; }

.mdi-pentagon-outline::before {
  content: "\F0700"; }

.mdi-percent::before {
  content: "\F03F0"; }

.mdi-percent-outline::before {
  content: "\F1278"; }

.mdi-periodic-table::before {
  content: "\F08B6"; }

.mdi-perspective-less::before {
  content: "\F0D23"; }

.mdi-perspective-more::before {
  content: "\F0D24"; }

.mdi-pharmacy::before {
  content: "\F03F1"; }

.mdi-phone::before {
  content: "\F03F2"; }

.mdi-phone-alert::before {
  content: "\F0F1A"; }

.mdi-phone-alert-outline::before {
  content: "\F118E"; }

.mdi-phone-bluetooth::before {
  content: "\F03F3"; }

.mdi-phone-bluetooth-outline::before {
  content: "\F118F"; }

.mdi-phone-cancel::before {
  content: "\F10BC"; }

.mdi-phone-cancel-outline::before {
  content: "\F1190"; }

.mdi-phone-check::before {
  content: "\F11A9"; }

.mdi-phone-check-outline::before {
  content: "\F11AA"; }

.mdi-phone-classic::before {
  content: "\F0602"; }

.mdi-phone-classic-off::before {
  content: "\F1279"; }

.mdi-phone-forward::before {
  content: "\F03F4"; }

.mdi-phone-forward-outline::before {
  content: "\F1191"; }

.mdi-phone-hangup::before {
  content: "\F03F5"; }

.mdi-phone-hangup-outline::before {
  content: "\F1192"; }

.mdi-phone-in-talk::before {
  content: "\F03F6"; }

.mdi-phone-in-talk-outline::before {
  content: "\F1182"; }

.mdi-phone-incoming::before {
  content: "\F03F7"; }

.mdi-phone-incoming-outline::before {
  content: "\F1193"; }

.mdi-phone-lock::before {
  content: "\F03F8"; }

.mdi-phone-lock-outline::before {
  content: "\F1194"; }

.mdi-phone-log::before {
  content: "\F03F9"; }

.mdi-phone-log-outline::before {
  content: "\F1195"; }

.mdi-phone-message::before {
  content: "\F1196"; }

.mdi-phone-message-outline::before {
  content: "\F1197"; }

.mdi-phone-minus::before {
  content: "\F0658"; }

.mdi-phone-minus-outline::before {
  content: "\F1198"; }

.mdi-phone-missed::before {
  content: "\F03FA"; }

.mdi-phone-missed-outline::before {
  content: "\F11A5"; }

.mdi-phone-off::before {
  content: "\F0DEF"; }

.mdi-phone-off-outline::before {
  content: "\F11A6"; }

.mdi-phone-outgoing::before {
  content: "\F03FB"; }

.mdi-phone-outgoing-outline::before {
  content: "\F1199"; }

.mdi-phone-outline::before {
  content: "\F0DF0"; }

.mdi-phone-paused::before {
  content: "\F03FC"; }

.mdi-phone-paused-outline::before {
  content: "\F119A"; }

.mdi-phone-plus::before {
  content: "\F0659"; }

.mdi-phone-plus-outline::before {
  content: "\F119B"; }

.mdi-phone-return::before {
  content: "\F082F"; }

.mdi-phone-return-outline::before {
  content: "\F119C"; }

.mdi-phone-ring::before {
  content: "\F11AB"; }

.mdi-phone-ring-outline::before {
  content: "\F11AC"; }

.mdi-phone-rotate-landscape::before {
  content: "\F0885"; }

.mdi-phone-rotate-portrait::before {
  content: "\F0886"; }

.mdi-phone-settings::before {
  content: "\F03FD"; }

.mdi-phone-settings-outline::before {
  content: "\F119D"; }

.mdi-phone-voip::before {
  content: "\F03FE"; }

.mdi-pi::before {
  content: "\F03FF"; }

.mdi-pi-box::before {
  content: "\F0400"; }

.mdi-pi-hole::before {
  content: "\F0DF1"; }

.mdi-piano::before {
  content: "\F067D"; }

.mdi-pickaxe::before {
  content: "\F08B7"; }

.mdi-picture-in-picture-bottom-right::before {
  content: "\F0E57"; }

.mdi-picture-in-picture-bottom-right-outline::before {
  content: "\F0E58"; }

.mdi-picture-in-picture-top-right::before {
  content: "\F0E59"; }

.mdi-picture-in-picture-top-right-outline::before {
  content: "\F0E5A"; }

.mdi-pier::before {
  content: "\F0887"; }

.mdi-pier-crane::before {
  content: "\F0888"; }

.mdi-pig::before {
  content: "\F0401"; }

.mdi-pig-variant::before {
  content: "\F1006"; }

.mdi-piggy-bank::before {
  content: "\F1007"; }

.mdi-pill::before {
  content: "\F0402"; }

.mdi-pillar::before {
  content: "\F0702"; }

.mdi-pin::before {
  content: "\F0403"; }

.mdi-pin-off::before {
  content: "\F0404"; }

.mdi-pin-off-outline::before {
  content: "\F0930"; }

.mdi-pin-outline::before {
  content: "\F0931"; }

.mdi-pine-tree::before {
  content: "\F0405"; }

.mdi-pine-tree-box::before {
  content: "\F0406"; }

.mdi-pinterest::before {
  content: "\F0407"; }

.mdi-pinwheel::before {
  content: "\F0AD5"; }

.mdi-pinwheel-outline::before {
  content: "\F0AD6"; }

.mdi-pipe::before {
  content: "\F07E5"; }

.mdi-pipe-disconnected::before {
  content: "\F07E6"; }

.mdi-pipe-leak::before {
  content: "\F0889"; }

.mdi-pipe-wrench::before {
  content: "\F1354"; }

.mdi-pirate::before {
  content: "\F0A08"; }

.mdi-pistol::before {
  content: "\F0703"; }

.mdi-piston::before {
  content: "\F088A"; }

.mdi-pizza::before {
  content: "\F0409"; }

.mdi-play::before {
  content: "\F040A"; }

.mdi-play-box::before {
  content: "\F127A"; }

.mdi-play-box-multiple::before {
  content: "\F0D19"; }

.mdi-play-box-outline::before {
  content: "\F040B"; }

.mdi-play-circle::before {
  content: "\F040C"; }

.mdi-play-circle-outline::before {
  content: "\F040D"; }

.mdi-play-network::before {
  content: "\F088B"; }

.mdi-play-network-outline::before {
  content: "\F0CB7"; }

.mdi-play-outline::before {
  content: "\F0F1B"; }

.mdi-play-pause::before {
  content: "\F040E"; }

.mdi-play-protected-content::before {
  content: "\F040F"; }

.mdi-play-speed::before {
  content: "\F08FF"; }

.mdi-playlist-check::before {
  content: "\F05C7"; }

.mdi-playlist-edit::before {
  content: "\F0900"; }

.mdi-playlist-minus::before {
  content: "\F0410"; }

.mdi-playlist-music::before {
  content: "\F0CB8"; }

.mdi-playlist-music-outline::before {
  content: "\F0CB9"; }

.mdi-playlist-play::before {
  content: "\F0411"; }

.mdi-playlist-plus::before {
  content: "\F0412"; }

.mdi-playlist-remove::before {
  content: "\F0413"; }

.mdi-playlist-star::before {
  content: "\F0DF2"; }

.mdi-plex::before {
  content: "\F06BA"; }

.mdi-plus::before {
  content: "\F0415"; }

.mdi-plus-box::before {
  content: "\F0416"; }

.mdi-plus-box-multiple::before {
  content: "\F0334"; }

.mdi-plus-box-multiple-outline::before {
  content: "\F1143"; }

.mdi-plus-box-outline::before {
  content: "\F0704"; }

.mdi-plus-circle::before {
  content: "\F0417"; }

.mdi-plus-circle-multiple::before {
  content: "\F034C"; }

.mdi-plus-circle-multiple-outline::before {
  content: "\F0418"; }

.mdi-plus-circle-outline::before {
  content: "\F0419"; }

.mdi-plus-minus::before {
  content: "\F0992"; }

.mdi-plus-minus-box::before {
  content: "\F0993"; }

.mdi-plus-network::before {
  content: "\F041A"; }

.mdi-plus-network-outline::before {
  content: "\F0CBA"; }

.mdi-plus-one::before {
  content: "\F041B"; }

.mdi-plus-outline::before {
  content: "\F0705"; }

.mdi-plus-thick::before {
  content: "\F11EC"; }

.mdi-podcast::before {
  content: "\F0994"; }

.mdi-podium::before {
  content: "\F0D25"; }

.mdi-podium-bronze::before {
  content: "\F0D26"; }

.mdi-podium-gold::before {
  content: "\F0D27"; }

.mdi-podium-silver::before {
  content: "\F0D28"; }

.mdi-point-of-sale::before {
  content: "\F0D92"; }

.mdi-pokeball::before {
  content: "\F041D"; }

.mdi-pokemon-go::before {
  content: "\F0A09"; }

.mdi-poker-chip::before {
  content: "\F0830"; }

.mdi-polaroid::before {
  content: "\F041E"; }

.mdi-police-badge::before {
  content: "\F1167"; }

.mdi-police-badge-outline::before {
  content: "\F1168"; }

.mdi-poll::before {
  content: "\F041F"; }

.mdi-poll-box::before {
  content: "\F0420"; }

.mdi-poll-box-outline::before {
  content: "\F127B"; }

.mdi-polymer::before {
  content: "\F0421"; }

.mdi-pool::before {
  content: "\F0606"; }

.mdi-popcorn::before {
  content: "\F0422"; }

.mdi-post::before {
  content: "\F1008"; }

.mdi-post-outline::before {
  content: "\F1009"; }

.mdi-postage-stamp::before {
  content: "\F0CBB"; }

.mdi-pot::before {
  content: "\F02E5"; }

.mdi-pot-mix::before {
  content: "\F065B"; }

.mdi-pot-mix-outline::before {
  content: "\F0677"; }

.mdi-pot-outline::before {
  content: "\F02FF"; }

.mdi-pot-steam::before {
  content: "\F065A"; }

.mdi-pot-steam-outline::before {
  content: "\F0326"; }

.mdi-pound::before {
  content: "\F0423"; }

.mdi-pound-box::before {
  content: "\F0424"; }

.mdi-pound-box-outline::before {
  content: "\F117F"; }

.mdi-power::before {
  content: "\F0425"; }

.mdi-power-cycle::before {
  content: "\F0901"; }

.mdi-power-off::before {
  content: "\F0902"; }

.mdi-power-on::before {
  content: "\F0903"; }

.mdi-power-plug::before {
  content: "\F06A5"; }

.mdi-power-plug-off::before {
  content: "\F06A6"; }

.mdi-power-settings::before {
  content: "\F0426"; }

.mdi-power-sleep::before {
  content: "\F0904"; }

.mdi-power-socket::before {
  content: "\F0427"; }

.mdi-power-socket-au::before {
  content: "\F0905"; }

.mdi-power-socket-de::before {
  content: "\F1107"; }

.mdi-power-socket-eu::before {
  content: "\F07E7"; }

.mdi-power-socket-fr::before {
  content: "\F1108"; }

.mdi-power-socket-jp::before {
  content: "\F1109"; }

.mdi-power-socket-uk::before {
  content: "\F07E8"; }

.mdi-power-socket-us::before {
  content: "\F07E9"; }

.mdi-power-standby::before {
  content: "\F0906"; }

.mdi-powershell::before {
  content: "\F0A0A"; }

.mdi-prescription::before {
  content: "\F0706"; }

.mdi-presentation::before {
  content: "\F0428"; }

.mdi-presentation-play::before {
  content: "\F0429"; }

.mdi-printer::before {
  content: "\F042A"; }

.mdi-printer-3d::before {
  content: "\F042B"; }

.mdi-printer-3d-nozzle::before {
  content: "\F0E5B"; }

.mdi-printer-3d-nozzle-alert::before {
  content: "\F11C0"; }

.mdi-printer-3d-nozzle-alert-outline::before {
  content: "\F11C1"; }

.mdi-printer-3d-nozzle-outline::before {
  content: "\F0E5C"; }

.mdi-printer-alert::before {
  content: "\F042C"; }

.mdi-printer-check::before {
  content: "\F1146"; }

.mdi-printer-off::before {
  content: "\F0E5D"; }

.mdi-printer-pos::before {
  content: "\F1057"; }

.mdi-printer-settings::before {
  content: "\F0707"; }

.mdi-printer-wireless::before {
  content: "\F0A0B"; }

.mdi-priority-high::before {
  content: "\F0603"; }

.mdi-priority-low::before {
  content: "\F0604"; }

.mdi-professional-hexagon::before {
  content: "\F042D"; }

.mdi-progress-alert::before {
  content: "\F0CBC"; }

.mdi-progress-check::before {
  content: "\F0995"; }

.mdi-progress-clock::before {
  content: "\F0996"; }

.mdi-progress-close::before {
  content: "\F110A"; }

.mdi-progress-download::before {
  content: "\F0997"; }

.mdi-progress-upload::before {
  content: "\F0998"; }

.mdi-progress-wrench::before {
  content: "\F0CBD"; }

.mdi-projector::before {
  content: "\F042E"; }

.mdi-projector-screen::before {
  content: "\F042F"; }

.mdi-propane-tank::before {
  content: "\F1357"; }

.mdi-propane-tank-outline::before {
  content: "\F1358"; }

.mdi-protocol::before {
  content: "\F0FD8"; }

.mdi-publish::before {
  content: "\F06A7"; }

.mdi-pulse::before {
  content: "\F0430"; }

.mdi-pumpkin::before {
  content: "\F0BBF"; }

.mdi-purse::before {
  content: "\F0F1C"; }

.mdi-purse-outline::before {
  content: "\F0F1D"; }

.mdi-puzzle::before {
  content: "\F0431"; }

.mdi-puzzle-outline::before {
  content: "\F0A66"; }

.mdi-qi::before {
  content: "\F0999"; }

.mdi-qqchat::before {
  content: "\F0605"; }

.mdi-qrcode::before {
  content: "\F0432"; }

.mdi-qrcode-edit::before {
  content: "\F08B8"; }

.mdi-qrcode-minus::before {
  content: "\F118C"; }

.mdi-qrcode-plus::before {
  content: "\F118B"; }

.mdi-qrcode-remove::before {
  content: "\F118D"; }

.mdi-qrcode-scan::before {
  content: "\F0433"; }

.mdi-quadcopter::before {
  content: "\F0434"; }

.mdi-quality-high::before {
  content: "\F0435"; }

.mdi-quality-low::before {
  content: "\F0A0C"; }

.mdi-quality-medium::before {
  content: "\F0A0D"; }

.mdi-quora::before {
  content: "\F0D29"; }

.mdi-rabbit::before {
  content: "\F0907"; }

.mdi-racing-helmet::before {
  content: "\F0D93"; }

.mdi-racquetball::before {
  content: "\F0D94"; }

.mdi-radar::before {
  content: "\F0437"; }

.mdi-radiator::before {
  content: "\F0438"; }

.mdi-radiator-disabled::before {
  content: "\F0AD7"; }

.mdi-radiator-off::before {
  content: "\F0AD8"; }

.mdi-radio::before {
  content: "\F0439"; }

.mdi-radio-am::before {
  content: "\F0CBE"; }

.mdi-radio-fm::before {
  content: "\F0CBF"; }

.mdi-radio-handheld::before {
  content: "\F043A"; }

.mdi-radio-off::before {
  content: "\F121C"; }

.mdi-radio-tower::before {
  content: "\F043B"; }

.mdi-radioactive::before {
  content: "\F043C"; }

.mdi-radioactive-off::before {
  content: "\F0EC1"; }

.mdi-radiobox-blank::before {
  content: "\F043D"; }

.mdi-radiobox-marked::before {
  content: "\F043E"; }

.mdi-radius::before {
  content: "\F0CC0"; }

.mdi-radius-outline::before {
  content: "\F0CC1"; }

.mdi-railroad-light::before {
  content: "\F0F1E"; }

.mdi-raspberry-pi::before {
  content: "\F043F"; }

.mdi-ray-end::before {
  content: "\F0440"; }

.mdi-ray-end-arrow::before {
  content: "\F0441"; }

.mdi-ray-start::before {
  content: "\F0442"; }

.mdi-ray-start-arrow::before {
  content: "\F0443"; }

.mdi-ray-start-end::before {
  content: "\F0444"; }

.mdi-ray-vertex::before {
  content: "\F0445"; }

.mdi-react::before {
  content: "\F0708"; }

.mdi-read::before {
  content: "\F0447"; }

.mdi-receipt::before {
  content: "\F0449"; }

.mdi-record::before {
  content: "\F044A"; }

.mdi-record-circle::before {
  content: "\F0EC2"; }

.mdi-record-circle-outline::before {
  content: "\F0EC3"; }

.mdi-record-player::before {
  content: "\F099A"; }

.mdi-record-rec::before {
  content: "\F044B"; }

.mdi-rectangle::before {
  content: "\F0E5E"; }

.mdi-rectangle-outline::before {
  content: "\F0E5F"; }

.mdi-recycle::before {
  content: "\F044C"; }

.mdi-recycle-variant::before {
  content: "\F139D"; }

.mdi-reddit::before {
  content: "\F044D"; }

.mdi-redhat::before {
  content: "\F111B"; }

.mdi-redo::before {
  content: "\F044E"; }

.mdi-redo-variant::before {
  content: "\F044F"; }

.mdi-reflect-horizontal::before {
  content: "\F0A0E"; }

.mdi-reflect-vertical::before {
  content: "\F0A0F"; }

.mdi-refresh::before {
  content: "\F0450"; }

.mdi-refresh-circle::before {
  content: "\F1377"; }

.mdi-regex::before {
  content: "\F0451"; }

.mdi-registered-trademark::before {
  content: "\F0A67"; }

.mdi-relative-scale::before {
  content: "\F0452"; }

.mdi-reload::before {
  content: "\F0453"; }

.mdi-reload-alert::before {
  content: "\F110B"; }

.mdi-reminder::before {
  content: "\F088C"; }

.mdi-remote::before {
  content: "\F0454"; }

.mdi-remote-desktop::before {
  content: "\F08B9"; }

.mdi-remote-off::before {
  content: "\F0EC4"; }

.mdi-remote-tv::before {
  content: "\F0EC5"; }

.mdi-remote-tv-off::before {
  content: "\F0EC6"; }

.mdi-rename-box::before {
  content: "\F0455"; }

.mdi-reorder-horizontal::before {
  content: "\F0688"; }

.mdi-reorder-vertical::before {
  content: "\F0689"; }

.mdi-repeat::before {
  content: "\F0456"; }

.mdi-repeat-off::before {
  content: "\F0457"; }

.mdi-repeat-once::before {
  content: "\F0458"; }

.mdi-replay::before {
  content: "\F0459"; }

.mdi-reply::before {
  content: "\F045A"; }

.mdi-reply-all::before {
  content: "\F045B"; }

.mdi-reply-all-outline::before {
  content: "\F0F1F"; }

.mdi-reply-circle::before {
  content: "\F11AE"; }

.mdi-reply-outline::before {
  content: "\F0F20"; }

.mdi-reproduction::before {
  content: "\F045C"; }

.mdi-resistor::before {
  content: "\F0B44"; }

.mdi-resistor-nodes::before {
  content: "\F0B45"; }

.mdi-resize::before {
  content: "\F0A68"; }

.mdi-resize-bottom-right::before {
  content: "\F045D"; }

.mdi-responsive::before {
  content: "\F045E"; }

.mdi-restart::before {
  content: "\F0709"; }

.mdi-restart-alert::before {
  content: "\F110C"; }

.mdi-restart-off::before {
  content: "\F0D95"; }

.mdi-restore::before {
  content: "\F099B"; }

.mdi-restore-alert::before {
  content: "\F110D"; }

.mdi-rewind::before {
  content: "\F045F"; }

.mdi-rewind-10::before {
  content: "\F0D2A"; }

.mdi-rewind-30::before {
  content: "\F0D96"; }

.mdi-rewind-5::before {
  content: "\F11F9"; }

.mdi-rewind-outline::before {
  content: "\F070A"; }

.mdi-rhombus::before {
  content: "\F070B"; }

.mdi-rhombus-medium::before {
  content: "\F0A10"; }

.mdi-rhombus-outline::before {
  content: "\F070C"; }

.mdi-rhombus-split::before {
  content: "\F0A11"; }

.mdi-ribbon::before {
  content: "\F0460"; }

.mdi-rice::before {
  content: "\F07EA"; }

.mdi-ring::before {
  content: "\F07EB"; }

.mdi-rivet::before {
  content: "\F0E60"; }

.mdi-road::before {
  content: "\F0461"; }

.mdi-road-variant::before {
  content: "\F0462"; }

.mdi-robber::before {
  content: "\F1058"; }

.mdi-robot::before {
  content: "\F06A9"; }

.mdi-robot-industrial::before {
  content: "\F0B46"; }

.mdi-robot-mower::before {
  content: "\F11F7"; }

.mdi-robot-mower-outline::before {
  content: "\F11F3"; }

.mdi-robot-vacuum::before {
  content: "\F070D"; }

.mdi-robot-vacuum-variant::before {
  content: "\F0908"; }

.mdi-rocket::before {
  content: "\F0463"; }

.mdi-rocket-outline::before {
  content: "\F13AF"; }

.mdi-rodent::before {
  content: "\F1327"; }

.mdi-roller-skate::before {
  content: "\F0D2B"; }

.mdi-roller-skate-off::before {
  content: "\F0145"; }

.mdi-rollerblade::before {
  content: "\F0D2C"; }

.mdi-rollerblade-off::before {
  content: "\F002E"; }

.mdi-rollupjs::before {
  content: "\F0BC0"; }

.mdi-roman-numeral-1::before {
  content: "\F1088"; }

.mdi-roman-numeral-10::before {
  content: "\F1091"; }

.mdi-roman-numeral-2::before {
  content: "\F1089"; }

.mdi-roman-numeral-3::before {
  content: "\F108A"; }

.mdi-roman-numeral-4::before {
  content: "\F108B"; }

.mdi-roman-numeral-5::before {
  content: "\F108C"; }

.mdi-roman-numeral-6::before {
  content: "\F108D"; }

.mdi-roman-numeral-7::before {
  content: "\F108E"; }

.mdi-roman-numeral-8::before {
  content: "\F108F"; }

.mdi-roman-numeral-9::before {
  content: "\F1090"; }

.mdi-room-service::before {
  content: "\F088D"; }

.mdi-room-service-outline::before {
  content: "\F0D97"; }

.mdi-rotate-3d::before {
  content: "\F0EC7"; }

.mdi-rotate-3d-variant::before {
  content: "\F0464"; }

.mdi-rotate-left::before {
  content: "\F0465"; }

.mdi-rotate-left-variant::before {
  content: "\F0466"; }

.mdi-rotate-orbit::before {
  content: "\F0D98"; }

.mdi-rotate-right::before {
  content: "\F0467"; }

.mdi-rotate-right-variant::before {
  content: "\F0468"; }

.mdi-rounded-corner::before {
  content: "\F0607"; }

.mdi-router::before {
  content: "\F11E2"; }

.mdi-router-network::before {
  content: "\F1087"; }

.mdi-router-wireless::before {
  content: "\F0469"; }

.mdi-router-wireless-settings::before {
  content: "\F0A69"; }

.mdi-routes::before {
  content: "\F046A"; }

.mdi-routes-clock::before {
  content: "\F1059"; }

.mdi-rowing::before {
  content: "\F0608"; }

.mdi-rss::before {
  content: "\F046B"; }

.mdi-rss-box::before {
  content: "\F046C"; }

.mdi-rss-off::before {
  content: "\F0F21"; }

.mdi-rugby::before {
  content: "\F0D99"; }

.mdi-ruler::before {
  content: "\F046D"; }

.mdi-ruler-square::before {
  content: "\F0CC2"; }

.mdi-ruler-square-compass::before {
  content: "\F0EBE"; }

.mdi-run::before {
  content: "\F070E"; }

.mdi-run-fast::before {
  content: "\F046E"; }

.mdi-rv-truck::before {
  content: "\F11D4"; }

.mdi-sack::before {
  content: "\F0D2E"; }

.mdi-sack-percent::before {
  content: "\F0D2F"; }

.mdi-safe::before {
  content: "\F0A6A"; }

.mdi-safe-square::before {
  content: "\F127C"; }

.mdi-safe-square-outline::before {
  content: "\F127D"; }

.mdi-safety-goggles::before {
  content: "\F0D30"; }

.mdi-sail-boat::before {
  content: "\F0EC8"; }

.mdi-sale::before {
  content: "\F046F"; }

.mdi-salesforce::before {
  content: "\F088E"; }

.mdi-sass::before {
  content: "\F07EC"; }

.mdi-satellite::before {
  content: "\F0470"; }

.mdi-satellite-uplink::before {
  content: "\F0909"; }

.mdi-satellite-variant::before {
  content: "\F0471"; }

.mdi-sausage::before {
  content: "\F08BA"; }

.mdi-saw-blade::before {
  content: "\F0E61"; }

.mdi-saxophone::before {
  content: "\F0609"; }

.mdi-scale::before {
  content: "\F0472"; }

.mdi-scale-balance::before {
  content: "\F05D1"; }

.mdi-scale-bathroom::before {
  content: "\F0473"; }

.mdi-scale-off::before {
  content: "\F105A"; }

.mdi-scanner::before {
  content: "\F06AB"; }

.mdi-scanner-off::before {
  content: "\F090A"; }

.mdi-scatter-plot::before {
  content: "\F0EC9"; }

.mdi-scatter-plot-outline::before {
  content: "\F0ECA"; }

.mdi-school::before {
  content: "\F0474"; }

.mdi-school-outline::before {
  content: "\F1180"; }

.mdi-scissors-cutting::before {
  content: "\F0A6B"; }

.mdi-scooter::before {
  content: "\F11E9"; }

.mdi-scoreboard::before {
  content: "\F127E"; }

.mdi-scoreboard-outline::before {
  content: "\F127F"; }

.mdi-screen-rotation::before {
  content: "\F0475"; }

.mdi-screen-rotation-lock::before {
  content: "\F0478"; }

.mdi-screw-flat-top::before {
  content: "\F0DF3"; }

.mdi-screw-lag::before {
  content: "\F0DF4"; }

.mdi-screw-machine-flat-top::before {
  content: "\F0DF5"; }

.mdi-screw-machine-round-top::before {
  content: "\F0DF6"; }

.mdi-screw-round-top::before {
  content: "\F0DF7"; }

.mdi-screwdriver::before {
  content: "\F0476"; }

.mdi-script::before {
  content: "\F0BC1"; }

.mdi-script-outline::before {
  content: "\F0477"; }

.mdi-script-text::before {
  content: "\F0BC2"; }

.mdi-script-text-outline::before {
  content: "\F0BC3"; }

.mdi-sd::before {
  content: "\F0479"; }

.mdi-seal::before {
  content: "\F047A"; }

.mdi-seal-variant::before {
  content: "\F0FD9"; }

.mdi-search-web::before {
  content: "\F070F"; }

.mdi-seat::before {
  content: "\F0CC3"; }

.mdi-seat-flat::before {
  content: "\F047B"; }

.mdi-seat-flat-angled::before {
  content: "\F047C"; }

.mdi-seat-individual-suite::before {
  content: "\F047D"; }

.mdi-seat-legroom-extra::before {
  content: "\F047E"; }

.mdi-seat-legroom-normal::before {
  content: "\F047F"; }

.mdi-seat-legroom-reduced::before {
  content: "\F0480"; }

.mdi-seat-outline::before {
  content: "\F0CC4"; }

.mdi-seat-passenger::before {
  content: "\F1249"; }

.mdi-seat-recline-extra::before {
  content: "\F0481"; }

.mdi-seat-recline-normal::before {
  content: "\F0482"; }

.mdi-seatbelt::before {
  content: "\F0CC5"; }

.mdi-security::before {
  content: "\F0483"; }

.mdi-security-network::before {
  content: "\F0484"; }

.mdi-seed::before {
  content: "\F0E62"; }

.mdi-seed-outline::before {
  content: "\F0E63"; }

.mdi-segment::before {
  content: "\F0ECB"; }

.mdi-select::before {
  content: "\F0485"; }

.mdi-select-all::before {
  content: "\F0486"; }

.mdi-select-color::before {
  content: "\F0D31"; }

.mdi-select-compare::before {
  content: "\F0AD9"; }

.mdi-select-drag::before {
  content: "\F0A6C"; }

.mdi-select-group::before {
  content: "\F0F82"; }

.mdi-select-inverse::before {
  content: "\F0487"; }

.mdi-select-marker::before {
  content: "\F1280"; }

.mdi-select-multiple::before {
  content: "\F1281"; }

.mdi-select-multiple-marker::before {
  content: "\F1282"; }

.mdi-select-off::before {
  content: "\F0488"; }

.mdi-select-place::before {
  content: "\F0FDA"; }

.mdi-select-search::before {
  content: "\F1204"; }

.mdi-selection::before {
  content: "\F0489"; }

.mdi-selection-drag::before {
  content: "\F0A6D"; }

.mdi-selection-ellipse::before {
  content: "\F0D32"; }

.mdi-selection-ellipse-arrow-inside::before {
  content: "\F0F22"; }

.mdi-selection-marker::before {
  content: "\F1283"; }

.mdi-selection-multiple-marker::before {
  content: "\F1284"; }

.mdi-selection-mutliple::before {
  content: "\F1285"; }

.mdi-selection-off::before {
  content: "\F0777"; }

.mdi-selection-search::before {
  content: "\F1205"; }

.mdi-semantic-web::before {
  content: "\F1316"; }

.mdi-send::before {
  content: "\F048A"; }

.mdi-send-check::before {
  content: "\F1161"; }

.mdi-send-check-outline::before {
  content: "\F1162"; }

.mdi-send-circle::before {
  content: "\F0DF8"; }

.mdi-send-circle-outline::before {
  content: "\F0DF9"; }

.mdi-send-clock::before {
  content: "\F1163"; }

.mdi-send-clock-outline::before {
  content: "\F1164"; }

.mdi-send-lock::before {
  content: "\F07ED"; }

.mdi-send-lock-outline::before {
  content: "\F1166"; }

.mdi-send-outline::before {
  content: "\F1165"; }

.mdi-serial-port::before {
  content: "\F065C"; }

.mdi-server::before {
  content: "\F048B"; }

.mdi-server-minus::before {
  content: "\F048C"; }

.mdi-server-network::before {
  content: "\F048D"; }

.mdi-server-network-off::before {
  content: "\F048E"; }

.mdi-server-off::before {
  content: "\F048F"; }

.mdi-server-plus::before {
  content: "\F0490"; }

.mdi-server-remove::before {
  content: "\F0491"; }

.mdi-server-security::before {
  content: "\F0492"; }

.mdi-set-all::before {
  content: "\F0778"; }

.mdi-set-center::before {
  content: "\F0779"; }

.mdi-set-center-right::before {
  content: "\F077A"; }

.mdi-set-left::before {
  content: "\F077B"; }

.mdi-set-left-center::before {
  content: "\F077C"; }

.mdi-set-left-right::before {
  content: "\F077D"; }

.mdi-set-none::before {
  content: "\F077E"; }

.mdi-set-right::before {
  content: "\F077F"; }

.mdi-set-top-box::before {
  content: "\F099F"; }

.mdi-settings-helper::before {
  content: "\F0A6E"; }

.mdi-shaker::before {
  content: "\F110E"; }

.mdi-shaker-outline::before {
  content: "\F110F"; }

.mdi-shape::before {
  content: "\F0831"; }

.mdi-shape-circle-plus::before {
  content: "\F065D"; }

.mdi-shape-outline::before {
  content: "\F0832"; }

.mdi-shape-oval-plus::before {
  content: "\F11FA"; }

.mdi-shape-plus::before {
  content: "\F0495"; }

.mdi-shape-polygon-plus::before {
  content: "\F065E"; }

.mdi-shape-rectangle-plus::before {
  content: "\F065F"; }

.mdi-shape-square-plus::before {
  content: "\F0660"; }

.mdi-share::before {
  content: "\F0496"; }

.mdi-share-all::before {
  content: "\F11F4"; }

.mdi-share-all-outline::before {
  content: "\F11F5"; }

.mdi-share-circle::before {
  content: "\F11AD"; }

.mdi-share-off::before {
  content: "\F0F23"; }

.mdi-share-off-outline::before {
  content: "\F0F24"; }

.mdi-share-outline::before {
  content: "\F0932"; }

.mdi-share-variant::before {
  content: "\F0497"; }

.mdi-sheep::before {
  content: "\F0CC6"; }

.mdi-shield::before {
  content: "\F0498"; }

.mdi-shield-account::before {
  content: "\F088F"; }

.mdi-shield-account-outline::before {
  content: "\F0A12"; }

.mdi-shield-airplane::before {
  content: "\F06BB"; }

.mdi-shield-airplane-outline::before {
  content: "\F0CC7"; }

.mdi-shield-alert::before {
  content: "\F0ECC"; }

.mdi-shield-alert-outline::before {
  content: "\F0ECD"; }

.mdi-shield-car::before {
  content: "\F0F83"; }

.mdi-shield-check::before {
  content: "\F0565"; }

.mdi-shield-check-outline::before {
  content: "\F0CC8"; }

.mdi-shield-cross::before {
  content: "\F0CC9"; }

.mdi-shield-cross-outline::before {
  content: "\F0CCA"; }

.mdi-shield-edit::before {
  content: "\F11A0"; }

.mdi-shield-edit-outline::before {
  content: "\F11A1"; }

.mdi-shield-half::before {
  content: "\F1360"; }

.mdi-shield-half-full::before {
  content: "\F0780"; }

.mdi-shield-home::before {
  content: "\F068A"; }

.mdi-shield-home-outline::before {
  content: "\F0CCB"; }

.mdi-shield-key::before {
  content: "\F0BC4"; }

.mdi-shield-key-outline::before {
  content: "\F0BC5"; }

.mdi-shield-link-variant::before {
  content: "\F0D33"; }

.mdi-shield-link-variant-outline::before {
  content: "\F0D34"; }

.mdi-shield-lock::before {
  content: "\F099D"; }

.mdi-shield-lock-outline::before {
  content: "\F0CCC"; }

.mdi-shield-off::before {
  content: "\F099E"; }

.mdi-shield-off-outline::before {
  content: "\F099C"; }

.mdi-shield-outline::before {
  content: "\F0499"; }

.mdi-shield-plus::before {
  content: "\F0ADA"; }

.mdi-shield-plus-outline::before {
  content: "\F0ADB"; }

.mdi-shield-refresh::before {
  content: "\F00AA"; }

.mdi-shield-refresh-outline::before {
  content: "\F01E0"; }

.mdi-shield-remove::before {
  content: "\F0ADC"; }

.mdi-shield-remove-outline::before {
  content: "\F0ADD"; }

.mdi-shield-search::before {
  content: "\F0D9A"; }

.mdi-shield-star::before {
  content: "\F113B"; }

.mdi-shield-star-outline::before {
  content: "\F113C"; }

.mdi-shield-sun::before {
  content: "\F105D"; }

.mdi-shield-sun-outline::before {
  content: "\F105E"; }

.mdi-shield-sync::before {
  content: "\F11A2"; }

.mdi-shield-sync-outline::before {
  content: "\F11A3"; }

.mdi-ship-wheel::before {
  content: "\F0833"; }

.mdi-shoe-formal::before {
  content: "\F0B47"; }

.mdi-shoe-heel::before {
  content: "\F0B48"; }

.mdi-shoe-print::before {
  content: "\F0DFA"; }

.mdi-shopping::before {
  content: "\F049A"; }

.mdi-shopping-music::before {
  content: "\F049B"; }

.mdi-shopping-outline::before {
  content: "\F11D5"; }

.mdi-shopping-search::before {
  content: "\F0F84"; }

.mdi-shovel::before {
  content: "\F0710"; }

.mdi-shovel-off::before {
  content: "\F0711"; }

.mdi-shower::before {
  content: "\F09A0"; }

.mdi-shower-head::before {
  content: "\F09A1"; }

.mdi-shredder::before {
  content: "\F049C"; }

.mdi-shuffle::before {
  content: "\F049D"; }

.mdi-shuffle-disabled::before {
  content: "\F049E"; }

.mdi-shuffle-variant::before {
  content: "\F049F"; }

.mdi-shuriken::before {
  content: "\F137F"; }

.mdi-sigma::before {
  content: "\F04A0"; }

.mdi-sigma-lower::before {
  content: "\F062B"; }

.mdi-sign-caution::before {
  content: "\F04A1"; }

.mdi-sign-direction::before {
  content: "\F0781"; }

.mdi-sign-direction-minus::before {
  content: "\F1000"; }

.mdi-sign-direction-plus::before {
  content: "\F0FDC"; }

.mdi-sign-direction-remove::before {
  content: "\F0FDD"; }

.mdi-sign-real-estate::before {
  content: "\F1118"; }

.mdi-sign-text::before {
  content: "\F0782"; }

.mdi-signal::before {
  content: "\F04A2"; }

.mdi-signal-2g::before {
  content: "\F0712"; }

.mdi-signal-3g::before {
  content: "\F0713"; }

.mdi-signal-4g::before {
  content: "\F0714"; }

.mdi-signal-5g::before {
  content: "\F0A6F"; }

.mdi-signal-cellular-1::before {
  content: "\F08BC"; }

.mdi-signal-cellular-2::before {
  content: "\F08BD"; }

.mdi-signal-cellular-3::before {
  content: "\F08BE"; }

.mdi-signal-cellular-outline::before {
  content: "\F08BF"; }

.mdi-signal-distance-variant::before {
  content: "\F0E64"; }

.mdi-signal-hspa::before {
  content: "\F0715"; }

.mdi-signal-hspa-plus::before {
  content: "\F0716"; }

.mdi-signal-off::before {
  content: "\F0783"; }

.mdi-signal-variant::before {
  content: "\F060A"; }

.mdi-signature::before {
  content: "\F0DFB"; }

.mdi-signature-freehand::before {
  content: "\F0DFC"; }

.mdi-signature-image::before {
  content: "\F0DFD"; }

.mdi-signature-text::before {
  content: "\F0DFE"; }

.mdi-silo::before {
  content: "\F0B49"; }

.mdi-silverware::before {
  content: "\F04A3"; }

.mdi-silverware-clean::before {
  content: "\F0FDE"; }

.mdi-silverware-fork::before {
  content: "\F04A4"; }

.mdi-silverware-fork-knife::before {
  content: "\F0A70"; }

.mdi-silverware-spoon::before {
  content: "\F04A5"; }

.mdi-silverware-variant::before {
  content: "\F04A6"; }

.mdi-sim::before {
  content: "\F04A7"; }

.mdi-sim-alert::before {
  content: "\F04A8"; }

.mdi-sim-off::before {
  content: "\F04A9"; }

.mdi-simple-icons::before {
  content: "\F131D"; }

.mdi-sina-weibo::before {
  content: "\F0ADF"; }

.mdi-sitemap::before {
  content: "\F04AA"; }

.mdi-size-l::before {
  content: "\F13A6"; }

.mdi-size-m::before {
  content: "\F13A5"; }

.mdi-size-s::before {
  content: "\F13A4"; }

.mdi-size-xl::before {
  content: "\F13A7"; }

.mdi-size-xs::before {
  content: "\F13A3"; }

.mdi-size-xxl::before {
  content: "\F13A8"; }

.mdi-size-xxs::before {
  content: "\F13A2"; }

.mdi-size-xxxl::before {
  content: "\F13A9"; }

.mdi-skate::before {
  content: "\F0D35"; }

.mdi-skew-less::before {
  content: "\F0D36"; }

.mdi-skew-more::before {
  content: "\F0D37"; }

.mdi-ski::before {
  content: "\F1304"; }

.mdi-ski-cross-country::before {
  content: "\F1305"; }

.mdi-ski-water::before {
  content: "\F1306"; }

.mdi-skip-backward::before {
  content: "\F04AB"; }

.mdi-skip-backward-outline::before {
  content: "\F0F25"; }

.mdi-skip-forward::before {
  content: "\F04AC"; }

.mdi-skip-forward-outline::before {
  content: "\F0F26"; }

.mdi-skip-next::before {
  content: "\F04AD"; }

.mdi-skip-next-circle::before {
  content: "\F0661"; }

.mdi-skip-next-circle-outline::before {
  content: "\F0662"; }

.mdi-skip-next-outline::before {
  content: "\F0F27"; }

.mdi-skip-previous::before {
  content: "\F04AE"; }

.mdi-skip-previous-circle::before {
  content: "\F0663"; }

.mdi-skip-previous-circle-outline::before {
  content: "\F0664"; }

.mdi-skip-previous-outline::before {
  content: "\F0F28"; }

.mdi-skull::before {
  content: "\F068C"; }

.mdi-skull-crossbones::before {
  content: "\F0BC6"; }

.mdi-skull-crossbones-outline::before {
  content: "\F0BC7"; }

.mdi-skull-outline::before {
  content: "\F0BC8"; }

.mdi-skype::before {
  content: "\F04AF"; }

.mdi-skype-business::before {
  content: "\F04B0"; }

.mdi-slack::before {
  content: "\F04B1"; }

.mdi-slash-forward::before {
  content: "\F0FDF"; }

.mdi-slash-forward-box::before {
  content: "\F0FE0"; }

.mdi-sleep::before {
  content: "\F04B2"; }

.mdi-sleep-off::before {
  content: "\F04B3"; }

.mdi-slope-downhill::before {
  content: "\F0DFF"; }

.mdi-slope-uphill::before {
  content: "\F0E00"; }

.mdi-slot-machine::before {
  content: "\F1114"; }

.mdi-slot-machine-outline::before {
  content: "\F1115"; }

.mdi-smart-card::before {
  content: "\F10BD"; }

.mdi-smart-card-outline::before {
  content: "\F10BE"; }

.mdi-smart-card-reader::before {
  content: "\F10BF"; }

.mdi-smart-card-reader-outline::before {
  content: "\F10C0"; }

.mdi-smog::before {
  content: "\F0A71"; }

.mdi-smoke-detector::before {
  content: "\F0392"; }

.mdi-smoking::before {
  content: "\F04B4"; }

.mdi-smoking-off::before {
  content: "\F04B5"; }

.mdi-snapchat::before {
  content: "\F04B6"; }

.mdi-snowboard::before {
  content: "\F1307"; }

.mdi-snowflake::before {
  content: "\F0717"; }

.mdi-snowflake-alert::before {
  content: "\F0F29"; }

.mdi-snowflake-melt::before {
  content: "\F12CB"; }

.mdi-snowflake-variant::before {
  content: "\F0F2A"; }

.mdi-snowman::before {
  content: "\F04B7"; }

.mdi-soccer::before {
  content: "\F04B8"; }

.mdi-soccer-field::before {
  content: "\F0834"; }

.mdi-sofa::before {
  content: "\F04B9"; }

.mdi-solar-panel::before {
  content: "\F0D9B"; }

.mdi-solar-panel-large::before {
  content: "\F0D9C"; }

.mdi-solar-power::before {
  content: "\F0A72"; }

.mdi-soldering-iron::before {
  content: "\F1092"; }

.mdi-solid::before {
  content: "\F068D"; }

.mdi-sony-playstation::before {
  content: "\F0414"; }

.mdi-sort::before {
  content: "\F04BA"; }

.mdi-sort-alphabetical-ascending::before {
  content: "\F05BD"; }

.mdi-sort-alphabetical-ascending-variant::before {
  content: "\F1148"; }

.mdi-sort-alphabetical-descending::before {
  content: "\F05BF"; }

.mdi-sort-alphabetical-descending-variant::before {
  content: "\F1149"; }

.mdi-sort-alphabetical-variant::before {
  content: "\F04BB"; }

.mdi-sort-ascending::before {
  content: "\F04BC"; }

.mdi-sort-bool-ascending::before {
  content: "\F1385"; }

.mdi-sort-bool-ascending-variant::before {
  content: "\F1386"; }

.mdi-sort-bool-descending::before {
  content: "\F1387"; }

.mdi-sort-bool-descending-variant::before {
  content: "\F1388"; }

.mdi-sort-descending::before {
  content: "\F04BD"; }

.mdi-sort-numeric-ascending::before {
  content: "\F1389"; }

.mdi-sort-numeric-ascending-variant::before {
  content: "\F090D"; }

.mdi-sort-numeric-descending::before {
  content: "\F138A"; }

.mdi-sort-numeric-descending-variant::before {
  content: "\F0AD2"; }

.mdi-sort-numeric-variant::before {
  content: "\F04BE"; }

.mdi-sort-reverse-variant::before {
  content: "\F033C"; }

.mdi-sort-variant::before {
  content: "\F04BF"; }

.mdi-sort-variant-lock::before {
  content: "\F0CCD"; }

.mdi-sort-variant-lock-open::before {
  content: "\F0CCE"; }

.mdi-sort-variant-remove::before {
  content: "\F1147"; }

.mdi-soundcloud::before {
  content: "\F04C0"; }

.mdi-source-branch::before {
  content: "\F062C"; }

.mdi-source-commit::before {
  content: "\F0718"; }

.mdi-source-commit-end::before {
  content: "\F0719"; }

.mdi-source-commit-end-local::before {
  content: "\F071A"; }

.mdi-source-commit-local::before {
  content: "\F071B"; }

.mdi-source-commit-next-local::before {
  content: "\F071C"; }

.mdi-source-commit-start::before {
  content: "\F071D"; }

.mdi-source-commit-start-next-local::before {
  content: "\F071E"; }

.mdi-source-fork::before {
  content: "\F04C1"; }

.mdi-source-merge::before {
  content: "\F062D"; }

.mdi-source-pull::before {
  content: "\F04C2"; }

.mdi-source-repository::before {
  content: "\F0CCF"; }

.mdi-source-repository-multiple::before {
  content: "\F0CD0"; }

.mdi-soy-sauce::before {
  content: "\F07EE"; }

.mdi-spa::before {
  content: "\F0CD1"; }

.mdi-spa-outline::before {
  content: "\F0CD2"; }

.mdi-space-invaders::before {
  content: "\F0BC9"; }

.mdi-space-station::before {
  content: "\F1383"; }

.mdi-spade::before {
  content: "\F0E65"; }

.mdi-speaker::before {
  content: "\F04C3"; }

.mdi-speaker-bluetooth::before {
  content: "\F09A2"; }

.mdi-speaker-multiple::before {
  content: "\F0D38"; }

.mdi-speaker-off::before {
  content: "\F04C4"; }

.mdi-speaker-wireless::before {
  content: "\F071F"; }

.mdi-speedometer::before {
  content: "\F04C5"; }

.mdi-speedometer-medium::before {
  content: "\F0F85"; }

.mdi-speedometer-slow::before {
  content: "\F0F86"; }

.mdi-spellcheck::before {
  content: "\F04C6"; }

.mdi-spider::before {
  content: "\F11EA"; }

.mdi-spider-thread::before {
  content: "\F11EB"; }

.mdi-spider-web::before {
  content: "\F0BCA"; }

.mdi-spotify::before {
  content: "\F04C7"; }

.mdi-spotlight::before {
  content: "\F04C8"; }

.mdi-spotlight-beam::before {
  content: "\F04C9"; }

.mdi-spray::before {
  content: "\F0665"; }

.mdi-spray-bottle::before {
  content: "\F0AE0"; }

.mdi-sprinkler::before {
  content: "\F105F"; }

.mdi-sprinkler-variant::before {
  content: "\F1060"; }

.mdi-sprout::before {
  content: "\F0E66"; }

.mdi-sprout-outline::before {
  content: "\F0E67"; }

.mdi-square::before {
  content: "\F0764"; }

.mdi-square-edit-outline::before {
  content: "\F090C"; }

.mdi-square-medium::before {
  content: "\F0A13"; }

.mdi-square-medium-outline::before {
  content: "\F0A14"; }

.mdi-square-off::before {
  content: "\F12EE"; }

.mdi-square-off-outline::before {
  content: "\F12EF"; }

.mdi-square-outline::before {
  content: "\F0763"; }

.mdi-square-root::before {
  content: "\F0784"; }

.mdi-square-root-box::before {
  content: "\F09A3"; }

.mdi-square-small::before {
  content: "\F0A15"; }

.mdi-squeegee::before {
  content: "\F0AE1"; }

.mdi-ssh::before {
  content: "\F08C0"; }

.mdi-stack-exchange::before {
  content: "\F060B"; }

.mdi-stack-overflow::before {
  content: "\F04CC"; }

.mdi-stackpath::before {
  content: "\F0359"; }

.mdi-stadium::before {
  content: "\F0FF9"; }

.mdi-stadium-variant::before {
  content: "\F0720"; }

.mdi-stairs::before {
  content: "\F04CD"; }

.mdi-stairs-box::before {
  content: "\F139E"; }

.mdi-stairs-down::before {
  content: "\F12BE"; }

.mdi-stairs-up::before {
  content: "\F12BD"; }

.mdi-stamper::before {
  content: "\F0D39"; }

.mdi-standard-definition::before {
  content: "\F07EF"; }

.mdi-star::before {
  content: "\F04CE"; }

.mdi-star-box::before {
  content: "\F0A73"; }

.mdi-star-box-multiple::before {
  content: "\F1286"; }

.mdi-star-box-multiple-outline::before {
  content: "\F1287"; }

.mdi-star-box-outline::before {
  content: "\F0A74"; }

.mdi-star-circle::before {
  content: "\F04CF"; }

.mdi-star-circle-outline::before {
  content: "\F09A4"; }

.mdi-star-face::before {
  content: "\F09A5"; }

.mdi-star-four-points::before {
  content: "\F0AE2"; }

.mdi-star-four-points-outline::before {
  content: "\F0AE3"; }

.mdi-star-half::before {
  content: "\F0246"; }

.mdi-star-half-full::before {
  content: "\F04D0"; }

.mdi-star-off::before {
  content: "\F04D1"; }

.mdi-star-outline::before {
  content: "\F04D2"; }

.mdi-star-three-points::before {
  content: "\F0AE4"; }

.mdi-star-three-points-outline::before {
  content: "\F0AE5"; }

.mdi-state-machine::before {
  content: "\F11EF"; }

.mdi-steam::before {
  content: "\F04D3"; }

.mdi-steering::before {
  content: "\F04D4"; }

.mdi-steering-off::before {
  content: "\F090E"; }

.mdi-step-backward::before {
  content: "\F04D5"; }

.mdi-step-backward-2::before {
  content: "\F04D6"; }

.mdi-step-forward::before {
  content: "\F04D7"; }

.mdi-step-forward-2::before {
  content: "\F04D8"; }

.mdi-stethoscope::before {
  content: "\F04D9"; }

.mdi-sticker::before {
  content: "\F1364"; }

.mdi-sticker-alert::before {
  content: "\F1365"; }

.mdi-sticker-alert-outline::before {
  content: "\F1366"; }

.mdi-sticker-check::before {
  content: "\F1367"; }

.mdi-sticker-check-outline::before {
  content: "\F1368"; }

.mdi-sticker-circle-outline::before {
  content: "\F05D0"; }

.mdi-sticker-emoji::before {
  content: "\F0785"; }

.mdi-sticker-minus::before {
  content: "\F1369"; }

.mdi-sticker-minus-outline::before {
  content: "\F136A"; }

.mdi-sticker-outline::before {
  content: "\F136B"; }

.mdi-sticker-plus::before {
  content: "\F136C"; }

.mdi-sticker-plus-outline::before {
  content: "\F136D"; }

.mdi-sticker-remove::before {
  content: "\F136E"; }

.mdi-sticker-remove-outline::before {
  content: "\F136F"; }

.mdi-stocking::before {
  content: "\F04DA"; }

.mdi-stomach::before {
  content: "\F1093"; }

.mdi-stop::before {
  content: "\F04DB"; }

.mdi-stop-circle::before {
  content: "\F0666"; }

.mdi-stop-circle-outline::before {
  content: "\F0667"; }

.mdi-store::before {
  content: "\F04DC"; }

.mdi-store-24-hour::before {
  content: "\F04DD"; }

.mdi-store-outline::before {
  content: "\F1361"; }

.mdi-storefront::before {
  content: "\F07C7"; }

.mdi-storefront-outline::before {
  content: "\F10C1"; }

.mdi-stove::before {
  content: "\F04DE"; }

.mdi-strategy::before {
  content: "\F11D6"; }

.mdi-stretch-to-page::before {
  content: "\F0F2B"; }

.mdi-stretch-to-page-outline::before {
  content: "\F0F2C"; }

.mdi-string-lights::before {
  content: "\F12BA"; }

.mdi-string-lights-off::before {
  content: "\F12BB"; }

.mdi-subdirectory-arrow-left::before {
  content: "\F060C"; }

.mdi-subdirectory-arrow-right::before {
  content: "\F060D"; }

.mdi-subtitles::before {
  content: "\F0A16"; }

.mdi-subtitles-outline::before {
  content: "\F0A17"; }

.mdi-subway::before {
  content: "\F06AC"; }

.mdi-subway-alert-variant::before {
  content: "\F0D9D"; }

.mdi-subway-variant::before {
  content: "\F04DF"; }

.mdi-summit::before {
  content: "\F0786"; }

.mdi-sunglasses::before {
  content: "\F04E0"; }

.mdi-surround-sound::before {
  content: "\F05C5"; }

.mdi-surround-sound-2-0::before {
  content: "\F07F0"; }

.mdi-surround-sound-3-1::before {
  content: "\F07F1"; }

.mdi-surround-sound-5-1::before {
  content: "\F07F2"; }

.mdi-surround-sound-7-1::before {
  content: "\F07F3"; }

.mdi-svg::before {
  content: "\F0721"; }

.mdi-swap-horizontal::before {
  content: "\F04E1"; }

.mdi-swap-horizontal-bold::before {
  content: "\F0BCD"; }

.mdi-swap-horizontal-circle::before {
  content: "\F0FE1"; }

.mdi-swap-horizontal-circle-outline::before {
  content: "\F0FE2"; }

.mdi-swap-horizontal-variant::before {
  content: "\F08C1"; }

.mdi-swap-vertical::before {
  content: "\F04E2"; }

.mdi-swap-vertical-bold::before {
  content: "\F0BCE"; }

.mdi-swap-vertical-circle::before {
  content: "\F0FE3"; }

.mdi-swap-vertical-circle-outline::before {
  content: "\F0FE4"; }

.mdi-swap-vertical-variant::before {
  content: "\F08C2"; }

.mdi-swim::before {
  content: "\F04E3"; }

.mdi-switch::before {
  content: "\F04E4"; }

.mdi-sword::before {
  content: "\F04E5"; }

.mdi-sword-cross::before {
  content: "\F0787"; }

.mdi-syllabary-hangul::before {
  content: "\F1333"; }

.mdi-syllabary-hiragana::before {
  content: "\F1334"; }

.mdi-syllabary-katakana::before {
  content: "\F1335"; }

.mdi-syllabary-katakana-half-width::before {
  content: "\F1336"; }

.mdi-symfony::before {
  content: "\F0AE6"; }

.mdi-sync::before {
  content: "\F04E6"; }

.mdi-sync-alert::before {
  content: "\F04E7"; }

.mdi-sync-circle::before {
  content: "\F1378"; }

.mdi-sync-off::before {
  content: "\F04E8"; }

.mdi-tab::before {
  content: "\F04E9"; }

.mdi-tab-minus::before {
  content: "\F0B4B"; }

.mdi-tab-plus::before {
  content: "\F075C"; }

.mdi-tab-remove::before {
  content: "\F0B4C"; }

.mdi-tab-unselected::before {
  content: "\F04EA"; }

.mdi-table::before {
  content: "\F04EB"; }

.mdi-table-border::before {
  content: "\F0A18"; }

.mdi-table-chair::before {
  content: "\F1061"; }

.mdi-table-column::before {
  content: "\F0835"; }

.mdi-table-column-plus-after::before {
  content: "\F04EC"; }

.mdi-table-column-plus-before::before {
  content: "\F04ED"; }

.mdi-table-column-remove::before {
  content: "\F04EE"; }

.mdi-table-column-width::before {
  content: "\F04EF"; }

.mdi-table-edit::before {
  content: "\F04F0"; }

.mdi-table-eye::before {
  content: "\F1094"; }

.mdi-table-furniture::before {
  content: "\F05BC"; }

.mdi-table-headers-eye::before {
  content: "\F121D"; }

.mdi-table-headers-eye-off::before {
  content: "\F121E"; }

.mdi-table-large::before {
  content: "\F04F1"; }

.mdi-table-large-plus::before {
  content: "\F0F87"; }

.mdi-table-large-remove::before {
  content: "\F0F88"; }

.mdi-table-merge-cells::before {
  content: "\F09A6"; }

.mdi-table-of-contents::before {
  content: "\F0836"; }

.mdi-table-plus::before {
  content: "\F0A75"; }

.mdi-table-refresh::before {
  content: "\F13A0"; }

.mdi-table-remove::before {
  content: "\F0A76"; }

.mdi-table-row::before {
  content: "\F0837"; }

.mdi-table-row-height::before {
  content: "\F04F2"; }

.mdi-table-row-plus-after::before {
  content: "\F04F3"; }

.mdi-table-row-plus-before::before {
  content: "\F04F4"; }

.mdi-table-row-remove::before {
  content: "\F04F5"; }

.mdi-table-search::before {
  content: "\F090F"; }

.mdi-table-settings::before {
  content: "\F0838"; }

.mdi-table-sync::before {
  content: "\F13A1"; }

.mdi-table-tennis::before {
  content: "\F0E68"; }

.mdi-tablet::before {
  content: "\F04F6"; }

.mdi-tablet-android::before {
  content: "\F04F7"; }

.mdi-tablet-cellphone::before {
  content: "\F09A7"; }

.mdi-tablet-dashboard::before {
  content: "\F0ECE"; }

.mdi-tablet-ipad::before {
  content: "\F04F8"; }

.mdi-taco::before {
  content: "\F0762"; }

.mdi-tag::before {
  content: "\F04F9"; }

.mdi-tag-faces::before {
  content: "\F04FA"; }

.mdi-tag-heart::before {
  content: "\F068B"; }

.mdi-tag-heart-outline::before {
  content: "\F0BCF"; }

.mdi-tag-minus::before {
  content: "\F0910"; }

.mdi-tag-minus-outline::before {
  content: "\F121F"; }

.mdi-tag-multiple::before {
  content: "\F04FB"; }

.mdi-tag-multiple-outline::before {
  content: "\F12F7"; }

.mdi-tag-off::before {
  content: "\F1220"; }

.mdi-tag-off-outline::before {
  content: "\F1221"; }

.mdi-tag-outline::before {
  content: "\F04FC"; }

.mdi-tag-plus::before {
  content: "\F0722"; }

.mdi-tag-plus-outline::before {
  content: "\F1222"; }

.mdi-tag-remove::before {
  content: "\F0723"; }

.mdi-tag-remove-outline::before {
  content: "\F1223"; }

.mdi-tag-text::before {
  content: "\F1224"; }

.mdi-tag-text-outline::before {
  content: "\F04FD"; }

.mdi-tank::before {
  content: "\F0D3A"; }

.mdi-tanker-truck::before {
  content: "\F0FE5"; }

.mdi-tape-measure::before {
  content: "\F0B4D"; }

.mdi-target::before {
  content: "\F04FE"; }

.mdi-target-account::before {
  content: "\F0BD0"; }

.mdi-target-variant::before {
  content: "\F0A77"; }

.mdi-taxi::before {
  content: "\F04FF"; }

.mdi-tea::before {
  content: "\F0D9E"; }

.mdi-tea-outline::before {
  content: "\F0D9F"; }

.mdi-teach::before {
  content: "\F0890"; }

.mdi-teamviewer::before {
  content: "\F0500"; }

.mdi-telegram::before {
  content: "\F0501"; }

.mdi-telescope::before {
  content: "\F0B4E"; }

.mdi-television::before {
  content: "\F0502"; }

.mdi-television-ambient-light::before {
  content: "\F1356"; }

.mdi-television-box::before {
  content: "\F0839"; }

.mdi-television-classic::before {
  content: "\F07F4"; }

.mdi-television-classic-off::before {
  content: "\F083A"; }

.mdi-television-clean::before {
  content: "\F1110"; }

.mdi-television-guide::before {
  content: "\F0503"; }

.mdi-television-off::before {
  content: "\F083B"; }

.mdi-television-pause::before {
  content: "\F0F89"; }

.mdi-television-play::before {
  content: "\F0ECF"; }

.mdi-television-stop::before {
  content: "\F0F8A"; }

.mdi-temperature-celsius::before {
  content: "\F0504"; }

.mdi-temperature-fahrenheit::before {
  content: "\F0505"; }

.mdi-temperature-kelvin::before {
  content: "\F0506"; }

.mdi-tennis::before {
  content: "\F0DA0"; }

.mdi-tennis-ball::before {
  content: "\F0507"; }

.mdi-tent::before {
  content: "\F0508"; }

.mdi-terraform::before {
  content: "\F1062"; }

.mdi-terrain::before {
  content: "\F0509"; }

.mdi-test-tube::before {
  content: "\F0668"; }

.mdi-test-tube-empty::before {
  content: "\F0911"; }

.mdi-test-tube-off::before {
  content: "\F0912"; }

.mdi-text::before {
  content: "\F09A8"; }

.mdi-text-box::before {
  content: "\F021A"; }

.mdi-text-box-check::before {
  content: "\F0EA6"; }

.mdi-text-box-check-outline::before {
  content: "\F0EA7"; }

.mdi-text-box-minus::before {
  content: "\F0EA8"; }

.mdi-text-box-minus-outline::before {
  content: "\F0EA9"; }

.mdi-text-box-multiple::before {
  content: "\F0AB7"; }

.mdi-text-box-multiple-outline::before {
  content: "\F0AB8"; }

.mdi-text-box-outline::before {
  content: "\F09ED"; }

.mdi-text-box-plus::before {
  content: "\F0EAA"; }

.mdi-text-box-plus-outline::before {
  content: "\F0EAB"; }

.mdi-text-box-remove::before {
  content: "\F0EAC"; }

.mdi-text-box-remove-outline::before {
  content: "\F0EAD"; }

.mdi-text-box-search::before {
  content: "\F0EAE"; }

.mdi-text-box-search-outline::before {
  content: "\F0EAF"; }

.mdi-text-recognition::before {
  content: "\F113D"; }

.mdi-text-shadow::before {
  content: "\F0669"; }

.mdi-text-short::before {
  content: "\F09A9"; }

.mdi-text-subject::before {
  content: "\F09AA"; }

.mdi-text-to-speech::before {
  content: "\F050A"; }

.mdi-text-to-speech-off::before {
  content: "\F050B"; }

.mdi-textarea::before {
  content: "\F1095"; }

.mdi-textbox::before {
  content: "\F060E"; }

.mdi-textbox-lock::before {
  content: "\F135D"; }

.mdi-textbox-password::before {
  content: "\F07F5"; }

.mdi-texture::before {
  content: "\F050C"; }

.mdi-texture-box::before {
  content: "\F0FE6"; }

.mdi-theater::before {
  content: "\F050D"; }

.mdi-theme-light-dark::before {
  content: "\F050E"; }

.mdi-thermometer::before {
  content: "\F050F"; }

.mdi-thermometer-alert::before {
  content: "\F0E01"; }

.mdi-thermometer-chevron-down::before {
  content: "\F0E02"; }

.mdi-thermometer-chevron-up::before {
  content: "\F0E03"; }

.mdi-thermometer-high::before {
  content: "\F10C2"; }

.mdi-thermometer-lines::before {
  content: "\F0510"; }

.mdi-thermometer-low::before {
  content: "\F10C3"; }

.mdi-thermometer-minus::before {
  content: "\F0E04"; }

.mdi-thermometer-plus::before {
  content: "\F0E05"; }

.mdi-thermostat::before {
  content: "\F0393"; }

.mdi-thermostat-box::before {
  content: "\F0891"; }

.mdi-thought-bubble::before {
  content: "\F07F6"; }

.mdi-thought-bubble-outline::before {
  content: "\F07F7"; }

.mdi-thumb-down::before {
  content: "\F0511"; }

.mdi-thumb-down-outline::before {
  content: "\F0512"; }

.mdi-thumb-up::before {
  content: "\F0513"; }

.mdi-thumb-up-outline::before {
  content: "\F0514"; }

.mdi-thumbs-up-down::before {
  content: "\F0515"; }

.mdi-ticket::before {
  content: "\F0516"; }

.mdi-ticket-account::before {
  content: "\F0517"; }

.mdi-ticket-confirmation::before {
  content: "\F0518"; }

.mdi-ticket-confirmation-outline::before {
  content: "\F13AA"; }

.mdi-ticket-outline::before {
  content: "\F0913"; }

.mdi-ticket-percent::before {
  content: "\F0724"; }

.mdi-tie::before {
  content: "\F0519"; }

.mdi-tilde::before {
  content: "\F0725"; }

.mdi-timelapse::before {
  content: "\F051A"; }

.mdi-timeline::before {
  content: "\F0BD1"; }

.mdi-timeline-alert::before {
  content: "\F0F95"; }

.mdi-timeline-alert-outline::before {
  content: "\F0F98"; }

.mdi-timeline-clock::before {
  content: "\F11FB"; }

.mdi-timeline-clock-outline::before {
  content: "\F11FC"; }

.mdi-timeline-help::before {
  content: "\F0F99"; }

.mdi-timeline-help-outline::before {
  content: "\F0F9A"; }

.mdi-timeline-outline::before {
  content: "\F0BD2"; }

.mdi-timeline-plus::before {
  content: "\F0F96"; }

.mdi-timeline-plus-outline::before {
  content: "\F0F97"; }

.mdi-timeline-text::before {
  content: "\F0BD3"; }

.mdi-timeline-text-outline::before {
  content: "\F0BD4"; }

.mdi-timer::before {
  content: "\F13AB"; }

.mdi-timer-10::before {
  content: "\F051C"; }

.mdi-timer-3::before {
  content: "\F051D"; }

.mdi-timer-off::before {
  content: "\F13AC"; }

.mdi-timer-off-outline::before {
  content: "\F051E"; }

.mdi-timer-outline::before {
  content: "\F051B"; }

.mdi-timer-sand::before {
  content: "\F051F"; }

.mdi-timer-sand-empty::before {
  content: "\F06AD"; }

.mdi-timer-sand-full::before {
  content: "\F078C"; }

.mdi-timetable::before {
  content: "\F0520"; }

.mdi-toaster::before {
  content: "\F1063"; }

.mdi-toaster-off::before {
  content: "\F11B7"; }

.mdi-toaster-oven::before {
  content: "\F0CD3"; }

.mdi-toggle-switch::before {
  content: "\F0521"; }

.mdi-toggle-switch-off::before {
  content: "\F0522"; }

.mdi-toggle-switch-off-outline::before {
  content: "\F0A19"; }

.mdi-toggle-switch-outline::before {
  content: "\F0A1A"; }

.mdi-toilet::before {
  content: "\F09AB"; }

.mdi-toolbox::before {
  content: "\F09AC"; }

.mdi-toolbox-outline::before {
  content: "\F09AD"; }

.mdi-tools::before {
  content: "\F1064"; }

.mdi-tooltip::before {
  content: "\F0523"; }

.mdi-tooltip-account::before {
  content: "\F000C"; }

.mdi-tooltip-edit::before {
  content: "\F0524"; }

.mdi-tooltip-edit-outline::before {
  content: "\F12C5"; }

.mdi-tooltip-image::before {
  content: "\F0525"; }

.mdi-tooltip-image-outline::before {
  content: "\F0BD5"; }

.mdi-tooltip-outline::before {
  content: "\F0526"; }

.mdi-tooltip-plus::before {
  content: "\F0BD6"; }

.mdi-tooltip-plus-outline::before {
  content: "\F0527"; }

.mdi-tooltip-text::before {
  content: "\F0528"; }

.mdi-tooltip-text-outline::before {
  content: "\F0BD7"; }

.mdi-tooth::before {
  content: "\F08C3"; }

.mdi-tooth-outline::before {
  content: "\F0529"; }

.mdi-toothbrush::before {
  content: "\F1129"; }

.mdi-toothbrush-electric::before {
  content: "\F112C"; }

.mdi-toothbrush-paste::before {
  content: "\F112A"; }

.mdi-tortoise::before {
  content: "\F0D3B"; }

.mdi-toslink::before {
  content: "\F12B8"; }

.mdi-tournament::before {
  content: "\F09AE"; }

.mdi-tow-truck::before {
  content: "\F083C"; }

.mdi-tower-beach::before {
  content: "\F0681"; }

.mdi-tower-fire::before {
  content: "\F0682"; }

.mdi-toy-brick::before {
  content: "\F1288"; }

.mdi-toy-brick-marker::before {
  content: "\F1289"; }

.mdi-toy-brick-marker-outline::before {
  content: "\F128A"; }

.mdi-toy-brick-minus::before {
  content: "\F128B"; }

.mdi-toy-brick-minus-outline::before {
  content: "\F128C"; }

.mdi-toy-brick-outline::before {
  content: "\F128D"; }

.mdi-toy-brick-plus::before {
  content: "\F128E"; }

.mdi-toy-brick-plus-outline::before {
  content: "\F128F"; }

.mdi-toy-brick-remove::before {
  content: "\F1290"; }

.mdi-toy-brick-remove-outline::before {
  content: "\F1291"; }

.mdi-toy-brick-search::before {
  content: "\F1292"; }

.mdi-toy-brick-search-outline::before {
  content: "\F1293"; }

.mdi-track-light::before {
  content: "\F0914"; }

.mdi-trackpad::before {
  content: "\F07F8"; }

.mdi-trackpad-lock::before {
  content: "\F0933"; }

.mdi-tractor::before {
  content: "\F0892"; }

.mdi-trademark::before {
  content: "\F0A78"; }

.mdi-traffic-cone::before {
  content: "\F137C"; }

.mdi-traffic-light::before {
  content: "\F052B"; }

.mdi-train::before {
  content: "\F052C"; }

.mdi-train-car::before {
  content: "\F0BD8"; }

.mdi-train-variant::before {
  content: "\F08C4"; }

.mdi-tram::before {
  content: "\F052D"; }

.mdi-tram-side::before {
  content: "\F0FE7"; }

.mdi-transcribe::before {
  content: "\F052E"; }

.mdi-transcribe-close::before {
  content: "\F052F"; }

.mdi-transfer::before {
  content: "\F1065"; }

.mdi-transfer-down::before {
  content: "\F0DA1"; }

.mdi-transfer-left::before {
  content: "\F0DA2"; }

.mdi-transfer-right::before {
  content: "\F0530"; }

.mdi-transfer-up::before {
  content: "\F0DA3"; }

.mdi-transit-connection::before {
  content: "\F0D3C"; }

.mdi-transit-connection-variant::before {
  content: "\F0D3D"; }

.mdi-transit-detour::before {
  content: "\F0F8B"; }

.mdi-transit-transfer::before {
  content: "\F06AE"; }

.mdi-transition::before {
  content: "\F0915"; }

.mdi-transition-masked::before {
  content: "\F0916"; }

.mdi-translate::before {
  content: "\F05CA"; }

.mdi-translate-off::before {
  content: "\F0E06"; }

.mdi-transmission-tower::before {
  content: "\F0D3E"; }

.mdi-trash-can::before {
  content: "\F0A79"; }

.mdi-trash-can-outline::before {
  content: "\F0A7A"; }

.mdi-tray::before {
  content: "\F1294"; }

.mdi-tray-alert::before {
  content: "\F1295"; }

.mdi-tray-full::before {
  content: "\F1296"; }

.mdi-tray-minus::before {
  content: "\F1297"; }

.mdi-tray-plus::before {
  content: "\F1298"; }

.mdi-tray-remove::before {
  content: "\F1299"; }

.mdi-treasure-chest::before {
  content: "\F0726"; }

.mdi-tree::before {
  content: "\F0531"; }

.mdi-tree-outline::before {
  content: "\F0E69"; }

.mdi-trello::before {
  content: "\F0532"; }

.mdi-trending-down::before {
  content: "\F0533"; }

.mdi-trending-neutral::before {
  content: "\F0534"; }

.mdi-trending-up::before {
  content: "\F0535"; }

.mdi-triangle::before {
  content: "\F0536"; }

.mdi-triangle-outline::before {
  content: "\F0537"; }

.mdi-triforce::before {
  content: "\F0BD9"; }

.mdi-trophy::before {
  content: "\F0538"; }

.mdi-trophy-award::before {
  content: "\F0539"; }

.mdi-trophy-broken::before {
  content: "\F0DA4"; }

.mdi-trophy-outline::before {
  content: "\F053A"; }

.mdi-trophy-variant::before {
  content: "\F053B"; }

.mdi-trophy-variant-outline::before {
  content: "\F053C"; }

.mdi-truck::before {
  content: "\F053D"; }

.mdi-truck-check::before {
  content: "\F0CD4"; }

.mdi-truck-check-outline::before {
  content: "\F129A"; }

.mdi-truck-delivery::before {
  content: "\F053E"; }

.mdi-truck-delivery-outline::before {
  content: "\F129B"; }

.mdi-truck-fast::before {
  content: "\F0788"; }

.mdi-truck-fast-outline::before {
  content: "\F129C"; }

.mdi-truck-outline::before {
  content: "\F129D"; }

.mdi-truck-trailer::before {
  content: "\F0727"; }

.mdi-trumpet::before {
  content: "\F1096"; }

.mdi-tshirt-crew::before {
  content: "\F0A7B"; }

.mdi-tshirt-crew-outline::before {
  content: "\F053F"; }

.mdi-tshirt-v::before {
  content: "\F0A7C"; }

.mdi-tshirt-v-outline::before {
  content: "\F0540"; }

.mdi-tumble-dryer::before {
  content: "\F0917"; }

.mdi-tumble-dryer-alert::before {
  content: "\F11BA"; }

.mdi-tumble-dryer-off::before {
  content: "\F11BB"; }

.mdi-tune::before {
  content: "\F062E"; }

.mdi-tune-vertical::before {
  content: "\F066A"; }

.mdi-turnstile::before {
  content: "\F0CD5"; }

.mdi-turnstile-outline::before {
  content: "\F0CD6"; }

.mdi-turtle::before {
  content: "\F0CD7"; }

.mdi-twitch::before {
  content: "\F0543"; }

.mdi-twitter::before {
  content: "\F0544"; }

.mdi-twitter-retweet::before {
  content: "\F0547"; }

.mdi-two-factor-authentication::before {
  content: "\F09AF"; }

.mdi-typewriter::before {
  content: "\F0F2D"; }

.mdi-ubisoft::before {
  content: "\F0BDA"; }

.mdi-ubuntu::before {
  content: "\F0548"; }

.mdi-ufo::before {
  content: "\F10C4"; }

.mdi-ufo-outline::before {
  content: "\F10C5"; }

.mdi-ultra-high-definition::before {
  content: "\F07F9"; }

.mdi-umbraco::before {
  content: "\F0549"; }

.mdi-umbrella::before {
  content: "\F054A"; }

.mdi-umbrella-closed::before {
  content: "\F09B0"; }

.mdi-umbrella-outline::before {
  content: "\F054B"; }

.mdi-undo::before {
  content: "\F054C"; }

.mdi-undo-variant::before {
  content: "\F054D"; }

.mdi-unfold-less-horizontal::before {
  content: "\F054E"; }

.mdi-unfold-less-vertical::before {
  content: "\F0760"; }

.mdi-unfold-more-horizontal::before {
  content: "\F054F"; }

.mdi-unfold-more-vertical::before {
  content: "\F0761"; }

.mdi-ungroup::before {
  content: "\F0550"; }

.mdi-unicode::before {
  content: "\F0ED0"; }

.mdi-unity::before {
  content: "\F06AF"; }

.mdi-unreal::before {
  content: "\F09B1"; }

.mdi-untappd::before {
  content: "\F0551"; }

.mdi-update::before {
  content: "\F06B0"; }

.mdi-upload::before {
  content: "\F0552"; }

.mdi-upload-lock::before {
  content: "\F1373"; }

.mdi-upload-lock-outline::before {
  content: "\F1374"; }

.mdi-upload-multiple::before {
  content: "\F083D"; }

.mdi-upload-network::before {
  content: "\F06F6"; }

.mdi-upload-network-outline::before {
  content: "\F0CD8"; }

.mdi-upload-off::before {
  content: "\F10C6"; }

.mdi-upload-off-outline::before {
  content: "\F10C7"; }

.mdi-upload-outline::before {
  content: "\F0E07"; }

.mdi-usb::before {
  content: "\F0553"; }

.mdi-usb-flash-drive::before {
  content: "\F129E"; }

.mdi-usb-flash-drive-outline::before {
  content: "\F129F"; }

.mdi-usb-port::before {
  content: "\F11F0"; }

.mdi-valve::before {
  content: "\F1066"; }

.mdi-valve-closed::before {
  content: "\F1067"; }

.mdi-valve-open::before {
  content: "\F1068"; }

.mdi-van-passenger::before {
  content: "\F07FA"; }

.mdi-van-utility::before {
  content: "\F07FB"; }

.mdi-vanish::before {
  content: "\F07FC"; }

.mdi-vanity-light::before {
  content: "\F11E1"; }

.mdi-variable::before {
  content: "\F0AE7"; }

.mdi-variable-box::before {
  content: "\F1111"; }

.mdi-vector-arrange-above::before {
  content: "\F0554"; }

.mdi-vector-arrange-below::before {
  content: "\F0555"; }

.mdi-vector-bezier::before {
  content: "\F0AE8"; }

.mdi-vector-circle::before {
  content: "\F0556"; }

.mdi-vector-circle-variant::before {
  content: "\F0557"; }

.mdi-vector-combine::before {
  content: "\F0558"; }

.mdi-vector-curve::before {
  content: "\F0559"; }

.mdi-vector-difference::before {
  content: "\F055A"; }

.mdi-vector-difference-ab::before {
  content: "\F055B"; }

.mdi-vector-difference-ba::before {
  content: "\F055C"; }

.mdi-vector-ellipse::before {
  content: "\F0893"; }

.mdi-vector-intersection::before {
  content: "\F055D"; }

.mdi-vector-line::before {
  content: "\F055E"; }

.mdi-vector-link::before {
  content: "\F0FE8"; }

.mdi-vector-point::before {
  content: "\F055F"; }

.mdi-vector-polygon::before {
  content: "\F0560"; }

.mdi-vector-polyline::before {
  content: "\F0561"; }

.mdi-vector-polyline-edit::before {
  content: "\F1225"; }

.mdi-vector-polyline-minus::before {
  content: "\F1226"; }

.mdi-vector-polyline-plus::before {
  content: "\F1227"; }

.mdi-vector-polyline-remove::before {
  content: "\F1228"; }

.mdi-vector-radius::before {
  content: "\F074A"; }

.mdi-vector-rectangle::before {
  content: "\F05C6"; }

.mdi-vector-selection::before {
  content: "\F0562"; }

.mdi-vector-square::before {
  content: "\F0001"; }

.mdi-vector-triangle::before {
  content: "\F0563"; }

.mdi-vector-union::before {
  content: "\F0564"; }

.mdi-vhs::before {
  content: "\F0A1B"; }

.mdi-vibrate::before {
  content: "\F0566"; }

.mdi-vibrate-off::before {
  content: "\F0CD9"; }

.mdi-video::before {
  content: "\F0567"; }

.mdi-video-3d::before {
  content: "\F07FD"; }

.mdi-video-3d-variant::before {
  content: "\F0ED1"; }

.mdi-video-4k-box::before {
  content: "\F083E"; }

.mdi-video-account::before {
  content: "\F0919"; }

.mdi-video-box::before {
  content: "\F00FD"; }

.mdi-video-box-off::before {
  content: "\F00FE"; }

.mdi-video-check::before {
  content: "\F1069"; }

.mdi-video-check-outline::before {
  content: "\F106A"; }

.mdi-video-image::before {
  content: "\F091A"; }

.mdi-video-input-antenna::before {
  content: "\F083F"; }

.mdi-video-input-component::before {
  content: "\F0840"; }

.mdi-video-input-hdmi::before {
  content: "\F0841"; }

.mdi-video-input-scart::before {
  content: "\F0F8C"; }

.mdi-video-input-svideo::before {
  content: "\F0842"; }

.mdi-video-minus::before {
  content: "\F09B2"; }

.mdi-video-minus-outline::before {
  content: "\F02BA"; }

.mdi-video-off::before {
  content: "\F0568"; }

.mdi-video-off-outline::before {
  content: "\F0BDB"; }

.mdi-video-outline::before {
  content: "\F0BDC"; }

.mdi-video-plus::before {
  content: "\F09B3"; }

.mdi-video-plus-outline::before {
  content: "\F01D3"; }

.mdi-video-stabilization::before {
  content: "\F091B"; }

.mdi-video-switch::before {
  content: "\F0569"; }

.mdi-video-switch-outline::before {
  content: "\F0790"; }

.mdi-video-vintage::before {
  content: "\F0A1C"; }

.mdi-video-wireless::before {
  content: "\F0ED2"; }

.mdi-video-wireless-outline::before {
  content: "\F0ED3"; }

.mdi-view-agenda::before {
  content: "\F056A"; }

.mdi-view-agenda-outline::before {
  content: "\F11D8"; }

.mdi-view-array::before {
  content: "\F056B"; }

.mdi-view-carousel::before {
  content: "\F056C"; }

.mdi-view-column::before {
  content: "\F056D"; }

.mdi-view-comfy::before {
  content: "\F0E6A"; }

.mdi-view-compact::before {
  content: "\F0E6B"; }

.mdi-view-compact-outline::before {
  content: "\F0E6C"; }

.mdi-view-dashboard::before {
  content: "\F056E"; }

.mdi-view-dashboard-outline::before {
  content: "\F0A1D"; }

.mdi-view-dashboard-variant::before {
  content: "\F0843"; }

.mdi-view-day::before {
  content: "\F056F"; }

.mdi-view-grid::before {
  content: "\F0570"; }

.mdi-view-grid-outline::before {
  content: "\F11D9"; }

.mdi-view-grid-plus::before {
  content: "\F0F8D"; }

.mdi-view-grid-plus-outline::before {
  content: "\F11DA"; }

.mdi-view-headline::before {
  content: "\F0571"; }

.mdi-view-list::before {
  content: "\F0572"; }

.mdi-view-module::before {
  content: "\F0573"; }

.mdi-view-parallel::before {
  content: "\F0728"; }

.mdi-view-quilt::before {
  content: "\F0574"; }

.mdi-view-sequential::before {
  content: "\F0729"; }

.mdi-view-split-horizontal::before {
  content: "\F0BCB"; }

.mdi-view-split-vertical::before {
  content: "\F0BCC"; }

.mdi-view-stream::before {
  content: "\F0575"; }

.mdi-view-week::before {
  content: "\F0576"; }

.mdi-vimeo::before {
  content: "\F0577"; }

.mdi-violin::before {
  content: "\F060F"; }

.mdi-virtual-reality::before {
  content: "\F0894"; }

.mdi-vk::before {
  content: "\F0579"; }

.mdi-vlc::before {
  content: "\F057C"; }

.mdi-voice-off::before {
  content: "\F0ED4"; }

.mdi-voicemail::before {
  content: "\F057D"; }

.mdi-volleyball::before {
  content: "\F09B4"; }

.mdi-volume-high::before {
  content: "\F057E"; }

.mdi-volume-low::before {
  content: "\F057F"; }

.mdi-volume-medium::before {
  content: "\F0580"; }

.mdi-volume-minus::before {
  content: "\F075E"; }

.mdi-volume-mute::before {
  content: "\F075F"; }

.mdi-volume-off::before {
  content: "\F0581"; }

.mdi-volume-plus::before {
  content: "\F075D"; }

.mdi-volume-source::before {
  content: "\F1120"; }

.mdi-volume-variant-off::before {
  content: "\F0E08"; }

.mdi-volume-vibrate::before {
  content: "\F1121"; }

.mdi-vote::before {
  content: "\F0A1F"; }

.mdi-vote-outline::before {
  content: "\F0A20"; }

.mdi-vpn::before {
  content: "\F0582"; }

.mdi-vuejs::before {
  content: "\F0844"; }

.mdi-vuetify::before {
  content: "\F0E6D"; }

.mdi-walk::before {
  content: "\F0583"; }

.mdi-wall::before {
  content: "\F07FE"; }

.mdi-wall-sconce::before {
  content: "\F091C"; }

.mdi-wall-sconce-flat::before {
  content: "\F091D"; }

.mdi-wall-sconce-flat-variant::before {
  content: "\F041C"; }

.mdi-wall-sconce-round::before {
  content: "\F0748"; }

.mdi-wall-sconce-round-variant::before {
  content: "\F091E"; }

.mdi-wallet::before {
  content: "\F0584"; }

.mdi-wallet-giftcard::before {
  content: "\F0585"; }

.mdi-wallet-membership::before {
  content: "\F0586"; }

.mdi-wallet-outline::before {
  content: "\F0BDD"; }

.mdi-wallet-plus::before {
  content: "\F0F8E"; }

.mdi-wallet-plus-outline::before {
  content: "\F0F8F"; }

.mdi-wallet-travel::before {
  content: "\F0587"; }

.mdi-wallpaper::before {
  content: "\F0E09"; }

.mdi-wan::before {
  content: "\F0588"; }

.mdi-wardrobe::before {
  content: "\F0F90"; }

.mdi-wardrobe-outline::before {
  content: "\F0F91"; }

.mdi-warehouse::before {
  content: "\F0F81"; }

.mdi-washing-machine::before {
  content: "\F072A"; }

.mdi-washing-machine-alert::before {
  content: "\F11BC"; }

.mdi-washing-machine-off::before {
  content: "\F11BD"; }

.mdi-watch::before {
  content: "\F0589"; }

.mdi-watch-export::before {
  content: "\F058A"; }

.mdi-watch-export-variant::before {
  content: "\F0895"; }

.mdi-watch-import::before {
  content: "\F058B"; }

.mdi-watch-import-variant::before {
  content: "\F0896"; }

.mdi-watch-variant::before {
  content: "\F0897"; }

.mdi-watch-vibrate::before {
  content: "\F06B1"; }

.mdi-watch-vibrate-off::before {
  content: "\F0CDA"; }

.mdi-water::before {
  content: "\F058C"; }

.mdi-water-boiler::before {
  content: "\F0F92"; }

.mdi-water-boiler-alert::before {
  content: "\F11B3"; }

.mdi-water-boiler-off::before {
  content: "\F11B4"; }

.mdi-water-off::before {
  content: "\F058D"; }

.mdi-water-outline::before {
  content: "\F0E0A"; }

.mdi-water-percent::before {
  content: "\F058E"; }

.mdi-water-polo::before {
  content: "\F12A0"; }

.mdi-water-pump::before {
  content: "\F058F"; }

.mdi-water-pump-off::before {
  content: "\F0F93"; }

.mdi-water-well::before {
  content: "\F106B"; }

.mdi-water-well-outline::before {
  content: "\F106C"; }

.mdi-watermark::before {
  content: "\F0612"; }

.mdi-wave::before {
  content: "\F0F2E"; }

.mdi-waves::before {
  content: "\F078D"; }

.mdi-waze::before {
  content: "\F0BDE"; }

.mdi-weather-cloudy::before {
  content: "\F0590"; }

.mdi-weather-cloudy-alert::before {
  content: "\F0F2F"; }

.mdi-weather-cloudy-arrow-right::before {
  content: "\F0E6E"; }

.mdi-weather-fog::before {
  content: "\F0591"; }

.mdi-weather-hail::before {
  content: "\F0592"; }

.mdi-weather-hazy::before {
  content: "\F0F30"; }

.mdi-weather-hurricane::before {
  content: "\F0898"; }

.mdi-weather-lightning::before {
  content: "\F0593"; }

.mdi-weather-lightning-rainy::before {
  content: "\F067E"; }

.mdi-weather-night::before {
  content: "\F0594"; }

.mdi-weather-night-partly-cloudy::before {
  content: "\F0F31"; }

.mdi-weather-partly-cloudy::before {
  content: "\F0595"; }

.mdi-weather-partly-lightning::before {
  content: "\F0F32"; }

.mdi-weather-partly-rainy::before {
  content: "\F0F33"; }

.mdi-weather-partly-snowy::before {
  content: "\F0F34"; }

.mdi-weather-partly-snowy-rainy::before {
  content: "\F0F35"; }

.mdi-weather-pouring::before {
  content: "\F0596"; }

.mdi-weather-rainy::before {
  content: "\F0597"; }

.mdi-weather-snowy::before {
  content: "\F0598"; }

.mdi-weather-snowy-heavy::before {
  content: "\F0F36"; }

.mdi-weather-snowy-rainy::before {
  content: "\F067F"; }

.mdi-weather-sunny::before {
  content: "\F0599"; }

.mdi-weather-sunny-alert::before {
  content: "\F0F37"; }

.mdi-weather-sunset::before {
  content: "\F059A"; }

.mdi-weather-sunset-down::before {
  content: "\F059B"; }

.mdi-weather-sunset-up::before {
  content: "\F059C"; }

.mdi-weather-tornado::before {
  content: "\F0F38"; }

.mdi-weather-windy::before {
  content: "\F059D"; }

.mdi-weather-windy-variant::before {
  content: "\F059E"; }

.mdi-web::before {
  content: "\F059F"; }

.mdi-web-box::before {
  content: "\F0F94"; }

.mdi-web-clock::before {
  content: "\F124A"; }

.mdi-webcam::before {
  content: "\F05A0"; }

.mdi-webhook::before {
  content: "\F062F"; }

.mdi-webpack::before {
  content: "\F072B"; }

.mdi-webrtc::before {
  content: "\F1248"; }

.mdi-wechat::before {
  content: "\F0611"; }

.mdi-weight::before {
  content: "\F05A1"; }

.mdi-weight-gram::before {
  content: "\F0D3F"; }

.mdi-weight-kilogram::before {
  content: "\F05A2"; }

.mdi-weight-lifter::before {
  content: "\F115D"; }

.mdi-weight-pound::before {
  content: "\F09B5"; }

.mdi-whatsapp::before {
  content: "\F05A3"; }

.mdi-wheelchair-accessibility::before {
  content: "\F05A4"; }

.mdi-whistle::before {
  content: "\F09B6"; }

.mdi-whistle-outline::before {
  content: "\F12BC"; }

.mdi-white-balance-auto::before {
  content: "\F05A5"; }

.mdi-white-balance-incandescent::before {
  content: "\F05A6"; }

.mdi-white-balance-iridescent::before {
  content: "\F05A7"; }

.mdi-white-balance-sunny::before {
  content: "\F05A8"; }

.mdi-widgets::before {
  content: "\F072C"; }

.mdi-widgets-outline::before {
  content: "\F1355"; }

.mdi-wifi::before {
  content: "\F05A9"; }

.mdi-wifi-off::before {
  content: "\F05AA"; }

.mdi-wifi-star::before {
  content: "\F0E0B"; }

.mdi-wifi-strength-1::before {
  content: "\F091F"; }

.mdi-wifi-strength-1-alert::before {
  content: "\F0920"; }

.mdi-wifi-strength-1-lock::before {
  content: "\F0921"; }

.mdi-wifi-strength-2::before {
  content: "\F0922"; }

.mdi-wifi-strength-2-alert::before {
  content: "\F0923"; }

.mdi-wifi-strength-2-lock::before {
  content: "\F0924"; }

.mdi-wifi-strength-3::before {
  content: "\F0925"; }

.mdi-wifi-strength-3-alert::before {
  content: "\F0926"; }

.mdi-wifi-strength-3-lock::before {
  content: "\F0927"; }

.mdi-wifi-strength-4::before {
  content: "\F0928"; }

.mdi-wifi-strength-4-alert::before {
  content: "\F0929"; }

.mdi-wifi-strength-4-lock::before {
  content: "\F092A"; }

.mdi-wifi-strength-alert-outline::before {
  content: "\F092B"; }

.mdi-wifi-strength-lock-outline::before {
  content: "\F092C"; }

.mdi-wifi-strength-off::before {
  content: "\F092D"; }

.mdi-wifi-strength-off-outline::before {
  content: "\F092E"; }

.mdi-wifi-strength-outline::before {
  content: "\F092F"; }

.mdi-wikipedia::before {
  content: "\F05AC"; }

.mdi-wind-turbine::before {
  content: "\F0DA5"; }

.mdi-window-close::before {
  content: "\F05AD"; }

.mdi-window-closed::before {
  content: "\F05AE"; }

.mdi-window-closed-variant::before {
  content: "\F11DB"; }

.mdi-window-maximize::before {
  content: "\F05AF"; }

.mdi-window-minimize::before {
  content: "\F05B0"; }

.mdi-window-open::before {
  content: "\F05B1"; }

.mdi-window-open-variant::before {
  content: "\F11DC"; }

.mdi-window-restore::before {
  content: "\F05B2"; }

.mdi-window-shutter::before {
  content: "\F111C"; }

.mdi-window-shutter-alert::before {
  content: "\F111D"; }

.mdi-window-shutter-open::before {
  content: "\F111E"; }

.mdi-wiper::before {
  content: "\F0AE9"; }

.mdi-wiper-wash::before {
  content: "\F0DA6"; }

.mdi-wordpress::before {
  content: "\F05B4"; }

.mdi-wrap::before {
  content: "\F05B6"; }

.mdi-wrap-disabled::before {
  content: "\F0BDF"; }

.mdi-wrench::before {
  content: "\F05B7"; }

.mdi-wrench-outline::before {
  content: "\F0BE0"; }

.mdi-xamarin::before {
  content: "\F0845"; }

.mdi-xamarin-outline::before {
  content: "\F0846"; }

.mdi-xing::before {
  content: "\F05BE"; }

.mdi-xml::before {
  content: "\F05C0"; }

.mdi-xmpp::before {
  content: "\F07FF"; }

.mdi-y-combinator::before {
  content: "\F0624"; }

.mdi-yahoo::before {
  content: "\F0B4F"; }

.mdi-yeast::before {
  content: "\F05C1"; }

.mdi-yin-yang::before {
  content: "\F0680"; }

.mdi-yoga::before {
  content: "\F117C"; }

.mdi-youtube::before {
  content: "\F05C3"; }

.mdi-youtube-gaming::before {
  content: "\F0848"; }

.mdi-youtube-studio::before {
  content: "\F0847"; }

.mdi-youtube-subscription::before {
  content: "\F0D40"; }

.mdi-youtube-tv::before {
  content: "\F0448"; }

.mdi-z-wave::before {
  content: "\F0AEA"; }

.mdi-zend::before {
  content: "\F0AEB"; }

.mdi-zigbee::before {
  content: "\F0D41"; }

.mdi-zip-box::before {
  content: "\F05C4"; }

.mdi-zip-box-outline::before {
  content: "\F0FFA"; }

.mdi-zip-disk::before {
  content: "\F0A23"; }

.mdi-zodiac-aquarius::before {
  content: "\F0A7D"; }

.mdi-zodiac-aries::before {
  content: "\F0A7E"; }

.mdi-zodiac-cancer::before {
  content: "\F0A7F"; }

.mdi-zodiac-capricorn::before {
  content: "\F0A80"; }

.mdi-zodiac-gemini::before {
  content: "\F0A81"; }

.mdi-zodiac-leo::before {
  content: "\F0A82"; }

.mdi-zodiac-libra::before {
  content: "\F0A83"; }

.mdi-zodiac-pisces::before {
  content: "\F0A84"; }

.mdi-zodiac-sagittarius::before {
  content: "\F0A85"; }

.mdi-zodiac-scorpio::before {
  content: "\F0A86"; }

.mdi-zodiac-taurus::before {
  content: "\F0A87"; }

.mdi-zodiac-virgo::before {
  content: "\F0A88"; }

.mdi-blank::before {
  content: "\F68C";
  visibility: hidden; }

.mdi-18px.mdi-set, .mdi-18px.mdi:before {
  font-size: 18px; }

.mdi-24px.mdi-set, .mdi-24px.mdi:before {
  font-size: 24px; }

.mdi-36px.mdi-set, .mdi-36px.mdi:before {
  font-size: 36px; }

.mdi-48px.mdi-set, .mdi-48px.mdi:before {
  font-size: 48px; }

.mdi-dark:before {
  color: rgba(0, 0, 0, 0.54); }

.mdi-dark.mdi-inactive:before {
  color: rgba(0, 0, 0, 0.26); }

.mdi-light:before {
  color: #fff; }

.mdi-light.mdi-inactive:before {
  color: rgba(255, 255, 255, 0.3); }

.mdi-rotate-45:before {
  transform: rotate(45deg); }

.mdi-rotate-90:before {
  transform: rotate(90deg); }

.mdi-rotate-135:before {
  transform: rotate(135deg); }

.mdi-rotate-180:before {
  transform: rotate(180deg); }

.mdi-rotate-225:before {
  transform: rotate(225deg); }

.mdi-rotate-270:before {
  transform: rotate(270deg); }

.mdi-rotate-315:before {
  transform: rotate(315deg); }

.mdi-flip-h:before {
  transform: scaleX(-1);
  filter: FlipH;
  -ms-filter: "FlipH"; }

.mdi-flip-v:before {
  transform: scaleY(-1);
  filter: FlipV;
  -ms-filter: "FlipV"; }

.mdi-spin:before {
  animation: mdi-spin 2s infinite linear; }

@keyframes mdi-spin {
  0% {
    transform: rotate(0deg); }
  100% {
    transform: rotate(359deg); } }

@font-face {
  font-family: "feather";
  src: {{ asset("assets/fonts/feather.eot?t=1525787366991")}};
  /* IE9*/
  src: {{ asset("assets/fonts/feather.eot?t=1525787366991#iefix")}} format("embedded-opentype"), {{ asset("assets/fonts/feather.woff?t=1525787366991")}} format("woff"), {{ asset("assets/fonts/feather.ttf?t=1525787366991")}} format("truetype"), {{ asset("assets/fonts/feather.svg?t=1525787366991#feather")}} format("svg");
  /* iOS 4.1- */ }

[class^="fe-"] {
  /* use !important to prevent issues with browser extensions that change fonts */
  font-family: 'feather' !important;
  speak: none;
  font-style: normal;
  font-weight: normal;
  font-variant: normal;
  text-transform: none;
  line-height: 1;
  /* Better Font Rendering =========== */
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale; }

.fe-alert-octagon:before {
  content: "\e81b"; }

.fe-alert-circle:before {
  content: "\e81c"; }

.fe-activity:before {
  content: "\e81d"; }

.fe-alert-triangle:before {
  content: "\e81e"; }

.fe-align-center:before {
  content: "\e81f"; }

.fe-airplay:before {
  content: "\e820"; }

.fe-align-justify:before {
  content: "\e821"; }

.fe-align-left:before {
  content: "\e822"; }

.fe-align-right:before {
  content: "\e823"; }

.fe-arrow-down-left:before {
  content: "\e824"; }

.fe-arrow-down-right:before {
  content: "\e825"; }

.fe-anchor:before {
  content: "\e826"; }

.fe-aperture:before {
  content: "\e827"; }

.fe-arrow-left:before {
  content: "\e828"; }

.fe-arrow-right:before {
  content: "\e829"; }

.fe-arrow-down:before {
  content: "\e82a"; }

.fe-arrow-up-left:before {
  content: "\e82b"; }

.fe-arrow-up-right:before {
  content: "\e82c"; }

.fe-arrow-up:before {
  content: "\e82d"; }

.fe-award:before {
  content: "\e82e"; }

.fe-bar-chart:before {
  content: "\e82f"; }

.fe-at-sign:before {
  content: "\e830"; }

.fe-bar-chart-2:before {
  content: "\e831"; }

.fe-battery-charging:before {
  content: "\e832"; }

.fe-bell-off:before {
  content: "\e833"; }

.fe-battery:before {
  content: "\e834"; }

.fe-bluetooth:before {
  content: "\e835"; }

.fe-bell:before {
  content: "\e836"; }

.fe-book:before {
  content: "\e837"; }

.fe-briefcase:before {
  content: "\e838"; }

.fe-camera-off:before {
  content: "\e839"; }

.fe-calendar:before {
  content: "\e83a"; }

.fe-bookmark:before {
  content: "\e83b"; }

.fe-box:before {
  content: "\e83c"; }

.fe-camera:before {
  content: "\e83d"; }

.fe-check-circle:before {
  content: "\e83e"; }

.fe-check:before {
  content: "\e83f"; }

.fe-check-square:before {
  content: "\e840"; }

.fe-cast:before {
  content: "\e841"; }

.fe-chevron-down:before {
  content: "\e842"; }

.fe-chevron-left:before {
  content: "\e843"; }

.fe-chevron-right:before {
  content: "\e844"; }

.fe-chevron-up:before {
  content: "\e845"; }

.fe-chevrons-down:before {
  content: "\e846"; }

.fe-chevrons-right:before {
  content: "\e847"; }

.fe-chevrons-up:before {
  content: "\e848"; }

.fe-chevrons-left:before {
  content: "\e849"; }

.fe-circle:before {
  content: "\e84a"; }

.fe-clipboard:before {
  content: "\e84b"; }

.fe-chrome:before {
  content: "\e84c"; }

.fe-clock:before {
  content: "\e84d"; }

.fe-cloud-lightning:before {
  content: "\e84e"; }

.fe-cloud-drizzle:before {
  content: "\e84f"; }

.fe-cloud-rain:before {
  content: "\e850"; }

.fe-cloud-off:before {
  content: "\e851"; }

.fe-codepen:before {
  content: "\e852"; }

.fe-cloud-snow:before {
  content: "\e853"; }

.fe-compass:before {
  content: "\e854"; }

.fe-copy:before {
  content: "\e855"; }

.fe-corner-down-right:before {
  content: "\e856"; }

.fe-corner-down-left:before {
  content: "\e857"; }

.fe-corner-left-down:before {
  content: "\e858"; }

.fe-corner-left-up:before {
  content: "\e859"; }

.fe-corner-up-left:before {
  content: "\e85a"; }

.fe-corner-up-right:before {
  content: "\e85b"; }

.fe-corner-right-down:before {
  content: "\e85c"; }

.fe-corner-right-up:before {
  content: "\e85d"; }

.fe-cpu:before {
  content: "\e85e"; }

.fe-credit-card:before {
  content: "\e85f"; }

.fe-crosshair:before {
  content: "\e860"; }

.fe-disc:before {
  content: "\e861"; }

.fe-delete:before {
  content: "\e862"; }

.fe-download-cloud:before {
  content: "\e863"; }

.fe-download:before {
  content: "\e864"; }

.fe-droplet:before {
  content: "\e865"; }

.fe-edit-2:before {
  content: "\e866"; }

.fe-edit:before {
  content: "\e867"; }

.fe-edit-1:before {
  content: "\e868"; }

.fe-external-link:before {
  content: "\e869"; }

.fe-eye:before {
  content: "\e86a"; }

.fe-feather:before {
  content: "\e86b"; }

.fe-facebook:before {
  content: "\e86c"; }

.fe-file-minus:before {
  content: "\e86d"; }

.fe-eye-off:before {
  content: "\e86e"; }

.fe-fast-forward:before {
  content: "\e86f"; }

.fe-file-text:before {
  content: "\e870"; }

.fe-film:before {
  content: "\e871"; }

.fe-file:before {
  content: "\e872"; }

.fe-file-plus:before {
  content: "\e873"; }

.fe-folder:before {
  content: "\e874"; }

.fe-filter:before {
  content: "\e875"; }

.fe-flag:before {
  content: "\e876"; }

.fe-globe:before {
  content: "\e877"; }

.fe-grid:before {
  content: "\e878"; }

.fe-heart:before {
  content: "\e879"; }

.fe-home:before {
  content: "\e87a"; }

.fe-github:before {
  content: "\e87b"; }

.fe-image:before {
  content: "\e87c"; }

.fe-inbox:before {
  content: "\e87d"; }

.fe-layers:before {
  content: "\e87e"; }

.fe-info:before {
  content: "\e87f"; }

.fe-instagram:before {
  content: "\e880"; }

.fe-layout:before {
  content: "\e881"; }

.fe-link-2:before {
  content: "\e882"; }

.fe-life-buoy:before {
  content: "\e883"; }

.fe-link:before {
  content: "\e884"; }

.fe-log-in:before {
  content: "\e885"; }

.fe-list:before {
  content: "\e886"; }

.fe-lock:before {
  content: "\e887"; }

.fe-log-out:before {
  content: "\e888"; }

.fe-loader:before {
  content: "\e889"; }

.fe-mail:before {
  content: "\e88a"; }

.fe-maximize-2:before {
  content: "\e88b"; }

.fe-map:before {
  content: "\e88c"; }

.fe-map-pin:before {
  content: "\e88e"; }

.fe-menu:before {
  content: "\e88f"; }

.fe-message-circle:before {
  content: "\e890"; }

.fe-message-square:before {
  content: "\e891"; }

.fe-minimize-2:before {
  content: "\e892"; }

.fe-mic-off:before {
  content: "\e893"; }

.fe-minus-circle:before {
  content: "\e894"; }

.fe-mic:before {
  content: "\e895"; }

.fe-minus-square:before {
  content: "\e896"; }

.fe-minus:before {
  content: "\e897"; }

.fe-moon:before {
  content: "\e898"; }

.fe-monitor:before {
  content: "\e899"; }

.fe-more-vertical:before {
  content: "\e89a"; }

.fe-more-horizontal:before {
  content: "\e89b"; }

.fe-move:before {
  content: "\e89c"; }

.fe-music:before {
  content: "\e89d"; }

.fe-navigation-2:before {
  content: "\e89e"; }

.fe-navigation:before {
  content: "\e89f"; }

.fe-octagon:before {
  content: "\e8a0"; }

.fe-package:before {
  content: "\e8a1"; }

.fe-pause-circle:before {
  content: "\e8a2"; }

.fe-pause:before {
  content: "\e8a3"; }

.fe-percent:before {
  content: "\e8a4"; }

.fe-phone-call:before {
  content: "\e8a5"; }

.fe-phone-forwarded:before {
  content: "\e8a6"; }

.fe-phone-missed:before {
  content: "\e8a7"; }

.fe-phone-off:before {
  content: "\e8a8"; }

.fe-phone-incoming:before {
  content: "\e8a9"; }

.fe-phone:before {
  content: "\e8aa"; }

.fe-phone-outgoing:before {
  content: "\e8ab"; }

.fe-pie-chart:before {
  content: "\e8ac"; }

.fe-play-circle:before {
  content: "\e8ad"; }

.fe-play:before {
  content: "\e8ae"; }

.fe-plus-square:before {
  content: "\e8af"; }

.fe-plus-circle:before {
  content: "\e8b0"; }

.fe-plus:before {
  content: "\e8b1"; }

.fe-pocket:before {
  content: "\e8b2"; }

.fe-printer:before {
  content: "\e8b3"; }

.fe-power:before {
  content: "\e8b4"; }

.fe-radio:before {
  content: "\e8b5"; }

.fe-repeat:before {
  content: "\e8b6"; }

.fe-refresh-ccw:before {
  content: "\e8b7"; }

.fe-rewind:before {
  content: "\e8b8"; }

.fe-rotate-ccw:before {
  content: "\e8b9"; }

.fe-refresh-cw:before {
  content: "\e8ba"; }

.fe-rotate-cw:before {
  content: "\e8bb"; }

.fe-save:before {
  content: "\e8bc"; }

.fe-search:before {
  content: "\e8bd"; }

.fe-server:before {
  content: "\e8be"; }

.fe-scissors:before {
  content: "\e8bf"; }

.fe-share-2:before {
  content: "\e8c0"; }

.fe-share:before {
  content: "\e8c1"; }

.fe-shield:before {
  content: "\e8c2"; }

.fe-settings:before {
  content: "\e8c3"; }

.fe-skip-back:before {
  content: "\e8c4"; }

.fe-shuffle:before {
  content: "\e8c5"; }

.fe-sidebar:before {
  content: "\e8c6"; }

.fe-skip-forward:before {
  content: "\e8c7"; }

.fe-slack:before {
  content: "\e8c8"; }

.fe-slash:before {
  content: "\e8c9"; }

.fe-smartphone:before {
  content: "\e8ca"; }

.fe-square:before {
  content: "\e8cb"; }

.fe-speaker:before {
  content: "\e8cc"; }

.fe-star:before {
  content: "\e8cd"; }

.fe-stop-circle:before {
  content: "\e8ce"; }

.fe-sun:before {
  content: "\e8cf"; }

.fe-sunrise:before {
  content: "\e8d0"; }

.fe-tablet:before {
  content: "\e8d1"; }

.fe-tag:before {
  content: "\e8d2"; }

.fe-sunset:before {
  content: "\e8d3"; }

.fe-target:before {
  content: "\e8d4"; }

.fe-thermometer:before {
  content: "\e8d5"; }

.fe-thumbs-up:before {
  content: "\e8d6"; }

.fe-thumbs-down:before {
  content: "\e8d7"; }

.fe-toggle-left:before {
  content: "\e8d8"; }

.fe-toggle-right:before {
  content: "\e8d9"; }

.fe-trash-2:before {
  content: "\e8da"; }

.fe-trash:before {
  content: "\e8db"; }

.fe-trending-up:before {
  content: "\e8dc"; }

.fe-trending-down:before {
  content: "\e8dd"; }

.fe-triangle:before {
  content: "\e8de"; }

.fe-type:before {
  content: "\e8df"; }

.fe-twitter:before {
  content: "\e8e0"; }

.fe-upload:before {
  content: "\e8e1"; }

.fe-umbrella:before {
  content: "\e8e2"; }

.fe-upload-cloud:before {
  content: "\e8e3"; }

.fe-unlock:before {
  content: "\e8e4"; }

.fe-user-check:before {
  content: "\e8e5"; }

.fe-user-minus:before {
  content: "\e8e6"; }

.fe-user-plus:before {
  content: "\e8e7"; }

.fe-user-x:before {
  content: "\e8e8"; }

.fe-user:before {
  content: "\e8e9"; }

.fe-users:before {
  content: "\e8ea"; }

.fe-video-off:before {
  content: "\e8eb"; }

.fe-video:before {
  content: "\e8ec"; }

.fe-voicemail:before {
  content: "\e8ed"; }

.fe-volume-x:before {
  content: "\e8ee"; }

.fe-volume-2:before {
  content: "\e8ef"; }

.fe-volume-1:before {
  content: "\e8f0"; }

.fe-volume:before {
  content: "\e8f1"; }

.fe-watch:before {
  content: "\e8f2"; }

.fe-wifi:before {
  content: "\e8f3"; }

.fe-x-square:before {
  content: "\e8f4"; }

.fe-wind:before {
  content: "\e8f5"; }

.fe-x:before {
  content: "\e8f6"; }

.fe-x-circle:before {
  content: "\e8f7"; }

.fe-zap:before {
  content: "\e8f8"; }

.fe-zoom-in:before {
  content: "\e8f9"; }

.fe-zoom-out:before {
  content: "\e8fa"; }

.fe-command:before {
  content: "\e8fb"; }

.fe-cloud:before {
  content: "\e8fc"; }

.fe-hash:before {
  content: "\e8fd"; }

.fe-headphones:before {
  content: "\e8fe"; }

.fe-underline:before {
  content: "\e8ff"; }

.fe-italic:before {
  content: "\e900"; }

.fe-bold:before {
  content: "\e901"; }

.fe-crop:before {
  content: "\e902"; }

.fe-help-circle:before {
  content: "\e903"; }

.fe-paperclip:before {
  content: "\e904"; }

.fe-shopping-cart:before {
  content: "\e905"; }

.fe-tv:before {
  content: "\e906"; }

.fe-wifi-off:before {
  content: "\e907"; }

.fe-minimize:before {
  content: "\e88d"; }

.fe-maximize:before {
  content: "\e908"; }

.fe-gitlab:before {
  content: "\e909"; }

.fe-sliders:before {
  content: "\e90a"; }

.fe-star-on:before {
  content: "\e90b"; }

.fe-heart-on:before {
  content: "\e90c"; }

.fe-archive:before {
  content: "\e90d"; }

.fe-arrow-down-circle:before {
  content: "\e90e"; }

.fe-arrow-up-circle:before {
  content: "\e90f"; }

.fe-arrow-left-circle:before {
  content: "\e910"; }

.fe-arrow-right-circle:before {
  content: "\e911"; }

.fe-bar-chart-line-:before {
  content: "\e912"; }

.fe-bar-chart-line:before {
  content: "\e913"; }

.fe-book-open:before {
  content: "\e914"; }

.fe-code:before {
  content: "\e915"; }

.fe-database:before {
  content: "\e916"; }

.fe-dollar-sign:before {
  content: "\e917"; }

.fe-folder-plus:before {
  content: "\e918"; }

.fe-gift:before {
  content: "\e919"; }

.fe-folder-minus:before {
  content: "\e91a"; }

.fe-git-commit:before {
  content: "\e91b"; }

.fe-git-branch:before {
  content: "\e91c"; }

.fe-git-pull-request:before {
  content: "\e91d"; }

.fe-git-merge:before {
  content: "\e91e"; }

.fe-linkedin:before {
  content: "\e91f"; }

.fe-hard-drive:before {
  content: "\e920"; }

.fe-more-vertical-:before {
  content: "\e921"; }

.fe-more-horizontal-:before {
  content: "\e922"; }

.fe-rss:before {
  content: "\e923"; }

.fe-send:before {
  content: "\e924"; }

.fe-shield-off:before {
  content: "\e925"; }

.fe-shopping-bag:before {
  content: "\e926"; }

.fe-terminal:before {
  content: "\e927"; }

.fe-truck:before {
  content: "\e928"; }

.fe-zap-off:before {
  content: "\e929"; }

.fe-youtube:before {
  content: "\e92a"; }

@font-face {
  font-family: 'themify';
  src: {{ asset("assets/fonts/themify.eot?-fvbane")}};
  src: {{ asset("assets/fonts/themify.eot?#iefix-fvbane")}} format("embedded-opentype"), {{ asset("assets/fonts/themify.woff?-fvbane")}} format("woff"), {{ asset("assets/fonts/themify.ttf?-fvbane")}} format("truetype"), {{ asset("assets/fonts/themify.svg?-fvbane#themify")}} format("svg");
  font-weight: normal;
  font-style: normal; }

[class^="ti-"], [class*=" ti-"] {
  font-family: 'themify';
  speak: none;
  vertical-align: middle;
  font-style: normal;
  font-weight: normal;
  font-variant: normal;
  text-transform: none;
  line-height: 1;
  /* Better Font Rendering =========== */
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale; }

.ti-wand:before {
  content: "\e600"; }

.ti-volume:before {
  content: "\e601"; }

.ti-user:before {
  content: "\e602"; }

.ti-unlock:before {
  content: "\e603"; }

.ti-unlink:before {
  content: "\e604"; }

.ti-trash:before {
  content: "\e605"; }

.ti-thought:before {
  content: "\e606"; }

.ti-target:before {
  content: "\e607"; }

.ti-tag:before {
  content: "\e608"; }

.ti-tablet:before {
  content: "\e609"; }

.ti-star:before {
  content: "\e60a"; }

.ti-spray:before {
  content: "\e60b"; }

.ti-signal:before {
  content: "\e60c"; }

.ti-shopping-cart:before {
  content: "\e60d"; }

.ti-shopping-cart-full:before {
  content: "\e60e"; }

.ti-settings:before {
  content: "\e60f"; }

.ti-search:before {
  content: "\e610"; }

.ti-zoom-in:before {
  content: "\e611"; }

.ti-zoom-out:before {
  content: "\e612"; }

.ti-cut:before {
  content: "\e613"; }

.ti-ruler:before {
  content: "\e614"; }

.ti-ruler-pencil:before {
  content: "\e615"; }

.ti-ruler-alt:before {
  content: "\e616"; }

.ti-bookmark:before {
  content: "\e617"; }

.ti-bookmark-alt:before {
  content: "\e618"; }

.ti-reload:before {
  content: "\e619"; }

.ti-plus:before {
  content: "\e61a"; }

.ti-pin:before {
  content: "\e61b"; }

.ti-pencil:before {
  content: "\e61c"; }

.ti-pencil-alt:before {
  content: "\e61d"; }

.ti-paint-roller:before {
  content: "\e61e"; }

.ti-paint-bucket:before {
  content: "\e61f"; }

.ti-na:before {
  content: "\e620"; }

.ti-mobile:before {
  content: "\e621"; }

.ti-minus:before {
  content: "\e622"; }

.ti-medall:before {
  content: "\e623"; }

.ti-medall-alt:before {
  content: "\e624"; }

.ti-marker:before {
  content: "\e625"; }

.ti-marker-alt:before {
  content: "\e626"; }

.ti-arrow-up:before {
  content: "\e627"; }

.ti-arrow-right:before {
  content: "\e628"; }

.ti-arrow-left:before {
  content: "\e629"; }

.ti-arrow-down:before {
  content: "\e62a"; }

.ti-lock:before {
  content: "\e62b"; }

.ti-location-arrow:before {
  content: "\e62c"; }

.ti-link:before {
  content: "\e62d"; }

.ti-layout:before {
  content: "\e62e"; }

.ti-layers:before {
  content: "\e62f"; }

.ti-layers-alt:before {
  content: "\e630"; }

.ti-key:before {
  content: "\e631"; }

.ti-import:before {
  content: "\e632"; }

.ti-image:before {
  content: "\e633"; }

.ti-heart:before {
  content: "\e634"; }

.ti-heart-broken:before {
  content: "\e635"; }

.ti-hand-stop:before {
  content: "\e636"; }

.ti-hand-open:before {
  content: "\e637"; }

.ti-hand-drag:before {
  content: "\e638"; }

.ti-folder:before {
  content: "\e639"; }

.ti-flag:before {
  content: "\e63a"; }

.ti-flag-alt:before {
  content: "\e63b"; }

.ti-flag-alt-2:before {
  content: "\e63c"; }

.ti-eye:before {
  content: "\e63d"; }

.ti-export:before {
  content: "\e63e"; }

.ti-exchange-vertical:before {
  content: "\e63f"; }

.ti-desktop:before {
  content: "\e640"; }

.ti-cup:before {
  content: "\e641"; }

.ti-crown:before {
  content: "\e642"; }

.ti-comments:before {
  content: "\e643"; }

.ti-comment:before {
  content: "\e644"; }

.ti-comment-alt:before {
  content: "\e645"; }

.ti-close:before {
  content: "\e646"; }

.ti-clip:before {
  content: "\e647"; }

.ti-angle-up:before {
  content: "\e648"; }

.ti-angle-right:before {
  content: "\e649"; }

.ti-angle-left:before {
  content: "\e64a"; }

.ti-angle-down:before {
  content: "\e64b"; }

.ti-check:before {
  content: "\e64c"; }

.ti-check-box:before {
  content: "\e64d"; }

.ti-camera:before {
  content: "\e64e"; }

.ti-announcement:before {
  content: "\e64f"; }

.ti-brush:before {
  content: "\e650"; }

.ti-briefcase:before {
  content: "\e651"; }

.ti-bolt:before {
  content: "\e652"; }

.ti-bolt-alt:before {
  content: "\e653"; }

.ti-blackboard:before {
  content: "\e654"; }

.ti-bag:before {
  content: "\e655"; }

.ti-move:before {
  content: "\e656"; }

.ti-arrows-vertical:before {
  content: "\e657"; }

.ti-arrows-horizontal:before {
  content: "\e658"; }

.ti-fullscreen:before {
  content: "\e659"; }

.ti-arrow-top-right:before {
  content: "\e65a"; }

.ti-arrow-top-left:before {
  content: "\e65b"; }

.ti-arrow-circle-up:before {
  content: "\e65c"; }

.ti-arrow-circle-right:before {
  content: "\e65d"; }

.ti-arrow-circle-left:before {
  content: "\e65e"; }

.ti-arrow-circle-down:before {
  content: "\e65f"; }

.ti-angle-double-up:before {
  content: "\e660"; }

.ti-angle-double-right:before {
  content: "\e661"; }

.ti-angle-double-left:before {
  content: "\e662"; }

.ti-angle-double-down:before {
  content: "\e663"; }

.ti-zip:before {
  content: "\e664"; }

.ti-world:before {
  content: "\e665"; }

.ti-wheelchair:before {
  content: "\e666"; }

.ti-view-list:before {
  content: "\e667"; }

.ti-view-list-alt:before {
  content: "\e668"; }

.ti-view-grid:before {
  content: "\e669"; }

.ti-uppercase:before {
  content: "\e66a"; }

.ti-upload:before {
  content: "\e66b"; }

.ti-underline:before {
  content: "\e66c"; }

.ti-truck:before {
  content: "\e66d"; }

.ti-timer:before {
  content: "\e66e"; }

.ti-ticket:before {
  content: "\e66f"; }

.ti-thumb-up:before {
  content: "\e670"; }

.ti-thumb-down:before {
  content: "\e671"; }

.ti-text:before {
  content: "\e672"; }

.ti-stats-up:before {
  content: "\e673"; }

.ti-stats-down:before {
  content: "\e674"; }

.ti-split-v:before {
  content: "\e675"; }

.ti-split-h:before {
  content: "\e676"; }

.ti-smallcap:before {
  content: "\e677"; }

.ti-shine:before {
  content: "\e678"; }

.ti-shift-right:before {
  content: "\e679"; }

.ti-shift-left:before {
  content: "\e67a"; }

.ti-shield:before {
  content: "\e67b"; }

.ti-notepad:before {
  content: "\e67c"; }

.ti-server:before {
  content: "\e67d"; }

.ti-quote-right:before {
  content: "\e67e"; }

.ti-quote-left:before {
  content: "\e67f"; }

.ti-pulse:before {
  content: "\e680"; }

.ti-printer:before {
  content: "\e681"; }

.ti-power-off:before {
  content: "\e682"; }

.ti-plug:before {
  content: "\e683"; }

.ti-pie-chart:before {
  content: "\e684"; }

.ti-paragraph:before {
  content: "\e685"; }

.ti-panel:before {
  content: "\e686"; }

.ti-package:before {
  content: "\e687"; }

.ti-music:before {
  content: "\e688"; }

.ti-music-alt:before {
  content: "\e689"; }

.ti-mouse:before {
  content: "\e68a"; }

.ti-mouse-alt:before {
  content: "\e68b"; }

.ti-money:before {
  content: "\e68c"; }

.ti-microphone:before {
  content: "\e68d"; }

.ti-menu:before {
  content: "\e68e"; }

.ti-menu-alt:before {
  content: "\e68f"; }

.ti-map:before {
  content: "\e690"; }

.ti-map-alt:before {
  content: "\e691"; }

.ti-loop:before {
  content: "\e692"; }

.ti-location-pin:before {
  content: "\e693"; }

.ti-list:before {
  content: "\e694"; }

.ti-light-bulb:before {
  content: "\e695"; }

.ti-Italic:before {
  content: "\e696"; }

.ti-info:before {
  content: "\e697"; }

.ti-infinite:before {
  content: "\e698"; }

.ti-id-badge:before {
  content: "\e699"; }

.ti-hummer:before {
  content: "\e69a"; }

.ti-home:before {
  content: "\e69b"; }

.ti-help:before {
  content: "\e69c"; }

.ti-headphone:before {
  content: "\e69d"; }

.ti-harddrives:before {
  content: "\e69e"; }

.ti-harddrive:before {
  content: "\e69f"; }

.ti-gift:before {
  content: "\e6a0"; }

.ti-game:before {
  content: "\e6a1"; }

.ti-filter:before {
  content: "\e6a2"; }

.ti-files:before {
  content: "\e6a3"; }

.ti-file:before {
  content: "\e6a4"; }

.ti-eraser:before {
  content: "\e6a5"; }

.ti-envelope:before {
  content: "\e6a6"; }

.ti-download:before {
  content: "\e6a7"; }

.ti-direction:before {
  content: "\e6a8"; }

.ti-direction-alt:before {
  content: "\e6a9"; }

.ti-dashboard:before {
  content: "\e6aa"; }

.ti-control-stop:before {
  content: "\e6ab"; }

.ti-control-shuffle:before {
  content: "\e6ac"; }

.ti-control-play:before {
  content: "\e6ad"; }

.ti-control-pause:before {
  content: "\e6ae"; }

.ti-control-forward:before {
  content: "\e6af"; }

.ti-control-backward:before {
  content: "\e6b0"; }

.ti-cloud:before {
  content: "\e6b1"; }

.ti-cloud-up:before {
  content: "\e6b2"; }

.ti-cloud-down:before {
  content: "\e6b3"; }

.ti-clipboard:before {
  content: "\e6b4"; }

.ti-car:before {
  content: "\e6b5"; }

.ti-calendar:before {
  content: "\e6b6"; }

.ti-book:before {
  content: "\e6b7"; }

.ti-bell:before {
  content: "\e6b8"; }

.ti-basketball:before {
  content: "\e6b9"; }

.ti-bar-chart:before {
  content: "\e6ba"; }

.ti-bar-chart-alt:before {
  content: "\e6bb"; }

.ti-back-right:before {
  content: "\e6bc"; }

.ti-back-left:before {
  content: "\e6bd"; }

.ti-arrows-corner:before {
  content: "\e6be"; }

.ti-archive:before {
  content: "\e6bf"; }

.ti-anchor:before {
  content: "\e6c0"; }

.ti-align-right:before {
  content: "\e6c1"; }

.ti-align-left:before {
  content: "\e6c2"; }

.ti-align-justify:before {
  content: "\e6c3"; }

.ti-align-center:before {
  content: "\e6c4"; }

.ti-alert:before {
  content: "\e6c5"; }

.ti-alarm-clock:before {
  content: "\e6c6"; }

.ti-agenda:before {
  content: "\e6c7"; }

.ti-write:before {
  content: "\e6c8"; }

.ti-window:before {
  content: "\e6c9"; }

.ti-widgetized:before {
  content: "\e6ca"; }

.ti-widget:before {
  content: "\e6cb"; }

.ti-widget-alt:before {
  content: "\e6cc"; }

.ti-wallet:before {
  content: "\e6cd"; }

.ti-video-clapper:before {
  content: "\e6ce"; }

.ti-video-camera:before {
  content: "\e6cf"; }

.ti-vector:before {
  content: "\e6d0"; }

.ti-themify-logo:before {
  content: "\e6d1"; }

.ti-themify-favicon:before {
  content: "\e6d2"; }

.ti-themify-favicon-alt:before {
  content: "\e6d3"; }

.ti-support:before {
  content: "\e6d4"; }

.ti-stamp:before {
  content: "\e6d5"; }

.ti-split-v-alt:before {
  content: "\e6d6"; }

.ti-slice:before {
  content: "\e6d7"; }

.ti-shortcode:before {
  content: "\e6d8"; }

.ti-shift-right-alt:before {
  content: "\e6d9"; }

.ti-shift-left-alt:before {
  content: "\e6da"; }

.ti-ruler-alt-2:before {
  content: "\e6db"; }

.ti-receipt:before {
  content: "\e6dc"; }

.ti-pin2:before {
  content: "\e6dd"; }

.ti-pin-alt:before {
  content: "\e6de"; }

.ti-pencil-alt2:before {
  content: "\e6df"; }

.ti-palette:before {
  content: "\e6e0"; }

.ti-more:before {
  content: "\e6e1"; }

.ti-more-alt:before {
  content: "\e6e2"; }

.ti-microphone-alt:before {
  content: "\e6e3"; }

.ti-magnet:before {
  content: "\e6e4"; }

.ti-line-double:before {
  content: "\e6e5"; }

.ti-line-dotted:before {
  content: "\e6e6"; }

.ti-line-dashed:before {
  content: "\e6e7"; }

.ti-layout-width-full:before {
  content: "\e6e8"; }

.ti-layout-width-default:before {
  content: "\e6e9"; }

.ti-layout-width-default-alt:before {
  content: "\e6ea"; }

.ti-layout-tab:before {
  content: "\e6eb"; }

.ti-layout-tab-window:before {
  content: "\e6ec"; }

.ti-layout-tab-v:before {
  content: "\e6ed"; }

.ti-layout-tab-min:before {
  content: "\e6ee"; }

.ti-layout-slider:before {
  content: "\e6ef"; }

.ti-layout-slider-alt:before {
  content: "\e6f0"; }

.ti-layout-sidebar-right:before {
  content: "\e6f1"; }

.ti-layout-sidebar-none:before {
  content: "\e6f2"; }

.ti-layout-sidebar-left:before {
  content: "\e6f3"; }

.ti-layout-placeholder:before {
  content: "\e6f4"; }

.ti-layout-menu:before {
  content: "\e6f5"; }

.ti-layout-menu-v:before {
  content: "\e6f6"; }

.ti-layout-menu-separated:before {
  content: "\e6f7"; }

.ti-layout-menu-full:before {
  content: "\e6f8"; }

.ti-layout-media-right-alt:before {
  content: "\e6f9"; }

.ti-layout-media-right:before {
  content: "\e6fa"; }

.ti-layout-media-overlay:before {
  content: "\e6fb"; }

.ti-layout-media-overlay-alt:before {
  content: "\e6fc"; }

.ti-layout-media-overlay-alt-2:before {
  content: "\e6fd"; }

.ti-layout-media-left-alt:before {
  content: "\e6fe"; }

.ti-layout-media-left:before {
  content: "\e6ff"; }

.ti-layout-media-center-alt:before {
  content: "\e700"; }

.ti-layout-media-center:before {
  content: "\e701"; }

.ti-layout-list-thumb:before {
  content: "\e702"; }

.ti-layout-list-thumb-alt:before {
  content: "\e703"; }

.ti-layout-list-post:before {
  content: "\e704"; }

.ti-layout-list-large-image:before {
  content: "\e705"; }

.ti-layout-line-solid:before {
  content: "\e706"; }

.ti-layout-grid4:before {
  content: "\e707"; }

.ti-layout-grid3:before {
  content: "\e708"; }

.ti-layout-grid2:before {
  content: "\e709"; }

.ti-layout-grid2-thumb:before {
  content: "\e70a"; }

.ti-layout-cta-right:before {
  content: "\e70b"; }

.ti-layout-cta-left:before {
  content: "\e70c"; }

.ti-layout-cta-center:before {
  content: "\e70d"; }

.ti-layout-cta-btn-right:before {
  content: "\e70e"; }

.ti-layout-cta-btn-left:before {
  content: "\e70f"; }

.ti-layout-column4:before {
  content: "\e710"; }

.ti-layout-column3:before {
  content: "\e711"; }

.ti-layout-column2:before {
  content: "\e712"; }

.ti-layout-accordion-separated:before {
  content: "\e713"; }

.ti-layout-accordion-merged:before {
  content: "\e714"; }

.ti-layout-accordion-list:before {
  content: "\e715"; }

.ti-ink-pen:before {
  content: "\e716"; }

.ti-info-alt:before {
  content: "\e717"; }

.ti-help-alt:before {
  content: "\e718"; }

.ti-headphone-alt:before {
  content: "\e719"; }

.ti-hand-point-up:before {
  content: "\e71a"; }

.ti-hand-point-right:before {
  content: "\e71b"; }

.ti-hand-point-left:before {
  content: "\e71c"; }

.ti-hand-point-down:before {
  content: "\e71d"; }

.ti-gallery:before {
  content: "\e71e"; }

.ti-face-smile:before {
  content: "\e71f"; }

.ti-face-sad:before {
  content: "\e720"; }

.ti-credit-card:before {
  content: "\e721"; }

.ti-control-skip-forward:before {
  content: "\e722"; }

.ti-control-skip-backward:before {
  content: "\e723"; }

.ti-control-record:before {
  content: "\e724"; }

.ti-control-eject:before {
  content: "\e725"; }

.ti-comments-smiley:before {
  content: "\e726"; }

.ti-brush-alt:before {
  content: "\e727"; }

.ti-youtube:before {
  content: "\e728"; }

.ti-vimeo:before {
  content: "\e729"; }

.ti-twitter:before {
  content: "\e72a"; }

.ti-time:before {
  content: "\e72b"; }

.ti-tumblr:before {
  content: "\e72c"; }

.ti-skype:before {
  content: "\e72d"; }

.ti-share:before {
  content: "\e72e"; }

.ti-share-alt:before {
  content: "\e72f"; }

.ti-rocket:before {
  content: "\e730"; }

.ti-pinterest:before {
  content: "\e731"; }

.ti-new-window:before {
  content: "\e732"; }

.ti-microsoft:before {
  content: "\e733"; }

.ti-list-ol:before {
  content: "\e734"; }

.ti-linkedin:before {
  content: "\e735"; }

.ti-layout-sidebar-2:before {
  content: "\e736"; }

.ti-layout-grid4-alt:before {
  content: "\e737"; }

.ti-layout-grid3-alt:before {
  content: "\e738"; }

.ti-layout-grid2-alt:before {
  content: "\e739"; }

.ti-layout-column4-alt:before {
  content: "\e73a"; }

.ti-layout-column3-alt:before {
  content: "\e73b"; }

.ti-layout-column2-alt:before {
  content: "\e73c"; }

.ti-instagram:before {
  content: "\e73d"; }

.ti-google:before {
  content: "\e73e"; }

.ti-github:before {
  content: "\e73f"; }

.ti-flickr:before {
  content: "\e740"; }

.ti-facebook:before {
  content: "\e741"; }

.ti-dropbox:before {
  content: "\e742"; }

.ti-dribbble:before {
  content: "\e743"; }

.ti-apple:before {
  content: "\e744"; }

.ti-android:before {
  content: "\e745"; }

.ti-save:before {
  content: "\e746"; }

.ti-save-alt:before {
  content: "\e747"; }

.ti-yahoo:before {
  content: "\e748"; }

.ti-wordpress:before {
  content: "\e749"; }

.ti-vimeo-alt:before {
  content: "\e74a"; }

.ti-twitter-alt:before {
  content: "\e74b"; }

.ti-tumblr-alt:before {
  content: "\e74c"; }

.ti-trello:before {
  content: "\e74d"; }

.ti-stack-overflow:before {
  content: "\e74e"; }

.ti-soundcloud:before {
  content: "\e74f"; }

.ti-sharethis:before {
  content: "\e750"; }

.ti-sharethis-alt:before {
  content: "\e751"; }

.ti-reddit:before {
  content: "\e752"; }

.ti-pinterest-alt:before {
  content: "\e753"; }

.ti-microsoft-alt:before {
  content: "\e754"; }

.ti-linux:before {
  content: "\e755"; }

.ti-jsfiddle:before {
  content: "\e756"; }

.ti-joomla:before {
  content: "\e757"; }

.ti-html5:before {
  content: "\e758"; }

.ti-flickr-alt:before {
  content: "\e759"; }

.ti-email:before {
  content: "\e75a"; }

.ti-drupal:before {
  content: "\e75b"; }

.ti-dropbox-alt:before {
  content: "\e75c"; }

.ti-css3:before {
  content: "\e75d"; }

.ti-rss:before {
  content: "\e75e"; }

.ti-rss-alt:before {
  content: "\e75f"; }

/*!
 * Font Awesome Free 5.13.0 by @fontawesome - https://fontawesome.com
 * License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License)
 */
.fa,
.fas,
.far,
.fal,
.fad,
.fab {
  -moz-osx-font-smoothing: grayscale;
  -webkit-font-smoothing: antialiased;
  display: inline-block;
  font-style: normal;
  font-variant: normal;
  text-rendering: auto;
  line-height: 1; }

.fa-lg {
  font-size: 1.33333em;
  line-height: 0.75em;
  vertical-align: -.0667em; }

.fa-xs {
  font-size: .75em; }

.fa-sm {
  font-size: .875em; }

.fa-1x {
  font-size: 1em; }

.fa-2x {
  font-size: 2em; }

.fa-3x {
  font-size: 3em; }

.fa-4x {
  font-size: 4em; }

.fa-5x {
  font-size: 5em; }

.fa-6x {
  font-size: 6em; }

.fa-7x {
  font-size: 7em; }

.fa-8x {
  font-size: 8em; }

.fa-9x {
  font-size: 9em; }

.fa-10x {
  font-size: 10em; }

.fa-fw {
  text-align: center;
  width: 1.25em; }

.fa-ul {
  list-style-type: none;
  margin-left: 2.5em;
  padding-left: 0; }

.fa-ul > li {
  position: relative; }

.fa-li {
  left: -2em;
  position: absolute;
  text-align: center;
  width: 2em;
  line-height: inherit; }

.fa-border {
  border: solid 0.08em #eee;
  border-radius: .1em;
  padding: .2em .25em .15em; }

.fa-pull-left {
  float: left; }

.fa-pull-right {
  float: right; }

.fa.fa-pull-left,
.fas.fa-pull-left,
.far.fa-pull-left,
.fal.fa-pull-left,
.fab.fa-pull-left {
  margin-right: .3em; }

.fa.fa-pull-right,
.fas.fa-pull-right,
.far.fa-pull-right,
.fal.fa-pull-right,
.fab.fa-pull-right {
  margin-left: .3em; }

.fa-spin {
  animation: fa-spin 2s infinite linear; }

.fa-pulse {
  animation: fa-spin 1s infinite steps(8); }

@keyframes fa-spin {
  0% {
    transform: rotate(0deg); }
  100% {
    transform: rotate(360deg); } }

.fa-rotate-90 {
  -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=1)";
  transform: rotate(90deg); }

.fa-rotate-180 {
  -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=2)";
  transform: rotate(180deg); }

.fa-rotate-270 {
  -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=3)";
  transform: rotate(270deg); }

.fa-flip-horizontal {
  -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=0, mirror=1)";
  transform: scale(-1, 1); }

.fa-flip-vertical {
  -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=2, mirror=1)";
  transform: scale(1, -1); }

.fa-flip-both, .fa-flip-horizontal.fa-flip-vertical {
  -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=2, mirror=1)";
  transform: scale(-1, -1); }

:root .fa-rotate-90,
:root .fa-rotate-180,
:root .fa-rotate-270,
:root .fa-flip-horizontal,
:root .fa-flip-vertical,
:root .fa-flip-both {
  filter: none; }

.fa-stack {
  display: inline-block;
  height: 2em;
  line-height: 2em;
  position: relative;
  vertical-align: middle;
  width: 2.5em; }

.fa-stack-1x,
.fa-stack-2x {
  left: 0;
  position: absolute;
  text-align: center;
  width: 100%; }

.fa-stack-1x {
  line-height: inherit; }

.fa-stack-2x {
  font-size: 2em; }

.fa-inverse {
  color: #fff; }

/* Font Awesome uses the Unicode Private Use Area (PUA) to ensure screen
readers do not read off random characters that represent icons */
.fa-500px:before {
  content: "\f26e"; }

.fa-accessible-icon:before {
  content: "\f368"; }

.fa-accusoft:before {
  content: "\f369"; }

.fa-acquisitions-incorporated:before {
  content: "\f6af"; }

.fa-ad:before {
  content: "\f641"; }

.fa-address-book:before {
  content: "\f2b9"; }

.fa-address-card:before {
  content: "\f2bb"; }

.fa-adjust:before {
  content: "\f042"; }

.fa-adn:before {
  content: "\f170"; }

.fa-adobe:before {
  content: "\f778"; }

.fa-adversal:before {
  content: "\f36a"; }

.fa-affiliatetheme:before {
  content: "\f36b"; }

.fa-air-freshener:before {
  content: "\f5d0"; }

.fa-airbnb:before {
  content: "\f834"; }

.fa-algolia:before {
  content: "\f36c"; }

.fa-align-center:before {
  content: "\f037"; }

.fa-align-justify:before {
  content: "\f039"; }

.fa-align-left:before {
  content: "\f036"; }

.fa-align-right:before {
  content: "\f038"; }

.fa-alipay:before {
  content: "\f642"; }

.fa-allergies:before {
  content: "\f461"; }

.fa-amazon:before {
  content: "\f270"; }

.fa-amazon-pay:before {
  content: "\f42c"; }

.fa-ambulance:before {
  content: "\f0f9"; }

.fa-american-sign-language-interpreting:before {
  content: "\f2a3"; }

.fa-amilia:before {
  content: "\f36d"; }

.fa-anchor:before {
  content: "\f13d"; }

.fa-android:before {
  content: "\f17b"; }

.fa-angellist:before {
  content: "\f209"; }

.fa-angle-double-down:before {
  content: "\f103"; }

.fa-angle-double-left:before {
  content: "\f100"; }

.fa-angle-double-right:before {
  content: "\f101"; }

.fa-angle-double-up:before {
  content: "\f102"; }

.fa-angle-down:before {
  content: "\f107"; }

.fa-angle-left:before {
  content: "\f104"; }

.fa-angle-right:before {
  content: "\f105"; }

.fa-angle-up:before {
  content: "\f106"; }

.fa-angry:before {
  content: "\f556"; }

.fa-angrycreative:before {
  content: "\f36e"; }

.fa-angular:before {
  content: "\f420"; }

.fa-ankh:before {
  content: "\f644"; }

.fa-app-store:before {
  content: "\f36f"; }

.fa-app-store-ios:before {
  content: "\f370"; }

.fa-apper:before {
  content: "\f371"; }

.fa-apple:before {
  content: "\f179"; }

.fa-apple-alt:before {
  content: "\f5d1"; }

.fa-apple-pay:before {
  content: "\f415"; }

.fa-archive:before {
  content: "\f187"; }

.fa-archway:before {
  content: "\f557"; }

.fa-arrow-alt-circle-down:before {
  content: "\f358"; }

.fa-arrow-alt-circle-left:before {
  content: "\f359"; }

.fa-arrow-alt-circle-right:before {
  content: "\f35a"; }

.fa-arrow-alt-circle-up:before {
  content: "\f35b"; }

.fa-arrow-circle-down:before {
  content: "\f0ab"; }

.fa-arrow-circle-left:before {
  content: "\f0a8"; }

.fa-arrow-circle-right:before {
  content: "\f0a9"; }

.fa-arrow-circle-up:before {
  content: "\f0aa"; }

.fa-arrow-down:before {
  content: "\f063"; }

.fa-arrow-left:before {
  content: "\f060"; }

.fa-arrow-right:before {
  content: "\f061"; }

.fa-arrow-up:before {
  content: "\f062"; }

.fa-arrows-alt:before {
  content: "\f0b2"; }

.fa-arrows-alt-h:before {
  content: "\f337"; }

.fa-arrows-alt-v:before {
  content: "\f338"; }

.fa-artstation:before {
  content: "\f77a"; }

.fa-assistive-listening-systems:before {
  content: "\f2a2"; }

.fa-asterisk:before {
  content: "\f069"; }

.fa-asymmetrik:before {
  content: "\f372"; }

.fa-at:before {
  content: "\f1fa"; }

.fa-atlas:before {
  content: "\f558"; }

.fa-atlassian:before {
  content: "\f77b"; }

.fa-atom:before {
  content: "\f5d2"; }

.fa-audible:before {
  content: "\f373"; }

.fa-audio-description:before {
  content: "\f29e"; }

.fa-autoprefixer:before {
  content: "\f41c"; }

.fa-avianex:before {
  content: "\f374"; }

.fa-aviato:before {
  content: "\f421"; }

.fa-award:before {
  content: "\f559"; }

.fa-aws:before {
  content: "\f375"; }

.fa-baby:before {
  content: "\f77c"; }

.fa-baby-carriage:before {
  content: "\f77d"; }

.fa-backspace:before {
  content: "\f55a"; }

.fa-backward:before {
  content: "\f04a"; }

.fa-bacon:before {
  content: "\f7e5"; }

.fa-bahai:before {
  content: "\f666"; }

.fa-balance-scale:before {
  content: "\f24e"; }

.fa-balance-scale-left:before {
  content: "\f515"; }

.fa-balance-scale-right:before {
  content: "\f516"; }

.fa-ban:before {
  content: "\f05e"; }

.fa-band-aid:before {
  content: "\f462"; }

.fa-bandcamp:before {
  content: "\f2d5"; }

.fa-barcode:before {
  content: "\f02a"; }

.fa-bars:before {
  content: "\f0c9"; }

.fa-baseball-ball:before {
  content: "\f433"; }

.fa-basketball-ball:before {
  content: "\f434"; }

.fa-bath:before {
  content: "\f2cd"; }

.fa-battery-empty:before {
  content: "\f244"; }

.fa-battery-full:before {
  content: "\f240"; }

.fa-battery-half:before {
  content: "\f242"; }

.fa-battery-quarter:before {
  content: "\f243"; }

.fa-battery-three-quarters:before {
  content: "\f241"; }

.fa-battle-net:before {
  content: "\f835"; }

.fa-bed:before {
  content: "\f236"; }

.fa-beer:before {
  content: "\f0fc"; }

.fa-behance:before {
  content: "\f1b4"; }

.fa-behance-square:before {
  content: "\f1b5"; }

.fa-bell:before {
  content: "\f0f3"; }

.fa-bell-slash:before {
  content: "\f1f6"; }

.fa-bezier-curve:before {
  content: "\f55b"; }

.fa-bible:before {
  content: "\f647"; }

.fa-bicycle:before {
  content: "\f206"; }

.fa-biking:before {
  content: "\f84a"; }

.fa-bimobject:before {
  content: "\f378"; }

.fa-binoculars:before {
  content: "\f1e5"; }

.fa-biohazard:before {
  content: "\f780"; }

.fa-birthday-cake:before {
  content: "\f1fd"; }

.fa-bitbucket:before {
  content: "\f171"; }

.fa-bitcoin:before {
  content: "\f379"; }

.fa-bity:before {
  content: "\f37a"; }

.fa-black-tie:before {
  content: "\f27e"; }

.fa-blackberry:before {
  content: "\f37b"; }

.fa-blender:before {
  content: "\f517"; }

.fa-blender-phone:before {
  content: "\f6b6"; }

.fa-blind:before {
  content: "\f29d"; }

.fa-blog:before {
  content: "\f781"; }

.fa-blogger:before {
  content: "\f37c"; }

.fa-blogger-b:before {
  content: "\f37d"; }

.fa-bluetooth:before {
  content: "\f293"; }

.fa-bluetooth-b:before {
  content: "\f294"; }

.fa-bold:before {
  content: "\f032"; }

.fa-bolt:before {
  content: "\f0e7"; }

.fa-bomb:before {
  content: "\f1e2"; }

.fa-bone:before {
  content: "\f5d7"; }

.fa-bong:before {
  content: "\f55c"; }

.fa-book:before {
  content: "\f02d"; }

.fa-book-dead:before {
  content: "\f6b7"; }

.fa-book-medical:before {
  content: "\f7e6"; }

.fa-book-open:before {
  content: "\f518"; }

.fa-book-reader:before {
  content: "\f5da"; }

.fa-bookmark:before {
  content: "\f02e"; }

.fa-bootstrap:before {
  content: "\f836"; }

.fa-border-all:before {
  content: "\f84c"; }

.fa-border-none:before {
  content: "\f850"; }

.fa-border-style:before {
  content: "\f853"; }

.fa-bowling-ball:before {
  content: "\f436"; }

.fa-box:before {
  content: "\f466"; }

.fa-box-open:before {
  content: "\f49e"; }

.fa-box-tissue:before {
  content: "\f95b"; }

.fa-boxes:before {
  content: "\f468"; }

.fa-braille:before {
  content: "\f2a1"; }

.fa-brain:before {
  content: "\f5dc"; }

.fa-bread-slice:before {
  content: "\f7ec"; }

.fa-briefcase:before {
  content: "\f0b1"; }

.fa-briefcase-medical:before {
  content: "\f469"; }

.fa-broadcast-tower:before {
  content: "\f519"; }

.fa-broom:before {
  content: "\f51a"; }

.fa-brush:before {
  content: "\f55d"; }

.fa-btc:before {
  content: "\f15a"; }

.fa-buffer:before {
  content: "\f837"; }

.fa-bug:before {
  content: "\f188"; }

.fa-building:before {
  content: "\f1ad"; }

.fa-bullhorn:before {
  content: "\f0a1"; }

.fa-bullseye:before {
  content: "\f140"; }

.fa-burn:before {
  content: "\f46a"; }

.fa-buromobelexperte:before {
  content: "\f37f"; }

.fa-bus:before {
  content: "\f207"; }

.fa-bus-alt:before {
  content: "\f55e"; }

.fa-business-time:before {
  content: "\f64a"; }

.fa-buy-n-large:before {
  content: "\f8a6"; }

.fa-buysellads:before {
  content: "\f20d"; }

.fa-calculator:before {
  content: "\f1ec"; }

.fa-calendar:before {
  content: "\f133"; }

.fa-calendar-alt:before {
  content: "\f073"; }

.fa-calendar-check:before {
  content: "\f274"; }

.fa-calendar-day:before {
  content: "\f783"; }

.fa-calendar-minus:before {
  content: "\f272"; }

.fa-calendar-plus:before {
  content: "\f271"; }

.fa-calendar-times:before {
  content: "\f273"; }

.fa-calendar-week:before {
  content: "\f784"; }

.fa-camera:before {
  content: "\f030"; }

.fa-camera-retro:before {
  content: "\f083"; }

.fa-campground:before {
  content: "\f6bb"; }

.fa-canadian-maple-leaf:before {
  content: "\f785"; }

.fa-candy-cane:before {
  content: "\f786"; }

.fa-cannabis:before {
  content: "\f55f"; }

.fa-capsules:before {
  content: "\f46b"; }

.fa-car:before {
  content: "\f1b9"; }

.fa-car-alt:before {
  content: "\f5de"; }

.fa-car-battery:before {
  content: "\f5df"; }

.fa-car-crash:before {
  content: "\f5e1"; }

.fa-car-side:before {
  content: "\f5e4"; }

.fa-caravan:before {
  content: "\f8ff"; }

.fa-caret-down:before {
  content: "\f0d7"; }

.fa-caret-left:before {
  content: "\f0d9"; }

.fa-caret-right:before {
  content: "\f0da"; }

.fa-caret-square-down:before {
  content: "\f150"; }

.fa-caret-square-left:before {
  content: "\f191"; }

.fa-caret-square-right:before {
  content: "\f152"; }

.fa-caret-square-up:before {
  content: "\f151"; }

.fa-caret-up:before {
  content: "\f0d8"; }

.fa-carrot:before {
  content: "\f787"; }

.fa-cart-arrow-down:before {
  content: "\f218"; }

.fa-cart-plus:before {
  content: "\f217"; }

.fa-cash-register:before {
  content: "\f788"; }

.fa-cat:before {
  content: "\f6be"; }

.fa-cc-amazon-pay:before {
  content: "\f42d"; }

.fa-cc-amex:before {
  content: "\f1f3"; }

.fa-cc-apple-pay:before {
  content: "\f416"; }

.fa-cc-diners-club:before {
  content: "\f24c"; }

.fa-cc-discover:before {
  content: "\f1f2"; }

.fa-cc-jcb:before {
  content: "\f24b"; }

.fa-cc-mastercard:before {
  content: "\f1f1"; }

.fa-cc-paypal:before {
  content: "\f1f4"; }

.fa-cc-stripe:before {
  content: "\f1f5"; }

.fa-cc-visa:before {
  content: "\f1f0"; }

.fa-centercode:before {
  content: "\f380"; }

.fa-centos:before {
  content: "\f789"; }

.fa-certificate:before {
  content: "\f0a3"; }

.fa-chair:before {
  content: "\f6c0"; }

.fa-chalkboard:before {
  content: "\f51b"; }

.fa-chalkboard-teacher:before {
  content: "\f51c"; }

.fa-charging-station:before {
  content: "\f5e7"; }

.fa-chart-area:before {
  content: "\f1fe"; }

.fa-chart-bar:before {
  content: "\f080"; }

.fa-chart-line:before {
  content: "\f201"; }

.fa-chart-pie:before {
  content: "\f200"; }

.fa-check:before {
  content: "\f00c"; }

.fa-check-circle:before {
  content: "\f058"; }

.fa-check-double:before {
  content: "\f560"; }

.fa-check-square:before {
  content: "\f14a"; }

.fa-cheese:before {
  content: "\f7ef"; }

.fa-chess:before {
  content: "\f439"; }

.fa-chess-bishop:before {
  content: "\f43a"; }

.fa-chess-board:before {
  content: "\f43c"; }

.fa-chess-king:before {
  content: "\f43f"; }

.fa-chess-knight:before {
  content: "\f441"; }

.fa-chess-pawn:before {
  content: "\f443"; }

.fa-chess-queen:before {
  content: "\f445"; }

.fa-chess-rook:before {
  content: "\f447"; }

.fa-chevron-circle-down:before {
  content: "\f13a"; }

.fa-chevron-circle-left:before {
  content: "\f137"; }

.fa-chevron-circle-right:before {
  content: "\f138"; }

.fa-chevron-circle-up:before {
  content: "\f139"; }

.fa-chevron-down:before {
  content: "\f078"; }

.fa-chevron-left:before {
  content: "\f053"; }

.fa-chevron-right:before {
  content: "\f054"; }

.fa-chevron-up:before {
  content: "\f077"; }

.fa-child:before {
  content: "\f1ae"; }

.fa-chrome:before {
  content: "\f268"; }

.fa-chromecast:before {
  content: "\f838"; }

.fa-church:before {
  content: "\f51d"; }

.fa-circle:before {
  content: "\f111"; }

.fa-circle-notch:before {
  content: "\f1ce"; }

.fa-city:before {
  content: "\f64f"; }

.fa-clinic-medical:before {
  content: "\f7f2"; }

.fa-clipboard:before {
  content: "\f328"; }

.fa-clipboard-check:before {
  content: "\f46c"; }

.fa-clipboard-list:before {
  content: "\f46d"; }

.fa-clock:before {
  content: "\f017"; }

.fa-clone:before {
  content: "\f24d"; }

.fa-closed-captioning:before {
  content: "\f20a"; }

.fa-cloud:before {
  content: "\f0c2"; }

.fa-cloud-download-alt:before {
  content: "\f381"; }

.fa-cloud-meatball:before {
  content: "\f73b"; }

.fa-cloud-moon:before {
  content: "\f6c3"; }

.fa-cloud-moon-rain:before {
  content: "\f73c"; }

.fa-cloud-rain:before {
  content: "\f73d"; }

.fa-cloud-showers-heavy:before {
  content: "\f740"; }

.fa-cloud-sun:before {
  content: "\f6c4"; }

.fa-cloud-sun-rain:before {
  content: "\f743"; }

.fa-cloud-upload-alt:before {
  content: "\f382"; }

.fa-cloudscale:before {
  content: "\f383"; }

.fa-cloudsmith:before {
  content: "\f384"; }

.fa-cloudversify:before {
  content: "\f385"; }

.fa-cocktail:before {
  content: "\f561"; }

.fa-code:before {
  content: "\f121"; }

.fa-code-branch:before {
  content: "\f126"; }

.fa-codepen:before {
  content: "\f1cb"; }

.fa-codiepie:before {
  content: "\f284"; }

.fa-coffee:before {
  content: "\f0f4"; }

.fa-cog:before {
  content: "\f013"; }

.fa-cogs:before {
  content: "\f085"; }

.fa-coins:before {
  content: "\f51e"; }

.fa-columns:before {
  content: "\f0db"; }

.fa-comment:before {
  content: "\f075"; }

.fa-comment-alt:before {
  content: "\f27a"; }

.fa-comment-dollar:before {
  content: "\f651"; }

.fa-comment-dots:before {
  content: "\f4ad"; }

.fa-comment-medical:before {
  content: "\f7f5"; }

.fa-comment-slash:before {
  content: "\f4b3"; }

.fa-comments:before {
  content: "\f086"; }

.fa-comments-dollar:before {
  content: "\f653"; }

.fa-compact-disc:before {
  content: "\f51f"; }

.fa-compass:before {
  content: "\f14e"; }

.fa-compress:before {
  content: "\f066"; }

.fa-compress-alt:before {
  content: "\f422"; }

.fa-compress-arrows-alt:before {
  content: "\f78c"; }

.fa-concierge-bell:before {
  content: "\f562"; }

.fa-confluence:before {
  content: "\f78d"; }

.fa-connectdevelop:before {
  content: "\f20e"; }

.fa-contao:before {
  content: "\f26d"; }

.fa-cookie:before {
  content: "\f563"; }

.fa-cookie-bite:before {
  content: "\f564"; }

.fa-copy:before {
  content: "\f0c5"; }

.fa-copyright:before {
  content: "\f1f9"; }

.fa-cotton-bureau:before {
  content: "\f89e"; }

.fa-couch:before {
  content: "\f4b8"; }

.fa-cpanel:before {
  content: "\f388"; }

.fa-creative-commons:before {
  content: "\f25e"; }

.fa-creative-commons-by:before {
  content: "\f4e7"; }

.fa-creative-commons-nc:before {
  content: "\f4e8"; }

.fa-creative-commons-nc-eu:before {
  content: "\f4e9"; }

.fa-creative-commons-nc-jp:before {
  content: "\f4ea"; }

.fa-creative-commons-nd:before {
  content: "\f4eb"; }

.fa-creative-commons-pd:before {
  content: "\f4ec"; }

.fa-creative-commons-pd-alt:before {
  content: "\f4ed"; }

.fa-creative-commons-remix:before {
  content: "\f4ee"; }

.fa-creative-commons-sa:before {
  content: "\f4ef"; }

.fa-creative-commons-sampling:before {
  content: "\f4f0"; }

.fa-creative-commons-sampling-plus:before {
  content: "\f4f1"; }

.fa-creative-commons-share:before {
  content: "\f4f2"; }

.fa-creative-commons-zero:before {
  content: "\f4f3"; }

.fa-credit-card:before {
  content: "\f09d"; }

.fa-critical-role:before {
  content: "\f6c9"; }

.fa-crop:before {
  content: "\f125"; }

.fa-crop-alt:before {
  content: "\f565"; }

.fa-cross:before {
  content: "\f654"; }

.fa-crosshairs:before {
  content: "\f05b"; }

.fa-crow:before {
  content: "\f520"; }

.fa-crown:before {
  content: "\f521"; }

.fa-crutch:before {
  content: "\f7f7"; }

.fa-css3:before {
  content: "\f13c"; }

.fa-css3-alt:before {
  content: "\f38b"; }

.fa-cube:before {
  content: "\f1b2"; }

.fa-cubes:before {
  content: "\f1b3"; }

.fa-cut:before {
  content: "\f0c4"; }

.fa-cuttlefish:before {
  content: "\f38c"; }

.fa-d-and-d:before {
  content: "\f38d"; }

.fa-d-and-d-beyond:before {
  content: "\f6ca"; }

.fa-dailymotion:before {
  content: "\f952"; }

.fa-dashcube:before {
  content: "\f210"; }

.fa-database:before {
  content: "\f1c0"; }

.fa-deaf:before {
  content: "\f2a4"; }

.fa-delicious:before {
  content: "\f1a5"; }

.fa-democrat:before {
  content: "\f747"; }

.fa-deploydog:before {
  content: "\f38e"; }

.fa-deskpro:before {
  content: "\f38f"; }

.fa-desktop:before {
  content: "\f108"; }

.fa-dev:before {
  content: "\f6cc"; }

.fa-deviantart:before {
  content: "\f1bd"; }

.fa-dharmachakra:before {
  content: "\f655"; }

.fa-dhl:before {
  content: "\f790"; }

.fa-diagnoses:before {
  content: "\f470"; }

.fa-diaspora:before {
  content: "\f791"; }

.fa-dice:before {
  content: "\f522"; }

.fa-dice-d20:before {
  content: "\f6cf"; }

.fa-dice-d6:before {
  content: "\f6d1"; }

.fa-dice-five:before {
  content: "\f523"; }

.fa-dice-four:before {
  content: "\f524"; }

.fa-dice-one:before {
  content: "\f525"; }

.fa-dice-six:before {
  content: "\f526"; }

.fa-dice-three:before {
  content: "\f527"; }

.fa-dice-two:before {
  content: "\f528"; }

.fa-digg:before {
  content: "\f1a6"; }

.fa-digital-ocean:before {
  content: "\f391"; }

.fa-digital-tachograph:before {
  content: "\f566"; }

.fa-directions:before {
  content: "\f5eb"; }

.fa-discord:before {
  content: "\f392"; }

.fa-discourse:before {
  content: "\f393"; }

.fa-disease:before {
  content: "\f7fa"; }

.fa-divide:before {
  content: "\f529"; }

.fa-dizzy:before {
  content: "\f567"; }

.fa-dna:before {
  content: "\f471"; }

.fa-dochub:before {
  content: "\f394"; }

.fa-docker:before {
  content: "\f395"; }

.fa-dog:before {
  content: "\f6d3"; }

.fa-dollar-sign:before {
  content: "\f155"; }

.fa-dolly:before {
  content: "\f472"; }

.fa-dolly-flatbed:before {
  content: "\f474"; }

.fa-donate:before {
  content: "\f4b9"; }

.fa-door-closed:before {
  content: "\f52a"; }

.fa-door-open:before {
  content: "\f52b"; }

.fa-dot-circle:before {
  content: "\f192"; }

.fa-dove:before {
  content: "\f4ba"; }

.fa-download:before {
  content: "\f019"; }

.fa-draft2digital:before {
  content: "\f396"; }

.fa-drafting-compass:before {
  content: "\f568"; }

.fa-dragon:before {
  content: "\f6d5"; }

.fa-draw-polygon:before {
  content: "\f5ee"; }

.fa-dribbble:before {
  content: "\f17d"; }

.fa-dribbble-square:before {
  content: "\f397"; }

.fa-dropbox:before {
  content: "\f16b"; }

.fa-drum:before {
  content: "\f569"; }

.fa-drum-steelpan:before {
  content: "\f56a"; }

.fa-drumstick-bite:before {
  content: "\f6d7"; }

.fa-drupal:before {
  content: "\f1a9"; }

.fa-dumbbell:before {
  content: "\f44b"; }

.fa-dumpster:before {
  content: "\f793"; }

.fa-dumpster-fire:before {
  content: "\f794"; }

.fa-dungeon:before {
  content: "\f6d9"; }

.fa-dyalog:before {
  content: "\f399"; }

.fa-earlybirds:before {
  content: "\f39a"; }

.fa-ebay:before {
  content: "\f4f4"; }

.fa-edge:before {
  content: "\f282"; }

.fa-edit:before {
  content: "\f044"; }

.fa-egg:before {
  content: "\f7fb"; }

.fa-eject:before {
  content: "\f052"; }

.fa-elementor:before {
  content: "\f430"; }

.fa-ellipsis-h:before {
  content: "\f141"; }

.fa-ellipsis-v:before {
  content: "\f142"; }

.fa-ello:before {
  content: "\f5f1"; }

.fa-ember:before {
  content: "\f423"; }

.fa-empire:before {
  content: "\f1d1"; }

.fa-envelope:before {
  content: "\f0e0"; }

.fa-envelope-open:before {
  content: "\f2b6"; }

.fa-envelope-open-text:before {
  content: "\f658"; }

.fa-envelope-square:before {
  content: "\f199"; }

.fa-envira:before {
  content: "\f299"; }

.fa-equals:before {
  content: "\f52c"; }

.fa-eraser:before {
  content: "\f12d"; }

.fa-erlang:before {
  content: "\f39d"; }

.fa-ethereum:before {
  content: "\f42e"; }

.fa-ethernet:before {
  content: "\f796"; }

.fa-etsy:before {
  content: "\f2d7"; }

.fa-euro-sign:before {
  content: "\f153"; }

.fa-evernote:before {
  content: "\f839"; }

.fa-exchange-alt:before {
  content: "\f362"; }

.fa-exclamation:before {
  content: "\f12a"; }

.fa-exclamation-circle:before {
  content: "\f06a"; }

.fa-exclamation-triangle:before {
  content: "\f071"; }

.fa-expand:before {
  content: "\f065"; }

.fa-expand-alt:before {
  content: "\f424"; }

.fa-expand-arrows-alt:before {
  content: "\f31e"; }

.fa-expeditedssl:before {
  content: "\f23e"; }

.fa-external-link-alt:before {
  content: "\f35d"; }

.fa-external-link-square-alt:before {
  content: "\f360"; }

.fa-eye:before {
  content: "\f06e"; }

.fa-eye-dropper:before {
  content: "\f1fb"; }

.fa-eye-slash:before {
  content: "\f070"; }

.fa-facebook:before {
  content: "\f09a"; }

.fa-facebook-f:before {
  content: "\f39e"; }

.fa-facebook-messenger:before {
  content: "\f39f"; }

.fa-facebook-square:before {
  content: "\f082"; }

.fa-fan:before {
  content: "\f863"; }

.fa-fantasy-flight-games:before {
  content: "\f6dc"; }

.fa-fast-backward:before {
  content: "\f049"; }

.fa-fast-forward:before {
  content: "\f050"; }

.fa-faucet:before {
  content: "\f905"; }

.fa-fax:before {
  content: "\f1ac"; }

.fa-feather:before {
  content: "\f52d"; }

.fa-feather-alt:before {
  content: "\f56b"; }

.fa-fedex:before {
  content: "\f797"; }

.fa-fedora:before {
  content: "\f798"; }

.fa-female:before {
  content: "\f182"; }

.fa-fighter-jet:before {
  content: "\f0fb"; }

.fa-figma:before {
  content: "\f799"; }

.fa-file:before {
  content: "\f15b"; }

.fa-file-alt:before {
  content: "\f15c"; }

.fa-file-archive:before {
  content: "\f1c6"; }

.fa-file-audio:before {
  content: "\f1c7"; }

.fa-file-code:before {
  content: "\f1c9"; }

.fa-file-contract:before {
  content: "\f56c"; }

.fa-file-csv:before {
  content: "\f6dd"; }

.fa-file-download:before {
  content: "\f56d"; }

.fa-file-excel:before {
  content: "\f1c3"; }

.fa-file-export:before {
  content: "\f56e"; }

.fa-file-image:before {
  content: "\f1c5"; }

.fa-file-import:before {
  content: "\f56f"; }

.fa-file-invoice:before {
  content: "\f570"; }

.fa-file-invoice-dollar:before {
  content: "\f571"; }

.fa-file-medical:before {
  content: "\f477"; }

.fa-file-medical-alt:before {
  content: "\f478"; }

.fa-file-pdf:before {
  content: "\f1c1"; }

.fa-file-powerpoint:before {
  content: "\f1c4"; }

.fa-file-prescription:before {
  content: "\f572"; }

.fa-file-signature:before {
  content: "\f573"; }

.fa-file-upload:before {
  content: "\f574"; }

.fa-file-video:before {
  content: "\f1c8"; }

.fa-file-word:before {
  content: "\f1c2"; }

.fa-fill:before {
  content: "\f575"; }

.fa-fill-drip:before {
  content: "\f576"; }

.fa-film:before {
  content: "\f008"; }

.fa-filter:before {
  content: "\f0b0"; }

.fa-fingerprint:before {
  content: "\f577"; }

.fa-fire:before {
  content: "\f06d"; }

.fa-fire-alt:before {
  content: "\f7e4"; }

.fa-fire-extinguisher:before {
  content: "\f134"; }

.fa-firefox:before {
  content: "\f269"; }

.fa-firefox-browser:before {
  content: "\f907"; }

.fa-first-aid:before {
  content: "\f479"; }

.fa-first-order:before {
  content: "\f2b0"; }

.fa-first-order-alt:before {
  content: "\f50a"; }

.fa-firstdraft:before {
  content: "\f3a1"; }

.fa-fish:before {
  content: "\f578"; }

.fa-fist-raised:before {
  content: "\f6de"; }

.fa-flag:before {
  content: "\f024"; }

.fa-flag-checkered:before {
  content: "\f11e"; }

.fa-flag-usa:before {
  content: "\f74d"; }

.fa-flask:before {
  content: "\f0c3"; }

.fa-flickr:before {
  content: "\f16e"; }

.fa-flipboard:before {
  content: "\f44d"; }

.fa-flushed:before {
  content: "\f579"; }

.fa-fly:before {
  content: "\f417"; }

.fa-folder:before {
  content: "\f07b"; }

.fa-folder-minus:before {
  content: "\f65d"; }

.fa-folder-open:before {
  content: "\f07c"; }

.fa-folder-plus:before {
  content: "\f65e"; }

.fa-font:before {
  content: "\f031"; }

.fa-font-awesome:before {
  content: "\f2b4"; }

.fa-font-awesome-alt:before {
  content: "\f35c"; }

.fa-font-awesome-flag:before {
  content: "\f425"; }

.fa-font-awesome-logo-full:before {
  content: "\f4e6"; }

.fa-fonticons:before {
  content: "\f280"; }

.fa-fonticons-fi:before {
  content: "\f3a2"; }

.fa-football-ball:before {
  content: "\f44e"; }

.fa-fort-awesome:before {
  content: "\f286"; }

.fa-fort-awesome-alt:before {
  content: "\f3a3"; }

.fa-forumbee:before {
  content: "\f211"; }

.fa-forward:before {
  content: "\f04e"; }

.fa-foursquare:before {
  content: "\f180"; }

.fa-free-code-camp:before {
  content: "\f2c5"; }

.fa-freebsd:before {
  content: "\f3a4"; }

.fa-frog:before {
  content: "\f52e"; }

.fa-frown:before {
  content: "\f119"; }

.fa-frown-open:before {
  content: "\f57a"; }

.fa-fulcrum:before {
  content: "\f50b"; }

.fa-funnel-dollar:before {
  content: "\f662"; }

.fa-futbol:before {
  content: "\f1e3"; }

.fa-galactic-republic:before {
  content: "\f50c"; }

.fa-galactic-senate:before {
  content: "\f50d"; }

.fa-gamepad:before {
  content: "\f11b"; }

.fa-gas-pump:before {
  content: "\f52f"; }

.fa-gavel:before {
  content: "\f0e3"; }

.fa-gem:before {
  content: "\f3a5"; }

.fa-genderless:before {
  content: "\f22d"; }

.fa-get-pocket:before {
  content: "\f265"; }

.fa-gg:before {
  content: "\f260"; }

.fa-gg-circle:before {
  content: "\f261"; }

.fa-ghost:before {
  content: "\f6e2"; }

.fa-gift:before {
  content: "\f06b"; }

.fa-gifts:before {
  content: "\f79c"; }

.fa-git:before {
  content: "\f1d3"; }

.fa-git-alt:before {
  content: "\f841"; }

.fa-git-square:before {
  content: "\f1d2"; }

.fa-github:before {
  content: "\f09b"; }

.fa-github-alt:before {
  content: "\f113"; }

.fa-github-square:before {
  content: "\f092"; }

.fa-gitkraken:before {
  content: "\f3a6"; }

.fa-gitlab:before {
  content: "\f296"; }

.fa-gitter:before {
  content: "\f426"; }

.fa-glass-cheers:before {
  content: "\f79f"; }

.fa-glass-martini:before {
  content: "\f000"; }

.fa-glass-martini-alt:before {
  content: "\f57b"; }

.fa-glass-whiskey:before {
  content: "\f7a0"; }

.fa-glasses:before {
  content: "\f530"; }

.fa-glide:before {
  content: "\f2a5"; }

.fa-glide-g:before {
  content: "\f2a6"; }

.fa-globe:before {
  content: "\f0ac"; }

.fa-globe-africa:before {
  content: "\f57c"; }

.fa-globe-americas:before {
  content: "\f57d"; }

.fa-globe-asia:before {
  content: "\f57e"; }

.fa-globe-europe:before {
  content: "\f7a2"; }

.fa-gofore:before {
  content: "\f3a7"; }

.fa-golf-ball:before {
  content: "\f450"; }

.fa-goodreads:before {
  content: "\f3a8"; }

.fa-goodreads-g:before {
  content: "\f3a9"; }

.fa-google:before {
  content: "\f1a0"; }

.fa-google-drive:before {
  content: "\f3aa"; }

.fa-google-play:before {
  content: "\f3ab"; }

.fa-google-plus:before {
  content: "\f2b3"; }

.fa-google-plus-g:before {
  content: "\f0d5"; }

.fa-google-plus-square:before {
  content: "\f0d4"; }

.fa-google-wallet:before {
  content: "\f1ee"; }

.fa-gopuram:before {
  content: "\f664"; }

.fa-graduation-cap:before {
  content: "\f19d"; }

.fa-gratipay:before {
  content: "\f184"; }

.fa-grav:before {
  content: "\f2d6"; }

.fa-greater-than:before {
  content: "\f531"; }

.fa-greater-than-equal:before {
  content: "\f532"; }

.fa-grimace:before {
  content: "\f57f"; }

.fa-grin:before {
  content: "\f580"; }

.fa-grin-alt:before {
  content: "\f581"; }

.fa-grin-beam:before {
  content: "\f582"; }

.fa-grin-beam-sweat:before {
  content: "\f583"; }

.fa-grin-hearts:before {
  content: "\f584"; }

.fa-grin-squint:before {
  content: "\f585"; }

.fa-grin-squint-tears:before {
  content: "\f586"; }

.fa-grin-stars:before {
  content: "\f587"; }

.fa-grin-tears:before {
  content: "\f588"; }

.fa-grin-tongue:before {
  content: "\f589"; }

.fa-grin-tongue-squint:before {
  content: "\f58a"; }

.fa-grin-tongue-wink:before {
  content: "\f58b"; }

.fa-grin-wink:before {
  content: "\f58c"; }

.fa-grip-horizontal:before {
  content: "\f58d"; }

.fa-grip-lines:before {
  content: "\f7a4"; }

.fa-grip-lines-vertical:before {
  content: "\f7a5"; }

.fa-grip-vertical:before {
  content: "\f58e"; }

.fa-gripfire:before {
  content: "\f3ac"; }

.fa-grunt:before {
  content: "\f3ad"; }

.fa-guitar:before {
  content: "\f7a6"; }

.fa-gulp:before {
  content: "\f3ae"; }

.fa-h-square:before {
  content: "\f0fd"; }

.fa-hacker-news:before {
  content: "\f1d4"; }

.fa-hacker-news-square:before {
  content: "\f3af"; }

.fa-hackerrank:before {
  content: "\f5f7"; }

.fa-hamburger:before {
  content: "\f805"; }

.fa-hammer:before {
  content: "\f6e3"; }

.fa-hamsa:before {
  content: "\f665"; }

.fa-hand-holding:before {
  content: "\f4bd"; }

.fa-hand-holding-heart:before {
  content: "\f4be"; }

.fa-hand-holding-medical:before {
  content: "\f95c"; }

.fa-hand-holding-usd:before {
  content: "\f4c0"; }

.fa-hand-holding-water:before {
  content: "\f4c1"; }

.fa-hand-lizard:before {
  content: "\f258"; }

.fa-hand-middle-finger:before {
  content: "\f806"; }

.fa-hand-paper:before {
  content: "\f256"; }

.fa-hand-peace:before {
  content: "\f25b"; }

.fa-hand-point-down:before {
  content: "\f0a7"; }

.fa-hand-point-left:before {
  content: "\f0a5"; }

.fa-hand-point-right:before {
  content: "\f0a4"; }

.fa-hand-point-up:before {
  content: "\f0a6"; }

.fa-hand-pointer:before {
  content: "\f25a"; }

.fa-hand-rock:before {
  content: "\f255"; }

.fa-hand-scissors:before {
  content: "\f257"; }

.fa-hand-sparkles:before {
  content: "\f95d"; }

.fa-hand-spock:before {
  content: "\f259"; }

.fa-hands:before {
  content: "\f4c2"; }

.fa-hands-helping:before {
  content: "\f4c4"; }

.fa-hands-wash:before {
  content: "\f95e"; }

.fa-handshake:before {
  content: "\f2b5"; }

.fa-handshake-alt-slash:before {
  content: "\f95f"; }

.fa-handshake-slash:before {
  content: "\f960"; }

.fa-hanukiah:before {
  content: "\f6e6"; }

.fa-hard-hat:before {
  content: "\f807"; }

.fa-hashtag:before {
  content: "\f292"; }

.fa-hat-cowboy:before {
  content: "\f8c0"; }

.fa-hat-cowboy-side:before {
  content: "\f8c1"; }

.fa-hat-wizard:before {
  content: "\f6e8"; }

.fa-hdd:before {
  content: "\f0a0"; }

.fa-head-side-cough:before {
  content: "\f961"; }

.fa-head-side-cough-slash:before {
  content: "\f962"; }

.fa-head-side-mask:before {
  content: "\f963"; }

.fa-head-side-virus:before {
  content: "\f964"; }

.fa-heading:before {
  content: "\f1dc"; }

.fa-headphones:before {
  content: "\f025"; }

.fa-headphones-alt:before {
  content: "\f58f"; }

.fa-headset:before {
  content: "\f590"; }

.fa-heart:before {
  content: "\f004"; }

.fa-heart-broken:before {
  content: "\f7a9"; }

.fa-heartbeat:before {
  content: "\f21e"; }

.fa-helicopter:before {
  content: "\f533"; }

.fa-highlighter:before {
  content: "\f591"; }

.fa-hiking:before {
  content: "\f6ec"; }

.fa-hippo:before {
  content: "\f6ed"; }

.fa-hips:before {
  content: "\f452"; }

.fa-hire-a-helper:before {
  content: "\f3b0"; }

.fa-history:before {
  content: "\f1da"; }

.fa-hockey-puck:before {
  content: "\f453"; }

.fa-holly-berry:before {
  content: "\f7aa"; }

.fa-home:before {
  content: "\f015"; }

.fa-hooli:before {
  content: "\f427"; }

.fa-hornbill:before {
  content: "\f592"; }

.fa-horse:before {
  content: "\f6f0"; }

.fa-horse-head:before {
  content: "\f7ab"; }

.fa-hospital:before {
  content: "\f0f8"; }

.fa-hospital-alt:before {
  content: "\f47d"; }

.fa-hospital-symbol:before {
  content: "\f47e"; }

.fa-hospital-user:before {
  content: "\f80d"; }

.fa-hot-tub:before {
  content: "\f593"; }

.fa-hotdog:before {
  content: "\f80f"; }

.fa-hotel:before {
  content: "\f594"; }

.fa-hotjar:before {
  content: "\f3b1"; }

.fa-hourglass:before {
  content: "\f254"; }

.fa-hourglass-end:before {
  content: "\f253"; }

.fa-hourglass-half:before {
  content: "\f252"; }

.fa-hourglass-start:before {
  content: "\f251"; }

.fa-house-damage:before {
  content: "\f6f1"; }

.fa-house-user:before {
  content: "\f965"; }

.fa-houzz:before {
  content: "\f27c"; }

.fa-hryvnia:before {
  content: "\f6f2"; }

.fa-html5:before {
  content: "\f13b"; }

.fa-hubspot:before {
  content: "\f3b2"; }

.fa-i-cursor:before {
  content: "\f246"; }

.fa-ice-cream:before {
  content: "\f810"; }

.fa-icicles:before {
  content: "\f7ad"; }

.fa-icons:before {
  content: "\f86d"; }

.fa-id-badge:before {
  content: "\f2c1"; }

.fa-id-card:before {
  content: "\f2c2"; }

.fa-id-card-alt:before {
  content: "\f47f"; }

.fa-ideal:before {
  content: "\f913"; }

.fa-igloo:before {
  content: "\f7ae"; }

.fa-image:before {
  content: "\f03e"; }

.fa-images:before {
  content: "\f302"; }

.fa-imdb:before {
  content: "\f2d8"; }

.fa-inbox:before {
  content: "\f01c"; }

.fa-indent:before {
  content: "\f03c"; }

.fa-industry:before {
  content: "\f275"; }

.fa-infinity:before {
  content: "\f534"; }

.fa-info:before {
  content: "\f129"; }

.fa-info-circle:before {
  content: "\f05a"; }

.fa-instagram:before {
  content: "\f16d"; }

.fa-instagram-square:before {
  content: "\f955"; }

.fa-intercom:before {
  content: "\f7af"; }

.fa-internet-explorer:before {
  content: "\f26b"; }

.fa-invision:before {
  content: "\f7b0"; }

.fa-ioxhost:before {
  content: "\f208"; }

.fa-italic:before {
  content: "\f033"; }

.fa-itch-io:before {
  content: "\f83a"; }

.fa-itunes:before {
  content: "\f3b4"; }

.fa-itunes-note:before {
  content: "\f3b5"; }

.fa-java:before {
  content: "\f4e4"; }

.fa-jedi:before {
  content: "\f669"; }

.fa-jedi-order:before {
  content: "\f50e"; }

.fa-jenkins:before {
  content: "\f3b6"; }

.fa-jira:before {
  content: "\f7b1"; }

.fa-joget:before {
  content: "\f3b7"; }

.fa-joint:before {
  content: "\f595"; }

.fa-joomla:before {
  content: "\f1aa"; }

.fa-journal-whills:before {
  content: "\f66a"; }

.fa-js:before {
  content: "\f3b8"; }

.fa-js-square:before {
  content: "\f3b9"; }

.fa-jsfiddle:before {
  content: "\f1cc"; }

.fa-kaaba:before {
  content: "\f66b"; }

.fa-kaggle:before {
  content: "\f5fa"; }

.fa-key:before {
  content: "\f084"; }

.fa-keybase:before {
  content: "\f4f5"; }

.fa-keyboard:before {
  content: "\f11c"; }

.fa-keycdn:before {
  content: "\f3ba"; }

.fa-khanda:before {
  content: "\f66d"; }

.fa-kickstarter:before {
  content: "\f3bb"; }

.fa-kickstarter-k:before {
  content: "\f3bc"; }

.fa-kiss:before {
  content: "\f596"; }

.fa-kiss-beam:before {
  content: "\f597"; }

.fa-kiss-wink-heart:before {
  content: "\f598"; }

.fa-kiwi-bird:before {
  content: "\f535"; }

.fa-korvue:before {
  content: "\f42f"; }

.fa-landmark:before {
  content: "\f66f"; }

.fa-language:before {
  content: "\f1ab"; }

.fa-laptop:before {
  content: "\f109"; }

.fa-laptop-code:before {
  content: "\f5fc"; }

.fa-laptop-house:before {
  content: "\f966"; }

.fa-laptop-medical:before {
  content: "\f812"; }

.fa-laravel:before {
  content: "\f3bd"; }

.fa-lastfm:before {
  content: "\f202"; }

.fa-lastfm-square:before {
  content: "\f203"; }

.fa-laugh:before {
  content: "\f599"; }

.fa-laugh-beam:before {
  content: "\f59a"; }

.fa-laugh-squint:before {
  content: "\f59b"; }

.fa-laugh-wink:before {
  content: "\f59c"; }

.fa-layer-group:before {
  content: "\f5fd"; }

.fa-leaf:before {
  content: "\f06c"; }

.fa-leanpub:before {
  content: "\f212"; }

.fa-lemon:before {
  content: "\f094"; }

.fa-less:before {
  content: "\f41d"; }

.fa-less-than:before {
  content: "\f536"; }

.fa-less-than-equal:before {
  content: "\f537"; }

.fa-level-down-alt:before {
  content: "\f3be"; }

.fa-level-up-alt:before {
  content: "\f3bf"; }

.fa-life-ring:before {
  content: "\f1cd"; }

.fa-lightbulb:before {
  content: "\f0eb"; }

.fa-line:before {
  content: "\f3c0"; }

.fa-link:before {
  content: "\f0c1"; }

.fa-linkedin:before {
  content: "\f08c"; }

.fa-linkedin-in:before {
  content: "\f0e1"; }

.fa-linode:before {
  content: "\f2b8"; }

.fa-linux:before {
  content: "\f17c"; }

.fa-lira-sign:before {
  content: "\f195"; }

.fa-list:before {
  content: "\f03a"; }

.fa-list-alt:before {
  content: "\f022"; }

.fa-list-ol:before {
  content: "\f0cb"; }

.fa-list-ul:before {
  content: "\f0ca"; }

.fa-location-arrow:before {
  content: "\f124"; }

.fa-lock:before {
  content: "\f023"; }

.fa-lock-open:before {
  content: "\f3c1"; }

.fa-long-arrow-alt-down:before {
  content: "\f309"; }

.fa-long-arrow-alt-left:before {
  content: "\f30a"; }

.fa-long-arrow-alt-right:before {
  content: "\f30b"; }

.fa-long-arrow-alt-up:before {
  content: "\f30c"; }

.fa-low-vision:before {
  content: "\f2a8"; }

.fa-luggage-cart:before {
  content: "\f59d"; }

.fa-lungs:before {
  content: "\f604"; }

.fa-lungs-virus:before {
  content: "\f967"; }

.fa-lyft:before {
  content: "\f3c3"; }

.fa-magento:before {
  content: "\f3c4"; }

.fa-magic:before {
  content: "\f0d0"; }

.fa-magnet:before {
  content: "\f076"; }

.fa-mail-bulk:before {
  content: "\f674"; }

.fa-mailchimp:before {
  content: "\f59e"; }

.fa-male:before {
  content: "\f183"; }

.fa-mandalorian:before {
  content: "\f50f"; }

.fa-map:before {
  content: "\f279"; }

.fa-map-marked:before {
  content: "\f59f"; }

.fa-map-marked-alt:before {
  content: "\f5a0"; }

.fa-map-marker:before {
  content: "\f041"; }

.fa-map-marker-alt:before {
  content: "\f3c5"; }

.fa-map-pin:before {
  content: "\f276"; }

.fa-map-signs:before {
  content: "\f277"; }

.fa-markdown:before {
  content: "\f60f"; }

.fa-marker:before {
  content: "\f5a1"; }

.fa-mars:before {
  content: "\f222"; }

.fa-mars-double:before {
  content: "\f227"; }

.fa-mars-stroke:before {
  content: "\f229"; }

.fa-mars-stroke-h:before {
  content: "\f22b"; }

.fa-mars-stroke-v:before {
  content: "\f22a"; }

.fa-mask:before {
  content: "\f6fa"; }

.fa-mastodon:before {
  content: "\f4f6"; }

.fa-maxcdn:before {
  content: "\f136"; }

.fa-mdb:before {
  content: "\f8ca"; }

.fa-medal:before {
  content: "\f5a2"; }

.fa-medapps:before {
  content: "\f3c6"; }

.fa-medium:before {
  content: "\f23a"; }

.fa-medium-m:before {
  content: "\f3c7"; }

.fa-medkit:before {
  content: "\f0fa"; }

.fa-medrt:before {
  content: "\f3c8"; }

.fa-meetup:before {
  content: "\f2e0"; }

.fa-megaport:before {
  content: "\f5a3"; }

.fa-meh:before {
  content: "\f11a"; }

.fa-meh-blank:before {
  content: "\f5a4"; }

.fa-meh-rolling-eyes:before {
  content: "\f5a5"; }

.fa-memory:before {
  content: "\f538"; }

.fa-mendeley:before {
  content: "\f7b3"; }

.fa-menorah:before {
  content: "\f676"; }

.fa-mercury:before {
  content: "\f223"; }

.fa-meteor:before {
  content: "\f753"; }

.fa-microblog:before {
  content: "\f91a"; }

.fa-microchip:before {
  content: "\f2db"; }

.fa-microphone:before {
  content: "\f130"; }

.fa-microphone-alt:before {
  content: "\f3c9"; }

.fa-microphone-alt-slash:before {
  content: "\f539"; }

.fa-microphone-slash:before {
  content: "\f131"; }

.fa-microscope:before {
  content: "\f610"; }

.fa-microsoft:before {
  content: "\f3ca"; }

.fa-minus:before {
  content: "\f068"; }

.fa-minus-circle:before {
  content: "\f056"; }

.fa-minus-square:before {
  content: "\f146"; }

.fa-mitten:before {
  content: "\f7b5"; }

.fa-mix:before {
  content: "\f3cb"; }

.fa-mixcloud:before {
  content: "\f289"; }

.fa-mixer:before {
  content: "\f956"; }

.fa-mizuni:before {
  content: "\f3cc"; }

.fa-mobile:before {
  content: "\f10b"; }

.fa-mobile-alt:before {
  content: "\f3cd"; }

.fa-modx:before {
  content: "\f285"; }

.fa-monero:before {
  content: "\f3d0"; }

.fa-money-bill:before {
  content: "\f0d6"; }

.fa-money-bill-alt:before {
  content: "\f3d1"; }

.fa-money-bill-wave:before {
  content: "\f53a"; }

.fa-money-bill-wave-alt:before {
  content: "\f53b"; }

.fa-money-check:before {
  content: "\f53c"; }

.fa-money-check-alt:before {
  content: "\f53d"; }

.fa-monument:before {
  content: "\f5a6"; }

.fa-moon:before {
  content: "\f186"; }

.fa-mortar-pestle:before {
  content: "\f5a7"; }

.fa-mosque:before {
  content: "\f678"; }

.fa-motorcycle:before {
  content: "\f21c"; }

.fa-mountain:before {
  content: "\f6fc"; }

.fa-mouse:before {
  content: "\f8cc"; }

.fa-mouse-pointer:before {
  content: "\f245"; }

.fa-mug-hot:before {
  content: "\f7b6"; }

.fa-music:before {
  content: "\f001"; }

.fa-napster:before {
  content: "\f3d2"; }

.fa-neos:before {
  content: "\f612"; }

.fa-network-wired:before {
  content: "\f6ff"; }

.fa-neuter:before {
  content: "\f22c"; }

.fa-newspaper:before {
  content: "\f1ea"; }

.fa-nimblr:before {
  content: "\f5a8"; }

.fa-node:before {
  content: "\f419"; }

.fa-node-js:before {
  content: "\f3d3"; }

.fa-not-equal:before {
  content: "\f53e"; }

.fa-notes-medical:before {
  content: "\f481"; }

.fa-npm:before {
  content: "\f3d4"; }

.fa-ns8:before {
  content: "\f3d5"; }

.fa-nutritionix:before {
  content: "\f3d6"; }

.fa-object-group:before {
  content: "\f247"; }

.fa-object-ungroup:before {
  content: "\f248"; }

.fa-odnoklassniki:before {
  content: "\f263"; }

.fa-odnoklassniki-square:before {
  content: "\f264"; }

.fa-oil-can:before {
  content: "\f613"; }

.fa-old-republic:before {
  content: "\f510"; }

.fa-om:before {
  content: "\f679"; }

.fa-opencart:before {
  content: "\f23d"; }

.fa-openid:before {
  content: "\f19b"; }

.fa-opera:before {
  content: "\f26a"; }

.fa-optin-monster:before {
  content: "\f23c"; }

.fa-orcid:before {
  content: "\f8d2"; }

.fa-osi:before {
  content: "\f41a"; }

.fa-otter:before {
  content: "\f700"; }

.fa-outdent:before {
  content: "\f03b"; }

.fa-page4:before {
  content: "\f3d7"; }

.fa-pagelines:before {
  content: "\f18c"; }

.fa-pager:before {
  content: "\f815"; }

.fa-paint-brush:before {
  content: "\f1fc"; }

.fa-paint-roller:before {
  content: "\f5aa"; }

.fa-palette:before {
  content: "\f53f"; }

.fa-palfed:before {
  content: "\f3d8"; }

.fa-pallet:before {
  content: "\f482"; }

.fa-paper-plane:before {
  content: "\f1d8"; }

.fa-paperclip:before {
  content: "\f0c6"; }

.fa-parachute-box:before {
  content: "\f4cd"; }

.fa-paragraph:before {
  content: "\f1dd"; }

.fa-parking:before {
  content: "\f540"; }

.fa-passport:before {
  content: "\f5ab"; }

.fa-pastafarianism:before {
  content: "\f67b"; }

.fa-paste:before {
  content: "\f0ea"; }

.fa-patreon:before {
  content: "\f3d9"; }

.fa-pause:before {
  content: "\f04c"; }

.fa-pause-circle:before {
  content: "\f28b"; }

.fa-paw:before {
  content: "\f1b0"; }

.fa-paypal:before {
  content: "\f1ed"; }

.fa-peace:before {
  content: "\f67c"; }

.fa-pen:before {
  content: "\f304"; }

.fa-pen-alt:before {
  content: "\f305"; }

.fa-pen-fancy:before {
  content: "\f5ac"; }

.fa-pen-nib:before {
  content: "\f5ad"; }

.fa-pen-square:before {
  content: "\f14b"; }

.fa-pencil-alt:before {
  content: "\f303"; }

.fa-pencil-ruler:before {
  content: "\f5ae"; }

.fa-penny-arcade:before {
  content: "\f704"; }

.fa-people-arrows:before {
  content: "\f968"; }

.fa-people-carry:before {
  content: "\f4ce"; }

.fa-pepper-hot:before {
  content: "\f816"; }

.fa-percent:before {
  content: "\f295"; }

.fa-percentage:before {
  content: "\f541"; }

.fa-periscope:before {
  content: "\f3da"; }

.fa-person-booth:before {
  content: "\f756"; }

.fa-phabricator:before {
  content: "\f3db"; }

.fa-phoenix-framework:before {
  content: "\f3dc"; }

.fa-phoenix-squadron:before {
  content: "\f511"; }

.fa-phone:before {
  content: "\f095"; }

.fa-phone-alt:before {
  content: "\f879"; }

.fa-phone-slash:before {
  content: "\f3dd"; }

.fa-phone-square:before {
  content: "\f098"; }

.fa-phone-square-alt:before {
  content: "\f87b"; }

.fa-phone-volume:before {
  content: "\f2a0"; }

.fa-photo-video:before {
  content: "\f87c"; }

.fa-php:before {
  content: "\f457"; }

.fa-pied-piper:before {
  content: "\f2ae"; }

.fa-pied-piper-alt:before {
  content: "\f1a8"; }

.fa-pied-piper-hat:before {
  content: "\f4e5"; }

.fa-pied-piper-pp:before {
  content: "\f1a7"; }

.fa-pied-piper-square:before {
  content: "\f91e"; }

.fa-piggy-bank:before {
  content: "\f4d3"; }

.fa-pills:before {
  content: "\f484"; }

.fa-pinterest:before {
  content: "\f0d2"; }

.fa-pinterest-p:before {
  content: "\f231"; }

.fa-pinterest-square:before {
  content: "\f0d3"; }

.fa-pizza-slice:before {
  content: "\f818"; }

.fa-place-of-worship:before {
  content: "\f67f"; }

.fa-plane:before {
  content: "\f072"; }

.fa-plane-arrival:before {
  content: "\f5af"; }

.fa-plane-departure:before {
  content: "\f5b0"; }

.fa-plane-slash:before {
  content: "\f969"; }

.fa-play:before {
  content: "\f04b"; }

.fa-play-circle:before {
  content: "\f144"; }

.fa-playstation:before {
  content: "\f3df"; }

.fa-plug:before {
  content: "\f1e6"; }

.fa-plus:before {
  content: "\f067"; }

.fa-plus-circle:before {
  content: "\f055"; }

.fa-plus-square:before {
  content: "\f0fe"; }

.fa-podcast:before {
  content: "\f2ce"; }

.fa-poll:before {
  content: "\f681"; }

.fa-poll-h:before {
  content: "\f682"; }

.fa-poo:before {
  content: "\f2fe"; }

.fa-poo-storm:before {
  content: "\f75a"; }

.fa-poop:before {
  content: "\f619"; }

.fa-portrait:before {
  content: "\f3e0"; }

.fa-pound-sign:before {
  content: "\f154"; }

.fa-power-off:before {
  content: "\f011"; }

.fa-pray:before {
  content: "\f683"; }

.fa-praying-hands:before {
  content: "\f684"; }

.fa-prescription:before {
  content: "\f5b1"; }

.fa-prescription-bottle:before {
  content: "\f485"; }

.fa-prescription-bottle-alt:before {
  content: "\f486"; }

.fa-print:before {
  content: "\f02f"; }

.fa-procedures:before {
  content: "\f487"; }

.fa-product-hunt:before {
  content: "\f288"; }

.fa-project-diagram:before {
  content: "\f542"; }

.fa-pump-medical:before {
  content: "\f96a"; }

.fa-pump-soap:before {
  content: "\f96b"; }

.fa-pushed:before {
  content: "\f3e1"; }

.fa-puzzle-piece:before {
  content: "\f12e"; }

.fa-python:before {
  content: "\f3e2"; }

.fa-qq:before {
  content: "\f1d6"; }

.fa-qrcode:before {
  content: "\f029"; }

.fa-question:before {
  content: "\f128"; }

.fa-question-circle:before {
  content: "\f059"; }

.fa-quidditch:before {
  content: "\f458"; }

.fa-quinscape:before {
  content: "\f459"; }

.fa-quora:before {
  content: "\f2c4"; }

.fa-quote-left:before {
  content: "\f10d"; }

.fa-quote-right:before {
  content: "\f10e"; }

.fa-quran:before {
  content: "\f687"; }

.fa-r-project:before {
  content: "\f4f7"; }

.fa-radiation:before {
  content: "\f7b9"; }

.fa-radiation-alt:before {
  content: "\f7ba"; }

.fa-rainbow:before {
  content: "\f75b"; }

.fa-random:before {
  content: "\f074"; }

.fa-raspberry-pi:before {
  content: "\f7bb"; }

.fa-ravelry:before {
  content: "\f2d9"; }

.fa-react:before {
  content: "\f41b"; }

.fa-reacteurope:before {
  content: "\f75d"; }

.fa-readme:before {
  content: "\f4d5"; }

.fa-rebel:before {
  content: "\f1d0"; }

.fa-receipt:before {
  content: "\f543"; }

.fa-record-vinyl:before {
  content: "\f8d9"; }

.fa-recycle:before {
  content: "\f1b8"; }

.fa-red-river:before {
  content: "\f3e3"; }

.fa-reddit:before {
  content: "\f1a1"; }

.fa-reddit-alien:before {
  content: "\f281"; }

.fa-reddit-square:before {
  content: "\f1a2"; }

.fa-redhat:before {
  content: "\f7bc"; }

.fa-redo:before {
  content: "\f01e"; }

.fa-redo-alt:before {
  content: "\f2f9"; }

.fa-registered:before {
  content: "\f25d"; }

.fa-remove-format:before {
  content: "\f87d"; }

.fa-renren:before {
  content: "\f18b"; }

.fa-reply:before {
  content: "\f3e5"; }

.fa-reply-all:before {
  content: "\f122"; }

.fa-replyd:before {
  content: "\f3e6"; }

.fa-republican:before {
  content: "\f75e"; }

.fa-researchgate:before {
  content: "\f4f8"; }

.fa-resolving:before {
  content: "\f3e7"; }

.fa-restroom:before {
  content: "\f7bd"; }

.fa-retweet:before {
  content: "\f079"; }

.fa-rev:before {
  content: "\f5b2"; }

.fa-ribbon:before {
  content: "\f4d6"; }

.fa-ring:before {
  content: "\f70b"; }

.fa-road:before {
  content: "\f018"; }

.fa-robot:before {
  content: "\f544"; }

.fa-rocket:before {
  content: "\f135"; }

.fa-rocketchat:before {
  content: "\f3e8"; }

.fa-rockrms:before {
  content: "\f3e9"; }

.fa-route:before {
  content: "\f4d7"; }

.fa-rss:before {
  content: "\f09e"; }

.fa-rss-square:before {
  content: "\f143"; }

.fa-ruble-sign:before {
  content: "\f158"; }

.fa-ruler:before {
  content: "\f545"; }

.fa-ruler-combined:before {
  content: "\f546"; }

.fa-ruler-horizontal:before {
  content: "\f547"; }

.fa-ruler-vertical:before {
  content: "\f548"; }

.fa-running:before {
  content: "\f70c"; }

.fa-rupee-sign:before {
  content: "\f156"; }

.fa-sad-cry:before {
  content: "\f5b3"; }

.fa-sad-tear:before {
  content: "\f5b4"; }

.fa-safari:before {
  content: "\f267"; }

.fa-salesforce:before {
  content: "\f83b"; }

.fa-sass:before {
  content: "\f41e"; }

.fa-satellite:before {
  content: "\f7bf"; }

.fa-satellite-dish:before {
  content: "\f7c0"; }

.fa-save:before {
  content: "\f0c7"; }

.fa-schlix:before {
  content: "\f3ea"; }

.fa-school:before {
  content: "\f549"; }

.fa-screwdriver:before {
  content: "\f54a"; }

.fa-scribd:before {
  content: "\f28a"; }

.fa-scroll:before {
  content: "\f70e"; }

.fa-sd-card:before {
  content: "\f7c2"; }

.fa-search:before {
  content: "\f002"; }

.fa-search-dollar:before {
  content: "\f688"; }

.fa-search-location:before {
  content: "\f689"; }

.fa-search-minus:before {
  content: "\f010"; }

.fa-search-plus:before {
  content: "\f00e"; }

.fa-searchengin:before {
  content: "\f3eb"; }

.fa-seedling:before {
  content: "\f4d8"; }

.fa-sellcast:before {
  content: "\f2da"; }

.fa-sellsy:before {
  content: "\f213"; }

.fa-server:before {
  content: "\f233"; }

.fa-servicestack:before {
  content: "\f3ec"; }

.fa-shapes:before {
  content: "\f61f"; }

.fa-share:before {
  content: "\f064"; }

.fa-share-alt:before {
  content: "\f1e0"; }

.fa-share-alt-square:before {
  content: "\f1e1"; }

.fa-share-square:before {
  content: "\f14d"; }

.fa-shekel-sign:before {
  content: "\f20b"; }

.fa-shield-alt:before {
  content: "\f3ed"; }

.fa-shield-virus:before {
  content: "\f96c"; }

.fa-ship:before {
  content: "\f21a"; }

.fa-shipping-fast:before {
  content: "\f48b"; }

.fa-shirtsinbulk:before {
  content: "\f214"; }

.fa-shoe-prints:before {
  content: "\f54b"; }

.fa-shopify:before {
  content: "\f957"; }

.fa-shopping-bag:before {
  content: "\f290"; }

.fa-shopping-basket:before {
  content: "\f291"; }

.fa-shopping-cart:before {
  content: "\f07a"; }

.fa-shopware:before {
  content: "\f5b5"; }

.fa-shower:before {
  content: "\f2cc"; }

.fa-shuttle-van:before {
  content: "\f5b6"; }

.fa-sign:before {
  content: "\f4d9"; }

.fa-sign-in-alt:before {
  content: "\f2f6"; }

.fa-sign-language:before {
  content: "\f2a7"; }

.fa-sign-out-alt:before {
  content: "\f2f5"; }

.fa-signal:before {
  content: "\f012"; }

.fa-signature:before {
  content: "\f5b7"; }

.fa-sim-card:before {
  content: "\f7c4"; }

.fa-simplybuilt:before {
  content: "\f215"; }

.fa-sistrix:before {
  content: "\f3ee"; }

.fa-sitemap:before {
  content: "\f0e8"; }

.fa-sith:before {
  content: "\f512"; }

.fa-skating:before {
  content: "\f7c5"; }

.fa-sketch:before {
  content: "\f7c6"; }

.fa-skiing:before {
  content: "\f7c9"; }

.fa-skiing-nordic:before {
  content: "\f7ca"; }

.fa-skull:before {
  content: "\f54c"; }

.fa-skull-crossbones:before {
  content: "\f714"; }

.fa-skyatlas:before {
  content: "\f216"; }

.fa-skype:before {
  content: "\f17e"; }

.fa-slack:before {
  content: "\f198"; }

.fa-slack-hash:before {
  content: "\f3ef"; }

.fa-slash:before {
  content: "\f715"; }

.fa-sleigh:before {
  content: "\f7cc"; }

.fa-sliders-h:before {
  content: "\f1de"; }

.fa-slideshare:before {
  content: "\f1e7"; }

.fa-smile:before {
  content: "\f118"; }

.fa-smile-beam:before {
  content: "\f5b8"; }

.fa-smile-wink:before {
  content: "\f4da"; }

.fa-smog:before {
  content: "\f75f"; }

.fa-smoking:before {
  content: "\f48d"; }

.fa-smoking-ban:before {
  content: "\f54d"; }

.fa-sms:before {
  content: "\f7cd"; }

.fa-snapchat:before {
  content: "\f2ab"; }

.fa-snapchat-ghost:before {
  content: "\f2ac"; }

.fa-snapchat-square:before {
  content: "\f2ad"; }

.fa-snowboarding:before {
  content: "\f7ce"; }

.fa-snowflake:before {
  content: "\f2dc"; }

.fa-snowman:before {
  content: "\f7d0"; }

.fa-snowplow:before {
  content: "\f7d2"; }

.fa-soap:before {
  content: "\f96e"; }

.fa-socks:before {
  content: "\f696"; }

.fa-solar-panel:before {
  content: "\f5ba"; }

.fa-sort:before {
  content: "\f0dc"; }

.fa-sort-alpha-down:before {
  content: "\f15d"; }

.fa-sort-alpha-down-alt:before {
  content: "\f881"; }

.fa-sort-alpha-up:before {
  content: "\f15e"; }

.fa-sort-alpha-up-alt:before {
  content: "\f882"; }

.fa-sort-amount-down:before {
  content: "\f160"; }

.fa-sort-amount-down-alt:before {
  content: "\f884"; }

.fa-sort-amount-up:before {
  content: "\f161"; }

.fa-sort-amount-up-alt:before {
  content: "\f885"; }

.fa-sort-down:before {
  content: "\f0dd"; }

.fa-sort-numeric-down:before {
  content: "\f162"; }

.fa-sort-numeric-down-alt:before {
  content: "\f886"; }

.fa-sort-numeric-up:before {
  content: "\f163"; }

.fa-sort-numeric-up-alt:before {
  content: "\f887"; }

.fa-sort-up:before {
  content: "\f0de"; }

.fa-soundcloud:before {
  content: "\f1be"; }

.fa-sourcetree:before {
  content: "\f7d3"; }

.fa-spa:before {
  content: "\f5bb"; }

.fa-space-shuttle:before {
  content: "\f197"; }

.fa-speakap:before {
  content: "\f3f3"; }

.fa-speaker-deck:before {
  content: "\f83c"; }

.fa-spell-check:before {
  content: "\f891"; }

.fa-spider:before {
  content: "\f717"; }

.fa-spinner:before {
  content: "\f110"; }

.fa-splotch:before {
  content: "\f5bc"; }

.fa-spotify:before {
  content: "\f1bc"; }

.fa-spray-can:before {
  content: "\f5bd"; }

.fa-square:before {
  content: "\f0c8"; }

.fa-square-full:before {
  content: "\f45c"; }

.fa-square-root-alt:before {
  content: "\f698"; }

.fa-squarespace:before {
  content: "\f5be"; }

.fa-stack-exchange:before {
  content: "\f18d"; }

.fa-stack-overflow:before {
  content: "\f16c"; }

.fa-stackpath:before {
  content: "\f842"; }

.fa-stamp:before {
  content: "\f5bf"; }

.fa-star:before {
  content: "\f005"; }

.fa-star-and-crescent:before {
  content: "\f699"; }

.fa-star-half:before {
  content: "\f089"; }

.fa-star-half-alt:before {
  content: "\f5c0"; }

.fa-star-of-david:before {
  content: "\f69a"; }

.fa-star-of-life:before {
  content: "\f621"; }

.fa-staylinked:before {
  content: "\f3f5"; }

.fa-steam:before {
  content: "\f1b6"; }

.fa-steam-square:before {
  content: "\f1b7"; }

.fa-steam-symbol:before {
  content: "\f3f6"; }

.fa-step-backward:before {
  content: "\f048"; }

.fa-step-forward:before {
  content: "\f051"; }

.fa-stethoscope:before {
  content: "\f0f1"; }

.fa-sticker-mule:before {
  content: "\f3f7"; }

.fa-sticky-note:before {
  content: "\f249"; }

.fa-stop:before {
  content: "\f04d"; }

.fa-stop-circle:before {
  content: "\f28d"; }

.fa-stopwatch:before {
  content: "\f2f2"; }

.fa-stopwatch-20:before {
  content: "\f96f"; }

.fa-store:before {
  content: "\f54e"; }

.fa-store-alt:before {
  content: "\f54f"; }

.fa-store-alt-slash:before {
  content: "\f970"; }

.fa-store-slash:before {
  content: "\f971"; }

.fa-strava:before {
  content: "\f428"; }

.fa-stream:before {
  content: "\f550"; }

.fa-street-view:before {
  content: "\f21d"; }

.fa-strikethrough:before {
  content: "\f0cc"; }

.fa-stripe:before {
  content: "\f429"; }

.fa-stripe-s:before {
  content: "\f42a"; }

.fa-stroopwafel:before {
  content: "\f551"; }

.fa-studiovinari:before {
  content: "\f3f8"; }

.fa-stumbleupon:before {
  content: "\f1a4"; }

.fa-stumbleupon-circle:before {
  content: "\f1a3"; }

.fa-subscript:before {
  content: "\f12c"; }

.fa-subway:before {
  content: "\f239"; }

.fa-suitcase:before {
  content: "\f0f2"; }

.fa-suitcase-rolling:before {
  content: "\f5c1"; }

.fa-sun:before {
  content: "\f185"; }

.fa-superpowers:before {
  content: "\f2dd"; }

.fa-superscript:before {
  content: "\f12b"; }

.fa-supple:before {
  content: "\f3f9"; }

.fa-surprise:before {
  content: "\f5c2"; }

.fa-suse:before {
  content: "\f7d6"; }

.fa-swatchbook:before {
  content: "\f5c3"; }

.fa-swift:before {
  content: "\f8e1"; }

.fa-swimmer:before {
  content: "\f5c4"; }

.fa-swimming-pool:before {
  content: "\f5c5"; }

.fa-symfony:before {
  content: "\f83d"; }

.fa-synagogue:before {
  content: "\f69b"; }

.fa-sync:before {
  content: "\f021"; }

.fa-sync-alt:before {
  content: "\f2f1"; }

.fa-syringe:before {
  content: "\f48e"; }

.fa-table:before {
  content: "\f0ce"; }

.fa-table-tennis:before {
  content: "\f45d"; }

.fa-tablet:before {
  content: "\f10a"; }

.fa-tablet-alt:before {
  content: "\f3fa"; }

.fa-tablets:before {
  content: "\f490"; }

.fa-tachometer-alt:before {
  content: "\f3fd"; }

.fa-tag:before {
  content: "\f02b"; }

.fa-tags:before {
  content: "\f02c"; }

.fa-tape:before {
  content: "\f4db"; }

.fa-tasks:before {
  content: "\f0ae"; }

.fa-taxi:before {
  content: "\f1ba"; }

.fa-teamspeak:before {
  content: "\f4f9"; }

.fa-teeth:before {
  content: "\f62e"; }

.fa-teeth-open:before {
  content: "\f62f"; }

.fa-telegram:before {
  content: "\f2c6"; }

.fa-telegram-plane:before {
  content: "\f3fe"; }

.fa-temperature-high:before {
  content: "\f769"; }

.fa-temperature-low:before {
  content: "\f76b"; }

.fa-tencent-weibo:before {
  content: "\f1d5"; }

.fa-tenge:before {
  content: "\f7d7"; }

.fa-terminal:before {
  content: "\f120"; }

.fa-text-height:before {
  content: "\f034"; }

.fa-text-width:before {
  content: "\f035"; }

.fa-th:before {
  content: "\f00a"; }

.fa-th-large:before {
  content: "\f009"; }

.fa-th-list:before {
  content: "\f00b"; }

.fa-the-red-yeti:before {
  content: "\f69d"; }

.fa-theater-masks:before {
  content: "\f630"; }

.fa-themeco:before {
  content: "\f5c6"; }

.fa-themeisle:before {
  content: "\f2b2"; }

.fa-thermometer:before {
  content: "\f491"; }

.fa-thermometer-empty:before {
  content: "\f2cb"; }

.fa-thermometer-full:before {
  content: "\f2c7"; }

.fa-thermometer-half:before {
  content: "\f2c9"; }

.fa-thermometer-quarter:before {
  content: "\f2ca"; }

.fa-thermometer-three-quarters:before {
  content: "\f2c8"; }

.fa-think-peaks:before {
  content: "\f731"; }

.fa-thumbs-down:before {
  content: "\f165"; }

.fa-thumbs-up:before {
  content: "\f164"; }

.fa-thumbtack:before {
  content: "\f08d"; }

.fa-ticket-alt:before {
  content: "\f3ff"; }

.fa-times:before {
  content: "\f00d"; }

.fa-times-circle:before {
  content: "\f057"; }

.fa-tint:before {
  content: "\f043"; }

.fa-tint-slash:before {
  content: "\f5c7"; }

.fa-tired:before {
  content: "\f5c8"; }

.fa-toggle-off:before {
  content: "\f204"; }

.fa-toggle-on:before {
  content: "\f205"; }

.fa-toilet:before {
  content: "\f7d8"; }

.fa-toilet-paper:before {
  content: "\f71e"; }

.fa-toilet-paper-slash:before {
  content: "\f972"; }

.fa-toolbox:before {
  content: "\f552"; }

.fa-tools:before {
  content: "\f7d9"; }

.fa-tooth:before {
  content: "\f5c9"; }

.fa-torah:before {
  content: "\f6a0"; }

.fa-torii-gate:before {
  content: "\f6a1"; }

.fa-tractor:before {
  content: "\f722"; }

.fa-trade-federation:before {
  content: "\f513"; }

.fa-trademark:before {
  content: "\f25c"; }

.fa-traffic-light:before {
  content: "\f637"; }

.fa-trailer:before {
  content: "\f941"; }

.fa-train:before {
  content: "\f238"; }

.fa-tram:before {
  content: "\f7da"; }

.fa-transgender:before {
  content: "\f224"; }

.fa-transgender-alt:before {
  content: "\f225"; }

.fa-trash:before {
  content: "\f1f8"; }

.fa-trash-alt:before {
  content: "\f2ed"; }

.fa-trash-restore:before {
  content: "\f829"; }

.fa-trash-restore-alt:before {
  content: "\f82a"; }

.fa-tree:before {
  content: "\f1bb"; }

.fa-trello:before {
  content: "\f181"; }

.fa-tripadvisor:before {
  content: "\f262"; }

.fa-trophy:before {
  content: "\f091"; }

.fa-truck:before {
  content: "\f0d1"; }

.fa-truck-loading:before {
  content: "\f4de"; }

.fa-truck-monster:before {
  content: "\f63b"; }

.fa-truck-moving:before {
  content: "\f4df"; }

.fa-truck-pickup:before {
  content: "\f63c"; }

.fa-tshirt:before {
  content: "\f553"; }

.fa-tty:before {
  content: "\f1e4"; }

.fa-tumblr:before {
  content: "\f173"; }

.fa-tumblr-square:before {
  content: "\f174"; }

.fa-tv:before {
  content: "\f26c"; }

.fa-twitch:before {
  content: "\f1e8"; }

.fa-twitter:before {
  content: "\f099"; }

.fa-twitter-square:before {
  content: "\f081"; }

.fa-typo3:before {
  content: "\f42b"; }

.fa-uber:before {
  content: "\f402"; }

.fa-ubuntu:before {
  content: "\f7df"; }

.fa-uikit:before {
  content: "\f403"; }

.fa-umbraco:before {
  content: "\f8e8"; }

.fa-umbrella:before {
  content: "\f0e9"; }

.fa-umbrella-beach:before {
  content: "\f5ca"; }

.fa-underline:before {
  content: "\f0cd"; }

.fa-undo:before {
  content: "\f0e2"; }

.fa-undo-alt:before {
  content: "\f2ea"; }

.fa-uniregistry:before {
  content: "\f404"; }

.fa-unity:before {
  content: "\f949"; }

.fa-universal-access:before {
  content: "\f29a"; }

.fa-university:before {
  content: "\f19c"; }

.fa-unlink:before {
  content: "\f127"; }

.fa-unlock:before {
  content: "\f09c"; }

.fa-unlock-alt:before {
  content: "\f13e"; }

.fa-untappd:before {
  content: "\f405"; }

.fa-upload:before {
  content: "\f093"; }

.fa-ups:before {
  content: "\f7e0"; }

.fa-usb:before {
  content: "\f287"; }

.fa-user:before {
  content: "\f007"; }

.fa-user-alt:before {
  content: "\f406"; }

.fa-user-alt-slash:before {
  content: "\f4fa"; }

.fa-user-astronaut:before {
  content: "\f4fb"; }

.fa-user-check:before {
  content: "\f4fc"; }

.fa-user-circle:before {
  content: "\f2bd"; }

.fa-user-clock:before {
  content: "\f4fd"; }

.fa-user-cog:before {
  content: "\f4fe"; }

.fa-user-edit:before {
  content: "\f4ff"; }

.fa-user-friends:before {
  content: "\f500"; }

.fa-user-graduate:before {
  content: "\f501"; }

.fa-user-injured:before {
  content: "\f728"; }

.fa-user-lock:before {
  content: "\f502"; }

.fa-user-md:before {
  content: "\f0f0"; }

.fa-user-minus:before {
  content: "\f503"; }

.fa-user-ninja:before {
  content: "\f504"; }

.fa-user-nurse:before {
  content: "\f82f"; }

.fa-user-plus:before {
  content: "\f234"; }

.fa-user-secret:before {
  content: "\f21b"; }

.fa-user-shield:before {
  content: "\f505"; }

.fa-user-slash:before {
  content: "\f506"; }

.fa-user-tag:before {
  content: "\f507"; }

.fa-user-tie:before {
  content: "\f508"; }

.fa-user-times:before {
  content: "\f235"; }

.fa-users:before {
  content: "\f0c0"; }

.fa-users-cog:before {
  content: "\f509"; }

.fa-usps:before {
  content: "\f7e1"; }

.fa-ussunnah:before {
  content: "\f407"; }

.fa-utensil-spoon:before {
  content: "\f2e5"; }

.fa-utensils:before {
  content: "\f2e7"; }

.fa-vaadin:before {
  content: "\f408"; }

.fa-vector-square:before {
  content: "\f5cb"; }

.fa-venus:before {
  content: "\f221"; }

.fa-venus-double:before {
  content: "\f226"; }

.fa-venus-mars:before {
  content: "\f228"; }

.fa-viacoin:before {
  content: "\f237"; }

.fa-viadeo:before {
  content: "\f2a9"; }

.fa-viadeo-square:before {
  content: "\f2aa"; }

.fa-vial:before {
  content: "\f492"; }

.fa-vials:before {
  content: "\f493"; }

.fa-viber:before {
  content: "\f409"; }

.fa-video:before {
  content: "\f03d"; }

.fa-video-slash:before {
  content: "\f4e2"; }

.fa-vihara:before {
  content: "\f6a7"; }

.fa-vimeo:before {
  content: "\f40a"; }

.fa-vimeo-square:before {
  content: "\f194"; }

.fa-vimeo-v:before {
  content: "\f27d"; }

.fa-vine:before {
  content: "\f1ca"; }

.fa-virus:before {
  content: "\f974"; }

.fa-virus-slash:before {
  content: "\f975"; }

.fa-viruses:before {
  content: "\f976"; }

.fa-vk:before {
  content: "\f189"; }

.fa-vnv:before {
  content: "\f40b"; }

.fa-voicemail:before {
  content: "\f897"; }

.fa-volleyball-ball:before {
  content: "\f45f"; }

.fa-volume-down:before {
  content: "\f027"; }

.fa-volume-mute:before {
  content: "\f6a9"; }

.fa-volume-off:before {
  content: "\f026"; }

.fa-volume-up:before {
  content: "\f028"; }

.fa-vote-yea:before {
  content: "\f772"; }

.fa-vr-cardboard:before {
  content: "\f729"; }

.fa-vuejs:before {
  content: "\f41f"; }

.fa-walking:before {
  content: "\f554"; }

.fa-wallet:before {
  content: "\f555"; }

.fa-warehouse:before {
  content: "\f494"; }

.fa-water:before {
  content: "\f773"; }

.fa-wave-square:before {
  content: "\f83e"; }

.fa-waze:before {
  content: "\f83f"; }

.fa-weebly:before {
  content: "\f5cc"; }

.fa-weibo:before {
  content: "\f18a"; }

.fa-weight:before {
  content: "\f496"; }

.fa-weight-hanging:before {
  content: "\f5cd"; }

.fa-weixin:before {
  content: "\f1d7"; }

.fa-whatsapp:before {
  content: "\f232"; }

.fa-whatsapp-square:before {
  content: "\f40c"; }

.fa-wheelchair:before {
  content: "\f193"; }

.fa-whmcs:before {
  content: "\f40d"; }

.fa-wifi:before {
  content: "\f1eb"; }

.fa-wikipedia-w:before {
  content: "\f266"; }

.fa-wind:before {
  content: "\f72e"; }

.fa-window-close:before {
  content: "\f410"; }

.fa-window-maximize:before {
  content: "\f2d0"; }

.fa-window-minimize:before {
  content: "\f2d1"; }

.fa-window-restore:before {
  content: "\f2d2"; }

.fa-windows:before {
  content: "\f17a"; }

.fa-wine-bottle:before {
  content: "\f72f"; }

.fa-wine-glass:before {
  content: "\f4e3"; }

.fa-wine-glass-alt:before {
  content: "\f5ce"; }

.fa-wix:before {
  content: "\f5cf"; }

.fa-wizards-of-the-coast:before {
  content: "\f730"; }

.fa-wolf-pack-battalion:before {
  content: "\f514"; }

.fa-won-sign:before {
  content: "\f159"; }

.fa-wordpress:before {
  content: "\f19a"; }

.fa-wordpress-simple:before {
  content: "\f411"; }

.fa-wpbeginner:before {
  content: "\f297"; }

.fa-wpexplorer:before {
  content: "\f2de"; }

.fa-wpforms:before {
  content: "\f298"; }

.fa-wpressr:before {
  content: "\f3e4"; }

.fa-wrench:before {
  content: "\f0ad"; }

.fa-x-ray:before {
  content: "\f497"; }

.fa-xbox:before {
  content: "\f412"; }

.fa-xing:before {
  content: "\f168"; }

.fa-xing-square:before {
  content: "\f169"; }

.fa-y-combinator:before {
  content: "\f23b"; }

.fa-yahoo:before {
  content: "\f19e"; }

.fa-yammer:before {
  content: "\f840"; }

.fa-yandex:before {
  content: "\f413"; }

.fa-yandex-international:before {
  content: "\f414"; }

.fa-yarn:before {
  content: "\f7e3"; }

.fa-yelp:before {
  content: "\f1e9"; }

.fa-yen-sign:before {
  content: "\f157"; }

.fa-yin-yang:before {
  content: "\f6ad"; }

.fa-yoast:before {
  content: "\f2b1"; }

.fa-youtube:before {
  content: "\f167"; }

.fa-youtube-square:before {
  content: "\f431"; }

.fa-zhihu:before {
  content: "\f63f"; }

.sr-only {
  border: 0;
  clip: rect(0, 0, 0, 0);
  height: 1px;
  margin: -1px;
  overflow: hidden;
  padding: 0;
  position: absolute;
  width: 1px; }

.sr-only-focusable:active, .sr-only-focusable:focus {
  clip: auto;
  height: auto;
  margin: 0;
  overflow: visible;
  position: static;
  width: auto; }

@font-face {
  font-family: 'Font Awesome 5 Brands';
  font-style: normal;
  font-weight: 400;
  font-display: block;
  src: {{ asset("assets/fonts/fa-brands-400.eot")}};
  src: {{ asset("assets/fonts/fa-brands-400.eot?#iefix")}} format("embedded-opentype"), {{ asset("assets/fonts/fa-brands-400.woff2")}} format("woff2"), {{ asset("assets/fonts/fa-brands-400.woff")}} format("woff"), {{ asset("assets/fonts/fa-brands-400.ttf")}} format("truetype"), {{ asset("assets/fonts/fa-brands-400.svg#fontawesome")}} format("svg"); }

.fab {
  font-family: 'Font Awesome 5 Brands';
  font-weight: 400; }

@font-face {
  font-family: 'Font Awesome 5 Free';
  font-style: normal;
  font-weight: 400;
  font-display: block;
  src: {{ asset("assets/fonts/fa-regular-400.eot")}};
  src: {{ asset("assets/fonts/fa-regular-400.eot?#iefix")}} format("embedded-opentype"), {{ asset("assets/fonts/fa-regular-400.woff2")}} format("woff2"), {{ asset("assets/fonts/fa-regular-400.woff")}} format("woff"), {{ asset("assets/fonts/fa-regular-400.ttf")}} format("truetype"), {{ asset("assets/fonts/fa-regular-400.svg#fontawesome")}} format("svg"); }

.far {
  font-family: 'Font Awesome 5 Free';
  font-weight: 400; }

@font-face {
  font-family: 'Font Awesome 5 Free';
  font-style: normal;
  font-weight: 900;
  font-display: block;
  src: {{ asset("assets/fonts/fa-solid-900.eot")}};
  src: {{ asset("assets/fonts/fa-solid-900.eot?#iefix")}} format("embedded-opentype"), {{ asset("assets/fonts/fa-solid-900.woff2")}} format("woff2"), {{ asset("assets/fonts/fa-solid-900.woff")}} format("woff"), {{ asset("assets/fonts/fa-solid-900.ttf")}} format("truetype"), {{ asset("assets/fonts/fa-solid-900.svg#fontawesome") }}format("svg"); }

.fa,
.fas {
  font-family: 'Font Awesome 5 Free';
  font-weight: 900; }

@font-face {
  font-family: "simple-line-icons";
  src: {{ asset("assets/fonts/simple-Line-Icons.eot?-i3a2kk")}};
  src: {{ asset("assets/fonts/simple-Line-Icons.eot?#iefix-i3a2kk")}} format("embedded-opentype"), {{ asset("assets/fonts/simple-Line-Icons.ttf?-i3a2kk")}} format("truetype"), {{ asset("assets/fonts/simple-Line-Icons.woff2?-i3a2kk")}} format("woff2"), {{ asset("assets/fonts/simple-Line-Icons.woff?-i3a2kk")}} format("woff"), {{ asset("assets/fonts/simple-Line-Icons.svg?-i3a2kk#simple-line-icons") }}format("svg");
  font-weight: normal;
  font-style: normal; }

.icon-user, .icon-people, .icon-user-female, .icon-user-follow, .icon-user-following, .icon-user-unfollow, .icon-login, .icon-logout, .icon-emotsmile, .icon-phone, .icon-call-end, .icon-call-in, .icon-call-out, .icon-map, .icon-location-pin, .icon-direction, .icon-directions, .icon-compass, .icon-layers, .icon-menu, .icon-list, .icon-options-vertical, .icon-options, .icon-arrow-down, .icon-arrow-left, .icon-arrow-right, .icon-arrow-up, .icon-arrow-up-circle, .icon-arrow-left-circle, .icon-arrow-right-circle, .icon-arrow-down-circle, .icon-check, .icon-clock, .icon-plus, .icon-close, .icon-trophy, .icon-screen-smartphone, .icon-screen-desktop, .icon-plane, .icon-notebook, .icon-mustache, .icon-mouse, .icon-magnet, .icon-energy, .icon-disc, .icon-cursor, .icon-cursor-move, .icon-crop, .icon-chemistry, .icon-speedometer, .icon-shield, .icon-screen-tablet, .icon-magic-wand, .icon-hourglass, .icon-graduation, .icon-ghost, .icon-game-controller, .icon-fire, .icon-eyeglass, .icon-envelope-open, .icon-envelope-letter, .icon-bell, .icon-badge, .icon-anchor, .icon-wallet, .icon-vector, .icon-speech, .icon-puzzle, .icon-printer, .icon-present, .icon-playlist, .icon-pin, .icon-picture, .icon-handbag, .icon-globe-alt, .icon-globe, .icon-folder-alt, .icon-folder, .icon-film, .icon-feed, .icon-drop, .icon-drawar, .icon-docs, .icon-doc, .icon-diamond, .icon-cup, .icon-calculator, .icon-bubbles, .icon-briefcase, .icon-book-open, .icon-basket-loaded, .icon-basket, .icon-bag, .icon-action-undo, .icon-action-redo, .icon-wrench, .icon-umbrella, .icon-trash, .icon-tag, .icon-support, .icon-frame, .icon-size-fullscreen, .icon-size-actual, .icon-shuffle, .icon-share-alt, .icon-share, .icon-rocket, .icon-question, .icon-pie-chart, .icon-pencil, .icon-note, .icon-loop, .icon-home, .icon-grid, .icon-graph, .icon-microphone, .icon-music-tone-alt, .icon-music-tone, .icon-earphones-alt, .icon-earphones, .icon-equalizer, .icon-like, .icon-dislike, .icon-control-start, .icon-control-rewind, .icon-control-play, .icon-control-pause, .icon-control-forward, .icon-control-end, .icon-volume-1, .icon-volume-2, .icon-volume-off, .icon-calender, .icon-bulb, .icon-chart, .icon-ban, .icon-bubble, .icon-camrecorder, .icon-camera, .icon-cloud-download, .icon-cloud-upload, .icon-envelope, .icon-eye, .icon-flag, .icon-heart, .icon-info, .icon-key, .icon-link, .icon-lock, .icon-lock-open, .icon-magnifier, .icon-magnifier-add, .icon-magnifier-remove, .icon-paper-clip, .icon-paper-plane, .icon-power, .icon-refresh, .icon-reload, .icon-settings, .icon-star, .icon-symble-female, .icon-symbol-male, .icon-target, .icon-credit-card, .icon-paypal, .icon-social-tumblr, .icon-social-twitter, .icon-social-facebook, .icon-social-instagram, .icon-social-linkedin, .icon-social-pintarest, .icon-social-github, .icon-social-gplus, .icon-social-reddit, .icon-social-skype, .icon-social-dribbble, .icon-social-behance, .icon-social-foursqare, .icon-social-soundcloud, .icon-social-spotify, .icon-social-stumbleupon, .icon-social-youtube, .icon-social-dropbox {
  font-family: "simple-line-icons";
  speak: none;
  font-style: normal;
  font-weight: normal;
  font-variant: normal;
  text-transform: none;
  line-height: 1;
  /* Better Font Rendering =========== */
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale; }

.icon-user:before {
  content: "\e005"; }

.icon-people:before {
  content: "\e001"; }

.icon-user-female:before {
  content: "\e000"; }

.icon-user-follow:before {
  content: "\e002"; }

.icon-user-following:before {
  content: "\e003"; }

.icon-user-unfollow:before {
  content: "\e004"; }

.icon-login:before {
  content: "\e066"; }

.icon-logout:before {
  content: "\e065"; }

.icon-emotsmile:before {
  content: "\e021"; }

.icon-phone:before {
  content: "\e600"; }

.icon-call-end:before {
  content: "\e048"; }

.icon-call-in:before {
  content: "\e047"; }

.icon-call-out:before {
  content: "\e046"; }

.icon-map:before {
  content: "\e033"; }

.icon-location-pin:before {
  content: "\e096"; }

.icon-direction:before {
  content: "\e042"; }

.icon-directions:before {
  content: "\e041"; }

.icon-compass:before {
  content: "\e045"; }

.icon-layers:before {
  content: "\e034"; }

.icon-menu:before {
  content: "\e601"; }

.icon-list:before {
  content: "\e067"; }

.icon-options-vertical:before {
  content: "\e602"; }

.icon-options:before {
  content: "\e603"; }

.icon-arrow-down:before {
  content: "\e604"; }

.icon-arrow-left:before {
  content: "\e605"; }

.icon-arrow-right:before {
  content: "\e606"; }

.icon-arrow-up:before {
  content: "\e607"; }

.icon-arrow-up-circle:before {
  content: "\e078"; }

.icon-arrow-left-circle:before {
  content: "\e07a"; }

.icon-arrow-right-circle:before {
  content: "\e079"; }

.icon-arrow-down-circle:before {
  content: "\e07b"; }

.icon-check:before {
  content: "\e080"; }

.icon-clock:before {
  content: "\e081"; }

.icon-plus:before {
  content: "\e095"; }

.icon-close:before {
  content: "\e082"; }

.icon-trophy:before {
  content: "\e006"; }

.icon-screen-smartphone:before {
  content: "\e010"; }

.icon-screen-desktop:before {
  content: "\e011"; }

.icon-plane:before {
  content: "\e012"; }

.icon-notebook:before {
  content: "\e013"; }

.icon-mustache:before {
  content: "\e014"; }

.icon-mouse:before {
  content: "\e015"; }

.icon-magnet:before {
  content: "\e016"; }

.icon-energy:before {
  content: "\e020"; }

.icon-disc:before {
  content: "\e022"; }

.icon-cursor:before {
  content: "\e06e"; }

.icon-cursor-move:before {
  content: "\e023"; }

.icon-crop:before {
  content: "\e024"; }

.icon-chemistry:before {
  content: "\e026"; }

.icon-speedometer:before {
  content: "\e007"; }

.icon-shield:before {
  content: "\e00e"; }

.icon-screen-tablet:before {
  content: "\e00f"; }

.icon-magic-wand:before {
  content: "\e017"; }

.icon-hourglass:before {
  content: "\e018"; }

.icon-graduation:before {
  content: "\e019"; }

.icon-ghost:before {
  content: "\e01a"; }

.icon-game-controller:before {
  content: "\e01b"; }

.icon-fire:before {
  content: "\e01c"; }

.icon-eyeglass:before {
  content: "\e01d"; }

.icon-envelope-open:before {
  content: "\e01e"; }

.icon-envelope-letter:before {
  content: "\e01f"; }

.icon-bell:before {
  content: "\e027"; }

.icon-badge:before {
  content: "\e028"; }

.icon-anchor:before {
  content: "\e029"; }

.icon-wallet:before {
  content: "\e02a"; }

.icon-vector:before {
  content: "\e02b"; }

.icon-speech:before {
  content: "\e02c"; }

.icon-puzzle:before {
  content: "\e02d"; }

.icon-printer:before {
  content: "\e02e"; }

.icon-present:before {
  content: "\e02f"; }

.icon-playlist:before {
  content: "\e030"; }

.icon-pin:before {
  content: "\e031"; }

.icon-picture:before {
  content: "\e032"; }

.icon-handbag:before {
  content: "\e035"; }

.icon-globe-alt:before {
  content: "\e036"; }

.icon-globe:before {
  content: "\e037"; }

.icon-folder-alt:before {
  content: "\e039"; }

.icon-folder:before {
  content: "\e089"; }

.icon-film:before {
  content: "\e03a"; }

.icon-feed:before {
  content: "\e03b"; }

.icon-drop:before {
  content: "\e03e"; }

.icon-drawar:before {
  content: "\e03f"; }

.icon-docs:before {
  content: "\e040"; }

.icon-doc:before {
  content: "\e085"; }

.icon-diamond:before {
  content: "\e043"; }

.icon-cup:before {
  content: "\e044"; }

.icon-calculator:before {
  content: "\e049"; }

.icon-bubbles:before {
  content: "\e04a"; }

.icon-briefcase:before {
  content: "\e04b"; }

.icon-book-open:before {
  content: "\e04c"; }

.icon-basket-loaded:before {
  content: "\e04d"; }

.icon-basket:before {
  content: "\e04e"; }

.icon-bag:before {
  content: "\e04f"; }

.icon-action-undo:before {
  content: "\e050"; }

.icon-action-redo:before {
  content: "\e051"; }

.icon-wrench:before {
  content: "\e052"; }

.icon-umbrella:before {
  content: "\e053"; }

.icon-trash:before {
  content: "\e054"; }

.icon-tag:before {
  content: "\e055"; }

.icon-support:before {
  content: "\e056"; }

.icon-frame:before {
  content: "\e038"; }

.icon-size-fullscreen:before {
  content: "\e057"; }

.icon-size-actual:before {
  content: "\e058"; }

.icon-shuffle:before {
  content: "\e059"; }

.icon-share-alt:before {
  content: "\e05a"; }

.icon-share:before {
  content: "\e05b"; }

.icon-rocket:before {
  content: "\e05c"; }

.icon-question:before {
  content: "\e05d"; }

.icon-pie-chart:before {
  content: "\e05e"; }

.icon-pencil:before {
  content: "\e05f"; }

.icon-note:before {
  content: "\e060"; }

.icon-loop:before {
  content: "\e064"; }

.icon-home:before {
  content: "\e069"; }

.icon-grid:before {
  content: "\e06a"; }

.icon-graph:before {
  content: "\e06b"; }

.icon-microphone:before {
  content: "\e063"; }

.icon-music-tone-alt:before {
  content: "\e061"; }

.icon-music-tone:before {
  content: "\e062"; }

.icon-earphones-alt:before {
  content: "\e03c"; }

.icon-earphones:before {
  content: "\e03d"; }

.icon-equalizer:before {
  content: "\e06c"; }

.icon-like:before {
  content: "\e068"; }

.icon-dislike:before {
  content: "\e06d"; }

.icon-control-start:before {
  content: "\e06f"; }

.icon-control-rewind:before {
  content: "\e070"; }

.icon-control-play:before {
  content: "\e071"; }

.icon-control-pause:before {
  content: "\e072"; }

.icon-control-forward:before {
  content: "\e073"; }

.icon-control-end:before {
  content: "\e074"; }

.icon-volume-1:before {
  content: "\e09f"; }

.icon-volume-2:before {
  content: "\e0a0"; }

.icon-volume-off:before {
  content: "\e0a1"; }

.icon-calender:before {
  content: "\e075"; }

.icon-bulb:before {
  content: "\e076"; }

.icon-chart:before {
  content: "\e077"; }

.icon-ban:before {
  content: "\e07c"; }

.icon-bubble:before {
  content: "\e07d"; }

.icon-camrecorder:before {
  content: "\e07e"; }

.icon-camera:before {
  content: "\e07f"; }

.icon-cloud-download:before {
  content: "\e083"; }

.icon-cloud-upload:before {
  content: "\e084"; }

.icon-envelope:before {
  content: "\e086"; }

.icon-eye:before {
  content: "\e087"; }

.icon-flag:before {
  content: "\e088"; }

.icon-heart:before {
  content: "\e08a"; }

.icon-info:before {
  content: "\e08b"; }

.icon-key:before {
  content: "\e08c"; }

.icon-link:before {
  content: "\e08d"; }

.icon-lock:before {
  content: "\e08e"; }

.icon-lock-open:before {
  content: "\e08f"; }

.icon-magnifier:before {
  content: "\e090"; }

.icon-magnifier-add:before {
  content: "\e091"; }

.icon-magnifier-remove:before {
  content: "\e092"; }

.icon-paper-clip:before {
  content: "\e093"; }

.icon-paper-plane:before {
  content: "\e094"; }

.icon-power:before {
  content: "\e097"; }

.icon-refresh:before {
  content: "\e098"; }

.icon-reload:before {
  content: "\e099"; }

.icon-settings:before {
  content: "\e09a"; }

.icon-star:before {
  content: "\e09b"; }

.icon-symble-female:before {
  content: "\e09c"; }

.icon-symbol-male:before {
  content: "\e09d"; }

.icon-target:before {
  content: "\e09e"; }

.icon-credit-card:before {
  content: "\e025"; }

.icon-paypal:before {
  content: "\e608"; }

.icon-social-tumblr:before {
  content: "\e00a"; }

.icon-social-twitter:before {
  content: "\e009"; }

.icon-social-facebook:before {
  content: "\e00b"; }

.icon-social-instagram:before {
  content: "\e609"; }

.icon-social-linkedin:before {
  content: "\e60a"; }

.icon-social-pintarest:before {
  content: "\e60b"; }

.icon-social-github:before {
  content: "\e60c"; }

.icon-social-gplus:before {
  content: "\e60d"; }

.icon-social-reddit:before {
  content: "\e60e"; }

.icon-social-skype:before {
  content: "\e60f"; }

.icon-social-dribbble:before {
  content: "\e00d"; }

.icon-social-behance:before {
  content: "\e610"; }

.icon-social-foursqare:before {
  content: "\e611"; }

.icon-social-soundcloud:before {
  content: "\e612"; }

.icon-social-spotify:before {
  content: "\e613"; }

.icon-social-stumbleupon:before {
  content: "\e614"; }

.icon-social-youtube:before {
  content: "\e008"; }

.icon-social-dropbox:before {
  content: "\e00c"; }

/*!
 *  Weather Icons 2.0
 *  Updated August 1, 2015
 *  Weather themed icons for Bootstrap
 *  Author - Erik Flowers - erik@helloerik.com
 *  Email: erik@helloerik.com
 *  Twitter: http://twitter.com/Erik_UX
 *  ------------------------------------------------------------------------------
 *  Maintained at http://erikflowers.github.io/weather-icons
 *
 *  License
 *  ------------------------------------------------------------------------------
 *  - Font licensed under SIL OFL 1.1 -
 *    http://scripts.sil.org/OFL
 *  - CSS, LESS and SCSS are licensed under MIT License -
 *    http://opensource.org/licenses/mit-license.html
 *  - Documentation licensed under CC BY 3.0 -
 *    http://creativecommons.org/licenses/by/3.0/
 *  - Inspired by and works great as a companion with Font Awesome
 *    "Font Awesome by Dave Gandy - http://fontawesome.io"
 */
@font-face {
  font-family: "weathericons";
  src: {{ asset("assets/fonts/weathericons-regular-webfont.eot")}};
  /* src: {{ asset("assets/fonts/weathericons-regular-webfont.eot?#iefix")}} format("embedded-opentype"), {{ asset("assets/fonts/weathericons-regular-webfont.woff2")}} format("woff2"), {{ asset("assets/fonts/weathericons-regular-webfont.woff")}} format("woff"), {{ asset("assets/fonts/weathericons-regular-webfont.ttf") format("truetype")}}, {{ asset("assets/fonts/weathericons-regular-webfont.svg#weather_iconsregular")}} format("svg"); */
  font-weight: normal;
  font-style: normal; }

.wi {
  display: inline-block;
  font-family: "weathericons";
  font-style: normal;
  font-weight: normal;
  line-height: 1;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale; }

.wi-fw {
  width: 1.4em;
  text-align: center; }

.wi-rotate-90 {
  filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=1);
  transform: rotate(90deg); }

.wi-rotate-180 {
  filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=2);
  transform: rotate(180deg); }

.wi-rotate-270 {
  filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
  transform: rotate(270deg); }

.wi-flip-horizontal {
  filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=0);
  transform: scale(-1, 1); }

.wi-flip-vertical {
  filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=2);
  transform: scale(1, -1); }

.wi-day-sunny:before {
  content: ""; }

.wi-day-cloudy:before {
  content: ""; }

.wi-day-cloudy-gusts:before {
  content: ""; }

.wi-day-cloudy-windy:before {
  content: ""; }

.wi-day-fog:before {
  content: ""; }

.wi-day-hail:before {
  content: ""; }

.wi-day-haze:before {
  content: ""; }

.wi-day-lightning:before {
  content: ""; }

.wi-day-rain:before {
  content: ""; }

.wi-day-rain-mix:before {
  content: ""; }

.wi-day-rain-wind:before {
  content: ""; }

.wi-day-showers:before {
  content: ""; }

.wi-day-sleet:before {
  content: ""; }

.wi-day-sleet-storm:before {
  content: ""; }

.wi-day-snow:before {
  content: ""; }

.wi-day-snow-thunderstorm:before {
  content: ""; }

.wi-day-snow-wind:before {
  content: ""; }

.wi-day-sprinkle:before {
  content: ""; }

.wi-day-storm-showers:before {
  content: ""; }

.wi-day-sunny-overcast:before {
  content: ""; }

.wi-day-thunderstorm:before {
  content: ""; }

.wi-day-windy:before {
  content: ""; }

.wi-solar-eclipse:before {
  content: ""; }

.wi-hot:before {
  content: ""; }

.wi-day-cloudy-high:before {
  content: ""; }

.wi-day-light-wind:before {
  content: ""; }

.wi-night-clear:before {
  content: ""; }

.wi-night-alt-cloudy:before {
  content: ""; }

.wi-night-alt-cloudy-gusts:before {
  content: ""; }

.wi-night-alt-cloudy-windy:before {
  content: ""; }

.wi-night-alt-hail:before {
  content: ""; }

.wi-night-alt-lightning:before {
  content: ""; }

.wi-night-alt-rain:before {
  content: ""; }

.wi-night-alt-rain-mix:before {
  content: ""; }

.wi-night-alt-rain-wind:before {
  content: ""; }

.wi-night-alt-showers:before {
  content: ""; }

.wi-night-alt-sleet:before {
  content: ""; }

.wi-night-alt-sleet-storm:before {
  content: ""; }

.wi-night-alt-snow:before {
  content: ""; }

.wi-night-alt-snow-thunderstorm:before {
  content: ""; }

.wi-night-alt-snow-wind:before {
  content: ""; }

.wi-night-alt-sprinkle:before {
  content: ""; }

.wi-night-alt-storm-showers:before {
  content: ""; }

.wi-night-alt-thunderstorm:before {
  content: ""; }

.wi-night-cloudy:before {
  content: ""; }

.wi-night-cloudy-gusts:before {
  content: ""; }

.wi-night-cloudy-windy:before {
  content: ""; }

.wi-night-fog:before {
  content: ""; }

.wi-night-hail:before {
  content: ""; }

.wi-night-lightning:before {
  content: ""; }

.wi-night-partly-cloudy:before {
  content: ""; }

.wi-night-rain:before {
  content: ""; }

.wi-night-rain-mix:before {
  content: ""; }

.wi-night-rain-wind:before {
  content: ""; }

.wi-night-showers:before {
  content: ""; }

.wi-night-sleet:before {
  content: ""; }

.wi-night-sleet-storm:before {
  content: ""; }

.wi-night-snow:before {
  content: ""; }

.wi-night-snow-thunderstorm:before {
  content: ""; }

.wi-night-snow-wind:before {
  content: ""; }

.wi-night-sprinkle:before {
  content: ""; }

.wi-night-storm-showers:before {
  content: ""; }

.wi-night-thunderstorm:before {
  content: ""; }

.wi-lunar-eclipse:before {
  content: ""; }

.wi-stars:before {
  content: ""; }

.wi-storm-showers:before {
  content: ""; }

.wi-thunderstorm:before {
  content: ""; }

.wi-night-alt-cloudy-high:before {
  content: ""; }

.wi-night-cloudy-high:before {
  content: ""; }

.wi-night-alt-partly-cloudy:before {
  content: ""; }

.wi-cloud:before {
  content: ""; }

.wi-cloudy:before {
  content: ""; }

.wi-cloudy-gusts:before {
  content: ""; }

.wi-cloudy-windy:before {
  content: ""; }

.wi-fog:before {
  content: ""; }

.wi-hail:before {
  content: ""; }

.wi-rain:before {
  content: ""; }

.wi-rain-mix:before {
  content: ""; }

.wi-rain-wind:before {
  content: ""; }

.wi-showers:before {
  content: ""; }

.wi-sleet:before {
  content: ""; }

.wi-snow:before {
  content: ""; }

.wi-sprinkle:before {
  content: ""; }

.wi-storm-showers:before {
  content: ""; }

.wi-thunderstorm:before {
  content: ""; }

.wi-snow-wind:before {
  content: ""; }

.wi-snow:before {
  content: ""; }

.wi-smog:before {
  content: ""; }

.wi-smoke:before {
  content: ""; }

.wi-lightning:before {
  content: ""; }

.wi-raindrops:before {
  content: ""; }

.wi-raindrop:before {
  content: ""; }

.wi-dust:before {
  content: ""; }

.wi-snowflake-cold:before {
  content: ""; }

.wi-windy:before {
  content: ""; }

.wi-strong-wind:before {
  content: ""; }

.wi-sandstorm:before {
  content: ""; }

.wi-earthquake:before {
  content: ""; }

.wi-fire:before {
  content: ""; }

.wi-flood:before {
  content: ""; }

.wi-meteor:before {
  content: ""; }

.wi-tsunami:before {
  content: ""; }

.wi-volcano:before {
  content: ""; }

.wi-hurricane:before {
  content: ""; }

.wi-tornado:before {
  content: ""; }

.wi-small-craft-advisory:before {
  content: ""; }

.wi-gale-warning:before {
  content: ""; }

.wi-storm-warning:before {
  content: ""; }

.wi-hurricane-warning:before {
  content: ""; }

.wi-wind-direction:before {
  content: ""; }

.wi-alien:before {
  content: ""; }

.wi-celsius:before {
  content: ""; }

.wi-fahrenheit:before {
  content: ""; }

.wi-degrees:before {
  content: ""; }

.wi-thermometer:before {
  content: ""; }

.wi-thermometer-exterior:before {
  content: ""; }

.wi-thermometer-internal:before {
  content: ""; }

.wi-cloud-down:before {
  content: ""; }

.wi-cloud-up:before {
  content: ""; }

.wi-cloud-refresh:before {
  content: ""; }

.wi-horizon:before {
  content: ""; }

.wi-horizon-alt:before {
  content: ""; }

.wi-sunrise:before {
  content: ""; }

.wi-sunset:before {
  content: ""; }

.wi-moonrise:before {
  content: ""; }

.wi-moonset:before {
  content: ""; }

.wi-refresh:before {
  content: ""; }

.wi-refresh-alt:before {
  content: ""; }

.wi-umbrella:before {
  content: ""; }

.wi-barometer:before {
  content: ""; }

.wi-humidity:before {
  content: ""; }

.wi-na:before {
  content: ""; }

.wi-train:before {
  content: ""; }

.wi-moon-new:before {
  content: ""; }

.wi-moon-waxing-cresent-1:before {
  content: ""; }

.wi-moon-waxing-cresent-2:before {
  content: ""; }

.wi-moon-waxing-cresent-3:before {
  content: ""; }

.wi-moon-waxing-cresent-4:before {
  content: ""; }

.wi-moon-waxing-cresent-5:before {
  content: ""; }

.wi-moon-waxing-cresent-6:before {
  content: ""; }

.wi-moon-first-quarter:before {
  content: ""; }

.wi-moon-waxing-gibbous-1:before {
  content: ""; }

.wi-moon-waxing-gibbous-2:before {
  content: ""; }

.wi-moon-waxing-gibbous-3:before {
  content: ""; }

.wi-moon-waxing-gibbous-4:before {
  content: ""; }

.wi-moon-waxing-gibbous-5:before {
  content: ""; }

.wi-moon-waxing-gibbous-6:before {
  content: ""; }

.wi-moon-full:before {
  content: ""; }

.wi-moon-waning-gibbous-1:before {
  content: ""; }

.wi-moon-waning-gibbous-2:before {
  content: ""; }

.wi-moon-waning-gibbous-3:before {
  content: ""; }

.wi-moon-waning-gibbous-4:before {
  content: ""; }

.wi-moon-waning-gibbous-5:before {
  content: ""; }

.wi-moon-waning-gibbous-6:before {
  content: ""; }

.wi-moon-third-quarter:before {
  content: ""; }

.wi-moon-waning-crescent-1:before {
  content: ""; }

.wi-moon-waning-crescent-2:before {
  content: ""; }

.wi-moon-waning-crescent-3:before {
  content: ""; }

.wi-moon-waning-crescent-4:before {
  content: ""; }

.wi-moon-waning-crescent-5:before {
  content: ""; }

.wi-moon-waning-crescent-6:before {
  content: ""; }

.wi-moon-alt-new:before {
  content: ""; }

.wi-moon-alt-waxing-cresent-1:before {
  content: ""; }

.wi-moon-alt-waxing-cresent-2:before {
  content: ""; }

.wi-moon-alt-waxing-cresent-3:before {
  content: ""; }

.wi-moon-alt-waxing-cresent-4:before {
  content: ""; }

.wi-moon-alt-waxing-cresent-5:before {
  content: ""; }

.wi-moon-alt-waxing-cresent-6:before {
  content: ""; }

.wi-moon-alt-first-quarter:before {
  content: ""; }

.wi-moon-alt-waxing-gibbous-1:before {
  content: ""; }

.wi-moon-alt-waxing-gibbous-2:before {
  content: ""; }

.wi-moon-alt-waxing-gibbous-3:before {
  content: ""; }

.wi-moon-alt-waxing-gibbous-4:before {
  content: ""; }

.wi-moon-alt-waxing-gibbous-5:before {
  content: ""; }

.wi-moon-alt-waxing-gibbous-6:before {
  content: ""; }

.wi-moon-alt-full:before {
  content: ""; }

.wi-moon-alt-waning-gibbous-1:before {
  content: ""; }

.wi-moon-alt-waning-gibbous-2:before {
  content: ""; }

.wi-moon-alt-waning-gibbous-3:before {
  content: ""; }

.wi-moon-alt-waning-gibbous-4:before {
  content: ""; }

.wi-moon-alt-waning-gibbous-5:before {
  content: ""; }

.wi-moon-alt-waning-gibbous-6:before {
  content: ""; }

.wi-moon-alt-third-quarter:before {
  content: ""; }

.wi-moon-alt-waning-crescent-1:before {
  content: ""; }

.wi-moon-alt-waning-crescent-2:before {
  content: ""; }

.wi-moon-alt-waning-crescent-3:before {
  content: ""; }

.wi-moon-alt-waning-crescent-4:before {
  content: ""; }

.wi-moon-alt-waning-crescent-5:before {
  content: ""; }

.wi-moon-alt-waning-crescent-6:before {
  content: ""; }

.wi-moon-0:before {
  content: ""; }

.wi-moon-1:before {
  content: ""; }

.wi-moon-2:before {
  content: ""; }

.wi-moon-3:before {
  content: ""; }

.wi-moon-4:before {
  content: ""; }

.wi-moon-5:before {
  content: ""; }

.wi-moon-6:before {
  content: ""; }

.wi-moon-7:before {
  content: ""; }

.wi-moon-8:before {
  content: ""; }

.wi-moon-9:before {
  content: ""; }

.wi-moon-10:before {
  content: ""; }

.wi-moon-11:before {
  content: ""; }

.wi-moon-12:before {
  content: ""; }

.wi-moon-13:before {
  content: ""; }

.wi-moon-14:before {
  content: ""; }

.wi-moon-15:before {
  content: ""; }

.wi-moon-16:before {
  content: ""; }

.wi-moon-17:before {
  content: ""; }

.wi-moon-18:before {
  content: ""; }

.wi-moon-19:before {
  content: ""; }

.wi-moon-20:before {
  content: ""; }

.wi-moon-21:before {
  content: ""; }

.wi-moon-22:before {
  content: ""; }

.wi-moon-23:before {
  content: ""; }

.wi-moon-24:before {
  content: ""; }

.wi-moon-25:before {
  content: ""; }

.wi-moon-26:before {
  content: ""; }

.wi-moon-27:before {
  content: ""; }

.wi-time-1:before {
  content: ""; }

.wi-time-2:before {
  content: ""; }

.wi-time-3:before {
  content: ""; }

.wi-time-4:before {
  content: ""; }

.wi-time-5:before {
  content: ""; }

.wi-time-6:before {
  content: ""; }

.wi-time-7:before {
  content: ""; }

.wi-time-8:before {
  content: ""; }

.wi-time-9:before {
  content: ""; }

.wi-time-10:before {
  content: ""; }

.wi-time-11:before {
  content: ""; }

.wi-time-12:before {
  content: ""; }

.wi-direction-up:before {
  content: ""; }

.wi-direction-up-right:before {
  content: ""; }

.wi-direction-right:before {
  content: ""; }

.wi-direction-down-right:before {
  content: ""; }

.wi-direction-down:before {
  content: ""; }

.wi-direction-down-left:before {
  content: ""; }

.wi-direction-left:before {
  content: ""; }

.wi-direction-up-left:before {
  content: ""; }

.wi-wind-beaufort-0:before {
  content: ""; }

.wi-wind-beaufort-1:before {
  content: ""; }

.wi-wind-beaufort-2:before {
  content: ""; }

.wi-wind-beaufort-3:before {
  content: ""; }

.wi-wind-beaufort-4:before {
  content: ""; }

.wi-wind-beaufort-5:before {
  content: ""; }

.wi-wind-beaufort-6:before {
  content: ""; }

.wi-wind-beaufort-7:before {
  content: ""; }

.wi-wind-beaufort-8:before {
  content: ""; }

.wi-wind-beaufort-9:before {
  content: ""; }

.wi-wind-beaufort-10:before {
  content: ""; }

.wi-wind-beaufort-11:before {
  content: ""; }

.wi-wind-beaufort-12:before {
  content: ""; }

.wi-yahoo-0:before {
  content: ""; }

.wi-yahoo-1:before {
  content: ""; }

.wi-yahoo-2:before {
  content: ""; }

.wi-yahoo-3:before {
  content: ""; }

.wi-yahoo-4:before {
  content: ""; }

.wi-yahoo-5:before {
  content: ""; }

.wi-yahoo-6:before {
  content: ""; }

.wi-yahoo-7:before {
  content: ""; }

.wi-yahoo-8:before {
  content: ""; }

.wi-yahoo-9:before {
  content: ""; }

.wi-yahoo-10:before {
  content: ""; }

.wi-yahoo-11:before {
  content: ""; }

.wi-yahoo-12:before {
  content: ""; }

.wi-yahoo-13:before {
  content: ""; }

.wi-yahoo-14:before {
  content: ""; }

.wi-yahoo-15:before {
  content: ""; }

.wi-yahoo-16:before {
  content: ""; }

.wi-yahoo-17:before {
  content: ""; }

.wi-yahoo-18:before {
  content: ""; }

.wi-yahoo-19:before {
  content: ""; }

.wi-yahoo-20:before {
  content: ""; }

.wi-yahoo-21:before {
  content: ""; }

.wi-yahoo-22:before {
  content: ""; }

.wi-yahoo-23:before {
  content: ""; }

.wi-yahoo-24:before {
  content: ""; }

.wi-yahoo-25:before {
  content: ""; }

.wi-yahoo-26:before {
  content: ""; }

.wi-yahoo-27:before {
  content: ""; }

.wi-yahoo-28:before {
  content: ""; }

.wi-yahoo-29:before {
  content: ""; }

.wi-yahoo-30:before {
  content: ""; }

.wi-yahoo-31:before {
  content: ""; }

.wi-yahoo-32:before {
  content: ""; }

.wi-yahoo-33:before {
  content: ""; }

.wi-yahoo-34:before {
  content: ""; }

.wi-yahoo-35:before {
  content: ""; }

.wi-yahoo-36:before {
  content: ""; }

.wi-yahoo-37:before {
  content: ""; }

.wi-yahoo-38:before {
  content: ""; }

.wi-yahoo-39:before {
  content: ""; }

.wi-yahoo-40:before {
  content: ""; }

.wi-yahoo-41:before {
  content: ""; }

.wi-yahoo-42:before {
  content: ""; }

.wi-yahoo-43:before {
  content: ""; }

.wi-yahoo-44:before {
  content: ""; }

.wi-yahoo-45:before {
  content: ""; }

.wi-yahoo-46:before {
  content: ""; }

.wi-yahoo-47:before {
  content: ""; }

.wi-yahoo-3200:before {
  content: ""; }

.wi-forecast-io-clear-day:before {
  content: ""; }

.wi-forecast-io-clear-night:before {
  content: ""; }

.wi-forecast-io-rain:before {
  content: ""; }

.wi-forecast-io-snow:before {
  content: ""; }

.wi-forecast-io-sleet:before {
  content: ""; }

.wi-forecast-io-wind:before {
  content: ""; }

.wi-forecast-io-fog:before {
  content: ""; }

.wi-forecast-io-cloudy:before {
  content: ""; }

.wi-forecast-io-partly-cloudy-day:before {
  content: ""; }

.wi-forecast-io-partly-cloudy-night:before {
  content: ""; }

.wi-forecast-io-hail:before {
  content: ""; }

.wi-forecast-io-thunderstorm:before {
  content: ""; }

.wi-forecast-io-tornado:before {
  content: ""; }

.wi-wmo4680-0:before,
.wi-wmo4680-00:before {
  content: ""; }

.wi-wmo4680-1:before,
.wi-wmo4680-01:before {
  content: ""; }

.wi-wmo4680-2:before,
.wi-wmo4680-02:before {
  content: ""; }

.wi-wmo4680-3:before,
.wi-wmo4680-03:before {
  content: ""; }

.wi-wmo4680-4:before,
.wi-wmo4680-04:before {
  content: ""; }

.wi-wmo4680-5:before,
.wi-wmo4680-05:before {
  content: ""; }

.wi-wmo4680-10:before {
  content: ""; }

.wi-wmo4680-11:before {
  content: ""; }

.wi-wmo4680-12:before {
  content: ""; }

.wi-wmo4680-18:before {
  content: ""; }

.wi-wmo4680-20:before {
  content: ""; }

.wi-wmo4680-21:before {
  content: ""; }

.wi-wmo4680-22:before {
  content: ""; }

.wi-wmo4680-23:before {
  content: ""; }

.wi-wmo4680-24:before {
  content: ""; }

.wi-wmo4680-25:before {
  content: ""; }

.wi-wmo4680-26:before {
  content: ""; }

.wi-wmo4680-27:before {
  content: ""; }

.wi-wmo4680-28:before {
  content: ""; }

.wi-wmo4680-29:before {
  content: ""; }

.wi-wmo4680-30:before {
  content: ""; }

.wi-wmo4680-31:before {
  content: ""; }

.wi-wmo4680-32:before {
  content: ""; }

.wi-wmo4680-33:before {
  content: ""; }

.wi-wmo4680-34:before {
  content: ""; }

.wi-wmo4680-35:before {
  content: ""; }

.wi-wmo4680-40:before {
  content: ""; }

.wi-wmo4680-41:before {
  content: ""; }

.wi-wmo4680-42:before {
  content: ""; }

.wi-wmo4680-43:before {
  content: ""; }

.wi-wmo4680-44:before {
  content: ""; }

.wi-wmo4680-45:before {
  content: ""; }

.wi-wmo4680-46:before {
  content: ""; }

.wi-wmo4680-47:before {
  content: ""; }

.wi-wmo4680-48:before {
  content: ""; }

.wi-wmo4680-50:before {
  content: ""; }

.wi-wmo4680-51:before {
  content: ""; }

.wi-wmo4680-52:before {
  content: ""; }

.wi-wmo4680-53:before {
  content: ""; }

.wi-wmo4680-54:before {
  content: ""; }

.wi-wmo4680-55:before {
  content: ""; }

.wi-wmo4680-56:before {
  content: ""; }

.wi-wmo4680-57:before {
  content: ""; }

.wi-wmo4680-58:before {
  content: ""; }

.wi-wmo4680-60:before {
  content: ""; }

.wi-wmo4680-61:before {
  content: ""; }

.wi-wmo4680-62:before {
  content: ""; }

.wi-wmo4680-63:before {
  content: ""; }

.wi-wmo4680-64:before {
  content: ""; }

.wi-wmo4680-65:before {
  content: ""; }

.wi-wmo4680-66:before {
  content: ""; }

.wi-wmo4680-67:before {
  content: ""; }

.wi-wmo4680-68:before {
  content: ""; }

.wi-wmo4680-70:before {
  content: ""; }

.wi-wmo4680-71:before {
  content: ""; }

.wi-wmo4680-72:before {
  content: ""; }

.wi-wmo4680-73:before {
  content: ""; }

.wi-wmo4680-74:before {
  content: ""; }

.wi-wmo4680-75:before {
  content: ""; }

.wi-wmo4680-76:before {
  content: ""; }

.wi-wmo4680-77:before {
  content: ""; }

.wi-wmo4680-78:before {
  content: ""; }

.wi-wmo4680-80:before {
  content: ""; }

.wi-wmo4680-81:before {
  content: ""; }

.wi-wmo4680-82:before {
  content: ""; }

.wi-wmo4680-83:before {
  content: ""; }

.wi-wmo4680-84:before {
  content: ""; }

.wi-wmo4680-85:before {
  content: ""; }

.wi-wmo4680-86:before {
  content: ""; }

.wi-wmo4680-87:before {
  content: ""; }

.wi-wmo4680-89:before {
  content: ""; }

.wi-wmo4680-90:before {
  content: ""; }

.wi-wmo4680-91:before {
  content: ""; }

.wi-wmo4680-92:before {
  content: ""; }

.wi-wmo4680-93:before {
  content: ""; }

.wi-wmo4680-94:before {
  content: ""; }

.wi-wmo4680-95:before {
  content: ""; }

.wi-wmo4680-96:before {
  content: ""; }

.wi-wmo4680-99:before {
  content: ""; }

.wi-owm-200:before {
  content: ""; }

.wi-owm-201:before {
  content: ""; }

.wi-owm-202:before {
  content: ""; }

.wi-owm-210:before {
  content: ""; }

.wi-owm-211:before {
  content: ""; }

.wi-owm-212:before {
  content: ""; }

.wi-owm-221:before {
  content: ""; }

.wi-owm-230:before {
  content: ""; }

.wi-owm-231:before {
  content: ""; }

.wi-owm-232:before {
  content: ""; }

.wi-owm-300:before {
  content: ""; }

.wi-owm-301:before {
  content: ""; }

.wi-owm-302:before {
  content: ""; }

.wi-owm-310:before {
  content: ""; }

.wi-owm-311:before {
  content: ""; }

.wi-owm-312:before {
  content: ""; }

.wi-owm-313:before {
  content: ""; }

.wi-owm-314:before {
  content: ""; }

.wi-owm-321:before {
  content: ""; }

.wi-owm-500:before {
  content: ""; }

.wi-owm-501:before {
  content: ""; }

.wi-owm-502:before {
  content: ""; }

.wi-owm-503:before {
  content: ""; }

.wi-owm-504:before {
  content: ""; }

.wi-owm-511:before {
  content: ""; }

.wi-owm-520:before {
  content: ""; }

.wi-owm-521:before {
  content: ""; }

.wi-owm-522:before {
  content: ""; }

.wi-owm-531:before {
  content: ""; }

.wi-owm-600:before {
  content: ""; }

.wi-owm-601:before {
  content: ""; }

.wi-owm-602:before {
  content: ""; }

.wi-owm-611:before {
  content: ""; }

.wi-owm-612:before {
  content: ""; }

.wi-owm-615:before {
  content: ""; }

.wi-owm-616:before {
  content: ""; }

.wi-owm-620:before {
  content: ""; }

.wi-owm-621:before {
  content: ""; }

.wi-owm-622:before {
  content: ""; }

.wi-owm-701:before {
  content: ""; }

.wi-owm-711:before {
  content: ""; }

.wi-owm-721:before {
  content: ""; }

.wi-owm-731:before {
  content: ""; }

.wi-owm-741:before {
  content: ""; }

.wi-owm-761:before {
  content: ""; }

.wi-owm-762:before {
  content: ""; }

.wi-owm-771:before {
  content: ""; }

.wi-owm-781:before {
  content: ""; }

.wi-owm-800:before {
  content: ""; }

.wi-owm-801:before {
  content: ""; }

.wi-owm-802:before {
  content: ""; }

.wi-owm-803:before {
  content: ""; }

.wi-owm-803:before {
  content: ""; }

.wi-owm-804:before {
  content: ""; }

.wi-owm-900:before {
  content: ""; }

.wi-owm-901:before {
  content: ""; }

.wi-owm-902:before {
  content: ""; }

.wi-owm-903:before {
  content: ""; }

.wi-owm-904:before {
  content: ""; }

.wi-owm-905:before {
  content: ""; }

.wi-owm-906:before {
  content: ""; }

.wi-owm-957:before {
  content: ""; }

.wi-owm-day-200:before {
  content: ""; }

.wi-owm-day-201:before {
  content: ""; }

.wi-owm-day-202:before {
  content: ""; }

.wi-owm-day-210:before {
  content: ""; }

.wi-owm-day-211:before {
  content: ""; }

.wi-owm-day-212:before {
  content: ""; }

.wi-owm-day-221:before {
  content: ""; }

.wi-owm-day-230:before {
  content: ""; }

.wi-owm-day-231:before {
  content: ""; }

.wi-owm-day-232:before {
  content: ""; }

.wi-owm-day-300:before {
  content: ""; }

.wi-owm-day-301:before {
  content: ""; }

.wi-owm-day-302:before {
  content: ""; }

.wi-owm-day-310:before {
  content: ""; }

.wi-owm-day-311:before {
  content: ""; }

.wi-owm-day-312:before {
  content: ""; }

.wi-owm-day-313:before {
  content: ""; }

.wi-owm-day-314:before {
  content: ""; }

.wi-owm-day-321:before {
  content: ""; }

.wi-owm-day-500:before {
  content: ""; }

.wi-owm-day-501:before {
  content: ""; }

.wi-owm-day-502:before {
  content: ""; }

.wi-owm-day-503:before {
  content: ""; }

.wi-owm-day-504:before {
  content: ""; }

.wi-owm-day-511:before {
  content: ""; }

.wi-owm-day-520:before {
  content: ""; }

.wi-owm-day-521:before {
  content: ""; }

.wi-owm-day-522:before {
  content: ""; }

.wi-owm-day-531:before {
  content: ""; }

.wi-owm-day-600:before {
  content: ""; }

.wi-owm-day-601:before {
  content: ""; }

.wi-owm-day-602:before {
  content: ""; }

.wi-owm-day-611:before {
  content: ""; }

.wi-owm-day-612:before {
  content: ""; }

.wi-owm-day-615:before {
  content: ""; }

.wi-owm-day-616:before {
  content: ""; }

.wi-owm-day-620:before {
  content: ""; }

.wi-owm-day-621:before {
  content: ""; }

.wi-owm-day-622:before {
  content: ""; }

.wi-owm-day-701:before {
  content: ""; }

.wi-owm-day-711:before {
  content: ""; }

.wi-owm-day-721:before {
  content: ""; }

.wi-owm-day-731:before {
  content: ""; }

.wi-owm-day-741:before {
  content: ""; }

.wi-owm-day-761:before {
  content: ""; }

.wi-owm-day-762:before {
  content: ""; }

.wi-owm-day-781:before {
  content: ""; }

.wi-owm-day-800:before {
  content: ""; }

.wi-owm-day-801:before {
  content: ""; }

.wi-owm-day-802:before {
  content: ""; }

.wi-owm-day-803:before {
  content: ""; }

.wi-owm-day-804:before {
  content: ""; }

.wi-owm-day-900:before {
  content: ""; }

.wi-owm-day-902:before {
  content: ""; }

.wi-owm-day-903:before {
  content: ""; }

.wi-owm-day-904:before {
  content: ""; }

.wi-owm-day-906:before {
  content: ""; }

.wi-owm-day-957:before {
  content: ""; }

.wi-owm-night-200:before {
  content: ""; }

.wi-owm-night-201:before {
  content: ""; }

.wi-owm-night-202:before {
  content: ""; }

.wi-owm-night-210:before {
  content: ""; }

.wi-owm-night-211:before {
  content: ""; }

.wi-owm-night-212:before {
  content: ""; }

.wi-owm-night-221:before {
  content: ""; }

.wi-owm-night-230:before {
  content: ""; }

.wi-owm-night-231:before {
  content: ""; }

.wi-owm-night-232:before {
  content: ""; }

.wi-owm-night-300:before {
  content: ""; }

.wi-owm-night-301:before {
  content: ""; }

.wi-owm-night-302:before {
  content: ""; }

.wi-owm-night-310:before {
  content: ""; }

.wi-owm-night-311:before {
  content: ""; }

.wi-owm-night-312:before {
  content: ""; }

.wi-owm-night-313:before {
  content: ""; }

.wi-owm-night-314:before {
  content: ""; }

.wi-owm-night-321:before {
  content: ""; }

.wi-owm-night-500:before {
  content: ""; }

.wi-owm-night-501:before {
  content: ""; }

.wi-owm-night-502:before {
  content: ""; }

.wi-owm-night-503:before {
  content: ""; }

.wi-owm-night-504:before {
  content: ""; }

.wi-owm-night-511:before {
  content: ""; }

.wi-owm-night-520:before {
  content: ""; }

.wi-owm-night-521:before {
  content: ""; }

.wi-owm-night-522:before {
  content: ""; }

.wi-owm-night-531:before {
  content: ""; }

.wi-owm-night-600:before {
  content: ""; }

.wi-owm-night-601:before {
  content: ""; }

.wi-owm-night-602:before {
  content: ""; }

.wi-owm-night-611:before {
  content: ""; }

.wi-owm-night-612:before {
  content: ""; }

.wi-owm-night-615:before {
  content: ""; }

.wi-owm-night-616:before {
  content: ""; }

.wi-owm-night-620:before {
  content: ""; }

.wi-owm-night-621:before {
  content: ""; }

.wi-owm-night-622:before {
  content: ""; }

.wi-owm-night-701:before {
  content: ""; }

.wi-owm-night-711:before {
  content: ""; }

.wi-owm-night-721:before {
  content: ""; }

.wi-owm-night-731:before {
  content: ""; }

.wi-owm-night-741:before {
  content: ""; }

.wi-owm-night-761:before {
  content: ""; }

.wi-owm-night-762:before {
  content: ""; }

.wi-owm-night-781:before {
  content: ""; }

.wi-owm-night-800:before {
  content: ""; }

.wi-owm-night-801:before {
  content: ""; }

.wi-owm-night-802:before {
  content: ""; }

.wi-owm-night-803:before {
  content: ""; }

.wi-owm-night-804:before {
  content: ""; }

.wi-owm-night-900:before {
  content: ""; }

.wi-owm-night-902:before {
  content: ""; }

.wi-owm-night-903:before {
  content: ""; }

.wi-owm-night-904:before {
  content: ""; }

.wi-owm-night-906:before {
  content: ""; }

.wi-owm-night-957:before {
  content: ""; }

/*# sourceMappingURL=weather-icons.css.map */
</style>
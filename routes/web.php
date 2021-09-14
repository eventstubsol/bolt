<?php

use App\User;
use Carbon\Carbon;
use App\Menu;
use Composer\DependencyResolver\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Sichikawa\LaravelSendgridDriver\Transport\SendgridTransport;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get("/Register/Eventee","eventeeController@Regiter")->name('Eventee.register');
Route::post('/Register/Eventee',"eventeeController@ConfirmRegister");
Route::get('Eventee/Login',"eventeeController@Login")->name('Eventee.login');
Route::post('Eventee/Login',"eventeeController@ConfirmLogin");

Route::prefix("Eventee")->middleware("eventee")->group(function(){
    Route::get('Home','eventeeController@Dashboard')->name('teacher.dashboard');
    Route::get('Events','eventeeController@Event')->name('event.index');
    Route::post('Events/Save','eventeeController@Save')->name('event.Save');
    Route::get('Event/Manage/{id}',"EventManageController@Dashboard")->name('event.Dashboard');

    //Background Change
    Route::get('background/{id}','Eventee\BackgroundController@index')->name('eventee.background');
    Route::get('background/create/{id}','Eventee\BackgroundController@create')->name('eventee.background.create');
    Route::post('background/store/{id}','Eventee\BackgroundController@store')->name('eventee.background.store');
    Route::get('background/edit/{id}/{back_id}','Eventee\BackgroundController@edit')->name('eventee.background.edit');
    Route::post('background/update/{id}/{back_id}','Eventee\BackgroundController@update')->name('eventee.background.update');

    //Menu Add
    Route::get('/menu/nav/{id}','Eventee\MenuController@index')->name('eventee.menu');
    Route::post('/menu/store/{id}','Eventee\MenuController@saveMenu')->name('eventee.menu.store');
    Route::get('/menu/footer/{id}','Eventee\MenuDetailController@index')->name('eventee.menu.footer');

    //Post Video
    Route::get("/session/video-archive/{id}", "Eventee\VideoController@pastSessionVideosArchive")->name("eventee.videoArchive");
    Route::post("/session/video-archive/{id}", "Eventee\VideoController@savePastSessionVideosArchive")->name("eventee.saveVideoArchive");

       //options update

    Route::get("/options/{id}", "Eventee\CMSController@optionsList")->name("eventee.options");
    Route::post("/options/update", "Eventee\CMSController@optionsUpdate")->name("eventee.updateContent");

    
    //Prize
    Route::get('/Prize/{id}',"Eventee\PrizeController@index")->name('eventee.prize.list');
    Route::get('/Prize/create/{id}',"Eventee\PrizeController@create")->name('eventee.prize.create');
    Route::post('/Prize/store/{id}',"Eventee\PrizeController@store")->name('eventee.prize.store');
    Route::get('/Prize/edit/{id}/{prize_id}',"Eventee\PrizeController@edit")->name('eventee.prize.edit');
    Route::post('/Prize/update/{id}/{prize_id}',"Eventee\PrizeController@update")->name('eventee.prize.update');

    Route::get("/reports/leaderboard/{id}", "EventManageController@leaderboardView")->name("event.leaderboard");
    Route::post("/reports/workshop/{name}/export", "EventManageController@exportWorkshopLogs")->name("event.export.workshopLogs");
    Route::get("/reports/workshop/{name}/{id}", "EventManageController@workshopReports")->name("event.workshop");
    Route::post("/reports/workshop/{name}/", "EventManageController@workshopReportsData")->name("event.workshop.api");
    Route::get("/user/event/{id}","Eventee\UserController@index")->name('eventee.user');
    Route::get("/user/event/create/{id}","Eventee\UserController@create")->name('eventee.user.create');
    Route::post("/user/event/store/{id}","Eventee\UserController@store")->name('eventee.user.store');
    Route::get('user/event/{id}/{user_id}/edit',"Eventee\UserController@edit")->name('eventee.user.edit');
    Route::post('user/event/{id}/{user_id}/update',"Eventee\UserController@update")->name('eventee.user.update');
    Route::post('user/event/delete',"Eventee\UserController@destroy")->name('eventee.user.delete');
    Route::get("/data-entry/{id}","Eventee\DataEntryController@index")->name('eventee.dataEntry');
    Route::get('/notification/{id}',"Eventee\NotificationController@index")->name('eventee.notification');
    Route::get('/notification/create/{id}',"Eventee\NotificationController@create")->name('eventee.notification.create');
    Route::post('/notification/store/{id}',"Eventee\NotificationController@store")->name('eventee.notification.store');
    Route::get('/Poll/{id}',"Eventee\PollController@index")->name('eventee.poll');
    Route::get('qna/{id}',"Eventee\QnaController@index")->name('eventee.qna');
    Route::get("/polls", "PollController@index")->name("poll.manage"); // list all polls
    Route::get("/polls/multipleChoice", "PollController@MultipleChoice")->name("poll.multiple"); //multiple choice
    Route::post("/polls/multipleChoice", "PollController@MultipleChoicePost");
    Route::get("/polls/create", "PollController@create")->name("poll.create.get"); // get create form
    Route::post("/polls/create", "PollController@save")->name("poll.create.post"); // create in db
    Route::get("/polls/edit", "PollController@requestEdit")->name("poll.edit");
    Route::post("/polls/update", "PollController@pollUpdate")->name("poll.update.post"); // Update db
    Route::get("/polls/{poll}/edit", "PollController@update")->name("poll.update.get");
    Route::put("/polls/{poll}/edit", "PollController@update")->name("poll.update.put");
    Route::delete("/polls/{poll}", "PollController@destroy")->name("poll.delete");
    Route::get("/polls/{poll}/results", "PollController@resultsView")->name("poll.results"); // View results of poll
    Route::post("/polls/{poll}/results", "PollController@resultsView")->name("poll.results.api"); // View results of poll
    Route::get('/poll/total-data','PollController@Polls')->name('polls.data');
    Route::get('/poll/question','PollController@Questions')->name('poll.question');
    Route::get('poll/delete/confirm','PollController@confirmData')->name('poll.delete.confirm');
    Route::post('poll/delete','PollController@Delete')->name('poll.destroy');
    Route::get('poll/update/status','PollController@updateStatus')->name('poll.status');
    Route::get("by-laws", "PollController@getByLaws")->name("byLaws.get");
    Route::post("by-laws", "PollController@submitByLaws")->name("byLaws.submit");
    Route::post("by-laws/option-select", "PollController@submitByLawsOption")->name("byLaws.optionSubmit");
    

    Route::POST('/poll/question/edit/{id}',"QuestionController@Edit")->name('eventee.question.edit');
    Route::post('/poll/question/mcq/{id}','Eventee\PollController@createMcq')->name('eventee.poll.mcq');
    Route::post('poll/wordCloud/{id}','Eventee\PollController@wordCloud')->name('eventee.wordcloud');
    Route::post('poll/rating/{id}','Eventee\PollController@rating')->name('eventee.rating');
    Route::post('poll/survey/{id}','Eventee\PollController@Survey')->name('eventee.survey');
    Route::post('question/delete/{id}','QuestionController@Delete')->name('question.delete');
    Route::post('mcq/edit/{id}','QuestionController@MCQEdit')->name('mcq.edit');
    Route::post('surv/edit/{id}','QuestionController@SURVEdit')->name('surv.edit');
    Route::post('wc/edit/{id}','QuestionController@WCEdit')->name('wc.edit');
    Route::get('ques/status/{id}','QuestionController@Status')->name('ques.status');
    Route::get('user/Polls/{id}','UserPollController@index')->name('user.polls');
    Route::post('user/Polls/update','UserPollController@update')->name('user.polls.update');
    Route::get('user/Polls/Save','UserPollController@Save')->name('user.polls.save');
    Route::get('user/poll/answer','UserPollController@Answer')->name('user.poll.answer');
    Route::get('user/submitWc','UserPollController@WcSubmit')->name('user.poll.submit');
    Route::get('mcq/data-by-user','QuestionController@UserData')->name('mcq.showData');
    Route::get('rate/data-by-user','QuestionController@UserRateData')->name('rate.showData');
    Route::get('wc/data-by-user','QuestionController@UserWcData')->name('wc.showData');
    Route::get('Go/Mcq/{id}','QuestionController@ShowMCq')->name('ShowMcq');
    Route::geT('Qna/ShowAnswer','LiveQuestionController@ShowAnswer')->name('eventee.qna.Show');
    Route::geT('Qna/Save','LiveQuestionController@Save')->name('qna.Save');
    Route::geT('Qna/Edit','LiveQuestionController@Edit')->name('qna.Edit');
    Route::get('Qna/Update','LiveQuestionController@Update')->name('qna.Update');
    Route::get('Qna/Delete','LiveQuestionController@Delete')->name('qna.Delete');
    Route::get('Qna/Answer','LiveQuestionController@SaveAnswer')->name('qna.Answer');
    Route::get('admin/Annoucement/{id}','Eventee\AnnounceController@index')->name('eventee.announce');
    Route::get('/Annoucement/Create','Eventee\AnnounceController@Create')->name('eventee.announce.create');
    Route::get('License/{id}',"Eventee\LicenseController@index")->name('eventee.license');
    Route::get('License/create/{id}',"Eventee\LicenseController@create")->name('eventee.license.create');
    Route::post('License/store/{id}',"Eventee\LicenseController@store")->name('eventee.license.store');
    Route::get('License/edit/{id}/{license_id}',"Eventee\LicenseController@edit")->name('eventee.license.edit');
    Route::post('License/update/{id}/{license_id}',"Eventee\LicenseController@update")->name('eventee.license.update');
    
});
Route::get("/", "HomeController@index")->name("home"); //Landing Page

Route::get("/event/login", "AttendeeAuthController@show")->name("attendee_login");
Route::post("/event/login", "AttendeeAuthController@login");
Route::get("/event/register", "AttendeeAuthController@showRegistrationForm")->name("attendee_register");
Route::post("/event/register", "AttendeeAuthController@saveRegistration");
Route::get("/event/session-notifications", "EventController@sendSessionNotifications");

Route::get("privacy-policy", "HomeController@privacyPolicy")->name("privacyPolicy");
Route::get("faq", "HomeController@faqs")->name("faq");
Route::get("schedule", "EventSessionsController@schedule")->name("schedule");
Route::get("schedule-raw", "EventSessionsController@scheduleRaw")->name("scheduleRaw");
Route::get("subscriptions-raw", "EventSessionsController@subscription_raw")->name("subscription_raw");
Route::get("/notifications/send", "NotificationController@send")->name("sendNotifications");
Route::get("/confirm-login", "HomeController@confirmLogin")->name("confirmLogin");

Route::middleware(["auth"])->group(function () { //All Routes here would need authentication to access
    Route::get("/home", "HomeController@dashboard");
    Route::get("/event", "EventController@index")->name("event");
    Route::post("/uploadFile", "CMSController@uploadFile")->name("cms.uploadFile");
    Route::get("/me", "EventController@profileInfo")->name("event.profile");
    Route::get('/testS','testController@index');

    Route::post("/contacts/suggested", "UserController@suggestedContacts")->name("suggestedContacts");
    Route::post("/contacts/attendees", "UserController@allEventAttendees")->name("attendeesURL");
    Route::get("/contacts/attendees", "UserController@allEventAttendees")->name("attendeesURL");
    Route::post("/contacts/connection/request", "UserController@sendConnectionRequest")->name("sendConnectionRequest");
    Route::post("/contacts/connection/update", "UserController@updateConnectionRequest")->name("updateConnectionRequest");
    Route::post("/contacts/add", "UserController@addToContacts")->name("addToContacts");
    Route::post("/contacts/remove", "UserController@removeContact")->name("removeContact");
    Route::post("/contacts/saved", "UserController@mySavedContacts")->name("savedContacts");
    Route::post("/contacts/requests", "UserController@myConnectionRequests")->name("myConnectionRequests");
    Route::post("/contacts/export", "UserController@exportContacts")->name("exportContacts");
    Route::post("/contacts/mail", "UserController@sendContactsOnMail")->name("sendContactsOnMail");
    Route::post("/user/details", "UserController@fetchUserDetails")->name("fetchUserDetails");
    Route::post("/user/register-device", "UserController@registerDevice")->name("registerDevice");
    
    /**
     * POLL ROUTE START
     */
    Route::get("/polls", "PollController@index")->name("poll.manage"); // list all polls
    Route::get("/polls/multipleChoice", "PollController@MultipleChoice")->name("poll.multiple"); //multiple choice
    Route::post("/polls/multipleChoice", "PollController@MultipleChoicePost");
    Route::get("/polls/create", "PollController@create")->name("poll.create.get"); // get create form
    Route::post("/polls/create", "PollController@save")->name("poll.create.post"); // create in db
    Route::get("/polls/edit", "PollController@requestEdit")->name("poll.edit");
    Route::post("/polls/update", "PollController@pollUpdate")->name("poll.update.post"); // Update db
    Route::get("/polls/{poll}/edit", "PollController@update")->name("poll.update.get");
    Route::put("/polls/{poll}/edit", "PollController@update")->name("poll.update.put");
    Route::delete("/polls/{poll}", "PollController@destroy")->name("poll.delete");
    Route::get("/polls/{poll}/results", "PollController@resultsView")->name("poll.results"); // View results of poll
    Route::post("/polls/{poll}/results", "PollController@resultsView")->name("poll.results.api"); // View results of poll
    Route::get('/poll/total-data','PollController@Polls')->name('polls.data');
    Route::get('/poll/question','PollController@Questions')->name('poll.question');
    Route::get('poll/delete/confirm','PollController@confirmData')->name('poll.delete.confirm');
    Route::post('poll/delete','PollController@Delete')->name('poll.destroy');
    Route::get('poll/update/status','PollController@updateStatus')->name('poll.status');
    Route::get("by-laws", "PollController@getByLaws")->name("byLaws.get");
    Route::post("by-laws", "PollController@submitByLaws")->name("byLaws.submit");
    Route::post("by-laws/option-select", "PollController@submitByLawsOption")->name("byLaws.optionSubmit");
    

    Route::POST('/poll/question/edit',"QuestionController@Edit")->name('poll.question.edit');
    Route::post('/poll/question/mcq','QuestionController@createMcq')->name('poll.mcq');
    Route::post('poll/wordCloud','QuestionController@wordCloud')->name('poll.wordcloud');
    Route::post('poll/rating','QuestionController@rating')->name('poll.rating');
    Route::post('poll/survey','QuestionController@Survey')->name('poll.survey');
    Route::post('question/delete','QuestionController@Delete')->name('question.delete');
    Route::post('mcq/edit','QuestionController@MCQEdit')->name('mcq.edit');
    Route::post('surv/edit','QuestionController@SURVEdit')->name('surv.edit');
    Route::post('wc/edit','QuestionController@WCEdit')->name('wc.edit');
    Route::get('ques/status','QuestionController@Status')->name('ques.status');
    Route::get('user/Polls','UserPollController@index')->name('user.polls');
    Route::post('user/Polls/update','UserPollController@update')->name('user.polls.update');
    Route::get('user/Polls/Save','UserPollController@Save')->name('user.polls.save');
    Route::get('user/poll/answer','UserPollController@Answer')->name('user.poll.answer');
    Route::get('user/submitWc','UserPollController@WcSubmit')->name('user.poll.submit');
    Route::get('mcq/data-by-user','QuestionController@UserData')->name('mcq.showData');
    Route::get('rate/data-by-user','QuestionController@UserRateData')->name('rate.showData');
    Route::get('wc/data-by-user','QuestionController@UserWcData')->name('wc.showData');
    Route::get('Go/Mcq/{id}','QuestionController@ShowMCq')->name('ShowMcq');
    Route::geT('Qna/ShowAnswer','LiveQuestionController@ShowAnswer')->name('qna.Show');
    Route::geT('Qna/Save','LiveQuestionController@Save')->name('qna.Save');
    Route::geT('Qna/Edit','LiveQuestionController@Edit')->name('qna.Edit');
    Route::get('Qna/Update','LiveQuestionController@Update')->name('qna.Update');
    Route::get('Qna/Delete','LiveQuestionController@Delete')->name('qna.Delete');
    Route::get('Qna/Answer','LiveQuestionController@SaveAnswer')->name('qna.Answer');
    Route::get('Announcement/Seen','UserAnnounceController@Seen')->name('announcement.Seen');
    Route::get('Announcement/popUp','UserAnnounceController@PopUp')->name('announcement.popUp');
    Route::get('Announcement/Close','UserAnnounceController@Close')->name('announcement.Close');
   
    /**
     * POLL ROUTE END
     */

    //Admin Prefixed Routes and also will check if user is admin or not
    Route::prefix("admin")->middleware("checkAccess:admin")->group(function () {

        Route::resources([
            "faq" => "FaqController",
            "room" => "RoomController",
            "booth" => "BoothController",
            "user" => "UserController",
            "report" => "ReportController",
            "prize" => "PrizeController",
            "sessionrooms" => "SessionRoomController",
            "sessions" => "SessionController",
            "subscriptions" => "EventSubscriptionController",
            "page"=>"PageController",
            "menu"=>"MenuController",
            "menuDetail"=>"menuDetailsController",
            "analytic"=>"AnalyticController",
            "recaptcha"=>"RecatchaController",
            //            "provisional" => "ProvisionalController",
        ]);
        //Menu And Api
        Route::get('delete/submenu','MenuController@subMenu')->name('delete.submenu');
        Route::get('delete/savePosition','MenuController@SavePosition')->name('delete.savePosition');
        Route::get('/setStatus','MenuController@setStatus')->name('setStatus');\
        Route::get('/getDetails','AnalyticController@GetDetails')->name('detailsApi');
        Route::get('/third/delete','AnalyticController@DeleteData')->name('third.delete');
        Route::post('/updateDetails','AnalyticController@updateData')->name('updateDetails');
        Route::post('/updateCaptcha','RecatchaController@updateCatcha')->name('updateCaptcha');
        Route::get('/Comet','RecatchaController@Comet')->name('comet.index');
        Route::post('/Comet','RecatchaController@CometSave');

        Route::get('/Zoom','RecatchaController@Zoom')->name('zoom.index');
        Route::post('/Zoom','RecatchaController@ZoomSave');
        Route::get('qna',"AdminQnaController@index")->name('admin.qna');
        Route::get('qna/view_update','AdminQnaController@View')->name('admin.qna.view');
        Route::get('qna/discussion_update','AdminQnaController@Discussion')->name('admin.qna.discussion');
        Route::get('qna/admin_answer','AdminQnaController@Answer')->name('admin.qna.answer');
        Route::get('qna/getAnswer','AdminQnaController@GetAnswer')->name('admin.qna.getAnswer');
        Route::get('qna/BestAnswer','AdminQnaController@BestAnswer')->name('admin.qna.BestAnswer');
        Route::get('admin/Annoucement','AdminAnnounce@index')->name('admin.announce');
        Route::get('admin/Annoucement/Create','AdminAnnounce@Create')->name('admin.announce.create');
        Route::get('admin/Annoucement/Edit/{id}','AdminAnnounce@Edit')->name('admin.announce.edit');
        Route::post('admin/Annoucement/Update','AdminAnnounce@Update')->name('admin.announce.update');
        Route::get('admin/Annoucement/Delete','AdminAnnounce@Delete')->name('admin.announce.delete');
        // Route::get('details/create','menuDetailsController@index')->('details.create');

        /**
         * CHAT USER START
         */
        Route::get("/chat-user/sync", "UserController@syncUserChat")->name("sync-users");
        Route::get("/lobby", "PageController@lobby")->name("lobby");
        Route::put("/lobbyupdate","PageController@Lobbyupdate")->name("lobbyupdate");
        Route::get("/chat-group/sync", "UserController@syncGroupChat")->name("sync-groups");
        /**
         * CHAT USER END
         */
        Route::get("/data-entry",function (){
            return view("dataentry");
        })->name("dataentry")  ;
        Route::get("/options", "CMSController@optionsList")->name("options");
        Route::post("/options/update", "CMSController@optionsUpdate")->name("cms.updateContent");
        Route::get("SortRooms", "RoomController@sort")->name("room.sort");
        Route::get("storesorting", "RoomController@storesort")->name("room.storesorting");

        Route::get("/notifications", "NotificationController@index")->name("notifications.list.get");
        Route::get("/notification/create", "NotificationController@create")->name("notifications.create.get");
        Route::post("/notifications", "NotificationController@store")->name("notifications.create.post");

        //        Route::get("/prizes/distribute", "PrizeController@distributePrize")->name("distribute_prizes");

        Route::post("/user-bulk-upload", "UserController@bulk_create")->name("users.bulk_upload");
        Route::post("/subscriptions-bulk-upload", "EventSubscriptionController@bulk_create")->name("subscriptions.bulk_upload");

        Route::post("/booth/{booth}/publish", "BoothController@publish")->name("booth.publish");
        Route::post("/booth/{booth}/unpublish", "BoothController@unpublish")->name("booth.unpublish");
        

        /**
         * Event Sessions Routes start
         */
        // Route::get("/sessions", "EventSessionsController@index")->name("eventSession.manage");
        // Route::post("/sessions", "EventSessionsController@save")->name("eventSession.save");
        Route::get("/session/video-archive", "EventSessionsController@pastSessionVideosArchive")->name("eventSession.videoArchive");
        Route::post("/session/video-archive", "EventSessionsController@savePastSessionVideosArchive")->name("eventSession.saveVideoArchive");
        /**
         * Event Sessions Routes End
         */

        /**
         * Reports and Analytics
         */
        Route::get("/reports/general", "EventController@generalReports")->name("reports.general");
        Route::post("/reports/general", "EventController@generalReportsData")->name("reports.general.api");
        Route::post("/reports/login-logs/export", "EventController@exportLoginLogs")->name("reports.export.loginLogs");
        Route::get("/reports/auditorium", "EventController@auditoriumReports")->name("reports.auditorium");
        Route::post("/reports/auditorium", "EventController@auditoriumReportsData")->name("reports.auditorium.api");
        Route::post("/reports/audi-logs/export", "EventController@exportAuditoriumLogs")->name("reports.export.audiLogs");
        Route::get("/reports/leaderboard/", "EventController@leaderboardView")->name("reports.leaderboard");
        Route::get("/createGroup", "EventController@createGroup")->name("createGroup");

        Route::post("/reports/workshop/{name}/export", "EventController@exportWorkshopLogs")->name("reports.export.workshopLogs");
        Route::get("/reports/workshop/{name}/", "EventController@workshopReports")->name("reports.workshop");
        Route::post("/reports/workshop/{name}/", "EventController@workshopReportsData")->name("reports.workshop.api");

        Route::post("/reports/booths/{id}/export", "EventController@exportBoothLogs")->name("reports.export.boothLogs");
        Route::get("/reports/booths/{id}/", "EventController@boothReports")->name("reports.booth");
        Route::post("/reports/booths/{id}/", "EventController@boothReportsData")->name("reports.booth.api");

    });

    Route::prefix("exhibiter")->middleware("checkAccess:exhibiter")->group(function () {
        Route::get("/booth/edit/{booth}", "BoothController@adminEdit")->name("exhibiter.edit");
        Route::post("/booth/edit/{booth}", "BoothController@adminUpdate")->name("exhibiter.update");
        Route::get("/booth/{booth}/enquiries", "BoothController@boothEnquiries")->name("exhibiter.enquiries");
        Route::get("/booth/{booth}/enquiries/raw", "BoothController@boothEnquiriesRaw")->name("exhibiter.enquiries.raw");
        // Route::post("/booth/edit/{booth}","BoothController@adminUpdateImages")->name("exhibiter.updateimages");
    });

    Route::prefix("cms")->middleware("checkAccess:cms_manager")->group(function () {
        Route::get("/field/create", "CMSController@createField")->name("cmsField.create");
        Route::post("/field/create", "CMSController@storeField")->name("cmsField.store");
        Route::get("/field/{field}/", "CMSController@editField")->name("cmsField.edit");
        Route::post("/field/{field}/", "CMSController@updateField")->name("cmsField.update");
        Route::post("/field/{field}/delete", "CMSController@deleteField")->name("cmsField.delete");
    });

    Route::post("/event/track", "EventController@trackEvent")->name("trackEvent");
    Route::get("/event/auditorium", "EventController@auditoriumEmbed")->name("auditoriumEmbed");
    Route::get("/event/meet", "EventController@meetEmbed")->name("meetEmbed");
    Route::get("/event/current-session", "EventController@getCurrentSession")->name("currentSession");
    Route::get("/event/webinar", "EventController@webinar")->name("webinar");
    Route::get("/event/ended", "EventController@webinarEnded")->name("webinarEnded");
    Route::post("/event/{event}/subscribe", "EventSessionsController@subscribe")->name("event.subscribe");
    Route::post("/event/{event}/unsubscribe", "EventSessionsController@unsubscribe")->name("event.unsubscribe");

    Route::post("/leaderboard", "EventController@leaderboard")->name("leaderboard");
    Route::get("/add-to-bag", "EventController@addToBag")->name("addToBag");
    Route::get("/delete-from-bag", "EventController@deleteFromBag")->name("deleteFromBag");
    Route::get("/get-swag-bag", "EventController@getSwagBag")->name("getSwagBag");
    //Add Profile Image
    Route::post("/save-profile-image", "EventController@saveprofile")->name("saveprofile");
    Route::post("/saveprofile", "EventController@updateProfile")->name("updateProfile");
    Route::post("/savetags", "EventController@saveTags")->name("savetags");
    Route::post("/saveLookingfor", "EventController@saveLookingfor")->name("saveLookingfor");
    Route::middleware(["checkAccess:exhibiter"])->group(function () {
        Route::get("/changepassword", "UserController@changePassword")->name("changePassword");
        Route::post("/updatepassword", "UserController@updatePassword")->name("updatePassword");
    });
    Route::get("/send-swags-to-email", "EventController@sendSwagsToEmail")->name("sendSwagsToEmail");
    Route::get("/booth/{booth}", "EventController@getBoothDetails")->name("boothDetails");
    Route::post("/booth/{booth}/show-interest", "EventController@showInterestInBooth")->name("showInterestInBooth");
    Route::get("/delegates-list", "EventController@getDelegatesList")->name("delegateList");
    Route::post("/updates/check", "EventController@contentTicker")->name("contentTicker");
    Route::get("/updates/check", "EventController@contentTicker")->name("contentTicker");
});

Route::get("/usercreate",function ()
{
    User::create([
        "name"=>"shubh",
        "lname"=>"palan",
        "email"=>"shubhpalan@gmail.com",
        "password"=> Hash::make("shubhpalan@gmail.com"),
    ]);

    return "ok done";
});

Route::get("/refresh-online-users-status", function(){
    $loginLastTime = Carbon::now()->subtract(ONLINE_KEEPING_TIME, "seconds");
    $a = \App\User::where("updated_at", ">=", $loginLastTime)->count();
    $minToShowOnline = 2500;
    $q = \App\User::where("updated_at", "<=", $loginLastTime);
    $users = $q->orderBy("email")->limit($minToShowOnline - $a)->select("id")->get();
    foreach ($users as $user){
        $user->touch();
    }
    $a = \App\User::where("updated_at", ">=", $loginLastTime)->count();
    return $a;
});

Route::get("/delete-users", function(){
//    \App\User::create([
//        "name" => "Admin",
//        "email" => "dev@fitsmea.com",
//        "password" => Hash::make("chintan"),
//    ]);
//    \App\User::where("email", "dev@fitsmea.com")->update([
//        "type" => "admin"
//    ]);
    \App\User::where("email", "dev@fitsmea.com")->first()->markEmailAsVerified();
    return \App\User::all();
});
Route::get("/clear-leaderboard", function(){
//    \App\User::create([
//        "name" => "Admin",
//        "email" => "dev@fitsmea.com",
//        "password" => Hash::make("chintan"),
//    ]);
   \App\User::all()->update([
       "points" => 0
   ]);
    // \App\User::where("email", "dev@fitsmea.com")->first()->markEmailAsVerified();
    // return \App\User::all();
});

//Route::get("setup-slido-fields", function(){
//    $i = 0;
//    foreach (EVENT_ROOMS as $ROOM){
//        createField($ROOM."_Slido", "text", "Slido", $i++);
//    }
//    return getSlidoConfig();
//});


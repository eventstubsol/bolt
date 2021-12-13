<?php

use App\Event;
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

// Route::domain("{subdomain}".'localhost')->group(function(){
//     Route::get('/',function ($subdomain){
//         dd($subdomain);
//     });
// });




$appurl = env('APP_ENV') ==='staging'? 'localhost' :'app.eventstub.co';


Route::group(['domain' => $appurl], function () {


Route::post("/leaderboard", "EventManageController@leaderboard")->name("leaderboard");
Route::Post("admin/logout","HomeController@logout")->name('admin.logout');
Auth::routes();
Route::get("/Register/Eventee","eventeeController@Regiter")->name('Eventee.register');
Route::post('/Register/Eventee',"eventeeController@ConfirmRegister");
Route::get('Eventee/Login',"eventeeController@Login")->name('Eventee.login');
Route::post('Eventee/Login/Confirm',"eventeeController@ConfirmLogin")->name('Eventee.login.confirm');
Route::get('/Event/{id}',"EventUser\LoginController@login")->name('eventuser.login');


Route::prefix("Eventee")->middleware("eventee")->group(function(){
    Route::get('Home','eventeeController@Dashboard')->name('teacher.dashboard');
    Route::post('liveChart',"EventManageController@ChartJs")->name('eventee.chartJs');
    Route::post('SessionRoomChart',"EventManageController@SessionChartJs")->name('eventee.sessionChart');
    Route::post('pageChart',"EventManageController@PageChartJs")->name('eventee.pageChart');
    Route::post('BoothChart',"EventManageController@BoothChartJs")->name('eventee.boothChart');
    Route::post('LobbyUser',"EventManageController@LobbyUser")->name('eventee.lobbyUser');
    Route::post('LoungeUser',"EventManageController@LoungeUser")->name('eventee.loungeUser');
    
    Route::get('Events','eventeeController@Event')->name('event.index');
    Route::post('eventSlug','eventeeController@SlugLink')->name('event.slug');
    Route::post('Events/Save','eventeeController@Save')->name('event.Save');
    Route::get('Event/Manage/{id}',"EventManageController@Dashboard")->name('event.Dashboard');
    Route::get('Event/edit/{id}','EventManageController@Edit')->name('event.Edit');
    Route::post('Event/update/{id}','EventManageController@update')->name('event.Update');
    Route::post('event/delete',"EventManageController@destroy")->name('event.delete');


    //User Wise Report
    Route::get("User_Report/{id}","Eventee\UserReportController@index")->name('eventee.user.report');
    Route::post("User_Report/Graph","Eventee\UserReportController@graph")->name('eventee.user.report.graph');
    Route::post("Excel/Report/Data/{id}","Eventee\UserReportController@ExcelReport")->name('eventee.excel.report');

    //FAQS Section
    Route::get("faq/{id}", "Eventee\FaqController@index")->name("eventee.faq");
    Route::get("faq/create/{id}", "Eventee\FaqController@create")->name("eventee.faq.create");
    Route::POST("faq/save/{id}", "Eventee\FaqController@store")->name("eventee.faq.save");
    Route::get("faq/edit/{id}/{faq_id}", "Eventee\FaqController@edit")->name("eventee.faq.edit");
    Route::post("faq/update/{id}/{faq_id}", "Eventee\FaqController@update")->name("eventee.faq.update");
    Route::post('faq/delete','Eventee\FaqController@delete')->name('eventee.faq.delete');
    
    Route::get("modal/{id}", "Eventee\ModalController@index")->name("eventee.modal");
    Route::get("modal/create/{id}", "Eventee\ModalController@create")->name("eventee.modal.create");
    Route::POST("modal/save/{id}", "Eventee\ModalController@store")->name("eventee.modal.save");
    Route::get("modal/edit/{id}/{modal}", "Eventee\ModalController@edit")->name("eventee.modal.edit");
    Route::put("modal/update/{id}/{modal}", "Eventee\ModalController@update")->name("eventee.modal.update");
    Route::delete('modal/delete/{modal}','Eventee\ModalController@delete')->name('eventee.modal.destroy');

    //Mailables
    Route::get('mail/{id}',"Eventee\MailController@index")->name('eventee.mail');
    Route::get('mail/create/{id}',"Eventee\MailController@create")->name('eventee.mail.create');
    Route::post('mail/send/{id}',"Eventee\MailController@send")->name('eventee.mail.send');
    



	Route::get('icons',"EventController@getIcons")->name('icons');
	Route::get('/Form/{id}',"Eventee\FormController@index")->name('eventee.form');
    Route::get('/Form/create/{id}',"Eventee\FormController@create")->name('eventee.form.create');
    Route::post('/Form/Save',"Eventee\FormController@SaveForm")->name('eventee.form.save');
    Route::post('/Form/preview/',"Eventee\FormController@ShowPreview")->name('eventee.form.preview');
    Route::get('/Form/edit/{id}/{form_id}',"Eventee\FormController@edit")->name('eventee.form.edit');
    Route::post('/Form/SaveField',"Eventee\FormController@SaveField")->name('eventee.form.saveField');
    Route::post('Form/CustomFields',"Eventee\FormController@CustomField")->name('eventee.form.custom');
    Route::post('Form/SaveCustomFields',"Eventee\FormController@CustomFieldSave")->name('eventee.form.customSave');
    // Route::post('/Form/Delete',"Eventee\FormController@Destroy")->name('form.destroy');


    //Access Control
    Route::get("/access/{id}", "HomeController@accessControl")->name("access.index");
    Route::post("/access/{id}", "HomeController@updateAccess")->name("access.store");
 


    Route::get("/forms/all/{id}","Eventee\FormController@index")->name("forms");
    Route::get("/register/{id}/{form}","Eventee\FormController@getForm")->name("getForm");
    Route::get("/form/create/{id}","Eventee\FormController@create")->name("createForm");
    Route::post("/form/store/{id}","Eventee\FormController@store")->name("forms.store");
    Route::get("/form/rearrange/{id}/{form}","Eventee\FormController@rearrange")->name("rearrange");
    Route::post("/form/savePosition","Eventee\FormController@savePosition")->name('form.position');
    Route::delete('/form/delete/{form}',"Eventee\FormController@Destroy")->name('form.destroy');


    // Route::get('/Form/{id}',"Eventee\FormController@index")->name('eventee.form');
    // Route::get('/Form/create/{id}',"Eventee\FormController@create")->name('eventee.form.create');
    // Route::post('/Form/Save',"Eventee\FormController@SaveForm")->name('eventee.form.save');
    // Route::get('/Form/preview/{id}',"Eventee\FormController@ShowPreview")->name('eventee.form.preview');
    // Route::get('/Form/addField/{id}',"Eventee\FormController@AddField")->name('eventee.form.addfield');
    // Route::post('/Form/SaveField/{id}',"Eventee\FormController@SaveField")->name('eventee.form.saveField');


    Route::resources([
        "menu"=>"Eventee/MenuController",
    ]);
    //Event Frontend

    // Route::

    Route::get("/subtypes/{id}","Eventee\UserController@subTypesList")->name('eventee.subtypes');
    Route::get("/subtype/create/{id}","Eventee\UserController@subTypecreate")->name('eventee.subtype.create');
    Route::post("/subtype/{id}","Eventee\UserController@subTypestore")->name('eventee.subtype.store');
    Route::get("/subtype/{id}/{subtype}","Eventee\UserController@subTypeedit")->name('eventee.subtype.edit');
    Route::put("/subtype/update/{id}/{subtype}","Eventee\UserController@subTypeupdate")->name('eventee.subtype.update');
    Route::delete("/subtype/delete/{id}","Eventee\UserController@subTypedelete")->name('eventee.subtype.destroy');
    

    //Booth Report 
    Route::post("/reports/booths/{id}/export", "EventController@exportBoothLogs")->name("reports.export.boothLogs");
    Route::get("/reports/booths/{id}/{event_id}", "EventController@boothReports")->name("reports.booth");
    Route::post("/reports/booths/{id}/", "EventController@boothReportsData")->name("reports.booth.api");




    //Session Room
    Route::get("/sessionroom/event/{id}","Eventee\SessionRoomController@index")->name('eventee.sessionrooms.index');
    Route::get("/sessionroom/event/create/{id}","Eventee\SessionRoomController@create")->name('eventee.sessionrooms.create'); 
    Route::post("/sessionroom/event/store/{id}","Eventee\SessionRoomController@store")->name('eventee.sessionrooms.store');
    Route::get('/sessionroom/event/{sessionroom}/{id}/edit',"Eventee\SessionRoomController@edit")->name('eventee.sessionrooms.edit');
    Route::put('/sessionroom/event/{sessionroom}/{id}/update',"Eventee\SessionRoomController@update")->name('eventee.sessionrooms.update');
    Route::delete('sessionroom/event/delete',"Eventee\SessionRoomController@destroy")->name('eventee.sessionrooms.destroy');
    Route::post('/sessionroom/Bulkdelete',"Eventee\SessionRoomController@BulkDelete")->name('eventee.sessionrooms.bulkDelete');
    Route::post('/sessionroom/DeleteAll',"Eventee\SessionRoomController@DeleteAll")->name('eventee.sessionrooms.deleteAll');


    //Session
    Route::get("/session/event/{id}","Eventee\SessionController@index")->name('eventee.sessions.index');
    Route::get("/session/event/create/{id}","Eventee\SessionController@create")->name('eventee.sessions.create'); 
    Route::post("/session/event/store/{id}","Eventee\SessionController@store")->name('eventee.sessions.store');
    Route::get('/session/event/{session}/{id}/edit',"Eventee\SessionController@edit")->name('eventee.sessions.edit');
    Route::delete('page/event/delete/{session}/{id}',"Eventee\SessionController@destroy")->name('eventee.sessions.destroy');
    Route::put('page/event/{session}/{id}/update',"Eventee\SessionController@update")->name('eventee.sessions.update');
    Route::post('/session/Bulkdelete',"Eventee\SessionController@BulkDelete")->name('eventee.sessions.bulkDelete');
    Route::post('/session/DeleteAll',"Eventee\SessionController@DeleteAll")->name('eventee.sessions.deleteAll');
    
    //pages routes
    Route::get("/page/event/{id}","Eventee\PageController@index")->name('eventee.pages.index');
    Route::get("/page/event/create/{id}","Eventee\PageController@create")->name('eventee.pages.create'); 
    Route::post("/page/event/store/{id}","Eventee\PageController@store")->name('eventee.pages.store');
    Route::get('page/event/{page}/{id}/edit',"Eventee\PageController@edit")->name('eventee.pages.edit');
    Route::put('page/{page}/{id}/update',"Eventee\PageController@update")->name('eventee.pages.updates');
    Route::delete('page/event/delete/{page}',"Eventee\PageController@destroy")->name('eventee.pages.destroy');
    Route::get('duplicate/{object}/{type}',"Eventee\PageController@duplicate")->name('eventee.duplicate');
    Route::post('/page/Bulkdelete',"Eventee\PageController@BulkDelete")->name('eventee.pages.bulkDelete');
    Route::post('/page/DeleteAll',"Eventee\PageController@DeleteAll")->name('eventee.pages.deleteAll');


    Route::get("/lobby/{id}", "Eventee\PageController@lobby")->name("elobby");
    Route::put("/lobbyupdate/{id}","Eventee\PageController@Lobbyupdate")->name("elobbyupdate");
    
    Route::get("/lounge/event/{id}","Eventee\LoungeController@index")->name('eventee.lounge.index');
    Route::get("/lounge/event/create/{id}","Eventee\LoungeController@create")->name('eventee.lounge.create'); 
    Route::post("/lounge/event/store/{id}","Eventee\LoungeController@store")->name('eventee.lounge.store');
    Route::get('lounge/event/{table}/{id}/edit',"Eventee\LoungeController@edit")->name('eventee.lounge.edit');
    Route::put('lounge/{table}/{id}/update',"Eventee\LoungeController@update")->name('eventee.lounge.update');
    Route::delete('lounge/delete/{id}/{table}',"Eventee\LoungeController@destroy")->name('eventee.lounge.destroy');
   
    //Background Change
    Route::get('background/{id}','Eventee\BackgroundController@index')->name('eventee.background');
    Route::get('background/create/{id}','Eventee\BackgroundController@create')->name('eventee.background.create');
    Route::post('background/store/{id}','Eventee\BackgroundController@store')->name('eventee.background.store');
    Route::get('background/edit/{id}/{back_id}','Eventee\BackgroundController@edit')->name('eventee.background.edit');
    Route::post('background/update/{id}/{back_id}','Eventee\BackgroundController@update')->name('eventee.background.update');

    //Navbar Menu 
    Route::get('/menu/nav/{id}','Eventee\MenuController@index')->name('eventee.menu');
    Route::get('/menu/create/{id}','Eventee\MenuController@createNav')->name('eventee.menu.create');
    Route::post('/menu/store/{id}','Eventee\MenuController@saveMenu')->name('eventee.menu.store');
    Route::post('/menu/saveNav/{id}','Eventee\MenuController@saveNav')->name('eventee.menu.saveNav');
    Route::delete('/menu/disable/{menu}/{id}','Eventee\MenuDetailController@disable')->name('eventee.menu.disable');
    Route::post("/menu/savePosition","MenuController@store")->name('menu.store');
    Route::put('/menu/enable/{menu}/{id}','Eventee\MenuDetailController@enable')->name('eventee.menu.enable');
    Route::delete('/menu/delete/{menu}/{id}','Eventee\MenuDetailController@destroy')->name('eventee.menu.delete');
    Route::get('/menu/edit/{menu}/{id}','Eventee\MenuController@editNav')->name('eventee.menu.edit');
    Route::put('/menu/update/{menu}/{id}','Eventee\MenuController@updateNav')->name('eventee.menu.update');
    
    //Footter
    
    Route::get('/menu/footer/{id}','Eventee\MenuDetailController@index')->name('eventee.menu.footer');
    Route::get('/footer/create/{id}','Eventee\MenuController@createFooter')->name('eventee.footer.create');
    Route::post('/footer/store/{id}','Eventee\MenuController@saveFooter')->name('eventee.footer.store');
    Route::get('/footer/edit/{menu}/{id}','Eventee\MenuController@editFooter')->name('eventee.footer.edit');
    Route::put('/footer/update/{menu}/{id}','Eventee\MenuController@updateFooter')->name('eventee.footer.update');

    
    //Post Video
    Route::get("/session/video-archive/{id}", "Eventee\VideoController@pastSessionVideosArchive")->name("eventee.videoArchive");
    Route::post("/session/video-archive/{id}", "Eventee\VideoController@savePastSessionVideosArchive")->name("eventee.saveVideoArchive");

       //options update

    Route::get("/integrations/{id}", "EventController@integrations")->name("eventee.integrations");
    Route::post("/integrations/update/{id}", "EventController@integrationsUpdate")->name("eventee.integrationsUpdate");
    Route::get("/settings/{id}", "EventController@settings")->name("eventee.settings");
    Route::post("/settings/update/{id}", "EventController@settingsUpdate")->name("eventee.settingsUpdate");
    
    Route::get("/options/{id}", "Eventee\CMSController@optionsList")->name("eventee.options");
    Route::post("/options/update/{id}", "Eventee\CMSController@optionsUpdate")->name("eventee.updateContent");


    //Prize
    Route::get('/Prize/{id}',"Eventee\PrizeController@index")->name('eventee.prize.list');
    Route::get('/Prize/create/{id}',"Eventee\PrizeController@create")->name('eventee.prize.create');
    Route::post('/Prize/store/{id}',"Eventee\PrizeController@store")->name('eventee.prize.store');
    Route::get('/Prize/edit/{id}/{prize_id}',"Eventee\PrizeController@edit")->name('eventee.prize.edit');
    Route::post('/Prize/update/{id}/{prize_id}',"Eventee\PrizeController@update")->name('eventee.prize.update');


    //Booth
    Route::get('/Booths/{id}',"Eventee\BoothController@index")->name('eventee.booth');
    Route::get('/Booths/create/{id}',"Eventee\BoothController@create")->name('eventee.booth.create');
    Route::post('/Booths/store/{id}',"Eventee\BoothController@store")->name('eventee.booth.store');
    Route::get('/Booths/edit/{id}/{booth_id}',"Eventee\BoothController@edit")->name('eventee.booth.edit');
    Route::put('/Booths/update/{id}/{booth_id}',"Eventee\BoothController@update")->name('eventee.booth.update');
    Route::delete('/Booths/delete/{booth}/{id}',"Eventee\BoothController@destroy")->name('eventee.booth.destroy');
    Route::post('/Booths/Bulkdelete',"Eventee\BoothController@BulkDelete")->name('eventee.booth.bulkDelete');

    //Leaderboard Setting
    Route::get('/leaderboard/setting/{id}',"Eventee\LeaderboardController@index")->name('eventee.leaderSetting');
    Route::POST('/leaderboard/setting/store/{id}',"Eventee\LeaderboardController@store")->name('eventee.leaderSetting.store');
    Route::POST('/leaderboard/setting/update/{id}/{lead_id}',"Eventee\LeaderboardController@update")->name('eventee.leaderSetting.update');

    //Room Setup
    Route::get('/Rooms/{id}',"Eventee\RoomController@index")->name('eventee.room');
    Route::get('/Rooms/create/{id}',"Eventee\RoomController@create")->name('eventee.room.create');
    Route::post('/Rooms/store/{id}',"Eventee\RoomController@store")->name('eventee.room.store');
    Route::get('/Rooms/edit/{id}/{room_id}',"Eventee\RoomController@edit")->name('eventee.room.edit');
    Route::post('/Rooms/update/{id}/{room_id}',"Eventee\RoomController@update")->name('eventee.room.update');
    Route::get('/Rooms/sort/{id}',"Eventee\RoomController@sort")->name('eventee.room.sort');


    Route::get("/reports/leaderboard/{id}", "EventManageController@leaderboardView")->name("event.leaderboard");
    Route::post("/reports/workshop/{name}/export", "EventManageController@exportWorkshopLogs")->name("event.export.workshopLogs");
    Route::get("/reports/workshop/{name}/{id}", "EventManageController@workshopReports")->name("event.workshop");
    Route::post("/reports/workshop/{name}/", "EventManageController@workshopReportsData")->name("event.workshop.api");

    //Eventee User
    Route::get("/user/{id}","Eventee\UserController@index")->name('eventee.user');
    Route::get("/user/create/{id}","Eventee\UserController@create")->name('eventee.user.create');
    Route::post("/user/store/{id}","Eventee\UserController@store")->name('eventee.user.store');
    Route::get('user/{id}/{user_id}/edit',"Eventee\UserController@edit")->name('eventee.user.edit');
    Route::get('user/{id}/{user_id}/info',"Eventee\UserController@information")->name('eventee.user.information');
    Route::post('user/{id}/{user_id}/update',"Eventee\UserController@update")->name('eventee.user.update');
    Route::post('user/delete',"Eventee\UserController@destroy")->name('eventee.user.delete');
    Route::get('user/import/{id}',"Eventee\UserController@ShowPage")->name('eventee.user.showpage');
    Route::post('user/import/{id}',"Eventee\UserController@Import")->name('eventee.user.import');
    Route::post('/user/Bulkdelete',"Eventee\UserController@BulkDelete")->name('eventee.user.bulkDelete');
    Route::post('/user/DeleteAll',"Eventee\UserController@DeleteAll")->name('eventee.user.deleteAll');

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
Route::get("privacy-policy", "HomeController@privacyPolicy")->name("privacyPolicy");
Route::get("faq", "HomeController@faqs")->name("faq");

Route::middleware(["auth"])->group(function () { //All Routes here would need authentication to access
    Route::post("/uploadFile", "CMSController@uploadFile")->name("cms.uploadFile");
    Route::get("/home", "HomeController@dashboard");
    // Route::get("/event", "EventController@index")->name("event");
    
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
    Route::get('user/Polls/{id}','UserPollController@index')->name('user.polls');
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
    Route::get('Announcement/popUp/{id}','UserAnnounceController@PopUp')->name('announcement.popUp');
    Route::get('Announcement/Close','UserAnnounceController@Close')->name('announcement.Close');
   
    /**
     * POLL ROUTE END
     */

    //Admin Prefixed Routes and also will check if user is admin or not
    Route::prefix("admin")->middleware("checkAccess:admin")->group(function () {
        Route::get('/user/lobby',"UserController@lobby")->name('user.lobby');
        Route::get("/Dashboard/reports", "AdminReportController@Dashboard")->name("reports.dashboard");
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
            // "menu"=>"Eventee/MenuController",
            "menuDetail"=>"menuDetailsController",
            "analytic"=>"AnalyticController",
            "recaptcha"=>"RecatchaController",
            //            "provisional" => "ProvisionalController",
        ]);
        //Menu And Api
        Route::get('delete/submenu','MenuController@subMenu')->name('delete.submenu');
        Route::get('delete/savePosition','MenuController@SavePosition')->name('delete.savePosition');
        Route::get('/setStatus','MenuController@setStatus')->name('setStatus');
        Route::get('/getDetails','AnalyticController@GetDetails')->name('detailsApi');
        Route::get('/third/delete','AnalyticController@DeleteData')->name('third.delete');
        Route::post('/updateDetails','AnalyticController@updateData')->name('updateDetails');
        Route::post('/updateCaptcha','RecatchaController@updateCatcha')->name('updateCaptcha');
        Route::get('/Comet','RecatchaController@Comet')->name('comet.index');
        Route::post('/Comet','RecatchaController@CometSave');

        //Report Section 
        Route::get("Recent/Events","AdminReportController@RecentEvent")->name('recent.event');
        Route::get('Least/ActiveAdmin',"AdminReportController@LeastActiveUser")->name('Least.user');
        Route::get('Recent/ActiveAdmin',"AdminReportController@RecentActiveUser")->name('recent.user');
        Route::get('Event/Ending',"AdminReportController@EventEnding")->name('event.ending');
        Route::get('Event/AdminLogs',"AdminReportController@EventLogs")->name('event.logs');
        //Package
        Route::get('/package','PackageController@index')->name('package.index');
        Route::get('/package/create','PackageController@create')->name('package.create');
        Route::post('/package/store','PackageController@store')->name('package.store');
        Route::get('/package/edit/{id}','PackageController@edit')->name('package.edit');
        Route::Post('/package/update/{id}','PackageController@update')->name('package.update');
        Route::Post('/package/delete/{id}','PackageController@destroy')->name('package.destroy');

        //License
        Route::get('/license',"LicenseController@index")->name('license.index');
        Route::get('/license/edit/{id}',"LicenseController@edit")->name('license.edit');
        Route::post('license/update/{id}',"LicenseController@update")->name('license.update');

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

        

    });

    Route::prefix("exhibiter")->middleware("checkAccess:exhibiter")->group(function () {
        Route::get("/booth/edit/{booth}/{id}", "Eventee\BoothController@adminEdit")->name("exhibiter.edit");
        Route::post("/booth/edit/{booth}/{id}", "Eventee\BoothController@adminUpdate")->name("exhibiter.update");
        Route::get("/booth/{booth}/enquiries/{id}", "BoothController@boothEnquiries")->name("exhibiter.enquiries");
        Route::get("/booth/{booth}/enquiry/raw/", "BoothController@boothEnquiriesRaw")->name("exhibiter.enquiries.raw");
        // Route::POST('booth/video/delete','Eventee\BoothController@deleteVideo')->name('booth.video.delete');
        // Route::post("/booth/edit/{booth}","BoothController@adminUpdateImages")->name("exhibiter.updateimages");
    });

    Route::prefix("cms")->middleware("checkAccess:cms_manager")->group(function () {
        Route::get("/field/create", "CMSController@createField")->name("cmsField.create");
        Route::post("/field/create", "CMSController@storeField")->name("cmsField.store");
        Route::get("/field/{field}/", "CMSController@editField")->name("cmsField.edit");
        Route::post("/field/{field}/", "CMSController@updateField")->name("cmsField.update");
        Route::post("/field/{field}/delete", "CMSController@deleteField")->name("cmsField.delete");
    });

  
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
});
//Route::get("setup-slido-fields", function(){
//    $i = 0;
//    foreach (EVENT_ROOMS as $ROOM){
//        createField($ROOM."_Slido", "text", "Slido", $i++);
//    }
//    return getSlidoConfig();
//});



// Route::get("/createmenus",function ()
// {
//     $events = Event::all();
//     // $delfaultMenus =   ["attendees"];
//     foreach($events as  $event){
//         $menuitem = new Menu();
//         $menuitem->name = "attendees";
//         $menuitem->link = "perm";
//         $menuitem->event_id = $event->id;
//         $menuitem->type = "nav";
//         $menuitem->parent_id = 0;
//         $menuitem->position = 10;
//         $menuitem->save();
//     }
// });


$url = env('APP_ENV') ==='staging'? '{subdomain}.localhost' :'{subdomain}.eventstub.co';

// $url = '{subdomain}.localhost';
Route::group(['domain' => $url], function () {
    Route::get('/', function ($subdomain) {
        $eveCount = Event::where("slug",$subdomain)->count();
        $event = Event::where("slug",$subdomain)->first();
        if($eveCount < 1){
            // dd("here");
            return view('errors.404');
        }
        // dd($subdomain);
        $user = Auth::user();
        if(!$user){
            return redirect(route('attendeeLogin',$subdomain));
        }
        if($user->type === "exhibiter"){
            return redirect(route("exhibiterhome",$subdomain));
        }
        // if($user->type)
        // dd($subdomain);
        return redirect(route('eventee.event',$subdomain));
        // Route::get("/", "HomeController@index")->name("home");

        // return "This will respond to requests for 'admin.localhost/'";
    });
    
    Route::get("/confirm-login", "HomeController@confirmLogin")->name("confirmLogin");

    Route::get("/faq", "HomeController@faqs")->name("faq");
    Route::get('/login',"EventUser\LoginController@login")->name("attendeeLogin");
    Route::get('/exhibitorlogin/{email}',"EventUser\LoginController@exhibitorlogin")->name("exhibitorLogin");
    
    Route::post("/event/post/login", "AttendeeAuthController@login")->name("event.user.confirmLogin");
    Route::post("/event/post/exhibitorlogin", "AttendeeAuthController@exhibitorlogin")->name("exhibiter.login");
    // Route::get("/register", "AttendeeAuthController@showRegistrationForm")->name("attendee_register");
    // Route::post("/event/register", "AttendeeAuthController@saveRegistration")->name("attendee_register.confirm");
    Route::get("/register/{slug}", "AttendeeAuthController@showRegistration")->name("attendee_registe");
    Route::POST('/eventUser/logout','EventUser\LoginController@logout')->name('attendeeLogout');
    Route::prefix("exhibiter")->middleware("checkAccess:exhibiter")->group(function () {
        Route::get("/booths", "Eventee\BoothController@exhibiterhome")->name("exhibiterhome");
    });
    Route::post("/event/register", "AttendeeAuthController@confirmReg")->name("attendee_register.confirmReg");
    Route::middleware(["auth"])->group(function ($subdomain) {
        Route::get("/event", "EventController@index")->name("eventee.event");
        Route::post('lounge/event/addp/{table}/{user}',"Eventee\LoungeController@appParticipant")->name('addParticipant');
        Route::post('lounge/event/rmp/{table}/{user}',"Eventee\LoungeController@removeParticipant")->name('removeParticipant');
        Route::get('/updatelounge',"Eventee\LoungeController@updateLounge")->name('updateLounge');
        
        
        Route::get("subscriptions-raw", "EventSessionsController@subscription_raw")->name("subscription_raw");


    });





});


Route::middleware(["auth"])->group(function () { //All Routes here would need authentication to access
    Route::post('notification/seen','UerNotifiicationController@seen')->name('notification.user.seen');
    Route::get('notification/seen/all','UerNotifiicationController@seenAll')->name('notification.user.seenAll');
    Route::post("/Event/Location","LocationController@setLocation")->name("set.Location");
    
    Route::get("/event/session-notifications", "EventController@sendSessionNotifications");
    
    Route::get("schedule", "EventSessionsController@schedule")->name("schedule");
    Route::get("schedule-raw", "EventSessionsController@scheduleRaw")->name("scheduleRaw");
    // Route::get("subscriptions-raw", "EventSessionsController@subscription_raw")->name("subscription_raw");
    Route::get("/notifications/send", "NotificationController@send")->name("sendNotifications");
    Route::get("/me", "EventController@profileInfo")->name("event.profile");
    Route::get('/testS','testController@index');

    // Route::get("/event/{id}", "EventController@index")->name("eventee.event");


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
  
    Route::post("/event/track", "EventController@trackEvent")->name("trackEvent");
    Route::get("/event/auditorium", "EventController@auditoriumEmbed")->name("auditoriumEmbed");
    Route::get("/event/meet", "EventController@meetEmbed")->name("meetEmbed");
    Route::get("/event/current-session", "EventController@getCurrentSession")->name("currentSession");
    Route::get("/event/webinar", "EventController@webinar")->name("webinar");
    Route::get("/event/videosdk/{meetingId}/{containerId}", "EventController@videosdk")->name("videosdk");
    Route::get("/event/ended", "EventController@webinarEnded")->name("webinarEnded");
    Route::post("/event/{event}/subscribe", "EventSessionsController@subscribe")->name("event.subscribe");
    Route::post("/event/{event}/unsubscribe", "EventSessionsController@unsubscribe")->name("event.unsubscribe");

    // Route::post("/leaderboard", "EventController@leaderboard")->name("leaderboard");
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

Route::get("/updateevents",function(){
    $events = Event::all();
    foreach($events as $event){
        $link = $event->link;
        $link = str_replace("app.eventstub","eventstub",$link);
        $link = str_replace("virturo.io","eventstub.co",$link);
        $event->link = $link;
        $event->save();
    }
});


Route::get('/schedule-run', function() {
    Artisan::call('schedule:run');
    return "schedule:run is ran";
});

<?php

namespace App\Http\Controllers;

use App\Event;
use App\LoginLog;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Points;
use Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Mail;
use App\FormStruct;
use App\Form;
use App\FormField;
use App\UserData;
use Sichikawa\LaravelSendgridDriver\Transport\SendgridTransport;

class AttendeeAuthController extends Controller
{

    public function __construct()
    {
        $this->loginT = getLoginVars();
    }

    // method to show the login page
    public function show()
    {
        $user = Auth::user();
        if ($user) {
            return redirect("/event");
        } else {
            return view("auth.attendee_login")->with([
                "login" => $this->loginT,
                "notFound" => FALSE,
                "captchaError" => FALSE
            ]);
        }
    }

    // method to attempt login
    public function login(Request $request,$subdomain)
    {
        $event = Event::where("name",$subdomain)->first();
        
        //     $response = Http::asForm()
        //     ->post(
        //         "https://www.google.com/recaptcha/api/siteverify",
        //         [
        //             "secret" => env("RECAPTCHA_SECRET_KEY"),
        //             "response" => $request->post("token")
        //         ]
        //     );

        //     $Response = json_decode($response->body(), TRUE);
        
       
        
        // if (!$response->successful() || !$Response["success"]) {
        //     $request->old(env("ATTENDEE_LOGIN_FIELD"), $request->post(env("ATTENDEE_LOGIN_FIELD")));
        //     return view("auth.attendee_login")
        //         ->with([
        //             "notFound" => FALSE,
        //             "captchaError" => TRUE,
        //             "login" => $this->loginT
        //         ]);
        // }
        // $validation =  env("ATTENDEE_LOGIN_FIELD") == "email" ? "required|email" : "required";
        // $request->validate([env("ATTENDEE_LOGIN_FIELD") => $validation]);
        //dd($event);

        $user = User::with('tags.looking_users')->where("email", $request->post("email"))
        ->where('event_id',$event->id)
            //            ->whereIn("type", USER_TYPES_TO_LOGIN_WITH_MEMBERSHIP_ID)
            ->whereNotIn("type", ["admin", "teller", "moderator", "exhibiter", "cms_manager"])
            ->first();
        if (!$user) {

            // dd("not found");
            return view("eventUser.login")->with([
                "login" => $this->loginT,
                "notFound" => TRUE,
                "captchaError" => FALSE,
                "id"=>$event->id,
                "subdomain"=>$event->name
            ]);
            // return redirect(route("attendeeLogin",$subdomain))->with([
            //         "notFound" => TRUE,
            //         "captchaError" => FALSE,
            //         "login" => $this->loginT
            // ]);
            // return view("auth.attendee_login")->with([
            //     "notFound" => TRUE,
            //     "captchaError" => FALSE,
            //     "login" => $this->loginT
            // ]);
        } else {

            // if ($user->type == 'attendee' && env("APP_ENV") != "local") {
            //     return view("auth.attendee_login")->with([
            //         "notFound" => TRUE,
            //         "captchaError" => FALSE,
            //         "login" => $this->loginT
            //     ]);
            // }
            \DB::table("sessions")->where("user_id", $user->id)->whereNotIn("id", [session()->getId()])->delete();
            Auth::login($user);
            LoginLog::create(["ip" => $request->ip(), "user_id" => $user->id]);
            $pointsDetails = [
                "points_to" => $user->id,
                "points_for" => "login",
                "details" => "",
                "points" => LOGIN_POINTS,
            ];
            if (!Points::where($pointsDetails)->count()) {
                Points::create($pointsDetails);
                $user->update([
                    "points" => DB::raw('points+' . LOGIN_POINTS),
                ]);
            }
            //Users to whoom we have to notify about the recent login of current user
            foreach ($user->tags as $tag) {
                foreach ($tag->looking_users as $looking_user) {
                    $looking_user->sendNotification("suggested_user_login", "One of your suggested users just logged in. Visit attendees section to grow your network.", "info", $user->id);
                }
            }
            $user->touch();
            // dd("test");

            return redirect(route("eventee.event",['subdomain'=>$event->name]));
            // return redirect("/event");
        }
    }

   public function showRegistrationForm($subdomain)
    {
        $event = Event::where("name",$subdomain)->first();

        $form = Form::where('event_id',$event->id);
        if($form->count() > 0){
            $form = $form->first();
            $fieldsFinal = [];
            $fields = FormField::where('form_id',$form->id)->get();
            $eveFields = [];
            foreach($fields as $field){
                $formF = FormStruct::where('id',$field->struct_id)->where('event_id',$event->id)->get();
                foreach($formF as $f){
                    array_push($eveFields,$f->field);
                }
                $fieldset = new \stdClass();
                $struct = FormStruct::findOrFail($field->struct_id);
                $fieldset->label = $struct->label;
                $fieldset->fieldName = $struct->field;
                $fieldset->type = $struct->type;
                array_push($fieldsFinal,$fieldset);
            }
            // return $fieldsFinal;
            return view("auth.register_attendee",compact('fieldsFinal','subdomain','eveFields'));
        }
        else{
            flash("Register Page is not ready yet")->error();
            return redirect()->route('attendeeLogin');
        }
       
    }

    public function saveRegistration(Request $request,$subdomain)
    {
        $event = Event::where("name",$subdomain)->first();
        $userField = $request->userfields;
        $data = $request->all();
        $data['event_id'] = $event->id;
       
        // return $data;
        $user = new User($data);
        if($user->save()){
            if($request->hasFile('image')){
                $file = $request->file('image');
                $name = $file->getClientOriginalName();
                $destinationPath = public_path().'/uploads/profilepic';
                $file->move($destinationPath, $name);
                User::where('id',$user->id)->update(['profileImage'=>'/uploads/profilepic/'.$name]);
            }
            if(is_array($userField)){
                for($i = 0;$i < count($userField) ;$i++){
                    if($request->has($userField[$i])){
                        $userData = new UserData;
                        $userData->user_id = $user->id;
                        $userData->user_field = $userField[$i];
                        $userData->field_value = $data[$userField[$i]];
                        $userData->save();
                    }
                }
            }
            flash("Registered Successfully")->success();
            return redirect()->route('attendeeLogin',$subdomain);
        }
        $user->sendEmailVerificationNotification();
        Auth::login($user);
        // Mail::send([], [], function (Message $message) use ($user) {
        //     $message
        //         ->to($user->email)
        //         ->from(env("MAIL_FROM_ADDRESS"), env("MAIL_FROM_NAME"))
        //         ->embedData([
        //             'personalizations' => [
        //                 [
        //                     'dynamic_template_data' => [
        //                         'user' => "{$user->name} {$user->last_name}",
        //                         'email'  => $user->email,
        //                     ],
        //                 ],
        //             ],
        //             'template_id' => config("services.sendgrid.templates.register"),
        //         ], SendgridTransport::SMTP_API_NAME);
        // });
        $request->session()->put('attendee_reg',1);
        return redirect(route("attendee_login",$subdomain));
        // return redirect(route("event"));
    }
}

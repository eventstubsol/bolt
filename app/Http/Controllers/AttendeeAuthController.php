<?php

namespace App\Http\Controllers;

use App\Event;
use App\LoginLog;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;
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
use App\UserSubtype;
use Aws\Api\Validator;
use App\UserLocation;
use Dotenv\Exception\ValidationException;
use Sichikawa\LaravelSendgridDriver\Transport\SendgridTransport;

class AttendeeAuthController extends Controller

{
    use SoftDeletes;

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
        // return $subdomain;
        $event = Event::where("slug",$subdomain)->first();
       
            if(env('APP_ENV') != 'staging'){
                if(env('RECAPTCHA_SECRET_KEY') && env('RECAPTCHA_SITE_KEY')){
                    // dd("shubh");
                    $response = Http::asForm()
                    ->post(
                        "https://www.google.com/recaptcha/api/siteverify",
                        [
                            "secret" => api('RECAPTCHA_SECRET_KEY',$event->id),
                            "response" => $request->post("token")
                        ]
                    );
    
                    $Response = json_decode($response->body(), TRUE);
                
            
        
                    if (!$response->successful() || !$Response["success"]) {
                        $request->old(env("ATTENDEE_LOGIN_FIELD"), $request->post(env("ATTENDEE_LOGIN_FIELD")));
                        return view("eventUser.login")
                            ->with([
                                "notFound" => FALSE,
                                "captchaError" => TRUE,
                                "login" => $this->loginT,
                                "subdomain"=>$subdomain
                            ]);
                    }
                }
            }
        $validation =  env("ATTENDEE_LOGIN_FIELD") == "email" ? "required|email" : "required";
        $request->validate([env("ATTENDEE_LOGIN_FIELD") => $validation]);
        //dd($event);

        $user = User::with('tags.looking_users')->where("email", $request->post("email"))
        ->where('event_id',$event->id)
            //            ->whereIn("type", USER_TYPES_TO_LOGIN_WITH_MEMBERSHIP_ID)
            ->whereNotIn("type", ["admin","eventee", "cms_manager"])
            ->first();
        // dd($user);
        if (!$user) {

            // dd("not found");
            flash("invalid credentials")->error();
            return redirect()->back();
            // return view("eventUser.login")->with([
            //     "login" => $this->loginT,
            //     "notFound" => TRUE,
            //     "captchaError" => FALSE,
            //     "id"=>$event->id,
            //     "subdomain"=>$event->slug
            // ]);
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
            if ($user->type !== 'attendee' && $user->type !== 'delegate' ) {
                return redirect( route("exhibitorLogin",['subdomain'=>$subdomain,'email'=>$user->email]));
            }
            $user->online_status = 1;
            $user->save();
            DB::table("sessions")->where("user_id", $user->id)->whereNotIn("id", [session()->getId()])->delete();
            Auth::login($user);
            LoginLog::create(["ip" => $request->ip(), "user_id" => $user->id]);
            // UserLocation::create(['user_id'=>$user->id,'event_id'=>$user->event_id,'type'=>"exterior"]);
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

            return redirect(route("eventee.event",['subdomain'=>$event->slug]));
            // return redirect("/");
        }
    }

   public function showRegistration($subdomain,$slug){
        $id = Event::where("slug",$subdomain)->first()->id;
        $form = Form::where("slug",$slug)->where("event_id",$id)->first();
        if(!$form){
            return view('erros.404');
        }
        $subtypes = UserSubtype::where('event_id',$id)->get();
        $form->load("fields.formStruct");
        $email = FALSE;
        // $form = (object) ($form ->toArray());
        // return $form;
        return view("eventee.form.registration")->with(compact("id","subdomain","form","email","subtypes"));
   }

   public function exhibitorlogin($subdomain,Request $req)
   {
    try{
        $event = Event::where("slug",$subdomain)->first();
        $user = User::where('email',$req->email)->where("event_id",$event->id)->first();
        $pass = password_verify($req->password,$user->password);
        if($pass ){
            // dd($user);
            Auth::login($user);
                // return $user->type;
            LoginLog::create(["ip" => $req->ip(), "user_id" => $user->id]);
           
            if($user->type === "exhibiter"){
                return redirect(route("exhibiterhome",$subdomain));
            }
            if($user->type === "speaker"){
                return redirect(route("eventee.event",['subdomain'=>$event->slug]));
            }
            // if(view()->exists("dashboard.".$user->type)){
            // }
            // return redirect(route('home'));
        }
        else{
            // return "Invalid Credentials".$user->id." ";
            flash("Invalid Credentials : ".$user->email)->error();
            return redirect()->back();
            // return view("auth.exhibiter")->with([
            //     "email" => $req->email,
            //     "login" => $this->loginT,
            //     "notFound" => TRUE,
            //     "captchaError" => FALSE,
            //     "id"=>$event->id,
            //     "subdomain"=>$event->slug
            // ]);
            
        }
    }
    catch(\Exception $e){
        Log::error($e->getMessage());
    }
   }
   public function showRegistrationForm($subdomain)
    {
        // try{
        //     dd($subdomain);
        // }
        // catch(\Exception $e){
        //     Log::error($e->getMessage());
        // }
        $event = Event::where("slug",$subdomain)->first();

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
                $fieldset->placeholder = $field->placeholder;
                $fieldset->required = $field->required;
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

    public function confirmReg(Request $request,$subdomain){
        // dd($request->all());
        $request->validate([
            'email' => 'required|email',
            'name' => 'required',
        ]);
        $event = Event::where("slug",$subdomain)->first();
        $checkuser = User::where("email",$request->email)->where("event_id",$event->id)->get();
        if($checkuser->count()){
            return back()->with(["email"=>"Email Already Taken"]);
        }
        $user = new User($request->all());
        $user->save();
        $userdatas = $request->except("name","email","phone","country","job_title","event_id","_token","type","subtype","profileImage");
        foreach($userdatas as $feild => $userdata){
            $userData = new UserData;
            $userData->user_id = $user->id;
            $userData->user_field = $feild;
            $userData->field_value = $userdata;
            $userData->save();
        }
        flash("Registered Successfully")->success();
        return redirect()->route('attendeeLogin',$subdomain);
    }

    public function saveRegistration(Request $request,$subdomain)
    {
        $event = Event::where("slug",$subdomain)->first();
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

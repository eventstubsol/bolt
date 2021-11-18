<?php

namespace App\Http\Controllers\Eventee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Device;
use App\Notification;
use App\User;
use App\Events\NotificationEvent;
use App\Event;
use App\PushNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Http;
use Illuminate\Mail\Message;
use Mail;
use Sichikawa\LaravelSendgridDriver\Transport\SendgridTransport;
use URL;

class NotificationController extends Controller
{
    public function index($id)
    {
        $notifications = PushNotification::where('event_id',$id)->orderBy("created_at")->get();
        return view("eventee.notification.index")->with(compact("notifications","id"));
    }

    public function create($id)
    {
        return view("eventee.notification.create",compact("id"));
    }

    public function store(Request $request,$id)
    {
        $event = Event::findOrFail($id);
        $request->validate(["title" => "required|max:255", "message" => "required|max:255", "roles" => "required|array|min:1"]);
        if ($request->post("url", NULL)) {
            $request->validate(["url" => "url"]);
        }
        

        // $resp = sendGeneralNotification($request->post("title"), $request->post("message"), $request->post("url", NULL), $request->post("roles"));

      
        
        // PushNotification::create([
        //     "title" => $request->post("title"),
        //     "url" => $request->post("url", NULL),
        //     "message" => $request->post("message"),
        //     "roles" => implode(", ", $request->post("roles")),
        //     "event_id" => $id,
        // ]);
        $notify = new PushNotification;
        $notify->title = $request->post("title");
        $notify->url = $request->post("url", NULL);
        $notify->message = $request->post("message");
        $notify->roles =implode(", ", $request->post("roles"));
        $notify->event_id = $id;
        $role = implode(", ", $request->post("roles"));
        if($notify->save()){
            $notification = event(new NotificationEvent($request->message,$request->title,$event->slug,$notify->id,$role));
            flash("Notification Sent Succesfully")->success();
            return redirect()->route('eventee.notification',$id);
        }
        else{
            flash("Something Went Wrong")->error();
            return redirect()->back();
        }
    }

    public function send(Request $request)
    {
        $key = $request->get("key");
        if ($key != env("WEBHOOK_KEY")) {
            return abort(404);
        }
        $users = User::has("unsent_notifications")
            ->with("unsent_notifications")
            ->limit(10)
            ->get(["id", "name", "email"]);

        $users->map(function (User $user) {
            $message = "You have <b>{$user->unsent_notifications()->count()}</b> updates pending";
            if ($user->unsent_notifications()->count() == 1) {
                $message = $user->unsent_notifications()->get()[0]->title;
            }

            // sending on the devices
            $devices = Device::whereUserId($user->id);
            if ($devices->count() > 0) {
                $ids = [];
                $devices->get()->map(function (Device $device) use ($ids) {
                    $ids[] .= $device->device_id;
                });

                Http::withHeaders([
                    "Authorization" => "Basic " . env("ONESIGNAL_API_KEY")
                ])
                    ->post("https://onesignal.com/api/v1/notifications", [
                        "app_id" => env("ONESIGNAL_APP_ID"),
                        "url" => URL::route('event') . '#attendees',
                        "headings" => array("en" => "Pending Updates"),
                        "contents" => array("en" => $message),
                        "include_player_ids" => $ids
                    ]);
            }

            // sending on the mail
            // Mail::send([], [], function (Message $email) use ($message, $user) {
            //     $email
            //         ->to($user->email)
            //         ->from(env("MAIL_FROM_ADDRESS"), env("MAIL_FROM_NAME"))
            //         ->embedData([
            //             'personalizations' => [
            //                 [
            //                     'dynamic_template_data' => [
            //                         'user' => "{$user->name} {$user->last_name}",
            //                         'message'  => $message,
            //                         'link' => URL::route("event") . '#attendees'
            //                     ],
            //                 ],
            //             ],
            //             'template_id' => config("services.sendgrid.templates.notifications"),
            //         ], SendgridTransport::SMTP_API_NAME);
            // });

            $user->markNotificationsAsRead()->save();
        });

        return "Sent";
 
    }
}


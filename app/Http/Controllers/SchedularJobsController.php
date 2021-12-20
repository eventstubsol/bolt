<?php
namespace App\Http\Controllers;
use http\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use App\Event;
use App\ScheduleNotification;
use App\Events\NotificationEvent;
use App\PushNotification;

class SchedularJobsController extends Controller
{
  public function index()
  {
    return null;
  }


  public function runJobs()
  {
    $schedules = ScheduleNotification::whereBetween('sending_time',[Carbon::now()->subMinutes(15)->format('H:i'),Carbon::now()->format('H:i')])
        ->where('sending_date',Carbon::now()->format('Y-m-d'))
        ->where('status',0)
        ->get();    
        // print_r(Carbon::now()->subMinutes(15)->format('H:i'));
       if(count($schedules) > 0){
          //  print_r($schedules);
            foreach($schedules as $schedule){
                $event = Event::findOrFail($schedule->event_id);
                $notify = new PushNotification;
                $notify->title = $schedule->title;
                $notify->url = $schedule->url;
                $notify->message = $schedule->message;
                $notify->roles =$schedule->role;
                $notify->event_id = $event->id;
                if($notify->save()){
                    event(new NotificationEvent($schedule->message,$schedule->title,$event->slug,$notify->id,$schedule->role,$schedule->url));
                    $schedule->status = 1;
                    $schedule->sent_on = Carbon::now()->format('Y-m-d H:i:s');
                    $schedule->save();
                }
                
            }
            Log::channel('custom')->info(Carbon::now());
            echo 1;
       }
       else{
           Log::channel('custom')->error("No data available");
           echo 0;
       }
  }

}
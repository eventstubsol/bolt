<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\ScheduleNotification;
use App\Events\NotificationEvent;
use App\Event;
use App\PushNotification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;


class sendNote extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:note';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Schedule Notification';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $schedules = ScheduleNotification::whereBetween('sending_time',[Carbon::now("UTC")->subMinutes(20)->format('H:i'),Carbon::now("UTC")->format('H:i')])
        ->where('sending_date',Carbon::now("UTC")->format('Y-m-d'))
        ->where('status',0)
        ->get();
        // print_r($schedules);
       if(count($schedules) > 0){
          
            // foreach($schedules as $schedule){
            //     $event = Event::findOrFail($schedule->event_id);
            //     $notify = new PushNotification;
            //     $notify->title = $schedule->title;
            //     $notify->url = $schedule->url;
            //     $notify->message = $schedule->message;
            //     $notify->roles =$schedule->role;
            //     $notify->event_id = $event->id;
            //     if($notify->save()){
            //         event(new NotificationEvent($schedule->message,$schedule->title,$event->slug,$notify->id,$schedule->role,$schedule->url));
            //         $schedule->status = 1;
            //         $schedule->save();
            //     }
            //     Log::channel('custom')->info(Carbon::now("UTC"));
            //     echo 1;
            // }
       }
       else{
        Log::channel('custom')->error("Something went wrong");
        echo 0;
       }
    }
}

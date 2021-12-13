<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\ScheduleNotification;
use App\Events\NotificationEvent;
use App\Event;
use App\PushNotification;

class sendNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:notification';

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
        $schedules = ScheduleNotification::whereBetween('sending_time',[Carbon::now()->format('H:i'),Carbon::now()->subMinutes(20)->format('H:i')])
        ->where('sending_date',Carbon::now()->format('Y-m-d'))
        ->where('status',0)
        ->get();    
       if(count($schedules) > 0){
           print_r($schedules);
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
                    $schedule->save();
                }
                
            }
       }
       else{
           return 0;
       }
    }
}

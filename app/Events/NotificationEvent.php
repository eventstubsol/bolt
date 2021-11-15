<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NotificationEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    
    public $message;
    public $title;
    public $slug;
    public $notify_id;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($message,$title,$slug,$notify_id)
    {
        //
        $this->title = $title;
        $this->message = $message;
        $this->slug = $slug;
        $this->notify_id = $notify_id;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel($this->slug);
    }

    public function broadcastWith () {
        return [
            'title' => $this->title,
            'message' => $this->message,
            'notify_id' => $this->notify_id
        ];
    }


    public function broadcastAs(){
        return "notification-sent";
    }
}

<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PollEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    
    public $poll;
    public $slug;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($poll,$slug)
    {
        //
        $this->poll = $poll;
        $this->slug = $slug;
       
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel($this->slug.'poll');
    }

    public function broadcastWith () {
        return [
            'poll' => $this->poll,
        ];
    }


    public function broadcastAs(){
        return "poll";
    }
}

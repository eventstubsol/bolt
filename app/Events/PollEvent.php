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
    public $location_type;
    public $location;
    public $types;
    public $slug;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($poll,$slug,$location,$location_type,$types)
    {
        //
        $this->poll = $poll;
        $this->slug = $slug;
        $this->location_type = $location_type;
        $this->location = $location;
        $this->types = $types;
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
            'location_type'=>$this->location_type,
            'location'=>$this->location,
            'types'=>$this->types
        ];
    }


    public function broadcastAs(){
        return "poll";
    }
}

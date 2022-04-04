<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class swagbagMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($event,$resources,$user)
    {
        //
        $this->user = $user;
        $this->event = $event;
        $this->resource = $resources;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('info@eventsibles.com', $this->event->name)->markdown('emails.swagMail')->with([
            'user'=>$this->user,
            'resources'=>$this->resource,
            'event'=>$this->event
        ]);
    }
}

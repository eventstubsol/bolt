<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EventeeMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($event,$subject,$message,$user)
    {
        //
        $this->event = $event; 
        $this->subject = $subject;
        $this->message = $message; 
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('event-admin@eventstub.co', $this->event->name)->markdown('emails.eventee')->with([
            'event'=>$this->event,
            'subject'=>$this->subject,
            'message'=>$this->message,
            'user'=>$this->user
            
        ]);
    }
}

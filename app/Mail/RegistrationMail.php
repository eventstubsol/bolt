<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegistrationMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user,$template,$event)
    {
        $this->user = $user;
        $this->template = $template;
        $this->event = $event;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('hello@eventstub.co', $this->event->name)->markdown('emails.regSucess')->with([
            'user' => $this->user,
            'template' =>$this->template,
            'event' => $this->event,
        ]);
    }
}

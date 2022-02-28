<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ActiveMailAttendee extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user,$subdomain)
    {
        //
        $this->user = $user;
        $this->subdomain = $subdomain;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('event-admin@eventstub.co', "Eventstub")->markdown('emails.activate')->with([
            'user' => $this->user,
            'subdomain' =>$this->subdomain,
        ]); 
    }
}
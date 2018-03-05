<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SubscriberRegistered extends Mailable
{
    use Queueable, SerializesModels;

    public $password;
    public $user;

    /**
     * Create a new message instance.
     * @param $password
     * @param $user
     * @return void
     */
    public function __construct($user, $password)
    {
        $this->password = $password;
        $this->user = $user;
    }

    /**
     * Build the message
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.subscriber_registered')->subject('Subscriber Registered');
    }
}

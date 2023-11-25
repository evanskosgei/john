<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    private $mess = [];

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mess)
    {
        $this->username = $mess;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('hello@example.com', 'john')
        ->subject($this->mess['subject'])
        ->view('email')->with('data', $this->mess);
    }
}

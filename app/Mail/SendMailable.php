<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $text;
    public $weather;

    /**
     * Create a new message instance.
     *
     * @param $message
     * @param $weather
     */
    public function __construct($message, $weather)
    {
        $this->text = $message;
        $this->weather = $weather;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.github');
    }
}

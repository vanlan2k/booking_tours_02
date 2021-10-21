<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificationTourMail extends Mailable
{
    use Queueable, SerializesModels;
    private $tour;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($tour)
    {
        $this->subject('NEW PRODUCT INFORMATION');
        $this->tour = $tour;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.notification')->with(['tour' => $this->tour]);
    }
}

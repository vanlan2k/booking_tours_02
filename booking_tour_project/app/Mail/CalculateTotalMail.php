<?php

namespace App\Mail;

use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CalculateTotalMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->subject('TOTAL REVENUE PER DAY');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $calculate = Booking::sumRevenueDay();
        $data['calculate'] = $calculate;
        return $this->view('emails.calculate-total')->with($data);
    }
}

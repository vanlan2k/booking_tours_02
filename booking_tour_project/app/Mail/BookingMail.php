<?php

namespace App\Mail;

use App\Models\Tour;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookingMail extends Mailable
{
    use Queueable, SerializesModels;

    private $cart;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($cart)
    {
        $this->cart = $cart;
        $this->subject('REVENUE BY DAY');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $tour = Tour::find($this->cart->cart['id_tour']);
        $data['tour'] = $tour;
        $data['cart'] = $this->cart;
        return $this->view('emails.booking-mail')->with($data);
    }
}

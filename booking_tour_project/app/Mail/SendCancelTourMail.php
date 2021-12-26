<?php

namespace App\Mail;

use App\Models\Booking;
use App\Models\BookingDetail;
use App\Models\Tour;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendCancelTourMail extends Mailable
{
    use Queueable, SerializesModels;

    private $id_booking;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($id_booking)
    {
        $this->id_booking = $id_booking;
        $this->subject = ('THÔNG BÁO HỦY TOUR');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $booking = Booking::find($this->id_booking);
        $booking_detail = BookingDetail::where('booking_id', $this->id_booking)->first();
        $data['bk'] = $booking;
        $data['bk_dt'] = $booking_detail;
        return $this->view('emails.tour-delete')->with($data);
    }
}

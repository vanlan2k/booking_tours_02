<?php

namespace App\Jobs;

use App\Mail\SendCancelTourMail;
use App\Models\Booking;
use App\Models\BookingDetail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendCancelTourJobs implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $id_tour;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($id_tour)
    {
        $this->id_tour = $id_tour;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $bookings = BookingDetail::where('tour_id', $this->id_tour)->get();
        if ($bookings){
            foreach ($bookings as $booking){
                $bk = Booking::find($booking->booking_id);
                $bk->payment = 2;
                $bk->save();
                Mail::to($booking->booking->user->email)->send(new SendCancelTourMail($booking->booking_id));
            }
        }
    }
}

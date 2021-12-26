<?php

namespace App\Jobs;

use App\Mail\BookingMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Env;
use Illuminate\Support\Facades\Mail;

class NewBookingJobs implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $id_booking;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($id_booking)
    {
        $this->id_booking = $id_booking;
        $this->delay = now()->addSeconds(5);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to(Env::get('MAIL_FROM_ADDRESS'))->send(new BookingMail($this->id_booking));
    }
}

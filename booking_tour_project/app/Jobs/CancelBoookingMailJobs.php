<?php

namespace App\Jobs;

use App\Mail\CancelBookingMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Env;
use Illuminate\Support\Facades\Mail;

class CancelBoookingMailJobs implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $id_booking;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($id_booking)
    {
        $this->id_booking = $id_booking;
        $this->delay = now()->addSeconds(10);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to(Env::get('MAIL_FROM_ADDRESS'))->send(new CancelBookingMail($this->id_booking));
    }
}

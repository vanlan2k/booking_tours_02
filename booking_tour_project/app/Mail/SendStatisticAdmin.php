<?php

namespace App\Mail;

use App\Services\HomeService;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class SendStatisticAdmin extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->subject = 'Statistic '.Carbon::now()->subMonth()->format('m-Y');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $service = new HomeService();
        $data = $service->getDataStatistic();
        return $this->view('emails.statistic-month')
            ->with($data)
            ->attach('excels/'.Carbon::now()->subMonth()->format('m-Y').'.xlsx');
    }
}

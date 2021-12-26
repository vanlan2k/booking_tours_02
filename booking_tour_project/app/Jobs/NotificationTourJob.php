<?php

namespace App\Jobs;

use App\Enums\UserRole;
use App\Mail\NotificationTourMail;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class NotificationTourJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $tours;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($tours)
    {
        $this->tours = $tours;
        $this->delay = now()->addSeconds(5);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $emails = User::where('role_id', UserRole::Customer)->select('email')->get();
        Mail::to($emails)->send(new NotificationTourMail($this->tours));
    }
}

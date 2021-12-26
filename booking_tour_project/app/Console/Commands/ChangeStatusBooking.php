<?php

namespace App\Console\Commands;

use App\Models\Booking;
use App\Models\Tour;
use Carbon\Carbon;
use Illuminate\Console\Command;

class ChangeStatusBooking extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'changeStatusBooking:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $day = Carbon::now();
        $bookings = Booking::where('booking_date', '=', $day->subDays(5)->format('Y-m-d'))->get();
        foreach ($bookings as $booking) {
            $booking->status = 2;
            $booking->save();
        }
        $tours = Tour::where('date_start', $day->addDay()->format('Y-m-d'))->get();
        foreach ($tours as $tour){
            $tour->deleted_at = $day;
            $tour->save();
        }
    }
}

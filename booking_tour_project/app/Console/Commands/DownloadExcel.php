<?php

namespace App\Console\Commands;

use App\Exports\ExportSendStatistic;
use App\Jobs\SendStatisticJob;
use App\Mail\SendStatisticAdmin;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Excel;
use Illuminate\Support\Env;
use Illuminate\Support\Facades\Mail;

class DownloadExcel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'download:cron';

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
        Excel::store(new ExportSendStatistic(), Carbon::now()->subMonth()->format('m-Y').'.xlsx', 'custom_disk');
        Mail::to(Env::get('MAIL_FROM_ADDRESS'))->send(new SendStatisticAdmin());
    }
}

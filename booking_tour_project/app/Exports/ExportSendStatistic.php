<?php

namespace App\Exports;

use App\Services\HomeService;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExportSendStatistic implements FromView
{
    public function view(): View
    {
        $service = new HomeService();
        $data = $service->getDataStatistic();
        return view('exports.statistic_month', $data);
    }
}

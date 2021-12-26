<?php

namespace App\Http\Controllers\admin;

use App\Exports\ExportStatistic;
use App\Http\Controllers\Controller;
use App\Mail\SendCancelTourMail;
use App\Models\BookingDetail;
use App\Models\Tour;
use App\Services\ChartService;
use Excel;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index()
    {
        $service = new ChartService();
        $value = $service->indexHome();
        return view('admin.dashboard')->with($value);
    }
    public function exportStatistic($filter){
        $service = new ChartService();
        $data = $service->exportExcel($filter);
        return Excel::download(new ExportStatistic($data), 'download.xlsx');
    }
}

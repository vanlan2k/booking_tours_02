<?php

namespace App\Http\Controllers\admin;

use App\Exports\ExportStatistic;
use App\Http\Controllers\Controller;
use App\Models\Tour;
use App\Services\ChartService;
use Excel;

class HomeController extends Controller
{
    public function index()
    {
        $service = new ChartService();
        $test = $service->exportExcel();
        $value = $service->indexHome();
        return view('admin.dashboard')->with($value);
    }
    public function exportStatistic(){
        return Excel::download(new ExportStatistic, 'download.xlsx');
    }
}

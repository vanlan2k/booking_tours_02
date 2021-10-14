<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Services\ChartService;

class HomeController extends Controller
{
    public function index()
    {
        $service = new ChartService();
        $value = $service->indexHome();
        return view('admin.dashboard')->with($value);
    }
}

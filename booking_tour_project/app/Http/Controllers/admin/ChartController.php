<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Services\AdminService;
use App\Services\ChartService;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function chartBar()
    {
        $service = new ChartService();
        $result = $service->chartBar();
        return response()->json([
            'data' => $result['data'],
            'date' => $result['date']
        ]);
    }

    public function filterDate(Request $request)
    {
        $service = new ChartService();
        $result = $service->filterDate($request);
        return response()->json([
            'data' => $result['data'],
            'date' => $result['date']
        ]);
    }

    public function ChartService(Request $request)
    {
        $input = $request->all();
        $service = new ChartService();
        $result = $service->filterBy($input);
        return response()->json([
            'data' => $result['data'],
            'date' => $result['date']
        ]);
    }
}

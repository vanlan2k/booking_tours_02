<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Services\TourService;
use Illuminate\Http\Request;

class TourController extends Controller
{
    public function index(Request $request)
    {
        $sort = $request->sort;
        $service = new TourService();
        $tours = $service->sortTour($sort);
        $data['tours'] = $tours;
        $data['sort'] = $sort;
        return view('web.pages.list')->with($data);
    }
}

<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function store(Request $request)
    {
        $cate_id = $request->cate_id;
        $date = Carbon::parse($request->date_start)->format('Y-m-d');
        $tours = Tour::searchTour($cate_id, $date)->paginate(12);
        $data['tours'] = $tours;
        return view('web.pages.list')->with($data);
    }
}

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
        $address = $request->address;
        $date = Carbon::parse($request->date_start)->format('Y-m-d');
        $tours = Tour::searchTour($address, $date)->paginate(12);
        $data['tours'] = $tours;
        return view('web.pages.list')->with($data);
    }
}

<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use Carbon\Carbon;
use Illuminate\Http\Request;
use function Sodium\add;

class SearchController extends Controller
{
    public function store(Request $request)
    {
        $address = $request->address;
        $date = Carbon::parse($request->date_start)->format('Y-m-d');
        $tours = Tour::when($request->address != null, function ($query) use ($address, $date) {
            $query->where('address', $address)->where('date_start', $date);
        }, function ($query) use ($date) {
            $query->where('date_start', $date);
        })->paginate(12);
        $data['tours'] = $tours;
        return view('web.pages.list')->with($data);
    }
}

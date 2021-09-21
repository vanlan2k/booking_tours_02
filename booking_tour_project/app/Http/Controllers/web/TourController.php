<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use Illuminate\Http\Request;

class TourController extends Controller
{
    public function index(){
        $tours = Tour::paginate(12);
        $data['tours'] = $tours;
        return view('web.pages.list')->with($data);
    }
}

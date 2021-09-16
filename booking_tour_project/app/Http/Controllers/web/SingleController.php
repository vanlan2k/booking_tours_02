<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Tour;

class SingleController extends Controller
{
    public function index ($id){
        $tour = Tour::find($id);
        $tours = Tour::limit(4)->where('cate_id', $tour->cate_id)->get();
        $data['tour'] = $tour;
        $data['tours'] = $tours;
        return view('web.pages.single')->with($data);
    }
}

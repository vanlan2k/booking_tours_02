<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\AssessRate;
use App\Models\Review;
use App\Models\Tour;

class SingleController extends Controller
{
    public function index ($id){
        $tour = Tour::find($id);
        $tours = Tour::limit(4)->where('cate_id', $tour->cate_id)->get();
        $ratings = AssessRate::where('tour_id', $id)->get();
        $comments = Review::where('tour_id', $id)->where('status', true)->get();
        $data['tour'] = $tour;
        $data['tours'] = $tours;
        $data['ratings'] = $ratings;
        $data['comments'] = $comments;
        return view('web.pages.single')->with($data);
    }
}

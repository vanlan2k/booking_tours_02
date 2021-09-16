<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;

use App\Models\Review;
use App\Models\Tour;
use Illuminate\Http\Request;
use function Sodium\add;

class HomeController extends Controller
{
    public function index(){
        $tours = Tour::limit(9)->get();
        $tour_news = Tour::limit(4)->orderby('id', 'DESC')->get();
        $tours_highly = Tour::limit(4)->orderby('rate', 'DESC')->get();
        $add_tours = Tour::all();
        $data['tours'] = $tours;
        $data['tours_new'] = $tour_news;
        $data['tours_highly'] = $tours_highly;
        $data['add_tours'] = $add_tours;
        return view('web.home')->with($data);
    }
}

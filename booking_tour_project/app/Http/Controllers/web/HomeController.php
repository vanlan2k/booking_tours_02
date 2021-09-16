<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;

use App\Models\Category;
use App\Models\Review;
use App\Models\Tour;
use Illuminate\Http\Request;
use function Sodium\add;

class HomeController extends Controller
{
    public function index()
    {
        $tours = Tour::topTour();
        $tour_news = Tour::limit(4)->orderby('id', 'DESC')->get();
        $tours_highly = Tour::limit(4)->orderby('rate', 'DESC')->get();
        $cates = Category::all();
        $data['tours'] = $tours;
        $data['tours_new'] = $tour_news;
        $data['tours_highly'] = $tours_highly;
        $data['cates'] = $cates;
        return view('web.home')->with($data);
    }
}

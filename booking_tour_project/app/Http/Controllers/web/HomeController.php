<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;

use App\Mail\CalculateTotalMail;
use App\Models\Booking;
use App\Models\Category;
use App\Models\Tour;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index()
    {
        $tours = Tour::topTour();
        $tour_news = Tour::limit(12)->orderby('id', 'DESC')->get();
        $tours_highly = Tour::topRate();
        $cates = Category::all();
        $data['tours'] = $tours;
        $data['tours_new'] = $tour_news;
        $data['tours_highly'] = !$tours_highly[0] ? $tours : $tours_highly;
        $data['cates'] = $cates;
        return view('web.home')->with($data);
    }
}

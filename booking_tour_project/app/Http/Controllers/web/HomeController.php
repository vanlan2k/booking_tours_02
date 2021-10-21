<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;

use App\Mail\CalculateTotalMail;
use App\Models\Booking;
use App\Models\Category;
use App\Models\Review;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use function Sodium\add;

class HomeController extends Controller
{
    public function index()
    {
        Mail::to('vanlan2k@gmail.com')->send(new CalculateTotalMail());
        $tours = Tour::topTour();
        $tour_news = Tour::limit(4)->orderby('id', 'DESC')->get();
        $tours_highly = Tour::topRate();
        $cates = Category::all();
        $data['tours'] = $tours;
        $data['tours_new'] = $tour_news;
        $data['tours_highly'] = $tours_highly;
        $data['cates'] = $cates;
        return view('web.home')->with($data);
    }
}

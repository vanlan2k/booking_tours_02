<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class YouReviewController extends Controller
{
    public function index(){
        $reviews = Review::where('customer_id', Auth::user()->id)->get();
        $data['reviews'] = $reviews;
        return view('web.pages.review')->with($data);
    }
}

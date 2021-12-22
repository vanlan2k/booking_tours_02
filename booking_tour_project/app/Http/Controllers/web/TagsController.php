<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function index($tag)
    {
        if ($tag){
            $tours = Tour::searchTour($tag);
        }
        $data['sort'] = '';
        $data['tours'] = $tours;
        return view('web.pages.list')->with($data);
    }
}

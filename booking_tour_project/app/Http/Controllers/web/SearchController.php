<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tour;
use App\Services\HomeService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        if($request['category']) {
            $tours = Tour::searchTourCategory($request['category']);
        }
        if ($request['search']){
            $tours = Tour::searchTour($request['search']);
        }
        $data['sort'] = '';
        $data['tours'] = $tours;
        return view('web.pages.list')->with($data);
    }

    public function autoComplete(Request $request)
    {
        $input = $request->all();
        if ($input['query']) {
            $service = new HomeService();
            $output = $service->fullTextSearch($input);
        }
        return response()->json([
            'output' => $output
        ]);
    }
}

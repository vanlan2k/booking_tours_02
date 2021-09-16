<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\AssessRate;
use App\Models\Review;
use App\Services\LoadMoreService;
use Illuminate\Http\Request;

class LoadMoreController extends Controller
{
    public function review(Request $request)
    {
        if ($request->ajax()) {
            $service = new LoadMoreService();
            $output = $service->getLoadMore($request);
            return response()->json(['output' => $output]);
        }
    }
}

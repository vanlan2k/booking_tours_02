<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\AssessRate;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class RatingCommentController extends Controller
{
    public function comment(Request $request, $id){
        $this->validate(request(), [
           'rating' => "required",
           'comment' =>'required'
        ]);
        try {
            DB::beginTransaction();
            $rating = new AssessRate();
            $comment = new Review();
            $rating->tour_id = $id;
            $rating->customer_id = Auth::user()->id;
            $rating->number_rate = $request->rating;
            $rating->save();

            $comment->tour_id = $id;
            $comment->customer_id = Auth::user()->id;
            $comment->comment = $request->comment;
            $comment->save();
            DB::commit();
            return redirect()->back();
        }
        catch (Exception $e)
        {
            DB::rollBack();
            return redirect()->back()->with(['error' => $e]);
        }
    }
}

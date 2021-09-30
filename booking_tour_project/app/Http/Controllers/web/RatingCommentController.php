<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Http\Requests\web\CommentRatingRequest;
use App\Models\AssessRate;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Mockery\Exception;

class RatingCommentController extends Controller
{
    public function comment(CommentRatingRequest $request, $id){
        try {
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
            return redirect()->back();
        }
        catch (Exception $e)
        {
            return redirect()->back()->with(['error' => __('message.comment_fail')]);
        }
    }
}

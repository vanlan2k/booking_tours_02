<?php

namespace App\Services;

use App\Models\AssessRate;
use App\Models\Review;
use Illuminate\Http\Request;

class LoadMoreService
{
    public function getLoadMore(Request $request)
    {
        if ($request->id) {
            $comments = Review::where('tour_id', $request->id_tour)
                ->where('id', '<', $request->id)
                ->where('status', true)
                ->orderBy('id', 'DESC')
                ->limit(5)
                ->get();
            if ($comments) {
                $rates = AssessRate::where('tour_id', $request->id_tour)
                    ->where('id', '<', $request->id)
                    ->orderBy('id', 'DESC')
                    ->limit(5)
                    ->get();
            }
        } else {
            $comments = Review::where('tour_id', $request->id_tour)
                ->orderBy('id', 'DESC')
                ->where('status', true)
                ->limit(5)
                ->get();
            if ($comments) {
                $rates = AssessRate::where('tour_id', $request->id_tour)
                    ->orderBy('id', 'DESC')
                    ->limit(5)
                    ->get();
            }
        }
        $output = '';
        $last_id = '';
        if (!$comments->isEmpty() && !$rates->isEmpty()) {
            foreach ($rates as $key => $rate) {
                $count = 0;
                $star = "";
                for ($i = 0; $i < $rate->number_rate; $i++) {
                    $star .= '<i class="icon-star voted"></i>';
                    $count += 1;
                }
                for ($i = 0; $i < 5 - $count; $i++) {
                    $star .= '<i class="icon-star-empty"></i>';
                }
                $output .= '<div class="review-box"><figure class="rev-thumb"><img style="border-radius: 50%"src="' . getAvataSingle($rate->user->avata) . '" alt=""></figure><div class="rev-content"><div class="rating">' . $star . '</div><div class="rev-info">' . $rate->user->name . '</div><div class="rev-text" ><p > ' . $comments[$key]->comment . '</p ></div ></div ></div>';
                $last_id = $rate->id;
            }
            $output .= '<div id="load_more"><button class="btn btn-danger justify-content-center" data-id="' . $last_id . '" id="load_more_button" style="color: white">Load More</button></div>';
        } else {
            $output .= '<div id="load_more"></div>';
        }
        return $output;
    }
}

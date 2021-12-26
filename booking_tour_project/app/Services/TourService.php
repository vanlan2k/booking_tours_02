<?php

namespace App\Services;

use App\Models\Tour;

class TourService
{
    public function sortTour($input)
    {
        if ($input == 'popularity') {
            $tours = Tour::popularityTour();
        } elseif ($input == 'price') {
            $tours = Tour::price();
        } elseif ($input == 'priceDesc') {
            $tours = Tour::priceDESC();
        }
        else {
            $tours = Tour::orderBy('id', 'DESC')
                            ->paginate(12);
        }
        return $tours;
    }
}

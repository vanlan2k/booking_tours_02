<?php
namespace App\Services;

use App\Models\Image;
use App\Models\Tour;
use App\Models\TourDetail;
use App\Models\TourRoute;

class AdminService{
    public function createTour($input){
        $tour = Tour::create($input);
        //  create list image
        for ($i = 0; $i < count($input['image']); $i++) {
            $dataInsert = [
                'tour_id' => $tour->id,
                'url' => $input['image'][$i]
            ];
            $images[$i] = $dataInsert;
        }
        Image::insert($images);
        //  create list program
        for ($i = 0; $i < count($input['title']); $i++) {
            $dataInsert = [
                'tour_id' => $tour->id,
                'name' => $input['title'][$i],
                'description' => $input['program'][$i]
            ];
            $program[$i] = $dataInsert;
        }
        TourRoute::insert($program);
        //  create price
        $prices[0] = [
            'tour_id' => $tour->id,
            'price' => $input['child'],
            'age' => '0'
        ];
        $prices[1] = [
            'tour_id' => $tour->id,
            'price' => $input['adult'],
            'age' => '1'
        ];
        TourDetail::insert($prices);
    }
    public function updateTour($input, $id){
        $tour = Tour::find($id);
        getNotFound($input);
        $tour->fill($input);
        $tour->save();
        //  update list image
        Image::where('tour_id', $id)->delete();
        for ($i = 0; $i < count($input['image']); $i++) {
            $dataInsert = [
                'tour_id' => $tour->id,
                'url' => $input['image'][$i]
            ];
            $images[$i] = $dataInsert;
        }
        Image::insert($images);
        //   update list program
        TourRoute::where('tour_id', $id)->delete();
        for ($i = 0; $i < count($input['title']); $i++) {
            $dataInsert = [
                'tour_id' => $tour->id,
                'name' => $input['title'][$i],
                'description' => $input['program'][$i]
            ];
            $program[$i] = $dataInsert;
        }
        TourRoute::insert($program);
        //  update price
        TourDetail::where('tour_id', $id)->delete();
        $prices[0] = [
            'tour_id' => $tour->id,
            'price' => $input['child'],
            'age' => '0'
        ];
        $prices[1] = [
            'tour_id' => $tour->id,
            'price' => $input['adult'],
            'age' => '1'
        ];
        TourDetail::insert($prices);
    }
    public function deleteTour($id){
        $tour = Tour::find($id);
        getNotFound($tour);
        $tour->delete();
        TourDetail::where('tour_id', $id)->delete();
        TourRoute::where('tour_id', $id)->delete();
    }
}

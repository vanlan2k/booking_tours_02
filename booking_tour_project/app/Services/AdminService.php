<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Image;
use App\Models\Tour;
use App\Models\TourDetail;
use App\Models\TourRoute;
use Illuminate\Support\Facades\DB;

class AdminService
{
    public function createTour($input)
    {
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

    public function updateTour($input, Tour $tour, $id)
    {
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

    public function deleteTour(Tour $tour, $id)
    {
        DB::beginTransaction();
        try {
            $tour->tour_detail()->delete();
            $tour->tour_route()->delete();
            $tour->delete();
            DB::commit();
            return response()->json([
                'error' => false,
                'message' => __('admin_tour.delete_ss')
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with([
                'error' => true,
                'message' => __("admin_tour.delete_fail")
            ]);
        }
    }

    public function deleteCate(Category $cate, $id)
    {
        DB::beginTransaction();
        try {
            $tours = $cate->tour;
            foreach ($tours as $tour) {
                $tour->tour_detail()->delete();
                $tour->tour_route()->delete();
            }
            $cate->tour()->delete();
            $cate->delete();
            DB::commit();
            return response()->json([
                'error' => false,
                'message' => __('admin_cate.delete_ss')
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with([
                'error' => true,
                'message' => __("admin_cate.delete_fail")
            ]);
        }
    }
}

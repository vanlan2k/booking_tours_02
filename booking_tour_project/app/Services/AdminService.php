<?php

namespace App\Services;

use App\Jobs\NotificationTourJob;
use App\Jobs\SendCancelTourJobs;
use App\Jobs\SendMail;
use App\Models\Category;
use App\Models\Image;
use App\Models\Tour;
use App\Models\TourDetail;
use App\Models\TourRoute;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class AdminService
{
    public function createTour($input)
    {
        DB::beginTransaction();
        try {
            $input['date_start'] = Carbon::createFromFormat('d/m/Y',$input['date_start']);
            $tour = Tour::create($input);
            //  create list image
            $images = $this->createImage($input, $tour);
            Image::insert($images);
            //  create list program
            $programs = $this->createProgram($input, $tour);
            TourRoute::insert($programs);
            DB::commit();
            dispatch(new NotificationTourJob($tour));
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function updateTour($input, Tour $tour)
    {
        DB::beginTransaction();
        try {
            $input['date_start'] = Carbon::createFromFormat('d-m-Y',$input['date_start']);
            $tour->fill($input);
            $tour->save();
            //  update list image
            Image::where('tour_id', $tour->id)->delete();
            $images = $this->createImage($input, $tour);
            Image::insert($images);
            //   update list program
            TourRoute::where('tour_id', $tour->id)->delete();
            $programs = $this->createProgram($input, $tour);
            TourRoute::insert($programs);
            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function deleteTour(Tour $tour, $id)
    {
        DB::beginTransaction();
        try {
            $tour->delete();
            DB::commit();
            dispatch(new SendCancelTourJobs($tour->id));
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            return false;
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
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    private function createImage($input, $tour)
    {
        for ($i = 0; $i < count($input['image']); $i++) {
            $dataInsert = [
                'tour_id' => $tour->id,
                'url' => $input['image'][$i]
            ];
            $images[$i] = $dataInsert;
        }
        return $images;
    }

    private function createProgram($input, $tour)
    {
        for ($i = 0; $i < count($input['title']); $i++) {
            $dataInsert = [
                'tour_id' => $tour->id,
                'name' => $input['title'][$i],
                'description' => $input['program'][$i]
            ];
            $programs[$i] = $dataInsert;
        }
        return $programs;
    }
}

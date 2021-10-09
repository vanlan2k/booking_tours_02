<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\TourRequest;
use App\Models\Category;
use App\Models\Image;
use App\Models\Tour;
use App\Models\TourDetail;
use App\Models\TourRoute;
use App\Services\AdminService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tours = Tour::orderBy('id')->paginate(10);
        $data['tours'] = $tours;
        return view('admin.pages.tours.list')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $data['categories'] = $categories;
        return view('admin.pages.tours.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(TourRequest $request)
    {
        $input = $request->all();
        DB::beginTransaction();
        try {
            $create = new AdminService();
            $create->createTour($input);
            DB::commit();
            return redirect()->back()->with(['success' => __('admin_tour.add_cc')]);
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with(['error' => __('admin_tour.add_fail')]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tour = Tour::find($id);
        getNotFound($tour);
        $categories = Category::all();
        $data['tour'] = $tour;
        $data['categories'] = $categories;
        return view('admin.pages.tours.detail')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(TourRequest $request, $id)
    {
        $input = $request->all();
        DB::beginTransaction();
        try {
            $tour = $this->findTour($id);
            $update = new AdminService();
            $update->updateTour($input, $tour, $id);
            DB::commit();
            return redirect()->back()->with(['success' => __('admin_tour.ud_ss')]);
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with(['error' => __('admin_tour.ud_fail')]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tour = $this->findTour($id);
        $delete = new AdminService();
        $delete->deleteTour($tour, $id);
    }

    private function findTour($id)
    {
        $tour = Tour::find($id);
        if (!$tour) {
            return abort(404);
        }
        return $tour;
    }
}

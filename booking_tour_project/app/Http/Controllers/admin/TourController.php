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
    public function index(Request $request)
    {
        $categories = Category::all();
        if ($request->search) {
            $tours = Tour::searchTourAdmin($request->search);
        } else {
            $tours = Tour::indexTour($request->category);
        }
        $data['tours'] = $tours;
        $data['cate'] = $request->category;
        $data['categories'] = $categories;
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
        $create = new AdminService();
        $check = $create->createTour($input);
        if ($check) {
            return redirect()->back()->with(['success' => __('admin_tour.add_cc')]);
        } else {
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
        $tour = $this->findTour($id);
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
        $tour = $this->findTour($id);
        $update = new AdminService();
        $check = $update->updateTour($input, $tour, $id);
        if ($check) {
            return redirect()->back()->with(['success' => __('admin_tour.ud_cc')]);
        } else {
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
        $check = $delete->deleteTour($tour, $id);
        if ($check) {
            return response()->json([
                'error' => false,
                'message' => __('admin_tour.delete_ss')
            ]);
        } else {
            return redirect()->back()->with([
                'error' => true,
                'message' => __("admin_tour.delete_fail")
            ]);
        }
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

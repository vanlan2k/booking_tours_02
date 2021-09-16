<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\TourRequest;
use App\Models\Category;
use App\Models\Image;
use App\Models\Tour;
use App\Models\TourDetail;
use App\Models\TourRoute;
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
            $tour = Tour::create($input);
//            create list image
            for ($i = 0; $i < count($input['image']); $i++) {
                $dataInsert = [
                    'tour_id' => $tour->id,
                    'url' => $input['image'][$i]
                ];
                $images[$i] = $dataInsert;
            }
            Image::insert($images);
//          create list program
            for ($i = 0; $i < count($input['title']); $i++) {
                $dataInsert = [
                    'tour_id' => $tour->id,
                    'name' => $input['title'][$i],
                    'description' => $input['program'][$i]
                ];
                $program[$i] = $dataInsert;
            }
            TourRoute::insert($program);
//           create price
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
        $categories = Category::all();
        $data['tour'] = $tour;
        $data['categories'] = $categories;
        return view('admin.pages.tours.detail')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
            $tour = Tour::find($id);
            $tour->fill($input);
            $tour->save();
//            update list image
            Image::where('tour_id', $id)->delete();
            for ($i = 0; $i < count($input['image']); $i++) {
                $dataInsert = [
                    'tour_id' => $tour->id,
                    'url' => $input['image'][$i]
                ];
                $images[$i] = $dataInsert;
            }
            Image::insert($images);
//            update list program
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
//            update price
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
        try {
            Tour::find($id)->delete();
            TourDetail::where('tour_id', $id)->delete();
            TourRoute::where('tour_id', $id)->delete();
            return response()->json([
                'error' => false,
                'message' => __('admin_tour.delete_ss')
            ]);
        }
        catch (Exception $e){
            return redirect()->back()->with([
                'error' => true,
                'message' => __("admin_tour.delete_fail")
            ]);
        }
    }
}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\CategoryRequest;
use App\Models\Category;
use App\Models\Tour;
use App\Models\TourDetail;
use App\Models\TourRoute;
use App\Models\User;
use Illuminate\Http\Request;
use Mockery\Exception;

class ManagerCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'DESC')->paginate(10);
        $data['categories'] = $categories;
        return view('admin.pages.categories.list')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $input = $request->all();
        try {
            Category::create($input);
            return redirect()->route('category.index')->with(['success' => __('admin_cate.add_cc')]);
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => __('admin_cate.add_fail')]);
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
        $cate = Category::find($id);
        if (!$cate) {
            abort(404);
        }
        $data['category'] = $cate;
        return view('admin.pages.categories.detail')->with($data);
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
    public function update(CategoryRequest $request, $id)
    {
        $input = $request->all();
        try {
            $cate = Category::find($id);
            if (!$cate) {
                abort(404);
            }
            $cate->fill($input);
            $cate->save();
            return redirect()->back()->with(['success' => __('admin_cate.ud_cc')]);
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => __('admin_cate.ud_fail')]);
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
            $cate = Category::find($id);
            if (!$cate) {
                abort(404);
            }
            $tour = Tour::where('cate_id', $id)->delete();
            $tours = $cate->tour;
            foreach ($tours as $tour) {
                TourDetail::where('tour_id', $tour->id)->delete();
                TourRoute::where('tour_id', $tour->id)->delete();
            }
            Category::find($id)->delete();
            return response()->json([
                'error' => false,
                'message' => __('admin_cate.delete_ss')
            ]);
        } catch (Exception $e) {
            return redirect()->back()->with([
                'error' => true,
                'message' => __("admin_cate.delete_fail")
            ]);
        }
    }
}

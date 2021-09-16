<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\CategoryRequest;
use App\Models\Category;
use App\Services\AdminService;
use Illuminate\Support\Facades\DB;
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
        $cate = $this->findCategories($id);
        $data['category'] = $cate;
        return view('admin.pages.categories.detail')->with($data);
    }
    public function update(CategoryRequest $request, $id)
    {
        $input = $request->all();
        try {
            $cate = $this->findCategories($id);
            $cate->fill($input);
            $save_cat = $cate->save();
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
        $cate = $this->findCategories($id);
        $cateService = new AdminService();
        $cateService->deleteCate($cate, $id);
    }

    // Function find Categories
    private function findCategories($id)
    {
        $categories = Category::find($id);
        if($categories)
        {
            return $categories;
        }else{
            return abort(404);
        }
    }
}

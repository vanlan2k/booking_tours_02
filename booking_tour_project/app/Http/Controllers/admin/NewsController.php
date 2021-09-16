<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\web\NewsRequest;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::orderBy('id', 'DESC')->paginate(10);
        $data['news'] = $news;
        return view('admin.pages.news.list')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {
        $input = $request->all();
        $input['admin_id'] = Auth::user()->id;
        $output = News::create($input);
        if ($output){
            return redirect()->route('news.index')->with(['success' => __('admin_news.create_cc')]);
        }
        return redirect()->back()->with(['error' => __('admin_news.create_fail')]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $new = News::find($id);
        $data['new'] = $new;
        return view('admin.pages.news.detail')->with($data);
    }
    public function update(NewsRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $input = $request->all();
            $new = $this->findNews($id);
            $new->fill($input);
            $new->save();
            DB::commit();
            return redirect()->route('news.index')->with(['success' => __('admin_news.ud_cc')]);
        }
        catch (Exception $e){
            DB::rollBack();
            return redirect()->back()->with(['error' => __('admin_news.ud_fail')]);
        }
    }
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $new = $this->findNews($id);
            $new->delete();
            DB::commit();
            return response()->json([
                'error' => false,
                'message' => __('admin_news.delete_ss')
            ]);
        }
        catch (Exception $e){
            DB::rollBack();
            return response()->json([
                'error' => true ,
                'message' => __('admin_news.delete_fail')
            ]);
        }
    }
    private function findNews ($id){
        $new = News::find($id);
        if (!$new){
            return abort(404);
        }
        return $new;
    }
}

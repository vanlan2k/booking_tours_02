<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(){
        $news = News::orderBy('id')->paginate(9);
        $data['news'] = $news;
        return view('web.pages.listnews')->with($data);
    }
    public function show($id){
        $new = News::find($id);
        if(!$new){
            abort(404);
        }
        $data['new'] = $new;
        return view('web.pages.detail')->with($data);
    }
}

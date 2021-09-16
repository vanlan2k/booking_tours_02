<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ManagerCommentController extends Controller
{
    public function index()
    {
        $comments = Review::orderBy('id', 'DESC')->paginate(10);
        $data['comments'] = $comments;
        return view('admin.pages.comments.list')->with($data);
    }
    public function show($id)
    {
        $comment = $this->findComment($id);
        $data['comment'] = $comment;
        return view('admin.pages.comments.detail')->with($data);
    }
    private function findComment($id){
        $cmt = Review::find($id);
        if (!$cmt){
            return abort(404);
        }
        return $cmt;
    }
}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Mockery\Exception;

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
    public function update(Request $request, $id){
        try {
            $comment = $this->findComment($id);
            if($request->status == "on"){
                $comment->status = true;
            }
            else{
                $comment->status = false;
            }
            $comment->save();
            return response()->json([
                'error' => false
            ]);
        }
        catch (Exception $e){
            return response()->json([
               'error' => true
            ]);
        }

    }
    private function findComment($id){
        $cmt = Review::find($id);
        if (!$cmt){
            return abort(404);
        }
        return $cmt;
    }
}

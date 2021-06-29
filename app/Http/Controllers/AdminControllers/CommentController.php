<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::all();
        return view('admin.pages.comment.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $deleted = $comment->delete();
        if ($deleted) {
            return response()->json(['message' => 'Xóa thành công!', 'status' => true]);
        }
        return response()->json(['message' => 'Xóa thất bại!', 'status' => false]);
    }

    /**
     * @param Request $request
     * @param $commentId
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateStatus(Request $request, $commentId)
    {
        $comment = Comment::find($commentId);
        $updated = $comment->update(['status' => $request->status]);
        if ($updated) {
            return response()->json(['message' => 'Cập nhập trạng thái thành công!', 'status' => true]);
        }
        return response()->json(['message' => 'Cập nhập trạng thái thất bại!', 'status' => false]);
    }
}

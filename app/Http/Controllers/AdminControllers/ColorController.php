<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Color\StoreRequest;
use App\Models\Color;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colors = Color::all();
        return view('admin.pages.color.index', compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.color.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $created = Color::create($request->all());
        if ($created) {
            return response()->json(['message' => 'Tạo mới thành công!', 'status' => true, 'redirect' => route('colors.index')]);
        }
        return response()->json(['message' => 'Tạo mới thất bại!', 'status' => false]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $color = Color::find($id);
        return view('admin.pages.color.edit', compact('color'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRequest $request, $id)
    {
        $color = Color::find($id);
        $updated = $color->update($request->all());
        if ($updated) {
            return response()->json(['message' => 'Cập nhập thành công!', 'status' => true, 'redirect' => route('colors.index')]);
        }
        return response()->json(['message' => 'Cập nhập thất bại!', 'status' => false]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $color = Color::find($id);
        $deleted = $color->delete();
        if ($deleted) {
            return response()->json(['message' => 'Xóa thành công!', 'status' => true]);
        }
        return response()->json(['message' => 'Xóa thất bại!', 'status' => false]);
    }
}

<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Brand\StoreRequest;
use App\Models\Brand;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        return view('admin.pages.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        if ($request->file !== null) {
            $image = substr($request->file, strlen(url('/uploads')));
            $image = trim($image, '/');
            $request->merge(['logo' => $image]);
        }
        $created = Brand::create($request->all());
        if ($created) {
            return response()->json(['message' => 'Tạo mới thành công!', 'status' => true, 'redirect' => route('brands.index')]);
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
        $brand = Brand::find($id);
        return view('admin.pages.brand.edit', compact('brand'));
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
        if ($request->file !== null) {
            $image = substr($request->file, strlen(url('/uploads')));
            $image = trim($image, '/');
            $request->merge(['logo' => $image]);
        }
        $brand = Brand::find($id);
        $updated = $brand->update($request->all());
        if ($updated) {
            return response()->json(['message' => 'Cập nhập thành công!', 'status' => true, 'redirect' => route('brands.index')]);
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
        $brand = Brand::find($id);
        $deleted = $brand->delete();
        if ($deleted) {
            return response()->json(['message' => 'Xóa thành công!', 'status' => true]);
        }
        return response()->json(['message' => 'Xóa thất bại!', 'status' => false]);
    }

    public function updateStatus(Request $request, $brandId)
    {
        $brand = Brand::find($brandId);
        $updated = $brand->update(['status' => $request->status]);
        if ($updated) {
            return response()->json(['message' => 'Cập nhập trạng thái thành công!', 'status' => true]);
        }
        return response()->json(['message' => 'Cập nhập trạng thái thất bại!', 'status' => false]);
    }
}

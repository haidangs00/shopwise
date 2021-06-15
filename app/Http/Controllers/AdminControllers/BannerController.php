<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Requests\Banner\StoreRequest;
use Carbon\Carbon;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::all();
        return view('admin.pages.banner.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        if ($request->file !== null) {
            $image = substr($request->file, strlen(url('/uploads')));
            $image = trim($image, '/');
            $request->merge(['image' => $image]);
        }
        $request->date_begin = Carbon::parse($request->date_begin)->format('Y-m-d');
        if($request->date_end !== null) {
            $request->date_end = Carbon::parse($request->date_end)->format('Y-m-d');
        }
        $request->merge(['date_begin' => $request->date_begin, 'date_end' => $request->date_end]);
        $created = Banner::create($request->all());
        if ($created) {
            return response()->json(['message' => 'Tạo mới thành công!', 'status' => true, 'redirect' => route('banners.index')]);
        }
        return response()->json(['message' => 'Tạo mới thất bại!', 'status' => false]);
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
        $banner = Banner::find($id);
        return view('admin.pages.banner.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRequest $request, $id)
    {
        if ($request->file !== null) {
            $image = substr($request->file, strlen(url('/uploads')));
            $image = trim($image, '/');
            $request->merge(['image' => $image]);
        }
        $begin = Carbon::parse($request->date_begin)->format('Y-m-d');
        $end = Carbon::parse($request->date_end)->format('Y-m-d');
        $request->merge(['date_begin' => $begin, 'date_end' => $end]);
        $banner = Banner::find($id);
        $updated = $banner->update($request->all());
        if ($updated) {
            return response()->json(['message' => 'Cập nhập thành công!', 'status' => true, 'redirect' => route('banners.index')]);
        }
        return response()->json(['message' => 'Cập nhập thất bại!', 'status' => false]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = Banner::find($id);
        $deleted = $banner->delete();
        if ($deleted) {
            return response()->json(['message' => 'Xóa thành công!', 'status' => true]);
        }
        return response()->json(['message' => 'Xóa thất bại!', 'status' => false]);
    }
    public function updateStatus(Request $request, $bannerId)
    {
        $banner = Banner::find($bannerId);
        $updated = $banner->update(['status' => $request->status]);
        if ($updated) {
            return response()->json(['message' => 'Cập nhập trạng thái thành công!', 'status' => true]);
        }
        return response()->json(['message' => 'Cập nhập trạng thái thất bại!', 'status' => false]);
    }

}

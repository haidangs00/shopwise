<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRequest;
use App\Http\Requests\Admin\UpdateRequest;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::all();
        return view('admin.pages.admin.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.admin.create');
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

            $request->merge(['avatar' => $image]);
        }
        $request->merge(['password' => bcrypt($request->password)]);
        $admin = Admin::create($request->all());

        if ($admin) {
            return response()->json(['message' => 'Tạo mới thành công!', 'status' => true, 'redirect' => route('admins.index')]);
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
        $admin = Admin::find($id);
        return view('admin.pages.admin.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        if ($request->file !== null) {
            $image = substr($request->file, strlen(url('/uploads')));
            $image = trim($image, '/');
            $request->merge(['avatar' => $image]);
        }
        $admin = Admin::find($id);
        $updated = $admin->update($request->all());

        if ($updated) {
            return response()->json(['message' => 'Cập nhập thành công!', 'status' => true, 'redirect' => route('admins.index')]);
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
        $admin = Admin::find($id);
        $deleted = $admin->delete();

        if ($deleted) {
            return response()->json(['message' => 'Xóa thành công!', 'status' => true]);
        }
        return response()->json(['message' => 'Xóa thất bại!', 'status' => false]);
    }

    public function updateStatus(Request $request, $adminId)
    {
        $admin = Admin::find($adminId);
        $updated = $admin->update(['status' => $request->status]);
        if ($updated) {
            return response()->json(['message' => 'Cập nhập trạng thái thành công!', 'status' => true]);
        }
        return response()->json(['message' => 'Cập nhập trạng thái thất bại!', 'status' => false]);
    }
}

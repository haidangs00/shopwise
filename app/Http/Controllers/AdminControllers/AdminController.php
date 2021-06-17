<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRequest;
use App\Http\Requests\Admin\UpdateRequest;
use App\Models\Admin;
use App\Models\AdminRole;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $roles = Role::all();
        return view('admin.pages.admin.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        try {
            DB::beginTransaction();

            //Insert data to admin table
            if ($request->file !== null) {
                $image = substr($request->file, strlen(url('/uploads')));
                $image = trim($image, '/');

                $request->merge(['avatar' => $image]);
            }
            else $request->merge(['avatar' => 'user.png']);
            $request->merge(['password' => bcrypt($request->password)]);
            $admin = Admin::create($request->all());

            //Insert data to admin_role table
            $admin->roles()->attach($request->roles);

            DB::commit();

            return response()->json(['message' => 'Tạo mới thành công!', 'status' => true, 'redirect' => route('admins.index')]);
        } catch (\Exception $ex) {
            DB::rollBack();

            return response()->json(['message' => 'Tạo mới thất bại!', 'status' => false]);
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
        $admin = Admin::find($id);
        $roles = Role::all();
        $admin_roles = DB::table('admin_role')->where('admin_id', $id)->pluck('role_id')->toArray();
        return view('admin.pages.admin.edit', compact('admin', 'roles', 'admin_roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            //Update data to admin table
            if ($request->file !== null) {
                $image = substr($request->file, strlen(url('/uploads')));
                $image = trim($image, '/');
                $request->merge(['avatar' => $image]);
            }
            $admin = Admin::find($id);
            $admin->update($request->all());

            //Update data to admin_role table
            DB::table('admin_role')->where('admin_id', $id)->delete();
            $admin->roles()->attach($request->roles);

            DB::commit();

            return response()->json(['message' => 'Cập nhập thành công!', 'status' => true, 'redirect' => route('admins.index')]);
        } catch (\Exception $ex) {
            DB::rollBack();

            return response()->json(['message' => 'Cập nhập thất bại!', 'status' => false]);
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
        try {
            DB::beginTransaction();

            // Delete admin
            $admin = Admin::find($id);
            $admin->delete();

            // Delete roles of admin in admin_role table
            $admin->roles()->detach();
            DB::commit();

            return response()->json(['message' => 'Xóa thành công!', 'status' => true]);
        } catch (\Exception $ex) {
            DB::rollBack();

            return response()->json(['message' => 'Xóa thất bại!', 'status' => false]);
        }
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

<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Role\StoreRequest;
use App\Models\Permission;
use App\Models\Permissions;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('admin.pages.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('admin.pages.role.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        try {
            DB::beginTransaction();

            //Insert data to role table
            $role = Role::create($request->all());

            //Insert data to role_permission table
            $role->permissions()->attach($request->permissions);

            DB::commit();

            return response()->json(['message' => 'Tạo mới thành công!', 'status' => true, 'redirect' => route('roles.index')]);
        } catch (\Exception $ex) {
            DB::rollBack();

            return response()->json(['message' => 'Tạo mới thất bại!', 'status' => false]);
        }
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
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        $role_permissions = DB::table('role_permission')->where('role_id', $id)->pluck('permission_id')->toArray();
        return view('admin.pages.role.edit', compact('role', 'permissions', 'role_permissions'));
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
        try {
            DB::beginTransaction();

            //Update data to role table
            $role = Role::findOrFail($id);
            $role->update($request->only('name', 'display_name'));

            //Update data to role_permission table
//            DB::table('role_permission')->where('role_id', $id)->delete();
            $role->permissions()->detach();
            $role->permissions()->attach($request->permissions);

            DB::commit();

            return response()->json(['message' => 'Cập nhập thành công!', 'status' => true, 'redirect' => route('roles.index')]);
        } catch (\Exception $ex) {
            DB::rollBack();

            return response()->json(['message' => 'Cập nhập thất bại!', 'status' => false]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            // Delete role
            $role = Role::findOrFail($id);
            $role->delete();

            // Delete permissions of role in role_permission table
            $role->permissions()->detach();
            DB::commit();

            return response()->json(['message' => 'Xóa thành công!', 'status' => true]);
        } catch (\Exception $ex) {
            \Log::error("Lỗi: " . $ex->getMessage());
            DB::rollBack();
            return response()->json(['message' => 'Xóa thất bại!', 'status' => false]);
        }
    }
}

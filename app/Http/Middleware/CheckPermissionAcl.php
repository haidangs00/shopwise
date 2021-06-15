<?php

namespace App\Http\Middleware;

use App\Models\Admin;
use App\Models\Permission;
use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

class CheckPermissionAcl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $permission = null)
    {
        // Lấy tất cả các quyền khi quản trị viên đăng nhập vào hệ thống
        // 1. Lấy tất cả các role của quản trị viên
        $adminId = Auth::guard('admin')->user()->id;
        $listRoleOfAdmin = Admin::find($adminId)->roles()->select('roles.id')->pluck('id')->toArray();

        // 2. Lấy tất cả các permission của quản trị viên
        $listPermissionOfAdmin = DB::table('roles')
            ->join('role_permission', 'roles.id', '=', 'role_permission.role_id')
            ->join('permissions', 'role_permission.permission_id', '=', 'permissions.id')
            ->whereIn('role_id', $listRoleOfAdmin)
            ->select('permissions.*')
            ->get()->pluck('id')->unique();

        // 3. Lấy quyền của route để check phân quyền
        $checkPermission = Permission::where('name', $permission)->value('id');
        if($listPermissionOfAdmin->contains($checkPermission)) {
            return $next($request);
        }
        return abort(401);
    }
}

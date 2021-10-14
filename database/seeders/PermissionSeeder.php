<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->delete();
        DB::table('permissions')->insert([
            ['name' => 'user', 'display_name' => 'Quản lý khách hàng'],
            ['name' => 'admin', 'display_name' => 'Quản lý quản trị viên'],
            ['name' => 'role', 'display_name' => 'Phân quyền'],
            ['name' => 'manager', 'display_name' => 'Quản lý các danh mục'],

        ]);
    }
}

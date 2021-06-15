<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->truncate();
        DB::table('roles')->insert([
            ['name' => 'root', 'display_name' => 'Root'],
            ['name' => 'admin', 'display_name' => 'Quản trị viên'],
            ['name' => 'writer', 'display_name' => 'Người viết bài'],

        ]);
    }
}

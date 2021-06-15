<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin_role')->truncate();
        DB::table('admin_role')->insert([
            ['admin_id' => 1, 'role_id' => 1],
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->truncate();
        DB::table('admins')->insert([
            ['name' => 'Root', 'phone' => '123456789', 'status' => 1, 'user_name' => 'root', 'password' => bcrypt(1)],
        ]);
    }
}

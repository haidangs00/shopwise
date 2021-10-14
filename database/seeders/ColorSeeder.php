<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('colors')->delete();
        DB::table('colors')->insert([
            ['name' => 'Màu đen', 'color_code' => '#0000'],
            ['name' => 'Màu đỏ', 'color_code' => '#ff0000'],
            ['name' => 'Màu xanh lá', 'color_code' => '#05f515'],
            ['name' => 'Màu xanh dương', 'color_code' => '#0d09f1'],
            ['name' => 'Màu hồng', 'color_code' => '#dc94e5'],
            ['name' => 'Màu vàng', 'color_code' => '#f3f613'],
        ]);
    }
}

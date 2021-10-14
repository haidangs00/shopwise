<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banners')->delete();
        DB::table('banners')->insert([
            ['name' => 'Thời trang nữ', 'image' => 'banner1.jpg', 'note' => 'Giảm ngay 50% trong ngày hôm nay!', 'status' => 1, 'date_end' => '2022-09-28'],
            ['name' => 'Thời trang nam', 'image' => 'banner2.jpg', 'note' => 'Giảm ngay 50% trong ngày hôm nay!', 'status' => 1, 'date_end' => '2022-09-28'],

        ]);
    }
}

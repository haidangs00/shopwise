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
        DB::table('banners')->truncate();
        DB::table('banners')->insert([
            ['name' => 'Woman Fashion', 'image' => 'banner1.jpg', 'note' => 'Get up to 50% off Today Only!', 'status' => 1],
            ['name' => 'Man Fashion', 'image' => 'banner2.jpg', 'note' => 'Get up to 50% off Today Only!', 'status' => 1],

        ]);
    }
}

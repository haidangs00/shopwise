<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();
        DB::table('categories')->insert([
            ['name' => 'Thời trang nữ', 'slug' => 'thoi-trang-nam'],
            ['name' => 'Thời trang nam', 'slug' => 'thoi-trang-nu'],
            ['name' => 'Thời trang trẻ em', 'slug' => 'thoi-trang-tre-em'],

        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Color;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_size')->delete();
        // Get all the sizes attaching up to 3 random sizes to each product
        $colors = Color::all();

        // Populate the pivot table
        Product::all()->each(function ($product) use ($colors) {
            $product->colors()->attach(
                $colors->random(rand(1, 4))->pluck('id')->toArray()
            );
        });
    }
}

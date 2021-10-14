<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Size;

class ProductSizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_size')->truncate();
        // Get all the sizes attaching up to 3 random sizes to each product
        $sizes = Size::all();

        // Populate the pivot table
        Product::all()->each(function ($product) use ($sizes) {
            $product->sizes()->attach(
                $sizes->random(rand(1, 5))->pluck('id')->toArray()
            );
        });
    }
}

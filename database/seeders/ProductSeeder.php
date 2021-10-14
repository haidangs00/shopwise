<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->delete();
        DB::table('products')->insert([
            ['name' => 'Váy hoạ tiết hoa cho phụ nữ', 'image' => 'product_img1.jpg', 'category_id' => 1, 'brand_id' => 1, 'regular_price' => 120000, 'promotional_price' => 100000, 'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. At dicta fuga fugit magni nam omnis quam quos! Alias atque blanditiis debitis ea, explicabo ipsam laborum perferendis perspiciatis quo sapiente, sint.', 'status' => 1],
            ['name' => 'Vest da cho nam', 'image' => 'product_img2.jpg', 'category_id' => 1, 'brand_id' => 1, 'regular_price' => 150000, 'promotional_price' => 110000, 'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. At dicta fuga fugit magni nam omnis quam quos! Alias atque blanditiis debitis ea, explicabo ipsam laborum perferendis perspiciatis quo sapiente, sint.', 'status' => 1],
            ['name' => 'Váy đầm cho nữ', 'image' => 'product_img3.jpg', 'category_id' => 1, 'brand_id' => 1, 'regular_price' => 170000, 'promotional_price' => 100000, 'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. At dicta fuga fugit magni nam omnis quam quos! Alias atque blanditiis debitis ea, explicabo ipsam laborum perferendis perspiciatis quo sapiente, sint.', 'status' => 1],
            ['name' => 'Áo sơ mi cho trẻ', 'image' => 'product_img4.jpg', 'category_id' => 3, 'brand_id' => 1, 'regular_price' => 160000, 'promotional_price' => 100000, 'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. At dicta fuga fugit magni nam omnis quam quos! Alias atque blanditiis debitis ea, explicabo ipsam laborum perferendis perspiciatis quo sapiente, sint.', 'status' => 1],
            ['name' => 'Váy dài phụ nữ', 'image' => 'product_img5.jpg', 'category_id' => 1, 'brand_id' => 1, 'regular_price' => 180000, 'promotional_price' => 100000, 'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. At dicta fuga fugit magni nam omnis quam quos! Alias atque blanditiis debitis ea, explicabo ipsam laborum perferendis perspiciatis quo sapiente, sint.', 'status' => 1],
            ['name' => 'Áo sơ mi kẻ caro', 'image' => 'product_img6.jpg', 'category_id' => 2, 'brand_id' => 2, 'regular_price' => 140000, 'promotional_price' => 100000, 'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. At dicta fuga fugit magni nam omnis quam quos! Alias atque blanditiis debitis ea, explicabo ipsam laborum perferendis perspiciatis quo sapiente, sint.', 'status' => 1],
            ['name' => 'Váy kẻ sọc phụ nữ', 'image' => 'product_img7.jpg', 'category_id' => 1, 'brand_id' => 2, 'regular_price' => 130000, 'promotional_price' => 110000, 'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. At dicta fuga fugit magni nam omnis quam quos! Alias atque blanditiis debitis ea, explicabo ipsam laborum perferendis perspiciatis quo sapiente, sint.', 'status' => 1],
            ['name' => 'Áo khoác bò cho nam', 'image' => 'product_img8.jpg', 'category_id' => 2, 'brand_id' => 2, 'regular_price' => 120000, 'promotional_price' => 110000, 'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. At dicta fuga fugit magni nam omnis quam quos! Alias atque blanditiis debitis ea, explicabo ipsam laborum perferendis perspiciatis quo sapiente, sint.', 'status' => 1],
            ['name' => 'Áo thun cho nữ', 'image' => 'product_img9.jpg', 'category_id' => 1, 'brand_id' => 2, 'regular_price' => 160000, 'promotional_price' => 140000, 'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. At dicta fuga fugit magni nam omnis quam quos! Alias atque blanditiis debitis ea, explicabo ipsam laborum perferendis perspiciatis quo sapiente, sint.', 'status' => 1],
            ['name' => 'Áo khoác sơ mi nam', 'image' => 'product_img10.jpg', 'category_id' => 2, 'brand_id' => 2, 'regular_price' => 110000, 'promotional_price' => 10000, 'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. At dicta fuga fugit magni nam omnis quam quos! Alias atque blanditiis debitis ea, explicabo ipsam laborum perferendis perspiciatis quo sapiente, sint.', 'status' => 1],
            ['name' => 'Áo thun Tuxedo cho nữ', 'image' => 'product_img12.jpg', 'category_id' => 1, 'brand_id' => 3, 'regular_price' => 190000, 'promotional_price' => 150000, 'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. At dicta fuga fugit magni nam omnis quam quos! Alias atque blanditiis debitis ea, explicabo ipsam laborum perferendis perspiciatis quo sapiente, sint.', 'status' => 1],
            ['name' => 'Váy đen cho phụ nữ', 'image' => 'product_img11.jpg', 'category_id' => 1, 'brand_id' => 3, 'regular_price' => 220000, 'promotional_price' => 100000, 'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. At dicta fuga fugit magni nam omnis quam quos! Alias atque blanditiis debitis ea, explicabo ipsam laborum perferendis perspiciatis quo sapiente, sint.', 'status' => 1],
            ['name' => 'Váy hoạ tiết chấm bi', 'image' => 'product_img13.jpg', 'category_id' => 1, 'brand_id' => 3, 'regular_price' => 320000, 'promotional_price' => 200000, 'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. At dicta fuga fugit magni nam omnis quam quos! Alias atque blanditiis debitis ea, explicabo ipsam laborum perferendis perspiciatis quo sapiente, sint.', 'status' => 1],
            ['name' => 'Áo thun cho nam', 'image' => 'product_img14.jpg', 'category_id' => 2, 'brand_id' => 3, 'regular_price' => 420000, 'promotional_price' => 300000, 'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. At dicta fuga fugit magni nam omnis quam quos! Alias atque blanditiis debitis ea, explicabo ipsam laborum perferendis perspiciatis quo sapiente, sint.', 'status' => 1],
            ['name' => 'Váy cho trẻ em', 'image' => 'product_img15.jpg', 'category_id' => 3, 'brand_id' => 3, 'regular_price' => 620000, 'promotional_price' => 500000, 'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. At dicta fuga fugit magni nam omnis quam quos! Alias atque blanditiis debitis ea, explicabo ipsam laborum perferendis perspiciatis quo sapiente, sint.', 'status' => 1],
        ]);
    }
}

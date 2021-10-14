<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payments')->delete();
        DB::table('payments')->insert([
            ['name' => 'COD', 'description' => 'Thanh toán khi nhận hàng', 'status' => '1'],
            ['name' => 'MOMO', 'description' => 'Thanh toán bằng MOMO', 'status' => '1'],
            ['name' => 'Paypal', 'description' => 'Sử dụng phương thức thanh toán Paypal', 'status' => '1'],
        ]);
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->integer('total_quantity');
            $table->integer('total_price');
            $table->text('description')->nullable();
            $table->tinyInteger('status')->default(0)->comment('processing:0, shipping:1 , finish: 2 ,cancelled:3');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('payment_id')->constrained('payments');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('image')->nullable();
            $table->mediumText('text')->nullable();
            $table->text('full_order');
            $table->float('customer_price', 10, 2)->nullable();
            $table->float('shop_price', 10, 2)->nullable();
            $table->float('discount', 10, 2)->nullable();
            $table->date('order_date')->nullable();
            $table->date('delivery_date')->nullable();
            $table->string('status', 20)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

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
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->string('order_code');
            $table->unsignedBigInteger('store_id');
            $table->unsignedBigInteger('payment_id');
            $table->unsignedBigInteger('order_details_id');
            $table->integer('total');
            $table->float('discount');
            $table->unsignedBigInteger('coupon_id');
            $table->unsignedBigInteger('delivery_id');
            $table->unsignedBigInteger('account_id');
            $table->tinyInteger('order_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};

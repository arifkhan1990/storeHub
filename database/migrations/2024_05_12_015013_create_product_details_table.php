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
        Schema::create('product_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->string('product_details_code');
            $table->text('product_desc');
            $table->json('product_pic');
            $table->json('product_color');
            $table->json('product_size');
            $table->json('product_price');
            $table->string('product_video')->nullable();
            $table->boolean('product_status');
            $table->json('variants');
            $table->integer('stock')->default(0);
            $table->tinyInteger('stock_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_details');
    }
};

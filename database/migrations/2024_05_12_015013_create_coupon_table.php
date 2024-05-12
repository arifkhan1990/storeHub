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
        Schema::create('coupon', function (Blueprint $table) {
            $table->id();
            $table->string('coupon_code')->unique();
            $table->unsignedBigInteger('store_id');
            $table->json('benefit');
            $table->timestamp('coupon_expire_date');
            $table->timestamp('coupon_active_date');
            $table->tinyInteger('coupon_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupon');
    }
};

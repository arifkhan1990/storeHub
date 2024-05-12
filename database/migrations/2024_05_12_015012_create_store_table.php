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
        Schema::create('store', function (Blueprint $table) {
            $table->id();
            $table->string('store_code');
            $table->string('store_name')->unique();
            $table->string('store_type');
            $table->text('store_desc');
            $table->unsignedBigInteger('created_by');
            $table->json('store_email');
            $table->json('store_physical_address');
            $table->json('store_phone');
            $table->json('fb_page_link');
            $table->json('instagram_page_link');
            $table->json('tiktok_page_like');
            $table->json('linkedin_page_link');
            $table->string('store_bio');
            $table->string('business_tin');
            $table->json('owner_details');
            $table->boolean('store_status');
            $table->string('store_pic');
            $table->tinyInteger('priority')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('store');
    }
};

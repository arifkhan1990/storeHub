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
        Schema::create('delivery_service_provider', function (Blueprint $table) {
            $table->id();
            $table->string('provider_code')->unique();
            $table->unsignedBigInteger('store_id');
            $table->json('provider_details');
            $table->tinyInteger('provider_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivery_service_provider');
    }
};

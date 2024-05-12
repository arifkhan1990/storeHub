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
        Schema::create('delivery_info', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->json('delivery_location');
            $table->string('delivery_receiver');
            $table->string('receiver_phone');
            $table->timestamp('sending_time');
            $table->timestamp('receiving_time');
            $table->tinyInteger('delivery_status');
            $table->string('delivery_code');
            $table->unsignedBigInteger('delivery_service_provider_id');
            $table->double('delivery_charge');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivery_info');
    }
};

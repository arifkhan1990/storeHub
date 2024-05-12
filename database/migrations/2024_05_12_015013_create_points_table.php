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
        Schema::create('points', function (Blueprint $table) {
            $table->id();
            $table->string('point_title');
            $table->integer('total_point')->default(0);
            $table->integer('current_point')->default(0);
            $table->integer('use_point')->default(0);
            $table->unsignedBigInteger('account_id');
            $table->string('point_code');
            $table->tinyInteger('point_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('points');
    }
};

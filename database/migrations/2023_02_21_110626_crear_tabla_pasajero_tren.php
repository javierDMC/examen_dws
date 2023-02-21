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
        Schema::create('pasajero_tren', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pasajero_id');
            $table->unsignedBigInteger('tren_id');
            $table->timestamps();
            $table->foreign('pasajero_id')->references('id')->on('pasajeros');
            $table->foreign('tren_id')->references('id')->on('trens');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasajero_tren');
    }
};

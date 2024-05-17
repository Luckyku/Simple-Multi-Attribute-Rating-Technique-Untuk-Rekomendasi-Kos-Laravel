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
        Schema::create('nilai_utilities', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kos_id')->unique();
            $table->float('harga')->nullable();
            $table->float('fasilitas')->nullable();
            $table->float('jarak')->nullable();
            $table->float('luas')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_utilities');
    }
};

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
        Schema::create('kos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('luas_id');
            $table->foreignId('tipe_id');
            $table->string('slug')->unique()->require;
            $table->string('nama');
            $table->bigInteger('harga');
            $table->string('alamat');
            $table->bigInteger('fasilitas');
            $table->double('jarak',8 , 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kos');
    }
};

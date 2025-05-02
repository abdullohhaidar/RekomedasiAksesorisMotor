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
        Schema::create('velg', function (Blueprint $table) {
            $table->integer('id_velg', true);
            $table->string('nama_velg', 250);
            $table->string('merk_velg', 250);
            $table->integer('harga_velg');
            $table->string('ukuran_velg', 250);
            $table->string('material_velg', 250);
            $table->string('warna_velg', 250);
            $table->string('brand_velg', 250);
            $table->string('model_velg', 250);
            $table->string('gambar_velg', 250);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('velg');
    }
};

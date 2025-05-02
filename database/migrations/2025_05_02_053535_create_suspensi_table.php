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
        Schema::create('suspensi', function (Blueprint $table) {
            $table->integer('id_suspensi', true);
            $table->string('nama_suspensi', 250);
            $table->string('merk_suspensi', 250);
            $table->integer('harga_suspensi');
            $table->string('ukuran_suspensi', 250);
            $table->string('tipe_motor', 250);
            $table->string('warna_suspensi', 250);
            $table->string('model_suspensi', 250);
            $table->string('gambar_suspensi', 250);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suspensi');
    }
};

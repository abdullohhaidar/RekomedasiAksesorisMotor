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
        Schema::create('ban', function (Blueprint $table) {
            $table->integer('id_ban', true);
            $table->string('nama_ban', 250);
            $table->string('merk_ban', 250);
            $table->integer('harga_ban');
            $table->string('ukuran_ban', 250);
            $table->string('tipe_ban', 250);
            $table->string('tipe_motor', 250);
            $table->string('model_ban', 250);
            $table->string('gambar_ban', 250);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ban');
    }
};

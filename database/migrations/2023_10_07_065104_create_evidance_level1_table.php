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
        Schema::create('evidance_level1', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_detaillvl1');
            $table->string('nama_gambar');
            $table->string('path_gambar');
            $table->timestamps();
            // Menambahkan foreign key untuk menghubungkan dengan tabel detaillvl1
            $table->foreign('id_detaillvl1')->references('id')->on('detail_level1')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evidance_level1');
    }
};

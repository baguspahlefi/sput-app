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
        Schema::create('daftar_hadir_2', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_daftar_hadir');
            $table->string('nama');
            $table->string('pic');
            $table->timestamps();

            $table->foreign('id_daftar_hadir')->references('id')->on('meeting_level1')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftar_hadir_2
        ');
    }
};

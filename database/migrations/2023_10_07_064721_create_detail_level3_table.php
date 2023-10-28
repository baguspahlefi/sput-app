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
        Schema::create('detail_level3', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_meeting');
            $table->string('point_of_meeting');
            $table->string('pic');
            $table->date('due');
            $table->string('status');
            $table->timestamps();
            
            $table->foreign('id_meeting')->references('id')->on('meeting_level3')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_level3');
    }
};

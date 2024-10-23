<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('room_availabilities', function (Blueprint $table) {
        $table->id('id');
        $table->foreignId('room_id')->constrained('rooms')->onDelete('cascade');
        $table->date('date');
        $table->time('available_from');
        $table->time('available_to');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_availabilities');
    }
};
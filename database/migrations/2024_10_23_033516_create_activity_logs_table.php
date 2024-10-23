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
    Schema::create('activity_logs', function (Blueprint $table) {
        $table->id('id_logs');
        $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
        $table->foreignId('reservation_id')->constrained('reservations')->onDelete('cascade');
        $table->string('action');
        $table->text('details')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_logs');
    }
};
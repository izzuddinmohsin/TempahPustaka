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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('bookingID');
            $table->unsignedBigInteger('userID')->nullable();
            $table->foreign('userID')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('roomID')->nullable();
            $table->foreign('roomID')->references('id')->on('rooms')->onDelete('cascade');
            $table->date('startDate');
            $table->date('endDate');
            $table->time('startTime');
            $table->time('endtTime');
            $table->text('purpose')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};

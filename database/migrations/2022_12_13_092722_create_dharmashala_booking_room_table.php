<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dharmashala_booking_room', function (Blueprint $table) {
            $table->unsignedBigInteger('dharmashala_booking_id');
            $table->foreign('dharmashala_booking_id')->references('id')->on('dharmashala_bookings')->cascadeOnDelete();
            $table->unsignedBigInteger('room_id');
            $table->foreign('room_id')->references('id')->on('rooms')->cascadeOnDelete();
            $table->boolean('status')->default(0);
            $table->string('payment_receipt')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking_room');
    }
};

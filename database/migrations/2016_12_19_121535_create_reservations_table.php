<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('room_detail_id')->nullable();
            $table->unsignedInteger('customer_id')->nullable();
            $table->date('checkin');
            $table->date('checkout');
            $table->integer('day');
            $table->string('payment');
            $table->integer('extrabed');
            $table->integer('total');
            $table->boolean('status')->default(0);
            $table->timestamps();

            $table->foreign('room_detail_id')->references('id')->on('room_details')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('customer_id')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    public function down()
    {
        Schema::drop('reservations');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestoPesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resto_pesanans', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('room_detail_id')->nullable();
            $table->unsignedInteger('reservation_id')->nullable();
            $table->timestamps();

            $table->foreign('room_detail_id')->references('id')->on('room_details')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('reservation_id')->references('id')->on('reservations')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('resto_pesanans');
    }
}

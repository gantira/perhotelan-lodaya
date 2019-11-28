<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLaundrysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laundrys', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('room_detail_id')->nullable();
            $table->unsignedInteger('reservation_id')->nullable();
            $table->date('tanggal_selesai');
            $table->time('jam_selesai');
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
        Schema::drop('laundrys');
    }
}

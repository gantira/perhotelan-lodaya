<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestoPesananDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resto_pesanan_details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('resto_pesanan_id')->nullable();
            $table->unsignedInteger('room_detail_id')->nullable();
            $table->unsignedInteger('resto_id')->nullable();
            $table->integer('harga');
            $table->timestamps();

            $table->foreign('resto_pesanan_id')->references('id')->on('resto_pesanans')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('room_detail_id')->references('id')->on('room_details')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('resto_id')->references('id')->on('restos')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('resto_pesanan_details');
    }
}

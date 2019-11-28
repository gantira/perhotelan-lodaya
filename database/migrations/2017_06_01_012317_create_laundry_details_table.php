<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLaundryDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laundry_details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('laundry_id')->nullable();
            $table->unsignedInteger('room_detail_id')->nullable();
            $table->unsignedInteger('jenis')->nullable();
            $table->integer('jumlah');
            $table->integer('harga');
            $table->integer('subtotal');
            $table->timestamps();

            $table->foreign('laundry_id')->references('id')->on('laundrys')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('jenis')->references('id')->on('laundry_settings')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('room_detail_id')->references('id')->on('room_details')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('laundry_details');
    }
}

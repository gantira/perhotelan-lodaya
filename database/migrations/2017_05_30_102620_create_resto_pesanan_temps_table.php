<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestoPesananTempsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resto_pesanan_temps', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('resto_id')->nullable();
            $table->integer('harga');
            $table->timestamps();

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
        Schema::drop('resto_pesanan_temps');
    }
}

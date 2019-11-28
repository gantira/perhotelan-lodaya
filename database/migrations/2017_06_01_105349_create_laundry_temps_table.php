<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLaundryTempsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laundry_temps', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('jumlah');
            $table->unsignedInteger('jenis')->nullable();
            $table->integer('harga');
            $table->integer('subtotal');
            $table->timestamps();
            
            $table->foreign('jenis')->references('id')->on('laundry_settings')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('laundry_temps');
    }
}

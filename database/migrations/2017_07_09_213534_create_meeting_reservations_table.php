<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeetingReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meeting_reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('meeting_id')->nullable();
            $table->unsignedInteger('customer_id')->nullable();
            $table->date('checkin');
            $table->time('jam');
            $table->string('payment');
            $table->integer('total');
            $table->timestamps();

            $table->foreign('meeting_id')->references('id')->on('meetings')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('meeting_reservations');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parks', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('vehicle_id');
            $table->foreign('vehicle_id')->references('id')->on('vehicles');

            $table->unsignedBigInteger('slot_id');
            $table->foreign('slot_id')->references('id')->on('slots');

            $table->string('customer_name');
            $table->string('customer_phone')->nullable();

            $table->timestamp('parking_time');
            $table->timestamp('leave_time')->nullable();
            $table->string('status')->default('in_parking'); //['in_parking', 'leaved']
            $table->double('charge');

            $table->unsignedBigInteger('recived_by');
            $table->foreign('recived_by')->references('id')->on('users');

            $table->unsignedBigInteger('leaved_by')->nullable();
            $table->foreign('leaved_by')->references('id')->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parks');
    }
}

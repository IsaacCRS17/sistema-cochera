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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement();
            $table->string('model');
            $table->string('placa');
            $table->enum('state', ['ACTIVE', 'DELETE'])->default('ACTIVE');

            $table->integer('vehicletype_id')->unsigned();
            $table->foreign('vehicletype_id')->references('id')->on('vehicle_types');

            $table->integer('personas_id')->unsigned();
            $table->foreign('personas_id')->references('id')->on('personas');

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
        Schema::dropIfExists('vehicle');
    }
};

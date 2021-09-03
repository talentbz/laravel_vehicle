<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('company_id');
            $table->string('car_category');
            $table->string('car_name');
            $table->string('area');
            $table->string('model');
            $table->string('body_number');
            $table->string('engine_model');
            $table->string('displacement');
            $table->string('fule');
            $table->string('mission');
            $table->string('shape');
            $table->string('class');
            $table->string('max_capacity');
            $table->string('loading_capacity');
            $table->bigInteger('mileage');
            $table->string('require_path');
            $table->string('start_year');
            $table->string('start_month');
            $table->string('end_year')->nullable();
            $table->string('end_month')->nullable();
            //$table->boolean('car_check');
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
}

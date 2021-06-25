<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleEquipment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_equipment', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('vehicle_id');
            $table->boolean('power_set')->default(0);
            $table->boolean('power_window')->default(0);
            $table->boolean('air_set')->default(0);
            $table->boolean('door_set')->default(0);
            $table->boolean('etc_set')->default(0);
            $table->boolean('tacograph_set')->default(0);
            $table->boolean('adblue_set')->default(0);
            $table->boolean('air_sus_set')->default(0);
            $table->boolean('leaf_sus_set')->default(0);
            $table->boolean('cruise_set')->default(0);
            $table->boolean('hill_set')->default(0);
            $table->boolean('redtarder_set')->default(0);
            $table->boolean('lane_set')->default(0);
            $table->boolean('disc_set')->default(0);
            $table->boolean('air_bag_set')->default(0);
            $table->boolean('abs_set')->default(0);
            $table->boolean('asr_set')->default(0);
            $table->boolean('camera_set')->default(0);
            $table->boolean('immobilizer_set')->default(0);
            $table->boolean('dvd_set')->default(0);
            $table->boolean('cd_set')->default(0);
            $table->boolean('md_set')->default(0);
            $table->boolean('radio_set')->default(0);
            $table->boolean('navigation_set')->default(0);
            $table->boolean('tv_set')->default(0);
            $table->boolean('repaire_set')->default(0);
            $table->boolean('owner_set')->default(0);
            $table->boolean('unused_set')->default(0);
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
        Schema::dropIfExists('vehicle_equipment');
    }
}

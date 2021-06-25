<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleEquipment extends Model
{
    use HasFactory;
    protected $table = 'vehicle_equipment';
    protected $fillable = [
        'id',
        'vehicle_id',
        'power_set',
        'power_window',
        'air_set',
        'door_set',
        'etc_set',
        'tacograph_set',
        'adblue_set',
        'air_sus_set',
        'leaf_sus_set',
        'cruise_set',
        'redtarder_set',
        'lane_set',
        'disc_set',
        'air_bag_set',
        'abs_set',
        'asr_set',
        'camera_set',
        'immobilizer_set',
        'dvd_set',
        'cd_set',
        'md_set',
        'radio_set',
        'navigation_set',
        'tv_set',
        'repaire_set',
        'owner_set',
        'unused_set',
        'created_at',
        'updated_at',
    ];
    protected $casts = [
        'is_featured' => 'boolean',
        'vehicle_id'=> 'boolean',
        'power_set'=> 'boolean',
        'air_set'=> 'boolean',
        'door_set'=> 'boolean',
        'etc_set'=> 'boolean',
        'tacograph_set'=> 'boolean',
        'adblue_set'=> 'boolean',
        'air_sus_set'=> 'boolean',
        'leaf_sus_set'=> 'boolean',
        'cruise_set'=> 'boolean',
        'redtarder_set'=> 'boolean',
        'lane_set'=> 'boolean',
        'disc_set'=> 'boolean',
        'air_bag_set'=> 'boolean',
        'abs_set' => 'boolean',
        'asr_set' => 'boolean',
        'camera_set' => 'boolean',
        'immobilizer_set' => 'boolean',
        'dvd_set' => 'boolean',
        'cd_set' => 'boolean',
        'md_set' => 'boolean',
        'radio_set' => 'boolean',
        'navigation_set' => 'boolean',
        'tv_set' => 'boolean',
        'repaire_set' => 'boolean',
        'owner_set' => 'boolean',
        'unused_set' => 'boolean',
    ];
}

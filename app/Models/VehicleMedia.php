<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleMedia extends Model
{
    use HasFactory;
    protected $table = 'vehicle_media';
    protected $fillable = [
        'id',
        'vehicle_id',
        'car_path',
        'created_at',
        'updated_at',
    ];
}

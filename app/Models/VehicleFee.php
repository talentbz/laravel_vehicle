<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleFee extends Model
{
    use HasFactory;
    protected $table = 'vehicle_fee';
    protected $fillable = [
        'id',
        'vehicle_id',
        'fee',
        'taxExc_price',
        'taxInc_price',
        'note',
        'created_at',
        'updated_at',
    ];
    // protected $casts = [
    //     'taxExc_price' => 'integer',
    //     'fee' => 'integer',
    //     'taxInc_price' => 'integer',
    // ];
}

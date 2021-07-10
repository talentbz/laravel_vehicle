<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB, Validator, Exception;

class Vehicle extends Model
{
    use HasFactory;
    protected $table = 'vehicle';
    protected $fillable = [
        'id',
        'company_id',
        'car_category',
        'car_name',
        'area',
        'model',
        'body_number',
        'engine_model',
        'displacement',
        'fule',
        'mission',
        'shape',
        'class',
        'max_capacity',
        'mileage',
        'require_path',
        'start_year',
        'start_month',
        'end_year',
        'end_month',
        'created_at',
        'updated_at',
    ];
    public function getNextId() {
        $statement = DB::vehicle("id");
        return $statement[0]->Auto_increment;
    }
}

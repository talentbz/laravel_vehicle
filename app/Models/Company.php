<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $table = 'company_details';
    protected $fillable = [
        'id',
        'user_id',
        'company_name',
        'company_member',
        'site_url',
        'description',
        'created_at',
        'updated_at',
    ];
    protected $primaryKey = 'id';

}

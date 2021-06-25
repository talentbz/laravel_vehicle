<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyMedia extends Model
{
    use HasFactory;
    protected $table = 'company_media';
    protected $fillable = [
        'id',
        'company_id',
        'path',
        'created_at',
        'updated_at',
    ];
}

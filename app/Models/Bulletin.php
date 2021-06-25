<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bulletin extends Model
{
    use HasFactory;
    protected $table = 'bulletin';
    protected $fillable = [
        'id',
        'company_id',
        'category',
        'deadline_date',
        'site_url',
        'description',
        'created_at',
        'updated_at',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    protected $fillable = [
        'desk',
        'service',
        'status',
        'created_at',
        'comment',
        'title',
        'station_id',
        'user_id',
    ];

    protected $dates = ['created_at'];
}

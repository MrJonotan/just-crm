<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkingHour extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'type',
        'hours',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}

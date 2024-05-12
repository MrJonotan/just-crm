<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Holiday extends Model
{
    use HasFactory;
    protected $fillable = [
        'year',
        'date',
        'hours',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function getDateAttribute($date)
    {
        if(!empty($date)){
            return Carbon::parse($date)->format('d.m.Y');
        }
    }
}

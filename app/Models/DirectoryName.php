<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DirectoryName extends Model
{
    use HasFactory;
    protected $fillable = [
        'table_name',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}

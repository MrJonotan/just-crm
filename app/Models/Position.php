<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Position extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'salary',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function employee() : HasOne
    {
        return $this->hasOne(User::class, 'position_id', 'id');
    }

    public function department() : HasOne
    {
        return $this->hasOne(Department::class, 'id', 'department_id');
    }
}



<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Department extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function employee() : HasOne
    {
        return $this->hasOne(User::class, 'department_id', 'id');
    }

    public function positions() : HasMany
    {
        return $this->hasMany(Position::class, 'department_id', 'id');
    }
}

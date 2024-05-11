<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Subtask extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'employee_id',
        'task_id',
        'status_id',
        'hours',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function employee(): HasOne
    {
        return $this->hasOne(User::class);
    }

    public function task(): HasOne
    {
        return $this->hasOne(Task::class);
    }

    public function status() : HasOne
    {
        return $this->hasOne(TaskStatus::class);
    }
}

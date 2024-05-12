<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TaskStatus extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'color',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function task() : BelongsTo
    {
        return $this->belongsTo(Task::class, 'foreign_key');
    }

    public function subtask() : BelongsTo
    {
        return $this->belongsTo(Subtask::class, 'foreign_key');
    }
}

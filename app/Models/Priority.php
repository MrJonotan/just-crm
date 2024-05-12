<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Priority extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'color'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function project() : BelongsTo
    {
        return $this->belongsTo(Project::class, 'foreign_key');
    }

    public function task() : BelongsTo
    {
        return $this->belongsTo(Task::class, 'foreign_key');
    }
}

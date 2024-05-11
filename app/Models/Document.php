<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Document extends Model
{
    use HasFactory;
    protected $fillable = [
        'project_id',
        'title',
        'file_path',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function project(): HasOne
    {
        return $this->hasOne(Project::class, 'id', 'project_id');
    }

    public function task(): HasOne
    {
        return $this->hasOne(Task::class, 'id', 'task_id');
    }

    public function client(): HasOne
    {
        return $this->hasOne(Client::class, 'id', 'client_id');
    }
}

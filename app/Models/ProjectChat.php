<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ProjectChat extends Model
{
    use HasFactory;
    protected $fillable = [
        'project_id',
        'employee_id',
        'message',
    ];

    public function project() : HasOne {
        return $this->hasOne(Project::class);
    }

    public function employee() : HasOne {
        return $this->hasOne(User::class, 'id', 'employee_id');
    }

    public function getCreatedAtAttribute($date)
    {
        return Carbon::parse($date)->format('d M Y h:m');
    }
}

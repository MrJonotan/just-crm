<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'project_id',
        'status_id',
        'priority_id',
        'manager_id',
        'employee_id',
        'begin_start_date_plan',
        'last_start_date_plan',
        'start_date_fact',
        'begin_end_date_plan',
        'last_end_date_plan',
        'end_date_fact',
        'hours',
        'readiness',
    ];

    public function getCreatedAtAttribute($date){
        if(!$date){
            return "-";
        }else{
            return Carbon::parse($date)->format('d.m.Y H:i');
        }
    }

    public function getBeginStartDatePlanAttribute($date){
        if(!$date){
            return "-";
        }else{
            return Carbon::parse($date)->format('d.m.Y H:i');
        }
    }

    public function getLastStartDatePlanAttribute($date){
        if(!$date){
            return "-";
        }else{
            return Carbon::parse($date)->format('d.m.Y H:i');
        }
    }

    public function getStartDateFactAttribute($date){
        if(!$date){
            return "-";
        }else{
            return Carbon::parse($date)->format('d.m.Y H:i');
        }
    }

    public function getBeginEndDatePlanAttribute($date){
        if(!$date){
            return "-";
        }else{
            return Carbon::parse($date)->format('d.m.Y H:i');
        }
    }

    public function getLastEndDatePlanAttribute($date){
        if(!$date){
            return "-";
        }else{
            return Carbon::parse($date)->format('d.m.Y H:i');
        }
    }

    public function getEndDateFactAttribute($date){
        if(!$date){
            return "-";
        }else{
            return Carbon::parse($date)->format('d.m.Y H:i');
        }
    }

    public function employee() : HasOne {
        return $this->hasOne(User::class, 'id', 'employee_id');
    }

    public function status() : HasOne {
        return $this->hasOne(TaskStatus::class, 'id', 'status_id');
    }

    public function priority() : HasOne {
        return $this->hasOne(Priority::class, 'id', 'priority_id');
    }

    public function subtasks() : HasMany
    {
        return $this->hasMany(Subtask::class, 'task_id', 'id');
    }

    public function project() : HasOne
    {
        return $this->hasOne(Project::class, 'id', 'project_id');
    }

    public function manager() : HasOne
    {
        return $this->hasOne(User::class,'id', 'manager_id');
    }
}

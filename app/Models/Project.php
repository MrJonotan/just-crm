<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Carbon\Carbon;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'status_id',
        'priority_id',
        'manager_id',
        'client_id',
        'color',
        'begin_start_date_plan',
        'last_start_date_plan',
        'start_date_fact',
        'begin_end_date_plan',
        'last_end_date_plan',
        'end_date_fact',
        'budget_plan',
        'budget_fact',
        'hours',
        'readiness',
    ];

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

    public function getBeginStartDateFactAttribute($date){
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

    public function getBudgetPlanAttribute($data){
        if(!$data){
            return "-";
        }else{
            return $data;
        }
    }

    public function getBudgetFactAttribute($data){
        if(!$data){
            return "-";
        }else{
            return $data;
        }
    }

    public function manager() : HasOne {
        return $this->hasOne(User::class, 'id', 'manager_id');
    }

    public function employees () : HasMany {
        return $this->hasMany(ProjectEmployee::class, 'project_id', 'id');
    }

    public function client() : HasOne {
        return $this->hasOne(Client::class, 'id', 'client_id');
    }

    public function status() : HasOne {
        return $this->hasOne(ProjectStatus::class, 'id', 'status_id');
    }

    public function priority() : HasOne {
        return $this->HasOne(Priority::class, 'id', 'priority_id');
    }

    public function tasks(): HasMany {
        return $this->hasMany(Task::class, 'project_id', 'id');
    }

    public function documents() : HasMany {
        return $this->hasMany(Document::class, 'project_id', 'id');
    }

    public function project_chat() : HasMany {
        return $this->hasMany(ProjectChat::class, 'project_id', 'id');
    }
}

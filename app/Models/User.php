<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use Laratrust\Laratrust;
use Laratrust\Traits\LaratrustUserTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use HasFactory;

    protected $fillable = [
        'first_name',
        'name',
        'last_name',
        'email',
        'password',
        'date_of_employment',
        'birthday',
        'position_id',
        'job_status_id',
        'stake',
        'phone',
        'department_id',
        'photo',
    ];

    protected $hidden = [
        'role_id',
        'password',
        'remember_token',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function getPhoneAttribute ($phone) {
        return "+7" . $phone;
    }

    public function getPhotoAttribute ($data) {
        if(!$data && !file_exists("..public/vendor/employees_photo/photos/" . $data)) {
            return "vendor/employees_photo/photos/no_photo.png";
        }else{
            return "vendor/employees_photo/photos/" . $data;
        }
    }

    public function getDateOfEmploymentAttribute ($date) {
        if(!$date){
            return "-";
        }else{
            return Carbon::parse($date)->format('d.m.Y');
        }
    }

    public function getBirthdayAttribute ($date) {
        if(!$date){
            return "-";
        }else{
            return Carbon::parse($date)->format('d.m.Y');
        }
    }

    public function position() : BelongsTo {
        return $this->belongsTo(Position::class);
    }

    public function job_status() : BelongsTo {
        return $this->belongsTo(JobStatus::class);
    }

    public function department() : BelongsTo {
        return $this->belongsTo(Department::class);
    }

    public function project() : BelongsTo {
        return $this->belongsTo(Project::class, 'manager_id');
    }

    public function projects() : HasMany {
        return $this->hasMany(ProjectEmployee::class, 'employee_id', 'id');
    }

    public function task() : BelongsTo {
        return $this->belongsTo(Task::class, 'employee_id');
    }

    public function subtask() : BelongsTo {
        return $this->belongsTo(Subtask::class, 'employee_id');
    }

    public function project_employee() : BelongsTo {
        return $this->belongsTo(ProjectEmployee::class, 'employee_id', 'id');
    }

    public function project_chat() : BelongsTo {
        return $this->belongsTo(ProjectChat::class, 'foreign_key');
    }

    public function client_history() : BelongsTo {
        return $this->belongsTo(HistoryClient::class, 'foreign_key');
    }

    public function adminlte_image(){
        return $this->photo;
    }
}

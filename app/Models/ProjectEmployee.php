<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ProjectEmployee extends Model
{
    use HasFactory;
    protected $fillable = [
        'project_id',
        'employee_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function employee() : HasOne
    {
        return $this->hasOne(User::class, 'id', 'employee_id');
    }
}

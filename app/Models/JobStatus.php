<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class JobStatus extends Model
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
        return $this->hasOne(User::class);
    }

    public function getTitleAttribute($data)
    {
        if(empty($data)){
           return "Ничего не найдено";
        }else{
            return $data;
        }
    }
}

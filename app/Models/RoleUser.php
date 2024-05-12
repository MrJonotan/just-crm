<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class RoleUser extends Model
{
    use HasFactory;

    public $guarded = [
        'user_id',
        'role_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function user() : HasOne {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laratrust\Models\LaratrustPermission;
use Laratrust\Traits\LaratrustPermissionTrait;

class Permission extends LaratrustPermission
{
    use LaratrustPermissionTrait;
    use HasFactory;

    public $fillable = [
        'name',
        'display_name',
        'description',
    ];
}

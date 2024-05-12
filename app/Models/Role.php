<?php

namespace App\Models;

use Laratrust\Models\LaratrustRole;
use Laratrust\Traits\LaratrustRoleTrait;


class Role extends LaratrustRole
{
    use LaratrustRoleTrait;

    public $fillable = [
        'name',
        'display_name',
        'description',
    ];

}

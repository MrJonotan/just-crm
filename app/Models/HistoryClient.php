<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class HistoryClient extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'manager_id',
        'date',
    ];

    public function client() : HasOne {
        return $this->hasOne(Client::class, 'id', 'client_id');
    }

    public function employee() : HasOne {
        return $this->hasOne(User::class, 'id', 'employee_id');
    }
}

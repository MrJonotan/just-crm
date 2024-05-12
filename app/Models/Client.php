<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'name',
        'last_name',
        'email',
        'phone',
        'photo',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function getPhoneAttribute($data) {
        return "+7" . $data;
    }

    public function getPhotoAttribute($data) {
        if($data){
            return "/vendor/clients_photo/" . $data;
        }
    }

    public function projects() : HasMany{
        return $this->hasMany(Project::class, 'client_id', 'id');
    }

    public function client_history() : HasMany {
        return $this->hasMany(HistoryClient::class, 'client_id', 'id');
    }
}

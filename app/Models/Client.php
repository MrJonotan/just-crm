<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
        if(!$data || !file_exists("vendor/photos/" . $data)) {
            return "vendor/photos/no_photo.png";
        }else{
            return "vendor/photos/" . $data;
        }
    }

    public function projects() : HasMany{
        return $this->hasMany(Project::class, 'client_id', 'id');
    }

    public function client_history() : HasMany {
        return $this->hasMany(HistoryClient::class, 'client_id', 'id');
    }

    public function status() :HasOne {
        return $this->hasOne(ClientStatus::class, 'id', 'status_id');
    }

    public function documents() : HasMany {
        return $this->hasMany(Document::class, 'client_id', 'id');
    }
}

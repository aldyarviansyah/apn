<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    protected $fillable = [
        'model_id',
        'user_id',
        'user_static',
        'model',
        'model_label',
        'action',
        'action_label',
        'group_key'
    ];

    protected $appends = ['user_name', 'user_image', 'user_role', 'date_created', 'time_created'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function items() {
        return $this->hasMany(ActivitiesItem::class, 'activity_id');
    }

    public function getUserNameAttribute() {
        return $this->user&&$this->user->full_name?$this->user->full_name:($this->attributes['user_static']?$this->attributes['user_static']:'System');
    }

    public function getUserImageAttribute() {
        return $this->user->image??asset('img/initials/1_system.png');
    }

    public function getUserRoleAttribute() {
        return $this->attributes['user_static']?$this->attributes['user_static']:($this->user&&$this->user->role?$this->user->role:'System');
    }

    public function getDateCreatedAttribute() {
        return Carbon::parse($this->attributes['created_at'])->format('d M Y');
    }

    public function getTimeCreatedAttribute() {
        return Carbon::parse($this->attributes['created_at'])->format('H.i');
    }
}

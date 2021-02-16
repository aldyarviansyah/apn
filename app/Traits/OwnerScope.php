<?php


namespace App\Traits;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

trait OwnerScope
{
    public function scopeMine($query)
    {
        $user = Auth::user()??auth('api')->user();
        return $query->where('created_by', $user->id);
    }

    public function getIsMineAttribute() {
        $user = Auth::user()??auth('api')->user();
        return $this->created_by == $user->id;
    }

    public function getCreatedByUserAttribute() {
        return $this->user->full_name??'System';
    }

    public function user() {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}

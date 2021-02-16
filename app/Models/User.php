<?php

namespace App\Models;

use App\Traits\ActivitiesEvent;
use App\Traits\OwnerScope;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles, OwnerScope, ActivitiesEvent;
    public $model_label = 'User';
    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'full_name',
        'email',
        'password',
        'phone',
        'type',
        'created_by',
        'last_login',
        'activity_count',
    ];
    protected $appends = ['image', 'role'];

    public $fieldLabels = [
        'username' => 'Username',
        'full_name' => 'Name',
        'email' => 'Email',
        'password' => 'Password',
        'phone' => 'Phone',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_login' => 'datetime',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function getRoleAttribute() {
        return $this->roles->first()? $this->roles->first()->name : '';
    }

    public function getImageAttribute() {
        return asset('img/initials/1_'.strtolower(substr($this->full_name, 0, 1)).'.png');
    }

    public function companies()
    {
        return $this->belongsToMany(Company::class, 'companies_users', 'user_id', 'company_id')
            ->withTimestamps()->withPivot('role');
    }
}

<?php

namespace App\Models;

use App\Traits\ActivitiesEvent;
use App\Traits\OwnerScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory, OwnerScope, ActivitiesEvent;
    public $model_label = 'Company';
    protected $table = 'companies';
    protected $appends = ['users_count', 'ships_count', 'boats_count'];
    protected $fillable = [
        'name',
        'email',
        'address',
        'phone',
        'company_type_id',
        'created_by',
        'activity_count'
    ];
    public $fieldLabels = [
        'name' => 'Company name',
        'email' => 'Company email',
        'address' => 'Company address',
        'phone' => 'Company phone',
        'company_type_id' => 'Company type',
    ];

    public function getUsersCountAttribute() {
        return $this->users()->count();
    }

    public function getShipsCountAttribute() {
        return $this->ships()->count();
    }

    public function getBoatsCountAttribute() {
        return $this->boats()->count();
    }

    public function users() {
        return $this->belongsToMany(User::class, 'company_users', 'company_id', 'user_id')->withPivot('role')->withTimestamps();
    }

    public function ships() {
        return $this->belongsToMany(Ship::class, 'company_ships', 'company_id', 'ship_id')->withTimestamps();
    }

    public function boats() {
        return $this->belongsToMany(Boat::class, 'company_boats', 'company_id', 'boat_id')->withTimestamps();
    }

    public function company_type() {
        return $this->belongsTo(CompanyType::class, 'company_type_id');
    }
}

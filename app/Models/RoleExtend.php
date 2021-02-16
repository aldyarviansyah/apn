<?php

namespace App\Models;

use App\Traits\ActivitiesEvent;
use App\Traits\OwnerScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

class RoleExtend extends Role
{
    use HasFactory, OwnerScope, ActivitiesEvent;
    public $model_label = 'Role';
    protected $table = 'roles';
    public $fieldLabels = [
        'name' => 'Name'
    ];
}

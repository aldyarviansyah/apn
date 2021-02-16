<?php

namespace App\Models;

use App\Traits\ActivitiesEvent;
use App\Traits\OwnerScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boat extends Model
{
    use HasFactory, OwnerScope, ActivitiesEvent;
    public $model_label = 'Boat';
    protected $table = 'boats';
    protected $fillable = ['name', 'created_by', 'activity_count'];
    public $fieldLabels = [
        'name' => 'Name'
    ];
}

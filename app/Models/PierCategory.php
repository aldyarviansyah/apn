<?php

namespace App\Models;

use App\Traits\ActivitiesEvent;
use App\Traits\OwnerScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PierCategory extends Model
{
    use HasFactory, OwnerScope, ActivitiesEvent;
    public $model_label = 'Pier Category';
    protected $table = 'pier_categories';
    protected $fillable = ['name', 'created_by', 'activity_count'];
    public $fieldLabels = [
        'name' => 'Name'
    ];

    public function piers() {
        return $this->hasMany(Pier::class, 'pier_category_id');
    }
}

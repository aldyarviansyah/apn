<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivitiesItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'field',
        'field_label',
        'value_type',
        'old_value',
        'old_display_value',
        'new_value',
        'new_display_value',
        'undo_able',
        'current_model',
        'current_table',
        'activity_id',
    ];
}

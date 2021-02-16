<?php

namespace App\Models;

use App\Traits\ActivitiesEvent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessRequest extends Model
{
    use HasFactory, ActivitiesEvent;
    public $model_label = 'Access Request';
    protected $table = 'access_requests';
    protected $fillable = [
        'name',
        'phone',
        'company_name',
        'company_address',
        'company_email',
        'company_position',
        'user_id',
        'status',
        'reason',
        'activity_count',
    ];
    public $fieldLabels = [
        'name' => 'Name',
        'phone' => 'Phone',
        'company_name' => 'Company name',
        'company_address' => 'Company address',
        'company_email' => 'Company email',
        'company_position' => 'Position at company',
        'status' => 'Status',
        'reason' => 'Reason',
    ];
}

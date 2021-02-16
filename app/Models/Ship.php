<?php

namespace App\Models;

use App\Traits\ActivitiesEvent;
use App\Traits\OwnerScope;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ship extends Model
{
    use HasFactory, OwnerScope, ActivitiesEvent;
    public $model_label = 'Ship';
    protected $table = 'ships';
    protected $fillable = [
        'name',
        'category',
        'call_sign',
        'nationality_id',
        'telephone',
        'port',
        'imo_number',
        'issc_type',
        'issc_issue_date',
        'issc_expiry_date',
        'created_by',
        'activity_count'
    ];
    public $fieldLabels = [
        'name' => 'Name',
        'category' => 'Category',
        'call_sign' => 'Call sign',
        'nationality_id' => 'Nationality',
        'telephone' => 'Telephone',
        'port' => 'Port',
        'imo_number' => 'IMO Number',
        'issc_type' => 'ISSC type',
        'issc_issue_date' => 'Date of issue ISSC',
        'issc_expiry_date' => 'Date of expiry ISSC',
    ];

    protected $casts = [
        'issc_issue_date' => 'date',
        'issc_expiry_date' => 'date',
    ];

    public function setIsscIssueDateAttribute($value) {
        return $this->attributes['issc_issue_date'] = Carbon::parse($value);
    }

    public function setIsscExpiryDateAttribute($value) {
        return $this->attributes['issc_expiry_date'] = Carbon::parse($value);
    }

    public function getIsscIssueDateFormatedAttribute() {
        return Carbon::parse($this->attributes['issc_issue_date'])->format('Y-m-d');
    }

    public function getIsscExpiryDateFormatedAttribute() {
        return Carbon::parse($this->attributes['issc_expiry_date'])->format('Y-m-d');
    }

    public function country() {
        return $this->belongsTo(Country::class, 'nationality_id');
    }
}

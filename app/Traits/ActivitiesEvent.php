<?php


namespace App\Traits;

use App\Models\Activity;

trait ActivitiesEvent
{
    public $old_display_value = [];
    public $new_display_value = [];
    public $user_static = null;
    public $undo_able = true;
    public $current_model = __CLASS__;
    public $current_table = null;
    public $additional_activities_item = [];

    public function getModelLabelAttribute() {
        return $this->model_label;
    }

    public function getOldDisplayValueAttribute()
    {
        return $this->old_display_value;
    }

    public function getNewDisplayValueAttribute()
    {
        return $this->new_display_value;
    }

    public function setOldDisplayValueAttribute($value)
    {
        $this->old_display_value = $value;
    }

    public function setNewDisplayValueAttribute($value)
    {
        $this->new_display_value = $value;
    }

    public function getUserStaticAttribute() {
        return $this->user_static;
    }

    public function setUserStaticAttribute($value) {
        $this->user_static = $value;
    }

    public function getUndoAbleAttribute() {
        return $this->undo_able;
    }

    public function setUndoAbleAttribute($value) {
        $this->undo_able = $value;
    }

    public function getCurrentModelAttribute() {
        return $this->current_model;
    }

    public function setCurrentModelAttribute($value) {
        $this->current_model = $value;
    }

    public function getCurrentTableAttribute() {
        return $this->current_table;
    }

    public function setCurrentTableAttribute($value) {
        $this->current_table = $value;
    }

    public function getAdditionalActivitiesItemAttribute() {
        return $this->additional_activities_item;
    }

    public function setAdditionalActivitiesItemAttribute($value) {
        $this->additional_activities_item = $value;
    }

    public function getActivitiesCountAttribute()
    {
        return Activity::where('model', __CLASS__)
            ->where('model_id', $this->attributes['id'])
            ->get()->count();
    }

    public function getFieldLabelsAttribute()
    {
        return $this->fieldLabels??[];
    }

    public function getUser() {
        return \auth()->user()->id??null;
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($item) {

        });

        static::created(function ($item) {
            Activity::create([
                'user_id' => $item->getUser(),
                'model_id' => $item->id,
                'model' => __CLASS__,
                'model_label' => $item->model_label,
                'action' => 'create',
                'action_label' => 'Created this',
            ]);
            $item->activity_count = $item->activities_count;
            $item->saveQuietly();
        });

        static::updating(function ($item) {
            $changes = $item->getDirty();
            $field_labels = $item->field_labels;
            $changed = [];
            foreach ($changes as $key => $value) {
                if(isset($field_labels[$key]) && $item->$key != $item->getOriginal($key)) {
                    $old_display_value = $item->old_display_value[$key]??$item->getOriginal($key);
                    $new_display_value = $item->new_display_value[$key]??$item->$key;
                    $itemChanged = [
                        'field' => $key,
                        'field_label' => $field_labels[$key],
                        'value_type' => gettype($item->getOriginal($key)),
                        'old_value' => $item->getOriginal($key),
                        'old_display_value' => $old_display_value,
                        'new_value' => $item->$key,
                        'new_display_value' => $new_display_value,
                        'undo_able' => $item->undo_able,
                        'current_model' => $item->current_model,
                        'current_table' => $item->current_table??$item->getTable(),
                    ];
                    array_push($changed, $itemChanged);
                }
            }
            $activities = Activity::create([
                'model_id' => $item->id,
                'user_id' => $item->getUser(),
                'user_static' => $item->user_static,
                'model' => __CLASS__,
                'model_label' => $item->model_label,
                'action' => 'update',
                'action_label' => 'Updated',
            ]);
            $activities->items()->createMany($changed);
            if($item->additional_activities_item) {
                $activities->items()->createMany($item->additional_activities_item);
            }
            $item->activity_count = $item->activities_count;
            $item->saveQuietly();
        });

        static::updated(function ($item) {

        });

        static::deleted(function ($item) {

        });
    }
}

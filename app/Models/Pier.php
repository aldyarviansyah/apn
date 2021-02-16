<?php

namespace App\Models;

use App\Traits\OwnerScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pier extends Model
{
    use HasFactory, OwnerScope;
    protected $fillable = ['number', 'section', 'pier_category_id', 'created_by'];
    public function category() {
        return $this->belongsTo(PierCategory::class, 'pier_category_id');
    }
}

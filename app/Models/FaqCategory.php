<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class FaqCategory extends BaseModel
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'is_active',
        'image'
    ];

    public $casts = [
        'is_active' => "boolean"
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}

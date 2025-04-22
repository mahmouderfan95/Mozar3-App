<?php

namespace App\Models;

use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;

class Qna extends BaseModel
{
    use  HasTranslations ,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "question",
        "answer",
        "faq_category_id"
    ];

    /**
     * Fields that need to be translatable.
     *
     * @var array
     */
    public $translatable = [
        "question",
        "answer"
    ];

    public function category()
    {
        return $this->belongsTo(FaqCategory::class,'faq_category_id');
    }
}

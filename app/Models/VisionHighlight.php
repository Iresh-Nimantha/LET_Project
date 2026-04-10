<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisionHighlight extends Model
{
    protected $fillable = [
        'title',
        'image_path',
        'sort_order',
        'is_active',
        'faq_question',
        'faq_answer',
    ];
}

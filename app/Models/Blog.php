<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'cover_image_path',
        'faq_question',
        'faq_answer',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    protected static function booted(): void
    {
        static::saving(function (Blog $blog) {
            if (blank($blog->slug) && !blank($blog->title)) {
                $blog->slug = Str::slug($blog->title);
            }
        });
    }
}

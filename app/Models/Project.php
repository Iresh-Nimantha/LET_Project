<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'category',
        'image_path',
        'url',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    protected static function booted(): void
    {
        static::saving(function (Project $project) {
            if (blank($project->slug) && !blank($project->title)) {
                $project->slug = Str::slug($project->title);
            }
        });
    }
}

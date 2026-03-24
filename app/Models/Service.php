<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Service extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'icon_class',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    protected static function booted(): void
    {
        static::saving(function (Service $service) {
            if (blank($service->slug) && !blank($service->title)) {
                $service->slug = Str::slug($service->title);
            }
        });
    }
}

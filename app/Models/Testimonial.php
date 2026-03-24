<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Testimonial extends Model
{
    protected $fillable = [
        'name',
        'role',
        'quote',
        'image_path',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Accreditation extends Model
{
    protected $fillable = [
        'name',
        'logo_path',
        'sort_order',
        'is_active',
    ];
}

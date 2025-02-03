<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Memorial extends Model
{
    protected $fillable = [
        'name',
        'birth_date',
        'death_date',
        'photo',
        'photos',
        'video',
        'biography',
        'history',
        'story',
        'testimonials',
        'comments',
        'gift',
        'qr_code',
        'users',
    ];
}

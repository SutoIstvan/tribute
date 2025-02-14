<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Memorial extends Model
{
    public $incrementing = false; // Отключаем автоинкремент
    protected $keyType = 'string'; // Указываем, что ID строковый

    protected $fillable = [
        'id',
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

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function admin() {
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function memorialimages()
    {
        return $this->hasMany(MemorialImage::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Memorial extends Model
{
    use SoftDeletes;

    public $incrementing = false; // Отключаем автоинкремент
    protected $keyType = 'string'; // Указываем, что ID строковый

    protected $fillable = [
        'id',
        'slug',
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
        'virtual_code',
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

    public function getRouteKey()
    {
        return $this->slug ?? $this->id;
    }

    // Метод для получения параметра в URL
    public function getRouteKeyName()
    {
        return $this->slug ? 'slug' : 'id';
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}

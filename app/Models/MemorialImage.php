<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemorialImage extends Model
{   
    protected $fillable = ['memorial_id', 'image_path', 'image_date', 'image_description'];

    public function memorial()
    {
        return $this->belongsTo(Memorial::class);
    }
}

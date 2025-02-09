<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

    protected $fillable = ['filename', 'article_id'];

    public function memorial()
    {
        return $this->belongsTo(Memorial::class);
    }
}

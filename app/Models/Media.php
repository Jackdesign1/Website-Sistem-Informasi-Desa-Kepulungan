<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Media extends Model
{
    /** @use HasFactory<\Database\Factories\MediaFactory> */
    use HasFactory;

    protected $fillable = [
        'news_id',
        'type',
        'url',
        'alt_text'
    ];

    public function scopeOnlyImage($query) {
        return $query->where('type', 'image');
    }

    public function scopeOnlyFile($query) {
        return $query->where('type', 'file');
    }

    public function mediable()
    {
        return $this->morphTo();
    }
}

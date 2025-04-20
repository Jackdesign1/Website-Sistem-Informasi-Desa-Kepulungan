<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class News extends Model
{
    /** @use HasFactory<\Database\Factories\NewsFactory> */
    use HasFactory;

    // public function media()
    // {
    //     return $this->morphMany(Media::class, 'mediable');
    // }

    public function media()
    {
        return $this->hasMany(Media::class);
    }
    public function scopeOnlyNews($query) {
        return $query->where('type', 'news');
    }

    public function scopeOnlyReports($query) {
        return $query->where('type', 'report');
    }
}

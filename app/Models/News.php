<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class News extends Model
{
    /** @use HasFactory<\Database\Factories\NewsFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'type',
        'status',
        'description',
        'content'
    ];

    // protected $casts = [
    //     ...
    //     'library' => AsCollection::class,
    // ];

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

    public function scopeOnlyReport($query) {
        return $query->where('type', 'report');
    }

    public function scopeOnlyPublish($query) {
        return $query->where('status', 'publish');
    }

    public function scopeOnlyDraft($query) {
        return $query->where('status', 'draft');
    }

    public function fileMedia() {
        return $this->media()->onlyFile();
    }

    public function imageMedia() {
        return $this->media()->onlyImage();
    }
}

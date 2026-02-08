<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Apparatus extends Model
{
    /** @use HasFactory<\Database\Factories\ApparatusFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'position',
        'nipd',
        'image',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

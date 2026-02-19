<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VillageBudget extends Model
{
    /** @use HasFactory<\Database\Factories\VillageBudgetFactory> */
    use HasFactory;

    protected $fillable = [
        'year',
        'silpa',
        'user_id'
    ];

    public function details()
    {
        return $this->hasMany(VillageBudgetDetail::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

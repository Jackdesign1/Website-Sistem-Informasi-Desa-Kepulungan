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
        'silpa'
    ];

    public function detail()
    {
        return $this->hasMany(VillageBudgetDetail::class);
    }
}

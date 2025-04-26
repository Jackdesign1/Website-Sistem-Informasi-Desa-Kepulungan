<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VillageBudgetDetail extends Model
{
    /** @use HasFactory<\Database\Factories\VillageBudgetDetailFactory> */
    use HasFactory;

    protected $fillable = [
        'type',
        'value',
    ];
}

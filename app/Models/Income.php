<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    /** @use HasFactory<\Database\Factories\IncomeFactory> */
    use HasFactory;

    protected $fillable = [
        'year',
    ];

    public function incomeTypes()
    {
        return $this->hasMany(IncomeType::class);
    }

    public function incomeDetails()
    {
        return $this->hasManyThrough(IncomeDetail::class, IncomeType::class);
    }
}

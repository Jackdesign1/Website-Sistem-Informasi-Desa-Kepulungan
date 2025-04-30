<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncomeType extends Model
{
    /** @use HasFactory<\Database\Factories\IncomeTypeFactory> */
    use HasFactory;

    protected $fillable = [
        'income_id',
        'income_type_name',
    ];

    public function income()
    {
        return $this->belongsTo(Income::class);
    }
    public function details()
    {
        return $this->hasMany(IncomeDetail::class);
    }
}

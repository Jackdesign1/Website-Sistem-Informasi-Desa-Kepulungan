<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncomeDetail extends Model
{
    /** @use HasFactory<\Database\Factories\IncomeDetailFactory> */
    use HasFactory;

    protected $fillable = [
        'income_type_id',
        'income_detail_name',
        'value',
    ];

    public function incomeType()
    {
        return $this->belongsTo(IncomeType::class);
    }
}

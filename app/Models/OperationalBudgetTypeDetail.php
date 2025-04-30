<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperationalBudgetTypeDetail extends Model
{
    /** @use HasFactory<\Database\Factories\OperationalBudgetTypeDetailFactory> */
    use HasFactory;

    protected $fillable = [
        'operational_budget_type_id',
        'operational_detail_name',
        'value',
    ];

    public function operationalBudgetType()
    {
        return $this->belongsTo(OperationalBudgetType::class);
    }
}

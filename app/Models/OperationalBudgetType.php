<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperationalBudgetType extends Model
{
    /** @use HasFactory<\Database\Factories\OperationalBudgetTypeFactory> */
    use HasFactory;

    protected $fillable = [
        'operational_budget_id',
        'operational_type_name',
    ];

    public function operational()
    {
        return $this->belongsTo(OperationalBudget::class);
    }
    public function details()
    {
        return $this->hasMany(OperationalBudgetTypeDetail::class);
    }
}

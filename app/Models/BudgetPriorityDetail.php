<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BudgetPriorityDetail extends Model
{
    /** @use HasFactory<\Database\Factories\BudgetPriorityDetailFactory> */
    use HasFactory;

    protected $fillable = [
        'budget_priority_id',
        'priority_name',
        'value',
    ];
}

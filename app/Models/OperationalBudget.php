<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperationalBudget extends Model
{
    /** @use HasFactory<\Database\Factories\OperationalBudgetFactory> */
    use HasFactory;

    protected $fillable = [
        'year',
        'user_id'
    ];

    public function operationalTypes()
    {
        return $this->hasMany(OperationalBudgetType::class);
    }

    public function operationalDetails()
    {
        return $this->hasManyThrough(OperationalBudgetTypeDetail::class, OperationalBudgetType::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BudgetPriority extends Model
{
    /** @use HasFactory<\Database\Factories\BudgetPriorityFactory> */
    use HasFactory;

    protected $fillable = [
        'year',
        'user_id'
    ];

    public function details()
    {
        return $this->hasMany(BudgetPriorityDetail::class);
    }

    public function user() 
    {
        return $this->belongsTo(User::class);
    }
}

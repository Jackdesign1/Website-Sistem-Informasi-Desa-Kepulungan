<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VillageCalendar extends Model
{
    /** @use HasFactory<\Database\Factories\VillageCalendarFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'start_date',
        'end_date',
        'time_start',
        'time_end',
        'created_by',
    ];
}

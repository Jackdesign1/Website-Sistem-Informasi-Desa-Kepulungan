<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VillageProgramDetail extends Model
{
    /** @use HasFactory<\Database\Factories\VillageProgramDetailFactory> */
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'status',
        'budget',
        'realization',
        'start_date',
        'end_date',
    ];

    public function villageProgram() {
        return $this->belongsTo(VillageProgram::class);
    }

    public function getStatusLabelAttribute()
    {
        return match ($this->status) {
            'planned' => 'Perencanaan',
            'in_progress' => 'Berjalan',
            'completed' => 'Selesai',
            default => 'Tidak Diketahui',
        };
    }
}

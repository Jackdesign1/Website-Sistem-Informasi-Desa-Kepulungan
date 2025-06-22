<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VillageProgram extends Model
{
    /** @use HasFactory<\Database\Factories\VillageProgramFactory> */
    use HasFactory;
    protected $fillable = [
        'year'
    ];

    public function details() {
        return $this->hasMany(VillageProgramDetail::class);
    }
}

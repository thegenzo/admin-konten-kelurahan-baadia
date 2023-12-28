<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'number'
    ];

    public function residents()
    {
        return $this->hasMany(Resident::class);
    }
}

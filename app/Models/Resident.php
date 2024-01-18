<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    use HasFactory;

    protected $fillable = [
        'family_card_id',
        'user_id',
        'id_number',
        'name',
        'gender',
        'blood_type',
        'place_of_birth',
        'date_of_birth',
        'religion',
        'address',
        'phone',
        'marital_status',
        'occupation',
    ];

    public function family_card()
    {
        return $this->belongsTo(FamilyCard::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

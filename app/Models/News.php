<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'cover_image',
        'title',
        'content',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getContentAttribute()
    {
        return htmlspecialchars($this->attributes['content']);
    }
}

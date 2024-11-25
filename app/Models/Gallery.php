<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    // Kolom yang dapat diisi
    protected $fillable = ['title', 'image', 'description', 'user_id'];

    // Relasi ke model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

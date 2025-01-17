<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;

    protected $table = 'information';
    
    protected $fillable = [
        'title',
        'content',
        'image',
        'date'
    ];

    protected $casts = [
        'date' => 'date'
    ];
}

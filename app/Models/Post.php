<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Allow mass-assignment for these fields
    protected $fillable = [
        'title',
        'description',
        'image_url',
        'goal_amount',
        'current_amount',
        'status',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    // Allow mass-assignment for these fields
    protected $fillable = [
        'title',
        'description',
        'image_url',
        'goal_amount',
        'current_amount',
        'status',
    ];

    // Model Post
    public function donators()
    {
        return $this->hasMany(Donator::class);
    }
}

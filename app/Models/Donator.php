<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donator extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'post_id',
        'pesan',
        'total_donasi',
        'tipe_bayar'
    ];

    // Model Donator
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRayon extends Model
{
    use HasFactory;

    protected $table = 'user_rayons';

    protected $fillable = [
        'user_id',
        'rayon_id',
    ];

    public function rayon()
    {
        return $this->belongsTo(Rayon::class);
    }
}

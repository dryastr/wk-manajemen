<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestPlacement extends Model
{
    use HasFactory;

    protected $table = 'request_penempatan_pkl';

    protected $fillable = [
        'user_id',
        'filename',
        'source',
        'size',
        'ext',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

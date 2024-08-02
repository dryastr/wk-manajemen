<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rombel extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'kode_id'];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'kode_id');
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}

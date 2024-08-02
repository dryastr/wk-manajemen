<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'kode_parent'];

    public function rombels()
    {
        return $this->hasMany(Rombel::class, 'kode_id');
    }
}

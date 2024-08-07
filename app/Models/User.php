<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'nis',
        'kelas',
        'jurusan_id',
        'rayon_id',
        'kecakapan_hardskill',
        'kecakapan_softskill',
        'bebas_tunggakan',
        'bebas_pustaka',
        'test_kelayakan',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }

    public function rayon()
    {
        return $this->belongsTo(Rayon::class);
    }

    public function rayons()
    {
        return $this->belongsToMany(Rayon::class, 'user_rayons', 'user_id', 'rayon_id');
    }

    public function rombel()
    {
        return $this->belongsTo(Rombel::class);
    }

    public function userRayon()
    {
        return $this->hasOne(UserRayon::class);
    }
}

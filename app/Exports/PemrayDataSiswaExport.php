<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PemrayDataSiswaExport implements FromQuery, WithHeadings, WithMapping
{
    protected $rayonIds;

    public function __construct(array $rayonIds)
    {
        $this->rayonIds = $rayonIds;
    }

    public function query()
    {
        return User::query()
            ->whereHas('role', function ($query) {
                $query->where('name', 'user');
            })
            ->whereHas('rayons', function ($query) {
                $query->whereIn('rayon_id', $this->rayonIds);
            })
            ->with('rayons');
    }

    public function map($user): array
    {
        return [
            $user->id,
            $user->name,
            $user->email,
            $user->nis,
            $user->kelas,
            $user->jurusan->name ?? 'N/A',
            $user->rombel->nama ?? 'N/A',
            $user->rayons->pluck('name')->implode(', '),
            $user->kecakapan_hardskill == 'iya' ? 'Sudah Divalidasi' : 'Belum Divalidasi',
            $user->kecakapan_softskill == 'iya' ? 'Sudah Divalidasi' : 'Belum Divalidasi',
            $user->bebas_tunggakan == 'iya' ? 'Sudah Divalidasi' : 'Belum Divalidasi',
            $user->bebas_pustaka == 'iya' ? 'Sudah Divalidasi' : 'Belum Divalidasi',
            $user->test_kelayakan == 'iya' ? 'Sudah Divalidasi' : 'Belum Divalidasi',
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama',
            'Email',
            'NIS',
            'Kelas',
            'Jurusan',
            'Rombel',
            'Rayon',
            'Kecakapan Hardskill',
            'Kecakapan Softskill',
            'Bebas Tunggakan',
            'Bebas Pustaka',
            'Test Kelayakan',
        ];
    }
}

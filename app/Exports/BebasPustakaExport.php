<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BebasPustakaExport implements FromCollection, WithHeadings
{
    protected $status;

    public function __construct($status)
    {
        $this->status = $status;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return User::whereHas('role', function ($query) {
            $query->where('name', 'user');
        })->where('bebas_pustaka', $this->status)
            ->join('jurusans', 'users.jurusan_id', '=', 'jurusans.id')
            ->join('rombels', 'users.rombel_id', '=', 'rombels.id')
            ->select('users.id', 'users.name', 'users.nis', 'users.kelas', 'jurusans.name as jurusan', 'rombels.nama as rombel', 'users.bebas_pustaka')
            ->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'NIS',
            'Kelas',
            'Jurusan',
            'Bebas Pustaka',
        ];
    }
}

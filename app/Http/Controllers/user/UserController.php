<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $persyaratan = [
            'kecakapan_hardskill' => $user->kecakapan_hardskill,
            'kecakapan_softskill' => $user->kecakapan_softskill,
            'bebas_tunggakan' => $user->bebas_tunggakan,
            'bebas_pustaka' => $user->bebas_pustaka,
            'test_kelayakan' => $user->test_kelayakan,
        ];

        // Cek apakah semua persyaratan sudah terpenuhi
        $allRequirementsMet = !in_array('tidak', $persyaratan);

        return view('user.dashboard', [
            'persyaratan' => $persyaratan,
            'allRequirementsMet' => $allRequirementsMet
        ]);
    }

    // public function exportPdf()
    // {
    //     $user = Auth::user();

    //     $persyaratan = [
    //         'kecakapan_hardskill' => $user->kecakapan_hardskill,
    //         'kecakapan_softskill' => $user->kecakapan_softskill,
    //         'bebas_tunggakan' => $user->bebas_tunggakan,
    //         'bebas_pustaka' => $user->bebas_pustaka,
    //         'test_kelayakan' => $user->test_kelayakan,
    //     ];

    //     // Label dan penanggung jawab untuk persyaratan
    //     $persyaratan_labels = [
    //         'kecakapan_hardskill' => 'Kecakapan Hardskill',
    //         'kecakapan_softskill' => 'Kecakapan Softskill',
    //         'bebas_tunggakan' => 'Bebas Tunggakan',
    //         'bebas_pustaka' => 'Bebas Pustaka',
    //         'test_kelayakan' => 'Test Kelayakan',
    //     ];

    //     $persyaratan_responsibles = [
    //         'kecakapan_hardskill' => 'Ka. Program Keahlian',
    //         'kecakapan_softskill' => 'Wakasek. Kesiswaan',
    //         'bebas_tunggakan' => 'Wakasek. Keuangan',
    //         'bebas_pustaka' => 'Wakasek. Perpustakaan',
    //         'test_kelayakan' => 'Ka. Program Keahlian',
    //     ];

    //     $data = [
    //         'no_daftar' => '123456', // Ganti dengan data dinamis yang sesuai
    //         'tanggal_daftar' => now()->format('d/m/Y'), // Ganti dengan data dinamis yang sesuai
    //         'nama' => $user->name,
    //         'nis' => $user->nis,
    //         'program_keahlian' => 'Pengembangan Perangkat Lunak dan Gim (PPLG)', // Ganti dengan data dinamis yang sesuai
    //         'rayon' => $user->rayon, // Ganti dengan data dinamis yang sesuai
    //     ];

    //     $allRequirementsMet = !in_array('tidak', $persyaratan);

    //     if (!$allRequirementsMet) {
    //         return redirect()->route('home')
    //             ->with('error', 'Tidak dapat mengekspor PDF karena persyaratan belum lengkap.');
    //     }

    //     $pdf = Pdf::loadView('user.manajemen.persyaratan.pdf', [
    //         'persyaratan' => $persyaratan,
    //         'data' => $data,
    //         'persyaratan_labels' => $persyaratan_labels,
    //         'persyaratan_responsibles' => $persyaratan_responsibles
    //     ]);

    //     return $pdf->download('persyaratan.pdf');
    // }

    protected function generateRandomCode($length = 6)
    {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomCode = '';
        for ($i = 0; $i < $length; $i++) {
            $randomCode .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomCode;
    }

    public function showPdfPage()
    {
        $user = Auth::user();

        $userJurusan = $user->jurusan;

        $userRayon = $user->userRayon()->with('rayon')->first();
        $rayon = $userRayon ? $userRayon->rayon->name : 'N/A';

        $kaprogUsers = User::where('jurusan_id', $user->jurusan_id)
            ->whereHas('role', function ($query) {
                $query->where('name', 'kaprog');
            })
            ->get();

        $kaprogNames = $kaprogUsers->pluck('name');

        $persyaratan = [
            'kecakapan_hardskill' => $user->kecakapan_hardskill,
            'kecakapan_softskill' => $user->kecakapan_softskill,
            'bebas_tunggakan' => $user->bebas_tunggakan,
            'bebas_pustaka' => $user->bebas_pustaka,
            'test_kelayakan' => $user->test_kelayakan,
        ];

        $persyaratan_labels = [
            'Kecakapan Hard Skill',
            'Kecakapan Soft Skill',
            'Bebas Tunggakan',
            'Bebas Pustaka',
            'Test Kelayakan',
        ];

        $persyaratan_responsibles = [
            'John Doe',
            'Jane Smith',
            'Robert Brown',
            'Emily Davis',
            'Michael Wilson',
        ];

        $no_daftar = $this->generateRandomCode();

        $data = [
            'no_daftar' => $no_daftar,
            'tanggal_daftar' => now()->format('d/m/Y'),
            'nama' => $user->name,
            'nis' => $user->nis,
            'program_keahlian' => 'Pengembangan Perangkat Lunak dan Gim (PPLG)',
            'rayon' => $rayon,
        ];

        return view('user.manajemen.persyaratan.print', [
            'persyaratan' => $persyaratan,
            'data' => $data,
            'persyaratan_labels' => $persyaratan_labels,
            'persyaratan_responsibles' => $persyaratan_responsibles,
            'kaprog_names' => $kaprogNames,
        ]);
    }
}

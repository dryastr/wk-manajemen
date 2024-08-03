<?php

namespace App\Http\Controllers\user\manajemen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersyaratansController extends Controller
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

        return view('user.manajemen.persyaratan.index', [
            'persyaratan' => $persyaratan,
            'allRequirementsMet' => $allRequirementsMet
        ]);
    }

    public function exportPdf()
    {
        $user = Auth::user();

        $persyaratan = [
            'kecakapan_hardskill' => $user->kecakapan_hardskill,
            'kecakapan_softskill' => $user->kecakapan_softskill,
            'bebas_tunggakan' => $user->bebas_tunggakan,
            'bebas_pustaka' => $user->bebas_pustaka,
            'test_kelayakan' => $user->test_kelayakan,
        ];

        $allRequirementsMet = !in_array('tidak', $persyaratan);

        if (!$allRequirementsMet) {
            return redirect()->route('user.persyaratan.index')
                ->with('error', 'Tidak dapat mengekspor PDF karena persyaratan belum lengkap.');
        }

        $pdf = Pdf::loadView('user.manajemen.persyaratan.pdf', [
            'persyaratan' => $persyaratan
        ]);

        return $pdf->download('persyaratan.pdf');
    }
}

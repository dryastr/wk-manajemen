<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KaprogController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $jurusanId = $user->jurusan_id;

        $roleIdKaprog = Role::where('name', 'kaprog')->first()->id;

        $totalSiswa = User::where('jurusan_id', $jurusanId)
            ->whereHas('role', function ($query) {
                $query->where('name', 'user');
            })->count();


        $statuses = ['kecakapan_hardskill', 'kecakapan_softskill', 'bebas_tunggakan', 'bebas_pustaka', 'test_kelayakan'];
        $counts = [];

        foreach ($statuses as $status) {
            $counts[$status . 'Belum'] = User::where('jurusan_id', $jurusanId)
                ->where($status, 'tidak')
                ->whereHas('role', function ($query) {
                    $query->where('name', 'user');
                })->count();

            $counts[$status . 'Sudah'] = User::where('jurusan_id', $jurusanId)
                ->where($status, 'iya')
                ->whereHas('role', function ($query) {
                    $query->where('name', 'user');
                })->count();
        }

        return view('admin.kaprog.dashboard', [
            'totalSiswa' => $totalSiswa,
            'kecakapanHardskillBelum' => $counts['kecakapan_hardskillBelum'],
            'kecakapanHardskillSudah' => $counts['kecakapan_hardskillSudah'],
            'kecakapanSoftskillBelum' => $counts['kecakapan_softskillBelum'],
            'kecakapanSoftskillSudah' => $counts['kecakapan_softskillSudah'],
            'bebasTunggakanBelum' => $counts['bebas_tunggakanBelum'],
            'bebasTunggakanSudah' => $counts['bebas_tunggakanSudah'],
            'bebasPustakaBelum' => $counts['bebas_pustakaBelum'],
            'bebasPustakaSudah' => $counts['bebas_pustakaSudah'],
            'testKelayakanBelum' => $counts['test_kelayakanBelum'],
            'testKelayakanSudah' => $counts['test_kelayakanSudah'],
        ]);
    }
}

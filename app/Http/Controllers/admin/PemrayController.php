<?php

namespace App\Http\Controllers\admin;

use App\Exports\PemrayDataSiswaExport;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class PemrayController extends Controller
{
    public function index()
    {
        $rayonIds = Auth::user()->rayons->pluck('id')->toArray();

        $roleIdUser = Role::where('name', 'user')->first()->id;

        $totalSiswa = User::whereHas('rayons', function ($query) use ($rayonIds) {
            $query->whereIn('rayon_id', $rayonIds);
        })->whereHas('role', function ($query) use ($roleIdUser) {
            $query->where('roles.id', $roleIdUser);
        })->count();

        $kecakapanHardskillBelum = User::whereHas('rayons', function ($query) use ($rayonIds) {
            $query->whereIn('rayon_id', $rayonIds);
        })->where('kecakapan_hardskill', 'tidak')
            ->whereHas('role', function ($query) use ($roleIdUser) {
                $query->where('roles.id', $roleIdUser);
            })->count();

        $kecakapanHardskillSudah = User::whereHas('rayons', function ($query) use ($rayonIds) {
            $query->whereIn('rayon_id', $rayonIds);
        })->where('kecakapan_hardskill', 'iya')
            ->whereHas('role', function ($query) use ($roleIdUser) {
                $query->where('roles.id', $roleIdUser);
            })->count();

        $kecakapanSoftskillBelum = User::whereHas('rayons', function ($query) use ($rayonIds) {
            $query->whereIn('rayon_id', $rayonIds);
        })->where('kecakapan_softskill', 'tidak')
            ->whereHas('role', function ($query) use ($roleIdUser) {
                $query->where('roles.id', $roleIdUser);
            })->count();

        $kecakapanSoftskillSudah = User::whereHas('rayons', function ($query) use ($rayonIds) {
            $query->whereIn('rayon_id', $rayonIds);
        })->where('kecakapan_softskill', 'iya')
            ->whereHas('role', function ($query) use ($roleIdUser) {
                $query->where('roles.id', $roleIdUser);
            })->count();

        $bebasTunggakanBelum = User::whereHas('rayons', function ($query) use ($rayonIds) {
            $query->whereIn('rayon_id', $rayonIds);
        })->where('bebas_tunggakan', 'tidak')
            ->whereHas('role', function ($query) use ($roleIdUser) {
                $query->where('roles.id', $roleIdUser);
            })->count();

        $bebasTunggakanSudah = User::whereHas('rayons', function ($query) use ($rayonIds) {
            $query->whereIn('rayon_id', $rayonIds);
        })->where('bebas_tunggakan', 'iya')
            ->whereHas('role', function ($query) use ($roleIdUser) {
                $query->where('roles.id', $roleIdUser);
            })->count();

        $bebasPustakaBelum = User::whereHas('rayons', function ($query) use ($rayonIds) {
            $query->whereIn('rayon_id', $rayonIds);
        })->where('bebas_pustaka', 'tidak')
            ->whereHas('role', function ($query) use ($roleIdUser) {
                $query->where('roles.id', $roleIdUser);
            })->count();

        $bebasPustakaSudah = User::whereHas('rayons', function ($query) use ($rayonIds) {
            $query->whereIn('rayon_id', $rayonIds);
        })->where('bebas_pustaka', 'iya')
            ->whereHas('role', function ($query) use ($roleIdUser) {
                $query->where('roles.id', $roleIdUser);
            })->count();

        $testKelayakanBelum = User::whereHas('rayons', function ($query) use ($rayonIds) {
            $query->whereIn('rayon_id', $rayonIds);
        })->where('test_kelayakan', 'tidak')
            ->whereHas('role', function ($query) use ($roleIdUser) {
                $query->where('roles.id', $roleIdUser);
            })->count();

        $testKelayakanSudah = User::whereHas('rayons', function ($query) use ($rayonIds) {
            $query->whereIn('rayon_id', $rayonIds);
        })->where('test_kelayakan', 'iya')
            ->whereHas('role', function ($query) use ($roleIdUser) {
                $query->where('roles.id', $roleIdUser);
            })->count();

        return view('admin.pemray.dashboard', [
            'totalSiswa' => $totalSiswa,
            'kecakapanHardskillBelum' => $kecakapanHardskillBelum,
            'kecakapanHardskillSudah' => $kecakapanHardskillSudah,
            'kecakapanSoftskillBelum' => $kecakapanSoftskillBelum,
            'kecakapanSoftskillSudah' => $kecakapanSoftskillSudah,
            'bebasTunggakanBelum' => $bebasTunggakanBelum,
            'bebasTunggakanSudah' => $bebasTunggakanSudah,
            'bebasPustakaBelum' => $bebasPustakaBelum,
            'bebasPustakaSudah' => $bebasPustakaSudah,
            'testKelayakanBelum' => $testKelayakanBelum,
            'testKelayakanSudah' => $testKelayakanSudah,
        ]);
    }

    public function dataSiswa()
    {
        $pemray = Auth::user();

        if ($pemray->role->name !== 'pemray') {
            return redirect()->route('home')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
        }

        $rayonIds = $pemray->rayons()->pluck('rayon_id')->toArray();

        $siswa = User::whereHas('role', function ($query) {
            $query->where('name', 'user');
        })->whereHas('rayons', function ($query) use ($rayonIds) {
            $query->whereIn('rayon_id', $rayonIds);
        })->get();

        // dd($siswa);

        return view('admin.pemray.dataSiswa.index', compact('siswa'));
    }

    public function exportExcel()
    {
        $rayonIds = Auth::user()->rayons->pluck('id')->toArray();

        return Excel::download(new PemrayDataSiswaExport($rayonIds), 'data_siswa.xlsx');
    }
}

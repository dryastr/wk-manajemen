<?php

namespace App\Http\Controllers\admin\manajemen;

use App\Exports\KecakapanHardskillExport;
use App\Http\Controllers\Controller;
use App\Models\KecakapanHardskill;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class KecakapanHardskillsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::check()) {
            $loggedInUser = Auth::user();

            if ($loggedInUser->role->name === 'kaprog') {
                $jurusanKaprog = $loggedInUser->jurusan_id;

                $users = User::whereHas('role', function ($query) {
                    $query->where('name', 'user');
                })->where('jurusan_id', $jurusanKaprog)->get();

                return view('admin.kaprog.validasi.kecakapan_hardskills.index', compact('users'));
            } else {
                return redirect()->route('home')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
            }
        } else {
            return redirect()->route('login');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $detailUserEdit = User::findOrFail($id);
        return view('admin.kaprog.validasi.kecakapan_hardskills.edit', compact('detailUserEdit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kecakapan_hardskill' => 'required|string',
        ]);

        $user = User::findOrFail($id);
        $user->kecakapan_hardskill = $request->input('kecakapan_hardskill');
        $user->save();

        return redirect()->route('validasi_kecakapan.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function exportExcel($status)
    {
        return Excel::download(new KecakapanHardskillExport($status), 'kecakapan_hardskill_' . $status . '.xlsx');
    }
}

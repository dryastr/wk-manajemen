<?php

namespace App\Http\Controllers\admin\manajemen;

use App\Exports\TestKelayakanExport;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class TestKelayakansController extends Controller
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

                return view('admin.kaprog.validasi.test_kelayakans.index', compact('users'));
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
        $user = User::findOrFail($id);
        return view('admin.kaprog.validasi.test_kelayakans.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'test_kelayakan' => 'required|string',
        ]);

        $user = User::findOrFail($id);
        $user->test_kelayakan = $request->input('test_kelayakan');
        $user->save();

        return redirect()->route('validasi.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function exportExcel($status)
    {
        return Excel::download(new TestKelayakanExport($status), 'test_kelayakan_' . $status . '.xlsx');
    }
}

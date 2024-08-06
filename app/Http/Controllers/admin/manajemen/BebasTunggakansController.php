<?php

namespace App\Http\Controllers\admin\manajemen;

use App\Exports\BebasTunggakanExport;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class BebasTunggakansController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::whereHas('role', function ($query) {
            $query->where('name', 'user');
        })->get();

        return view('admin.admin_keuangan.validasi.bebas_tunggakan.index', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $detailUserEdit  = User::findOrFail($id);
        return view('admin.admin_keuangan.validasi.bebas_tunggakan.edit', compact('detailUserEdit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'bebas_tunggakan' => 'required|string',
        ]);

        $user = User::findOrFail($id);
        $user->bebas_tunggakan = $request->input('bebas_tunggakan');
        $user->save();

        return redirect()->route('bebas_tunggakan.index')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Export the bebas_tunggakan data to Excel.
     */
    public function exportExcel($status)
    {
        return Excel::download(new BebasTunggakanExport($status), 'bebas_tunggakan_' . $status . '.xlsx');
    }
}

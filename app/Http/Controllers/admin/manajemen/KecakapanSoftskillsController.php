<?php

namespace App\Http\Controllers\admin\manajemen;

use App\Exports\KecakapanSoftskillExport;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class KecakapanSoftskillsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::whereHas('role', function ($query) {
            $query->where('name', 'user');
        })->get();

        return view('admin.admin.validasi.kecakapan_softskills.index', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $detailUserEdit  = User::findOrFail($id);
        return view('admin.admin.validasi.kecakapan_softskills.edit', compact('detailUserEdit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kecakapan_softskill' => 'required|string',
        ]);

        $user = User::findOrFail($id);
        $user->kecakapan_softskill = $request->input('kecakapan_softskill');
        $user->save();

        return redirect()->route('kecakapan_softskills.index')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Export the kecakapan_softskill data to Excel.
     */
    public function exportExcel($status)
    {
        return Excel::download(new KecakapanSoftskillExport($status), 'kecakapan_softskill_' . $status . '.xlsx');
    }
}

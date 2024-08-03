<?php

namespace App\Http\Controllers\admin\manajemen;

use App\Exports\BebasPustakaExport;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class BebasPustakasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::whereHas('role', function ($query) {
            $query->where('name', 'user');
        })->get();

        return view('admin.admin.validasi.bebas_pustaka.index', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $detailUserEdit  = User::findOrFail($id);
        return view('admin.admin.validasi.bebas_pustaka.edit', compact('detailUserEdit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'bebas_pustaka' => 'required|string',
        ]);

        $user = User::findOrFail($id);
        $user->bebas_pustaka = $request->input('bebas_pustaka');
        $user->save();

        return redirect()->route('bebas_pustaka.index')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Export the bebas_pustaka data to Excel.
     */
    public function exportExcel($status)
    {
        return Excel::download(new BebasPustakaExport($status), 'bebas_pustaka_' . $status . '.xlsx');
    }
}

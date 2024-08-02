<?php

namespace App\Http\Controllers\admin\manajemen;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ValidasiKaprogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::whereHas('role', function ($query) {
            $query->where('name', 'user');
        })->get();

        return view('admin.kaprog.validasi.index', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.kaprog.validasi.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kecakapan_hardskill' => 'required|string',
            'test_kelayakan' => 'required|string',
        ]);

        $user = User::findOrFail($id);
        $user->kecakapan_hardskill = $request->input('kecakapan_hardskill');
        $user->test_kelayakan = $request->input('test_kelayakan');
        $user->save();

        return redirect()->route('validasi.index')->with('success', 'Data berhasil diperbarui.');
    }
}

<?php

namespace App\Http\Controllers\admin\manajemen;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusansController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jurusans = Jurusan::all();
        return view('admin.super_admin.jurusans.index', compact('jurusans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.super_admin.jurusans.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:jurusans|max:255',
            'kode_parent' => 'required|string|unique:jurusans|max:10',
        ]);

        Jurusan::create([
            'name' => $request->name,
            'kode_parent' => $request->kode_parent,
        ]);

        return redirect()->route('jurusans.index')
            ->with('success', 'Jurusan created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $jurusan = Jurusan::findOrFail($id);
        return view('admin.super_admin.jurusans.show', compact('jurusan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $jurusan = Jurusan::findOrFail($id);
        return view('admin.super_admin.jurusans.edit', compact('jurusan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|unique:jurusans,name,' . $id . '|max:255',
            'kode_parent' => 'required|string|unique:jurusans,kode_parent,' . $id . '|max:10',
        ]);

        $jurusan = Jurusan::findOrFail($id);
        $jurusan->update([
            'name' => $request->name,
            'kode_parent' => $request->kode_parent,
        ]);

        return redirect()->route('jurusans.index')
            ->with('success', 'Jurusan updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $jurusan = Jurusan::findOrFail($id);
        $jurusan->delete();

        return redirect()->route('jurusans.index')
            ->with('success', 'Jurusan deleted successfully.');
    }
}

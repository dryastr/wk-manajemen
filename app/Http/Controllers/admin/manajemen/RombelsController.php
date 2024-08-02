<?php

namespace App\Http\Controllers\admin\manajemen;

use App\Http\Controllers\Controller;
use App\Models\Rombel;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class RombelsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rombels = Rombel::with('jurusan')->get();
        return view('admin.super_admin.rombels.index', compact('rombels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jurusans = Jurusan::all();
        return view('admin.super_admin.rombels.create', compact('jurusans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kode_id' => 'required|exists:jurusans,id',
        ]);

        Rombel::create($request->all());

        return redirect()->route('rombels.index')
            ->with('success', 'Rombel created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rombel = Rombel::findOrFail($id);
        return view('admin.super_admin.rombels.show', compact('rombel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $rombel = Rombel::findOrFail($id);
        $jurusans = Jurusan::all();
        return view('admin.super_admin.rombels.edit', compact('rombel', 'jurusans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kode_id' => 'required|exists:jurusans,id',
        ]);

        $rombel = Rombel::findOrFail($id);
        $rombel->update($request->all());

        return redirect()->route('rombels.index')
            ->with('success', 'Rombel updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rombel = Rombel::findOrFail($id);
        $rombel->delete();

        return redirect()->route('rombels.index')
            ->with('success', 'Rombel deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers\admin\manajemen;

use App\Http\Controllers\Controller;
use App\Models\Rayon;
use Illuminate\Http\Request;

class RayonsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rayons = Rayon::all();
        return view('admin.super_admin.rayons.index', compact('rayons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.super_admin.rayons.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Rayon::create($request->all());

        return redirect()->route('rayons.index')
            ->with('success', 'Rayon created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $rayon = Rayon::findOrFail($id);
        return view('admin.super_admin.rayons.show', compact('rayon'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $rayon = Rayon::findOrFail($id);
        return view('admin.super_admin.rayons.edit', compact('rayon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $rayon = Rayon::findOrFail($id);
        $rayon->update($request->all());

        return redirect()->route('rayons.index')
            ->with('success', 'Rayon updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $rayon = Rayon::findOrFail($id);
        $rayon->delete();

        return redirect()->route('rayons.index')
            ->with('success', 'Rayon deleted successfully.');
    }
}

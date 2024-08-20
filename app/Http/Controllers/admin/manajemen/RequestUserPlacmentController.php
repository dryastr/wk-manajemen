<?php

namespace App\Http\Controllers\admin\manajemen;

use App\Http\Controllers\Controller;
use App\Models\RequestPlacement;
use Illuminate\Http\Request;

class RequestUserPlacmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $requests = RequestPlacement::all();

        return view('admin.super_admin.requests.index', compact('requests'));
    }

    public function updateStatus(Request $request, $id)
    {
        $requestPlacement = RequestPlacement::findOrFail($id);
        $requestPlacement->update([
            'status' => $request->input('status'),
        ]);

        return redirect()->route('request_placement_user.index')->with('success', 'Status berhasil diperbarui.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

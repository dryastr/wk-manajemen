<?php

namespace App\Http\Controllers\User\Manajemen;

use App\Http\Controllers\Controller;
use App\Models\RequestPlacement;
use App\Models\TemplateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RequestPlacementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $templates = TemplateRequest::all();
        $requests = RequestPlacement::where('user_id', Auth::id())->get();
        return view('user.manajemen.requests.index', compact('requests', 'templates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.manajemen.requests.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'file_surat' => 'required|mimes:pdf|max:2048',
        ]);

        $file = $request->file('file_surat');
        $filename = time() . '_' . $file->getClientOriginalName();

        // Simpan file ke disk 'public', yang mengarah ke 'storage/app/public'
        $path = $file->storeAs('request_penempatan_pkl', $filename, 'public');

        RequestPlacement::create([
            'user_id' => Auth::id(),
            'filename' => $filename,
            'source' => $path,
            'size' => $file->getSize(),
            'ext' => $file->getClientOriginalExtension(),
            'status' => 'pending',
        ]);

        return redirect()->route('request_placement.index')->with('success', 'Request Penempatan PKL berhasil diupload.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $requestPlacement = RequestPlacement::findOrFail($id);
        return view('user.manajemen.requests.show', compact('requestPlacement'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $requestPlacement = RequestPlacement::findOrFail($id);
        return view('user.manajemen.requests.edit', compact('requestPlacement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,accepted,rejected',
        ]);

        $requestPlacement = RequestPlacement::findOrFail($id);
        $requestPlacement->update([
            'status' => $request->status,
        ]);

        return redirect()->route('super_admin.request_placement.index')->with('success', 'Status berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $requestPlacement = RequestPlacement::findOrFail($id);

        Storage::delete($requestPlacement->source);

        $requestPlacement->delete();

        return redirect()->route('super_admin.request_placement.index')->with('success', 'Request berhasil dihapus.');
    }
}

<?php

namespace App\Http\Controllers\admin\manajemen;

use App\Http\Controllers\Controller;
use App\Models\TemplateRequest;
use Illuminate\Http\Request;

class TemplateRequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $templates = TemplateRequest::all();
        return view('admin.super_admin.template_requests.index', compact('templates'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'required|mimes:pdf|max:2048',
        ]);

        $file = $request->file('file');
        $filename = $file->getClientOriginalName();
        $path = $file->storeAs('template_requests_pkl', time() . '_' . $filename, 'public');

        TemplateRequest::create([
            'name' => $request->name,
            'description' => $request->description,
            'filename' => $filename,
            'source' => $path,
            'size' => $file->getSize(),
            'ext' => $file->getClientOriginalExtension(),
        ]);

        return redirect()->route('template_requests.index')->with('success', 'Template created successfully.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $template = TemplateRequest::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'nullable|mimes:pdf|max:2048',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $path = $file->storeAs('template_requests_pkl', time() . '_' . $filename, 'public');

            // Delete old file if exists
            if ($template->source) {
                \Storage::disk('public')->delete($template->source);
            }

            $template->update([
                'filename' => $filename,
                'source' => $path,
                'size' => $file->getSize(),
                'ext' => $file->getClientOriginalExtension(),
            ]);
        }

        $template->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('template_requests.index')->with('success', 'Template updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $template = TemplateRequest::findOrFail($id);

        // Delete file from storage
        \Storage::disk('public')->delete($template->source);

        $template->delete();

        return redirect()->route('template_requests.index')->with('success', 'Template deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers\user\manajemen;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfilesController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::with('rayons')->findOrFail($id);

        if (Auth::id() !== (int) $id) {
            return redirect()->route('profiles.show', Auth::id())
                ->withErrors(['error' => 'Anda tidak memiliki izin untuk melihat profil pengguna ini.']);
        }

        return view('user.profiles.show', compact('user'));
    }

    public function edit(string $id)
    {
        $user = User::findOrFail($id);

        if (Auth::id() !== (int) $id) {
            return redirect()->route('profiles.edit', Auth::id())
                ->withErrors(['error' => 'Anda tidak memiliki izin untuk mengedit profil pengguna ini.']);
        }

        return view('user.profiles.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        if (Auth::id() !== (int) $id) {
            return redirect()->route('profiles.edit', Auth::id())
                ->withErrors(['error' => 'Anda tidak memiliki izin untuk memperbarui profil pengguna ini.']);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|min:8',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->route('profiles.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        if ($request->hasFile('profile_image')) {
            if ($user->profile_image && Storage::disk('public')->exists($user->profile_image)) {
                Storage::disk('public')->delete($user->profile_image);
            }

            $imagePath = $request->file('profile_image')->store('profile_images', 'public');
            $user->profile_image = $imagePath;
        }

        $user->save();

        return redirect()->route('profiles.show', $id)
            ->with('success', 'Profil berhasil diperbarui.');
    }
}

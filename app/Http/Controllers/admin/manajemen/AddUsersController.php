<?php

namespace App\Http\Controllers\admin\manajemen;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use App\Models\Rayon;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AddUsersController extends Controller
{
    public function index()
    {
        $users = User::with(['role', 'jurusan', 'rayon'])->get();
        return view('admin.super_admin.users.index', compact('users'));
    }

    private function generateNIS()
    {
        $prefix = '1190';

        $lastNIS = User::orderBy('nis', 'desc')->value('nis');

        if ($lastNIS) {
            $lastNumber = intval(substr($lastNIS, strlen($prefix)));
            $nextNumber = $lastNumber + 1;
        } else {
            $nextNumber = 1;
        }

        $nextNumberFormatted = str_pad($nextNumber, 4, '0', STR_PAD_LEFT);

        $newNIS = $prefix . $nextNumberFormatted;

        $nisExists = User::where('nis', $newNIS)->exists();

        if ($nisExists) {
            return $this->generateNIS();
        }

        return $newNIS;
    }



    public function create()
    {
        $roles = Role::all();
        $jurusans = Jurusan::all();
        $rayons = Rayon::all();
        $nis = null;

        $defaultRole = Role::where('name', 'user')->first();
        if ($defaultRole) {
            $nis = $this->generateNIS();
        }

        return view('admin.super_admin.users.create', compact('roles', 'jurusans', 'rayons', 'nis'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role_id' => 'required|exists:roles,id',
            'kelas' => 'nullable|string|max:255',
            'jurusan_id' => 'nullable|exists:jurusans,id',
            'rayon_id' => 'nullable|exists:rayons,id',
            'nis' => 'nullable|string|max:255|unique:users',
        ]);

        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->role_id = $validatedData['role_id'];
        $user->kelas = $validatedData['kelas'] ?? null;
        $user->jurusan_id = $validatedData['jurusan_id'] ?? null;
        $user->rayon_id = $validatedData['rayon_id'] ?? null;
        $user->nis = $validatedData['nis'] ?? null;
        $user->save();

        return redirect()->route('addusers.index')->with('success', 'Pengguna berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        $jurusans = Jurusan::all();
        $rayons = Rayon::all();
        return view('admin.super_admin.users.edit', compact('user', 'roles', 'jurusans', 'rayons'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8',
            'role_id' => 'nullable|exists:roles,id',
            'kelas' => 'nullable|string|max:255',
            'jurusan_id' => 'nullable|exists:jurusans,id',
            'rayon_id' => 'nullable|exists:rayons,id',
            'nis' => 'nullable|string|max:255|unique:users,nis,' . $id,
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->role_id = $request->role_id;
        $user->kelas = $request->kelas;
        $user->jurusan_id = $request->jurusan_id;
        $user->rayon_id = $request->rayon_id;
        $user->nis = $request->nis;
        $user->save();

        return redirect()->route('addusers.index')->with('success', 'Pengguna berhasil diperbarui.');
    }

    public function show($id)
    {
        $user = User::with(['role', 'jurusan', 'rayon'])->findOrFail($id);
        return view('admin.super_admin.users.show', compact('user'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('addusers.index')->with('success', 'Pengguna berhasil dihapus.');
    }
}

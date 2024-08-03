<?php

namespace App\Http\Controllers\admin\manajemen;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use App\Models\Rayon;
use App\Models\Role;
use App\Models\Rombel; // Tambahkan import model Rombel
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AddUsersController extends Controller
{
    public function index()
    {
        $users = User::with(['role', 'jurusan', 'rayon', 'rombel'])->get();
        return view('admin.super_admin.users.index', compact('users'));
    }

    private function generateNIS()
    {
        $prefix = '1190';

        do {
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
        } while ($nisExists);

        return $newNIS;
    }

    public function create()
    {
        $roles = Role::all();
        $jurusans = Jurusan::all();
        $rayons = Rayon::all();
        $rombels = Rombel::all();
        $nis = null;

        $defaultRole = Role::where('name', 'user')->first();
        if ($defaultRole) {
            $nis = $this->generateNIS();
        }

        return view('admin.super_admin.users.create', compact('roles', 'jurusans', 'rayons', 'rombels', 'nis'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'role_id' => 'required|exists:roles,id',
            'nis' => 'nullable|string',
            'kelas' => 'nullable|string',
            'jurusan_id' => 'nullable|exists:jurusans,id',
            'rayon_id' => 'nullable|array',
            'rayon_id.*' => 'nullable|exists:rayons,id',
            'rombel_id' => 'nullable|exists:rombels,id',
        ]);

        $role = Role::find($validated['role_id']);

        $nis = ($role->name === 'user') ? $validated['nis'] : null;

        $user = new User();
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->password = Hash::make($validated['password']);
        $user->role_id = $validated['role_id'];
        $user->nis = $nis;
        $user->kelas = $validated['kelas'] ?? null;
        $user->jurusan_id = $validated['jurusan_id'] ?? null;
        $user->rombel_id = $validated['rombel_id'] ?? null;
        $user->save();

        if (!empty($validated['rayon_id'])) {
            $user->rayons()->sync($validated['rayon_id']);
        }

        return redirect()->route('addusers.index')->with('success', 'User added successfully.');
    }

    public function edit($id)
    {
        // Ambil data user berdasarkan ID
        $detailUserEdit = User::findOrFail($id);
        $roles = Role::all();
        $jurusans = Jurusan::all();
        $rayons = Rayon::all();
        $rombels = Rombel::all();
        $nis = null;

        $defaultRole = Role::where('name', 'user')->first();
        if ($defaultRole) {
            $nis = $this->generateNIS();
        }

        // Debugging session
        // dd(Session::all(), $detailUserEdit);
        // Session::forget('user');

        return view('admin.super_admin.users.edit', compact('detailUserEdit', 'roles', 'jurusans', 'rayons', 'rombels', 'nis'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8',
            'role_id' => 'required|exists:roles,id',
            'nis' => 'nullable|string',
            'kelas' => 'nullable|string',
            'jurusan_id' => 'nullable|exists:jurusans,id',
            'rayon_id' => 'nullable|array',
            'rayon_id.*' => 'nullable|exists:rayons,id',
            'rombel_id' => 'nullable|exists:rombels,id',
        ]);

        $user = User::findOrFail($id);

        $oldRole = $user->role->name;
        $newRole = Role::find($validated['role_id'])->name;

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        if ($request->filled('password')) {
            $user->password = Hash::make($validated['password']);
        }

        $user->role_id = $validated['role_id'];

        if ($oldRole !== $newRole) {
            if ($newRole === 'user') {
                $user->nis = $validated['nis'];
                $user->kelas = $validated['kelas'];
                $user->jurusan_id = $validated['jurusan_id'];
                $user->rombel_id = $validated['rombel_id'];
                $user->rayons()->sync($validated['rayon_id'] ?? []);
            } elseif ($newRole === 'pemray') {
                $user->nis = null;
                $user->kelas = null;
                $user->rombel_id = null;
                $user->jurusan_id = $validated['jurusan_id'] ?? null;
                $user->rayons()->sync($validated['rayon_id'] ?? []);
            } elseif ($newRole === 'kaprog') {
                $user->nis = null;
                $user->kelas = null;
                $user->rayons()->sync([]);
                $user->jurusan_id = $validated['jurusan_id'] ?? null;
                $user->rombel_id = null;
            } elseif ($newRole === 'admin' || $newRole === 'super_admin') {
                $user->nis = null;
                $user->kelas = null;
                $user->rombel_id = null;
                $user->jurusan_id = null;
                $user->rayons()->sync([]);
            }
        } else {
            $user->nis = $validated['nis'] ?? $user->nis;
            $user->kelas = $validated['kelas'] ?? $user->kelas;
            $user->jurusan_id = $validated['jurusan_id'] ?? $user->jurusan_id;
            $user->rombel_id = $validated['rombel_id'] ?? $user->rombel_id;
            $user->rayons()->sync($validated['rayon_id'] ?? $user->rayons->pluck('id')->toArray());
        }

        $user->save();

        return redirect()->route('addusers.index')->with('success', 'User updated successfully.');
    }

    public function show($id)
    {
        $user = User::with(['role', 'jurusan', 'rayon', 'rombel'])->findOrFail($id);
        return view('admin.super_admin.users.show', compact('user'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('addusers.index')->with('success', 'Pengguna berhasil dihapus.');
    }
}

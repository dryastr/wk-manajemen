<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $roleIdUser = Role::where('name', 'user')->first()->id;

        $totalSiswa = User::whereHas('role', function ($query) use ($roleIdUser) {
            $query->where('roles.id', $roleIdUser);
        })->count();

        $statuses = ['kecakapan_softskill'];
        $counts = [];

        foreach ($statuses as $status) {
            $counts[$status . 'Belum'] = User::where($status, 'tidak')
                ->whereHas('role', function ($query) use ($roleIdUser) {
                    $query->where('roles.id', $roleIdUser);
                })->count();

            $counts[$status . 'Sudah'] = User::where($status, 'iya')
                ->whereHas('role', function ($query) use ($roleIdUser) {
                    $query->where('roles.id', $roleIdUser);
                })->count();
        }

        return view('admin.admin.dashboard', [
            'totalSiswa' => $totalSiswa,
            'kecakapanSoftskillBelum' => $counts['kecakapan_softskillBelum'],
            'kecakapanSoftskillSudah' => $counts['kecakapan_softskillSudah'],
        ]);
    }
}

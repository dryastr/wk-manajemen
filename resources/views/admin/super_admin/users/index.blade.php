@extends('layouts.main')

@section('title', 'Daftar Pengguna')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="card-title">Daftar Pengguna</h4>
                        <a href="{{ route('addusers.create') }}" class="btn btn-success btn-sm ms-auto">Tambah Pengguna</a>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="userTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="super_admin-tab" data-bs-toggle="tab" href="#super_admin"
                                    role="tab" aria-controls="super_admin" aria-selected="true">Super Admin</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="admin-tab" data-bs-toggle="tab" href="#admin" role="tab"
                                    aria-controls="admin" aria-selected="false">Admin</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="admin_keuangan-tab" data-bs-toggle="tab" href="#admin_keuangan" role="tab"
                                    aria-controls="admin_keuangan" aria-selected="false">Admin Keuangan</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="admin_perpustakaan-tab" data-bs-toggle="tab" href="#admin_perpustakaan" role="tab"
                                    aria-controls="admin_perpustakaan" aria-selected="false">Admin Perpustakaan</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="kaprog-tab" data-bs-toggle="tab" href="#kaprog" role="tab"
                                    aria-controls="kaprog" aria-selected="false">Kaprog</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="pemray-tab" data-bs-toggle="tab" href="#pemray" role="tab"
                                    aria-controls="pemray" aria-selected="false">Pemray</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="siswa-tab" data-bs-toggle="tab" href="#siswa" role="tab"
                                    aria-controls="siswa" aria-selected="false">Siswa</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="userTabsContent">
                            <div class="tab-pane fade show active" id="super_admin" role="tabpanel"
                                aria-labelledby="super_admin-tab">
                                @include('admin.super_admin.users.partials.users_table', [
                                    'users' => $users->filter(fn($user) => $user->role->name === 'super_admin'),
                                ])
                            </div>
                            <div class="tab-pane fade" id="admin" role="tabpanel" aria-labelledby="admin-tab">
                                @include('admin.super_admin.users.partials.users_table', [
                                    'users' => $users->filter(fn($user) => $user->role->name === 'admin'),
                                ])
                            </div>
                            <div class="tab-pane fade" id="admin_keuangan" role="tabpanel" aria-labelledby="admin_keuangan-tab">
                                @include('admin.super_admin.users.partials.users_table', [
                                    'users' => $users->filter(fn($user) => $user->role->name === 'admin_keuangan'),
                                ])
                            </div>
                            <div class="tab-pane fade" id="admin_perpustakaan" role="tabpanel" aria-labelledby="admin_perpustakaan-tab">
                                @include('admin.super_admin.users.partials.users_table', [
                                    'users' => $users->filter(fn($user) => $user->role->name === 'admin_perpustakaan'),
                                ])
                            </div>
                            <div class="tab-pane fade" id="kaprog" role="tabpanel" aria-labelledby="kaprog-tab">
                                @include('admin.super_admin.users.partials.users_table', [
                                    'users' => $users->filter(fn($user) => $user->role->name === 'kaprog'),
                                ])
                            </div>
                            <div class="tab-pane fade" id="pemray" role="tabpanel" aria-labelledby="pemray-tab">
                                @include('admin.super_admin.users.partials.users_table', [
                                    'users' => $users->filter(fn($user) => $user->role->name === 'pemray'),
                                ])
                            </div>
                            <div class="tab-pane fade" id="siswa" role="tabpanel" aria-labelledby="siswa-tab">
                                @include('admin.super_admin.users.partials.users_table', [
                                    'users' => $users->filter(fn($user) => $user->role->name === 'user'),
                                ])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

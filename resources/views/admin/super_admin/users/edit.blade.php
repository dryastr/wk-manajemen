@extends('layouts.main')

@section('title', 'Ubah Pengguna')

@section('content')
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Ubah Pengguna</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form action="{{ route('addusers.update', $user->id) }}" method="POST" class="form form-horizontal">
                        @csrf
                        @method('PUT')
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="name">Nama</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <input type="text" id="name" class="form-control" name="name"
                                        value="{{ $user->name }}" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="email">Email</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <input type="email" id="email" class="form-control" name="email"
                                        value="{{ $user->email }}" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="password">Password</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <input type="password" id="password" class="form-control" name="password"
                                        placeholder="Kosongkan jika tidak ingin mengubah password">
                                </div>
                                <div class="col-md-4">
                                    <label for="role_id">Role</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <select id="role_id" class="form-control" name="role_id" required>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}"
                                                {{ $user->role_id == $role->id ? 'selected' : '' }}>
                                                @if ($role->name == 'super_admin')
                                                    Super Admin
                                                @elseif ($role->name == 'admin')
                                                    Admin
                                                @elseif ($role->name == 'kaprog')
                                                    Kaprog
                                                @elseif ($role->name == 'pemray')
                                                    Pemray
                                                @elseif ($role->name == 'user')
                                                    Siswa
                                                @endif
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="kelas">Kelas</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <select id="kelas" class="form-control" name="kelas" required>
                                        <option value="" disabled>Pilih Kelas</option>
                                        <option value="X" {{ $user->kelas == 'X' ? 'selected' : '' }}>X</option>
                                        <option value="XI" {{ $user->kelas == 'XI' ? 'selected' : '' }}>XI</option>
                                        <option value="XII" {{ $user->kelas == 'XII' ? 'selected' : '' }}>XII</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="jurusan_id">Jurusan</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <select id="jurusan_id" class="form-control" name="jurusan_id" required>
                                        @foreach ($jurusans as $jurusan)
                                            <option value="{{ $jurusan->id }}"
                                                {{ $user->jurusan_id == $jurusan->id ? 'selected' : '' }}>
                                                {{ $jurusan->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="rayon_id">Rayon</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <select id="rayon_id" class="form-control" name="rayon_id" required>
                                        @foreach ($rayons as $rayon)
                                            <option value="{{ $rayon->id }}"
                                                {{ $user->rayon_id == $rayon->id ? 'selected' : '' }}>
                                                {{ $rayon->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Batal</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

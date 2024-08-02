@extends('layouts.main')

@section('title', 'Tambah Pengguna')

@section('content')
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Tambah Pengguna</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form action="{{ route('addusers.store') }}" method="POST" class="form form-horizontal">
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="name">Nama</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <input type="text" id="name" class="form-control" name="name"
                                        placeholder="Nama Pengguna" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="email">Email</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <input type="email" id="email" class="form-control" name="email"
                                        placeholder="Email Pengguna" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="password">Password</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <input type="password" id="password" class="form-control" name="password"
                                        placeholder="Password" required>
                                    <span class="text-sm">
                                        *Minimal 8 karakter
                                    </span>
                                </div>
                                <div class="col-md-4">
                                    <label for="role_id">Role</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <select id="role_id" class="form-control" name="role_id" required
                                        onchange="toggleFields()">
                                        <option value="" disabled selected>Pilih Role</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}" data-role="{{ $role->name }}">
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
                                <div class="col-md-4" id="nis-group" style="display: none;">
                                    <label for="nis">NIS</label>
                                </div>
                                <div class="col-md-8 form-group" id="nis-input" style="display: none;">
                                    <input type="text" id="nis" class="form-control" name="nis"
                                        value="{{ old('nis', $nis) }}" readonly>
                                </div>
                                <div class="col-md-4" id="kelas-group" style="display: none;">
                                    <label for="kelas">Kelas</label>
                                </div>
                                <div class="col-md-8 form-group" id="kelas-input" style="display: none;">
                                    <select id="kelas" class="form-control" name="kelas">
                                        <option value="" disabled selected>Pilih Kelas</option>
                                        <option value="X">X</option>
                                        <option value="XI">XI</option>
                                        <option value="XII">XII</option>
                                    </select>
                                </div>
                                <div class="col-md-4" id="jurusan-group" style="display: none;">
                                    <label for="jurusan_id">Jurusan</label>
                                </div>
                                <div class="col-md-8 form-group" id="jurusan-input" style="display: none;">
                                    <select id="jurusan_id" class="form-control" name="jurusan_id">
                                        <option value="" disabled selected>Pilih Jurusan</option>
                                        @foreach ($jurusans as $jurusan)
                                            <option value="{{ $jurusan->id }}">{{ $jurusan->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4" id="rayon-group" style="display: none;">
                                    <label for="rayon_id">Rayon</label>
                                </div>
                                <div class="col-md-8 form-group" id="rayon-input" style="display: none;">
                                    <select id="rayon_id" class="form-control" name="rayon_id">
                                        <option value="" disabled selected>Pilih Rayon</option>
                                        @foreach ($rayons as $rayon)
                                            <option value="{{ $rayon->id }}">{{ $rayon->name }}</option>
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

@push('scripts')
    <script>
        function toggleFields() {
            var roleSelect = document.getElementById('role_id');
            var roleName = roleSelect.options[roleSelect.selectedIndex].getAttribute('data-role');

            // Define visibility rules
            var showNIS = roleName === 'user';
            var showKelas = roleName === 'user';
            var showJurusan = roleName === 'user' || roleName === 'kaprog';
            var showRayon = roleName === 'user' || roleName === 'pemray';

            document.getElementById('nis-group').style.display = showNIS ? 'block' : 'none';
            document.getElementById('nis-input').style.display = showNIS ? 'block' : 'none';
            document.getElementById('kelas-group').style.display = showKelas ? 'block' : 'none';
            document.getElementById('kelas-input').style.display = showKelas ? 'block' : 'none';
            document.getElementById('jurusan-group').style.display = showJurusan ? 'block' : 'none';
            document.getElementById('jurusan-input').style.display = showJurusan ? 'block' : 'none';
            document.getElementById('rayon-group').style.display = showRayon ? 'block' : 'none';
            document.getElementById('rayon-input').style.display = showRayon ? 'block' : 'none';
        }

        // Initialize form visibility based on the initial role selection (if any)
        document.addEventListener('DOMContentLoaded', function() {
            toggleFields();
        });
    </script>
@endpush

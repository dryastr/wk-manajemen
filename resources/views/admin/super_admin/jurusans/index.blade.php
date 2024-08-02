@extends('layouts.main')

@section('title', 'Daftar Jurusan')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="card-title">Daftar Jurusan</h4>
                        <a href="{{ route('jurusans.create') }}" class="btn btn-success btn-sm ms-auto">Tambah Jurusan</a>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="TableJurusans" class="table table-xl">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Kode</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jurusans as $jurusan)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $jurusan->name }}</td>
                                            <td>{{ $jurusan->kode_parent }}</td>
                                            <td class="text-nowrap">
                                                <div class="dropdown dropup">
                                                    <button class="btn btn-sm btn-secondary dropdown-toggle" type="button"
                                                        id="dropdownMenuButton-{{ $jurusan->id }}"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="bi bi-three-dots-vertical"></i>
                                                    </button>
                                                    <ul class="dropdown-menu"
                                                        aria-labelledby="dropdownMenuButton-{{ $jurusan->id }}">
                                                        <li><a class="dropdown-item"
                                                                href="{{ route('jurusans.edit', $jurusan->id) }}">Ubah</a></li>
                                                        <li>
                                                            <form action="{{ route('jurusans.destroy', $jurusan->id) }}"
                                                                method="POST"
                                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus jurusan ini?')">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="dropdown-item">Hapus</button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

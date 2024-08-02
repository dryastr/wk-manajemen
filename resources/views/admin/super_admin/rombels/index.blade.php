@extends('layouts.main')

@section('title', 'Rombel List')

@section('content')
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <h4 class="card-title">Daftar Rombel</h4>
                    <a href="{{ route('rombels.create') }}" class="btn btn-success btn-sm ms-auto">Tambah Rombel</a>
                </div>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Jurusan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rombels as $rombel)
                                <tr>
                                    <td>{{ $rombel->id }}</td>
                                    <td>{{ $rombel->nama }}</td>
                                    <td>{{ $rombel->jurusan->name ?? 'N/A' }}</td>
                                    <td class="text-nowrap">
                                        <div class="dropdown dropup">
                                            <button class="btn btn-sm btn-secondary dropdown-toggle" type="button"
                                                id="dropdownMenuButton-{{ $rombel->id }}" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="bi bi-three-dots-vertical"></i>
                                            </button>
                                            <ul class="dropdown-menu"
                                                aria-labelledby="dropdownMenuButton-{{ $rombel->id }}">
                                                <li><a class="dropdown-item"
                                                        href="{{ route('rombels.edit', $rombel->id) }}">Ubah</a></li>
                                                <li>
                                                    <form action="{{ route('rombels.destroy', $rombel->id) }}" method="POST"
                                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus rombel ini?')">
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
@endsection

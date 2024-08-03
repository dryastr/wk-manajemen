@extends('layouts.main')

@section('title', 'Daftar Rayon')

@section('styles')
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="card-title">Daftar Rayon</h4>
                        <a href="{{ route('rayons.create') }}" class="btn btn-success btn-sm ms-auto">Tambah Rayon</a>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="TableRayons" class="table table-xl">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Rayon</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rayons as $rayon)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $rayon->name }}</td>
                                            <td class="text-nowrap">
                                                <div class="dropdown dropup">
                                                    <button class="btn btn-sm btn-secondary dropdown-toggle" type="button"
                                                        id="dropdownMenuButton-{{ $rayon->id }}"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="bi bi-three-dots-vertical"></i>
                                                    </button>
                                                    <ul class="dropdown-menu"
                                                        aria-labelledby="dropdownMenuButton-{{ $rayon->id }}">
                                                        <li><a class="dropdown-item"
                                                                href="{{ route('rayons.edit', $rayon->id) }}">Ubah</a></li>
                                                        <li>
                                                            <form action="{{ route('rayons.destroy', $rayon->id) }}"
                                                                method="POST"
                                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus rayon ini?')">
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

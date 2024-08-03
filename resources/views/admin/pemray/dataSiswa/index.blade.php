@extends('layouts.main')

@section('title', 'Daftar Siswa Rayon')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="card-title">Daftar Siswa Rayon</h4>
                        <a href="{{ route('data_siswa.export') }}" class="btn btn-success btn-sm ms-auto">Export Excel</a>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="TableSiswa" class="table table-xl">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Siswa</th>
                                        <th>NIS</th>
                                        <th>Kelas</th>
                                        <th>Jurusan</th>
                                        <th>Rombel</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($siswa as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->nis }}</td>
                                            <td>{{ $item->kelas }}</td>
                                            <td>{{ $item->jurusan->name }}</td>
                                            <td>{{ $item->rombel->nama }}</td>
                                            <td class="text-nowrap">
                                                <div class="dropdown dropup">
                                                    <button class="btn btn-sm btn-secondary dropdown-toggle" type="button"
                                                        id="dropdownMenuButton-{{ $item->id }}"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="bi bi-three-dots-vertical"></i>
                                                    </button>
                                                    <ul class="dropdown-menu"
                                                        aria-labelledby="dropdownMenuButton-{{ $item->id }}">
                                                        <li>
                                                            <button class="dropdown-item" type="button"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#viewModal-{{ $item->id }}">
                                                                <i class="bi bi-eye"></i> Lihat
                                                            </button>
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

    <!-- Modal -->
    @foreach ($siswa as $item)
        <div class="modal fade" id="viewModal-{{ $item->id }}" tabindex="-1"
            aria-labelledby="viewModalLabel-{{ $item->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="viewModalLabel-{{ $item->id }}">Detail Siswa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <!-- Header (Thead) -->
                                <ul class="list-unstyled">
                                    <li><strong>Kecakapan Hardskill:</strong></li>
                                    <hr>
                                    <li><strong>Kecakapan Softskill:</strong></li>
                                    <hr>
                                    <li><strong>Bebas Tunggakan:</strong></li>
                                    <hr>
                                    <li><strong>Bebas Pustaka:</strong></li>
                                    <hr>
                                    <li><strong>Test Kelayakan:</strong></li>
                                </ul>
                            </div>
                            <div class="col-md-8">
                                <ul class="list-unstyled">
                                    <li>
                                        @if ($item->kecakapan_hardskill == 'iya')
                                            <span class="badge bg-success">Sudah Divalidasi</span>
                                        @else
                                            <span class="badge bg-danger">Belum Divalidasi</span>
                                        @endif
                                    </li>
                                    <hr>
                                    <li>
                                        @if ($item->kecakapan_softskill == 'iya')
                                            <span class="badge bg-success">Sudah Divalidasi</span>
                                        @else
                                            <span class="badge bg-danger">Belum Divalidasi</span>
                                        @endif
                                    </li>
                                    <hr>
                                    <li>
                                        @if ($item->bebas_tunggakan == 'iya')
                                            <span class="badge bg-success">Sudah Divalidasi</span>
                                        @else
                                            <span class="badge bg-danger">Belum Divalidasi</span>
                                        @endif
                                    </li>
                                    <hr>
                                    <li>
                                        @if ($item->bebas_pustaka == 'iya')
                                            <span class="badge bg-success">Sudah Divalidasi</span>
                                        @else
                                            <span class="badge bg-danger">Belum Divalidasi</span>
                                        @endif
                                    </li>
                                    <hr>
                                    <li>
                                        @if ($item->test_kelayakan == 'iya')
                                            <span class="badge bg-success">Sudah Divalidasi</span>
                                        @else
                                            <span class="badge bg-danger">Belum Divalidasi</span>
                                        @endif
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection

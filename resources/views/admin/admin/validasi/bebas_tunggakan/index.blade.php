@extends('layouts.main')

@section('title', 'Menu Validasi Bebas Tunggakan')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Validasi Bebas Tunggakan Siswa</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="belum-divalidasi-tab" data-bs-toggle="tab"
                                    href="#belum-divalidasi" role="tab" aria-controls="belum-divalidasi"
                                    aria-selected="true">Belum Divalidasi</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="sudah-divalidasi-tab" data-bs-toggle="tab" href="#sudah-divalidasi"
                                    role="tab" aria-controls="sudah-divalidasi" aria-selected="false">Sudah
                                    Divalidasi</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="belum-divalidasi" role="tabpanel"
                                aria-labelledby="belum-divalidasi-tab">
                                <div class="flex">
                                    <a href="{{ route('bebas_tunggakan.export', 'tidak') }}"
                                        class="btn btn-success mb-4">Export Excel Belum Divalidasi</a>
                                </div>
                                @include(
                                    'admin.admin.validasi.bebas_tunggakan.partials.bebas_tunggakan_table',
                                    [
                                        'idTable' => 'TableBelumDivalidasi',
                                        'status' => 'tidak',
                                        'users' => $users,
                                    ]
                                )
                            </div>

                            <div class="tab-pane fade" id="sudah-divalidasi" role="tabpanel"
                                aria-labelledby="sudah-divalidasi-tab">
                                <div class="flex">
                                    <a href="{{ route('bebas_tunggakan.export', 'iya') }}"
                                        class="btn btn-success mb-4">Export Excel Sudah Divalidasi</a>
                                </div>
                                @include(
                                    'admin.admin.validasi.bebas_tunggakan.partials.bebas_tunggakan_table',
                                    [
                                        'idTable' => 'TableSudahDivalidasi',
                                        'status' => 'iya',
                                        'users' => $users,
                                    ]
                                )
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

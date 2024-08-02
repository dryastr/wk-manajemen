@extends('layouts.main')

@section('title', 'Menu Validasi Test Kelayakan')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Validasi Test Kelayakan Siswa</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="belum-diteken-tab" data-bs-toggle="tab" href="#belum-diteken"
                                    role="tab" aria-controls="belum-diteken" aria-selected="true">Belum Divalidasi</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="sudah-diteken-tab" data-bs-toggle="tab" href="#sudah-diteken"
                                    role="tab" aria-controls="sudah-diteken" aria-selected="false">Sudah Divalidasi</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="belum-diteken" role="tabpanel"
                                aria-labelledby="belum-diteken-tab">
                                <div class="flex">
                                    <a href="{{ route('validasi.export', 'tidak') }}"
                                        class="btn btn-success mb-4">Export Excel Belum Divalidasi</a>
                                </div>
                                @include(
                                    'admin.kaprog.validasi.test_kelayakans.partials.test_kelayakan_table',
                                    [
                                        'idTable' => 'TableBelumDiteken',
                                        'status' => 'tidak',
                                        'users' => $users,
                                    ]
                                )
                            </div>

                            <div class="tab-pane fade" id="sudah-diteken" role="tabpanel"
                                aria-labelledby="sudah-diteken-tab">
                                <div class="flex">
                                    <a href="{{ route('validasi.export', 'iya') }}"
                                        class="btn btn-success mb-4">Export Excel Sudah Divalidasi</a>
                                </div>
                                @include(
                                    'admin.kaprog.validasi.test_kelayakans.partials.test_kelayakan_table',
                                    [
                                        'idTable' => 'TableSudahDiteken',
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

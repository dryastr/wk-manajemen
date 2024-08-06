@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
    <div class="page-heading">
        <h3>Dashboard</h3>
        <p>Selamat datang, {{ Auth::user()->name }}</p>
    </div>

    <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home"
                aria-selected="true">Total Siswa</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="test-tab" data-bs-toggle="tab" href="#test" role="tab" aria-controls="test"
                aria-selected="false">Test Kelayakan</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="hardskill-tab" data-bs-toggle="tab" href="#hardskill" role="tab"
                aria-controls="hardskill" aria-selected="false">Kecakapan Hardskill</a>
        </li>
    </ul>

    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-xl-12">
                                    <h6 class="text-muted font-semibold">Total Siswa</h6>
                                    <h6 class="font-extrabold mb-0">{{ $totalSiswa }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="test" role="tabpanel" aria-labelledby="test-tab">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-xl-12">
                                    <h6 class="text-muted font-semibold">Test Kelayakan Belum Validasi</h6>
                                    <h6 class="font-extrabold mb-0">{{ $testKelayakanBelum }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-xl-12">
                                    <h6 class="text-muted font-semibold">Test Kelayakan Sudah Validasi</h6>
                                    <h6 class="font-extrabold mb-0">{{ $testKelayakanSudah }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="hardskill" role="tabpanel" aria-labelledby="hardskill-tab">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-xl-12">
                                    <h6 class="text-muted font-semibold">Kecakapan Hardskill Belum Validasi</h6>
                                    <h6 class="font-extrabold mb-0">{{ $kecakapanHardskillBelum }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-xl-12">
                                    <h6 class="text-muted font-semibold">Kecakapan Hardskill Sudah Validasi</h6>
                                    <h6 class="font-extrabold mb-0">{{ $kecakapanHardskillSudah }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

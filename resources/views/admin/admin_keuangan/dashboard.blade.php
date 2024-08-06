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
            <a class="nav-link" id="bebas-tab" data-bs-toggle="tab" href="#bebas" role="tab" aria-controls="bebas"
                aria-selected="false">Bebas Tunggakan</a>
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

        <div class="tab-pane fade" id="bebas" role="tabpanel" aria-labelledby="bebas-tab">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-xl-12">
                                    <h6 class="text-muted font-semibold">Bebas Tunggakan Belum Validasi</h6>
                                    <h6 class="font-extrabold mb-0">{{ $bebasTunggakanBelum }}</h6>
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
                                    <h6 class="text-muted font-semibold">Bebas Tunggakan Sudah Validasi</h6>
                                    <h6 class="font-extrabold mb-0">{{ $bebasTunggakanSudah }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

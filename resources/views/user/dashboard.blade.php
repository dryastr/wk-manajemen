@extends('layouts.main')

@section('title', 'Persyaratan')

@section('content')
    @if (session('error'))
        <div class="alert alert-danger mt-3">{{ session('error') }}</div>
    @endif
    <div class="row">
        <div class="page-heading">
            <div class="d-flex align-items-center justify-content-between">
                <div class="">
                    <h3>Persyaratan</h3>
                    <p>Selamat datang, {{ Auth::user()->name }}</p>
                </div>
                <div class="">
                    @if ($allRequirementsMet)
                        <div class="col-12">
                            <a href="{{ route('persyaratan.print') }}" class="btn btn-primary">Export PDF</a>
                        </div>
                    @else
                        <div class="col-12">
                            <button class="btn btn-secondary" disabled>Export PDF</button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <h6 class="text-muted font-semibold">Kecakapan Hardskill</h6>
                            <h6 class="font-extrabold mb-0">{{ $persyaratan['kecakapan_hardskill'] }}</h6>
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
                            <h6 class="text-muted font-semibold">Kecakapan Softskill</h6>
                            <h6 class="font-extrabold mb-0">{{ $persyaratan['kecakapan_softskill'] }}</h6>
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
                            <h6 class="text-muted font-semibold">Bebas Tunggakan</h6>
                            <h6 class="font-extrabold mb-0">{{ $persyaratan['bebas_tunggakan'] }}</h6>
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
                            <h6 class="text-muted font-semibold">Bebas Pustaka</h6>
                            <h6 class="font-extrabold mb-0">{{ $persyaratan['bebas_pustaka'] }}</h6>
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
                            <h6 class="text-muted font-semibold">Test Kelayakan</h6>
                            <h6 class="font-extrabold mb-0">{{ $persyaratan['test_kelayakan'] }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

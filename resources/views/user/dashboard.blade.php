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
                        <div class="">
                            <a href="{{ route('persyaratan.print') }}" class="btn btn-primary">Export PDF</a>
                        </div>
                    @else
                        <div class="">
                            <button class="btn btn-secondary" disabled>Export PDF</button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Biodata</h4>
                    <div class="d-flex flex-column mt-3">
                        <span>NIS: {{ Auth::user()->nis }}</span>
                        <span>Program Keahlian: {{ Auth::user()->jurusan->name }}</span>
                        <span>Tingkat Kelas: {{ Auth::user()->kelas }}</span>
                        <span>Rayon: {{ Auth::user()->userRayon->rayon->name }}</span>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="TablePersyaratan" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Kriteria Persyaratan</th>
                                        <th>Penanggung Jawab</th>
                                        <th>Paraf</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Kecakapan Hardskill</td>
                                        <td>Kepala Program Jurusan</td>
                                        <td>
                                            @if ($persyaratan['kecakapan_hardskill'] == 'iya')
                                                ✔
                                            @else
                                                ✖
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Test Kelayakan</td>
                                        <td>Kepala Program Jurusan</td>
                                        <td>
                                            @if ($persyaratan['test_kelayakan'] == 'iya')
                                                ✔
                                            @else
                                                ✖
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Kecakapan Softskill</td>
                                        <td>Kesiswaan</td>
                                        <td>
                                            @if ($persyaratan['kecakapan_softskill'] == 'iya')
                                                ✔
                                            @else
                                                ✖
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Bebas Tunggakan</td>
                                        <td>Staff TU</td>
                                        <td>
                                            @if ($persyaratan['bebas_tunggakan'] == 'iya')
                                                ✔
                                            @else
                                                ✖
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Bebas Pustaka</td>
                                        <td>Staff Perpustakaan</td>
                                        <td>
                                            @if ($persyaratan['bebas_pustaka'] == 'iya')
                                                ✔
                                            @else
                                                ✖
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

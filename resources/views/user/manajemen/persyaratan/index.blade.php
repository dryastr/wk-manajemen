@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Persyaratan</h1>
        <ul>
            <li>Kecakapan Hardskill: {{ $persyaratan['kecakapan_hardskill'] }}</li>
            <li>Kecakapan Softskill: {{ $persyaratan['kecakapan_softskill'] }}</li>
            <li>Bebas Tunggakan: {{ $persyaratan['bebas_tunggakan'] }}</li>
            <li>Bebas Pustaka: {{ $persyaratan['bebas_pustaka'] }}</li>
            <li>Test Kelayakan: {{ $persyaratan['test_kelayakan'] }}</li>
        </ul>

        @if ($allRequirementsMet)
            <a href="{{ route('user.persyaratan.exportPdf') }}" class="btn btn-primary">Export PDF</a>
        @else
            <button class="btn btn-secondary" disabled>Export PDF</button>
        @endif

        @if (session('error'))
            <div class="alert alert-danger mt-3">{{ session('error') }}</div>
        @endif
    </div>
@endsection

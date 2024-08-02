@extends('layouts.main')

@section('title', 'Detail Pengguna')

@section('content')
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Detail Pengguna</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <ul>
                        <li><strong>Nama:</strong> {{ $user->name }}</li>
                        <li><strong>Email:</strong> {{ $user->email }}</li>
                        <li><strong>Role:</strong> {{ $user->role }}</li>
                    </ul>
                    <a href="{{ route('addusers.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
@endsection
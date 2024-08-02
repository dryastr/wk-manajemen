@extends('layouts.main')

@section('title', 'Rombel List')

@section('content')
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Daftar Rombel</h4>
                <a href="{{ route('rombels.create') }}" class="btn btn-primary">Tambah Rombel</a>
            </div>
            <div class="card-content">
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Jurusan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rombels as $rombel)
                                <tr>
                                    <td>{{ $rombel->id }}</td>
                                    <td>{{ $rombel->nama }}</td>
                                    <td>{{ $rombel->jurusan->name ?? 'N/A' }}</td>
                                    <td>
                                        <a href="{{ route('rombels.edit', $rombel->id) }}"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('rombels.destroy', $rombel->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

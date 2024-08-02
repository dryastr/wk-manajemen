@extends('layouts.main')

@section('title', 'Tambah Rombel')

@section('content')
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Tambah Rombel</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form action="{{ route('rombels.store') }}" method="POST" class="form form-horizontal">
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="nama">Nama Rombel</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <input type="text" id="nama"
                                        class="form-control @error('nama') is-invalid @enderror" name="nama"
                                        placeholder="Nama Rombel" value="{{ old('nama') }}" required>
                                    @error('nama')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label for="kode_id">Jurusan</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <select id="kode_id" class="form-control @error('kode_id') is-invalid @enderror"
                                        name="kode_id" required>
                                        <option value="">Pilih Jurusan</option>
                                        @foreach ($jurusans as $jurusan)
                                            <option value="{{ $jurusan->id }}"
                                                {{ old('kode_id') == $jurusan->id ? 'selected' : '' }}>
                                                {{ $jurusan->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('kode_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-sm-12 d-flex justify-content-end mt-5">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

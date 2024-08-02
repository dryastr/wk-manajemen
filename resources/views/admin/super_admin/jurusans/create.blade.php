@extends('layouts.main')

@section('title', 'Tambah Data Jurusan')

@section('content')
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Tambah Data Jurusan</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form action="{{ route('jurusans.store') }}" method="POST" class="form form-horizontal">
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="name">Nama Jurusan</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name"
                                        placeholder="Nama Jurusan" value="{{ old('name') }}" required>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label for="kode_parent">Kode Parent</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <input type="text" id="kode_parent" class="form-control @error('kode_parent') is-invalid @enderror" name="kode_parent"
                                        placeholder="Kode Parent" value="{{ old('kode_parent') }}">
                                    @error('kode_parent')
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

@extends('layouts.main')

@section('title', 'Edit Validasi')

@section('content')
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Validasi untuk {{ $detailUserEdit->name }}</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form action="{{ route('validasi.update', $detailUserEdit->id) }}" method="POST" class="form form-horizontal">
                        @csrf
                        @method('PUT')
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="test_kelayakan">Test Kelayakan</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <select id="test_kelayakan" name="test_kelayakan"
                                        class="form-control @error('test_kelayakan') is-invalid @enderror" required>
                                        <option value="iya" {{ $detailUserEdit->test_kelayakan === 'iya' ? 'selected' : '' }}>Iya
                                        </option>
                                        <option value="tidak" {{ $detailUserEdit->test_kelayakan === 'tidak' ? 'selected' : '' }}>
                                            Tidak</option>
                                    </select>
                                    @error('test_kelayakan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-sm-12 d-flex justify-content-end mt-5">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Update</button>
                                    <a href="{{ route('validasi.index') }}"
                                        class="btn btn-light-secondary me-1 mb-1">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

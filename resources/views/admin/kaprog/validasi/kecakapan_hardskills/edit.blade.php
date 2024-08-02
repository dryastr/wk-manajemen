@extends('layouts.main')

@section('title', 'Edit Validasi Kecakapan Hardskill')

@section('content')
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Validasi Kecakapan Hardskill untuk {{ $user->name }}</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form action="{{ route('validasi_kecakapan.update', $user->id) }}" method="POST"
                        class="form form-horizontal">
                        @csrf
                        @method('PUT')
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="kecakapan_hardskill">Kecakapan Hardskill</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <select id="kecakapan_hardskill" name="kecakapan_hardskill"
                                        class="form-control @error('kecakapan_hardskill') is-invalid @enderror" required>
                                        <option value="iya" {{ $user->kecakapan_hardskill === 'iya' ? 'selected' : '' }}>
                                            Iya
                                        </option>
                                        <option value="tidak"
                                            {{ $user->kecakapan_hardskill === 'tidak' ? 'selected' : '' }}>
                                            Tidak</option>
                                    </select>
                                    @error('kecakapan_hardskill')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-sm-12 d-flex justify-content-end mt-5">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Update</button>
                                    <a href="{{ route('validasi_kecakapan.index') }}"
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

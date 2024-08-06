@extends('layouts.main')

@section('title', 'Edit Validasi Bebas Pustaka')

@section('content')
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Validasi Bebas Pustaka untuk {{ $detailUserEdit->name }}</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form action="{{ route('bebas_pustaka.update', $detailUserEdit->id) }}" method="POST"
                        class="form form-horizontal">
                        @csrf
                        @method('PUT')
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="bebas_pustaka">Bebas Pustaka</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <select id="bebas_pustaka" name="bebas_pustaka"
                                        class="form-control @error('bebas_pustaka') is-invalid @enderror" required>
                                        <option value="iya" {{ $detailUserEdit->bebas_pustaka === 'iya' ? 'selected' : '' }}>
                                            Iya
                                        </option>
                                        <option value="tidak"
                                            {{ $detailUserEdit->bebas_pustaka === 'tidak' ? 'selected' : '' }}>
                                            Tidak</option>
                                    </select>
                                    @error('bebas_pustaka')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-sm-12 d-flex justify-content-end mt-5">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Update</button>
                                    <a href="{{ route('bebas_pustaka.index') }}"
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

{{-- @php
    dd($detailUserEdit);
@endphp --}}

@extends('layouts.main')

@section('title', 'Edit Validasi Kecakapan Softskill')

@section('content')
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Validasi Kecakapan Softskill untuk {{ $detailUserEdit->name }}</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form action="{{ route('kecakapan_softskills.update', $detailUserEdit->id) }}" method="POST"
                        class="form form-horizontal">
                        @csrf
                        @method('PUT')
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="kecakapan_softskill">Kecakapan Softskill</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <select id="kecakapan_softskill" name="kecakapan_softskill"
                                        class="form-control @error('kecakapan_softskill') is-invalid @enderror" required>
                                        <option value="iya" {{ $detailUserEdit->kecakapan_softskill === 'iya' ? 'selected' : '' }}>
                                            Iya
                                        </option>
                                        <option value="tidak"
                                            {{ $detailUserEdit->kecakapan_softskill === 'tidak' ? 'selected' : '' }}>
                                            Tidak</option>
                                    </select>
                                    @error('kecakapan_softskill')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-sm-12 d-flex justify-content-end mt-5">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Update</button>
                                    <a href="{{ route('kecakapan_softskills.index') }}"
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

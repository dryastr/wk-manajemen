@extends('layouts.main')

@section('title', 'Edit Data Rayon')

@section('content')
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Data Rayon</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form action="{{ route('rayons.update', $rayon->id) }}" method="POST" class="form form-horizontal">
                        @csrf
                        @method('PUT')
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="name">Nama Rayon</label>
                                </div>
                                <div class="col-md-8 form-group">
                                    <input type="text" id="name" class="form-control" name="name"
                                        value="{{ old('name', $rayon->name) }}" placeholder="Nama Rayon" required>
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

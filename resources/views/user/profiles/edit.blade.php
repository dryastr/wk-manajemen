@extends('layouts.main')

@section('title', 'Edit Profil Saya')

@push('header-styles')
    <style>
        .profile-image {
            transition: transform 0.3s ease;
            object-fit: cover;
            object-position: center;
        }

        .edit-overlay {
            background-color: rgba(0, 0, 0, 0.5);
            opacity: 0;
            transition: opacity 0.3s ease;
            width: 120px !important;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .edit-overlay:hover {
            opacity: 1;
        }

        .edit-overlay button {
            display: none;
            transition: opacity 0.3s ease;
        }

        .edit-overlay:hover button {
            display: block;
            opacity: 1;
        }
    </style>
@endpush

@section('content')
    <div class="row">
        <div class="d-flex flex-column align-items-center justify-content-center">
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('profiles.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            {{-- <div class="position-relative d-flex align-items-center justify-content-center"
                                style="height: 120px; width: 120px; margin: 0 auto;">
                                <img src="{{ $user->profile_image ? asset('storage/' . $user->profile_image) : 'https://cdn-icons-png.flaticon.com/512/3135/3135715.png' }}"
                                    alt="{{ $user->name }}" width="120" height="120" style="border-radius: 50%;"
                                    class="profile-image">
                                <div
                                    class="edit-overlay position-absolute top-0 start-0 w-100 h-100 d-flex justify-content-center align-items-center">
                                    <label for="profile_image" class="btn btn-sm m-0 text-white">
                                        Edit Foto
                                        <input id="profile_image" type="file" name="profile_image"
                                            style="display: none;">
                                    </label>
                                </div>
                            </div> --}}

                            <div class="mb-3 mt-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $user->name }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ $user->email }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password (Kosongkan jika tidak diubah)</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('profiles.show', $user->id) }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

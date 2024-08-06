@extends('layouts.main')

@section('title', 'Profil Saya')

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
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        {{-- <div class="position-relative d-flex align-items-center justify-content-center"
                            style="height: 120px; width: 120px; margin: 0 auto;">
                            <img src="{{ $user->profile_image ? asset('storage/' . $user->profile_image) : 'https://cdn-icons-png.flaticon.com/512/3135/3135715.png' }}"
                                alt="{{ $user->name }}" width="120" height="120" style="border-radius: 50%;"
                                class="profile-image">
                        </div> --}}

                        <div class="d-flex flex-column align-items-center justify-content-center mt-3">
                            <h4 class="card-header fw-bold pb-1 pt-2 mb-0">{{ $user->name }}</h4>
                            <span class="pb-1 m-0">{{ $user->email }}</span>
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" value="{{ $user->name }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="kelas" class="form-label">Kelas</label>
                            <input type="text" class="form-control" id="kelas" value="{{ $user->kelas }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="nis" class="form-label">NIS</label>
                            <input type="text" class="form-control" id="nis" value="{{ $user->nis }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="jurusan" class="form-label">Jurusan</label>
                            <input type="text" class="form-control" id="jurusan"
                                value="{{ $user->jurusan->name ?? '-' }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="rayon" class="form-label">Rayon</label>
                            <input type="text" class="form-control" id="rayon"
                                   value="{{ optional($user->rayons->first())->name ?? '-' }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="created_at" class="form-label">Dibuat pada</label>
                            <input type="text" class="form-control" id="created_at"
                                value="{{ \Carbon\Carbon::parse($user->created_at)->translatedFormat('j F Y') }}" readonly>
                        </div>

                        <a href="{{ route('profiles.edit', $user->id) }}" class="btn btn-primary">Edit Profil</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(".search-group").hide();
    </script>
@endpush

@extends('layouts.main')

@section('title', 'Daftar Request Penempatan PKL')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="card-title">Daftar Request Penempatan PKL</h4>
                        <div>
                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#uploadModal">
                                Upload File
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="TableRequest" class="table table-xl">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Siswa</th>
                                        <th>Filename</th>
                                        <th>Source</th>
                                        <th>Size (KB)</th>
                                        <th>Ext</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($requests as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->user->name }}</td>
                                            <td>{{ $item->filename }}</td>
                                            <td>
                                                <a href="{{ asset('storage/' . $item->source) }}" target="_blank">Lihat
                                                    File</a>
                                            </td>
                                            <td>{{ round($item->size / 1024, 2) }}</td>
                                            <td>{{ $item->ext }}</td>
                                            <td>
                                                @if ($item->status == 'pending')
                                                    <span class="badge bg-warning">Pending</span>
                                                @elseif ($item->status == 'accepted')
                                                    <span class="badge bg-success">Accepted</span>
                                                @elseif ($item->status == 'rejected')
                                                    <span class="badge bg-danger">Rejected</span>
                                                @endif
                                            </td>
                                            <td class="text-nowrap">
                                                <div class="dropdown dropup">
                                                    <button class="btn btn-sm btn-secondary dropdown-toggle" type="button"
                                                        id="dropdownMenuButton-{{ $item->id }}"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="bi bi-three-dots-vertical"></i>
                                                    </button>
                                                    <ul class="dropdown-menu"
                                                        aria-labelledby="dropdownMenuButton-{{ $item->id }}">
                                                        <li>
                                                            <button class="dropdown-item" type="button"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#viewModal-{{ $item->id }}">
                                                                <i class="bi bi-eye"></i> Lihat
                                                            </button>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="card-title">Template Request Penempatan PKL</h4>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="TableRequest" class="table table-xl">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Deskripsi</th>
                                        <th>Filename</th>
                                        <th>Source</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($templates as $template)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $template->name }}</td>
                                            <td>{{ $template->description }}</td>
                                            <td>{{ $template->filename }}</td>
                                            <td>
                                                <a href="{{ asset('storage/' . $template->source) }}" target="_blank">Lihat
                                                    File</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Viewing Request Details -->
    @foreach ($requests as $item)
        <div class="modal fade" id="viewModal-{{ $item->id }}" tabindex="-1"
            aria-labelledby="viewModalLabel-{{ $item->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="viewModalLabel-{{ $item->id }}">Detail Request Penempatan PKL</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <ul class="list-unstyled">
                                    <li><strong>Nama Siswa:</strong></li>
                                    <hr>
                                    <li><strong>Filename:</strong></li>
                                    <hr>
                                    <li><strong>Size (KB):</strong></li>
                                    <hr>
                                    <li><strong>Ext:</strong></li>
                                    <hr>
                                    <li><strong>Status:</strong></li>
                                </ul>
                            </div>
                            <div class="col-md-8">
                                <ul class="list-unstyled">
                                    <li>{{ $item->user->name }}</li>
                                    <hr>
                                    <li>{{ $item->filename }}</li>
                                    <hr>
                                    <li>{{ round($item->size / 1024, 2) }}</li>
                                    <hr>
                                    <li>{{ $item->ext }}</li>
                                    <hr>
                                    <li>
                                        @if ($item->status == 'pending')
                                            <span class="badge bg-warning">Pending</span>
                                        @elseif ($item->status == 'accepted')
                                            <span class="badge bg-success">Accepted</span>
                                        @elseif ($item->status == 'rejected')
                                            <span class="badge bg-danger">Rejected</span>
                                        @endif
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Modal for Uploading File -->
    <div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="{{ route('request_placement.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="uploadModalLabel">Upload Request Penempatan PKL</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="file_surat" class="form-label">File Surat</label>
                            <input type="file" class="form-control @error('file_surat') is-invalid @enderror"
                                id="file_surat" name="file_surat" required>
                            @error('file_surat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

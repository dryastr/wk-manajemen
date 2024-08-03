<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran Peserta PKL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }

        .form-container {
            max-width: 1200px;
            margin: auto;
            background: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .title-header {
            font-weight: bold;
            font-size: 20px;
        }
    </style>
</head>

<body>
    <div class="form-container mt-4">
        <div class="card" style="border: none;">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between" style="width: 100%;">
                    <div class="d-flex align-items-center" style="width: 100%;">
                        <div class="logo" style="padding-right: 20px;">
                            <img src="https://smkwikrama.sch.id/assets2/wikrama-logo.png" alt="Logo" width="100"
                                height="100">
                        </div>
                        <div class="pl-5">
                            <span class="title-header">FORMULIR PENDAFTARAN PESERTA</span>
                            <p class="mt-2">Praktik Kerja Lapangan (PKL)<br>SMK Wikrama Bogor Tahun 2024<br>Periode
                                Juli - Desember</p>
                        </div>
                    </div>
                    <div class="flex">
                        <table class="table table-bordered" style="width: 200px;">
                            <tr>
                                <td>No. Daftar</td>
                                <td>{{ $data['no_daftar'] }}</td>
                            </tr>
                            <tr>
                                <td>Tanggal Daftar</td>
                                <td>{{ $data['tanggal_daftar'] }}</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <form>
                    <div class="row">
                        <div class="d-flex align-items-center">
                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <span>:</span> {{ $data['nama'] }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="d-flex align-items-center">
                            <label for="nis" class="col-sm-2 col-form-label">NIS</label>
                            <div class="col-sm-10">
                                <span>:</span> {{ $data['nis'] }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="d-flex align-items-center">
                            <label for="programKeahlian" class="col-sm-2 col-form-label">Program Keahlian</label>
                            <div class="col-sm-10">
                                <span>: {{ $data['program_keahlian'] }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="d-flex align-items-center">
                            <label for="rayon" class="col-sm-2 col-form-label">Rayon</label>
                            <div class="col-sm-10">
                                <span>:</span> {{ $data['rayon'] }}
                            </div>
                        </div>
                    </div>
                </form>

                <table class="table table-bordered mt-4">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Elemen</th>
                            <th>Ya</th>
                            <th>Tidak</th>
                            <th>Penanggung Jawab</th>
                            <th>Tanda tangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($persyaratan as $index => $status)
                            <tr>
                                <td>{{ intval($index) + 1 }}</td>
                                <td>{{ $persyaratan_labels[$index] }}</td>
                                <td></td>
                                <td></td>
                                <td>{{ $persyaratan_responsibles[$index] }}</td>
                                <td></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="d-flex align-items-end justify-content-end">
                    <div class="d-flex flex-column align-items-center justify-content-center">
                        <span>Nama Pendaftar</span>
                        <span class="mt-4">.................................</span>
                    </div>
                </div>

                <div class="card mt-3" style="border-radius: 0;">
                    <div class="card-body">
                        <div class="flex align-items-center justify-content-center text-center mb-4">
                            <span>TANDA TERIMA PENDAFTARAN PKL</span>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="col-md-6" style="height: 15rem;">
                                <div class="row">
                                    <div class="d-flex align-items-center">
                                        <label for="nama" class="col-sm-4 col-form-label">Nama</label>
                                        <div class="col-sm-8">
                                            <span>:</span> {{ $data['nama'] }}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="d-flex align-items-center">
                                        <label for="nis" class="col-sm-4 col-form-label">NIS</label>
                                        <div class="col-sm-8">
                                            <span>:</span> {{ $data['nis'] }}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="d-flex align-items-center">
                                        <label for="programKeahlian" class="col-sm-4 col-form-label">Program
                                            Keahlian</label>
                                        <div class="col-sm-8">
                                            <span>: {{ $data['program_keahlian'] }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="d-flex align-items-center">
                                        <label for="rayon" class="col-sm-4 col-form-label">Rayon</label>
                                        <div class="col-sm-8">
                                            <span>:</span> {{ $data['rayon'] }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6" style="height: 15rem;">
                                <div class="row">
                                    <div class="d-flex align-items-center">
                                        <label for="tanggal_daftar" class="col-sm-4 col-form-label">Tanggal
                                            Daftar</label>
                                        <div class="col-sm-8">
                                            <span>: {{ $data['tanggal_daftar'] }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="d-flex align-items-center">
                                        <label for="penanggung_jawab" class="col-sm-4 col-form-label">Penanggung
                                            Jawab</label>
                                        <div class="col-sm-8">
                                            <span>:</span> ...................................
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="d-flex align-items-center">
                                        <label for="tgl_ttd" class="col-sm-4 col-form-label">Tanggal Tanda
                                            Tangan</label>
                                        <div class="col-sm-8">
                                            <span>:</span> ...................................
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-center mt-4">
                    <div class="col-md-12">
                        <p style="text-align: center;">
                            SMK WIKRAMA BOGOR - Jl. Raya Wangun No.10, Bogor, Jawa Barat, 16720<br>
                            Website: www.smk.wikrama.sch.id - Email: info@smkwikrama.sch.id
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

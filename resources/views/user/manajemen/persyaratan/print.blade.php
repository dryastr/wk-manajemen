<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran Peserta PKL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .title-header {
            font-weight: bold;
            font-size: 20px;
        }

        .page-break {
            page-break-before: always;
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
                                <td>Tanggal Daftar</td>
                            </tr>
                            <tr>
                                <td>{{ $data['no_daftar'] }}</td>
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
                                <span>: {{ $data['nama'] }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="d-flex align-items-center">
                            <label for="nis" class="col-sm-2 col-form-label">NIS</label>
                            <div class="col-sm-10">
                                <span>: {{ $data['nis'] }}</span>
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
                                <span>: {{ $data['rayon'] }}</span>
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
                        <tr>
                            <td>1</td>
                            <td>Kecakapan Softskill</td>
                            <td>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-check2-all" viewBox="0 0 16 16">
                                    <path
                                        d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0" />
                                    <path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708" />
                                </svg>
                            </td>
                            <td></td>
                            <td>Wakasek. Kesiswaan</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Bebas Tunggakan</td>
                            <td>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-check2-all" viewBox="0 0 16 16">
                                    <path
                                        d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0" />
                                    <path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708" />
                                </svg>
                            </td>
                            <td></td>
                            <td>Wakasek. Keuangan</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Kecakapan Hardskill</td>
                            <td>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-check2-all" viewBox="0 0 16 16">
                                    <path
                                        d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0" />
                                    <path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708" />
                                </svg>
                            </td>
                            <td></td>
                            <td>Ka. Program Keahlian</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Test Kelayakan</td>
                            <td>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-check2-all" viewBox="0 0 16 16">
                                    <path
                                        d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0" />
                                    <path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708" />
                                </svg>
                            </td>
                            <td></td>
                            <td>Ka. Program Keahlian</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Bebas Pustaka</td>
                            <td>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-check2-all" viewBox="0 0 16 16">
                                    <path
                                        d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0" />
                                    <path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708" />
                                </svg>
                            </td>
                            <td></td>
                            <td>
                                Wakasek. Perpustakaan
                            </td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                <div class="d-flex align-items-end justify-content-end">
                    <div class="d-flex flex-column align-items-center justify-content-center">
                        <span>Nama Pendaftar</span>
                        <span class="mt-5">{{ $data['nama'] }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-break"></div>

    <div class="form-container mt-5">
        <div class="card" style="border: none;">
            <div class="card-body">
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
                                            <span>: {{ $data['nama'] }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="d-flex align-items-center">
                                        <label for="nis" class="col-sm-4 col-form-label">NIS</label>
                                        <div class="col-sm-8">
                                            <span>: {{ $data['nis'] }}</span>
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
                                            <span>: {{ $data['rayon'] }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="d-flex align-items-center">
                                        <label for="programKeahlian" class="col-sm-4 col-form-label">Nomor
                                            Daftar</label>
                                        <div class="col-sm-8">
                                            <span>: {{ $data['no_daftar'] }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="d-flex align-items-center">
                                        <label for="rayon" class="col-sm-4 col-form-label">Tanggal Daftar</label>
                                        <div class="col-sm-8">
                                            <span>: {{ $data['tanggal_daftar'] }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6" style="height: 15rem;">
                                <div class="d-flex flex-column align-items-center justify-content-between"
                                    style="height: -webkit-fill-available;">
                                    <p class="mb-0">Yang Mengesahkan,<br>Ka. Program Keahlian</p>
                                    <p class="mt-0">
                                        <strong>
                                            @foreach ($kaprog_names as $name)
                                                {{ $name }}
                                            @endforeach
                                        </strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        window.onload = function() {
            window.print();
        };
    </script>
</body>

</html>

<div class="table-responsive">
    <table id="{{ $idTable }}" class="table table-xl">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>NIS</th>
                <th>Kelas</th>
                <th>Jurusan</th>
                <th>Kecakapan Softskill</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php $counter = 1; @endphp
            @foreach ($users as $user)
                @if ($user->kecakapan_softskill === $status)
                    <tr>
                        <td>{{ $counter++ }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->nis }}</td>
                        <td>{{ $user->kelas }}</td>
                        <td>{{ $user->rombel->nama }}</td>
                        <td>
                            @if ($user->kecakapan_softskill == 'iya')
                                <span class="badge bg-success">Sudah Divalidasi</span>
                            @else
                                <span class="badge bg-danger">Belum Divalidasi</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('kecakapan_softskills.edit', $user->id) }}"
                                class="btn btn-primary btn-sm">Edit</a>
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>

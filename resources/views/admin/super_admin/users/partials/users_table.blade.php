<div class="table-responsive mt-4">
    <table id="TableUsers" class="table table-xl pt-5">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if ($user->role->name == 'super_admin')
                            Super Admin
                        @elseif ($user->role->name == 'admin')
                            Admin
                        @elseif ($user->role->name == 'kaprog')
                            Kaprog
                        @elseif ($user->role->name == 'pemray')
                            Pemray
                        @else
                            Siswa
                        @endif
                    </td>
                    <td class="text-nowrap">
                        <div class="dropdown {{ $loop->iteration == 1 ? 'dropup' : 'dropup' }}">
                            <button class="btn btn-sm btn-secondary dropdown-toggle" type="button"
                                id="dropdownMenuButton-{{ $user->id }}" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="bi bi-three-dots-vertical"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton-{{ $user->id }}">
                                <li><a class="dropdown-item" href="{{ route('addusers.show', $user->id) }}">Detail</a>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('addusers.edit', $user->id) }}">Ubah</a>
                                </li>
                                <li>
                                    <form action="{{ route('addusers.destroy', $user->id) }}" method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item">Hapus</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Pelanggan</title>
</head>
<body>
    <h2>Daftar Pelanggan</h2>

    @if(session('success'))
        <div style="color: green; margin-bottom: 10px;">{{ session('success') }}</div>
    @endif

    <a href="{{ url('/pelanggan/create') }}">
        <button>+ Tambah Pelanggan Baru</button>
    </a>
    <br><br>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Foto</th>
                <th>Nama Lengkap</th>
                <th>Jenis Kelamin</th>
                <th>Nomor HP</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($result as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>
                    <img src="{{ $item->foto }}" alt="Foto" width="80">
                </td>
                <td>{{ $item->nama_lengkap }}</td>
                <td>{{ $item->jenis_kelamin }}</td>
                <td>{{ $item->nomor_hp }}</td>
                <td>{{ $item->alamat_email }}</td>
                <td>
                    <a href="{{ route('pelanggan.edit', $item->id) }}">
                        <button>Edit</button>
                    </a> 
                    
                    <form action="{{ route('pelanggan.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
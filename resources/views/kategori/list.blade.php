<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Kategori</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row mb-3">
        <div class="col-lg-4">
            <form action="" method="GET">
                <input type="text" class="form-control" name="q" placeholder="Cari kategori..." value="{{ @$_GET['q'] }}">
            </form>
        </div>
        <div class="col-lg-8 text-end">
            <a href="{{ url('kategori/create') }}" class="btn btn-primary">Tambah Kategori</a>
        </div>
    </div>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($result as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama_kategori }}</td>
                <td>
                    <a href="{{ route('kategori.edit', $item->id) }}" class="btn btn-warning btn-sm">Ubah</a>
                    <form action="{{ route('kategori.destroy', $item->id) }}" method="POST" class="d-inline formDelete">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $result->withQueryString()->links('pagination::bootstrap-5') !!}

    <script src="https://code.jquery.com/jquery-3.6.4.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(() => {
            $("body").on("click", ".formDelete", (el) => {
                el.preventDefault();
                Swal.fire({
                    title: 'Perhatian',
                    text: "Apakah anda yakin ingin menghapus kategori ini?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'Ya',
                    cancelButtonText: 'Tidak'
                }).then((result) => {
                    if(result.isConfirmed) $(el.currentTarget).submit();
                })
            })
        })
    </script>
</body>
</html>